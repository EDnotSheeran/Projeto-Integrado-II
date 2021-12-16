<?php $__env->startSection('content'); ?>


<div class="container-fluid">
    <?php $__currentLoopData = $eventos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary text-center"><?php echo e($evento->nome); ?></h3>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-6">

                    <div>
                        <img class="img-fluid rounded mx-auto d-block px-3 px-sm-4 mt-3 mb-4" style="width: 12rem;"
                            src="<?php echo e(asset($evento->imagem)); ?>" alt="...">

                    </div>


                    <div class="card-body font-weight-bold text-center">
                        <p>Endereço: <?php echo e($evento->endereco); ?>,<?php echo e($evento->numero); ?></p>
                        <p>Local: <?php echo e($evento->local); ?></p>
                        <p>Data: <?php echo e($evento->data); ?> Hora: <?php echo e($evento->hora); ?></p>
                    </div>
                </div>


                <div class="col-6 text-center align-bottom">
                    <div class="card-body">
                        <p class="font-weight-bold"><?php echo e(__('Description')); ?></p>
                        <p><?php echo e($evento->descricao); ?></p>
                    </div>
                    <p class="font-weight-bold">Vagas Disponiveis: <?php echo e($evento->vagas_disponiveis); ?></p>
                    <a href="<?php echo e(route('login')); ?>">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            <?php echo e(__('Participate!')); ?>

                        </button>
                    </a>
                </div>
            </div>

        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/index.blade.php ENDPATH**/ ?>