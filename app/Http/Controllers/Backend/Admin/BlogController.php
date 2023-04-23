<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Backend\Admin\CommonController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\User;
use Auth;


class BlogController extends CommonController
{
	public $path ='admin.modules.blog.';

  protected function validators(array $data)
  {
      return Validator::make($data, [
          'title'           => ['required', 'string', 'max:255'],
          'content'         => ['required', 'string'],
          'pagetitle'       => ['nullable','string','max:500'],
          'metakeywords'     => ['nullable','string','max:500'],
          'metadescription' => ['nullable','string','max:5000'],
          'img'             => ['required'],
      ]);
  }

  protected function validators_update(array $data)
  {
      return Validator::make($data, [
          'title'           => ['required', 'string', 'max:255'],
          'content'         => ['required', 'string'],
          'pagetitle'       => ['nullable','string','max:500'],
          'metakeywords'     => ['nullable','string','max:500'],
          'metadescription' => ['nullable','string','max:5000'],
      ]);
  }

  public function list()
  {
    $blog = Blog::get();
    return view($this->path.'list')->with(['blog' => $blog]);
  }

  public function create()
  {
    return view($this->path.'create');
  }

  public function save(Request $request)
  {
      $this->validators($request->all())->validate();
      $fileName = strtotime('now').'.'.$request->img->extension();  
      $request->img->move(public_path('images/blog'), $fileName);
      
      $return_result = Blog::create([
                            'title'           => $request['title'],
                            'content'         => $request['content'],
                            'pagetitle'       => empty($request['pagetitle']) ? "" : $request['pagetitle'],
                            'metakeywords'     => empty($request['metakeywords']) ? "" : $request['metakeywords'],
                            'metadescription' => empty($request['metadescription']) ? "" : $request['metadescription'],
                            'image'           => '/images/blog/'.$fileName,
                            'active'          => 1,
                        ]); 
      $msgz = "";
        if($return_result){
            $msgz = 'Record Saved Succesfully..!!';
        }else{
            $msgz = 'Something went wrong..!!';
        }       
        return redirect()->route('blog-create')->withSuccess($msgz);      
  }

  public function edit($id)
  {
    $id       = base64_decode($id);
    $BlogData = Blog::where('_id', $id)->first();
    return view($this->path."edit")->with('BlogData',$BlogData);
  }

  public function update(Request $request)
  {
      $this->validators_update($request->all())->validate();
      $id         = base64_decode($request["IdHidden"]);
      $updateblog = Blog::where('_id', $id);
      $update     = $updateblog->update([
                                          'title'           => $request["title"], 
                                          'content'         => $request['content'],
                                          'pagetitle'       => empty($request['pagetitle']) ? "" : $request['pagetitle'],
                                          'metakeywords'     => empty($request['metakeywords']) ? "" : $request['metakeywords'],
                                          'metadescription' => empty($request['metadescription']) ? "" : $request['metadescription'],
                                        ]);
      if(!empty($request->img)){
        $imagepath  = Blog::select('image')->where('_id', $id)->first();
        $image_path = public_path($imagepath->image);
        $fileName   = strtotime('now').'.'.$request->img->extension();  
        $request->img->move(public_path('images/blog'), $fileName);
        $updateIMG  = $updateblog->update([
                                          'image'   => '/images/blog/'.$fileName
                                        ]);
        if($updateIMG && !empty($imagepath->image)){
          if(file_exists($image_path)){
            unlink($image_path);
          }
        }
      }
      $msg    = "";
      if($update){
          $msg = 'Record updated succesfully..!!';
      }else{
          $msg = 'Something went wrong..!!';
      }
      return redirect()->route('blog-list')->withSuccess($msg);
  }

  public function delete($id)
  {
      $id         = base64_decode($id);
      $imagepath  = Blog::select('image')->where('_id', $id)->first();
      $image_path = public_path($imagepath->image);
      $DelBlog    = Blog::where('_id', $id)->delete();
      $msg        = 'Something went wrong..!!';
      if($DelBlog && !empty($imagepath->image)){
        if(file_exists($image_path)){
          unlink($image_path);
        }
          $msg = 'Record deleted succesfully.';
      }
      return redirect()->route('blog-list')->withSuccess($msg);
  }

  public function active(Request $request, $id)
  {
      $value  = $request->value == 'true' ? 1 : 0;
      $return = Blog::where('_id',$id)->update(['active' => $value]);
      return response()->json(['return'=>$return]);
  }


}  