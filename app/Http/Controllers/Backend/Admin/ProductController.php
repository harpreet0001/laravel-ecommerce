<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Backend\Admin\CommonController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use Auth;

class ProductController extends CommonController
{ 
    public $path ='admin.modules.product.';

    /*protected $CommonController;
    public function __construct(CommonController $CommonController)
    {
        $this->CommonController = $CommonController;
    }*/

    protected function validators(array $data)
    {
        $rules  = [
                        'category'      => ['required'],
                        'type'          => ['required','in:0,1'],
                        'title'         => ['required', 'string', 'max:100'],
                        'availability'  => ['required'],
                        'description'   => ['required'],
                        'price'         => ['required', 'numeric'],
                        'weight'        => ['required', 'numeric'],
                        'condition'     => ['required'],
                        
                 ];

        if(isset($data['IdHidden']) && !empty($data['IdHidden'])) {  

            $rules = array_merge($rules,[                  
                    'downloadfile'  => ['sometimes','nullable','required_if:type,==,1','max:50000'],
           ]); 
           return Validator::make($data,$rules);
        }    

        $rules = array_merge($rules,[         
                  'downloadfile'  => ['required_if:type,==,1','max:50000'],
        ]);     

        return Validator::make($data,$rules);
    }

    public function list(Request $request)
    { 
        //$childModule = json_decode($this->CommonController->CheckPermissions(1));
        //$childModule = json_decode($this->CheckPermissions(1));
        $Products = Product::get();
        return view($this->path."list")->with(['Products' => $Products]);
    }

    public function create()
    {   
        $brand    = Brand::get();
        $category = Category::where('active',1)->get();
        return view($this->path."create")->with(['brand' => $brand, 'category' => $category]);;
    }

    public function save(Request $request)
    {
        $this->validators($request->all())->validate();
        $return_result = $this->store($request->all()); 
        $msgz = "";
        if($return_result){
            $msgz = 'Record Saved Succesfully..!!';
        }else{
            $msgz = 'Something went wrong..!!';
        }       
        return redirect()->route('product-create')->withSuccess($msgz);
    }

    protected function store(array $data)
    {   
        $csmessage = $csremovestatus = $callmessage = $freeshipping = $showcondition = $active = $featured = '';
        $csmessage = str_replace('%%DATE%%', $data['csreleasedate'], $data['csmessage']);
        if(Arr::exists($data, 'csremovestatus'))    { $csremovestatus   = 1; }else{ $csremovestatus = 0; }
        if(Arr::exists($data, 'callmessage'))       { $callmessage      = 1; }else{ $callmessage    = 0; }
        if(Arr::exists($data, 'freeshipping'))      { $freeshipping     = 1; }else{ $freeshipping   = 0; }
        if(Arr::exists($data, 'showcondition'))     { $showcondition    = 1; }else{ $showcondition  = 0; }
        if(Arr::exists($data, 'active'))            { $active           = 1; }else{ $active         = 0; }
        if(Arr::exists($data, 'featured'))          { $featured         = 1; }else{ $featured       = 0; }
        
        if($data['availability']==1){
            $csmessage                = "";
            $data['csreleasedate'] = "";
            $csremovestatus           = 0;
            $callmessage              = 0;
          }else if($data['availability']==2){
            $callmessage              = 0;
          }else if($data['availability']==3){
            $csmessage                = "";
            $data['csreleasedate'] = "";
            $csremovestatus           = 0;
          }

        $FileNameWithPath = '';
        if(!empty($data['img'])){
            $fileName   = strtotime('now').'.'.$data['img']->extension();  
            $ImgMove    =$data['img']->move(public_path('images/product'), $fileName);
            if($ImgMove){
                $FileNameWithPath = '/images/product/'.$fileName;
            }
        }

        $downloadFilePath = '';
        $downloadfileName = '';
        if(!empty($data['downloadfile'])){
            $downloadfileName     = $data['downloadfile']->getClientOriginalName();
            $fileName   = strtotime('now').'.'.$data['downloadfile']->extension();  
            $downloadfileMove     =  $data['downloadfile']->move(public_path('category/AttachFiles'), $fileName);
            if($downloadfileMove){
                $downloadFilePath = '/category/AttachFiles/'.$fileName;
            }
        }          
        
        return Product::create([
                'category'          => empty($data['category']) ? json_encode([]) : json_encode($data['category']),
                'type'              => $data['type'],
                'title'             => $data['title'],
                'description'       => $data['description'],
                'condition'         => $data['condition'],
                'showcondition'     => $showcondition,
                'brand'             => empty($data['brand'])                                  ? "" : $data['brand'],
                'sku'               => empty($data['sku'])                                    ? "" : $data['sku'],
                'image'             => empty($data['img'])                                    ? "" : $FileNameWithPath,                       
                'downloadfile'      => $data['type'] == 0 || empty($data['downloadfile'])     ? "" : $downloadFilePath,
                'downloadfileName'  => $downloadfileName,
                'availability'      => $data['availability'],
                'csmessage'         => empty($data['csmessage'])                              ? "" : $csmessage,
                'csreleasedate'     => empty($data['csreleasedate'])                          ? "" : $data['csreleasedate'],
                'csremovestatus'    => $csremovestatus,
                'callmessage'       => $callmessage,
                'price'             => (float) $data['price'],
                'costprice'         => empty($data['costprice'])                              ? (float)"0.00" : (float)$data['costprice'],
                'retailprice'       => empty($data['retailprice'])                            ? (float)"0.00" : (float)$data['retailprice'],
                'saleprice'         => empty($data['saleprice'])                              ? (float)"0.00" : (float)$data['saleprice'],
                'weight'            => $data['weight'],
                'width'             => empty($data['width'])                                  ? "" : $data['width'],
                'height'            => empty($data['height'])                                 ? "" : $data['height'],
                'depth'             => empty($data['depth'])                                  ? "" : $data['depth'],
                'fixshipping'       => empty($data['fixshipping'])                            ? "" : $data['fixshipping'],
                'freeshipping'      => $freeshipping,
                'currentstock'      => empty($data['currentstock'])                           ? "" : (int)$data['currentstock'],
                'lowstock'          => empty($data['lowstock'])                               ? "" : (int)$data['lowstock'],
                'warranty'          => empty($data['warranty'])                               ? "" : $data['warranty'],
                'searchkeyword'     => empty($data['searchkeyword'])                          ? "" : $data['searchkeyword'],
                'producttag'        => empty($data['producttag'])                             ? "" : $data['producttag'],
                'active'            => $active,
                'featured'          => $featured,
                'min_purchase_qty'  => empty($data['min_purchase_qty'])                       ? "" : (int)$data['min_purchase_qty'],
                'max_purchase_qty'  => empty($data['max_purchase_qty'])                       ? "" : (int)$data['max_purchase_qty'],
                'pagetitle'         => empty($data['pagetitle'])                              ? "" : $data['pagetitle'],
                'metakeywords'       => empty($data['metakeywords'])                            ? "" : $data['metakeywords'],
                'metadescription'   => empty($data['metadescription'])                        ? "" : $data['metadescription'],
            ]);       
    }

    public function edit($id)
    {
        $brand       = Brand::get();
        $category    = Category::where('active',1)->get();
        $ProductData = Product::where('_id', base64_decode($id))->first();
        return view($this->path."edit")->with(['ProductData' => $ProductData, 'category' => $category, 'brand' => $brand]);
    }

    public function update(Request $request)
    {
          $this->validators($request->all())->validate();
          $id        = base64_decode($request["IdHidden"]);
          $csmessage = $csremovestatus = $callmessage = $freeshipping = $showcondition = $active = $featured = '';
          $csmessage = str_replace('%%DATE%%', $request['csreleasedate'], $request['csmessage']);
          if(Arr::exists($request, 'csremovestatus'))    { $csremovestatus   = 1; }else{ $csremovestatus = 0; }
          if(Arr::exists($request, 'callmessage'))       { $callmessage      = 1; }else{ $callmessage    = 0; }
          if(Arr::exists($request, 'freeshipping'))      { $freeshipping     = 1; }else{ $freeshipping   = 0; }
          if(Arr::exists($request, 'showcondition'))     { $showcondition    = 1; }else{ $showcondition  = 0; }
          if(Arr::exists($request, 'active'))            { $active           = 1; }else{ $active         = 0; }
          if(Arr::exists($request, 'featured'))          { $featured         = 1; }else{ $featured       = 0; }
          
          if($request['availability']==1){
            $csmessage                = "";
            $request['csreleasedate'] = "";
            $csremovestatus           = 0;
            $callmessage              = 0;
          }else if($request['availability']==2){
            $callmessage              = 0;
          }else if($request['availability']==3){
            $csmessage                = "";
            $request['csreleasedate'] = "";
            $csremovestatus           = 0;
          }
          
          $updatecategory = Product::where('_id', $id);
          $update     = $updatecategory->update([
                                                'category'          => empty($request['category']) ? json_encode([]) : json_encode($request['category']),
                                                'type'              => $request['type'],
                                                'title'             => $request['title'],
                                                'description'       => $request['description'],
                                                'condition'         => $request['condition'],
                                                'showcondition'     => $showcondition,
                                                'brand'             => empty($request['brand'])            ? "" : $request['brand'],
                                                'sku'               => empty($request['sku'])              ? "" : $request['sku'],
                                                'availability'      => $request['availability'],
                                                'csmessage'         => empty($request['csmessage'])        ? "" : $csmessage,
                                                'csreleasedate'     => empty($request['csreleasedate'])    ? "" : $request['csreleasedate'],
                                                'csremovestatus'    => $csremovestatus,
                                                'callmessage'       => $callmessage,
                                                'price'             => (float)$request['price'],
                                                'costprice'         => empty($request['costprice'])        ? (float)"0.00" : (float)$request['costprice'],
                                                'retailprice'       => empty($request['retailprice'])      ? (float)"0.00" : (float)$request['retailprice'],
                                                'saleprice'         => empty($request['saleprice'])        ? (float)"0.00" : (float)$request['saleprice'],
                                                'weight'            => $request['weight'],
                                                'width'             => empty($request['width'])            ? "" : $request['width'],
                                                'height'            => empty($request['height'])           ? "" : $request['height'],
                                                'depth'             => empty($request['depth'])            ? "" : $request['depth'],
                                                'fixshipping'       => empty($request['fixshipping'])      ? "" : $request['fixshipping'],
                                                'freeshipping'      => $freeshipping,
                                                'currentstock'      => empty($request['currentstock'])     ? "" : (int)$request['currentstock'],
                                                'lowstock'          => empty($request['lowstock'])         ? "" : (int)$request['lowstock'],
                                                'warranty'          => empty($request['warranty'])         ? "" : $request['warranty'],
                                                'searchkeyword'     => empty($request['searchkeyword'])    ? "" : $request['searchkeyword'],
                                                'producttag'        => empty($request['producttag'])       ? "" : $request['producttag'],
                                                'active'            => $active,
                                                'featured'          => $featured,
                                                'min_purchase_qty'  => empty($request['min_purchase_qty']) ? "" : (int)$request['min_purchase_qty'],
                                                'max_purchase_qty'  => empty($request['max_purchase_qty']) ? "" : (int)$request['max_purchase_qty'],
                                                'pagetitle'         => empty($request['pagetitle'])        ? "" : $request['pagetitle'],
                                                'metakeywords'       => empty($request['metakeywords'])      ? "" : $request['metakeywords'],
                                                'metadescription'   => empty($request['metadescription'])  ? "" : $request['metadescription'],
                                            ]);

          if(!empty($request->img)){
            $imagepath  = Product::select('image')->where('_id', $id)->first();
            $image_path = public_path($imagepath->image);
            $fileName = strtotime('now').'.'.$request->img->extension();  
            $request->img->move(public_path('images/product'), $fileName);
            $updateIMG = $updatecategory->update([
                                              'image'   => '/images/product/'.$fileName
                                            ]);
            if($updateIMG && !empty($imagepath->image)){
              if(!empty($image_path) && file_exists($image_path)){
                unlink($image_path);
              }
            }
          }

         if(!empty($request->downloadfile)){

            $downloadfileName     = $request->downloadfile->getClientOriginalName();
            $downloadfilepath     = Product::select('downloadfile')->where('_id', $id)->first();
            $downloadfile_path    = public_path($downloadfilepath->downloadfile);
            $fileName = strtotime('now').'.'.$request->downloadfile->extension();  
            $request->downloadfile->move(public_path('category/AttachFiles'), $fileName);
            $updateResult = $downloadfilepath->update([
                                              'downloadfile'    => '/category/AttachFiles/'.$fileName,
                                              'downloadfileName' => $downloadfileName
                                            ]);
            if($updateResult){
              if(file_exists($downloadfile_path)){
                unlink($downloadfile_path);
              }
            }
          }  

          $msg    = "";
          if($update){
              $msg = 'Record updated succesfully..!!';
          }else{
              $msg = 'Something went wrong..!!';
          }
          return redirect()->route('product-list')->withSuccess($msg);
    }

    public function delete($id)
    {
        $id         = base64_decode($id);
        $imagepath  = Product::select('image')->where('_id', $id)->first();
        $image_path = public_path($imagepath->image);
        //echo $image_path.'<pre>'; print_r($imagepath->image); die;
        $DelBlog    = Product::where('_id', $id)->delete();
        $msg        = 'Something went wrong..!!';
        if($DelBlog){
            if(!empty($imagepath->image) && file_exists($image_path)){
              unlink($image_path);
            }
            $msg = 'Record deleted succesfully.';
        }
        return redirect()->route('product-list')->withSuccess($msg);
    }

    public function series()
    {
        $Products = Product::orderBy('series', 'ASC')->get();
        return view($this->path."series")->with(['Products' => $Products]);
    }

    function update_series(Request $request){
        foreach ($request->data as $key => $value) {
            Product::where('_id', $value["id"])->update(['series' => $key]);
        }
        return true;
    }

    public function active(Request $request, $id)
    {
        $value  = $request->value == 'true' ? 1 : 0;
        $return = Product::where('_id',$id)->update(['active' => $value]);
        return response()->json(['return'=>$return]);
    }

}
