<?php $__env->startSection('content'); ?>
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
         <?php echo $__env->make('admin.layouts.CardHeader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <div class="card-body">
            <div class="tab-content p-0">
               <?php echo $__env->make('msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               <div class="table-responsive">
                  <?php if($Category->count() > 0): ?>
                     <div class="cf nestable-lists">
                        <div class="dd" id="nestable">
                           <ol class="dd-list">
                              <?php $__currentLoopData = $Category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                              
                                 <li class="dd-item" data-id="<?php echo e($value->_id); ?>">
                                       <ul class="action_btns_wrap a-i-c">
                                          <!-- 1 is using for checking the "usetype" field with database -->
                                          <?php
                                             echo IsLoopPermitted(1, $value->_id);
                                          ?>
                                          <label class="switch mini-switch ">
                                             <input type="checkbox" class="target_switch" data-attr="<?php echo e(Route('category-active',$value->_id)); ?>" <?php echo e($value->active==1 ? 'checked' : ''); ?>>
                                             <span class="slider round"></span>
                                          </label>
                                       </ul>
                                       <div class="dd-handle">
                                          <?php echo e(ucwords($value->title)); ?>

                                       </div>
                                 </li>                              
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </ol>
                        </div>
                     </div>
                     <input type="hidden" id="nestable-output">
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/megatanws/public_html/web/resources/views/admin/modules/category/list.blade.php ENDPATH**/ ?>