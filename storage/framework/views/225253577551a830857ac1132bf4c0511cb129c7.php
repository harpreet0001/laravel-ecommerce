<?php $__env->startSection('content'); ?>
 <div style="padding: 0 20px 20px;"> 
    <p style="margin-top:12px;padding: 10px;">
        To change your customer account password at MEGATAN please click this
        link or copy and paste it into your browser:<br><br>
    </p>
    <div style="margin-top:12px;margin-top: 12px;padding: 10px;background: #ececec;">
        <a href="<?php echo e(url('password/reset',$token).'?email='.urlencode($notifiable->email)); ?>">Reset Password</a>
    </div>
    <br>
    <font color="#888888">
        <p style="margin-top:12px;margin-top: 12px;padding: 10px;background: #ececec;">
            <strong><span class="il"><?php echo e(config('app.name')); ?></span></strong>
            <br>
            <a href="<?php echo env('APP_URL'); ?>" ><?php echo e(env('APP_URL')); ?></a>
        </p>
    </font>
</div>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('email.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/megatanws/public_html/web/resources/views/email/password/reset.blade.php ENDPATH**/ ?>