<?php $__env->startSection('content'); ?>
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
         <?php echo $__env->make('admin.layouts.CardHeader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <div class="card-body">
            <div class="tab-content p-0">
               <?php echo $__env->make('msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               <div class="table-responsive">
                  <table class="table table-bordered cstm-data-table">
                     <thead>
                        <tr>
                           <th>Title</th>
                           <th>Price</th>
                           <th>Stock Level</th>
                           <th>Featured</th>
                           <th style="width:200px">SKU</th>
                           <th>Image</th>
                           <th style="width:160px;">Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if($Products->count() > 0): ?>
                           <?php $__currentLoopData = $Products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                 <td><?php echo e(ucwords($value->title)); ?></td>
                                 <td><?php echo e(priceFormat($value->price)); ?></td>
                                 <td><?php echo e($value->currentstock == '' ? 'NA' : $value->currentstock); ?></td>
                                 <td><?php echo ($value->featured == 1) ? '<i class="fas fa-check" style="color:green;"></i>' : '<i class="fas fa-times" style="color:red;"></i>'; ?></td>
                                 <td><?php echo e($value->sku ?? 'NA'); ?></td>
                                 <td><img src="<?php echo e(imagePath($value->image)); ?>" width="60" height="60"></td>
                                 <td>
                                    <ul class="action_btns_wrap a-i-c"> 
                                       <!-- 1 is using for checking the "usetype" field with database -->
                                       <?php
                                          echo IsLoopPermitted(1, $value->_id);
                                       ?>
                                       <label class="switch mini-switch ">
                                          <input type="checkbox" class="target_switch" data-attr="<?php echo e(Route('product-active',$value->_id)); ?>" <?php echo e($value->active==1 ? 'checked' : ''); ?>>
                                          <span class="slider round"></span>
                                       </label>
                                    </ul>
                                 </td>
                              </tr>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                           <tr>
                              <td colspan="7">No Data Found.</td>
                           </tr>
                        <?php endif; ?>   
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript">
   $('table').DataTable({

      "ordering": false
   });
</script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/megatanws/public_html/web/resources/views/admin/modules/product/list.blade.php ENDPATH**/ ?>