<?php $__env->startSection('title', 'Create account'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Create account</h1>
    <p class="muted">It takes a minute.</p>

    <?php if(session('notice')): ?><div class="flash warn"><?php echo e(session('notice')); ?></div><?php endif; ?>

    <form method="POST" action="<?php echo e(url('/register')); ?>" data-once novalidate>
        <?php echo csrf_field(); ?>
        <input type="hidden" name="_submit_token" value="<?php echo e(\App\Http\Middleware\PreventDoubleSubmit::issue()); ?>">

        <div class="field <?php echo e($errors->has('name') ? 'has-err' : ''); ?>">
            <label for="name">Full name</label>
            <input id="name" type="text" name="name" value="<?php echo e(old('name')); ?>" autocomplete="name" autofocus required>
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="err"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="field <?php echo e($errors->has('email') ? 'has-err' : ''); ?>">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" autocomplete="username" required>
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
            <input id="password" type="password" name="password" autocomplete="new-password" required>
            <p class="muted" style="font-size:.85rem;margin:.3rem 0 0">At least 8 characters, with letters and numbers.</p>
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="err"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="field">
            <label for="password_confirmation">Confirm password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" required>
        </div>

        <button type="submit" class="btn block" data-busy="Creating account…">Create account</button>
    </form>

    <p class="alt">Already registered? <a href="<?php echo e(route('login')); ?>">Log in</a></p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\LaravelProjects\School-Management\resources\views/auth/register.blade.php ENDPATH**/ ?>