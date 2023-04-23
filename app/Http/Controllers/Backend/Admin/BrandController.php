<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Backend\Admin\CommonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Brand;
use Auth;

class BrandController extends CommonController
{
    public $path ='admin.modules.brand.';

    protected function validators(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:100', 'unique:modules']
        ]);
    }

    public function list()
    {
        $Brands = Brand::get();
        return view($this->path."list")->with(['Brands' => $Brands]);
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
        return redirect()->route('brand-create')->withSuccess($msgz);
    }

    protected function store(array $data)
    {  
        return Brand::create([

                'title'           => $data['title'],
                'pagetitle'       => empty($data['pagetitle'])       ? "" : $data['pagetitle'],
                'metakeywords'    => empty($data['metakeywords'])    ? "" : $data['metakeywords'],
                'metadescription' => empty($data['metadescription'])  ? "" : $data['metadescription'],
                'active'          => 1,

            ]);       
    }

    public function edit($id)
    {
        $BrandData = Brand::where('_id', base64_decode($id))->first();
        return view($this->path."edit")->with('BrandData',$BrandData);
    }

    public function update(Request $request)
    {
        $this->validators($request->all())->validate();
        $id     = base64_decode($request["IdHidden"]);
        $update = Brand::where('_id', $id)->update([
                                                     'title'           => $request["title"],
                                                     'pagetitle'       => empty($request['pagetitle'])        ? "" : $request['pagetitle'],
                                                     'metakeywords'    => empty($request['metakeywords'])     ? "" : $request['metakeywords'],
                                                     'metadescription' => empty($request['metadescription'])  ? "" : $request['metadescription'],
                                                     'active'          => 1,
                                                   ]);
        $msg    = "";
        if($update){
            $msg = 'Record updated succesfully..!!';
        }else{
            $msg = 'Something went wrong..!!';
        }
        return redirect()->route('brand-list')->withSuccess($msg);
    }

    public function delete($id)
    {
        $id        = base64_decode($id);
        $return    = Brand::where('_id',$id)->delete();
        $msg       = 'Something went wrong..!!';
        if($return){
            $msg = 'Record deleted succesfully.';
        }
        return redirect()->route('brand-list')->withSuccess($msg);
    }

}
