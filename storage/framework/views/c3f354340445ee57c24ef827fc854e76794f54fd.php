<?php $__env->startSection('content'); ?>
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
         <?php echo $__env->make('admin.layouts.CardHeader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <div class="card-body">
            <div class="tab-content p-0">
               <?php echo $__env->make('msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               <form class="cstm-form" method="post" action="<?php echo e(route('blog_save')); ?>" name="blog-create" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Title<span class="required">*</span></label>
                           <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Title" name="title" value="<?php echo e(old('title')); ?>"  autocomplete="title" autofocus>
                        </div>
                        <?php $__errorArgs = ['title'];
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
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Featured Image<span class="required">*</span></label>
                           <!-- <input type="file" class="form-control" placeholder="Title" name="title"> -->
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
                        <div class="ml-2 col-sm-6">
                           <img src="" id="preview" class="img-thumbnail">
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="form-group">
                           <label class="form-label">Content<span class="required">*</span></label>
                           <textarea class="form-control <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Content" id="article-ckeditor" name="content" autocomplete="title" autofocus></textarea>
                        </div>
                        <?php $__errorArgs = ['content'];
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
                     <div class="col-lg-12">
                        <div class="card card-inn">
                           <div class="card-header d-f j-c-s-b">
                              <h3 class="card-title">Search Engine Optimization</h3>
                           </div>
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="form-label">Page Title</label>
                                      <input type="text" class="form-control " placeholder="Page Title" name="pagetitle" value="<?php echo e(old('pagetitle') ?? ''); ?>" autofocus="">
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="form-label">Meta Keywords</label>
                                      <input type="text" class="form-control " placeholder="Meta Keywords" name="metakeywords" value="<?php echo e(old('metakeywords') ?? ''); ?>" autofocus="">
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="form-label">Meta Description</label>
                                      <input type="text" class="form-control " placeholder="Meta Description" name="metadescription" value="<?php echo e(old('metadescription') ?? ''); ?>" autofocus="">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="col-lg-12">
                        <div class="btn-wrap mt-3">
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
<script src="<?php echo e(asset('ckeditor/ckeditor.js')); ?>"></script>
<script>CKEDITOR.replace('article-ckeditor');</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/megatanws/public_html/web/resources/views/admin/modules/blog/create.blade.php ENDPATH**/ ?>