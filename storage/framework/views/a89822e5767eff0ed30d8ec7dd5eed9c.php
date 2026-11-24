<?php $__env->startSection('title', 'Log in'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Log in</h1>
    <p class="muted">Use your account to open the records.</p>

    <?php if(session('notice')): ?><div class="flash warn"><?php echo e(session('notice')); ?></div><?php endif; ?>

    <form method="POST" action="<?php echo e(url('/login')); ?>" data-once novalidate>
        <?php echo csrf_field(); ?>

        <div class="field <?php echo e($errors->has('email') ? 'has-err' : ''); ?>">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" autocomplete="username" autofocus required>
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="err"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="field <?php echo e($errors->has('password') ? 'has-err' : ''); ?>">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" autocomplete="current-password" required>
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="err"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <label class="check"><input type="checkbox" name="remember"> Keep me logged in</label>

        <button type="submit" class="btn block" data-busy="Logging in…" style="margin-top:.75rem">Log in</button>
    </form>

    <p class="alt">No account yet? <a href="<?php echo e(route('register')); ?>">Create one</a></p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\LaravelProjects\School-Management\resources\views/auth/login.blade.php ENDPATH**/ ?>