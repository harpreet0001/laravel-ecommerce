<?php if(Session::has('success')): ?>
 <div class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 

     <?php echo e(Session::get('success')); ?>

  
 </div>
<?php endif; ?>

<?php /**PATH E:\Projects\resources\views/message/success.blade.php ENDPATH**/ ?>