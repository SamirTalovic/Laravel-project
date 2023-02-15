<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    Dashboard
                </a>
            </li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('course_access')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.courses.index')); ?>" class="nav-link <?php echo e(request()->is('admin/courses') || request()->is('admin/courses/*') ? 'active' : ''); ?>">
                    <i class="fas fa-gift nav-icon"></i>
                    Kursevi
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lesson_access')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.lessons.index')); ?>" class="nav-link <?php echo e(request()->is('admin/lessons') || request()->is('admin/lessons/*') ? 'active' : ''); ?>">
                    <i class="fas fa-gift nav-icon"></i>
                    Lekcije
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('test_access')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.tests.index')); ?>" class="nav-link <?php echo e(request()->is('admin/tests') || request()->is('admin/tests/*') ? 'active' : ''); ?>">
                    <i class="fas fa-gift nav-icon"></i>
                    Testovi
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('question_access')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.questions.index')); ?>" class="nav-link <?php echo e(request()->is('admin/questions') || request()->is('admin/questions/*') ? 'active' : ''); ?>">
                    <i class="fas fa-gift nav-icon"></i>
                    Pitanja
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('questions_option_access')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.question_options.index')); ?>" class="nav-link <?php echo e(request()->is('admin/question_options') || request()->is('admin/question_options/*') ? 'active' : ''); ?>">
                    <i class="fas fa-gift nav-icon"></i>
                    Opcije za pitanja
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_access')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.users.index')); ?>" class="nav-link <?php echo e(request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : ''); ?>">
                    <i class="fas fa-gift nav-icon"></i>
                    Korisnici
                </a>
            </li>
            <?php endif; ?>
            <li class="nav-item">
                <a href="#" onclick="getElementById('logout-form').submit()" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    Odavi se
                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="post">
                    <?php echo csrf_field(); ?> 
                </form>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><?php /**PATH C:\Users\Samir123\Desktop\xampp\htdocs\ProjectWP\resources\views/partials/menu.blade.php ENDPATH**/ ?>