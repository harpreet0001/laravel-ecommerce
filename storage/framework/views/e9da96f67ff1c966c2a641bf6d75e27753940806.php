<?php $__env->startSection('content'); ?>
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
         <?php echo $__env->make('admin.layouts.CardHeader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <div class="card-body">
            <div class="tab-content p-0">
               <?php echo $__env->make('msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               <form class="cstm-form" method="post" action="<?php echo e(route('product-update')); ?>" name="product-update" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="form-group">
                           <?php   
                                 $selected_categories = old('category') ?? ($ProductData->category ?? []);
                           ?>
                           <label class="form-label">Category</label>
                           <select class="form-control" name="category[]" id="category" multiple>
                              <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php if(in_array($value->_id,$selected_categories)): ?>
                                    <option value="<?php echo e($value->_id); ?>" selected><?php echo e($value->title); ?></option>
                                 <?php else: ?>
                                    <option value="<?php echo e($value->_id); ?>" ><?php echo e($value->title); ?></option>
                                 <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Brand</label>
                           <select class="form-control" name="brand">
                              <option value="">Choose Brand</option>
                              <?php $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($value->_id); ?>" <?php echo e(!empty($ProductData) && $ProductData->brand == $value->_id ? 'selected' : ''); ?>><?php echo e($value->title); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Product Type</label>
                           <?php 
                              $type_arr = array(0=>'Physical Product', 1=>'Downloadable Product');
                           ?>
                           <select class="form-control" name="type" id="product_type">
                              <?php $__currentLoopData = $type_arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($key); ?>" <?php echo e(!empty($ProductData) && $ProductData->type == $key ? 'selected' : ''); ?>><?php echo e($value); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Name<span class="required">*</span></label>
                           <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Title" name="title" value="<?php echo e($ProductData->title); ?>" autofocus>
                           <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                              <span class="invalid-feedback" role="alert">
                                 <strong><?php echo e($message); ?></strong>
                              </span>
                           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                     </div>
                      <div class="col-lg-6" style="display:none;" id="product-download">
                        <div class="form-group">
                           <label class="form-label">Attach File</label>
                           <input type="file" class="form-control <?php $__errorArgs = ['downloadfile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="FILE" name="downloadfile" value="<?php echo e(old('downloadfile')); ?>" autofocus>
                           <?php $__errorArgs = ['downloadfile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                              <span class="invalid-feedback" role="alert">
                                 <strong><?php echo e($message); ?></strong>
                              </span>
                           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">SKU</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['sku'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="SKU" name="sku" value="<?php echo e($ProductData->sku); ?>" autofocus>
                           <?php $__errorArgs = ['sku'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                              <span class="invalid-feedback" role="alert">
                                 <strong><?php echo e($message); ?></strong>
                              </span>
                           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Image</label>
                           <input type="file" class="file" name="img" accept="image/*" autocomplete="img" autofocus>
                           <div class="upload-file-wrap">
                              <input type="text" class="form-control <?php $__errorArgs = ['img'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" disabled placeholder="Upload File" id="file">
                              <button type="button" class="browse btn btn-primary">Browse...</button>
                           </div>
                           <?php $__errorArgs = ['img'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                              <span class="invalid-feedback" style="display: block;" role="alert">
                                 <strong><?php echo e($message); ?></strong>
                              </span>
                           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group mb-0">
                           <img src="<?php echo e($ProductData->image); ?>" id="preview" class="img-thumbnail" style="width: 20%;">
                        </div>
                     </div>
                     <?php if($ProductData->type == 1): ?>
                        <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-label">Attach File<span class="required">*</span></label>
                              <p><i class="fas fa-file-pdf"></i><?php echo e($ProductData->downloadfileName); ?></p>
                           </div>
                        </div>
                     <?php endif; ?>
                     <div class="col-lg-12">
                        <div class="form-group">
                           <label class="form-label">Description<span class="required">*</span></label>
                           <textarea class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Description" id="product-ckeditor" name="description"><?php echo e($ProductData->description); ?> </textarea>
                           <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                              <span class="invalid-feedback" role="alert">
                                 <strong><?php echo e($message); ?></strong>
                              </span>
                           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                     </div>
                  </div>
                  <div class="card card-inn">
                     <div class="card-header d-f j-c-s-b">
                        <h3 class="card-title">Pricing & Pre-Order Options</h3>
                     </div>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-label">Availability</label>
                                 <?php 
                                    $availability_arr = array(1=>'can be purchased in my online store', 2=>'coming soon but I want to take pre-orders', 3=>'cannot be purchased in my online store');
                                 ?>
                                 <select class="form-control" id="avialsection" name="availability">
                                    <?php $__currentLoopData = $availability_arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>" <?php echo e(!empty($ProductData) && $ProductData->availability == $key ? 'selected' : ''); ?>><?php echo e($value); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <div id="availability_2" class="avialsectionCLS" style="<?php echo e(!empty($ProductData) && $ProductData->availability == 2 ? '' : 'display: none;'); ?>">
                                    <div class="row">
                                       <div class="col-lg-4">
                                          <label class="form-label">Message:</label>
                                          <?php
                                             if(!empty($ProductData->csreleasedate)){
                                                $csmessage_value = $ProductData->csmessage;
                                             }else{
                                                $csmessage_value = 'Expected release date is %%DATE%%';
                                             }
                                          ?>
                                          <input type="text" class="form-control" value="<?php echo e($csmessage_value); ?>" name="csmessage">
                                       </div>
                                       <div class="col-lg-4">
                                          <label class="form-label">Release Date:</label>
                                          <input type="date" class="form-control" value="<?php echo e($ProductData->csreleasedate); ?>" name="csreleasedate">
                                       </div>
                                       <div class="col-lg-4">
                                          <label class="form-label">Release Date:</label>
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" name="csremovestatus" id="customCheck1" <?php echo e(!empty($ProductData) && $ProductData->csremovestatus == 1 ? 'checked' : ''); ?>>
                                             <label class="custom-control-label" for="customCheck1">Remove pre-order status on this date</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div id="availability_3" class="avialsectionCLS" style="<?php echo e(!empty($ProductData) && $ProductData->availability == 3 ? '' : 'display: none;'); ?>">
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" class="custom-control-input" name="callmessage" id="customCheck2" <?php echo e(!empty($ProductData) && $ProductData->callmessage == 1 ? 'checked' : ''); ?>>
                                       <label class="custom-control-label" for="customCheck2">Show "Call for pricing" message instead of the price</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Price<span class="required">*</span></label>
                                 $ <input type="text" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Price" name="price" value="<?php echo e($ProductData->price); ?>" autofocus> 
                                 <h6><small>(Excluding Tax)</small></h6>
                                 <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                       <strong><?php echo e($message); ?></strong>
                                    </span>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Cost Price</label>
                                 $ <input type="text" class="form-control <?php $__errorArgs = ['costprice'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Cost Price" name="costprice" value="<?php echo e($ProductData->costprice); ?>" autofocus>
                                 <?php $__errorArgs = ['costprice'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                       <strong><?php echo e($message); ?></strong>
                                    </span>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Retail Price</label>
                                 $ <input type="text" class="form-control <?php $__errorArgs = ['retailprice'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Retail Price" name="retailprice" value="<?php echo e($ProductData->retailprice); ?>" autofocus>
                                 <?php $__errorArgs = ['retailprice'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                       <strong><?php echo e($message); ?></strong>
                                    </span>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Sale Price</label>
                                 $ <input type="text" class="form-control <?php $__errorArgs = ['saleprice'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Sale Price" name="saleprice" value="<?php echo e($ProductData->saleprice); ?>" autofocus>
                                 <?php $__errorArgs = ['saleprice'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                       <strong><?php echo e($message); ?></strong>
                                    </span>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card card-inn">
                     <div class="card-header d-f j-c-s-b">
                        <h3 class="card-title">Shipping Details</h3>
                     </div>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Product Weight<span class="required">*</span></label>
                                 <input type="text" class="form-control <?php $__errorArgs = ['weight'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Weight" name="weight" value="<?php echo e($ProductData->weight); ?>" autofocus> Grams
                                 <?php $__errorArgs = ['weight'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                       <strong><?php echo e($message); ?></strong>
                                    </span>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Product Width</label>
                                 <input type="text" class="form-control <?php $__errorArgs = ['width'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Width" name="width" value="<?php echo e($ProductData->width); ?>" autofocus> Centimeters
                                 <?php $__errorArgs = ['width'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                       <strong><?php echo e($message); ?></strong>
                                    </span>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Product Height</label>
                                 <input type="text" class="form-control <?php $__errorArgs = ['height'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Height" name="height" value="<?php echo e($ProductData->height); ?>" autofocus> Centimeters
                                 <?php $__errorArgs = ['height'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                       <strong><?php echo e($message); ?></strong>
                                    </span>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Product Depth</label>
                                 <input type="text" class="form-control <?php $__errorArgs = ['depth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Depth" name="depth" value="<?php echo e($ProductData->depth); ?>" autofocus> Centimeters
                                 <?php $__errorArgs = ['depth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                       <strong><?php echo e($message); ?></strong>
                                    </span>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Fixed Shipping Cost</label>
                                 $ <input type="text" class="form-control <?php $__errorArgs = ['fixshipping'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Fix Shipping Cost" name="fixshipping" value="<?php echo e($ProductData->fixshipping); ?>" autofocus>
                                 <?php $__errorArgs = ['fixshipping'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                       <strong><?php echo e($message); ?></strong>
                                    </span>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Free Shipping</label>
                                 <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="freeshipping" id="shippingCheck" <?php echo e(!empty($ProductData) && $ProductData->freeshipping == 1 ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="shippingCheck">Yes, this product has free shipping</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card card-inn">
                     <div class="card-header d-f j-c-s-b">
                        <h3 class="card-title">Inventory</h3>
                     </div>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Current Stock Level</label>
                                 <input type="text" class="form-control" name="currentstock" value="<?php echo e(!empty($ProductData) && !empty($ProductData->currentstock) ? $ProductData->currentstock : 0); ?>">
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Low Stock Level</label>
                                 <input type="text" class="form-control" name="lowstock" value="<?php echo e(!empty($ProductData) && !empty($ProductData->lowstock) ? $ProductData->lowstock : 0); ?>">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card card-inn">
                     <div class="card-header d-f j-c-s-b">
                        <h3 class="card-title">Other Details</h3>
                     </div>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Product Condition<span class="required">*</span></label>
                                 <?php 
                                      $condition_arr = array('new'=>'New', 'used'=>'Used', 'refurbished'=>'Refurbished');
                                 ?>
                                 <select class="form-control" name="condition">
                                    <?php $__currentLoopData = $condition_arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>" <?php echo e(!empty($ProductData) && $ProductData->condition == $key ? 'selected' : ''); ?>><?php echo e($value); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                                 <input type="checkbox" name="showcondition" <?php echo e(!empty($ProductData) && $ProductData->showcondition == 1 ? 'checked' : ''); ?>> Show the condition on the product page
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Product Warranty</label>
                                 <input type="text" class="form-control <?php $__errorArgs = ['warranty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Product Warranty" name="warranty" value="<?php echo e($ProductData->warranty); ?>" autofocus>
                                 <?php $__errorArgs = ['warranty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                       <strong><?php echo e($message); ?></strong>
                                    </span>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Search Keywords</label>
                                 <input type="text" class="form-control <?php $__errorArgs = ['searchkeyword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Search Keywords" name="searchkeyword" value="<?php echo e($ProductData->searchkeyword); ?>" autofocus>
                                 <?php $__errorArgs = ['searchkeyword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                       <strong><?php echo e($message); ?></strong>
                                    </span>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Product Tags</label>
                                 <input type="text" class="form-control <?php $__errorArgs = ['producttag'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Product Tags" name="producttag" value="<?php echo e($ProductData->producttag); ?>" autofocus>
                                 <?php $__errorArgs = ['producttag'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                       <strong><?php echo e($message); ?></strong>
                                    </span>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Visible</label>
                                 <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="active" id="VisibleCheck" <?php echo e(!empty($ProductData) && $ProductData->active == 1 ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="VisibleCheck">Yes, this product should be visible on my web site</label>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Featured Product</label>
                                 <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="featured" id="featuredCheck" <?php echo e(!empty($ProductData) && $ProductData->featured == 1 ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="featuredCheck">Yes, this is a featured product</label>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Minimum Purchase Quantity</label>
                                 <input type="text" class="form-control <?php $__errorArgs = ['min_purchase_qty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Minimum Purchase Quantity" name="min_purchase_qty" value="<?php echo e($ProductData->min_purchase_qty); ?>" autofocus>
                                 <?php $__errorArgs = ['min_purchase_qty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                       <strong><?php echo e($message); ?></strong>
                                    </span>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Maximum Purchase Quantity</label>
                                 <input type="text" class="form-control <?php $__errorArgs = ['max_purchase_qty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Maximum Purchase Quantity" name="max_purchase_qty" value="<?php echo e($ProductData->max_purchase_qty); ?>" autofocus>
                                 <?php $__errorArgs = ['max_purchase_qty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                       <strong><?php echo e($message); ?></strong>
                                    </span>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card card-inn">
                     <div class="card-header d-f j-c-s-b">
                        <h3 class="card-title">Search Engine Optimization</h3>
                     </div>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Page Title</label>
                                 <input type="text" class="form-control <?php $__errorArgs = ['pagetitle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Page Title" name="pagetitle" value="<?php echo e($ProductData->pagetitle); ?>" autofocus>
                                 <?php $__errorArgs = ['pagetitle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                       <strong><?php echo e($message); ?></strong>
                                    </span>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Meta Keywords</label>
                                 <input type="text" class="form-control <?php $__errorArgs = ['metakeywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Meta Keywords" name="metakeywords" value="<?php echo e($ProductData->metakeywords); ?>" autofocus>
                                 <?php $__errorArgs = ['metakeywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                       <strong><?php echo e($message); ?></strong>
                                    </span>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Meta Description</label>
                                 <input type="text" class="form-control <?php $__errorArgs = ['metadescription'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Meta Description" name="metadescription" value="<?php echo e($ProductData->metadescription); ?>" autofocus>
                                 <?php $__errorArgs = ['metadescription'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                       <strong><?php echo e($message); ?></strong>
                                    </span>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="btn-wrap mt-3">
                           <input type="hidden" name="IdHidden" value="<?php echo e(base64_encode($ProductData->_id)); ?>">
                           <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="<?php echo e(asset('ckeditor/ckeditor.js')); ?>"></script>
<script>CKEDITOR.replace('product-ckeditor');</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript">

   $(document).ready(function()
   {
      $('select[id="category"]').select2();
   });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/megatanws/public_html/web/resources/views/admin/modules/product/edit.blade.php ENDPATH**/ ?>