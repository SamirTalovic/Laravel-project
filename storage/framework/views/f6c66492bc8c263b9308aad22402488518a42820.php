<?php $__env->startSection('content'); ?>
<section class="home" id="home">
        <div class="home-container container grid">
          <div class="home-img-bg">
            <!-- <img src="assets/images/bg-hero.jpg" alt="" class="home-img" /> -->
          </div>

          <div class="home-data">
            <h1 class="home-title">
              Mi učimo vas <br />
              Sve što treba da znaš
            </h1>
            <p class="home-description">
              Pronadji način da naučiš i preuzmi kontorlu nad svojim životom i napravi nešto korisno.
            </p>
            <div class="home-btns">
              <a href="<?php echo e(route('courses.index')); ?>" class="button btn-gray btn-small"> Moji kursevi </a>
              <a href="#course" class="button button-home">Pronađi kurs</a>
            </div>
          </div>
        </div>
      </section>

      <section class="story section container">
        <div class="story-container grid">
          <div class="story-data">
            <h2 class="section-title story-section-title">Naši ciljevi</h2>
            <h1 class="story-title">
              Uživaj u učenju bez pritiska
            </h1>

            <p class="story-description">
            Naučite napraviti nešto s projektima iz stvarnog svijeta koji će vam pomoći da povećate kreativnost
            </p>
            <a href="#course" class="button btn-small">Pronadji</a>
          </div>
          <div class="story-images">
            <img src="<?php echo e(asset('frontend/assets/images/goals.jpg')); ?>" alt="" class="story-img" />
            <div class="story-square"></div>
          </div>
        </div>
      </section>

      <section class="products section container" id="course">
        <h2 class="section-title">Svi kursevi</h2>

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
                    Popularni
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

      <section class="testimonial section container">
        <div class="testimonial grid">
          <div class="swiper testimonial-swipper">
            <div class="swiper-wrapper">
              <div class="testimonial-card swiper-slide" style="text-align: center;">
                <div class="testimonial-quote">
                  <i class="bx bxs-quote-alt-left"></i>
                </div>
                <p class="testimonial-description">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. In,
                  labore reiciendis laboriosam quos at eum, sed sequi tempore
                  perspiciatis magnam iste quas sit minima provident!
                </p>
                <h3 class="testimonial-date">January 3, 2023</h3>

                <div class="testimonial-profile" style="justify-content: center;flex-direction: column;row-gap: 1.4rem;">
                  <img
                    src="<?php echo e(asset('frontend/assets/images/samir1.jpg')); ?>"
                    alt=""
                    class="testimonial-profile-img"
                  />

                  <div class="testimonial-profile-data">
                    <span class="testimonial-profile-name">Samir Talovic</span>
                    <span class="testimonial-profile-detail"
                      >Kupac</span
                    >
                  </div>
                </div>
              </div>
              <div class="testimonial-card swiper-slide" style="text-align: center;">
                <div class="testimonial-quote">
                  <i class="bx bxs-quote-alt-left"></i>
                </div>
                <p class="testimonial-description">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. In,
                  labore reiciendis laboriosam quos at eum, sed sequi tempore
                  perspiciatis magnam iste quas sit minima provident!
                </p>
                <h3 class="testimonial-date">January 3, 2023</h3>

                <div class="testimonial-profile" style="justify-content: center;flex-direction: column;row-gap: 1.4rem;">
                  <img
                    src="<?php echo e(asset('frontend/assets/images/testimonial1.jpg')); ?>"
                    alt=""
                    class="testimonial-profile-img"
                  />

                  <div class="testimonial-profile-data">
                    <span class="testimonial-profile-name">Samir Talovic</span>
                    <span class="testimonial-profile-detail"
                      >Radnik</span
                    >
                  </div>
                </div>
              </div>
              <div class="testimonial-card swiper-slide" style="text-align: center;">
                <div class="testimonial-quote">
                  <i class="bx bxs-quote-alt-left"></i>
                </div>
                <p class="testimonial-description">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. In,
                  labore reiciendis laboriosam quos at eum, sed sequi tempore
                  perspiciatis magnam iste quas sit minima provident!
                </p>
                <h3 class="testimonial-date">January 3, 2023</h3>

                <div class="testimonial-profile" style="justify-content: center;flex-direction: column;row-gap: 1.4rem;">
                  <img
                    src="<?php echo e(asset('frontend/assets/images/testimonial1.jpg')); ?>"
                    alt=""
                    class="testimonial-profile-img"
                  />

                  <div class="testimonial-profile-data">
                    <span class="testimonial-profile-name">Samir Talovic</span>
                    <span class="testimonial-profile-detail"
                      >Direktor kompanije</span
                    >
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-button-next" style="right: 30%;left: initial;top:initial;bottom: 3rem;">
              <i class="bx bx-right-arrow-alt"></i>
            </div>
            <div class="swiper-button-prev" style="right: initial;left: 30%;top:initial;bottom: 3rem;">
              <i class="bx bx-left-arrow-alt"></i>
            </div>
          </div>
      </section>

      <section class="newsletter section container">
        <div class="newsletter-bg grid">
          <div>
            <h2 class="newsletter-title">
              Pretplati se sada <br />
              Newsletter
            </h2>
            <p class="newsletter-description">
              Budi prvi koji će znati za kurseve i popuste.
            </p>
          </div>

          <form action="" class="newsletter-subscribe">
            <input
              type="email"
              placeholder="Upisi svoj email"
              class="newsletter-input"
            />
            <button class="button">Pošalji</button>
          </form>
        </div>
      </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Samir123\Desktop\xampp\htdocs\ProjectWP\resources\views/index.blade.php ENDPATH**/ ?>