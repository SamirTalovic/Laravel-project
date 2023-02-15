<?php $__env->startSection('content'); ?>

   <div class="title d-flex justify-content-between">
        <h3 class="page-title">Course</h3>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('course_create')): ?>
        <p >
            <a href="<?php echo e(route('admin.courses.create')); ?>" class="btn btn-success">Add New</a>
            
        </p>
        <?php endif; ?>
   </div>

    <p class="m-0">
        <ul class="d-flex list-unstyled" style="column-gap: 1rem">
            <li><a href="<?php echo e(route('admin.courses.index')); ?>" style="<?php echo e(request('show_deleted') == 1 ? '' : 'font-weight: 700'); ?>">All</a></li> |
            <li><a href="<?php echo e(route('admin.courses.index')); ?>?show_deleted=1" style="<?php echo e(request('show_deleted') == 1 ? 'font-weight: 700' : ''); ?>">Trash</a></li>
        </ul>
    </p>
    
    <div class="card">
        <div class="card-header">
            Course
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-Location">
                    <thead>
                        <tr>
                            <th width="10">
                                #
                            </th>
                            <?php if(auth()->user()->isAdmin()): ?>
                            <th>
                                Teacher Name
                            </th>
                            <?php endif; ?>
                            <th>
                                Title
                            </th>
                            <th>
                                Slug
                            </th>
                            <th>
                                Description
                            </th>
                            <th>
                                Price
                            </th>
                            <th>
                                Course Image
                            </th>
                            <th>
                                Start Date
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
                    <?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr data-entry-id="<?php echo e($course->id); ?>">
                            <td>

                            </td>
                            <?php if(auth()->user()->isAdmin()): ?>
                            <td>
                                <?php $__currentLoopData = $course->teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $singleTeachers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="badge badge-info"><?php echo e($singleTeachers->name); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <?php endif; ?>
                            <td>
                                <?php echo e($course->title ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($course->slug ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($course->description ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($course->price ?? ''); ?>

                            </td>
                            <td>
                                <img width="150" src="<?php echo e(Storage::url($course->course_image)); ?>" alt="<?php echo e($course->course_image); ?>">
                            </td>
                            <td>
                                <?php echo e($course->start_date); ?>

                            </td>
                            <td>
                                <?php echo e($course->published); ?>

                            </td>
                            <td>
                                <?php if( request('show_deleted') == 1 ): ?>
                                    <form action="<?php echo e(route('admin.courses.restore', $course->id)); ?>" method="POST" onsubmit="return confirm('Are you sure ?');" style="display: inline-block;">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-xs btn-info" >Restore</button>
                                    </form>
                                    <form action="<?php echo e(route('admin.courses.perma_del', $course->id)); ?>" method="POST" onsubmit="return confirm('Are you sure ?');" style="display: inline-block;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('delete'); ?>
                                    <button type="submit" class="btn btn-xs btn-danger" >Delete</button>
                                    </form>
                                <?php else: ?> 
                                    <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.courses.edit', $course->id)); ?>">
                                        Edit
                                    </a>
                                    <form action="<?php echo e(route('admin.courses.destroy', $course->id)); ?>" method="POST" onsubmit="return confirm('Are you sure ?');" style="display: inline-block;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('delete'); ?>
                                        <button type="submit" class="btn btn-xs btn-danger" >Delete</button>
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td class="text-center" colspan="10">Not found !</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>


        </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Samir123\Desktop\xampp\htdocs\course-LMS-main\resources\views/admin/courses/index.blade.php ENDPATH**/ ?>