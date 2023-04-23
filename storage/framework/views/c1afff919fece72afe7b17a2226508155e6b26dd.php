<?php $__env->startSection('meta-data'); ?>
 <meta name="description" content="Contact us for any queries related to Melanotan 2 injections and nasal sprays and how to use them. Fill the form on our website for quick response. ">
 <meta name="keywords" content="" />
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<!-- breadcrumb -->
<?php $__env->startComponent('front.includes.breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="<?php echo e(Request::url()); ?>}">Contact-Us</a></li>
<?php if (isset($__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941)): ?>
<?php $component = $__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941; ?>
<?php unset($__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<!-- breadcrumb end-->
<!-- page-title -->
<?php $__env->startComponent('front.includes.page_title'); ?>
<h1 class="title page-title"><span>Contact Us</span></h1>
<?php if (isset($__componentOriginal17f7f66bd76df7bfec2291f526049d667ec3084a)): ?>
<?php $component = $__componentOriginal17f7f66bd76df7bfec2291f526049d667ec3084a; ?>
<?php unset($__componentOriginal17f7f66bd76df7bfec2291f526049d667ec3084a); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
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
                         <?php if (isset($component)) { $__componentOriginal7dcb15db1c0ecaf75c67d2975e2425805c9dc802 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Category::class, []); ?>
<?php $component->withName('category'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal7dcb15db1c0ecaf75c67d2975e2425805c9dc802)): ?>
<?php $component = $__componentOriginal7dcb15db1c0ecaf75c67d2975e2425805c9dc802; ?>
<?php unset($__componentOriginal7dcb15db1c0ecaf75c67d2975e2425805c9dc802); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>  
                    </div>
                </aside>
                <div class="right-content">
                	<?php echo $__env->make('message.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                   <?php echo $__env->make('message.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="top-heading">
                        <h2>Leave Us a Message</h2>
                    </div>
                    <div class="main-products"> 
                       <!--  -->
							<div class="module-body">
								<form action="<?php echo e(route('contact_form_save')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal" name="contact_form">
									<?php echo csrf_field(); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.layout',['pageslug' => 'contact-us' ,'pageTitle' => 'Contact Us | Megatan' ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/megatanws/public_html/web/resources/views/front/modules/main/contact.blade.php ENDPATH**/ ?>