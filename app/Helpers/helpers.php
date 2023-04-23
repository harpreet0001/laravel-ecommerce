<?php 
use Carbon\Carbon;
use App\Models\State;
use App\Models\Module;
use App\Models\Country;
use App\Models\Wishlist;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\ShippingZone;
use App\Models\ShippingMethod;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

function GetCurrentRoute(){
	return Route::currentRouteName();
}

function CheckPermissions($parent){ 
    $parentRoute = GetCurrentRoute();
    $moduledata  = Module::where('type', $parent);
    if($parent==1){
        $ParentID   = Module::where('slug', $parentRoute)->first();
        $moduledata = $moduledata->where('parent', $ParentID->_id);
    }
    if(Auth::user()->role=='subadmin'){
        $records = Permission::where('userid', Auth::user()->_id)->first();
        if(!empty($records)){
            $recordsDecode  = json_decode($records->userpermissions);
            if(sizeof($recordsDecode)>0){
                $moduledata = $moduledata->whereIn('_id',$recordsDecode);
            }
        }
    }
    $moduleGet = $moduledata->where('active', 1)->orderBy('serial', 'ASC')->get();
    return $moduleGet;
}

function GetPermittedSideManu()
{
	$HoldManus = "";
	$SideDaynamicModule = CheckPermissions(0); /* For permissions checking. 0 is parent type of mudules. */
	foreach($SideDaynamicModule as $key=>$value){
		$HoldManus.= '<li class="nav-item '.IsActiveSidemanu($value->slug).'">
					    <a href="'.route($value->slug).'" class="nav-link">
					      <i class="nav-icon '.$value->iconclass.'"></i>
					      <p>
					        '.ucfirst($value->title).'
					      </p>
					    </a>
					  </li>';
	}
	return $HoldManus;
}

function GetModuleTitle($ids){
  	$id_Array	= json_decode($ids);
  	if(sizeof($id_Array)>0){
  		$ModulesTitles  	= Module::select('title')->whereIn('_id', $id_Array)->get(); //->toArray();
	  	foreach ($ModulesTitles as $moduleKey => $modulevalue) {
	  		echo '<span class="badge badge-light" style="margin-right: 5px;">'.$modulevalue->title.'</span>';
	  	}	
  	}
}

function IsLoopPermitted($usetype=0, $id=""){
	$LoopLinks   = "";
	$childModule = json_decode(CheckPermissions(1));
	if(isset($childModule) && !empty($childModule)){
		foreach($childModule as $key=>$value){
			if($value->usetype == $usetype){
				$LoopLinks.= ReturnChildButton($value, $usetype, $id);
			}
		}
	}
	return $LoopLinks.PageWithBack();
}

function ReturnChildButton($value, $usetype, $id){
    
    $deleteRoute = 0;
	if(preg_match("/delete/i", $value->slug)) 
	{
	   $deleteRoute = 1;	 
	}

	if($usetype == 0){
		return '<a href="'.Route($value->slug).'" class="'.$value->iconclass.'">'.ucwords($value->title).'</a>&nbsp;';
	}else if($usetype == 1){

		if($deleteRoute == 1)
		{
           return '<li> <a href="'.Route($value->slug,base64_encode($id)).'" data-toggle="tooltip" title="'.ucwords($value->title).'" class="btn btn-info action-btn" onclick="return confirm(\'Are you sure?\');"><span><i class="'.$value->iconclass.'"></i></span></a></li>';
		}

		  return '<li> <a href="'.Route($value->slug,base64_encode($id)).'" data-toggle="tooltip" title="'.ucwords($value->title).'" class="btn btn-info action-btn"><span><i class="'.$value->iconclass.'"></i></span></a></li>';
	}
}

function PageWithBack(){
	$FindRoute = IsModuleWithParent();
	if($FindRoute != ""){
		return '<a href="'.Route($FindRoute).'" class="btn btn-primary">Back</a>'; //'.$BackRoute->iconclass.'
	}else{
		return "";
	}
}

function CardTitle(){
	$ThisRecord = Module::Select('title')->where('slug', GetCurrentRoute())->first();
	return ucwords($ThisRecord->title);	
}

function IsActiveSidemanu($SlugInLoop){
	$ActiveParentRoute = IsModuleWithParent()=="" ? GetCurrentRoute() : IsModuleWithParent();
	if($SlugInLoop==$ActiveParentRoute){
		return 'active';
	}
	else{
		return '';
	}
}

function IsModuleWithParent(){
	$MainRoute = Module::with('WithParent')->where('slug', GetCurrentRoute())->first();
	if(isset($MainRoute)){
		if(isset($MainRoute->WithParent)){
			return$MainRoute->WithParent->slug;
		}else {
			return "";
		}
	}else{
		return substr(GetCurrentRoute(), 0, strpos(GetCurrentRoute(), "-")).'-list'; /*If route is not dynamic.*/
	}
}

function priceFormat($price){  

	return '£'.number_format((float)$price,2);
    //setlocale(LC_MONETARY, 'de_DE');
    //return  money_format('€ %!n', $price);
}

function appendCurrency($value)
{
   return '£'.$value;
}

function productImage($path){
   return $path && file_exists(public_path($path)) ? asset($path) : 'https://via.placeholder.com/150x150?text=No+Image+Found';
}

function imagePath($path){
   return $path && file_exists(public_path($path)) ? asset($path) : 'https://via.placeholder.com/150x150?text=No+Image+Found';
}

function blogDateFormat($date){
   return $date->format('d').'<i>'.$date->format('M').'</i>';
}

function getCondition($condition = 'new'){

	if($condition == 'new'){
        return '<span class="product-label"><b>New</b></span>';
	}elseif ($condition == 'used') {
		return '<span class="product-label product-label-2"><b>Used</b></span>';
	}else{
		return '<span class="product-label product-label-3"><b>Refurbished</b></span>';   
	}

}

function getStockLevel($product)
{
    if (!empty($product->currentstock) && (int)($product->currentstock) == 0) {
        $stockLevel = '<li class="product-stock not-available"><b>Stock:</b> <span>Not available</span></li>';
    } elseif (empty($product->currentstock) || (int)($product->currentstock) > (int)($product->lowstock)) {
        $stockLevel = '<li class="product-stock in-stock"><b>Stock:</b> <span>In Stock</span></li>';
    } else {
        $stockLevel = '<li class="product-stock low-stock"><b>Stock:</b> <span>Low Stock</span></li>';
    }

    return $stockLevel;
}



function compareProductCount(){

	if(isset($_COOKIE['compare_products']) && count((array)json_decode($_COOKIE['compare_products'])) > 0){
     
		return '<span class="count-badge compare-badge">'.count((array)json_decode($_COOKIE['compare_products'])).'</span>';
	}
}

function wishlistProductCount(){

	if(auth()->check()){
     
		$userwishlistproductscount = Wishlist::where('userId',auth()->user()->_id)->count();

		if($userwishlistproductscount > 0)
		{
		  return '<span class="count-badge wishlist-badge">'.$userwishlistproductscount.'</span>';	
		}

	}
}

function wishlistbtn($product,$classes ='',$text = '')
{    
	 $logo_classes = "far fa-heart";

	 if(auth()->check()){

	 	 $userwishlistproduct = Wishlist::where(['userId' => auth()->user()->_id,'productId' => $product->_id])->first();
	 	 if(!is_null($userwishlistproduct)){

	 	 	$logo_classes = $logo_classes.' heart-red-icon';

	 	 }
	 }
     return '<a href                = "javascript:void(0);" 
                class               =  "'.$classes.'"
                data-toggle         = "tooltip" 
                data-placement      = "top" 
                title               = "Add to wishlist" 
                data-original-title = "Add to Wish List"
                onclick="wishlist.add(this,'."'".base64_encode($product->_id)."'".')">
                 <i class="'.$logo_classes.'"></i>
                 <span>'.$text.'</span>
            </a>';
}

function comparebtn($product,$classes ='',$text = '')
{    
	$logo_classes = "far fa-heart";

     return '<a href                = "javascript:void(0);"
                class               = "'.$classes.'" 
                data-toggle         = "tooltip" 
                data-placement      = "top" 
                title               = "Compare this product" 
                data-original-title = "Campare this Product" 
                onclick="compare.add('."'".base64_encode($product->_id)."'".')">
                 <i class="'.$logo_classes.'"></i>
                 <span class="btn-text">'.$text.'</span>
            </a>';
}

function quantityIncDecInput($classes=null,$min=1,$max=10)
{
	return '<div class="stepper">
		    <input type="number" name="quantity" value="'.(int)$min.'" min="1" max="100000" class="form-control cart-product-quantity">
		     <span class="">
		        <i class="fa fa-angle-up input-number-increment"></i>
		        <i class="fa fa-angle-down input-number-decrement"></i>
		    </span>
		</div>';

}

function addToCart($product,$classes = '',$text = '',$qtyIncDec = true,$icon='<i class="fas fa-shopping-cart"></i>')
{

	if($product->currentstock === '' || (int)$product->currentstock > 0)
	{

	    $output = '<form onsubmit="cart.add(this)" method="post" action="'.route('cart.store').'">
			        <!-- Quanity-inc-dec-input   -->';
	    if($qtyIncDec){
	    	$output .=  quantityIncDecInput("quantity-input");
	    }else{
	    	$output .= '<input type="hidden" name="quantity" value="1">';
	    }
		$output .=	'<!-- Quanity-inc-dec-input   -->
			         '.csrf_field().'
			         <input type="hidden" name="productId" value="'.base64_encode($product->_id).'">
			         <button type="submit" data-toggle="tooltip" data-placement="top" title="Add to cart" data-original-title="Add to cart" class="btn btn-cart '.$classes.'" data-loading-text="Loading..." ><span class="add-cart-mobile" >'.$text.'<span></button>
			        
			        <button type="submit" class="mobile-shopping-icon" title = "Add to cart" 
                data-original-title = "Add to cart">
			            '.$icon.'
			        </button>
			    </form>';
	    return $output;		    
	}
	else{

		return '<span class="out-of-stock">Out Of Stock</span>' ;
	} 
    	    
}

function buyNow($product,$classes='',$text=''){

    if($product->currentstock === '' || (int)$product->currentstock > 0)
	{
	     return '<form onsubmit="cart.add(this)" method="post" action="'.route('cart.store').'">
			         '.csrf_field().'
			         <input type="hidden" name="redirect" value="'.route('checkout.index').'" />
			         <input type="hidden" name="quantity" value="1">
			         <input type="hidden" name="productId" value="'.base64_encode($product->_id).'">
			         <button type="submit" data-loading-text="Loading..." class="'.$classes.' buy-now-btn">
			         <span class="buy-now-mobile">'.$text.'</span></button>
			    </form>';
	}
	else
	{
		return '' ;
	}
	     
}

function defaultAddressbookLevel($addressbook)
{
    if($addressbook->default == '1'){
     	return '<ul class="default-addressbook"><li class="default-addressbook-list"><span>Default</span></li><ul>';
    }
    return '';
}

function fnDateFormat($date)
{
    return Carbon::parse($date)->format('jS M Y');
}

function fnDateTimeFormat($date)
{
    return Carbon::parse($date)->format('jS M Y h:m A');
}

function getCountryName($countryId){

	$country  = Country::where('_id',$countryId)->first();
	return $country->country_name ?? '';
}

function getStateName($stateId){

	$state = State::where('_id',$stateId)->first();
	return $state->state_name ?? '';
}

function orderStatusArr(){

	return [
		        1   => 'Pending',
		        2   => 'Shipped',
		        3   => 'Partially Shipped',
		        4   => 'Refunded',
		        5   => 'Cancelled',
		        6   => 'Declined',
		        7   => 'Awaiting Payment',
		        8   => 'Awaiting Pickup',
		        9   => 'Awaiting Shipment',
		        10  => 'Completed',
		        11  => 'Awaiting Fulfillment',
		   ];

}

function orderStatusColourArr(){

	return [
		        1   => 'yellow',
		        2   => 'red',
		        3   => 'blue',
		        4   => 'cream',
		        5   => 'black',
		        6   => 'pink',
		        7   => 'brown',
		        8   => 'purple',
		        9   => 'white',
		        10  => 'green',
		        11  => 'orange',
		   ];

}

function orderstatusVal($orderstatus){

	$orderStatusArr = orderStatusArr();
    return isset($orderStatusArr[$orderstatus]) ? $orderStatusArr[$orderstatus] : '';
}

function orderstatusColour($orderstatus){

	$orderStatusColourArr = orderStatusColourArr();
    return isset($orderStatusColourArr[$orderstatus]) ? $orderStatusColourArr[$orderstatus] : 'no-colour';
}


function selectOrderStatus($order)
{
	$orderstatus    = !is_null($order) ? $order->orderstatus : null;
	$orderStatusArr = orderStatusArr();
	$html           = '<select 
	                          id       = "status_'.base64_encode($order->_id).'"
	                          class    = "'.'order_status_changed'.'"
	                          name     = "status_'.base64_encode($order->_id).'" 
	                          data-url = "'.route('admin.order.update-order-status').'"
	                          onchange = "update_order_status(this,'."'".base64_encode($order->_id)."',this.options[this.selectedIndex].value,this.options[this.selectedIndex].text".')"
	                          onclick  = "setlastorderstatus(this.value)"
	                   >';
	foreach($orderStatusArr as $key => $value){
       if(!is_null($orderstatus) && $orderstatus == $key)
       {
            $html  .= '<option value="'.$key.'" selected>'.$value.'</option>';
       }
       else
       {
			$html  .= '<option value="'.$key.'">'.$value.'</option>';
       }
	}
	$html          .= '<select>';

	return $html;
}

function orderActions($orderId)
{
	$orderId = base64_encode($orderId);
	$dataUrl = route('admin.order.action');

	$html =     '<li><a href="#" class="btn btn-info" data-toggle="tooltip" title="print invoice" onclick="Order.HandleAction(this,'."'".$orderId."'".','."'".'printInvoice'."'".')" 
                    data-url = '."'".$dataUrl."'".'><span><i class="fas fa-print"></i></span></a></li>';

    $html .=    '<li><a href="#" class="btn btn-info" data-toggle="tooltip" title="print packing slip " onclick="Order.HandleAction(this,'."'".$orderId."'".','."'".'printPackingSlip'."'".')" 
                    data-url = '."'".$dataUrl."'".'><span><i class="fas fa-file-pdf"></i></span></a></li>' ;  

    return $html;                    
  

    return '<select name="order_options_'.$orderId.'" id="order_action_'.$orderId.'" 
                   onchange="Order.HandleAction(this,'."'".base64_encode($orderId)."'".',(this.options[this.selectedIndex].value));this.selectedIndex=0;" 
                    data-url = "'.route('admin.order.action').'"
            >
				<option value="">-- Actions --</option>
				<option value="printInvoice">Print Invoice</option>
				<option value="printPackingSlip">Print Packing Slip</option>
			</select>';
}


function getNumbers()
{
    $tax = 0;
    $shipping = 0;
    $shipping_method_detail = session()->get('order')['shippingMethodDetails'];
    if(isset($shipping_method_detail) && !is_null($shipping_method_detail) && !empty($shipping_method_detail))
    {
    	$shipping = (float)calShippingMethodCost($shipping_method_detail['_id']);
    }

    if(Cart::count() <= 0)
	{
		session()->forget('coupon-'.$_SERVER['REMOTE_ADDR']);
	}
    $couponDiscount         = (session()->has('coupon-'.$_SERVER['REMOTE_ADDR'])) 
                                ? (float)session()->get('coupon-'.$_SERVER['REMOTE_ADDR'])['discount'] 
                                :0;
    $couponName             = (session()->has('coupon-'.$_SERVER['REMOTE_ADDR'])) 
                                ? session()->get('coupon-'.$_SERVER['REMOTE_ADDR'])['name'] 
                                : null;
    $subtotal               = (float)str_replace(',','', Cart::subtotal());
    $newSubtotal            = $subtotal - $couponDiscount;
    if ($newSubtotal < 0) {
        $newSubtotal = 0;
    }
    $newTax   = $newSubtotal * $tax;
    $newTotal = $newSubtotal * (1 + $tax);

    return collect([
        'tax'         => $tax,
        'shipping'    => $shipping,
        'coupon'      => ['name' => $couponName,'discount' => $couponDiscount],
        'subtotal'    => $subtotal,
        'newSubtotal' => $newSubtotal,
        'newTax'      => $newTax,
        'newTotal'    => $newTotal,
    ]);
}

function fnPercentage($sumofTerms,$noOfTerms)
{
	if($sumofTerms <= 0 || $noOfTerms <= 0) {
		 return 0;
	}
	return round($sumofTerms/$noOfTerms * 100);
}

function starRating($product)
{
	$productReviews = $product->reviews();
	$noOfStars      = (int)$productReviews->sum('rating');
	$totalNoOfStars = (int)$productReviews->count()*5;
	return '<div class="all-star-rating">
	    <span class="inner-star_spans">
	        <div class="star-ratings">
	            <div class="fill-ratings" style="width:'.fnPercentage($noOfStars,$totalNoOfStars).'%">
	              <span>&#9733;&#9733;&#9733;&#9733;&#9733;</span>
	            </div>
	            <div class="empty-ratings">
	              <span>&#9734;&#9734;&#9734;&#9734;&#9734;</span>
	            </div>
	        </div>
	    </span>
	</div>';
}

function fixedShippingMethods()
{
	return [ 
		        'shipping_peritem'  => 'Flat Rate Per Item',
		        'shipping_byweight' => 'Ship by Weight',
		        'shipping_bytotal'  => 'Ship by Order Total',
		        'shipping_flatrate' => 'Flat Rate Per Order'
		    ];
}

function  shippingMethodModules()
{
	return [ 
		       
				'shipping_auspost'      => 'Australia Post',
				'shipping_canadapost'   => 'Canada Post',
				'shipping_fedex'        => 'FedEx',
				'shipping_peritem'      => 'Flat Rate Per Item',
				'shipping_flatrate'     => 'Flat Rate Per Order',
				'shipping_intershipper' => 'Intershipper',
				'shipping_royalmail'    => 'Royal Mail',
				'shipping_bytotal'      => 'Ship by Order Total',
				'shipping_byweight'     => 'Ship by Weight',
				'shipping_ups'          => 'UPS',
				'shipping_upsonline'    => 'UPS OnLine Tools',
				'shipping_usps'         => 'USPS',
	
		  ];
}

function getFixedShippingMethodName($shipping_method)
{
    $fixedShippingMethods = fixedShippingMethods();

    return isset($fixedShippingMethods[$shipping_method]) ? $fixedShippingMethods[$shipping_method] : '';
}

function getShippingZone($countryId)
{
	$shippingzone = ShippingZone::where('zonecountry',$countryId)
	                            ->where('zoneenabled',1)
	                            ->where('delete','!=',1)
	                            ->first();                          
	if(is_null($shippingzone))
	{
		$shippingzone = ShippingZone::where('default',1)
	                                ->first();
	}

	return $shippingzone;
}

function getShippingMethods($shippingzoneId)
{
	$shippingmethods = ShippingMethod::where('shippingzoneId',$shippingzoneId)
	                                 ->where('methodenabled',1)
	                                 ->where('delete','!=',1)
	                                 ->get();
	return $shippingmethods;
}

function calShippingMethodCost($shippingmethodId)
{   
	$shippingmethod = ShippingMethod::where('_id',$shippingmethodId)->first();
	$methodmodule   = $shippingmethod->methodmodule;
	$methoddetails  = $shippingmethod->methoddetails;
	switch ($methodmodule) 
	{
		case 'shipping_peritem':
              return (float)$methoddetails->defaultcost*(int) Cart::count();
			  break;
		
		case 'shipping_byweight':

		     $ranges        = $methoddetails->ranges;
		     $shippingCost  = (float)$methoddetails->defaultcost;

		     if(count($ranges) > 0)
		     {
		     	$totalWeight = 0;
		     	foreach (Cart::content() as $key => $item) 
		     	{
	     	 		$weight = (float)$item->model->weight;
	     	 		if(!empty($weight) && !is_null($weight) )
	     	 		{
                         $totalWeight += $weight;
	     	 		}
	     	 	}
                
                if($totalWeight > 0)
                {
			     	foreach($ranges as $range)
			     	{
			     	 	$lower = (float)$range->lower;
			     	 	$upper = (float)$range->upper;
			     	 	$cost  = (float)$range->cost;

			     	 	if($totalWeight > $lower && $totalWeight <= $upper)
			     	 	{
			     	 		$shippingCost = $cost;
			     	 		break;
			     	 	}
			     	 	
			     	}
                }

		     }

             return $shippingCost;
		     break;

		case 'shipping_bytotal':

		     $ranges        = $methoddetails->ranges;
		     $shippingCost  = (float)$methoddetails->defaultcost;

		     if(count($ranges) > 0)
		     {
		     	$totalOrder = (float)Cart::subtotal();
                if($totalOrder > 0)
                {
			     	foreach($ranges as $range)
			     	{
			     	 	$lower = (float)$range->lower;
			     	 	$upper = (float)$range->upper;
			     	 	$cost  = (float)$range->cost;

			     	 	if($totalOrder > $lower && $totalOrder <= $upper)
			     	 	{
			     	 		$shippingCost = $cost;
			     	 		break;
			     	 	}
			     	 	
			     	}
                }

		     }
             return $shippingCost;
		     break;

		case 'shipping_flatrate':
		      return $methoddetails->defaultcost;
		     break;
	}


}

function getMonthName($monthNumber)
{
    return date("F", mktime(0, 0, 0, $monthNumber, 1));
}

function months($name='month',$id='month',$selectedMonth=1,$classes='form-control'){

    $months='<select name="'.$name.'" id="'.$id.'" class="'.$classes.'">';
      for($i= 1; $i<=12; $i++)
      {
      	  $selMon = ($selectedMonth == $i) ? 'selected' : '';
          $months.= '<option value="'.$i.'" '.$selMon.'>'.getMonthName($i).'</option>';
      }
    $months.="</select>";
    return $months;
}

function years($name='year',$id='year',$selectedYear=null,$classes='form-control',$limit = 20)
{ 
	$this_year = date("Y"); // Run this only once
	$yearsHtml='<select name="'.$name.'" id="'.$id.'" class="'.$classes.'">';
	for ($year = $this_year; $year <= $this_year + $limit; $year++) {
		    $selYear = ($selectedYear == $year) ? 'selected' : '';
	    $yearsHtml .= '<option value="' . $year . '" '.$selYear.'>' . $year . '</option>';
	}
	$yearsHtml.="</select>";
    return $yearsHtml;
}

function productMinPurchaseQty($product)
{
	$min_purchase_qty = $product->min_purchase_qty;
	if(empty($min_purchase_qty))
	{
		$min_purchase_qty = 1;
	} 
	return $min_purchase_qty;
}

function productMaxPurchaseQty($product)
{
	$max_purchase_qty = $product->max_purchase_qty;
	if(empty($max_purchase_qty))
	{
		$current_stock = $product->currentstock;
		if(!empty($current_stock))
		{
		   $max_purchase_qty = $current_stock;
		}
		else
		{
			$max_purchase_qty = 10000;
		}
	} 
	return $max_purchase_qty;
}




