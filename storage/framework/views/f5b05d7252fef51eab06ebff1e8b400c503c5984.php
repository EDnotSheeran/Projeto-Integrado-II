<?php $__env->startSection('title', __('HeadOffices') . ' - '); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('Jobs')); ?></h1>
    <p class="mb-4"></p>

    <?php if(session()->has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(__(session('success'))); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php if(session()->has('warning')): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php echo e(__(session('warning'))); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-primary btn-icon" href="<?php echo e(route('job.store')); ?>" role="button">
                <i class="fas fa-plus-circle"></i>
                <?php echo e(__('New Job')); ?>

            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th><?php echo e(__('Job Name')); ?></th>
                            <th><?php echo e(__('Job Description')); ?></th>
                            <th class="text-center"><?php echo e(__('Actions')); ?></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="text-center">ID</th>
                            <th><?php echo e(__('Job Name')); ?></th>
                            <th><?php echo e(__('Job Description')); ?></th>
                            <th class="text-center"><?php echo e(__('Actions')); ?></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        
                        <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-center"><?php echo e($job->id); ?></td>
                                <td><?php echo e($job->name); ?></td>
                                <td><?php echo e($job->description); ?></td>
                                <td class="text-center">
                                    <a href="<?php echo e(route('job.update', ['id' => $job->id])); ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?php echo e(route('job.delete', ['id' => $job->id])); ?>" data-toggle="modal"
                                        data-target="#deleteModal"
                                        onclick="document.querySelector('#deleteButton').href = this.href">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- delete Modal-->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Are you sure?')); ?></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">??</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo e(__('Please confirm below if you want to delete this job.')); ?></div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                        <a id="deleteButton" class="btn btn-primary" aria-labelledby="navbarDropdown" href="#">
                            <?php echo e(__('Delete')); ?>

                        </a>
                        <input id="job-id" type="hidden" name="id" value="">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="module">
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ednotsheeran/Documents/Github/Projeto-Integrado-II/resources/views/jobs/list.blade.php ENDPATH**/ ?>