<div class="card-header d-f j-c-s-b" style="cursor: move;">
   <h3 class="card-title"><?php echo CardTitle(); ?> </h3>
   <div class="btn-wrap">
      <?php
      	echo IsLoopPermitted(0);  /* 0 is using for checking the "usetype" field with database */	
      ?>
   </div>
</div>