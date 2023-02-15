<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        Create Courses
    </div>

    <div class="card-body">
        <form action="<?php echo e(route('admin.courses.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php if(auth()->user()->isAdmin()): ?>
                <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                    <label for="teacher">Teachers*</label>
                    <select name="teachers[]" class="form-control" id="teacher" multiple>
                        <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($id); ?>"><?php echo e($teacher); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php if($errors->has('title')): ?>
                        <em class="invalid-feedback">
                            <?php echo e($errors->first('title')); ?>

                        </em>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                <label for="title">title*</label>
                <input type="text" id="title" name="title" class="form-control" value="<?php echo e(old('title', isset($course) ? $course->title : '')); ?>" required>
                <?php if($errors->has('title')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('title')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('slug') ? 'has-error' : ''); ?>">
                <label for="slug">Slug*</label>
                <input type="text" id="slug" name="slug" class="form-control" value="<?php echo e(old('slug', isset($course) ? $course->slug : '')); ?>" required>
                <?php if($errors->has('slug')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('slug')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('slug') ? 'has-error' : ''); ?>">
                <label for="description">Desccription*</label>
                <textarea id="desccription" name="description" rows="5" class="form-control" value="<?php echo e(old('description', isset($course) ? $course->description : '')); ?>" required>
                </textarea>
                <?php if($errors->has('slug')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('slug')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('slug') ? 'has-error' : ''); ?>">
                <label for="price">Price*</label>
                <input type="number" id="price" name="price" class="form-control" value="<?php echo e(old('price', isset($course) ? $course->price : '')); ?>" required />
                <?php if($errors->has('slug')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('slug')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('slug') ? 'has-error' : ''); ?>">
                <label for="course_image">Course Image*</label>
                <input type="file" id="course_image" name="course_image" class="form-control" value="<?php echo e(old('course_image', isset($course) ? $course->course_image : '')); ?>" required />
                <?php if($errors->has('slug')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('slug')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('slug') ? 'has-error' : ''); ?>">
                <label for="start_date">Start Date*</label>
                <input type="date" id="start_date" name="start_date" class="form-control" value="<?php echo e(old('start_date', isset($course) ? $course->start_date : '')); ?>" required />
                <?php if($errors->has('slug')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('slug')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('slug') ? 'has-error' : ''); ?>">
                <label for="published">Published*</label>
                <select name="published" class="form-control" id="published">
                    <option value="1">Active</option>
                    <option value="0">In Active</option>
                </select>
                <?php if($errors->has('slug')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('slug')); ?>

                    </em>
                <?php endif; ?>
            </div>

            <div>
                <button class="btn btn-danger" type="submit" >Save</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Samir123\Desktop\xampp\htdocs\course-LMS-main\resources\views/admin/courses/create.blade.php ENDPATH**/ ?>