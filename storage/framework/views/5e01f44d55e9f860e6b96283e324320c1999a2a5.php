<?php $__env->startSection('content'); ?>

    <div class="title d-flex justify-content-between">
        <h3 class="page-title">Question</h3>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('question_create')): ?>
        <p >
            <a href="<?php echo e(route('admin.questions.create')); ?>" class="btn btn-success">Add New</a>
            
        </p>
        <?php endif; ?>
   </div>

    <p class="m-0">
        <ul class="d-flex list-unstyled" style="column-gap: 1rem">
            <li><a href="<?php echo e(route('admin.questions.index')); ?>" style="<?php echo e(request('show_deleted') == 1 ? '' : 'font-weight: 700'); ?>">All</a></li> |
            <li><a href="<?php echo e(route('admin.questions.index')); ?>?show_deleted=1" style="<?php echo e(request('show_deleted') == 1 ? 'font-weight: 700' : ''); ?>">Trash</a></li>
        </ul>
    </p>

<div class="card">
    <div class="card-header">
    Question
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Location">
                <thead>
                    <tr>
                        <th width="10">
                            #
                        </th>
                        <th>
                            Question
                        </th>
                        <th>
                            Question Image
                        </th>
                        <th>
                            Score
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr data-entry-id="<?php echo e($question->id); ?>">
                        <td>
                        </td>
                        <td>
                            <?php echo e($question->question); ?>

                        </td>
                        <td>
                        <?php if($question->question_image): ?><a href="<?php echo e(Storage::url($question->question_image)); ?>" target="_blank"><img src="<?php echo e(Storage::url($question->question_image)); ?>"/></a><?php endif; ?>
                        </td>
                        <td>
                            <?php echo e($question->score); ?>

                        </td>
                        <td>
                        <?php if( request('show_deleted') == 1 ): ?>
                        <form action="<?php echo e(route('admin.questions.restore', $question->id)); ?>" method="POST" onsubmit="return confirm('Are you sure ?');" style="display: inline-block;">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-xs btn-info" >Restore</button>
                        </form>
                        <form action="<?php echo e(route('admin.questions.perma_del', $question->id)); ?>" method="POST" onsubmit="return confirm('Are you sure ?');" style="display: inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <button type="submit" class="btn btn-xs btn-danger" >Delete</button>
                        </form>
                        <?php else: ?>
                            <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.questions.edit', $question->id)); ?>">
                                Edit
                            </a>
                            <form action="<?php echo e(route('admin.questions.destroy', $question->id)); ?>" method="POST" onsubmit="return confirm('Are you sure ?');" style="display: inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('delete'); ?>
                                <button type="submit" class="btn btn-xs btn-danger" >Delete</button>
                            </form>
                        <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td class="text-center" colspan="12">Data Not Found!</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>


    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Samir123\Desktop\xampp\htdocs\course-LMS-main\resources\views/admin/questions/index.blade.php ENDPATH**/ ?>