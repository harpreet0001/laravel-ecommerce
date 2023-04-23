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

    <div id="PackingSlips" class="">
        <div id="Logo">
        </div>
        <div class="PackingSlip">
            <div class="PackingSlipTitle">
                <?php echo e(env('APP_NAME')); ?> Packing Slip for Order #<?php echo e($order->unique_order_id); ?>

            </div>
            <div class="AddressRow">
                <div class="BillingAddress">
                    <div class="PackingSlipHeading">Billing Details</div>
                    <?php if(isset($billing_details)): ?>
	                   <?php echo e($billing_details->firstname); ?> <?php echo e($billing_details->lastname); ?><br><?php echo e($billing_details->company); ?><br><?php echo e($billing_details->city); ?>,<?php echo getStateName($billing_details->stateId); ?>,<?php echo getCountryName($billing_details->countryId); ?>, <?php echo e($billing_details->address_1); ?>

	                    <div style="">
	                        Phone: <?php echo e($user->phone); ?>

	                    </div>
                    <?php endif; ?>
                </div>
                <div class="ShippingAddress">
                    <div class="PackingSlipHeading">Shipping Details</div>
                     <?php if(isset($shipping_details)): ?>
	                   <?php echo e($shipping_details->firstname); ?> <?php echo e($shipping_details->lastname); ?><br><?php echo e($shipping_details->company); ?><br><?php echo e($shipping_details->city); ?>,<?php echo getStateName($shipping_details->stateId); ?>,<?php echo getCountryName($shipping_details->countryId); ?>, <?php echo e($shipping_details->address_1); ?>

	                    <div style="">
	                        Phone: <?php echo e($user->phone); ?>

	                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="PackingSlipDetails">
                <div class="PackingSlipDetailsLeft">
                    <div class="DetailRow">
                        <div class="Label">Order:</div>
                        <div class="Value">#<?php echo e($order->unique_order_id); ?></div>
                    </div>
                    <div class="DetailRow">
                        <div class="Label">Order Date:</div>
                        <div class="Value"><?php echo fnDateFormat($order->created_at); ?></div>
                    </div>
                </div>
                <div class="PackingSlipDetailsRight">
                    <div class="DetailRow" style="">
                        <div class="Label">Shipping Method:</div>
                        <div class="Value"><?php echo e($shipping_method_details->methodname ?? ''); ?></div>
                    </div>
                    <div class="DetailRow" style="display: none">
                        <div class="Label">Date Shipped:</div>
                        <div class="Value"></div>
                    </div>
                    <div class="DetailRow" style="display: none">
                        <div class="Label">Tracking Number:</div>
                        <div class="Value"></div>
                    </div>
                </div>
            </div>
            <div class="PackingSlipItems">
                <div class="PackingSlipHeading">Shipped Items</div>
                <table class="PackingSlipTable">
                    <thead>
                        <tr>
                            <th class="ProductQuantity">Qty</th>
                            <th class="ProductSku">Code/SKU</th>
                            <th class="ProductDetails">Product Name</th>
                        </tr>
                    </thead>
                    <tbody class="PackingSlipItemList">
                    	<?php if(isset($orderitems)): ?>
							<?php $__currentLoopData = $orderitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                        <tr>
	                            <td class="ProductQuantity"><?php echo e($orderitem->quantity); ?></td>
	                            <td class="ProductSku">N/A</td>
	                            <td class="ProductDetails">
	                                <?php echo e($orderitem->product->title); ?>

	                                <div class="ProductVariationOptions" style="display: none">
	                                </div>
	                                <div class="ProductConfigurableFields" style="display: none">
	                                    <div class="ProductGiftWrapping" style="">
	                                    </div>
	                                    <div class="ProductEventDate" style="display: none">
	                                    </div>
	                                </div>
	                            </td>
	                        </tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					    <?php endif; ?>   
                    </tbody>
                </table>
            </div>
            <div class="PackingSlipComments" style="">
                <div class="PackingSlipHeading">Comments</div>
                <blockquote>
                   <?php echo $order->ordercomment; ?>

                </blockquote>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    window.setTimeout("window.print();", 1000);
    </script>
</body>

</html><?php /**PATH /home/megatanws/public_html/web/resources/views/admin/modules/order/print/printPackingSlip.blade.php ENDPATH**/ ?>