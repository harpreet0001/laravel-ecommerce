<?php

namespace App\Http\Controllers\Backend\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Models\ShippingZone;
use App\Models\ShippingMethod;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Backend\Admin\CommonController;

class ShippingmethodController extends CommonController
{

	public $path ='admin.modules.shippingmethod.';

    protected function validators(array $data,$shippingmethodId = null)
    {
        $fixedshippingmethods         = array_keys(fixedShippingMethods());
        $implode_fixedshippingmethods = implode(',',$fixedshippingmethods);
        $rules = [

                'methodmodule'   => ['required', 'string', 'in:'.$implode_fixedshippingmethods],
                'methodname'     => ['required', 'string', 'max:255','unique:shipping_methods'],
        ];

        if(!is_null($shippingmethodId))
        {
            $rules = array_merge($rules,['methodname' => ['required', 'string', 'max:255','unique:shipping_methods,'.$shippingmethodId] ]);
        }

        $messages = [];

        if($data['methodmodule'] == $fixedshippingmethods[0])
        {
            $rules = array_merge($rules,[

                       'shipping_peritem_cost'   => [
                                                        'required_if:methodmodule,==,'.$fixedshippingmethods[0],
                                                        'numeric',
                                                        'min:1',
                                                        'max:1000000000000000'
                                                    ],
            ]);

            $messages = array_merge($messages,[

                        'shipping_peritem_cost.required_if'   => 'Filed is required',
                        'shipping_peritem_cost.numeric'       => 'Filed should have numeric value' ,
                        'shipping_peritem_cost.min'           => 'Filed should have minimum value 1',
                        'shipping_peritem_cost.max'           => 'Filed should have maximum value 1000000000000000',
            ]);
        }

        if($data['methodmodule'] == $fixedshippingmethods[1])
        {
            $rules = array_merge($rules,[
                    
                    'shipping_byweight_defaultcost' => [
                                                          'required_if:methodmodule,==,'.$fixedshippingmethods[1],
                                                          'numeric',
                                                          'min:1',
                                                          'max:1000000000000000'
                                                       ],

                    'shipping_byweight_lower.*'    =>  [
                                                         'nullable',
                                                         'required_with:shipping_byweight_upper.*',
                                                         'required_with:shipping_byweight_cost.*',
                                                         'numeric',
                                                         'min:1',
                                                         'max:1000000000000000'
                                                       ], 

                    'shipping_byweight_upper.*'     => [
                                                          'nullable',
                                                          'required_with:shipping_byweight_lower.*',
                                                          'required_with:shipping_byweight_cost.*',
                                                          'numeric',
                                                          'min:1',
                                                          'max:1000000000000000'
                                                        ],   
                    'shipping_byweight_cost.*'     =>  [
                                                          'nullable',
                                                          'required_with:shipping_byweight_lower.*',
                                                          'required_with:shipping_byweight_upper.*',
                                                          'numeric',
                                                          'min:0',
                                                          'max:1000000000000000'
                                                        ],                                                                       
            ]);

            $messages = array_merge($messages,[

              'shipping_byweight_defaultcost.required_if'  => 'Field is required' ,
              'shipping_byweight_defaultcost.numeric'      => 'Filed should have numeric value' ,
              'shipping_byweight_defaultcost.min'          => 'Filed should have minimum value 1' ,
              'shipping_byweight_defaultcost.max'          => 'Filed should have maximum value 1000000000000000', 
              'shipping_byweight_lower.*.required_with'    => 'Filed is required',
              'shipping_byweight_lower.*.numeric'          => 'Filed should have numeric value',
              'shipping_byweight_lower.*.min'              => 'Filed should have minimum value 1', 
              'shipping_byweight_lower.*.max'              => 'Filed should have maximum value 1000000000000000',
              'shipping_byweight_upper.*.required_with'    => 'Filed is required',
              'shipping_byweight_upper.*.numeric'          => 'Filed should have numeric value',
              'shipping_byweight_upper.*.min'              => 'Filed should have minimum value 1', 
              'shipping_byweight_upper.*.max'              => 'Filed should have maximum value 1000000000000000',
              'shipping_byweight_cost.*.required_with'     => 'Filed is required',
              'shipping_byweight_cost.*.numeric'           => 'Filed should have numeric value',
              'shipping_byweight_cost.*.min'               => 'Filed should have minimum value 1', 
              'shipping_byweight_cost.*.max'               => 'Filed should have maximum value 1000000000000000',
                      
            ]);
        }

        if($data['methodmodule'] == $fixedshippingmethods[2])
        {
            $rules = array_merge($rules,[
                    
                    'shipping_bytotal_defaultcost' => [
                                                          'required_if:methodmodule,==,'.$fixedshippingmethods[1],
                                                          'numeric',
                                                          'min:1',
                                                          'max:1000000000000000'
                                                       ],

                    'shipping_bytotal_lower.*'    =>  [
                                                         'nullable',
                                                         'required_with:shipping_bytotal_upper.*',
                                                         'required_with:shipping_bytotal_cost.*',
                                                         'numeric',
                                                         'min:1',
                                                         'max:1000000000000000'
                                                       ], 

                    'shipping_bytotal_upper.*'     => [
                                                          'nullable',
                                                          'required_with:shipping_bytotal_lower.*',
                                                          'required_with:shipping_bytotal_cost.*',
                                                          'numeric',
                                                          'min:1',
                                                          'max:1000000000000000'
                                                        ],   
                    'shipping_bytotal_cost.*'     =>  [
                                                          'nullable',
                                                          'required_with:shipping_bytotal_lower.*',
                                                          'required_with:shipping_bytotal_upper.*',
                                                          'numeric',
                                                          'min:0',
                                                          'max:1000000000000000'
                                                        ],                                                                       
            ]);

            $messages = array_merge($messages,[

              'shipping_bytotal_defaultcost.required_if'  => 'Field is required' ,
              'shipping_bytotal_defaultcost.numeric'      => 'Filed should have numeric value' ,
              'shipping_bytotal_defaultcost.min'          => 'Filed should have minimum value 1' ,
              'shipping_bytotal_defaultcost.max'          => 'Filed should have maximum value 1000000', 
              'shipping_bytotal_lower.*.required_with'    => 'Filed is required',
              'shipping_bytotal_lower.*.numeric'          => 'Filed should have numeric value',
              'shipping_bytotal_lower.*.min'              => 'Filed should have minimum value 1', 
              'shipping_bytotal_lower.*.max'              => 'Filed should have maximum value 1000000',
              'shipping_bytotal_upper.*.required_with'    => 'Filed is required',
              'shipping_bytotal_upper.*.numeric'          => 'Filed should have numeric value',
              'shipping_bytotal_upper.*.min'              => 'Filed should have minimum value 1', 
              'shipping_bytotal_upper.*.max'              => 'Filed should have maximum value 1000000',
              'shipping_bytotal_cost.*.required_with'     => 'Filed is required',
              'shipping_bytotal_cost.*.numeric'           => 'Filed should have numeric value',
              'shipping_bytotal_cost.*.min'               => 'Filed should have minimum value 1', 
              'shipping_bytotal_cost.*.max'               => 'Filed should have maximum value 1000000',
                      
            ]);
        }

        if($data['methodmodule'] == $fixedshippingmethods[3])
        {
          $rules = array_merge($rules,[

                       'shipping_flatrate'   => [
                                                        'required_if:methodmodule,==,'.$fixedshippingmethods[3],
                                                        'numeric',
                                                        'min:1',
                                                        'max:1000000'
                                                    ],
            ]);

            $messages = array_merge($messages,[

                        'shipping_flatrate.required_if'   => 'Filed is required',
                        'shipping_flatrate.numeric'       => 'Filed should have numeric value' ,
                        'shipping_flatrate.min'           => 'Filed should have minimum value 1',
                        'shipping_flatrate.max'           => 'Filed should have maximum value 1000000',
            ]);
        }
          

        return Validator::make($data,$rules,$messages);
    }

  public function list($id)
  { 
     $shippingzoneId     = base64_decode($id);
     $shippingzone       = ShippingZone::where('_id',$shippingzoneId)->where('delete','!=',1)->first();
     if(is_null($shippingzone))
     {
        return abort('404');
     }
     $shippingmethodList = ShippingMethod::where('shippingzoneId',$shippingzone->_id)->where('delete','!=',1)->orderBy('_id','desc')->get();
     return view($this->path.'list')->with(['shippingzone' => $shippingzone,'shippingmethodList' => $shippingmethodList]);
  }

  public function create($id)
  {
     $shippingzoneId     = base64_decode($id);
     $shippingzone       = ShippingZone::where('_id',$shippingzoneId)->where('delete','!=',1)->first();
     return view($this->path.'create')->with(['shippingzone' => $shippingzone]);
  }

  public function save(Request $request,$shippingzoneId)
  {
      $this->validators($request->all())->validate();
      $return_result = $this->store($request->all(),$shippingzoneId); 
      $msgz = "";
      if($return_result){
          $msgz = 'Record Saved Succesfully..!!';
          session()->flash('success',$msgz);
          return response()->json(['success'=>$msgz,'redirect_url' => route('shippingmethod-list',base64_encode($shippingzoneId)),'status' =>1],200);
      }else{
          $msgz = 'Something went wrong..!!';
          session()->flash('error',$msgz);
          return response()->json(['success'=>$msgz,'status' =>0],404);
      }       
      
  }

  public function edit($shippingzoneId,$shippingmethodId)
  {
     $shippingzoneId   = base64_decode($shippingzoneId);
     $shippingzone     = ShippingZone::where('_id',$shippingzoneId)->where('delete','!=',1)->first();
     $shippingmethodId = base64_decode($shippingmethodId);
     $shippingmethod   = ShippingMethod::where([  
                                                  'shippingzoneId' => $shippingzone->_id,
                                                  '_id'            => $shippingmethodId

                                                ])->where('delete','!=',1)->first();

    $moduleSettingHtml = view($this->path.'.setting.'.$shippingmethod->methodmodule,compact('shippingmethod'))->render();
        
    return view($this->path.'edit')->with(['shippingzone' => $shippingzone,'shippingmethod' => $shippingmethod,'moduleSettingHtml'=> $moduleSettingHtml]);  
  }

  public function update(Request $request,$shippingzoneId,$shippingmethodId)
  {
     $shippingzone = ShippingZone::where('_id',$shippingzoneId)->where('delete','!=',1)->first();
     if(is_null($shippingzone))
     {
        return response()->json(['error' => 'Shippingzone not found','status' => 0],404);
     }

    $shippingmethod  = ShippingMethod::where([  
                                                'shippingzoneId' => $shippingzone->_id,
                                                '_id'            => $shippingmethodId

                                              ])->where('delete','!=',1)->first();
     if(is_null($shippingmethod))
     {
        return response()->json(['error' => 'Shippingmethod not found','status' => 0],404);
     }

     $this->validators($request->all(),$shippingmethod->_id)->validate();
     $return_result = $this->store($request->all(),$shippingzoneId,$shippingmethod); 
      $msgz = "";
      if($return_result){
          $msgz = 'Record Updated Succesfully..!!';
          session()->flash('success',$msgz);
          return response()->json(['success'=>$msgz,'redirect_url' => route('shippingmethod-list',base64_encode($shippingzoneId)),'status' =>1],200);
      }else{
          $msgz = 'Something went wrong..!!';
          session()->flash('error',$msgz);
          return response()->json(['success'=>$msgz,'status' =>0],404);
      }   
  }

  public function GetShippingModuleProperties(Request $request)
  {
      $module = $request->module;
      switch ($module)
      {
        case 'shipping_peritem':
              return view($this->path.'setting'.'.'.$module); 
              break;
        case 'shipping_byweight':
              return view($this->path.'setting'.'.'.$module);
              break;
        case 'shipping_bytotal':
              return view($this->path.'setting'.'.'.$module);
              break;
        case 'shipping_flatrate':
              return view($this->path.'setting'.'.'.$module);
              break;        
        default:
              return 'Not found!';
          break;
      }
  }

  public function delete($shippingzoneId,$shippingmethodId)
  {
     $shippingzoneId   = base64_decode($shippingzoneId);
     $shippingzone     = ShippingZone::where('_id',$shippingzoneId)->where('delete','!=',1)->first();
     if(is_null($shippingzone)){
        return abort('404');
     }
     $shippingmethodId = base64_decode($shippingmethodId);
     $shippingmethod   = ShippingMethod::where([  
                                                  'shippingzoneId' => $shippingzone->_id,
                                                  '_id'            => $shippingmethodId

                                                ])->where('delete','!=',1)->first();
     if(is_null($shippingzone)){
        return abort('404');
     }

     if($shippingmethod->default == 1)
     {
         return back()->withError('Default shipping method can not be deleted');
     }

    $DelShippingmethod = $shippingmethod->delete();
    $msg        = 'Something went wrong..!!';
    if($DelShippingmethod){
          $msg = 'Record deleted succesfully.';
    }
    return redirect()->route('shippingmethod-list',base64_encode($shippingzoneId))->withSuccess($msg);

  }

  public function enabled(Request $request, $id)
  {
        $value  = $request->value == 'true' ? 1 : 0;
        $return = ShippingMethod::where('_id',$id)->update(['methodenabled' => $value]);
        return response()->json(['return'=>$return]);
  }

  protected function store(array $data,$shippingzoneId,$shippingmethod=null)
  {

      $db = [
          'shippingzoneId' => $shippingzoneId,
          'methodmodule'   => $data['methodmodule'],
          'methodname'     => $data['methodname'],
          'methodenabled'  => isset($data['methodenabled']) ? 1 : 0,
          'methoddetails'  => "",
          'default'        => 0,
          'delete'         => 0
      ];

      switch ($data['methodmodule']) 
      {
          case 'shipping_peritem':
            $db['methoddetails'] = json_encode(['defaultcost' => (float) $data['shipping_peritem_cost']]);
            break;
          
          case 'shipping_byweight':

            $shipping_byweightArr = array_map(function($lower,$upper,$cost){

                if(!is_null($lower) && !is_null($upper) && !is_null($cost)){
                   return  ['lower' => $lower,'upper' => $upper,'cost' => $cost];
                }

            },$data['shipping_byweight_lower'],$data['shipping_byweight_upper'],$data['shipping_byweight_cost']);

            $shipping_byweightArr = array_filter($shipping_byweightArr,function($val){

                     return !is_null($val);
            });

            $db['methoddetails'] = json_encode([
                                                  'defaultcost' => (float) $data['shipping_byweight_defaultcost'],
                                                  'ranges'      => $shipping_byweightArr
                                                ]);
            break;

          case 'shipping_bytotal':

            $shipping_bytotalArr = array_map(function($lower,$upper,$cost){

                 if(!is_null($lower) && !is_null($upper) && !is_null($cost)){
                   return  ['lower' => $lower,'upper' => $upper,'cost' => $cost];
                }
                
            },$data['shipping_bytotal_lower'],$data['shipping_bytotal_upper'],$data['shipping_bytotal_cost']);

             $shipping_bytotalArr = array_filter($shipping_bytotalArr,function($val){

                     return !is_null($val);
            });

            $db['methoddetails'] = json_encode([
                                                  'defaultcost' => (float) $data['shipping_bytotal_defaultcost'],
                                                  'ranges'      => $shipping_bytotalArr
                                                ]);
            break;

            default:
            $db['methoddetails'] = json_encode(['defaultcost' => (float) $data['shipping_flatrate']]);
            break;
           
      }

      if($data['_method'] != 'patch')
      {
         return ShippingMethod::create($db);
      }
      else
      {
        if($shippingmethod->default == 1)
        {
           $db['default'] = 1;
        }
        return tap($shippingmethod)->fill($db)->update();
      }

  }


}  