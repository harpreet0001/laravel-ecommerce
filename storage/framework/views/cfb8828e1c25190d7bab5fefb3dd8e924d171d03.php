<?php $__env->startSection('content'); ?>
 <div style="padding: 0 20px 20px;"> 

    <h2 style="font-size: 22px; height: 30px; color: rgba(204, 102, 0, 1); border-bottom: 1px dashed rgba(128, 128, 128, 1)">Thanks for Registering at MEGATAN</h2>
    <p>Thank you for creating your account at MEGATAN. Your account
        details are as follows:</p>
    <p>Please click the link to verify your email address
        <a href="<?php echo e($verifyLink); ?>">click here</a>.
    </p>
    <p>If you have any questions regarding your account, click 'Reply' in
        your email client and we'll be only too happy to help.
    </p>
    <p style="margin-top:12px;margin-top: 12px;padding: 10px;background: #ececec;">
        <strong><span class="il"><?php echo e(config('app.name')); ?></span></strong>
        <br>
        <a href="<?php echo env('APP_URL'); ?>" ><?php echo e(env('APP_URL')); ?></a>
    </p>
</div>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('email.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/megatanws/public_html/web/resources/views/email/register/verify.blade.php ENDPATH**/ ?>