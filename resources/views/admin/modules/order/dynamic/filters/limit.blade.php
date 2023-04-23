 <div class="select-limit-div">
  <label>Show:</label>
   <select id="limit" name="limit" class="form-select form-control" aria-label="Default select example" >
     <option value="10"  @if(isset(request()->limit) && request()->limit == 10){{'selected'}} @endif >10</option>

     <option value="25" @if(isset(request()->limit) && request()->limit == 25){{'selected'}} @endif >25</option>

     <option value="50" @if(isset(request()->limit) && request()->limit == 50){{'selected'}} @endif >50</option>

     <option value="75" @if(isset(request()->limit) && request()->limit == 75){{'selected'}} @endif >75</option>

     <option value="100" @if(isset(request()->limit) && request()->limit == 100){{'selected'}} @endif >100</option>
   </select>     
</div>