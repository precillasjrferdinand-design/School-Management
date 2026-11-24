<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title'); ?> · </title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>
<body class="bg-ncc">
<main class="auth">
    <span class="brand-big"></span>
    <div class="panel">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</main>
<?php echo $__env->make('layouts.once-script', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>
</html>
<?php /**PATH C:\LaravelProjects\School-Management\resources\views/layouts/guest.blade.php ENDPATH**/ ?>