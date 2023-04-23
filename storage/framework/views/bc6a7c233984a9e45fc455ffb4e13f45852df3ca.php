<?php $__env->startSection('content'); ?>
 <div style="padding: 0 20px 20px;"> 
 	<h2 style="font-size:22px;height:30px;color:#cc6600;border-bottom:dashed 1px gray">Newsletter</h2>
    <h2 style="text-align:center">Thanks for joining the Newsletter!</h2>
    <p style="margin-top:12px;margin-top: 12px;padding: 10px;background: #ececec;">
        <strong><span class="il"><?php echo e(config('app.name')); ?></span></strong>
        <br>
        <a href="<?php echo e(env('APP_URL')); ?>"><?php echo e(env('APP_URL')); ?></a>
    </p>
</div>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('email.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/megatanws/public_html/web/resources/views/email/newsletter/subscribe.blade.php ENDPATH**/ ?>