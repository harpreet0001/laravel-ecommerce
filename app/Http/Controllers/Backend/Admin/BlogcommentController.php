<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\BlogComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Backend\Admin\CommonController;

class BlogcommentController extends CommonController
{
	public $path ='admin.modules.blogcomment.';

  public function list()
  {
    $blogcomments = BlogComment::get();
    return view($this->path.'list')->with(['blogcomments' => $blogcomments]);
  }

  public function view($id)
  {
      $id           = base64_decode($id);
      $blogcomment  = BlogComment::where('_id', $id)->first();
      if(is_null($blogcomment))
      {
         abort('404');
      }
      return view($this->path.'view')->with(['blogcomment' => $blogcomment]);
  }

  public function delete($id)
  {
      $id           = base64_decode($id);
      $blogcomment  = BlogComment::where('_id', $id)->first();
      $msg          = 'Something went wrong..!!';
      if($blogcomment){
          $blogcomment->delete();
          $msg = 'Record deleted succesfully.';
      }
      return redirect()->route('blogcomment-list')->withSuccess($msg);
  }
  
  public function active(Request $request, $id)
  {
      $value  = $request->value == 'true' ? 1 : 0;
      $return = BlogComment::where('_id',$id)->update(['active' => $value]);
      return response()->json(['return'=>$return]);
  }


}  