<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Backend\Admin\CommonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;
use App\Models\Module;
use Auth;

class RoleController extends CommonController
{
   public $path ='admin.modules.role.';

   protected function validators(array $data)
    {
        return Validator::make($data, [
            'role'          => ['required', 'string', 'max:255'],
            //'permissions'   => ['required'],
        ]);
    }

   public function list()
    {   
        $roles = Role::get();
        return view($this->path."list")->with(['roles' => $roles]);
    }

    public function create()
    {
        $modules = Module::where('active',1)->where('isshow',0)->get();
        return view($this->path."create")->with('modules',$modules);
    }

    public function save(Request $request){
        $this->validators($request->all())->validate();
        $return_result = $this->store($request->all()); 
        $msgz = "";
        if($return_result){
            $msgz = 'Record Saved Succesfully..!!';
        }else{
            $msgz = 'Something went wrong..!!';
        }       
        return redirect()->route('role-create')->withSuccess($msgz);
    }

    protected function store(array $data)
    {
        $Rolerecords = json_encode(empty($data["permissions"]) ? array() : $data["permissions"]); 
        return Role::create([
            'role'        => $data['role'],
            'permissions' => $Rolerecords,
            'active'      => 1
        ]);         
    }

    public function rolemodule($id){
        $Modules            = Module::where('active',1)->where('isshow',0)->get();
        $rolePermissions    = Role::select('permissions')->where('_id', $id)->first();
        $persmission_Array  = json_decode($rolePermissions->permissions);
        $li_data            = "";
        
        foreach ($Modules as $moduleKey => $modulevalue) {
           $role_checked = "";
           if(sizeof($persmission_Array)>0){
                if(in_array($modulevalue->_id, $persmission_Array)){
                    $role_checked = "checked='checked'";
                }else{
                    $role_checked = "";
                }
            }
           $li_data.= '<li>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="modulecheckbox custom-control-input @error("userpermissions") is-invalid @enderror" id="customCheck_'.$modulevalue->_id.'" '.$role_checked.' name="userpermissions[]" value="'.$modulevalue->_id.'">
                              <label class="custom-control-label" for="customCheck_'.$modulevalue->_id.'">'.$modulevalue->title.'</label>
                            </div>
                       </li>';
        }
        
        return $li_data; //json_encode(['retun_data' => $li_data]);
    }

    public function edit($id)
    {   
        $modules = Module::where('active',1)->where('isshow',0)->get();
        $role    = Role::where('_id', base64_decode($id))->first();
        return view($this->path."edit")->with(['role' => $role, 'modules' => $modules]);
    }

    public function update(Request $request)
    {
        $this->validators($request->all())->validate();
        $id     = base64_decode($request["IdHidden"]);
        $Permit = json_encode(empty($request["permissions"]) ? array() : $request["permissions"]); 
        $update = Role::where('_id', $id)->update(['role' => $request["role"], 'permissions' => $Permit]);
        $msg    = "";
        if($update){
            $msg = 'Record updated succesfully..!!';
        }else{
            $msg = 'Something went wrong..!!';
        }
        return redirect()->route('role-list')->withSuccess($msg);
    }

    public function delete($id)
    {
        $id      = base64_decode($id);
        $DelRole = Role::find($id);
        $return  = $DelRole->delete();
        $msg     = 'Something went wrong..!!';
        if($return){
            $msg = 'Record deleted succesfully.';
        }
        return redirect()->route('role-list')->withSuccess($msg);
    }

    public function active(Request $request, $id){
        $value  = $request->value == 'true' ? 1 : 0;
        $return = Role::where('_id',$id)->update(['active' => $value]);
        return response()->json(['return'=>$return]);
    }
}
