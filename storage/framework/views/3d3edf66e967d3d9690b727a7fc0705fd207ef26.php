<div class="modal-header">	
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
	<div class="inner-modal">
      	<div class="modal-left-img product-left">
      		<figure>
      			<img src="<?php echo e(imagePath($product->image)); ?>" class="img-fluid">
      		</figure>
      	</div>

		<div id="product" class="product-details product-right">
			<div class="title page-title"><?php echo e($product->title); ?></div>
			<div class="description ">
				<div class="expand-block">
	                <div class="blocks_content ">
                        <?php echo $product->description; ?>

                    </div> 
				</div>
				<div class="view-more-wrap">
                    <a href="javascript:void(0);" class="btn main-btn normal-link view-more mb-3 mt-2">view more</a>
                </div>
			</div>
			<div class="product-stats">
				<ul class="list-unstyled">

					<?php echo getStockLevel($product); ?>

					<li class="product-manufacturer"><b>Brand:</b> <a href="#" target="_blank"><?php echo e($product->getCategory->title ?? ''); ?></a></li>
					<li class="product-reward"><b>Reward Points:</b> <span>140</span></li>
				</ul>
			</div>
			<div class="product-price-group">
				<div class="price-wrapper">
					<div class="price-group">
					   <div class="product-price"><?php echo e(priceFormat($product->price)); ?></div>
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
                   <?php echo addToCart($product,'main-btn','ADD TO CART'); ?>

                <!-- add-to-cart -->
			</div>
			<div class="wishlist-compare">
				<?php echo wishlistbtn($product,'btn btn-wishlist'); ?>


				<?php echo comparebtn($product,'btn btn-compare campare-icon'); ?>


				<a class="btn btn-more-details" href="<?php echo e(route('product.show',base64_encode($product->_id))); ?>" target="_top" data-toggle="tooltip" data-tooltip-class="more-details-tooltip" data-placement="top" title="<?php echo e($product->_id ?? ''); ?>" data-original-title="More Details">
					<span class="btn-text">More Details</span>
				</a>
			</div>
		</div>
	</div>
</div>
<div class="block-expand-overlay"><a class="block-expand btn"></a></div>

<?php /**PATH /home/megatanws/public_html/web/resources/views/front/modules/main/popups/product_quick_view.blade.php ENDPATH**/ ?>