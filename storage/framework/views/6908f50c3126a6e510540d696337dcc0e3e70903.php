<?php $__env->startSection('content'); ?>
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
         <?php echo $__env->make('admin.layouts.CardHeader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <div class="card-body">
            <div class="tab-content p-0">
               <?php echo $__env->make('msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               <form class="cstm-form" method="post" action="<?php echo e(route('page_update',$page->_id)); ?>" name="page_update">
                  <?php echo csrf_field(); ?>
                  <div class="form-group">
                     <label class="form-label">Title</label>
                     <input type="text" class="form-control" placeholder="Title" name="title" value="<?php echo e($page->title); ?>">
                  </div>
                  <div class="form-group">
                     <label class="form-label">Content</label>
                     <textarea class="form-control" placeholder="Content" id="article-ckeditor" name="content"><?php echo e($page->content); ?></textarea>
                  </div>
                  <div class="form-group">
                     <label class="form-label">Status</label>
                     <label class="switch ">
                     <input type="checkbox" class="target_switch" value="1" name="status" <?php echo e($page->status==1 ? 'checked' : ''); ?>>
                     <span class="slider round"></span>
                     </label>
                  </div>
                                       <div class="col-lg-12">
                        <div class="form-group">
                           <label class="form-label">Search Engine Optimization:</label>
                        </div>
                     </div>
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
unset($__errorArgs, $__bag); ?>" placeholder="Page Title" name="pagetitle" value="<?php echo e(old('pagetitle') ?? $page->pagetitle); ?>" autofocus>
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
unset($__errorArgs, $__bag); ?>" placeholder="Meta Keywords" name="metakeywords" value="<?php echo e(old('metakeywords') ?? $page->metakeywords); ?>" autofocus>
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
unset($__errorArgs, $__bag); ?>" placeholder="Meta Description" name="metadescription" value="<?php echo e(old('metadescription') ?? $page->metadescription); ?>" autofocus>
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
                  <div class="btn-wrap">
                     <button type="submit" class="btn btn-primary">Save</button>
                  </div>
               </form>
            </div>
         </div>
         <!-- /.card-body -->
      </div>
   </div>
</div>
<script src="<?php echo e(asset('ckeditor/ckeditor.js')); ?>"></script>
<script>CKEDITOR.replace('article-ckeditor');</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/megatanws/public_html/web/resources/views/admin/modules/pages/edit.blade.php ENDPATH**/ ?>