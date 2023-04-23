<div class="tab-content p-0">
   <?php echo $__env->make('msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <div class="table-responsive">
      <table class="table table-bordered cstm-data-table">
         <thead>
            <tr>
               <th>First Name</th>
               <th>Last Name</th>
               <th>E-mail</th>
               <th>Contact</th>
               <th>Date Joined</th>
               <th>Orders</th>
               <th style="width:160px;">Actions</th>
            </tr>
         </thead>
         <tbody>
            <?php if($Customers->count() > 0): ?>
               <?php $__currentLoopData = $Customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                     <td><?php echo e(ucwords($value->firstname)); ?></td>
                     <td><?php echo e($value->lastname); ?></td>
                     <td><?php echo e($value->email); ?></td>
                     <td><?php echo e($value->contact); ?></td>
                     <td><?php echo e(fnDateFormat($value->created_at)); ?></td>
                     <td><a href="<?php echo e(route('order-list')); ?>?userId=<?php echo e(base64_encode($value->_id)); ?>" class="btn btn-success btn-sm"><?php echo e($value->userorders->count()); ?></a></td>
                     <td>
                        <ul class="action_btns_wrap a-i-c">
                           <!-- 1 is using for checking the "usetype" field with database -->
                           <?php
                              echo IsLoopPermitted(1, $value->_id);
                           ?>
                           <label class="switch mini-switch ">
                              <input type="checkbox" class="target_switch" data-attr="<?php echo e(Route('user-active',$value->_id)); ?>" <?php echo e($value->active==1 ? 'checked' : ''); ?>>
                              <span class="slider round"></span>
                           </label>
                        </ul>
                     </td>
                  </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            <?php else: ?>
               <tr>
                  <td colspan="6">No Data Found.</td>
               </tr>
            <?php endif; ?>   
         </tbody>
      </table>
   </div>
</div>

<div class="custom_pagination">
      <?php echo e($Customers->links()); ?>

</div><?php /**PATH /home/megatanws/public_html/web/resources/views/admin/modules/customer/records.blade.php ENDPATH**/ ?>