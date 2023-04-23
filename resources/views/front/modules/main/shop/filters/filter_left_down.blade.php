<h3 class="module-title">Filter <span>
	<button class="reset-filter-btn">Clear</button>
</span> 
</h3>
<div class="accordion-sec">
    <div id="accordion" class="accordion">
        <div class="card mb-0">
            <div class="card-header" data-toggle="collapse" href="#collapseOne">
                <a class="card-title">
                    Price
                </a>
            </div>
            <div id="collapseOne" class="collapse show" data-parent="#accordion">
            	<div class="card-body">
		        <input type="text" class="js-range-slider" name="my_range" value=""
				        data-skin="round"
				        data-type="double"
				        data-min="{{(int)$minProductPrice}}"
				        data-max="{{(int)$maxProductPrice}}"
				        data-grid="false"
				    />
				    <div class="range-input">
				    	<span>£</span>
						<input type      = "number" 
                               maxlength = "{{(int)$maxProductPrice}}"
                               value     = "{{request()->price_from ? (int)request()->price_from : (int)$minProductPrice}}" 
                               class     = "from"/>
						<span>£</span>
						<input type      = "number" 
                               maxlength = "{{(int)$maxProductPrice}}" 
                               value     = "{{request()->price_to ? (int)request()->price_to : (int)$maxProductPrice}}" 
                               class     = "to"/>
				    </div>
            	</div>
            </div>
            <div class="card-header" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                <a class="card-title">
                  Availability
                </a>
            </div>
            <div id="collapseTwo" class="collapse show" data-parent="#accordion">
            	<div class="card-body">
            		
	            <div class="form-check">
					<input type="checkbox" class="form-check-input" id="stock" @if(isset(request()->stock) && request()->stock == 1){{'checked'}} @endif >
					<label class="form-check-label" for="stock">In Stock</label>
				</div>
            	</div>
            </div>
<!--             <div class="card-header" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                <a class="card-title">
                  Brands
                </a>
            </div>
            <div id="collapseThree" class="collapse show" data-parent="#accordion" >
                <div class="card-body">
                	<ul>
                		<li>
                			<div class="accordion-images">
                				<figure>
                					<img src="images/accordion-img.png">
                				</figure>
                			</div>
                		</li>
                	</ul>
                </div>
            </div> -->
        </div>
    </div>
</div>