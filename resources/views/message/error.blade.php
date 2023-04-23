@if(Session::has('error'))
 <div class="alert alert-danger alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 

     {{Session::get('error')}}
  
 </div>
@endif