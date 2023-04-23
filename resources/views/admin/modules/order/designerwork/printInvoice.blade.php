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
    <div class="Invoice">
        <div id="Logo">
            <a href="#"><img src="https://megatan.ws/product_images/logo.png" border="0" id="LogoImage" alt="MEGATAN"></a>
        </div>
        <div class="InvoiceTitle" style="background: #000;">
            MEGATAN Invoice for Order #304268
        </div>
        <div class="StoreAddress">
            Earth
        </div>
        <div class="AddressRow">
            <div class="BillingAddress">
                <div class="InvoiceHeading">Billing Details</div>
                <strong>Amarjeet Singh</strong>
                <br>Deftsoft
                <br>
                Mohli testing 1<br>
                Mohali, Suffolk CO10 8BZ<br>
                United Kingdom
                <div></div>
                <div>Phone: 9759348288</div>
                <div style="">Email: qa5.deftsoft@gmail.com</div>
            </div>
            <div class="ShippingAddress" style="">
                <div class="InvoiceHeading">Shipping Details</div>
                <strong>Amarjeet singh</strong>
                <br>Deft test
                <br>
                chndigrh<br>chndigrh 1<br>
                chd, Suffolk CO10 8BZ<br>
                United Kingdom
                <div></div>
                <div>Phone: Phone: 9759348288</div>
                <div style="">Email: qa5.deftsoft@gmail.com</div>
            </div>
        </div>
        <div class="InvoiceDetails">
            <div class="InvoiceDetailsLeft">
                <div class="DetailRow">
                    <div class="Label">Order:</div>
                    <div class="Value">#304268</div>
                </div>
                <div class="DetailRow">
                    <div class="Label">Payment Method:</div>
                    <div class="Value">Credit and Debit Cards (£17.95)</div>
                </div>
            </div>
            <div class="InvoiceDetailsRight">
                <div class="DetailRow">
                    <div class="Label">Order Date:</div>
                    <div class="Value">8th Jun 2021</div>
                </div>
                <div class="DetailRow" style="">
                    <div class="Label">Shipping Method:</div>
                    <div class="Value">Royal Mail 1st Class Signed For</div>
                </div>
            </div>
        </div>
        <div class="InvoiceItems">
            <div class="InvoiceHeading">Order Items</div>
            <table class="InvoiceTable">
                <thead>
                    <tr>
                        <th class="ProductShippingAddress" style="display: none">Shipping Address</th>
                        <th class="ProductQuantity">Qty</th>
                        <th class="ProductSku">Code/SKU</th>
                        <th class="ProductDetails">Product Name</th>
                        <th class="ProductCost" align="right">Price</th>
                        <th class="ProductTotal" align="right">Total</th>
                    </tr>
                </thead>
                <tbody class="InvoiceItemList">
                    <tr class="">
                        <td class="ProductShippingAddress" style="display: none" rowspan="1" nowrap="nowrap">
                            <strong>Amarjeet singh</strong>
                            <br>Deft test
                            <br>
                            chndigrh<br>chndigrh 1<br>
                            chd, Suffolk CO10 8BZ<br>
                            United Kingdom
                            <div></div>
                        </td>
                        <td class="ProductQuantity">1</td>
                        <td class="ProductSku">N/A</td>
                        <td class="ProductDetails">
                            Melanotan 2 10mg (1 vial) + 1 FREE
                        </td>
                        <td class="ProductCost">£17.95 GBP</td>
                        <td class="ProductTotal">£17.95 GBP</td>
                    </tr>
                </tbody>
                <tbody class="InvoiceTotals">
                    <tr class="InvoiceSubtotal InvoiceTotalRow">
                        <td class="Title" colspan="4">Subtotal:</td>
                        <td class="Total">£17.95 GBP</td>
                    </tr>
                    <tr class="InvoiceShipping InvoiceTotalRow">
                        <td class="Title" colspan="4">Shipping:</td>
                        <td class="Total">£0.00 GBP</td>
                    </tr>
                    <tr class="InvoiceTotal InvoiceTotalRow">
                        <td class="Title" colspan="4">Grand Total:</td>
                        <td class="Total">£17.95 GBP</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p align="center"><strong>PLEASE NOTE: You will find an entry on your card or bank statement for this amount in the name of 'WANNATAN' as we use them for processing our card payments.</strong></p>
        <div class="InvoiceComments" style="">
            <div class="InvoiceHeading">Comments</div>
            <blockquote>
                testing order
            </blockquote>
        </div>
    </div>    
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>