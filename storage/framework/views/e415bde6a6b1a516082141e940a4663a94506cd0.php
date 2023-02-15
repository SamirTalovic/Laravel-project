<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        Edit User
    </div>

    <div class="card-body">
        <form action="<?php echo e(route('admin.users.update', $user->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('put'); ?>
            <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                <label for="name">name*</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo e(old('name', isset($user) ? $user->name : '')); ?>" required>
                <?php if($errors->has('name')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('name')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                <label for="email">email*</label>
                <input type="text" id="email" name="email" class="form-control" value="<?php echo e(old('email', isset($user) ? $user->email : '')); ?>" required>
                <?php if($errors->has('email')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('email')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                <label for="password">password*</label>
                <input type="text" id="password" name="password" class="form-control" value="<?php echo e(old('password', isset($user) ? $user->password : '')); ?>" required>
                <?php if($errors->has('password')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('password')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e($errors->has('role') ? 'has-error' : ''); ?>">
                <label for="role">Role*</label>
                <select name="role[]" class="form-control" id="role" multiple >
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e(in_array($id, $user->role->pluck('id')->toArray()) ? 'selected' : null); ?> value="<?php echo e($id); ?>"><?php echo e($role); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('role')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('role')); ?>

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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Samir123\Desktop\xampp\htdocs\course-LMS-main\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>