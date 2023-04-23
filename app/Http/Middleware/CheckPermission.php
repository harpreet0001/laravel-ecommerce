<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Permission;
use App\Models\Module;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {   
        if(!empty(Auth::user()->role) && Auth::user()->role=="subadmin"){ 
                $route   = Route::getRoutes()->match($request); //where('slug',$route->getName())-> 
                $records = Permission::where('userid', Auth::user()->_id)->first();
                if(!empty($records)){
                    $recordsDecode  = json_decode($records->userpermissions);
                    if(sizeof($recordsDecode)>0){
                        $module_all     = Module::select('slug')->get()->toArray();
                        $module_refine  = Module::select('slug')->whereIn('_id',$recordsDecode)->get()->toArray();
                        $module_all     = array_column($module_all, 'slug');
                        $module_refine  = array_column($module_refine, 'slug');
                        if(in_array($route->getName(), $module_all) && !in_array($route->getName(), $module_refine)){
                            return redirect()->route('unauthorize');
                        }
                    }
                }
            }

        return $next($request);
    }
}
