<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        Izmeni kurs
    </div>

    <div class="card-body">
        <form action="<?php echo e(route('admin.courses.update', $course->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('put'); ?>
            <?php if(!auth()->user()->isAdmin()): ?>
                <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                    <label for="teacher">Nastavnici*</label>
                    <select name="teachers[]" class="form-control" id="teacher" multiple>
                        <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php echo e($course->teachers->pluck('id')[0] == $id ? 'selected' : null); ?> value="<?php echo e($id); ?>"><?php echo e($teacher); ?></option>
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
                <label for="title">Naslov*</label>
                <input type="text" id="title" name="title" class="form-control" value="<?php echo e(old('title', isset($course) ? $course->title : '')); ?>" required>
                <?php if($errors->has('title')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('title')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('slug') ? 'has-error' : ''); ?>">
                <label for="slug">Putanja*</label>
                <input type="text" id="slug" name="slug" class="form-control" value="<?php echo e(old('slug', isset($course) ? $course->slug : '')); ?>" required>
                <?php if($errors->has('slug')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('slug')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('slug') ? 'has-error' : ''); ?>">
                <label for="description">Opis*</label>
                <textarea id="description" name="description" rows="5" class="form-control" required>
                    <?php echo e(old('description', isset($course) ? $course->description : '')); ?>

                </textarea>
                <?php if($errors->has('slug')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('slug')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('slug') ? 'has-error' : ''); ?>">
                <label for="price">Cena*</label>
                <input type="number" id="price" name="price" class="form-control" value="<?php echo e(old('price', isset($course) ? $course->price : '')); ?>" required />
                <?php if($errors->has('slug')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('slug')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('slug') ? 'has-error' : ''); ?>">
                <label for="course_image">Slika kursa*</label>
                <input type="file" id="course_image" name="course_image" class="form-control" value="<?php echo e(old('course_image', isset($course) ? $course->course_image : '')); ?>" />
                <?php if($errors->has('slug')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('slug')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('slug') ? 'has-error' : ''); ?>">
                <label for="start_date">Datum početka*</label>
                <input type="date" id="start_date" name="start_date" class="form-control" value="<?php echo e(old('start_date', isset($course) ? $course->start_date : '')); ?>" required />
                <?php if($errors->has('slug')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('slug')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('slug') ? 'has-error' : ''); ?>">
                <label for="published">Postavljen*</label>
                <select name="published" class="form-control" id="published">
                    <option <?php echo e($course->published == 'Active' ? 'selected' : null); ?> value="1">Aktivan</option>
                    <option <?php echo e($course->published == 'Inactive' ? 'selected' : null); ?> value="0">Neaktivan</option>
                </select>
                <?php if($errors->has('slug')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('slug')); ?>

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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Samir123\Desktop\xampp\htdocs\ProjectWP\resources\views/admin/courses/edit.blade.php ENDPATH**/ ?>