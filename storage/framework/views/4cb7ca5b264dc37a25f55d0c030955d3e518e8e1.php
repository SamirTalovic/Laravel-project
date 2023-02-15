<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        Kreiraj pitanje
    </div>

    <div class="card-body">
        <form action="<?php echo e(route('admin.questions.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
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
                        <option value="<?php echo e($id); ?>"><?php echo e($test); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('test')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('test')); ?>

                    </em>
                <?php endif; ?>
            </div>

            <?php for($question=1; $question<=4; $question++): ?>
            <div class="card card-footer">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12 col-12 form-group <?php echo e($errors->has('option_text') ? 'has-error' : ''); ?>">
                            <label for="option_text">Text opcije*</label>
                            <textarea id="option_text" name="<?php echo e('option_text_'. $question); ?>" rows="5" style="width: 100%;" class="form-control" required>
                                <?php echo e(old('question', isset($question) ? "" : null)); ?>

                            </textarea>
                                <?php if($errors->has('option_text_'. $question)): ?>
                                    <em class="invalid-feedback">
                                        <?php echo e($errors->first('option_text_'. $question)); ?>

                                    </em>
                                <?php endif; ?>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                        <label for="option_text">Tačno*</label>
                        <input type="checkbox" name="<?php echo e('correct_' . $question); ?>">
                            <p class="help-block"></p>
                            <?php if($errors->has('correct_' . $question)): ?>
                                <p class="help-block">
                                    <?php echo e($errors->first('correct_' . $question)); ?>

                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endfor; ?>
           
            <div>
                <button class="btn btn-danger" type="submit" >Sačuvaj</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Samir123\Desktop\xampp\htdocs\ProjectWP\resources\views/admin/questions/create.blade.php ENDPATH**/ ?>