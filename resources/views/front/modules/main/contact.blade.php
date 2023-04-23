@extends('front.layouts.layout',['pageslug' => 'contact-us' ,'pageTitle' => 'Contact Us | Megatan' ])

@section('meta-data')
 <meta name="description" content="Contact us for any queries related to Melanotan 2 injections and nasal sprays and how to use them. Fill the form on our website for quick response. ">
 <meta name="keywords" content="" />
@endsection


@section('content')
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{Request::url()}}}">Contact-Us</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>Contact Us</span></h1>
@endcomponent
<!-- page-title  end-->
<section class="aside-sec">
    <div class="container">
        <div class="aside-_content">
            <div class="row">
                <aside class="side-column">
                    <!-- mobile sec -->
                    <div class="mobile-wrapper-header">
                        <span>Filters</span>
                        <a class="x"><i class="fas fa-times"></i></a>
                    </div>
                    <!-- mobile sec end -->
                   
                    <div class="aside_links">
                        <h3 class="module-title">Categories</h3>
                        <!--sidebar category component-->
                        <x-category /> 
                    </div>
                </aside>
                <div class="right-content">
                	@include('message.error')
                   @include('message.success')
                    <div class="top-heading">
                        <h2>Leave Us a Message</h2>
                    </div>
                    <div class="main-products"> 
                       <!--  -->
							<div class="module-body">
								<form action="{{route('contact_form_save')}}" method="post" enctype="multipart/form-data" class="form-horizontal" name="contact_form">
									@csrf
									<fieldset>
										<div class="form-group custom-field required">
											<label class="col-sm-2 control-label" >Your Name</label>
											<div class="col-sm-10">
												<input type="text" name="name" value="" placeholder="Your Name"  class="form-control">
											</div>
										</div>
										<div class="form-group custom-field required">
											<label class="col-sm-2 control-label" >Your Email</label>
											<div class="col-sm-10">
												<input type="email" name="email" value="" placeholder="Your Email"  class="form-control">
											</div>
										</div>
										<div class="form-group custom-field ">
											<label class="col-sm-2 control-label" >Topic</label>
											<div class="col-sm-10">
												<select name="topic"  class="form-control">
													<option value=""> --- Please Select --- </option>
													<option value="Capture the information you need">Capture the information you need</option>
													<option value="Add or remove any fields">Add or remove any fields</option>
													<option value="Your own custom criteria">Your own custom criteria</option>
													<option value="Make any field required or not">Make any field required or not</option>
												</select>
											</div>
										</div>
										<div class="form-group custom-field required">
											<label class="col-sm-2 control-label" >Message</label>
											<div class="col-sm-10">
												<textarea name="message" rows="5" placeholder="Message"  class="form-control"></textarea>
											</div>
										</div>
									</fieldset>
									<div class="buttons">
										<div class="pull-right">
											<button type="submit" class="btn btn-primary" data-loading-text="<span>Submit</span>"><span>Submit</span></button>
										</div>
									</div>
								</form>
							</div>
						</div>
                       <!--  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<a class="mobile-filter-trigger btn">Filter Products</a>
@endsection