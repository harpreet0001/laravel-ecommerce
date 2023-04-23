<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Backend\Admin\CommonController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Models\Module;
use App\Models\Role;
use App\Models\Permission;
use Auth;


class UserController extends CommonController
{
    public $path ='admin.modules.users.';

    protected function validators(array $data)
    {
        return Validator::make($data, [
            'firstname'         => ['required', 'string','regex:/^[\pL\s\-]+$/','max:255'],
            'lastname'          => ['required', 'string','regex:/^[\pL\s\-]+$/','max:255'],
            'contact'           => ['required','string','min:9','max:15','regex:/^([0-9]){9,15}$/i'],
            'email'             => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users'],
            'password'          => ['required', 'string', 'min:8'], //, 'confirmed'
            'assignrole'        => ['required' ],
            'userpermissions'   => ['required' ],
        ]);
    }

    protected function validators_update(array $data)
    {
        return Validator::make($data, [
            'firstname'         => ['required', 'string','regex:/^[\pL\s\-]+$/','max:255'],
            'lastname'          => ['required', 'string','regex:/^[\pL\s\-]+$/','max:255'],
            'contact'           => ['required','string','min:9','max:15','regex:/^([0-9]){9,15}$/i'],
            'email'             => ['required', 'string', 'email:rfc,dns', 'max:255'],
            'assignrole'        => ['required' ],
            'userpermissions'   => ['required' ],
        ]);
    }

    public function list()
    {   
        //$users =  User::where('role','subadmin')->get();
        $users =  User::where('role','subadmin')->with('UserPermission')->orderBy('_id','DESC')->get();
        return view($this->path."list")->with(['users' => $users]);
    }

    public function create()
    {
        $modules    = Module::where('active',1)->where('isshow',0)->get();
        $role       = Role::where('active',1)->get();
        return view($this->path."create")->with(['modules' => $modules, 'role' => $role]);
    }

    public function save(Request $request){
        $this->validators($request->all())->validate();
        $return_result = $this->store($request->all()); 
        $msgz = "";
        if($return_result){
            $msgz = 'Record Save Succesfully..!!';
        }else{
            $msgz = 'Something went wrong..!!';
        }       
        return redirect()->route('user-create')->withSuccess($msgz);
    }

    protected function store(array $data)
    {
        $saveUser = User::create([
                                    'firstname'         => $data['firstname'],
                                    'lastname'          => $data['lastname'],
                                    'email'             => $data['email'],
                                    'password'          => Hash::make($data['password']),
                                    'contact'           => $data['contact'] ?? '',
                                    //'email_verified_at' => '',
                                    'role'              => 'subadmin',
                                    'newsletter'        => 0,
                                    'loggedin'          => 1,
                                    'active'            => 1,
                                    'delete'            => 0,
                                ]);

        if(!empty($saveUser->_id)){
            $permissionJson = json_encode(empty($data["userpermissions"]) ? array() : $data["userpermissions"]); 
            $savePermis     = Permission::create([
                                    'userid'            => $saveUser->_id,
                                    'usertype'          => $data['assignrole'],
                                    'userpermissions'   => $permissionJson,
                                ]); 
        }
         
        return $saveUser;        
    }

    public function edit($id)
    {   
        $users   = User::where('role','subadmin')->with('UserPermission')->where("_id", base64_decode($id))->first();
        $modules = Module::where('active',1)->where('isshow',0)->get();
        $role    = Role::where('active',1)->get();
        return view($this->path."edit")->with(['modules' => $modules, 'role' => $role, 'users' => $users]);
    }

    public function update(Request $request)
    {   
        $this->validators_update($request->all())->validate();
        $id         = base64_decode($request["IdHidden"]);
        $updateUser = User::where('_id', $id);
        $updateOne  = $updateUser->update([
                                    'firstname'  => $request['firstname'],
                                    'lastname'   => $request['lastname'],
                                    'email'      => $request['email'],
                                    'contact'    => $request['contact'] ?? '',
                                ]);
        if(!empty($request['password'])){

            $passUpdate = $updateUser->update([
                                             'password' => Hash::make($request['password']),
                                             ]);
        }

        if($updateOne){
            $permissionJson = json_encode(empty($request["userpermissions"]) ? array() : $request["userpermissions"]); 
            $updatePermis   = Permission::where('userid', $id)->update([
                                    'usertype'          => $request['assignrole'],
                                    'userpermissions'   => $permissionJson,
                                ]); 
        }

        $msg    = "";
        if($updateUser){
            $msg = 'Record updated succesfully..!!';
        }else{
            $msg = 'Something went wrong..!!';
        }
        return redirect()->route('user-list')->withSuccess($msg);
    }

    public function delete($id)
    {
        $id      = base64_decode($id);
        $DelUser = User::where('_id', $id)->delete();
        $Delprmt = Permission::where('userid', $id)->delete();
        $msg     = 'Something went wrong..!!';
        if($DelUser){
            $msg = 'Record deleted succesfully.';
        }
        return redirect()->route('user-list')->withSuccess($msg);
    }

    public function active(Request $request, $id)
    {
        $value  = $request->value == 'true' ? 1 : 0;
        $return = User::where('_id',$id)->update(['active' => $value]);
        return response()->json(['return'=>$return]);
    }
}
