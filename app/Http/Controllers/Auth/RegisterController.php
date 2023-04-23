<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Traits\NewsletterTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers,NewsletterTrait;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/login';
  /*  protected function redirectTo(){
    
        //return redirect()->route('projects')->with('info', 'welcome');
        return redirect('/login')->with('message','Please verify your e-mail first.');
        
    }*/
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

            'firstname' => ['required', 'string','regex:/^[\pL\s\-]+$/','max:255'],
            'lastname'  => ['required', 'string','regex:/^[\pL\s\-]+$/','max:255'],
            'email'     => ['required', 'string', 'email','regex:/^([a-zA-Z0-9_\-\.])+\@([a-zA-Z0-9\-])+\.[a-zA-Z]{2,4}$/i','max:255','unique:users,email'],
            'password'  => ['required', 'string', 'min:8','max:100','confirmed'],
            'contact'   => ['required','min:9','max:15'],
            'agree'     => ['required','in:1']

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    { 
        $user =  User::create([
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

         if(isset($data['newsletter']) &&  $data['newsletter'] == Newsletter::$subscribe){
            $this->create_newsletter_subscription($data['email']);
        }  

        return $user;
 
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        return redirect($this->redirectPath())->with('success', 'Please Verify your E-mail First.');
    }
}


