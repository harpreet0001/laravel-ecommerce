<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Module;
use App\User;
use Auth;

class CommonController extends Controller
{
    public function CheckPermissions($parent){ /*Not in use and was used for permission checking. Now the Same function is checking permissions in the Helper.*/
        $parentRoute = Route::currentRouteName();
        $moduledata  = Module::where('type', $parent);
        if($parent==1){
            $ParentID   = Module::where('slug', $parentRoute)->first();
            $moduledata = $moduledata->where('parent', $ParentID->_id);
        }
        if(Auth::user()->role=='subadmin'){
            $records = Permission::where('userid', Auth::user()->_id)->first();
            if(!empty($records)){
                $recordsDecode  = json_decode($records->userpermissions);
                if(sizeof($recordsDecode)>0){
                    $moduledata = $moduledata->whereIn('_id',$recordsDecode);
                }
            }
        }
        $moduleGet = $moduledata->get();
        return $moduleGet;
    }

    public function unauthorize(){
        return view("admin.modules.unauthorize.unauthorize");
    }

}
