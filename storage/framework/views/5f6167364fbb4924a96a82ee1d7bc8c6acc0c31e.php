<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
       Kreiraj test
    </div>

    <div class="card-body">
        <form action="<?php echo e(route('admin.tests.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                <label for="course_id">Kurs*</label>
                <select name="course_id" class="form-control" id="teacher" >
                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($id); ?>"><?php echo e($course); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('course_id')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('course_id')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                <label for="lesson_id">Lekcija*</label>
                <select name="lesson_id" class="form-control" id="lesson_id" >
                    <?php $__currentLoopData = $lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($id); ?>"><?php echo e($lesson); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('lesson_id')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('lesson_id')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                <label for="title">Naslov*</label>
                <input type="text" id="title" name="title" class="form-control" value="<?php echo e(old('title', isset($test) ? $test->title : '')); ?>" required>
                <?php if($errors->has('title')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('title')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
                <label for="description">Opis*</label>
                <textarea id="description" name="description" rows="5" class="form-control" required>
                    <?php echo e(old('description', isset($test) ? $test->description : '')); ?>

                </textarea>
                <?php if($errors->has('description')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('description')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('published') ? 'has-error' : ''); ?>">
                <label for="published">Postavljen*</label>
                <select name="published" class="form-control" id="published">
                    <option value="1">Aktivan</option>
                    <option value="0">Neaktivan</option>
                </select>
                <?php if($errors->has('published')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('published')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div>
                <button class="btn btn-danger" type="submit" >Sačuvaj</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Samir123\Desktop\xampp\htdocs\ProjectWP\resources\views/admin/tests/create.blade.php ENDPATH**/ ?>