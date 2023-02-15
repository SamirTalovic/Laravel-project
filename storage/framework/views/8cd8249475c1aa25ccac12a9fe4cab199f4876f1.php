<?php $__env->startSection('content'); ?>

    <section class="detail section" id="detail">
        <div class="detail-container grid">
          <div class="detail-data-left">
            <img src="<?php echo e(Storage::url($course->course_image)); ?>" alt="" />
            <h3><?php echo e($course->title); ?></h3>
            <p>
                <?php echo e($course->description); ?>

            </p>
          </div>
          <div class="detail-data-right">
            <ul>
            <?php $__currentLoopData = $course->publishedLessons->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li>
                 <?php if($lesson->free_lesson): ?>
                    <a class="lesson-title" href="<?php echo e(route('lessons.show', [$lesson->course_id, $lesson->slug])); ?>"><i class="bx bx-play-circle"></i><?php echo e($lesson->title); ?></a>
                <?php else: ?>   
                  <?php if(!$purchased_course): ?>
                    <a class="lesson-title" aria-disabled="false" style="cursor:  alias" href="#"><i class='bx bx-lock'></i>Another course <?php echo e($lesson->count()); ?></a>
                  <?php else: ?>  
                    <a class="lesson-title" href="<?php echo e(route('lessons.show', [$lesson->course_id, $lesson->slug])); ?>"><i class="bx bx-play-circle"></i><?php echo e($lesson->title); ?></a>
                  <?php endif; ?>
                <?php endif; ?> 
            </li>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <?php if(auth()->check()): ?>
                <?php if($course->students()->where('user_id', auth()->id())->count() == 0): ?>
                    <form action="<?php echo e(route('courses.payment')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                        <input type="hidden" name="course_id" value="<?php echo e($course->id); ?>" />
                        <input type="hidden" name="amount" value="<?php echo e($course->price); ?>" />
                        <input type="hidden" name="lesson_id" value="<?php echo e($course->publishedLessons[0]->slug); ?>" />
                        <button class="button detail-button">Purchase Course</button>
                    </form>
                <?php endif; ?>
            <?php else: ?>
                <a href="<?php echo e(route('register')); ?>?redirect_url=<?php echo e(route('courses.show', [$course->slug])); ?>"
                class="button detail-button" style="text-align: center;">Buy course ($<?php echo e($course->price); ?>)</a>
            <?php endif; ?>
          </div>
        </div>
      </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Samir123\Desktop\xampp\htdocs\course-LMS-main\resources\views/course.blade.php ENDPATH**/ ?>