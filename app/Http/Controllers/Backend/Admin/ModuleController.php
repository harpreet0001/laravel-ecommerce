<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Backend\Admin\CommonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Module;
use App\Models\Permission;
use App\User;
use Auth;

class ModuleController extends CommonController
{

    public $path ='admin.modules.moduleManager.';

    protected function validators(array $data)
    {
        return Validator::make($data, [
            'title'     => ['required', 'string', 'max:100', 'unique:modules'],
            'slug'      => ['required', 'string', 'max:100', 'unique:modules'],
            'iconclass' => ['required']
        ]);
    }

    protected function validators_update(array $data)
    {
        return Validator::make($data, [
            'title'     => ['required', 'string', 'max:100', 'unique:modules']
        ]);
    }

    public function list()
    {
        $Modules = Module::with('WithChild')->where('parent', '0')->orderBy('serial', 'ASC')->get(); //->toArray();
        return view($this->path."list")->with(['Modules' => $Modules]);
    }

    public function create()
    {
        $parentmodule = Module::where('type', 0)->where('active',1)->get();
        return view($this->path."create")->with('parentmodule',$parentmodule);
    }

    public function store(Request $request)
    {
        $this->validators($request->all())->validate();
        $return_result = $this->save($request->all()); 
        $msgz = "";
        if($return_result){
            $msgz = 'Record Saved Succesfully..!!';
        }else{
            $msgz = 'Something went wrong..!!';
        }       
        return redirect()->route('module-create')->withSuccess($msgz);
    }

    protected function save(array $data)
    {  
        return Module::create([
                'title'     => $data['title'],
                'slug'      => $data['slug'],
                'slugparam' => $data['slugparam'],
                'type'      => (int)$data['type'],
                'parent'    => empty($data['parent']) ? "0" : $data['parent'],
                'iconclass' => $data['iconclass'],
                'usetype'   => (int)$data['usetype'],
                'isshow'    => (int)$data['isshow'],
                'active'    => 1,
                'serial'    => 0,
            ]);       
    }

    function update_series(Request $request){
        foreach ($request->data as $key => $value) {
            Module::where('_id', $value["id"])->update(['serial' => $key]);
        }
        return GetPermittedSideManu();
    }

    public function edit($id)
    {   
        $ModuleData = Module::where('_id', base64_decode($id))->first();
        return view($this->path."edit")->with('ModuleData',$ModuleData);
    }

    public function update(Request $request)
    {
        $this->validators_update($request->all())->validate();
        $id     = base64_decode($request["IdHidden"]);
        $update = Module::where('_id', $id)->update(['title' => $request["title"]]);
        $msg    = "";
        if($update){
            $msg = 'Record updated succesfully..!!';
        }else{
            $msg = 'Something went wrong..!!';
        }
        return redirect()->route('module-list')->withSuccess($msg);
    }

    public function delete($id)
    {
        $id        = base64_decode($id);
        $return    = Module::where('_id',$id)->delete();
        $DelChild  = Module::where('parent',$id)->delete();
        $msg       = 'Something went wrong..!!';
        if($return){
            $msg = 'Record deleted succesfully.';
        }
        return redirect()->route('module-list')->withSuccess($msg);
    }

    public function active(Request $request, $id){
        $value  = $request->value == 'true' ? 1 : 0;
        $return = Module::where('_id',$id)->update(['active' => $value]);
        return response()->json(['return'=>$return]);
    }
}
