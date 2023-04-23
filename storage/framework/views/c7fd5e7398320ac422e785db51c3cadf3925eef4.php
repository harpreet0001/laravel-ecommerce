<?php if(Session::has('success')): ?>
 <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong></strong> <?php echo e(session('success')); ?>

  </div>
<?php endif; ?>

<?php if(Session::has('error')): ?>
 <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong></strong> <?php echo e(session('error')); ?>

  </div>
<?php endif; ?>




<?php /**PATH /home/megatanws/public_html/web/resources/views/msg.blade.php ENDPATH**/ ?>