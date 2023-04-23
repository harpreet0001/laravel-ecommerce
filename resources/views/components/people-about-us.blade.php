<!-- about us -->
<section class="about-us-sec">
	<div class="container">
		<div class="about-us_content">
			<div class="head text-center">
				<h1>What are people saying about us</h1>
				<div class="title-divider"></div>		
			</div>
			<!-- card -->
			<!-- carousel -->
				<div class="owl-carousel owl-theme about-us-slider">
					@if(isset($product_reviews))
					  @foreach($product_reviews as $product_review)
						<div class="item">
							<div class="about-us_card">
								<div class="block-header">
									<img src="{{ asset('front/images/quotes.png') }}" class="img-fluid">
								</div>
								<div class="block-content block-text">{!! $product_review->review !!}</div>
								<div class="block-footer">- {!! ucwords($product_review->posted_by) !!}</div>
								
							</div>
						</div>
					  @endforeach
					@endif
				</div>
			<!-- carousel end-->
			<!-- card end -->
		</div>
	</div>
</section>
<!-- about us end -->