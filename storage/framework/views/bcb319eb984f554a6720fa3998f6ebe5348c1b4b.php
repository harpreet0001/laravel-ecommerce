<?php if(Session::has('error')): ?>
 <div class="alert alert-danger alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 

     <?php echo e(Session::get('error')); ?>

  
 </div>
<?php endif; ?><?php /**PATH E:\Projects\resources\views/message/error.blade.php ENDPATH**/ ?>