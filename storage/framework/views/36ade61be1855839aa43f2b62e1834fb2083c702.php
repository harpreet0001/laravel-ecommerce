<div class="form-group">
    <label class="control-label" for="input-email">E-Mail</label>
    <input type="text" name="email" value="" placeholder="E-Mail" id="input-email" class="form-control">
    <span class="text text-danger error-msg" id="email_error"></span>
</div>
<div class="form-group">
    <label class="control-label" for="input-password">Password</label>
    <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control">
    <span class="text text-danger error-msg" id="password_error"></span>
    <div class="forget-password"><a href="<?php echo e(route('password.request')); ?>">Forgotten Password</a></div>
</div><?php /**PATH /home/megatanws/public_html/web/resources/views/form/login.blade.php ENDPATH**/ ?>