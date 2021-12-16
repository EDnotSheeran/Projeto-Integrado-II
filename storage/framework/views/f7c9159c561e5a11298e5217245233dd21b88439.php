<?php $__env->startSection('title', 'Alterar Evento'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container ">
        <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('My Agenda')); ?></h1>
        <p class="mb-4"></p>
        <?php if(session()->has('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('success')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <?php if(session()->has('warning')): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?php echo e(session('warning')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <?php $__currentLoopData = $event_participants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card w-100 mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($item->event->name); ?></h5>
                        <p class="card-text"><?php echo e(__('Situation')); ?>:
                            <?php if(!$item->checked_in_at): ?>
                                <span class="badge badge-warning"><?php echo e(__('Registered')); ?></span>
                            <?php else: ?>
                                <span class="badge badge-success"><?php echo e(__('Concluido')); ?></span>
                            <?php endif; ?>
                        </p>
                        <div class="collapse" id="collapseItem-<?php echo e($item->id); ?>">
                            <div class="card card-body">
                                <div class="row justify-content-between">
                                    <img src="<?php echo e($item->event->image_url); ?>" style="width: 400px" alt="event image">
                                    <div class="list-group" style="flex: 1">
                                        <a href="#"
                                            class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">ENDEREÇO:</h5>
                                            </div>
                                            <p class="mb-1"><?php echo e($item->event->address->fullAddress); ?></p>
                                        </a>
                                        <?php if(isset($item->event->address->local)): ?>
                                            <a href="#"
                                                class="list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1">LOCAL:</h5>
                                                </div>
                                                <p class="mb-1"><?php echo e($item->event->address->local); ?></p>
                                            </a>
                                        <?php endif; ?>
                                        <a href="#"
                                            class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">DATA E HORA:</h5>
                                            </div>
                                            <p class="mb-1"><?php echo e($item->event->date); ?> às
                                                <?php echo e($item->event->start_time); ?></p>
                                        </a>
                                        <a href="#"
                                            class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">PALESTRANTE:</h5>
                                            </div>
                                            <p class="mb-1"><?php echo e($item->event->speaker_name); ?></p>
                                        </a>
                                        <a href="#"
                                            class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">VAGAS DISPONÍVEIS:</h5>
                                            </div>
                                            <p class="mb-1">
                                                <?php echo e($item->event->allAvailableVacancies); ?>

                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button data-toggle="collapse" data-target="#collapseItem-<?php echo e($item->id); ?>"
                            aria-expanded="false" aria-controls="collapseItem-<?php echo e($item->id); ?>"
                            class="btn btn-primary"><?php echo e(__('See more...')); ?></button>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if(count($event_participants) == 0): ?>
                <br><br><br><br><br><br><br><br>
                <div class="ml-4 mb-4 text-center mt-4">
                    <i class="fas fa-search mb-2" style="font-size: 40px;color: #71ACBF"></i>
                    <h5 style="color: #71ACBF"><?php echo e(__('No events available.')); ?></h5>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="module">
        const $ = window.$;
        $().ready(function() {
            $('#job').find('option[selected="selected"]').each(function() {
                $(this).prop('selected', true);
            });
            $('#head_office').find('option[selected="selected"]').each(function() {
                $(this).prop('selected', true);
            });
            $('#registration_number').val($('#registration_number').attr('value'))
        });

        function toogleAdditionalData({
            animate
        } = {
            animate: true
        }) {
            const fields = [$('#registration_number'), $('#job'), $('#head_office')];

            if (kind.checked) {
                clearFields(fields);
                animate && $('#additionalData').addClass('animate-grow');
                animate && $('#additionalData').removeClass('animate-shrink');
                $('#additionalData').show();
            } else {
                clearFields(fields);
                animate && $('#additionalData').removeClass('animate-grow');
                animate && $('#additionalData').addClass('animate-shrink');
                animate && $('#additionalData').one("animationend", function() {
                    $(this).hide();
                });
                !animate && $('#additionalData').hide();
            }
        }

        function clearFields(fields) {
            fields.map(field => {
                field.val('');
            });
        }

        let kind = document.querySelector('#kind');

        if (kind) {
            toogleAdditionalData({
                animate: false
            });
            kind.addEventListener('change', function() {
                toogleAdditionalData();
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ednotsheeran/Documents/Github/Projeto-Integrado-II/resources/views/users/agenda.blade.php ENDPATH**/ ?>