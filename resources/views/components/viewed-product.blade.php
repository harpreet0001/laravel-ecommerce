<section class="melanotan-tab-sec">
	<div class="container">
		<div class="Melanotan-tab_content">
	            <ul id="tabs" class="nav nav-tabs">
	            	@if(!is_null($recentlyviewedproducts))
	                <li class="nav-item"><a href="" data-target="#recently-viewd" data-toggle="tab" class="nav-link small text-uppercase @if(!is_null(!$recentlyviewedproducts)) {{'active'}} @endif">Recently Viewed</a></li>
	                @endif
	                @if(!is_null($mostviewedproducts))
	                <li class="nav-item"><a href="" data-target="#most-viewed" data-toggle="tab" class="nav-link small text-uppercase @if(is_null($recentlyviewedproducts)) {{'active'}} @endif">Most Viewed</a></li>
	                @endif
	            </ul>
	            <br>
	            <div id="tabsContent" class="tab-content">
	            	@if(!is_null($recentlyviewedproducts))
	                <div id="recently-viewd" class="tab-pane fade @if(!is_null($recentlyviewedproducts)) {{'active show'}} @endif">
	                <!-- carousel -->
				 <div class="owl-carousel owl-theme megatan-tab-slider">
				 	@if($recentlyviewedproducts->count() > 0)
				 	@foreach($recentlyviewedproducts as $recentlyviewedproduct)
					<div class="item">
						<!-- card -->
						<div class="melanotan_card mini-card">
							<div class="img">
								<figure>
									<a href="{{route('product.show',$recentlyviewedproduct->slug)}}">
										<img src="{{productImage($recentlyviewedproduct->image)}}">

									</a>
									<div class="quickview-button">
									 <a href="{{route('product-quick-view',base64_encode($recentlyviewedproduct->_id))}}" data-toggle="modal"  data-product-id="{{base64_encode($recentlyviewedproduct->_id)}}" class="quickview_show">
						                    <div class="quickview_i" data-toggle="tooltip" data-placement="top" title="Quickview" >
						                        <i class="fas fa-search-plus"></i>
						                    </div>
						                </a>
									<!-- <span>Quickview</span> -->
								</div>
								</figure>
							</div>
							<div class="melanotan_content">
								<div class="name">
									<a href="{{route('product.show',$recentlyviewedproduct->slug)}}">
										{{ $recentlyviewedproduct->title ?? '' }}
									</a>
								</div>
								<div class="price">
									<p>{{priceFormat($recentlyviewedproduct->price)}}</p>
								</div>
								<div class="rating-star">
									{!! starRating($recentlyviewedproduct) !!}
								</div>
								<div class="button-group">
									<ul>
										<li>
											{!! addToCart($recentlyviewedproduct,'shopping-icon','',false) !!}
										</li>
										<li>
											 {!! wishlistbtn($recentlyviewedproduct) !!}
										</li>
										<li>
											{!! comparebtn($recentlyviewedproduct,'campare-icon') !!}
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- card end-->		
					</div>
					@endforeach
					@endif
				</div>
		    	<!-- carousel end-->
	                </div>
	               @endif 
	               @if(!is_null($mostviewedproducts))
	                <div id="most-viewed" class="tab-pane fade @if(is_null($recentlyviewedproducts)) {{'active show'}} @endif">
	                    <!-- carousel -->
						<div class="owl-carousel owl-theme megatan-tab-slider-1">
		                    @if($mostviewedproducts->count() > 0)
						 	@foreach($mostviewedproducts as $mostviewedproduct)
							<div class="item">
								<!-- card -->
								<div class="melanotan_card mini-card">
									<div class="img">
										<figure>
											<a href="{{route('product.show',$mostviewedproduct->slug)}}">
												<img src="{{productImage($mostviewedproduct->image)}}">

											</a>
											<div class="quickview-button">
											 <a href="{{route('product-quick-view',base64_encode($mostviewedproduct->_id))}}" data-toggle="modal"  data-product-id="{{base64_encode($mostviewedproduct->_id)}}" class="quickview_show">
								                    <div class="quickview_i" data-toggle="tooltip" data-placement="top" title="Quickview" >
								                        <i class="fas fa-search-plus"></i>
								                    </div>
								                </a>
											<!-- <span>Quickview</span> -->
										</div>
										</figure>
									</div>
									<div class="melanotan_content">
										<div class="name">
											<a href="{{route('product.show',$mostviewedproduct->slug)}}">
												{{ $mostviewedproduct->title ?? '' }}
											</a>
										</div>
										<div class="price">
											<p>{{priceFormat($mostviewedproduct->price)}}</p>
										</div>
										<div class="rating-star">
											{!! starRating($mostviewedproduct) !!}
										</div>
										<div class="button-group">
											<ul>
												<li>
													{!! addToCart($mostviewedproduct,'shopping-icon','',false) !!}
												</li>
												<li>
													 {!! wishlistbtn($mostviewedproduct) !!}
												</li>
												<li>
													{!! comparebtn($mostviewedproduct,'campare-icon') !!}
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!-- card end-->		
							</div>
							@endforeach
							@endif
						</div>
			           <!-- carousel end-->
	                </div>
	                @endif
	            </div>				
		</div>
	</div>
</section>
