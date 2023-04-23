<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown show">
            <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="<?php echo e(asset('sadmin/img/user2-160x160.jpg')); ?>" class="img-circle fas" alt="User Image" style="height: 140%;">
              <?php echo e(Auth::user()->name); ?>

            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><?php echo e(__('Logout')); ?></a>
              <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                <?php echo csrf_field(); ?>
              </form>
              <a class="dropdown-item" href="<?php echo e(env('APP_URL')); ?>" target="_blank">Visit Website</a>
            </div>
      </li>
      
    </ul>
  </nav><?php /**PATH /home/megatanws/public_html/web/resources/views/admin/includes/navbar.blade.php ENDPATH**/ ?>