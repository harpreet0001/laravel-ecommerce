<?php

namespace App\Http\Controllers\Backend\Admin;

use Auth;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\ShippingZone;
use App\Models\ShippingMethod;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Backend\Admin\CommonController;

class ShippingzoneController extends CommonController
{

	public $path ='admin.modules.shippingzone.';

  protected function validators(array $data,$id =null)
  {
        $rules = [

                    'zonename'      => ['required','string', 'min:1','max:255','unique:shipping_zones,zonename'],                    
                    'zonecountry'   => ['required','unique:shipping_zones,zonecountry'],
                 ];

        if($data['_method'] == 'patch'){

            $rules = array_merge($rules,[
                   
                   'zonename'    => 'required|string|min:1|max:255|unique:shipping_zones,zonename,'.$id.',_id',
                   'zonecountry' => 'required|unique:shipping_zones,zonecountry,'.$id.',_id',
            ]);
        }      

        return Validator::make($data,$rules);
  }

  public function list()
  {
     $ShippingzoneList = ShippingZone::where('delete','!=',1)->get();
     return view($this->path.'list')->with(['ShippingzoneList' => $ShippingzoneList]);
  }

  public function create()
  {
     $countries = Country::all();
     return view($this->path.'create')->with([
              
              'countries' => $countries,
     ]);
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
      return redirect()->route('shippingzone-list')->withSuccess($msgz);
  }

  public function edit($id)
  {
      $ShippingzoneData = ShippingZone::where('_id',base64_decode($id))->where('delete','!=',1)->first();
        if(is_null($ShippingzoneData)){
             abort('404');
      }
      $countries = Country::all();
      return view($this->path."edit")->with(['ShippingzoneData' => $ShippingzoneData,'countries' => $countries]);
  }

  public function update(Request $request,$id)
  {
      $shippingzone = ShippingZone::where('_id', base64_decode($id))->first();
      $this->validators($request->all(),$shippingzone->_id)->validate();
      $return_result = $this->store($request->all(),$shippingzone); 
      $msgz = "";
      if($return_result){
          $msgz = 'Record Updated Succesfully..!!';
      }else{
          $msgz = 'Something went wrong..!!';
      }       
      return redirect()->route('shippingzone-list')->withSuccess($msgz);
  }

    public function delete($id)
    {
        $id           = base64_decode($id);
        $shippingzone = ShippingZone::where('_id',$id)->first();
        if($shippingzone->default == 1)
        {
          return redirect()->route('shippingzone-list')->withError('Default shopping zone can not be deleted.');
        }

        $msg   = 'Something went wrong..!!';

        ShippingMethod::where('shippingzoneId',$shippingzone->_id)->delete();
        $return = $shippingzone->delete();

        if($return){
            $msg = 'Record deleted succesfully.';
        }
        return redirect()->route('shippingzone-list')->withSuccess($msg);
    }

    public function enabled(Request $request, $id)
    {
        $value  = $request->value == 'true' ? 1 : 0;
        $return = ShippingZone::where('_id',$id)->update(['zoneenabled' => $value]);
        return response()->json(['return'=>$return]);
    }

    protected function store(array $data,$shippingzone = null)
    { 

        $db = [

            'zonename'      => $data['zonename'],
            'zonetype'      => 'country',
            'zonecountry'   => $data['zonecountry'],
            'zoneenabled'   => (int)$data['zoneenabled'],
            'default'       => 0,
            'delete'        => 0
        ]; 

        if(is_null($shippingzone) || $data['_method'] != 'patch') {
            return ShippingZone::create($db);
        }
        else {

             if($shippingzone->default == 1)
             {
               $db['default'] = 1;
             }

            return tap($shippingzone)->fill($db)->update();
        } 
       
    }

}  

