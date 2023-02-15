<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
       Izmeni pitanje
    </div>

    <div class="card-body">
        <form action="<?php echo e(route('admin.questions.update', $question->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('put'); ?>
            <div class="form-group <?php echo e($errors->has('question') ? 'has-error' : ''); ?>">
                <label for="question">Pitanje*</label>
                <textarea id="question" name="question" rows="5" class="form-control" required>
                    <?php echo e(old('question', isset($question) ? $question->question : '')); ?>

                </textarea>
                <?php if($errors->has('question')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('question')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('question_image') ? 'has-error' : ''); ?>">
                <label for="question_image">Slika pitanja*</label>
                <input type="file" id="question_image" name="question_image" class="form-control" />
                <?php if($errors->has('question_image')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('question_image')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('score') ? 'has-error' : ''); ?>">
                <label for="score">Rezultat*</label>
                <input type="number" id="score" name="score" class="form-control" value="<?php echo e(old('score', isset($question) ? $question->score : '')); ?>" required />
                <?php if($errors->has('score')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('score')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('test') ? 'has-error' : ''); ?>">
                <label for="test">Test*</label>
                <select name="test[]" class="form-control" id="test" multiple >
                    <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e(in_array($id, $question->tests->pluck('id')->toArray()) ? 'selected' : null); ?>  value="<?php echo e($id); ?>"><?php echo e($test); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('test')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('test')); ?>

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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Samir123\Desktop\xampp\htdocs\ProjectWP\resources\views/admin/questions/edit.blade.php ENDPATH**/ ?>