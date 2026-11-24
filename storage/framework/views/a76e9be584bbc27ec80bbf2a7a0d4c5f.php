<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('body'); ?>
<div class="wrap">
    <?php if(session('status')): ?><div class="flash ok"><?php echo e(session('status')); ?></div><?php endif; ?>
    <?php if(session('notice')): ?><div class="flash warn"><?php echo e(session('notice')); ?></div><?php endif; ?>

    <div class="head">
        <div>
            <h1>Dashboard</h1>
            <p class="muted" style="margin:0">Welcome back, <?php echo e(auth()->user()->name); ?>.</p>
        </div>
        <a href="<?php echo e(route('students.create')); ?>" class="btn">Add student</a>
    </div>

    <div class="stats">
        <div class="stat"><b><?php echo e($studentCount); ?></b>Students</div>
        <div class="stat"><b><?php echo e($courseCount); ?></b>Courses</div>
        <div class="stat"><b><?php echo e($subjectCount); ?></b>Subjects</div>
    </div>

    <div class="panel">
        <h2>Students</h2>
        <?php if($students->isEmpty()): ?>
            <div class="empty">
                <p class="muted">No students yet.</p>
                <a href="<?php echo e(route('students.create')); ?>" class="btn">Add the first student</a>
            </div>
        <?php else: ?>
            <table>
                <thead>
                    <tr><th>Name</th><th>Email</th><th>Phone</th><th>Subjects</th><th>Courses</th><th></th></tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($student->name); ?></td>
                        <td><?php echo e($student->email); ?></td>
                        <td><?php echo e($student->profile?->phone ?? '-'); ?></td>
                        <td><?php echo e($student->subjects_count); ?></td>
                        <td><?php echo e($student->courses_count); ?></td>
                        <td><a href="<?php echo e(route('students.show', $student)); ?>">Open</a></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\LaravelProjects\School-Management\resources\views/dashboard.blade.php ENDPATH**/ ?>