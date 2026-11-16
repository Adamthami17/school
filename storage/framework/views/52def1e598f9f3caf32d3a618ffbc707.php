<?php $__env->startSection('content'); ?>

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<h3> Add Student </h3>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" action="<?php echo e(route('students.store')); ?>" enctype="multipart/form-data">
<?php echo csrf_field(); ?>

<div class="form-group">
    <label for="name">Name: </label>
    <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" />
</div>

<div class="form-group">
    <label for="email">Email: </label>
    <input type="text" class="form-control" name="email" value="<?php echo e(old('email')); ?>" />
</div>

<div class="form-group">
    <label for="phone">Phone: </label>
    <input type="text" class="form-control" name="phone" value="<?php echo e(old('phone')); ?>" />
</div>

<div class="form-group">
    <label for="section">Section: </label>
    <input type="text" class="form-control" name="section" value="<?php echo e(old('section')); ?>" />
</div>

<div class="form-group">
    <label for="image">Image: </label>
    <input type="file" class="form-control" name="image" />
</div>

<button type="submit" class="btn btn-primary"> Add Student </button>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Projet\School\resources\views/create.blade.php ENDPATH**/ ?>