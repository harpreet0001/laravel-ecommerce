<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogComment;

class BlogController extends Controller
{
   public $path ='front.modules.main.blog.';

   public function blogs(){
      
      $blogs = Blog::isActiveBlog()->where('delete','!=',1)->get();
      return view($this->path.'bloglist',compact('blogs'));
   }

   public function blog_detail($slug)
   {
      $blog = Blog::where('slug',$slug)->isActiveBlog()->where('delete','!=',1)->first();

      if(is_null($blog)){
          return abort('404');
      }

      return view($this->path.'blog',compact('blog'));

   }

    public function addBlogComment(Request $request,$encodedBlogId)
    {
        $data = $this->validate($request,[
                
            'name'     => 'required|string|min:2:max:255',
            'email'    => 'required|string|email|regex:/^([a-zA-Z0-9_\-\.])+\@([a-zA-Z0-9\-])+\.[a-zA-Z]{2,4}$/i|max:255',
            'website'  => 'nullable|sometimes|string|min:5|max:300',
            'comment'  => 'required|string|min:10|max:2000'
        ]);

        $blogId = base64_decode($encodedBlogId);
        $blog   = Blog::findorFail($blogId);
        if(!is_null($blog)){
          $data['blogId']    = $blog->_id;
          $data['active']    = 0;
          $data['delete']    = 0;
          BlogComment::create($data);
          return response()->json(['success' => 'Your comment is successfully submitted','status' => 1],200);

        }
          return response()->json(['error' => 'Blog not found','status' => 0],404);
    }

}  