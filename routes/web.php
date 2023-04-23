<?php

use Illuminate\Support\Facades\Route;

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});

Route::group([ 'middleware'  => ['checkUserStatus']],function(){

    //---------------
    Route::view('contact','email.newsletter.subscribe');
    //---------------
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/','HomeController@index')->name('main_page');

    Route::group([ 'namespace'  => 'Front'],function(){
       
        //---------Shop---------
        //Route::get('shop',"ShopController@shop")->name('shop');
        Route::get('categories/{categorySlug?}',"ShopController@shop")->name('shop');

        //---------Search---------
        Route::get('search-query','ShopController@search_query')->name('search-query');
        Route::get('search','ShopController@search')->name('search');

        //---------Product---------
       // Route::get('product/{productId}',"ProductController@show")->name('product.show');
        Route::get('product/{productSlug}',"ProductController@show")->name('product.show');
        Route::get('product-quick-view/{productId}',"ProductController@product_quick_view")->name('product-quick-view'); 
        Route::get('/product/{productId}/addtorecentlyviewed','ProductController@addtorecentlyviewed');
        Route::post('/product/incrementviewcount','ProductController@incrementviewcount')->name('product.incrementviewcount');

        //---------Product-Review---------
        Route::post('/product/{id}/addProductReview','ProductController@addProductReview')->name('product.addProductReview');

        //---------Blog--------- 
        Route::get('blogs',"BlogController@blogs")->name('blogs');
        Route::get('blog/{slug}',"BlogController@blog_detail")->name('blog-detail');
        Route::post('blog/{id}/comment',"BlogController@addBlogComment")->name('add-blog-comment');

        //---------Compare-Products---------
        Route::group(['as' => 'compare.' ,'prefix' => 'compare'],function()
        {
            Route::get('/','ProductController@compare_show')->name('show');
            Route::post('add','ProductController@compare_add')->name('add');
            Route::get('remove/{productId}','ProductController@compare_remove')->name('remove');
        });

        //---------Wishlist---------
        Route::group(['as' => 'wishlist.' ,'prefix' => 'wishlist'],function()
        {
            Route::get('/','WishlistController@show_wishlist')->name('show');
            Route::post('add','WishlistController@add_to_wishlist')->name('add');
            Route::get('remove/{wishlistId}','WishlistController@remove_from_wishlist')->name('remove');
        });

        //---------Cart---------
        Route::group(['as' => 'cart.' ,'prefix' => 'cart'],function()
        {
            Route::get('/', 'CartController@cart_index')->name('index');
            Route::post('/', 'CartController@cart_store')->name('store');
            Route::patch('/{cartId}', 'CartController@cart_update')->name('update');
            Route::delete('/{cartId}', 'CartController@cart_destroy')->name('destroy');  
        });

        //---------Checkout---------
        Route::group(['as' => 'checkout.' ,'prefix' => 'checkout'],function()
        {
            Route::get('/', 'CheckoutController@checkout_index')->name('index');
            Route::post('/login', 'CheckoutController@login')->name('checkout_login');
            Route::get('/checkout_register', 'CheckoutController@checkout_register')->name('checkout_register');
            Route::post('/checkout_register_save', 'CheckoutController@checkout_register_save')->name('checkout_register_save');
            Route::get('/payment_address', 'CheckoutController@payment_address')->name('payment_address');
            Route::get('/shipping_address', 'CheckoutController@shipping_address')->name('shipping_address');
            Route::post('/payment_address_save', 'CheckoutController@payment_address_save')->name('payment_address_save');
            Route::post('/shipping_address_save', 'CheckoutController@shipping_address_save')->name('shipping_address_save');
            Route::get('/shipping_method', 'CheckoutController@shipping_method')->name('shipping_method');
            Route::post('/shipping_method_save', 'CheckoutController@shipping_method_save')->name('shipping_method_save');
            Route::get('/payment_method', 'CheckoutController@payment_method')->name('payment_method');
            Route::post('/payment_method_save', 'CheckoutController@payment_method_save')->name('payment_method_save');
            Route::get('/checkout_confirm', 'CheckoutController@checkout_confirm')->name('checkout_confirm');
            Route::post('/order_placed', 'CheckoutController@order_placed')->name('order_placed');

            Route::get('/order/payment','PaymentController@index')->name('order_payment');

        });

        Route::view('/order/success', 'front.modules.main.cart-checkout.success')->name('order.success');
       
        //---------Account---------
        Route::group(['as' => 'account.' ,'prefix' => 'account'],function()
        {   
            //---------account---------
            Route::get('/','AccountController@account')->name('home');
            Route::get('/edit-account-details','AccountController@edit_account_details')->name('edit-account-details');
            Route::get('/edit-account-password','AccountController@edit_account_password')->name('edit-account-password');
            Route::post('/update-account-details','AccountController@update_account_details')->name('update-account-details');
            Route::post('/update-account-password','AccountController@update_account_password')->name('update-account-password');
            //---------account end---------

            //---------newsletter---------
            Route::any('/newsletter','AccountController@newsletter')->name('newsletter');
            //---------newsletter end---------

            //---------order---------
            Route::get('/order-history','OrderController@orderhistory')->name('order-history');
            Route::get('/order-details/{orderId}','OrderController@orderdetails')->name('order-details');
            //---------order end---------

            //---------address-resource-routes---------
            Route::resource('addressbook','AddressbookController');
            //---------address-resource-routes end---------
        });
        //---------Account End---------

        //*****coupon*****
        Route::group(['as' => 'coupon.' ,'prefix' => 'coupon'],function(){ 

            Route::post('/apply', 'CouponController@apply')->name('apply');
            Route::delete('/deleteApplyCoupon', 'CouponController@deleteApplyCoupon')->name('deleteApplyCoupon');

        });

         //*****Brand*****
        Route::group(['as' => 'brand.' ,'prefix' => 'brand'],function(){ 

            Route::get('/list','BrandController@list')->name('list');
            Route::get('/{id}/products','BrandController@products')->name('products');

        });
                 
    });

        $pages = \App\Models\Page::where('status',1)->get();
        if($pages->count() > 0){
            foreach ($pages as $key=>$page)
            {
                Route::get("$page->slug", "Front\PageController@static")->name("$page->slug");
            }
        }

        

        Route::get('/contact-form', 'Front\PageController@contact_form')->name('contact_form');
        Route::post('/contact-form-save', 'Front\PageController@contact_form_save')->name('contact_form_save');

        Route::get('/return', 'Front\PageController@return')->name('return');
        Route::post('/return-form', 'Front\PageController@return_form_save')->name('return_form_save');

        Route::get('/customer', function () {
            return view('customer');
        })->name('customer');
});

    Auth::routes(['verify' => true]);

    //---------AjaxRoutes---------
    Route::get('country-states','AjaxController@country_states')->name('country.states'); 
    //---------NEWSLETTER SUBSCRIPTION---------
    Route::post('newsletter/subscription','NewsletterController@subscription')->name('newsletter.subscription');
    
    // -------------------------Delete this temporay routes with files after completion--------------------------
             //designer-temporary purpose
// Route::view('shop_copy','front.modules.main.designer_work.shop_copy');
// Route::view('product_copy','front.modules.main.designer_work.product_copy');
// Route::view('compare_copy','front.modules.main.designer_work.compare_copy');
// Route::view('checkout_cart_copy','front.modules.main.designer_work.checkout_cart_copy');
// Route::view('wishlist_copy','front.modules.main.designer_work.wishlist_copy');
// Route::view('checkout_checkout_copy','front.modules.main.designer_work.checkout_checkout_copy');
// Route::view('account_copy','front.modules.main.designer_work.account_copy');
// Route::view('addressbook_copy','front.modules.main.designer_work.addressbook.addressbook_copy');
// Route::view('addressbook_edit','front.modules.main.designer_work.addressbook.addressbook_edit');
// Route::view('addressbook_new','front.modules.main.designer_work.addressbook.addressbook_new');
// Route::view('account_edit_copy','front.modules.main.designer_work.personal.account_edit_copy');
// Route::view('account_password_copy','front.modules.main.designer_work.personal.account_password_copy');
// Route::view('newsletter_copy','front.modules.main.designer_work.personal.newsletter_copy');
// Route::view('affiliate_copy','front.modules.main.designer_work.personal.affiliate_copy');
// Route::view('reward_copy','front.modules.main.designer_work.personal.reward_copy');
// Route::view('order_copy','front.modules.main.designer_work.personal.order_copy');
// Route::view('order_detail_copy','front.modules.main.designer_work.personal.order_detail_copy');
// Route::view('return_copy','front.modules.main.designer_work.personal.return_copy');
// Route::view('return_add_copy','front.modules.main.designer_work.personal.return_add_copy');
// Route::view('download_copy','front.modules.main.designer_work.personal.download_copy');
// Route::view('transaction_copy','front.modules.main.designer_work.personal.transaction_copy');
// Route::view('recurring_copy','front.modules.main.designer_work.personal.recurring_copy');
// Route::view('blog_list_copy','front.modules.main.designer_work.blog_list_copy');
// Route::view('search_copy','front.modules.main.designer_work.search_copy');
// Route::view('brand_copy','front.modules.main.designer_work.brand_copy');
// Route::view('brand_list_copy','front.modules.main.designer_work.brand_list_copy');

          //Backend designer work
// Route::view('admin/order-list-copy','admin.modules.order.designerwork.list');
// Route::view('admin/order-edit-copy','admin.modules.order.designerwork.edit');
// Route::view('admin/printInvoice_copy','admin.modules.order.designerwork.printInvoice');
// Route::view('admin/printPackingSlip_copy','admin.modules.order.designerwork.printPackingSlip');
Route::view('admin/order-create-copy','admin.modules.order.create_copy');    
////

// Route::get('/', function () {
//     //return view('welcome');
//     return view('front.modules.main.front');
// })->name('main_page');
// ---------------------------------------------End---------------------------------------------------


/**************************************************Backend Routes**************************************************/
Route::group(['prefix' => '/admin','middleware'=>['auth']], function(){

        Route::group(['middleware' => ['AdminAuth']], function() {

            Route::get('/', 'Backend\Admin\DashboardController@dashboard')->name('dashboard');

        /**********Module Manager Routes Start**********/
            
            //$module = \App\Models\Module::where('type', 0)->get();
            $module = \App\Models\Module::where('active',1)->get();
            if($module->count() > 0){
                foreach ($module as $key=>$modules)
                {
                    $slug_expl        = explode('-', $modules->slug); 
                    $explController   = ucfirst($slug_expl[0]).'Controller';  
                    $explFunctionName = $slug_expl[1];  
                    Route::get("$modules->slug".$modules->slugparam."", "Backend\Admin\\".$explController."@$explFunctionName")->name("$modules->slug");
                }
            }

            Route::post('/page-save', 'Backend\Admin\PageController@save')->name('page_save');
            Route::post('/page-update/{id}', 'Backend\Admin\PageController@update')->name('page_update');
            Route::post('/page-status/{id}', 'Backend\Admin\PageController@status')->name('page_status');
            
            Route::post('/blog-save','Backend\Admin\BlogController@save')->name('blog_save');
            Route::post('/blog-update','Backend\Admin\BlogController@update')->name('blog_update');
            Route::post('/blog-active/{id}', 'Backend\Admin\BlogController@active')->name('blog-active');

            Route::post('/blogcomment-active/{id}', 'Backend\Admin\BlogcommentController@active')->name('blogcomment-active');

            Route::post('/user-save', 'Backend\Admin\UserController@save')->name('user-save');
            Route::post('/user-update', 'Backend\Admin\UserController@update')->name('user-update');
            Route::post('/user-active/{id}', 'Backend\Admin\UserController@active')->name('user-active');

            Route::post('/customer-save', 'Backend\Admin\CustomerController@save')->name('customer-save');
            Route::post('/customer-update', 'Backend\Admin\CustomerController@update')->name('customer-update');
            Route::post('/customer-active/{id}', 'Backend\Admin\CustomerController@active')->name('customer-active');
            Route::post('/customer-import/', 'Backend\Admin\CustomerController@import')->name('customer-import');
            
            Route::post('/role-save', 'Backend\Admin\RoleController@save')->name('role-save');
            Route::get('/role-module/{id}', 'Backend\Admin\RoleController@rolemodule')->name('role-module');
            Route::post('/role-update', 'Backend\Admin\RoleController@update')->name('role-update');
            Route::post('/role-active/{id}', 'Backend\Admin\RoleController@active')->name('role-active');
            
            Route::post('/module-save', 'Backend\Admin\ModuleController@store')->name('module-save');
            Route::post('/module-update', 'Backend\Admin\ModuleController@update')->name('module-update');
            Route::post('/module-series', 'Backend\Admin\ModuleController@update_series')->name('module-series');
            Route::post('/module-active/{id}', 'Backend\Admin\ModuleController@active')->name('module-active');
            
            Route::post('/brand-save', 'Backend\Admin\BrandController@save')->name('brand-save');
            Route::post('/brand-update', 'Backend\Admin\BrandController@update')->name('brand-update');

            Route::post('/category-save', 'Backend\Admin\CategoryController@save')->name('category-save');
            Route::post('/category-update', 'Backend\Admin\CategoryController@update')->name('category-update');
            Route::post('/category-active/{id}', 'Backend\Admin\CategoryController@active')->name('category-active');
            Route::post('/category-series', 'Backend\Admin\CategoryController@update_series')->name('category-series');

            Route::post('/product-save', 'Backend\Admin\ProductController@save')->name('product-save');
            Route::post('/product-update', 'Backend\Admin\ProductController@update')->name('product-update');
            Route::post('/product-active/{id}', 'Backend\Admin\ProductController@active')->name('product-active');
            Route::post('/product-series', 'Backend\Admin\ProductController@update_series')->name('product-series');

            Route::get('/unauthorize', 'Backend\Admin\CommonController@unauthorize')->name('unauthorize');

        /**********Module Manager Routes End************/

        //********02-09-2021 start*********************/
        //*****Coupon
        Route::post('coupon-save','Backend\Admin\CouponController@save')->name('coupon-save');
        Route::patch('coupon-update/{id}','Backend\Admin\CouponController@update')->name('coupon-update');
        Route::post('coupon-active/{id}','Backend\Admin\CouponController@active')->name('coupon-active');

        //*****Product Review
        Route::post('product-review-active/{id}','Backend\Admin\ProductreviewController@active')->name('product-review-active');
        Route::patch('product-review/{id}','Backend\Admin\ProductreviewController@update')->name('product-review.update');

        //*****Shippingzone
        Route::post('/shippingzone-save', 'Backend\Admin\ShippingzoneController@save')->name('shippingzone-save');
        Route::patch('/shippingzone-update/{id}', 'Backend\Admin\ShippingzoneController@update')->name('shippingzone-update');
        Route::post('/shippingzone-enabled/{id}', 'Backend\Admin\ShippingzoneController@enabled')->name('shippingzone-enabled');

        //*****Shippingzone methods
        //Route::get('/shippingzone/{id}/shippingzone-list', 'Backend\Admin\ShippingmethodController@list')->name('shippingmethod-list');
        Route::get('/shippingzone/{id}/shippingzone-create', 'Backend\Admin\ShippingmethodController@create')->name('shippingmethod-create');
        Route::post('/getshippingmoduleproperties', 'Backend\Admin\ShippingmethodController@GetShippingModuleProperties')->name('shipping-module-properties');
        Route::post('/shippingzone/{shippingzoneId}/shippingmethod/save', 'Backend\Admin\ShippingmethodController@save')->name('shippingmethod-save');
        Route::get('/shippingzone/{shippingzoneId}/shippingmethod/{shippingmethodId}/edit', 'Backend\Admin\ShippingmethodController@edit')->name('shippingmethod-edit');
        Route::patch('/shippingzone/{shippingzoneId}/shippingmethod/{shippingmethodId}/update', 'Backend\Admin\ShippingmethodController@update')->name('shippingmethod-update');
        Route::get('/shippingzone/{shippingzoneId}/shippingmethod/{shippingmethodId}/delete', 'Backend\Admin\ShippingmethodController@delete')->name('shippingmethod-delete');
        Route::post('/shippingmethod-enabled/{id}', 'Backend\Admin\ShippingmethodController@enabled')->name('shippingmethod-enabled');


        //*****OrderShipment
        Route::post('/order/{id}/ordershipment-save', 'Backend\Admin\OrderShipmentController@save')->name('ordershipment-save');

        Route::group([ 'namespace'  => 'Backend\Admin','as' => 'admin.'],function(){
            
            //*****Order
            Route::group([ 'prefix' => 'order','as' => 'order.'],function(){

                Route::get('quick-view/{orderId}','OrderController@orderQuickView')->name('quick-view');
                Route::post('update-order-status','OrderController@updateOrderStatus')->name('update-order-status');
                Route::get('action','OrderController@orderAction')->name('action'); //used for print order invoide and payment slip
                //<!--orderEdit-->
                Route::get('getAddressbook/{id}','OrderController@getAddressbook')->name('getAddressbook');
                Route::post('orderUpdateItemQuantityPrice/{id}','OrderController@orderUpdateItemQuantityPrice')->name('orderUpdateItemQuantityPrice');
                Route::post('orderUpdate/{id}','OrderController@orderUpdate')->name('orderUpdate');
            
            });

             
        });
        

    //---------AjaxRoutes---------
    Route::get('search-customer','Backend\Admin\AjaxController@searchCustomer')->name('search-customer'); 
    Route::get('check-email-availability','Backend\Admin\AjaxController@checkEmailAvailability')->name('check-email-availability'); 
    Route::post('get-address-list','Backend\Admin\AjaxController@addressList')->name('get-address-list'); 
    Route::get('search-products','Backend\Admin\AjaxController@searchProducts')->name('search-products'); 
    Route::post('add-product','Backend\Admin\AjaxController@addProduct')->name('add-product'); 
    Route::post('delete-product','Backend\Admin\AjaxController@deleteProduct')->name('delete-product'); 
    Route::post('get-shipping-methods','Backend\Admin\AjaxController@shippingMethods')->name('get-shipping-methods');
    Route::post('save-order-detail','Backend\Admin\AjaxController@savOrderDetail')->name('save-order-detail');
    Route::post('placeOrder','Backend\Admin\AjaxController@placeOrder')->name('placeOrder');

    });
});

/**************************************************Backend Routes End**************************************************/

Route::view('stripe','stripe.index');

Route::get('stripe/customer','stripe\StripeController@createCustomer');
Route::get('stripe/charge','stripe\StripeController@chargeStripe');