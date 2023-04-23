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
            <th>Action</th>
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
	                    {!! quantityIncDecInput('',$item->qty) !!}
	                    <a href="" onClick="Order_Form.addItem('{{$item->model->_id}}',$(this).parents('.quoteItemQuantity').find('input.cart-product-quantity').val())">Update</a>
					</td>
			        <td class="quoteItemPrice">{{priceFormat($item->price)}}</td>
			        <td class="quoteItemTotal"><span>{{priceFormat($item->price * $item->qty)}}</span></td>
					<td class="quoteItemAction">
						<a href="javascript:void(0);" class="btn-icon deleteItemLink" onclick="Order_Form.deleteItem('{{$item->rowId}}')"><i class="fas fa-trash-alt"></i></a>
				    </td>
			    </tr>
		    @endforeach
		    <tr>
			    <td colspan="5"></td>
			    <td>Subtotal:{{priceFormat(Cart::instance('adminCart')->total())}}</td>
			</tr>
	    </tbody>
	</table>
 </div>	
@else
 <p>Your cart is empty</p>
@endif

             


