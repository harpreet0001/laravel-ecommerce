<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Backend\Admin\CommonController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;


class CategoryController extends CommonController
{
    public $path ='admin.modules.category.';

    protected function validators(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:100', 'unique:categories'],
            'top'   => ['required','integer','in:0,1'],
            'img'   => ['required'],
        ]);
    }

    protected function validators_update(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:100'],
            'top'   => ['required','integer','in:0,1'],
        ]);
    }

    public function list()
    {
        $Category = Category::orderBy('series', 'ASC')->get();
        return view($this->path."list")->with(['Category' => $Category]);
    }

    public function create()
    {
        return view($this->path."create");
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
        return redirect()->route('category-create')->withSuccess($msgz);
    }

    protected function store(array $data)
    {  
        $FileNameWithPath = '';
        if(!empty($data['img'])){
            $fileName   = strtotime('now').'.'.$data['img']->extension();  
            $ImgMove    =$data['img']->move(public_path('images/category'), $fileName);
            if($ImgMove){
                $FileNameWithPath = '/images/category/'.$fileName;
            }
        }    

        return Category::create([
                'title'          => $data['title'],
                'description'    => empty($data['description'])     ? "" : $data['description'],
                'pagetitle'      => empty($data['pagetitle'])       ? "" : $data['pagetitle'],
                'top'            => (int)$data['top'],
                'metakeywords'   => empty($data['metakeywords'])    ? "" : $data['metakeywords'],
                'metadescription' => empty($data['metadescription'])  ? "" : $data['metadescription'],
                'image'          => empty($data['img'])             ? "" : $FileNameWithPath,
                'series'         => 0,
                'active'         => 1,
            ]);       
    }

    function update_series(Request $request){
        foreach ($request->data as $key => $value) {
            Category::where('_id', $value["id"])->update(['series' => $key]);
        }
        return true;
    }

    public function edit($id)
    {
        $CategoryData = Category::where('_id', base64_decode($id))->first();
        return view($this->path."edit")->with('CategoryData',$CategoryData);
    }

    public function update(Request $request)
    {
        $this->validators_update($request->all())->validate();
        $id         = base64_decode($request["IdHidden"]);
        $updatecatg = Category::where('_id', $id);
        $update     = $updatecatg->update([
                                            'title'          => $request["title"],
                                            'description'    => empty($request['description'])     ? "" : $request['description'],
                                            'top'            => (int)$request['top'],
                                            'pagetitle'      => empty($request['pagetitle'])       ? "" : $request['pagetitle'],
                                            'metakeywords'   => empty($request['metakeywords'])    ? "" : $request['metakeywords'],
                                            'metadescription' => empty($request['metadescription'])  ? "" : $request['metadescription'],
                                          ]);
    if(!empty($request->img)){
            $imagepath  = Category::select('image')->where('_id', $id)->first();
            $image_path = public_path($imagepath->image);
            $fileName   = strtotime('now').'.'.$request->img->extension();  
            $request->img->move(public_path('images/category'), $fileName);
            $updateIMG  = $updatecatg->update([
                                              'image'   => '/images/category/'.$fileName
                                            ]);
            if($updateIMG && !empty($imagepath->image)){
              if(file_exists($image_path)){
                unlink($image_path);
              }
            }
        }

        $msg    = "";
        if($update){
            $msg = 'Record updated succesfully..!!';
        }else{
            $msg = 'Something went wrong..!!';
        }
        return redirect()->route('category-list')->withSuccess($msg);
    }

    public function delete($id)
    {
        $id         = base64_decode($id);
        $imagepath  = Category::select('image')->where('_id', $id)->first();
        $image_path = public_path($imagepath->image);
        $return     = Category::where('_id',$id)->delete();
        $msg        = 'Something went wrong..!!';
        if($return){
            if(!empty($imagepath->image) && file_exists($image_path)){
              unlink($image_path);
            }
            $msg = 'Record deleted succesfully.';
        }
        return redirect()->route('category-list')->withSuccess($msg);
    }

    public function active(Request $request, $id)
    {
        $value  = $request->value == 'true' ? 1 : 0;
        $return = Category::where('_id',$id)->update(['active' => $value]);
        return response()->json(['return'=>$return]);
    }

}