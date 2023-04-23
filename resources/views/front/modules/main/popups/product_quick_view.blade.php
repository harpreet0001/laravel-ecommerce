<div class="modal-header">	
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
	<div class="inner-modal">
      	<div class="modal-left-img product-left">
      		<figure>
      			<img src="{{imagePath($product->image)}}" class="img-fluid">
      		</figure>
      	</div>

		<div id="product" class="product-details product-right">
			<div class="title page-title">{{$product->title}}</div>
			<div class="description ">
				<div class="expand-block">
	                <div class="blocks_content ">
                        {!! $product->description !!}
                    </div> 
				</div>
				<div class="view-more-wrap">
                    <a href="javascript:void(0);" class="btn main-btn normal-link view-more mb-3 mt-2">view more</a>
                </div>
			</div>
			<div class="product-stats">
				<ul class="list-unstyled">

					{!! getStockLevel($product) !!}
					<li class="product-manufacturer"><b>Brand:</b> <a href="#" target="_blank">{{$product->getCategory->title ?? ''}}</a></li>
					<li class="product-reward"><b>Reward Points:</b> <span>140</span></li>
				</ul>
			</div>
			<div class="product-price-group">
				<div class="price-wrapper">
					<div class="price-group">
					   <div class="product-price">{{priceFormat($product->price)}}</div>
					</div>
					<!-- <div class="product-tax">Ex Tax: £140.00</div> -->
					<div class="product-points">Price in reward points: 14000</div>
				</div>
			</div>
		</div>	
    </div>
		<!-- modal -->
  </div>
<div class="modal-footer">
    <div class="button-group-page">
		<div class="buttons-wrapper">
			<div class="stepper-group cart-group">
				<!-- add-to-cart -->
                   {!! addToCart($product,'main-btn','ADD TO CART') !!}
                <!-- add-to-cart -->
			</div>
			<div class="wishlist-compare">
				{!! wishlistbtn($product,'btn btn-wishlist') !!}

				{!! comparebtn($product,'btn btn-compare campare-icon') !!}

				<a class="btn btn-more-details" href="{{route('product.show',base64_encode($product->_id))}}" target="_top" data-toggle="tooltip" data-tooltip-class="more-details-tooltip" data-placement="top" title="{{$product->_id ?? ''}}" data-original-title="More Details">
					<span class="btn-text">More Details</span>
				</a>
			</div>
		</div>
	</div>
</div>
<div class="block-expand-overlay"><a class="block-expand btn"></a></div>

