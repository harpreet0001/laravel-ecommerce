<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Backend\Admin\CommonController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Page;
use App\User;
use Auth;


class PageController extends CommonController
{
  	public $path ='admin.modules.pages.';

    protected function validators(array $data)
    {
        return Validator::make($data, [
            'title'    => ['required', 'string', 'max:255'],
            'content'  => ['required', 'string'],
            'pagetitle'       => ['nullable','string','max:500'],
            'metakeywords'     => ['nullable','string','max:500'],
            'metadescription' => ['nullable','string','max:5000'],
        ]);
    }

  	public function list(){
    	$page = Page::get();
  	  return view($this->path.'page_list')->with(['page' => $page]);
  	}

  	public function create(){
  	  return view($this->path.'create');
  	}

  	public function save(Request $request){
      $this->validators($request->all())->validate();
  	       $p = new Page;
           $p->title           = $request->title;
           $p->content         = $request->content;
           $p->type            = $request->type;
           $p->pagetitle       =  empty($request->pagetitle)       ? "" : $request->pagetitle;
           $p->metakeywords    =  empty($request->metakeywords)     ? "" : $request->metakeywords;
           $p->metadescription =  empty($request->metadescription) ? "" : $request->metadescription;
           $p->status          = 1;
           $p->save();
      return redirect()->route('page-list')->withSuccess( 'Record Save Succesfully.');
  	}

  	public function edit($id){
      $id   = base64_decode($id);
  		$page =  Page::where('_id',$id);
  		if($page->count()>0){

  			return view($this->path.'edit')->with('page',$page->first());	
      }
  		else{
  			return redirect()->route('page-list');		
      }	
  	}

  	public function update($id,Request $request){
        Page::where('_id',$id)->update([
                                         'title'           => $request->title,
                                         'content'         => $request->content,
                                         'type'            => $request->type,
                                         'status'          => (int)$request->status,
                                         'pagetitle'       =>  empty($request->pagetitle)       ? "" : $request->pagetitle,
                                         'metakeywords'     =>  empty($request->metakeywords)     ? "" : $request->metakeywords,
                                         'metadescription' =>  empty($request->metadescription) ? "" : $request->metadescription

                                       ]);
        return redirect()->route('page-list')->withSuccess( 'Update Succesfully');
  	}

  	public function view($id){
      $id   = base64_decode($id);
  		$page =  Page::where('_id',$id);
  		if($page->count()>0):
  			return view($this->path.'view')->with('page',$page->first());	
  		else:
  			return redirect()->route('page-list');		
  		endif;	
  	}

  	public function delete($id){
      $id   = base64_decode($id);
  		$page =  Page::where('_id',$id)->delete();
  		return redirect()->route('page-list')->withError( 'Deleted Succesfully');
  	}
  	
  	public function status($id,Request $request){
  		$value  = $request->value == 'true' ? 1 : 0;
  		$return = Page::where('_id',$id)->update(['status' => $value]);
  		return response()->json(['return'=>$return]);
  	}

}  