@if(Cart::instance('adminCart')->count() > 0)
<div class="table-responsive">
	 <table class="table">
	    <thead>
          <tr>
            <th>Products Image</th>
            <th>Products Name</th>
            <th>Qty</th>
            <th>Item Price </th>
            <th>Item Total</th>
          </tr>
        </thead>
		<tbody>
		    @foreach(Cart::instance('adminCart')->content() as $item)									
				<tr id="itemId_{{$item->model->_id}}">
					<td class="quoteItemImage">
						<span class="product-img"><img src="{{asset($item->model->image)}}" alt=""></span>
					</td>
					<td>
						<div class="quoteItemName">{{$item->model->title}}</div>
				    </td>
					<td class="quoteItemQuantity">
	                    {{$item->qty}}
					</td>
			        <td class="quoteItemPrice">{{priceFormat($item->price)}}</td>
			        <td class="quoteItemTotal"><span>{{priceFormat($item->price * $item->qty)}}</span></td>
			    </tr>
		    @endforeach
			    <tr>
				    <td colspan="4"></td>
				    <td class="order-subtotal">Subtotal:{{priceFormat(Cart::instance('adminCart')->total())}}</td>
				</tr>
				<tr>
				    <td colspan="4"></td>
				    <td>Shipping:<span class="order-shipping"></span></td>
				</tr>
				<tr>
				    <td colspan="4"></td>
				    <td>Total:<span class="order-total"></span></td>
				</tr>
	    </tbody>
	</table>
 </div>	
@else
 <p>Your cart is empty</p>
@endif

             


