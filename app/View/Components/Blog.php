<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Blog as MBlog;

class Blog extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    private $size  = 10;
    public function __construct()
    {
    
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $latestBlogs = MBlog::isActiveBlog()->where('delete','!=',1)->get();
        $mostReadableBlogs = MBlog::isActiveBlog()->where('delete','!=',1)->get();

        return view('components.blog',compact('latestBlogs','mostReadableBlogs'));
    }

 
}
