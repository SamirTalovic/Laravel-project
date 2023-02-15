<?php $__env->startSection('content'); ?>
    <section class="products section container" id="course">
        <h2 class="section-title">My Course</h2>

        <div class="featured-container grid">
            <?php $__empty_1 = true; $__currentLoopData = $purchased_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchased_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <article class="products-card swiper-slide">
                <a style="color: inherit;" href="<?php echo e(route('courses.show', [$purchased_course->slug])); ?>" class="products-link">
                    <img
                    src="<?php echo e(Storage::url($purchased_course->course_image)); ?>"
                    class="products-img"
                    alt=""
                    />
                    <h3 class="products-title"><?php echo e($purchased_course->title); ?></h3>
                    <div class="products-star">
                    <?php for($star = 1; $star <= 5; $star++): ?>
                        <?php if($purchased_course->rating >= $star): ?>
                        <i class="bx bxs-star"></i>
                        <?php else: ?>
                        <i class='bx bx-star'></i>
                        <?php endif; ?>
                    <?php endfor; ?>
                    </div>
                    <span class="products-price">$<?php echo e($purchased_course->price); ?></span>
                    <?php if($purchased_course->students()->count() > 5): ?>
                    <button class="products-button">
                        Popular
                    </button>
                    <?php endif; ?>
                    <span class="products-student">
                    <?php echo e($purchased_course->students()->count()); ?> students
                    </span>
                </a>
              </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <h2 style="text-align: center;grid-column: 1/5">You haven't purchased course yet</h2>
            <?php endif; ?>
            </div>
      </section>

    <section class="products section container" id="course">
        <h2 class="section-title">All Course</h2>

        <div class="new-container">
          <div class="swiper new-swipper">
            <div class="swiper-wrapper">
            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <article class="products-card swiper-slide">
              <a style="color: inherit;" href="<?php echo e(route('courses.show', [$course->slug])); ?>" class="products-link">
                <img
                  src="<?php echo e(Storage::url($course->course_image)); ?>"
                  class="products-img"
                  alt=""
                />
                <h3 class="products-title"><?php echo e($course->title); ?></h3>
                <div class="products-star">
                <?php for($star = 1; $star <= 5; $star++): ?>
                    <?php if($course->rating >= $star): ?>
                    <i class="bx bxs-star"></i>
                    <?php else: ?>
                    <i class='bx bx-star'></i>
                    <?php endif; ?>
                <?php endfor; ?>
                </div>
                <span class="products-price">$<?php echo e($course->price); ?></span>
                <?php if($course->students()->count() > 5): ?>
                  <button class="products-button">
                    Popular
                  </button>
                <?php endif; ?>
                <span class="products-student">
                <?php echo e($course->students()->count()); ?> students
                </span>
              </a>
              </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
            </div>
            <div
              class="swiper-button-next"
              style="
                bottom: initial;
                top: 50%;
                right: 0;
                left: initial;
                border-radius: 50%;
              "
            >
              <i class="bx bx-right-arrow-alt"></i>
            </div>
            <div
              class="swiper-button-prev"
              style="bottom: initial; top: 50%; border-radius: 50%"
            >
              <i class="bx bx-left-arrow-alt"></i>
            </div>
          </div>
        </div>
      </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Samir123\Desktop\xampp\htdocs\course-LMS-main\resources\views/courses.blade.php ENDPATH**/ ?>