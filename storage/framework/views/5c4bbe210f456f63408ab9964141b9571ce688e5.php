<?php $__env->startSection('content'); ?>
<section class="detail section" id="detail">
        <div class="detail-container grid" style="row-gap: 5rem">
          <div class="watch-data-left" id="watch-data-left">
            <iframe src="https://www.youtube.com/embed/<?php echo e($lesson->embed_id); ?>"> </iframe>
        <?php if($purchased_course): ?>
            <?php if($previous_lesson): ?>
            <div
              class="swiper-button-prev watch-prev-icon"
              style="
                left: 10px;
                right: initial;
                bottom: 0px;
                border-radius: 50%;
              "
            >
              <a href="<?php echo e(route('lessons.show', [$previous_lesson->course_id, $previous_lesson->slug])); ?>"> <i class="bx bx-left-arrow-alt"></i></a>
            </div>
          <?php endif; ?>
          <?php if($next_lesson): ?>
            <div
              class="swiper-button-next watch-next-icon"
              style="
                right: 10px;
                left: initial;
                bottom: 0px;
                border-radius: 50%;
              "
            >
              <a href="<?php echo e(route('lessons.show', [$next_lesson->course_id, $next_lesson->slug])); ?>"><i class="bx bx-right-arrow-alt"></i></a>
            </div>
          <?php endif; ?>
        <?php endif; ?>
            <div
              class="swiper-button-next watch-next-icon"
              id="fullscreen"
              style="right: 50%; left: initial; bottom: 0px; border-radius: 50%"
            >
              <i class="bx bx-fullscreen"></i>
            </div>
          </div>
          <div class="watch-data-right" id="watch-data-right">
            <ul style="padding-bottom: 5rem;">
            <?php $__currentLoopData = $lesson->course->publishedLessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publishedLesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($publishedLesson->free_lesson): ?>
                    <li>
                        <a href="<?php echo e(route('lessons.show', [$publishedLesson->course_id, $publishedLesson->slug])); ?>"><i class="bx bx-play-circle"></i><?php echo e($publishedLesson->title); ?></a>
                    </li>
                <?php else: ?>
                  <?php if($purchased_course): ?>
                    <li>
                        <a href="<?php echo e(route('lessons.show', [$publishedLesson->course_id, $publishedLesson->slug])); ?>"><i class="bx bx-play-circle"></i><?php echo e($publishedLesson->title); ?></a>
                    </li>
                  <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <?php if(!$purchased_course): ?>
                <?php if(auth()->check()): ?>
                    <?php if($lesson->course->students()->where('user_id', auth()->id())->count() == 0): ?>
                        <form action="<?php echo e(route('courses.payment')); ?>" style="margin-top: 1rem;" method="POST">
                        <?php echo csrf_field(); ?>
                            <input type="hidden" name="course_id" value="<?php echo e($lesson->course->id); ?>" />
                            <input type="hidden" name="amount" value="<?php echo e($lesson->course->price); ?>" />
                            <input type="hidden" name="lesson_id" value="<?php echo e($lesson->course->publishedLessons[0]->slug); ?>" />
                            <button class="button detail-button">Purchase Course</button>
                        </form>
                    <?php endif; ?>
                <?php else: ?>
                    <a href="<?php echo e(route('register')); ?>?redirect_url=<?php echo e(route('courses.show', [$lesson->course->slug])); ?>"
                    class="button detail-button" style="text-align: center;">Purchase Course ($<?php echo e($lesson->course->price); ?>)</a>
                <?php endif; ?>
            <?php endif; ?>
          </div>
        </div>
      </section>

      <section class="section question">
        <div class="question-data">
        <?php if($purchased_course): ?>
          <?php if($test_exists): ?>
            <?php if(!is_null($test_result)): ?>
                  <div class="alert alert-info">Your test score: <?php echo e($test_result->test_result); ?></div>
            <?php else: ?>
            <form action="<?php echo e(route('lessons.test', [$lesson->slug])); ?>" method="post">
            <?php echo csrf_field(); ?>
              <?php $__currentLoopData = $lesson->test->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <h3 for="question" style="margin-bottom: 1.2rem">
                <?php echo e($loop->iteration); ?>. <?php echo e($question->question); ?>

                </h3>

                <?php $__currentLoopData = $question->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <input type="radio" name="questions[<?php echo e($question->id); ?>]" value="<?php echo e($option->id); ?>" style="margin-bottom: 0.8rem" /> <?php echo e($option->option_text); ?>

                  <br />
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              <button class="button" 
                style="border: none; padding: 0.4rem 1.4rem; border-radius: 1rem;margin-top: 1rem;" >Submit Result</button>
            </form>
            <?php endif; ?>
          <?php endif; ?>
        <?php endif; ?>
        </div>
      </section>

      <?php if($purchased_course): ?>
      <section class="section rating">
        <div class="rating-data">
          <h4>Rating: <?php echo e($lesson->course->rating); ?> / 5</h4>
          <small>Rate the course:</small>
          <form
            style="
              margin-top: 1rem;
              display: flex;
              align-items: center;
              column-gap: 1rem;
            "
             action="<?php echo e(route('courses.rating', [$lesson->course->id])); ?>" method="post"
            method="post"
          >
          <?php echo csrf_field(); ?>
            <select
              name="rating"
              style="
                height: 30px;
                min-width: 30%;
                border: none;
                background-color: #e2e2e2;
                border-radius: 0.8rem;
                outline: none;
              "
            >
              <option value="1">1 - Awful</option>
              <option value="2">2 - Not too good</option>
              <option value="3">3 - Average</option>
              <option value="4" selected>4 - Quite good</option>
              <option value="5">5 - Awesome!</option>
            </select>
            <button
              class="button"
              style="border: none; padding: 0.4rem 1.4rem; border-radius: 1rem"
            >Submit</button>
          </form>
        </div>

        <?php if(session('success')): ?> 
        <div class="alert alert-info" id="alert" style="margin-top: 1rem;display:flex;justify-content: space-between">
           <?php echo e(session('success')); ?> <i class='bx bx-x' style="cursor:pointer;" id="close-alert"></i>
        </div>
        <?php endif; ?>
      </section>
      <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Samir123\Desktop\xampp\htdocs\course-LMS-main\resources\views/lesson.blade.php ENDPATH**/ ?>