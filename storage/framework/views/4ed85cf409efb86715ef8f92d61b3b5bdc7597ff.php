 <div id="review">
    <?php if(isset($product_reviews)): ?>
        <?php $__empty_1 = true; $__currentLoopData = $product_reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <table class="table table-striped table-bordered">
            <tbody>
                <tr>
                    <td style="width: 50%;"><strong><?php echo e(ucwords($product_review->posted_by)); ?></strong></td>
                    <td class="text-right"><?php echo e(fnDateFormat($product_review->created_at)); ?></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p><?php echo $product_review->review; ?></p>
                        <div class="rating-star">
                             <div class="rating-star">
                                <div class="all-star-rating">
                                    <span class="inner-star_spans">
                                        <div class="star-ratings">
                                            <div class="fill-ratings" style="width:<?php echo e(fnPercentage($product_review->rating,5)); ?>%">
                                              <span>🟊🟊🟊🟊🟊</span>
                                            </div>
                                            <div class="empty-ratings">
                                              <span>🟊🟊🟊🟊🟊</span>
                                            </div>
                                        </div>
                                    </span>
                                </div>   
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php endif; ?>
    <?php endif; ?>
</div>
<form class="form-horizontal" id="form-review" action="<?php echo e(route('product.addProductReview',base64_encode($product->_id))); ?>" onsubmit="productreview.add(this)">  
    <div class="review-form-inner">
        <h4>Write a review</h4>
        <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name">Your Name</label>
            <div class="col-sm-10">
                <input type="text" name="posted_by" value="<?php if(auth()->check()): ?><?php echo e(auth()->user()->firstname); ?> <?php echo e(auth()->user()->lastname); ?><?php endif; ?>" id="input-posted_by" class="form-control">
                <span class="text text-danger err-msg" id="posted_by_error"></span>
            </div>
        </div>
         <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name">Title</label>
            <div class="col-sm-10">
                <input type="text" name="title" value="" id="input-title" class="form-control">
                <span class="text text-danger err-msg" id="title_error"></span>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-review">Your Review</label>
            <div class="col-sm-10">
                <textarea name="review" rows="5" id="input-review" class="form-control"></textarea>
                <span class="text text-danger err-msg" id="review_error"></span>
                <div class="help-block"><span class="text-danger">Note:</span> HTML is not translated!</div>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label">Rating</label>
             <div class="col-sm-10 rate">
                <div class="feedback">
                    <div class="rating">
                      <input type="radio" name="rating" id="rating-1" value="1">
                      <label for="rating-1"></label>
                      <input type="radio" name="rating" id="rating-2" value="2">
                      <label for="rating-2"></label>
                      <input type="radio" name="rating" id="rating-3" value="3">
                      <label for="rating-3"></label>
                      <input type="radio" name="rating" id="rating-4" value="4">
                      <label for="rating-4"></label>
                      <input type="radio" name="rating" id="rating-5" value="5">
                      <label for="rating-5"></label>
                    </div>
                  </div>
            <span class="text text-danger err-msg" id="rating_error"></span>
            </div>
        </div>
        <div class="buttons clearfix">
            <div class="pull-right">
                <button type="submit" id="button-review" data-loading-text="Loading..." class="btn btn-primary">Continue</button>
            </div>
        </div>
    </div>
</form><?php /**PATH /home/megatanws/public_html/web/resources/views/components/product-review.blade.php ENDPATH**/ ?>