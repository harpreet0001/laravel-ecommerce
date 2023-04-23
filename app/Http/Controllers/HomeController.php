<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Cart;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    

    public $path ='front.modules.main.';

    public function index()
    {   
        Cart::destroy();
        $categories = Category::where('active',1)->take(5)->get();

        return view($this->path.'front',compact('categories'));
    }

    
}
