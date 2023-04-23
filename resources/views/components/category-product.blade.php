<section class="starter-kits-sec">
	<div class="container">
		<div class="starter-kits_content">
			<div class="head text-center">
				<h1>{{$category->title}}</h1>
				<div class="title-divider"></div>
				<p>{!! $category->description !!}</p>					
			</div>
			<!-- row -->
			<div class="starter-wrapper">
				<div class="starter-col-1">
					<div class="starter-card">

						<div class="item_content">
							<div class="item-head">
								<a href="javascript:void(0);">
									{{$category->title}}
								</a>
							</div>
						<figure>
							<a href="{{route('shop',$category->slug)}}">
								<img src="{!! imagePath($category->image) !!}" class="img-fluid">
							</a>
						</figure>	
						</div>
					</div>
				</div>
				<div class="starter-col-2">
				<!-- carousel -->
					<div class="owl-carousel owl-theme Starter-slider">
						@if(isset($products) && count($products->toArray()) > 0)
						    @foreach($products as $product)
								<div class="item">
									<div class="starter-card">
										<figure>
											<a href="{{route('product.show',$product->slug)}}">
												<img src="{{productImage($product->image)}}">
											<div class="product-labels">
												@if(isset($product->showcondition) && $product->showcondition)
								                   {!! getCondition($product->condition) !!} 
								                @endif 				
											</div>
											</a>
											<div class="quickview-button">
												<a href="{{route('product-quick-view',base64_encode($product->_id))}}" data-toggle="modal"  data-product-id="{{base64_encode($product->_id)}}" class="quickview_show">
									                <div class="quickview_i" data-toggle="tooltip" data-placement="top" title="Quickview" >
									                    <i class="fas fa-search-plus"></i>
									                </div>
									            </a>
											</div>
										</figure>
										<figcaption>
											<div class="wrapper">
												<div class="name">
													<a href="{{route('product.show',$product->slug)}}" >{{ $product->title ?? '' }}</a>
												</div>
												<div class="price">
													<p>{{priceFormat($product->price)}}</p>
												</div>
												<div class="buttons-wrapper">
													<div class="cart-group">
														 <!-- add-to-cart -->
									                       {!! addToCart($product,'btn mini-btn','ADD TO CART',false) !!}
									                       <!-- add-to-cart -->
														<!-- <a href="javascript:void" class="btn mini-btn">Add to Cart</a> -->
													</div>
													<div class="wish-group">
														<!-- wishlist-btn -->
								                         {!! wishlistbtn($product) !!}
								                        <!-- wishlist-btn -->
								                        <!-- compare-btn -->
								                         {!! comparebtn($product,'campare-icon') !!}
								                        <!-- compare-btn -->
														<!-- <a href="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wish List"><i class="far fa-heart"></i></a>
														<a href="javascript:void(0);" class="campare-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Campare this Product"><i class="far fa-heart"></i></a> -->
													</div>
												</div>
											</div>
										</figcaption>
									</div>
								</div>
						    @endforeach
						    @else
						@endif
					</div>
			   <!-- carousel end-->	
				</div>
			</div>
			<!-- row end -->
		</div>
	</div>
</section>