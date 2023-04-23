 <div class="select-limit-div">
  <label>Show:</label>
   <select id="limit" name="limit" class="form-select form-control" aria-label="Default select example" >
     <option value="10"  <?php if(isset(request()->limit) && request()->limit == 10): ?><?php echo e('selected'); ?> <?php endif; ?> >10</option>

     <option value="25" <?php if(isset(request()->limit) && request()->limit == 25): ?><?php echo e('selected'); ?> <?php endif; ?> >25</option>

     <option value="50" <?php if(isset(request()->limit) && request()->limit == 50): ?><?php echo e('selected'); ?> <?php endif; ?> >50</option>

     <option value="75" <?php if(isset(request()->limit) && request()->limit == 75): ?><?php echo e('selected'); ?> <?php endif; ?> >75</option>

     <option value="100" <?php if(isset(request()->limit) && request()->limit == 100): ?><?php echo e('selected'); ?> <?php endif; ?> >100</option>
   </select>     
</div><?php /**PATH /home/megatanws/public_html/web/resources/views/admin/modules/order/dynamic/filters/limit.blade.php ENDPATH**/ ?>