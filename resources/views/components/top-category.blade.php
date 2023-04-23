<div class="owl-carousel owl-theme megatan-slider">
	@if(isset($topcategories) && count($topcategories->toArray()) > 0)
	 @foreach($topcategories as $topcategory)
	  	<div class="item">					
			<div class="megatan_card">
				<figure>
					<a href="{{route('shop',$topcategory->slug)}}">
						<img src="{{productImage($topcategory->image)}}" class="img-fluid">
					</a>
					<div class="megatan-btn">
						<a href="{{route('shop',$topcategory->slug)}}">{{$topcategory->title}}</a>
					</div>
				</figure>
			</div>				
		</div>
	 @endforeach
	@endif
</div>