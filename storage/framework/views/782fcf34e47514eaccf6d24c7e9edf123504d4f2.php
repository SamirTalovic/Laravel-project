<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        Kreiraj lekciju
    </div>

    <div class="card-body">
        <form action="<?php echo e(route('admin.lessons.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
                <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                    <label for="course_id">Kurs*</label>
                    <select name="course_id" class="form-control" id="course_id" >
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
            <div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
                <label for="title">Naslov*</label>
                <input type="text" id="title" name="title" class="form-control" value="<?php echo e(old('title', isset($lesson) ? $lesson->title : '')); ?>" required>
                <?php if($errors->has('title')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('title')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('slug') ? 'has-error' : ''); ?>">
                <label for="slug">Putanja*</label>
                <input type="text" id="slug" name="slug" class="form-control" value="<?php echo e(old('slug', isset($lesson) ? $lesson->slug : '')); ?>" required>
                <?php if($errors->has('slug')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('slug')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('slug') ? 'has-error' : ''); ?>">
                <label for="full_text">Ceo text*</label>
                <textarea id="desccription" name="full_text" rows="5" class="form-control" value="<?php echo e(old('full_text', isset($lesson) ? $lesson->full_text : '')); ?>" required>
                </textarea>
                <?php if($errors->has('full_text')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('full_text')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('short_text') ? 'has-error' : ''); ?>">
                <label for="short_text">Kratak test*</label>
                <textarea id="desccription" name="short_text" rows="5" class="form-control" value="<?php echo e(old('short_text', isset($lesson) ? $lesson->short_text : '')); ?>" required>
                </textarea>
                <?php if($errors->has('short_text')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('short_text')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('embed_id') ? 'has-error' : ''); ?>">
                <label for="embed_id">Youtube URL*</label>
                <input type="text" id="embed_id" name="embed_id" class="form-control" value="<?php echo e(old('embed_id', isset($lesson) ? $lesson->embed_id : '')); ?>" required />
                <?php if($errors->has('embed_id')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('embed_id')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('free_lesson') ? 'has-error' : ''); ?>">
                <label for="free_lesson">Besplatna lekcija*</label>
                <select name="free_lesson" class="form-control" id="free_lesson">
                    <option value="1">Da</option>
                    <option value="0">Ne</option>
                </select>
                <?php if($errors->has('free_lesson')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('free_lesson')); ?>

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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Samir123\Desktop\xampp\htdocs\ProjectWP\resources\views/admin/lessons/create.blade.php ENDPATH**/ ?>