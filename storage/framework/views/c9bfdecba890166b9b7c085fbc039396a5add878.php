<?php $__env->startSection('content'); ?>
    <?php 
     	   $user             = $order->orderuser;
           $billing_details  = $order->billing_address_details;
           $ordershipment    = $order->ordershipment;
    ?>
 <div style="padding: 0 20px 20px;"> 
    <h2 style="font-size:22px;height:30px;color:#cc6600;border-bottom:dashed 1px gray">Order Status Changed</h2>
        <p>Hi <?php echo e($billing_details->firstname ?? ''); ?> <?php echo e($billing_details->lastname ?? ''); ?></p>
        <p>An order you recently placed on our website has had its status changed.</p>
        <p>The status of order #<?php echo e($order->unique_order_id); ?> is now <strong><?php echo e(orderstatusVal($order->orderstatus)); ?></strong></p>
        <h3 style="font-size:13px;color:#cc6600">Order Details</h3>
        <table width="100%">
            <tbody>
                <tr>
                    <td style="font-family:Arial;font-size:13px;font-weight:bold" nowrap="" valign="top" width="25%">Order Total:</td>
                    <td style="font-family:Arial;font-size:13px"><?php echo priceFormat($order->total); ?></td>
                </tr>
                <tr>
                    <td style="font-family:Arial;font-size:13px;font-weight:bold" nowrap="" valign="top" width="25%">Date Placed:</td>
                    <td style="font-family:Arial;font-size:13px"><?php echo fnDateFormat($order->created_at); ?></td>
                </tr>
                <tr>
                    <td style="font-family:Arial;font-size:13px;font-weight:bold" nowrap="" valign="top" width="25%">Payment Method:</td>
                    <td style="font-family:Arial;font-size:13px"><?php echo e($order->payment_method); ?></td>
                </tr>
            </tbody>
        </table>
        <h3 style="font-size:13px;color:#cc6600">Shipment Tracking Numbers /
            Links</h3>
        <?php if(is_null($ordershipment)): ?>
            No tracking numbers are assigned to your order yet.
        <?php else: ?>
            <table width="100%">
            <tbody>
                <tr>
                    <td style="font-family:Arial;font-size:13px;font-weight:bold" nowrap="" valign="top" width="25%">Shipping Method Name:</td>
                    <td style="font-family:Arial;font-size:13px"><?php echo $ordershipment->shipping_methodname ?? ''; ?></td>
                </tr>
                <tr>
                    <td style="font-family:Arial;font-size:13px;font-weight:bold" nowrap="" valign="top" width="25%">Shipping Tracking Number:</td>
                    <td style="font-family:Arial;font-size:13px"><?php echo $ordershipment->shipping_trackno ?? ''; ?></td>
                </tr>
                <tr>
                    <td style="font-family:Arial;font-size:13px;font-weight:bold" nowrap="" valign="top" width="25%">Shipping Date Number:</td>
                    <td style="font-family:Arial;font-size:13px"><?php echo e(fnDateTimeFormat($ordershipment->updated_at)); ?></td>
                </tr>
                <tr>
                    <td style="font-family:Arial;font-size:13px;font-weight:bold" nowrap="" valign="top" width="25%">Comment:</td>
                    <td style="font-family:Arial;font-size:13px"><?php echo e($order->shipping_comment ?? ''); ?></td>
                </tr>
            </tbody>
        </table>
        <?php endif; ?>
        <p><a href="<?php echo e(route('account.order-history')); ?>">Click here to view the status of your order</a></p>
        <p style="margin-top:12px;margin-top: 12px;padding: 10px;background: #ececec;">
            <strong><span class="il"><?php echo e(config('app.name')); ?></span></strong>
            <br>
            <a href="<?php echo e(env('APP_URL')); ?>"><?php echo e(env('APP_URL')); ?></a>
        </p>
</div>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('email.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/megatanws/public_html/web/resources/views/email/orders/status_changed.blade.php ENDPATH**/ ?>