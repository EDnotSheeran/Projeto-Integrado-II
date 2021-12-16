<?php $__env->startSection('title', __('Certificates') . ' - '); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('My Certificates')); ?></h1>
    <p class="mb-4"></p>


    <?php if(session()->has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <!-- Events -->

    <?php $__currentLoopData = $participants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $participant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card w-100">
            <div class="card-body">
                <h5 class="card-title"><?php echo e($participant->event->name); ?></h5>
                <p class="card-text text-truncate" style="max-width: 1000px;"><?php echo e($participant->event->description); ?></p>
                <a href="https://drive.google.com/file/d/1IMJNqVjEs0xag-Ze0uJ-DQe6GW9AOLqr/view" class="btn btn-primary"><i
                        class="fas fa-arrow-circle-down mr-2"></i><?php echo e(__('Certificate')); ?></a>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="module">
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ednotsheeran/Documents/Github/Projeto-Integrado-II/resources/views/certificate/index.blade.php ENDPATH**/ ?>