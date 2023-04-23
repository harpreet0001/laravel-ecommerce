<div class="select-group">
	<div class="input-group input-group-sm sort-by">
		<label>Sort By:</label>
			@php($sortFiledArr = ['' => 'select','alpha-asc' => 'Alphabetical: A to Z', 'alpha-desc' => 'Alphabetical: Z to A','price-asc' => 'Price: Low to High','price-desc' => 'Price: High to Low'])

		 <select name="sort" id="sort" class="form-select form-control" aria-label="Default select example" >
		   	@foreach($sortFiledArr as $sortFieldVal => $sortFiledTitle)
		   	  <option value="{{base64_encode($sortFieldVal)}}" @if(isset(request()->sort) && base64_decode(request()->sort) == $sortFieldVal){{'selected'}} @endif >{{$sortFiledTitle}}</option>
		   	 @endforeach
		</select>
	</div>
	<div class="input-group input-group-sm per-page">
		<label>Show:</label>
		 <select id="limit" name="limit" class="form-select form-control" aria-label="Default select example" >
		   <option value="10"  @if(isset(request()->limit) && request()->limit == 10){{'selected'}} @endif >10</option>

		   <option value="25" @if(isset(request()->limit) && request()->limit == 25){{'selected'}} @endif >25</option>

		   <option value="50" @if(isset(request()->limit) && request()->limit == 50){{'selected'}} @endif >50</option>

		   <option value="75" @if(isset(request()->limit) && request()->limit == 75){{'selected'}} @endif >75</option>

		   <option value="100" @if(isset(request()->limit) && request()->limit == 100){{'selected'}} @endif >100</option>
		 </select>	   
	</div>
</div>