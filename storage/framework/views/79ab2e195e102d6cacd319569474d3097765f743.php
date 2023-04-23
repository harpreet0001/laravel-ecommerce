<?php $__env->startSection('style'); ?>
<style>
body .paging_simple_numbers { display: none; }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
         <?php echo $__env->make('admin.layouts.CardHeader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <div class="card-body ">
            <!--custom-search-->
            <div class="search-wrapper custom_search">
               <div class="input-group">
                    <div class="form-outline">                                            
                        <input type="text" id="searchQuery" name="searchQuery" class="form-control" placeholder="Search" value="">
                    </div>
                    <button type="button" name="SearchButton" id="SearchButton" class="btn btn-primary main-btn">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <!--custom-search-end-->
            <!--custom-limit-->
            <div class="custom_limit">
               <label>Show:</label>
               <select id="limit" name="limit" class="form-control">
                  <option value="10">10</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="75">75</option>
                  <option value="100">100</option>
               </select>     
            </div>
            <!--custom-limit-end-->
            <div class="responseHTML"><?php echo $__env->make('admin.modules.customer.records', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript">
let custom_params  = {  
                        'searchQuery' : '',
                        'limit'       : 10,  
                        'page'        : 1,                  
                     };
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/megatanws/public_html/web/resources/views/admin/modules/customer/list.blade.php ENDPATH**/ ?>