<div class="cart-checkout-details">
    @include('form.cart_detail')
</div>
<form class="form-horizontal checkout_order_placed" id="order_placed" method="post" action="{{route('checkout.order_placed')}}" onsubmit="checkout.order_placed(this)" >
    @method('post')
    @csrf
    <fieldset>
        <legend>Credit Card Details</legend>
        <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-cc-owner">Card Holder Name</label>
            <div class="col-sm-10">
                <input type="text" name="cc_owner" value="" placeholder="Card Holder Name" id="input-cc-owner" class="form-control">
                <span class="text text-danger error-msg" id="cc_owner_error"></span>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-cc-number">Card Number</label>
            <div class="col-sm-10">
                <input type="number" name="cc_number" value="" placeholder="Card Number" id="input-cc-number" class="form-control" onkeypress="if(this.value.length >= 16) return false;" onpaste="if(this.value.length >= 16) return false;">
                <span class="text text-danger error-msg" id="cc_number_error"></span>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-cc-expire-date">Expiry Date</label>
            <div class="col-sm-3">
                {!! months('cc_expire_date_month','input-cc-expire-date',1,'form-control') !!}
                <span class="text text-danger error-msg" id="cc_expire_date_month_error"></span>
            </div>
            <div class="col-sm-3">
                {!! years('cc_expire_date_year','cc_expire_date_year',null,'form-control') !!}
                <span class="text text-danger error-msg" id="cc_expire_date_year_error"></span>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-cc-cvv2">Card Security Code (CVV2)</label>
            <div class="col-sm-10">
                <input type="number" name="cc_cvv2" value="" placeholder="Card Security Code (CVV2)" id="input-cc-cvv2" class="form-control" onkeypress="if(this.value.length >= 3) return false;" onpaste="if(this.value.length >= 3) return false;">
                <span class="text text-danger error-msg" id="cc_cvv2_error"></span>
            </div>
        </div>
    </fieldset>

<div class="buttons">
    <div class="pull-right">
        <input type="submit" value="Confirm Order" id="button-confirm" class="btn btn-primary">
    </div>
</div>
</form>