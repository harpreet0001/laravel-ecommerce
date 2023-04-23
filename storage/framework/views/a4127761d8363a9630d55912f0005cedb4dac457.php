<?php $__env->startSection('content'); ?>
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
         <?php echo $__env->make('admin.layouts.CardHeader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <div class="card-body">
            <div class="tab-content p-0">
               <?php echo $__env->make('msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               <form method="POST" action="<?php echo e(route('role-update')); ?>" name="register" class="register-form form-horizontal">
                  <?php echo csrf_field(); ?>
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Role<span class="required">*</span></label>
                           <input id="role" type="text" class="form-control <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="role" value="<?php echo e($role->role); ?>"  autocomplete="role" autofocus>
                           <?php $__errorArgs = ['role'];
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
                        </div>
                     </div>
                     <div class="card-body">
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label class="form-label" style="cursor: pointer;"><input class="" type="checkbox" id="allchecked">&nbsp; Select all module</label>
                              <ul class="checkbox-grp-list">
                                <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                       <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input moduleclass <?php $__errorArgs = ['permissions'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="customCheck_<?php echo e($value->_id); ?>" value="<?php echo e($value->_id); ?>" name="permissions[]" <?php echo e(!empty(json_decode($role->permissions)) && in_array($value->_id, json_decode($role->permissions)) ? 'checked' : ''); ?> >
                                          <label class="custom-control-label" for="customCheck_<?php echo e($value->_id); ?>"><?php echo e($value->title); ?></label>
                                       </div>
                                    </li>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </ul>
                              <?php $__errorArgs = ['permissions'];
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
                              <input type="hidden" name="IdHidden" value="<?php echo e(base64_encode($role->_id)); ?>">
                              <button type="submit" class="btn btn-primary">Save</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/megatanws/public_html/web/resources/views/admin/modules/role/edit.blade.php ENDPATH**/ ?>