<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- ===== BOX ICONS ===== -->
    <link
      href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css"
      rel="stylesheet"
    />

    <!-- swiper css -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/libraries/swiper.css')); ?>" />

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/style.css')); ?>" />

    <title>Responsive Watches website</title>
  </head>
  <body>
    <header class="header" id="header">
      <div class="nav container">
        <a href="<?php echo e(route('home')); ?>" class="nav-logo">
        <i class='bx bx-compass'></i> BERAJAH
        </a>

        <div class="nav-menu" id="nav-menu">
          <ul class="nav-list">
            <li class="nav-item">
              <a href="<?php echo e(route('home')); ?>" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="<?php echo e(route('courses.index')); ?>" class="nav-link">Course</a>
            </li>
            <?php if(auth()->guard()->check()): ?>
              <?php if(auth()->user()->isAdmin()): ?>
                <li class="nav-item">
                  <a href="<?php echo e(route('admin.courses.index')); ?>" class="nav-link">Admin</a>
                </li> 
              <?php endif; ?>
            <?php endif; ?>
          </ul>
         <?php if(auth()->guard()->check()): ?>
            <ul class="nav-list nav-account" style="margin-top: 1rem">
                <li class="nav-item" style="width: 100%; text-align: center">
                <a
                    href="<?php echo e(route('courses.index')); ?>"
                    class="button nav-link"
                    style="display: block; width: 100%"
                    >My Course</a
                >
                </li>
                <li class="nav-item" style="width: 100%; text-align: center">
                <a
                    href="#"
                    class="button nav-link"
                    onclick="getElementById('logout').submit()"
                    style="display: block; width: 100%"
                    >Logout</a
                >
                <form id="logout" action="<?php echo e(route('logout')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                    </form>
                </li>
            </ul>
         <?php endif; ?>

         <?php if(auth()->guard()->guest()): ?> 
         <ul class="nav-list nav-account" style="margin-top: 1rem">
                <li class="nav-item" style="width: 100%; text-align: center">
                <a
                    href="<?php echo e(route('login')); ?>"
                    class="button nav-link"
                    style="display: block; width: 100%"
                    >Login</a
                >
                </li>
                <li class="nav-item" style="width: 100%; text-align: center">
                <a
                    href="<?php echo e(route('register')); ?>"
                    class="button nav-link"
                    style="display: block; width: 100%"
                    >Register</a
                >
                </li>
            </ul>
         <?php endif; ?>

          <div class="nav-close" id="nav-close">
            <i class="bx bx-x"></i>
          </div>
        </div>

        <div class="nav-btns">
          <i class="bx bx-moon change-theme" id="theme-button"></i>
          <?php if(auth()->guard()->guest()): ?>
          <div class="btn-account">
            <a href="<?php echo e(route('login')); ?>" class="btn btn-login">Login</a>
            <a href="<?php echo e(route('register')); ?>" class="btn btn-register">Register</a>
          </div>
          <?php endif; ?>
          <?php if(auth()->guard()->check()): ?>
          <div class="nav-user" id="nav-user">
            <i class="bx bx-user-circle"></i> <small> <?php echo e(auth()->user()->name); ?> </small>
            <i class="bx bx-chevron-down"></i>
          </div>
          <?php endif; ?>

          <div class="nav-toggle" id="nav-toggle">
            <i class="bx bx-grid-alt"></i>
          </div>
        </div>
      </div>
    </header>

    <div class="dropdown" id="dropdown">
      <i class="bx bx-x dropdown-close" id="dropdown-close"></i>

      <a href="<?php echo e(route('courses.index')); ?>"><h2 class="dropdown-title-center">My Course</h2></a>
      <a href="#" onclick="getElementById('logout').submit()"><h2 class="dropdown-title-center">Logout</h2></a>
      <form id="logout" action="<?php echo e(route('logout')); ?>" method="post">
          <?php echo csrf_field(); ?>
      </form>
    </div>

    <main class="main container">
     <?php echo $__env->yieldContent('content'); ?>
    </main>

    <footer class="footer section">
      <div class="footer-container container grid">
        <div class="footer-content">
          <h3 class="footer-title">Our Information</h3>
          <ul class="footer-list">
            <li>123456789</li>
            <li>Lombok, INDONESIA</li>
          </ul>
        </div>

        <div class="footer-content">
          <h3 class="footer-title">Menu</h3>
          <ul class="footer-links">
            <li>
              <a href="#" class="footer-link">home</a>
            </li>
            <li>
              <a href="#" class="footer-link">course</a>
            </li>
            <li>
              <a href="#" class="footer-link">categories</a>
            </li>
          </ul>
        </div>

        <div class="footer-content">
          <h3 class="footer-title">Account</h3>
          <ul class="footer-links">
            <li>
              <a href="#" class="footer-link">register</a>
            </li>
            <li>
              <a href="#" class="footer-link">login</a>
            </li>
            <li>
              <a href="#" class="footer-link">faq</a>
            </li>
          </ul>
        </div>

        <div class="footer-content">
          <h3 class="footer-title">Social Media</h3>
          <ul class="footer-social">
            <a href="#" class="footer-social-link">
              <i class="bx bxl-facebook"></i>
            </a>
            <a href="#" class="footer-social-link">
              <i class="bx bxl-twitter"></i>
            </a>
            <a href="#" class="footer-social-link">
              <i class="bx bxl-instagram"></i>
            </a>
          </ul>
        </div>
      </div>

      <span class="footer-copy">&#169; Abdul Aziz. All rights</span>
    </footer>

    <a href="#" class="scroll-up" id="scroll-up">
      <i class="bx bx-up-arrow-alt scroll-up-icon"></i>
    </a>

    <!-- swiper -->
    <script src="<?php echo e(asset('frontend/assets/libraries/swiper.js')); ?>"></script>
    <!--===== MAIN JS =====-->
    <script src="<?php echo e(asset('frontend/assets/main.js')); ?>"></script>
  </body>
</html>
<?php /**PATH C:\Users\Samir123\Desktop\xampp\htdocs\course-LMS-main\resources\views/layouts/front.blade.php ENDPATH**/ ?>