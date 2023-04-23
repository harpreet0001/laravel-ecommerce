<?php $__env->startSection('content'); ?>
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
        <?php echo $__env->make('admin.layouts.CardHeader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <div class="card-header user-card-header">
            <p>A user is someone who has access to the administration area of your store. Each user account also has its own customizable access permissions, which you can setup below.</p>
         </div>
         <div class="card-body">
            <?php echo $__env->make('msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <form method="POST" action="<?php echo e(route('user-save')); ?>" name="register" class="register-form form-horizontal">
               <?php echo csrf_field(); ?>
               <div class="row">
                  <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-label">First Name<span class="required">*</span></label>
                        <input type="text" class="form-control <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="First Name" name="firstname" value="<?php echo e(old('firstname')); ?>" autofocus>
                        <?php $__errorArgs = ['firstname'];
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
                           <label class="form-label">Last Name<span class="required">*</span></label>
                           <input type="text" class="form-control <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Last Name" name="lastname" value="<?php echo e(old('lastname')); ?>" autofocus>
                           <?php $__errorArgs = ['lastname'];
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
                           <label class="form-label">E-Mail<span class="required">*</span></label>
                           <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="E-Mail" name="email" value="<?php echo e(old('email')); ?>" autofocus>
                           <?php $__errorArgs = ['email'];
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
                           <label class="form-label">Telephone<span class="required">*</span></label>
                           <input type="text" class="form-control <?php $__errorArgs = ['contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Telephone" name="contact" value="<?php echo e(old('contact')); ?>" autofocus>
                           <?php $__errorArgs = ['contact'];
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
                           <label class="form-label">Password<span class="required">*</span></label>
                           <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Password" name="password" value="<?php echo e(old('password')); ?>" autofocus autocomplete="new-password">
                           <?php $__errorArgs = ['password'];
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
               <div class="card mt-4">
                  <div class="card-header d-f j-c-s-b" style="cursor: move;">
                     <div class="left-block">
                        <h3 class="card-title">Permissions</h3>
                        <p>Permissions allow you to restrict which areas of the administration area this user can access.</p>
                     </div>
                     <div class="btn-wrap">
                        <a href="<?php echo e(route('role-list')); ?>" class="btn btn-primary">Role Setting</a>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label class="form-label">Assign Role<span class="required">*</span></label>
                              <select id="assignrole" type="text" class="form-control <?php $__errorArgs = ['assignrole'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="assignrole" value="<?php echo e(old('assignrole')); ?>"  autocomplete="assignrole" autofocus>
                                 <option value="">Select</option>
                                 <?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rolekey => $rolevalue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($rolevalue->_id); ?>" <?php echo e(old("assignrole") == $rolevalue->_id ? 'selected' : ''); ?>><?php echo e($rolevalue->role); ?></option>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                              <?php $__errorArgs = ['assignrole'];
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
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label class="form-label">Module<span class="required">*</span></label>
                              <ul class="checkbox-grp-list ULmodule">
                                 <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                       <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="modulecheckbox custom-control-input <?php $__errorArgs = ['userpermissions'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="customCheck_<?php echo e($value->_id); ?>" <?php echo e((!empty(old("assignrole"))) || (!empty(old("userpermissions")) && sizeof(old("userpermissions"))>0) ? '' : 'disabled="disabled"'); ?> name="userpermissions[]" value="<?php echo e($value->_id); ?>" <?php echo e(!empty(old("userpermissions")) && in_array($value->_id, old("userpermissions")) ? 'checked' : ''); ?> >
                                          <label class="custom-control-label" for="customCheck_<?php echo e($value->_id); ?>"><?php echo e($value->title); ?></label>
                                       </div>
                                    </li>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </ul>
                              <?php $__errorArgs = ['userpermissions'];
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
                        <div class="col-lg-12">
                           <div class="btn-wrap mt-3">
                              <button type="submit" class="btn btn-primary">Save</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/megatanws/public_html/web/resources/views/admin/modules/users/create.blade.php ENDPATH**/ ?>