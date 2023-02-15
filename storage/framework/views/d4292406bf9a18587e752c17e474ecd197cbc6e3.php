<?php $__env->startSection('content'); ?>

    <div class="title d-flex justify-content-between">
        <h3 class="page-title">Lekcija</h3>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lesson_create')): ?>
        <p >
            <a href="<?php echo e(route('admin.lessons.create')); ?>" class="btn btn-success">Dodaj novu</a>
            
        </p>
        <?php endif; ?>
   </div>

    <p class="m-0">
        <ul class="d-flex list-unstyled" style="column-gap: 1rem">
            <li><a href="<?php echo e(route('admin.lessons.index')); ?>" style="<?php echo e(request('show_deleted') == 1 ? '' : 'font-weight: 700'); ?>">Svi</a></li> |
            <li><a href="<?php echo e(route('admin.lessons.index')); ?>?show_deleted=1" style="<?php echo e(request('show_deleted') == 1 ? 'font-weight: 700' : ''); ?>">Smeće</a></li>
        </ul>
    </p>

<div class="card">
    <div class="card-header">
    Lesson
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
                            Kurs
                        </th>
                        <th>
                            Naslov
                        </th>
                        <th>
                            Pozicija
                        </th>
                        <th>
                           Besplatna lekcija
                        </th>
                        <th>
                            Objavljeno
                        </th>
                        <th>
                            Akcija
                        </th>
                    </tr>
                </thead>
                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr data-entry-id="<?php echo e($lesson->id); ?>">
                        <td>
                        </td>
                        <td>
                            <span class="badge badge-info"><?php echo e($lesson->course->title); ?></span>
                        </td>
                        <td>
                            <?php echo e($lesson->title ?? ''); ?>

                        </td>
                        <td>
                            <?php echo e($lesson->position); ?>

                        </td>
                        <td>
                            <?php echo e($lesson->free_lesson ? 'Yes' : 'No'); ?>

                        </td>
                        <td>
                            <?php echo e($lesson->published ? 'Active' : 'InActive'); ?>

                        </td>
                        <td>
                        <?php if( request('show_deleted') == 1 ): ?>
                        <form action="<?php echo e(route('admin.lessons.restore', $lesson->id)); ?>" method="POST" onsubmit="return confirm('Are you sure ?');" style="display: inline-block;">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-xs btn-info" >Povrati</button>
                        </form>
                        <form action="<?php echo e(route('admin.lessons.perma_del', $lesson->id)); ?>" method="POST" onsubmit="return confirm('Are you sure ?');" style="display: inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <button type="submit" class="btn btn-xs btn-danger" >Izbriši</button>
                        </form>
                        <?php else: ?>
                            <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.lessons.edit', $lesson->id)); ?>">
                                Izmeni
                            </a>
                            <form action="<?php echo e(route('admin.lessons.destroy', $lesson->id)); ?>" method="POST" onsubmit="return confirm('Are you sure ?');" style="display: inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('delete'); ?>
                                <button type="submit" class="btn btn-xs btn-danger" >Izbriši</button>
                            </form>
                        <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td class="text-center" colspan="12">Podaci nisu pronadjeni!</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>


    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Samir123\Desktop\xampp\htdocs\ProjectWP\resources\views/admin/lessons/index.blade.php ENDPATH**/ ?>