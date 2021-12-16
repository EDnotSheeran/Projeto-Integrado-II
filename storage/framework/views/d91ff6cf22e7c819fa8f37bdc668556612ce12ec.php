<?php $__env->startSection('content'); ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Eventos</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>

<?php if(session()->has('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(session('success')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a class="btn btn-primary btn-icon" href="<?php echo e(route('eventos.novo')); ?>" role="button">
            <i class="fas fa-plus-circle"></i>
            Novo Evento
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Nome do Evento</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th class="text-center">Açōes</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Nome do Evento</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th class="text-center">Açōes</th>
                    </tr>
                </tfoot>
                <tbody>
                    
                    <?php $__currentLoopData = $eventos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e($evento->id); ?></td>
                            <td><?php echo e($evento->nome); ?></td>
                            <td><?php echo e(date('d/m/Y', strtotime($evento->data))); ?></td>
                            <td><?php echo e(date('h:i', strtotime($evento->hora))); ?></td>
                            <td class="text-center">
                                <a href="<?php echo e(route('eventos.editar', ['id' => $evento->id])); ?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?php echo e(route('eventos.deletar')); ?>" data-toggle="modal" data-target="#deleteModal"
                                    onclick="document.getElementById('event-id').value = <?php echo e($evento->id); ?>">
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
                 <h5 class="modal-title" id="exampleModalLabel">Tem certeza?</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">Confirme abaixo se deseja excluir este evento.</div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                 <a class="btn btn-primary"
                     aria-labelledby="navbarDropdown"
                     href="<?php echo e(route('eventos.deletar')); ?>"
                     onclick="event.preventDefault();document.getElementById('delete-form').submit();">
                     <?php echo e(__('Delete')); ?>

                 </a>
                 <form id="delete-form" action="<?php echo e(route('eventos.deletar')); ?>" method="POST" class="d-none">
                     <?php echo csrf_field(); ?>
                        <input id="event-id" type="hidden" name="id" value="">
                 </form>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ednotsheeran/Documents/Github/Projeto-Integrado-II/resources/views/eventos/list.blade.php ENDPATH**/ ?>