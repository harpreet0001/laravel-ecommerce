<?php

namespace App\Http\Controllers\Auth;

use DB;
use App\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /*Validation User */
        // protected function attemptLogin(Request $request)
        // {
        //     $CheckValid = $this->guard()->attempt(
        //         $this->credentials($request), $request->filled('remember')
        //     );
        //     echo '<pre>'; print_r($CheckValid); die;
        //    /* if(!$CheckValid){
        //        throw ValidationException::withMessages([
        //           $this->username() => [trans('auth.activefailed')],
        //       ]);
        //     }*/ 

        // }
        protected function credentials(Request $request)
        { 
            $request->merge([
                'active' => 1,
            ]);
            return $request->only($this->username(), 'password', 'active');
        }
    /*End*/

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo() {
      $role = \Auth::user()->role;
      switch ($role) {
        case 'admin':
          return '/admin';
        break;
        case 'customer':
          return '/';
        break; 
        case 'subadmin':
          return '/admin';
        break; 

      default:
      //return '/home'; 
      break;
    }
  }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    protected function authenticated(Request $request, $user)
    {

       if(!in_array($user->role,User::$roles)){
         auth()->logout();
          throw ValidationException::withMessages(['email' => 'Unauthenticated access.']);
       }

      $shoppingcart = DB::table('shoppingcart')->where(auth()->user()->_id)->first();

      if(!is_null($shoppingcart))
      {
          if($shoppingcart['instance'] == 'default')
          {
             $content = json_decode($shoppingcart['content']);
             if(is_array($content) && count($content) > 0)
             {
                foreach ($content as $key => $item)
                {
                    if(isset($item->productId))
                    {
                        $product = Product::where('_id',$item->productId)->first();
                        if(!is_null($product))
                        {
                          Cart::add($product->_id,$product->title, $item->quantity,$product->price)->associate('App\Models\Product');
                        } 
                    }   
                 }
             }

          } 
      }

      return redirect()->intended($this->redirectPath());
    }


}
