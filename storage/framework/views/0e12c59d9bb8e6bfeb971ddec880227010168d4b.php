<table class="table table-bordered cstm-data-table">
   <thead>
      <tr>
         <th style="width: 60px;">OrderId
            <!-- <a href="#" class="SortLink" data-sort-field="_id" data-sort-order="asc"><span class="asc-desc"><i class="fas fa-chevron-up"></i></span></a> -->
            <!-- <a href="#" class="SortLink" data-sort-field="_id" data-sort-order="desc"><span class="asc-desc"><i class="fas fa-chevron-down"></i></span></a> -->
         </th>
         <th>Customer</th>
         <th>Date</th>
         <th>Status</th>
         <th>Total</th>
         <th style="width:160px;">Actions</th>
      </tr>
   </thead>
   <tbody>
      <?php if($orders->count() > 0): ?>
         <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
               <td><?php echo e($order->unique_order_id ?? ''); ?> </td>               
               <td><?php echo e($order->orderuser->firstname); ?> <?php echo e($order->orderuser->lastname); ?></td>
               <td><?php echo fnDateFormat($order->created_at); ?></td>
               <td 
                      id="order_status_column_<?php echo e(base64_encode($order->_id)); ?>" 
                      style="border-left-style: solid; border-left-width: 10px; width:165px;" 
                      class="OrderStatus OrderStatus<?php echo e($order->orderstatus); ?>">
                      <?php echo selectOrderStatus($order); ?>

               </td>
               <td><?php echo e(priceFormat($order->total)); ?></td>
               <td>
                  <ul class="action_btns_wrap a-i-c">
                     <!-- 1 is using for checking the "usetype" field with database -->
                     <?php
                        echo IsLoopPermitted(1, $order->_id);
                     ?>
                    <?php echo orderActions($order->_id); ?>

                  </ul>
               </td>
            </tr>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php else: ?>
         <tr>
            <td colspan="8">No Data Found.</td>
         </tr>
      <?php endif; ?>   
   </tbody>
</table>
<?php echo $__env->make('admin.modules.order.dynamic.pagination', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/megatanws/public_html/web/resources/views/admin/modules/order/dynamic/viewOrders.blade.php ENDPATH**/ ?>