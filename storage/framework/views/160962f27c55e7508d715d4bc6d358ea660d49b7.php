<?php $__env->startSection('content'); ?>
<div class="content-wrapper p-4">
    <div class="content-card">
        <div class="card">
            <div class="card-body">
                <div class="tab-content p-0">
                    <?php echo $__env->make('msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="edit-order-sec">
                        <div class="edit-order_content">
                          <form id="orderForm" method="post" action="<?php echo e(route('admin.order.orderUpdate',base64_encode($order->id))); ?>" onsubmit="OrderForm.orderUpdate(this);return false;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('post'); ?>  
                            <div class="row">
                                <div class="col-lg-9 col-md-8 col-sm-6 col-12">
                                    <div class="edit-order_card">
                                        <div class="orderFormLeftColumn">

                                            <div class="row">
                                              <div class="col-md-12">
                                                <div class="verticalFormContainer">
                                                      <div class="header">
                                                         Order #<?php echo e($order->unique_order_id); ?> <span style="float:right;"><?php echo e($order->orderuser->email); ?></span>
                                                      </div>
                                                      <div class="value order-status">
                                                            <p><span>Order Status:</span> <?php echo e(orderstatusVal($order->orderstatus)); ?></p>
                                                            <p><span>Order Date:</span> <?php echo e(fnDateFormat($order->created_at)); ?></p>
                                                      </div>
                                                  </div>
                                              </div>
                                            </div>

                                            <?php ($billing_address = $order->billing_address_details); ?>

                                            <!--###################-->
                                            <div class="orderBillingDetailsContainer">
                                                <div class="verticalFormContainer">
                                                    <div class="header">
                                                        Customer Billing Details
                                                    </div>
                                                    <div class="formRow formRowUnlabeled" style="">
                                                        <div class="value">
                                                            <div class="detailsHeading">Billing To: <a href="#" class="orderBillingDetailsChangeLink">Change</a></div>
                                                            <div class="detailsAddress">
                                                                <div><?php echo e($billing_address->firstname); ?> <?php echo e($billing_address->lastname); ?></div>
                                                                <div><?php echo e($billing_address->company); ?></div>
                                                                <div><?php echo e($billing_address->postcode); ?></div>
                                                                <div><?php echo e($billing_address->city); ?></div>
                                                                <div><?php echo e(getCountryName($billing_address->countryId)); ?> <?php echo e(getStateName($billing_address->stateId)); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--###################-->

                                            <!--###################-->
                                            <div class="horizontalFormContainer" id="orderFormBillingDetailsContainer" style="display:none">
                                                <div class="header">
                                                     Billing Address
                                                </div>
                                                <div class="Billing-Address-wrapper">
                                                    <div id="orderFormBillingDetails">
                                                       <?php echo $__env->make('admin.modules.order.form.billing_address_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </div>
                                                    <div>  
                                                    <?php echo $__env->make('admin.modules.order.form.existingAddressbook',['existingAddress' => 'billing'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--###################-->

                                            <?php ($shipping_address = $order->shipping_address_details); ?>
                                            
                                            <!--###################-->
                                            <div class="orderShippingDetailsContainer">
                                                <div class="verticalFormContainer" >
                                                    <div class="header">
                                                        Shipping Details
                                                    </div>
                                                    <div class="formRow formRowUnlabeled  " style="">
                                                        <div class="value">
                                                            <div class="detailsHeading">Shipping To: <a href="#" class="orderShippingDetailsChangeLink">Change</a></div>
                                                            <div class="detailsAddress">
                                                                 <div><?php echo e($shipping_address->firstname); ?> <?php echo e($shipping_address->lastname); ?></div>
                                                                <div><?php echo e($shipping_address->company); ?></div>
                                                                <div><?php echo e($shipping_address->postcode); ?></div>
                                                                <div><?php echo e($shipping_address->city); ?></div>
                                                                <div><?php echo e(getCountryName($shipping_address->countryId)); ?>  <?php echo e(getStateName($shipping_address->stateId)); ?></div>
                                                            </div>
                                                            <div class="detailsHeading">Shipping Method: <a href="#" class="orderShippingDetailsChangeLink">Change</a></div>
                                                            <div class="detailsShippingMethod">
                                                                Royal Mail 1st Class Signed For: £0.00
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--###################-->
                                            
                                            <!--###################-->
                                            <div id="orderFormShippingDetailsContainer" style="display: none;">
                                                
                                                <div class="showByValue_shipItemsTo showByValue_shipItemsTo_single">
                                                    <div class="horizontalFormContainer ">
                                                        <div class="header">
                                                            Shipping Address
                                                        </div>
                                                        <div class="Billing-Address-wrapper Shipping-Address">
                                                            <div id="orderFormShippingDetails">
                                                               <?php echo $__env->make('admin.modules.order.form.shipping_address_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            </div>
                                                            <div>
                                                               <?php echo $__env->make('admin.modules.order.form.existingAddressbook',['existingAddress' => 'shipping'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <?php echo $__env->make('admin.modules.order.form.shipping_method_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </div>


                                            <div class="">
                                                <div class="verticalFormContainer" >
                                                    <div class="header">
                                                        Comments
                                                    </div>
                                                    <div class="formRow formRowUnlabeled  " style="">
                                                        <div class="value">
                                                            <div class="detailsAddress">
                                                                 <div class="detailsHeading">Payment Comment</div>
                                                                 <p><?php echo e($order->payment_method_comment); ?></p>
                                                            </div>
                                                            <div class="detailsAddress">
                                                                 <div class="detailsHeading">Shippping Comment</div>
                                                                 <p><?php echo e($order->shipping_method_comment); ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--###################-->

                                            <!--###################-->  
                                            <div class="">
                                                <div class="verticalFormContainer"> 
                                                    <div class="formRow formRowUnlabeled  " style="">
                                                        <div class="value">
                                                            <div class="quoteItemsGrid quoteItemsGridInteractive">
                                                                <table class="table table-bordered cstm-data-table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th colspan="2">
                                                                                Products shipped to <?php echo e(getCountryName($shipping_address->countryId)); ?> <?php echo e(getStateName($shipping_address->stateId)); ?></th>
                                                                            <th class="quoteItemQuantity">Qty</th>
                                                                            <th class="quoteItemPrice">Item Price</th>
                                                                            <th class="quoteItemTotal">Item Total</th>
                                                                            <!-- <th class="quoteItemAction">Action</th> -->
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php if($order->orderitems): ?>
                                                                           <?php $__currentLoopData = $order->orderitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                             <tr class="itemRow" id="itemId_<?php echo e($item->id); ?>">
                                                                                <input type="hidden" name="itemid[]" value="<?php echo e($item->id); ?>">
                                                                                <td class="quoteItemImage">
                                                                                    <img src="<?php echo e(imagePath($item->product->image)); ?>" alt="">
                                                                                </td>
                                                                                <td>
                                                                                    <div class="quoteItemName"><?php echo e($item->product->title); ?></div>
                                                                                    <div class="quoteItemConfiguration">
                                                                                    </div>
                                                                                </td>
                                                                                <td class="quoteItemQuantity">
                                                                                    <input type="number" name="quantity[]" value="<?php echo e($item->quantity); ?>" class="quantityChange" id="qty_<?php echo e($item->_id); ?>" data-url="<?php echo e(route('admin.order.orderUpdateItemQuantityPrice',$item->_id)); ?>">
                                                                                    <span class="text text-danger d-block" id="quantity.<?php echo e($key); ?>_error"></span>
                                                                                </td>
                                                                                <td class="quoteItemPrice">
                                                                                    <?php echo priceFormat($item->price); ?>

                                                                                    <input type="hidden" name="price[]" value="<?php echo e($item->price); ?>" class="" id="price_<?php echo e($item->_id); ?>"> 
                                                                                </td>
                                                                                <td class="quoteItemTotal"><span><?php echo e(priceFormat($item->price * $item->quantity)); ?></span></td>
                                                                               <!--  <td class="quoteItemAction">
                                                                                    <a href="#" class="deleteItemLink">Delete</a>
                                                                                </td> -->
                                                                            </tr>
                                                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                           <tr><td colspan="4">Subtotal</td><td><?php echo e(priceFormat($order->subtotal)); ?></td></tr>
                                                                        <?php endif; ?>
                                                                       
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--###################-->

                                            <!--###################-->
                                            <div class="verticalFormContainer ">
                                                <div class="header">
                                                    Order Comments (Visible to Customers)
                                                </div>
                                                <div class="formRow formRowUnlabeled  formRowLast" style="">
                                                    <div class="value">
                                                        <textarea name="ordercomment" class="Field100pct" rows="6"><?php echo e($order->ordercomment ?? ''); ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--###################-->

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                    <div class="edit-order_card order-summary-wrapper">
                                        <div class="greenFormContainer">
                                            <div class="header">
                                                Finalize Order
                                            </div>
                                            <div class="greenForm-inner">
                                                <div class="value">
                                                    <label class="row">
                                                        <input type="checkbox" name="emailInvoiceToCustomer" value="1"> Email Invoice to Customer?
                                                    </label>
                                                    <div class="billingEmailAddressContainer">(<span class="billingEmailAddress"><?php echo e($order->orderuser->email); ?></span>)</div>
                                                    <button type="submit" class="orderMachineSaveButton mini-btn" accesskey="s"><span class="accesskey">S</span>ave »</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="verticalFormContainer orderSummaryContainer">
                                            <div class="header">
                                                Order Summary
                                            </div>
                                            <div class="formRow formRowUnlabeled  " style="">
                                                <div class="value">
                                                    <div class="orderFormSummaryOrderSummaryContainer">
                                                        <table cellspacing="0" class="orderFormSummaryTable">
                                                            <tbody>
                                                                <tr class="orderFormSummaryTable-subtotal ">
                                                                    <th>
                                                                        Subtotal
                                                                    </th>
                                                                    <td valign="top"><?php echo e(priceFormat($order->subtotal)); ?></td>
                                                                </tr>
                                                                <tr class="orderFormSummaryTable-discount ">
                                                                    <th>
                                                                        Discount
                                                                    </th>
                                                                    <td valign="top">-<?php echo e(priceFormat($order->discount)); ?></td>
                                                                </tr>
                                                                <tr class="orderFormSummaryTable-shipping ">
                                                                    <th>
                                                                        Shipping
                                                                    </th>
                                                                    <td valign="top">+<?php echo e(priceFormat($order->shipping ?? 0)); ?></td>
                                                                </tr>
                                                                <tr class="orderFormSummaryTable-total ">
                                                                    <th>
                                                                        Grand Total
                                                                    </th>
                                                                    <td valign="top"><?php echo e(priceFormat($order->total)); ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
             <!--                            <div class="verticalFormContainer applyDiscountContainer">
                                            <div class="header">
                                                Apply Discount
                                            </div>
                                            <div class="formRow formRowUnlabeled  " style="">
                                                <div class="value">
                                                    £ <input name="discountAmount" type="text" value="0.00" class="Field100">
                                                    <input type="button" class="mini-btn" value="Apply">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="verticalFormContainer couponGiftCertificateContainer">
                                            <div class="header">
                                                Apply Coupon or Gift Certificate
                                            </div>
                                            <div class="formRow formRowUnlabeled  " style="">
                                                <div class="value">
                                                    <input name="couponGiftCertificate" type="text" value="" class="Field120">
                                                    <input type="button" class="mini-btn" value="Apply">
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="verticalFormContainer ">
                                            <div class="header">
                                                Payment Method
                                            </div>
                                            <div class="formRow formRowUnlabeled  " style="">
                                                <div class="value">
                                                    <strong>Credit Card / Debit Cards</strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/megatanws/public_html/web/resources/views/admin/modules/order/edit.blade.php ENDPATH**/ ?>