<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <style type="text/css">
    body {
        background: #fff;
        color: #000;
        margin: 10px
    }

    body,
    td,
    th {
        font-family: Verdana;
        font-size: 12px
    }

    #Logo {
        margin-bottom: 10px
    }

    h1,
    h1 a {
        color: #000;
        text-decoration: none
    }

    .Invoice,
    .PackingSlip {
        border: 2px solid #cacaca;
        padding: 5px
    }

    .InvoiceTitle,
    .PackingSlipTitle {
        font-size: 15px;
        font-weight: 700;
        background: #000;
        color: #fff;
        padding: 5px;
        margin-bottom: 10px
    }

    .StoreAddress {
        font-weight: 700;
        margin-bottom: 10px
    }

    .InvoiceHeading,
    .PackingSlipHeading {
        font-size: 15px;
        font-weight: 700;
        margin-bottom: 10px
    }

    .CustomerDetails,
    .AddressRow,
    .InvoiceItems,
    .InvoiceDetails,
    .PackingSlipItems,
    .PackingSlipDetails {
        margin-bottom: 10px
    }

    .InvoiceTable,
    .PackingSlipTable {
        border-collapse: collapse;
        width: 100%
    }

    .InvoiceTable th,
    .PackingSlipTable th {
        font-weight: 700;
        padding: 5px;
        text-align: left
    }

    .InvoiceTable td,
    .PackingSlipTable td {
        padding: 5px;
        vertical-align: top;
        text-align: left
    }

    td.ProductQuantity,
    th.ProductQuantity,
    td.ProductCost,
    th.ProductCost,
    td.ProductTotal,
    th.ProductTotal,
    .InvoiceTotals td,
    .InvoiceTotalRow td {
        text-align: right
    }

    .AddressRow,
    .InvoiceDetails,
    .PackingSlipDetails {
        overflow: hidden;
        width: 100%
    }

    .ShippingAddress,
    .BillingAddress,
    .InvoiceDetailsLeft,
    .InvoiceDetailsRight,
    .PackingSlipDetailsLeft,
    .PackingSlipDetailsRight {
        float: left;
        width: 48%
    }

    .InvoiceItems,
    .PackingSlipItems {
        border-top: 1px solid #000;
        padding-top: 10px
    }

    .InvoiceItemList {
        border-bottom: 1px solid #000
    }

    .InvoiceItemDivider td {
        padding-top: 10px;
        border-top: 1px solid #000
    }

    .DetailRow,
    .ConfigurableProductRow {
        clear: left;
        margin-top: 6px;
        padding-left: 140px
    }

    .DetailRow .Label,
    .ConfigurableProductRow .Label {
        margin: 0 0 6px -140px;
        float: left;
        width: 130px;
        padding-top: 1px;
        display: inline;
        position: relative
    }

    .DetailRow .Value,
    .ConfigurableProductRow .Value {
        display: inline
    }

    .InvoiceDetails .DetailRow .Label,
    .PackingSlipDetails .DetailRow .Label {
        font-weight: 700
    }

    .ConfigurableProductRow {
        font-size: 11px;
        margin-left: 10px
    }

    .InvoiceTotals .InvoiceTotal td {
        font-weight: 700
    }

    .ProductQuantity {
        width: 50px
    }

    .ProductCost,
    .ProductTotal {
        width: 150px
    }

    .PageBreak {
        page-break-after: always
    }

    .ProductPreOrder {
        font-size: 11px
    }
    </style>
</head>

<body>

	<?php ($user             = $order->orderuser); ?>
    <?php ($billing_details  = $order->billing_address_details); ?>
    <?php ($shipping_details = $order->shipping_address_details); ?>
    <?php ($orderitems       = $order->orderItems); ?>
    <?php ($shipping_method_details = $order->shipping_method_details); ?>
    <?php ($card_details = $order->card_details); ?>
    
    <div class="Invoice">
        <div id="Logo">
            <a href="#"><img src="https://megatan.ws/product_images/logo.png" border="0" id="LogoImage" alt="MEGATAN"></a>
        </div>
        <div class="InvoiceTitle" style="background: #000;">
            <?php echo e(env('APP_NAME')); ?> Invoice for Order #<?php echo e($order->unique_order_id); ?>

        </div>
        <div class="AddressRow">
            <div class="BillingAddress">
                <div class="InvoiceHeading">Billing Details</div>
                <?php if(isset($billing_details)): ?>
                    <strong><?php echo e($billing_details->firstname); ?> <?php echo e($billing_details->lastname); ?></strong>
	                <br><?php echo e($billing_details->company); ?>

	                <br>
	                <?php echo e($billing_details->city); ?>,<?php echo getStateName($billing_details->stateId); ?>,<?php echo getCountryName($billing_details->countryId); ?> <br>
	                <?php echo e($billing_details->address_1); ?><br>
	                <?php echo e($billing_details->address_2); ?>

	                <div>Phone: <?php echo e($user->phone); ?></div>
	                <div style="">Email: <?php echo e($user->email ?? ''); ?></div>
                <?php endif; ?>
            </div>
            <div class="ShippingAddress" style="">
                <div class="InvoiceHeading">Shipping Details</div>
                <?php if(isset($shipping_details)): ?>
                    <strong><?php echo e($shipping_details->firstname); ?> <?php echo e($shipping_details->lastname); ?></strong>
	                <br><?php echo e($shipping_details->company); ?>

	                <br>
	                <?php echo e($shipping_details->city); ?>,<?php echo getStateName($shipping_details->stateId); ?>,<?php echo getCountryName($shipping_details->countryId); ?><br>
	                <?php echo e($shipping_details->address_1); ?><br>
	                <?php echo e($shipping_details->address_2); ?>

	                <div>Phone: <?php echo e($user->phone); ?></div>
	                <div style="">Email: <?php echo e($user->email ?? ''); ?></div>
                <?php endif; ?>
            </div>
        </div>
        <div class="InvoiceDetails">
            <div class="InvoiceDetailsLeft">
                <div class="DetailRow">
                    <div class="Label">Order:</div>
                    <div class="Value">#<?php echo e($order->unique_order_id); ?></div>
                </div>
                <div class="DetailRow">
                    <div class="Label">Payment Method:</div>
                    <div class="Value"><?php echo e($order->payment_method); ?></div>
                </div>
            </div>
            <div class="InvoiceDetailsRight">
                <div class="DetailRow">
                    <div class="Label">Order Date:</div>
                    <div class="Value"><?php echo fnDateFormat($order->created_at); ?></div>
                </div>
                <div class="DetailRow" style="">
                    <div class="Label">Shipping Method:</div>
                    <div class="Value"><?php echo e($shipping_method_details->methodname ?? ''); ?></div>
                </div>
            </div>
        </div>
        <div class="InvoiceItems">
            <div class="InvoiceHeading">Order Items</div>
            <table class="InvoiceTable">
                <thead>
                    <tr>
                        <th class="ProductQuantity">Qty</th>
                        <th class="ProductSku">Code/SKU</th>
                        <th class="ProductDetails">Product Name</th>
                        <th class="ProductCost" align="right">Price</th>
                        <th class="ProductTotal" align="right">Total</th>
                    </tr>
                </thead>
                <tbody class="InvoiceItemList">
					<?php if(isset($orderitems)): ?>
						<?php $__currentLoopData = $orderitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						    <tr class="">
		                        <td class="ProductQuantity"><?php echo e($orderitem->quantity); ?></td>
		                        <td class="ProductSku">N/A</td>
		                        <td class="ProductDetails">
		                            <?php echo e($orderitem->product->title); ?>

		                        </td>
		                        <td class="ProductCost"><?php echo e(priceFormat($orderitem->price)); ?></td>
		                        <td class="ProductTotal"><?php echo e(priceFormat($orderitem->price * $orderitem->quantity)); ?></td>
		                    </tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>   
                </tbody>
                <tbody class="InvoiceTotals">
                    <tr class="InvoiceSubtotal InvoiceTotalRow">
                        <td class="Title" colspan="4">Subtotal:</td>
                        <td class="Total"><?php echo priceFormat($order->subtotal); ?></td>
                    </tr>
                    <tr class="InvoiceSubtotal InvoiceTotalRow">
                        <td class="Title" colspan="4">Discount:</td>
                        <td class="Total">-<?php echo priceFormat($order->discount ?? 0); ?></td>
                    </tr>
                    <tr class="InvoiceShipping InvoiceTotalRow">
                        <td class="Title" colspan="4">Shipping(<?php echo e($shipping_method_details->methodname ?? ''); ?>):</td>
                        <td class="Total"><?php echo priceFormat($order->shipping ?? 0); ?></td>
                    </tr>
                    <tr class="InvoiceTotal InvoiceTotalRow">
                        <td class="Title" colspan="4">Grand Total:</td>
                        <td class="Total"><?php echo priceFormat($order->total); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p align="center"><strong>PLEASE NOTE: You will find an entry on your card or bank statement for this amount in the name of <?php echo e(base64_decode($card_details->cc_owner)); ?> as we use them for processing our card payments.</strong></p>
        <div class="InvoiceComments" style="">
            <div class="InvoiceHeading">Comments</div>
            <blockquote>
                <?php echo $order->ordercomment; ?>

            </blockquote>
        </div>
    </div>    
    <script type="text/javascript">
		window.onload = function()
		{
			 window.print();
		}
   </script>
</body>

</html><?php /**PATH /home/megatanws/public_html/web/resources/views/admin/modules/order/print/printInvoice.blade.php ENDPATH**/ ?>