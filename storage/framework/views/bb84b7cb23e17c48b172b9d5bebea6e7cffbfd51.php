<?php $__env->startSection('content'); ?>

    <div class="title d-flex justify-content-between">
        <h3 class="page-title">Opcije za pitanje</h3>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('questions_option_create')): ?>
        <p >
            <a href="<?php echo e(route('admin.question_options.create')); ?>" class="btn btn-success">Dodaj novu</a>
            
        </p>
        <?php endif; ?>
   </div>

    <p class="m-0">
        <ul class="d-flex list-unstyled" style="column-gap: 1rem">
            <li><a href="<?php echo e(route('admin.question_options.index')); ?>" style="<?php echo e(request('show_deleted') == 1 ? '' : 'font-weight: 700'); ?>">All</a></li> |
            <li><a href="<?php echo e(route('admin.question_options.index')); ?>?show_deleted=1" style="<?php echo e(request('show_deleted') == 1 ? 'font-weight: 700' : ''); ?>">Trash</a></li>
        </ul>
    </p>

<div class="card">
    <div class="card-header">
Opcije za pitanje    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Location">
                <thead>
                    <tr>
                        <th width="10">
                            #
                        </th>
                        <th>
                            Pitanje
                        </th>
                        <th>
                            Opcija za pitanje
                        </th>
                        <th>
                            Tačno
                        </th>
                        <th>
                            Akcija
                        </th>
                    </tr>
                </thead>
                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $question_options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question_option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr data-entry-id="<?php echo e($question_option->id); ?>">
                        <td>
                        </td>
                        <td><?php echo e($question_option->question->question ?? ''); ?></td>
                        <td><?php echo $question_option->option_text; ?></td>
                        <td><?php echo e($question_option->correct == 1 ? 'true' : 'false'); ?></td>
                        <td>
                        <?php if( request('show_deleted') == 1 ): ?>
                        <form action="<?php echo e(route('admin.question_options.restore', $question_option->id)); ?>" method="POST" onsubmit="return confirm('Are you sure ?');" style="display: inline-block;">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-xs btn-info" >Povrati</button>
                        </form>
                        <form action="<?php echo e(route('admin.question_options.perma_del', $question_option->id)); ?>" method="POST" onsubmit="return confirm('Are you sure ?');" style="display: inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <button type="submit" class="btn btn-xs btn-danger" >Izbriši</button>
                        </form>
                        <?php else: ?>
                            <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.question_options.edit', $question_option->id)); ?>">
                                Izmeni
                            </a>
                            <form action="<?php echo e(route('admin.question_options.destroy', $question_option->id)); ?>" method="POST" onsubmit="return confirm('Are you sure ?');" style="display: inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('delete'); ?>
                                <button type="submit" class="btn btn-xs btn-danger" >Izbriši</button>
                            </form>
                        <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td class="text-center" colspan="12">Podatak nije pronadjen!</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>


    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Samir123\Desktop\xampp\htdocs\ProjectWP\resources\views/admin/question_options/index.blade.php ENDPATH**/ ?>