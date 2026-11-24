<?php $__env->startSection('title', 'Add student'); ?>

<?php $__env->startSection('body'); ?>
<div class="wrap" style="max-width:720px">
    <div class="head"><div><h1>Add student</h1><p class="muted" style="margin:0">Basic details, profile and subjects.</p></div></div>

    <?php if(session('notice')): ?><div class="flash warn"><?php echo e(session('notice')); ?></div><?php endif; ?>

    <form method="POST" action="<?php echo e(route('students.store')); ?>" class="panel" data-once novalidate>
        <?php echo csrf_field(); ?>
        <input type="hidden" name="_submit_token" value="<?php echo e(\App\Http\Middleware\PreventDoubleSubmit::issue()); ?>">

        <div class="row">
            <div class="field <?php echo e($errors->has('name') ? 'has-err' : ''); ?>">
                <label for="name">Full name</label>
                <input id="name" type="text" name="name" value="<?php echo e(old('name')); ?>" autofocus required>
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
                <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="err"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <div class="row">
            <div class="field <?php echo e($errors->has('address') ? 'has-err' : ''); ?>">
                <label for="address">Address</label>
                <input id="address" type="text" name="address" value="<?php echo e(old('address')); ?>">
                <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="err"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="field <?php echo e($errors->has('phone') ? 'has-err' : ''); ?>">
                <label for="phone">Phone</label>
                <input id="phone" type="tel" name="phone" value="<?php echo e(old('phone')); ?>">
                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="err"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <div class="field">
            <label>Subjects</label>
            <div class="checks">
                <?php $__empty_1 = true; $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <label class="check">
                        <input type="checkbox" name="subjects[]" value="<?php echo e($subject->id); ?>"
                            <?php if(in_array($subject->id, old('subjects', []))): echo 'checked'; endif; ?>>
                        <?php echo e($subject->name); ?>

                    </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="muted">No subjects found. Run <code>php artisan db:seed</code>.</p>
                <?php endif; ?>
            </div>
        </div>

        <button type="submit" class="btn" data-busy="Saving…">Save student</button>
        <a href="<?php echo e(route('dashboard')); ?>" class="btn ghost">Cancel</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\LaravelProjects\School-Management\resources\views/students/create.blade.php ENDPATH**/ ?>