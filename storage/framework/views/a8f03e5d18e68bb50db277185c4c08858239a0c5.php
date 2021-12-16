<?php $__env->startSection('content'); ?>
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

    
    <div class="container-fluid">
        <div class="ml-4 mb-4">
        </div>
        <br>
        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card shadow mb-4 mx-auto" style="max-width: 1300px">
                <div class="card-body" style="padding: 30px 60px 0px;">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div>
                                <img class="img-fluid rounded mx-auto d-block px-3 px-sm-4 mt-3 mb-4"
                                    style="width: 100%; max-width: 450px;" src="<?php echo e(asset($event->image_url)); ?>" alt="...">
                            </div>
                            <h3 class="m-0 font-weight-bold text-primary text-center"><?php echo e($event->name); ?></h3>
                            <div class="card-body px-5">
                                <div class="d-flex align-items-center">
                                    <p style="font-size: 18px">
                                        <span class="m-0 mr-2 text-uppercase"><?php echo e(__('Address')); ?>: </span>
                                        <span class="m-0">
                                            <?php echo e(' R. ' . $event->address->street . ', ' . $event->address->number . ' ' . $event->address->district . ' - ' . $event->address->state); ?>

                                        </span>
                                    </p>
                                </div>
                                <?php if(isset($event->address->complement)): ?>
                                    <div class="d-flex align-items-center">
                                        <p style="font-size: 18px">
                                            <span class="m-0 mr-2 text-uppercase">
                                                <?php echo e(__('Local')); ?>:
                                            </span>
                                            <span class="m-0">
                                                <?php echo e($event->address->complement); ?>

                                            </span>
                                        </p>
                                    </div>
                                <?php endif; ?>
                                <div class="d-flex align-items-center">
                                    <p style="font-size: 18px">
                                        <span class="m-0 mr-2 text-uppercase"><?php echo e(__('Date and Time')); ?>: </span>
                                        <span class="m-0">
                                            <?php echo e($event->date . ' às ' . $event->time); ?>

                                        </span>
                                    </p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <p style="font-size: 18px">
                                        <span class="m-0 mr-2 text-uppercase"><?php echo e(__('Duration')); ?>: </span>
                                        <span class="m-0">
                                            <?php echo e($event->duration); ?>

                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 text-center align-bottom row"
                            style="display: flex;flex-direction: column;padding: 40px 0;">
                            <div class="card-body">
                                <p style="font-size: 22px"><?php echo e($event->description); ?></p>
                            </div>
                            <div class="mt-auto ">
                                <h4 class="font-weight-bold pb-3">
                                    <strong><?php echo e(__('Available Vacancies')); ?></strong>:
                                    <?php echo e($event->allAvailableVacancies); ?>

                                </h4>
                                <?php if(!Auth::user()): ?>
                                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary btn-user btn-block p-2">
                                        <h3 style="margin: 0"><?php echo e(__('Participate!')); ?></h3>
                                    </a>
                                <?php else: ?>
                                    <?php if($event->isUserParticipating): ?>
                                        <a href=<?php echo e(route('events.unsubscribe', $event->id)); ?> data-toggle="modal"
                                            onclick="unsubscribe(&quot;<?php echo e($event->id); ?>&quot;, &quot;<?php echo e($event->name); ?>&quot;)"
                                            data-target="#unsubscribeModal" class="btn btn-secondary btn-user btn-block p-2">
                                            <h3 style="margin: 0"><?php echo e(__('Registered')); ?></h3>
                                        </a>
                                    <?php else: ?>
                                        <a href=<?php echo e(route('events.participate', $event->id)); ?> data-toggle="modal"
                                            onclick="participate(&quot;<?php echo e($event->id); ?>&quot;, &quot;<?php echo e($event->name); ?>&quot;, &quot;<?php echo e($event->date); ?>&quot;, &quot;<?php echo e($event->start_time); ?>&quot;, &quot;<?php echo e($event->address->fullAddress); ?>&quot;,&quot;<?php echo e($event->local); ?>&quot;)"
                                            data-target="#participateModal" class="btn btn-primary btn-user btn-block p-2">
                                            <h3 style="margin: 0"><?php echo e(__('Participate!')); ?></h3>
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if($events->total() == 0): ?>
            <br><br><br><br><br><br><br><br>
            <div class="ml-4 mb-4 text-center mt-4">
                <i class="fas fa-search mb-2" style="font-size: 40px;color: aliceblue"></i>
                <h5 style="color: aliceblue"><?php echo e(__('No events available.')); ?></h5>
            </div>
        <?php endif; ?>


        <?php if($events->lastPage() > 1): ?>
            <nav class="d-flex" aria-label="Page navigation example">
                <ul class="pagination mx-auto" style="border: 1px solid #fff">
                    <li class="page-item"><a class="page-link"
                            href="<?php echo e($events->previousPageUrl()); ?>"><?php echo e(__('Previous')); ?></a>
                    </li>
                    <?php for($i = 1; $i <= $page_count; $i++): ?>
                        <li class="page-item <?php echo e($page == $i ? 'active' : ''); ?>"><a class="page-link"
                                href="<?php echo e($events->url($i)); ?>"><?php echo e($i); ?></a></li>
                    <?php endfor; ?>
                    <li class="page-item"><a class="page-link"
                            href="<?php echo e($events->nextPageUrl()); ?>"><?php echo e(__('Next')); ?></a>
                    </li>
                </ul>
            </nav>
        <?php endif; ?>
        
        <div class="modal" id="participateModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Confirmation')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="participateForm" action="<?php echo e(route('events.participate', 'id')); ?>"></form>
                        <p>
                            Você confirma sua inscrição no evento <strong id="event-name">EVENTO 01</strong>,
                                    que acontecerá no dia <span id="event-date">27/10/2021</span> às <span
                                        id="event-time">19:00</span> no
                                    endereço <span id="event-adress">Rua 01, s/n - Indaiá</span> <span
                                        id="event-local-all">no local <span id="event-local">Prédio Azul?</span></span>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                        <button type="button" onclick="document.querySelector('#participateForm').submit()"
                            class="btn btn-primary"><?php echo e(__('Confirm')); ?></button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal" id="unsubscribeModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Confirmation')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="unsubscribeForm" action="<?php echo e(route('events.unsubscribe', 'id')); ?>"></form>
                        <p>
                            Você quer cancelar sua inscricao no evento <strong id="event-name2">EVENTO 01</strong>?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                        <button type="button" onclick="document.querySelector('#unsubscribeForm').submit()"
                            class="btn btn-primary"><?php echo e(__('Confirm')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        function participate(id, name, date, time, address, local) {
            document.querySelector('#participateForm').action = document.querySelector('#participateForm').action.replace(
                /eventos\/.+\/participar/, `eventos/${id}/participar`);
            document.querySelector('#event-name').innerHTML = name;
            document.querySelector('#event-date').innerHTML = date;
            document.querySelector('#event-time').innerHTML = time;
            document.querySelector('#event-adress').innerHTML = address;
            if (local) {
                document.querySelector('#event-local').innerHTML = local;
            } else {
                document.querySelector('#event-local-all').style.display = 'none';
            }
        }

        function unsubscribe(id, name) {
            document.querySelector('#unsubscribeForm').action = document.querySelector('#unsubscribeForm').action.replace(
                /eventos\/.+\/desinscrever/, `eventos/${id}/desinscrever`);
            document.querySelector('#event-name2').innerHTML = name;
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(Auth::user() ? 'layouts.admin' : 'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ednotsheeran/Documents/Github/Projeto-Integrado-II/resources/views/home.blade.php ENDPATH**/ ?>