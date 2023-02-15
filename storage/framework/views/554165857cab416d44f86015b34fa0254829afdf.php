<?php $__env->startSection('content'); ?>

    <div class="title d-flex justify-content-between">
        <h3 class="page-title">Test</h3>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('test_create')): ?>
        <p >
            <a href="<?php echo e(route('admin.tests.create')); ?>" class="btn btn-success">Add New</a>
            
        </p>
        <?php endif; ?>
   </div>

    <p class="m-0">
        <ul class="d-flex list-unstyled" style="column-gap: 1rem">
            <li><a href="<?php echo e(route('admin.tests.index')); ?>" style="<?php echo e(request('show_deleted') == 1 ? '' : 'font-weight: 700'); ?>">All</a></li> |
            <li><a href="<?php echo e(route('admin.tests.index')); ?>?show_deleted=1" style="<?php echo e(request('show_deleted') == 1 ? 'font-weight: 700' : ''); ?>">Trash</a></li>
        </ul>
    </p>

<div class="card">
    <div class="card-header">
    Test
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
                            Course
                        </th>
                        <th>
                            Lesson
                        </th>
                        <th>
                            Title
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Published
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr data-entry-id="<?php echo e($test->id); ?>">
                        <td>
                        </td>
                        <td><?php echo e($test->course->title ?? ''); ?></td>
                        <td><?php echo e($test->lesson->title ?? ''); ?></td>
                        <td><?php echo e($test->title); ?></td>
                        <td><?php echo $test->description; ?></td>
                        <td><?php echo e($test->published ? 'Active' : 'InActive'); ?></td>
                        <td>
                        <?php if( request('show_deleted') == 1 ): ?>
                        <form action="<?php echo e(route('admin.tests.restore', $test->id)); ?>" method="POST" onsubmit="return confirm('Are you sure ?');" style="display: inline-block;">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-xs btn-info" >Restore</button>
                        </form>
                        <form action="<?php echo e(route('admin.tests.perma_del', $test->id)); ?>" method="POST" onsubmit="return confirm('Are you sure ?');" style="display: inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <button type="submit" class="btn btn-xs btn-danger" >Delete</button>
                        </form>
                        <?php else: ?>
                            <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.tests.edit', $test->id)); ?>">
                                Edit
                            </a>
                            <form action="<?php echo e(route('admin.tests.destroy', $test->id)); ?>" method="POST" onsubmit="return confirm('Are you sure ?');" style="display: inline-block;">
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Samir123\Desktop\xampp\htdocs\course-LMS-main\resources\views/admin/tests/index.blade.php ENDPATH**/ ?>