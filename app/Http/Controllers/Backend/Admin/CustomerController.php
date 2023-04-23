<?php

namespace App\Http\Controllers\Backend\Admin;

use Auth;
use App\User;
use App\Models\Module;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Traits\NewsletterTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Backend\Admin\CommonController;

use DataTables;


class CustomerController extends CommonController
{   
    use RegistersUsers,NewsletterTrait;

    public $path ='admin.modules.customer.';
    
    protected function validator(array $data)
    {
        return Validator::make($data, [

            'firstname' => ['required', 'string','regex:/^[\pL\s\-]+$/','max:255'],
            'lastname'  => ['required', 'string','regex:/^[\pL\s\-]+$/','max:255'],
            'email'     => ['required', 'string', 'email','regex:/^([a-zA-Z0-9_\-\.])+\@([a-zA-Z0-9\-])+\.[a-zA-Z]{2,4}$/i','max:255','unique:users,email'],
            'password'  => ['required', 'string', 'min:8','max:100','confirmed'],
            'contact'   => ['required','string','min:9','max:15','regex:/^([0-9]){9,15}$/i'],

        ]);
    }

    protected function validator_update(array $data)
    {
        return Validator::make($data, [

            'firstname' => ['required', 'string','regex:/^[\pL\s\-]+$/','max:255'],
            'lastname'  => ['required', 'string','regex:/^[\pL\s\-]+$/','max:255'],
            'email'     => ['required', 'string', 'email','regex:/^([a-zA-Z0-9_\-\.])+\@([a-zA-Z0-9\-])+\.[a-zA-Z]{2,4}$/i','max:255'],
            'contact'   => ['required','min:9','max:15']

        ]);
    }


    public function list(Request $request)
    {   
        $pagination = (request()->limit) ? (int)(request()->limit) : 10;

        $Customers = User::where('role','customer')->where('delete','!=',1);

        //commment::-----searchfilter----- 
        if($request->has('searchQuery')){ 

            $searchText = $request->searchQuery;
            $Customers  = $Customers->orWhere('email','like', '%'. $searchText.'%')
                                    ->orWhere('firstname','like', '%'. $searchText.'%')
                                    ->orWhere('lastname','like', '%'. $searchText.'%');                   
        }
        //-------------------------------------------

        $Customers = $Customers->orderBy('_id', 'DESC')->paginate($pagination);

        if($request->ajax()){
            return view($this->path."records")->with(['Customers' => $Customers])->render();
        } 
            return view($this->path."list")->with(['Customers' => $Customers]);
    }

    public function create()
    {
        return view($this->path."create");
    }

    public function save(Request $request)
    {
        $this->validator($request->all())->validate();
        $return_result = $this->store($request->all()); 
        $msgz = "";
        if($return_result){
            $msgz = 'Record Saved Succesfully..!!';
        }else{
            $msgz = 'Something went wrong..!!';
        }       
        return redirect()->route('customer-create')->withSuccess($msgz);
    }

    protected function store(array $data)
    {  
        $CreateUser = User::create([
                                        'firstname' => $data['firstname'],
                                        'lastname'  => $data['lastname'],
                                        'email'     => $data['email'],
                                        'password'  => Hash::make($data['password']),
                                        'contact'   => $data['contact'],
                                        'role'      => 'customer',
                                        'loggedin'  => 0,
                                        'active'    => 1,
                                        'delete'    => 0
                                    ]);      

        if(!is_null($CreateUser) && isset($data['newsletter']) &&  $data['newsletter'] == Newsletter::$subscribe){
            $this->create_newsletter_subscription($data['email']);
        }
        
        //send-registration-email
        event(new Registered($CreateUser));

        if($CreateUser){
            return true;
        }         
    }

    public function edit($id)
    {
        $CustomerData = User::where('_id', base64_decode($id))->first();
        return view($this->path."edit")->with('CustomerData',$CustomerData);
    }

    public function update(Request $request)
    {
        $this->validator_update($request->all())->validate();
        $id     = base64_decode($request["IdHidden"]);
        $update = User::where('_id', $id)->update([
                                                    'firstname' => $request['firstname'],
                                                    'lastname'  => $request['lastname'],
                                                    'email'     => $request['email'],
                                                    'contact'   => $request['contact']
                                                ]); 
        $msg    = "";
        if($update){
            $msg = 'Record updated succesfully..!!';
        }else{
            $msg = 'Something went wrong..!!';
        }
        return redirect()->route('customer-list')->withSuccess($msg);
    }

    public function delete($id)
    {
        $id     = base64_decode($id);
        //$return = User::where('_id',$id)->delete();
        $return = User::where('_id',$id)->update(['delete' => 1]);
        $msg    = 'Something went wrong..!!';
        if($return){
            $msg = 'Record deleted succesfully.';
        }
        return redirect()->route('customer-list')->withSuccess($msg);
    }

    public function import(Request $request)
    {

        abort('404');
        if($request->method() == 'GET'){

          return view($this->path.'import');
       }

       if($request->method() == 'POST')
       {
           $this->validate($request,[

                 'import_file' => 'required|file:5000'
           ]);

            Excel::import(new CustomersImport, $request->file('import_file'));

       }

       return abort('404');  
    }

    public function active(Request $request, $id){
        $value  = $request->value == 'true' ? 1 : 0;
        $return = User::where('_id',$id)->update(['active' => $value]);
        return response()->json(['return'=>$return]);
    }

}
