<?php $__env->startSection('content'); ?>
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
         <?php echo $__env->make('admin.layouts.CardHeader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <div class="card-body order_list">
            <div class="tab-content p-0">
               <?php echo $__env->make('msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="order-list-header">
                    <div class="order-list-header_content">
                        <div>
                          <?php if(!is_null($user)): ?>
                            <p><?php echo e($user->firstname); ?> <?php echo e($user->lastname); ?> (<?php echo e($user->email ?? ''); ?>)</p>
                          <?php endif; ?>
                        </div>
                        <div class="order-search-header">
                          <!--filter-for-order-status-->
                           <?php echo $__env->make('admin.modules.order.dynamic.filters.order_status', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                          <!--filter-for-order-status-->  
                          <!--search-filter-->  
                           <?php echo $__env->make('admin.modules.order.dynamic.filters.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                          <!--search-filter-->
                        </div>
                    </div>
                </div>
                <!--limit-filter-->
                <?php echo $__env->make('admin.modules.order.dynamic.filters.limit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!--limit-filter-->
               <div class="table-responsive" id="orderlist">
                   <!--list-of-orders-->
                   <?php echo $__env->make('admin.modules.order.dynamic.viewOrders', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                   <!--list-of-orders-->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/megatanws/public_html/web/resources/views/admin/modules/order/list.blade.php ENDPATH**/ ?>