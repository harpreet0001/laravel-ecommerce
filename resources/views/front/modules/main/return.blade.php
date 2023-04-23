@extends('front.layouts.layout')

@section('content')
<section class="breadcrumb-sec">
        <div class="common-container">
            <div class="breadcrumb_content">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ URL::to('/') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Account</a></li>	
                    <li class="breadcrumb-item"><a href="{{Request::url()}}">Product Returns</a></li>
                  </ol>
                </nav>
            </div>
        </div>
    </section>


	<div class="common-container">
		<h1 class="title page-title"><span>Product Returns</span></h1>
		<div class="row">
			<div class="col-lg-8">
				<p class="mb-4">Please complete the form below to request an RMA number.</p>
			@if(Session::has('message'))	
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong></strong>{{ Session::get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            @endif
			<h2 class="title title-inn">Order Information</h2>
			
         
			<form class="contact-form" name="return_form" method="POST" action="{{route('return_form_save')}}">
				@csrf
				<div class="row">
                  <div class="col-lg-12">
					<div class="form-group required ">
                        <label class="col-sm-2 control-label" >First Name</label>
                        <div class="col-sm-10">
                            <div class="form-control-wrap">
								<input type="text" name="first_name" class="form-control" placeholder="First Name">
							</div>
						</div>
					</div>
				</div>
                <div class="col-lg-12">
					<div class="form-group required ">
                        <label class="col-sm-2 control-label" >Last Name</label>
                        <div class="col-sm-10">
                            <div class="form-control-wrap">
								<input type="text" name="last_name" class="form-control" placeholder="Last Name">
							</div>
						</div>
					</div>
                   </div>
                   <div class="col-lg-12">
					<div class="form-group required ">
                        <label class="col-sm-2 control-label" >E-Mail</label>
                        <div class="col-sm-10">
                            <div class="form-control-wrap">		
								<input type="text" name="email" class="form-control" placeholder="E-Mail">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="form-group required ">
                        <label class="col-sm-2 control-label" >Telephone</label>
                        <div class="col-sm-10">
                            <div class="form-control-wrap">		
							<input type="text" name="telephone" class="form-control" placeholder="Telephone">
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12">

						<div class="form-group required ">
                        <label class="col-sm-2 control-label" >Order Id</label>
                        <div class="col-sm-10">
                            <div class="form-control-wrap">	
							<input type="text" name="order_id" class="form-control" placeholder="Order Id">
						</div>
					</div>
				</div>
			</div>
              <div class="col-lg-12">
					<div class="form-group required ">
                        <label class="col-sm-2 control-label" >Order Date</label>
                        <div class="col-sm-10">
                            <div class="form-control-wrap">	
							<input type="date" name="order_date" class="form-control" placeholder="Order Date">
						</div>
					</div>
				</div>
			   </div>
			   <div class="col-lg-12">
					<h2 class="title title-inn">Product Information</h2>
					
					<div class="form-group required ">
                        <label class="col-sm-2 control-label" >Product Name</label>
                        <div class="col-sm-10">
                            <div class="form-control-wrap">	
							<input type="text" name="product_name" class="form-control" placeholder="Product Name">
						</div>
					</div>
				</div>
			</div>
					
					<div class="col-lg-12">
					<div class="form-group required ">
                        <label class="col-sm-2 control-label" >Product Code</label>
                        <div class="col-sm-10">
                            <div class="form-control-wrap">	
							<input type="text" name="product_code" class="form-control" placeholder="Product Code">
						</div>
					</div>
				</div>
			  </div>
			  <div class="col-lg-12">					
					<div class="form-group  ">
                        <label class="col-sm-2 control-label" >Quantity</label>
                        <div class="col-sm-10">
                            <div class="form-control-wrap">	
							<input type="text" name="quantity" class="form-control" placeholder="Quantity">
						</div>
					</div>
				</div>
			 </div>
			  <div class="col-lg-12">					
					<div class="form-group required">
                        <label class="col-sm-2 control-label" >Reason for Return</label>
                        <div class="col-sm-10">
                            <div class="form-control-wrap">	
							       <div class="custom-control custom-radio mb-1">
							        <input type="radio" id="customRadio1" name="reason" class="custom-control-input" value="Dead On Arrival">
							        <label class="custom-control-label" for="customRadio1">Dead On Arrival</label>
							      </div>
							      <div class="custom-control custom-radio mb-1">
							        <input type="radio" id="customRadio2" name="reason" class="custom-control-input" value="Faulty, please supply details">
							        <label class="custom-control-label" for="customRadio2">Faulty, please supply details</label>
							      </div>
							      <div class="custom-control custom-radio mb-1">
							        <input type="radio" id="customRadio3" name="reason" class="custom-control-input" value="Order Error">
							        <label class="custom-control-label" for="customRadio3">Order Error</label>
							      </div>
							      <div class="custom-control custom-radio mb-1">
							        <input type="radio" id="customRadio4" name="reason" class="custom-control-input" value="Other, please supply details">
							        <label class="custom-control-label" for="customRadio4">Other, please supply details</label>
							      </div>
							      <div class="custom-control custom-radio mb-1">
							        <input type="radio" id="customRadio5" name="reason" class="custom-control-input" value="Received Wrong Item">
							        <label class="custom-control-label" for="customRadio5">Received Wrong Item</label>
							      </div>
						</div>
					</div>
				</div>
			 </div>
			<div class="col-lg-12">	
				<div class="form-group required">
					<label class="col-sm-2 control-label">Product is opened</label>
					<div class="col-sm-10">
						<label class="radio-inline"> <input type="radio" name="opened" value="Yes">Yes</label>
					<label class="radio-inline"> <input type="radio" name="opened" value="No" >No</label>
					</div>
				</div>
			</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label class="col-sm-2 control-label">Faulty or other details</label>
							<div class="col-sm-10">
							<div class="form-control-wrap">	
							<textarea class="form-control" placeholder="Faulty or other details" name="detail"></textarea>
						  </div>
						</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="row mb-5">
							<div class="col-lg-6">
						<div class="btn-wrap text-center">
							<a href="javascript:void();" class="btn main-btn w-100">Back</a>
						</div>
					</div>
							<div class="col-lg-6">
						<div class="btn-wrap text-center">
							<button type="submit" class="btn main-btn w-100">Continue</button>
						</div>
					</div>
						
					</div>
					</div>
				</div>
			</form>
		<!-- </div> -->
	</div>
<div class="col-lg-3 offset-lg-1">
	@include('front.includes.sidebar_account')
</div>
</div>
	</div>



@endsection