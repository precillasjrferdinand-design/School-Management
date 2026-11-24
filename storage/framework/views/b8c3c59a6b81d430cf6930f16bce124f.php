<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title', 'Student Records'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>
<body class="bg-dash">
<?php if(auth()->guard()->check()): ?>
    <header class="topbar">
        <div class="topbar-in">
            <a href="<?php echo e(route('dashboard')); ?>" class="brand">Student Records</a>
            <a href="<?php echo e(route('dashboard')); ?>" class="nav">Dashboard</a>
            <a href="<?php echo e(route('students.create')); ?>" class="nav">Add student</a>
            <span class="muted"><?php echo e(auth()->user()->name); ?></span>
            <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline">
                <?php echo csrf_field(); ?>
                <button class="btn ghost small">Log out</button>
            </form>
        </div>
    </header>
<?php endif; ?>

<?php echo $__env->yieldContent('body'); ?>

<?php echo $__env->make('layouts.once-script', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>
</html>
<?php /**PATH C:\LaravelProjects\School-Management\resources\views/layouts/app.blade.php ENDPATH**/ ?>