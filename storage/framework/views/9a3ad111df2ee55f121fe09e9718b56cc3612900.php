<?php $__env->startSection('title', 'Alterar Evento'); ?>

<?php $__env->startSection('content'); ?>

    <?php if($errors->any()): ?>
        <?php echo e(implode('', $errors->all('<div>:message</div>'))); ?>

    <?php endif; ?>
    <div class="container ">
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
            <div class="card o-hidden border-0 shadow-lg my-5 col-xl-12">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <?php if(isset($event)): ?>
                                        <h1 class="h4 text-gray-900 mb-4"><?php echo e(__('Edit Event')); ?></h1>
                                    <?php else: ?>
                                        <h1 class="h4 text-gray-900 mb-4"><?php echo e(__('Create Event')); ?></h1>
                                    <?php endif; ?>
                                </div>
                                <!-- Form -->
                                <form id="form-update" class="user" method="POST"
                                    action="<?php echo e(isset($event) ? route('events.update', $event->id) : route('events.store')); ?>"
                                    enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0 col-xl-4">
                                            <div class="file-field">
                                                <div class="mb-4">
                                                    <label for="eventImage" image-preview="Fazer Upload"
                                                        style="width: 100%;">
                                                        <img src="<?php echo e(isset($event) ? asset($event->image_url) : asset('img/placeholder.png')); ?>"
                                                            class="placeholder" alt="placeholder">
                                                    </label>
                                                </div>
                                                <div class="file-input">
                                                    <input id="eventImage" name="eventimage" type="file">
                                                </div>
                                            </div>
                                            <?php $__errorArgs = ['eventimage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert"
                                                    style="display: block; text-align:center;">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-sm-12 mb-3 mb-sm-0 col-xl-7">
                                            <div class="col-sm-12 mb-3" tooltip="<?php echo e(__('Event Name')); ?>">
                                                <input type="text"
                                                    class="form-control form-control-user <?php $__errorArgs = ['event.name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    name="event[name]"
                                                    value="<?php echo e(old('event.name') ?? ($event->name ?? '')); ?>"
                                                    placeholder="<?php echo e(__('Event Name')); ?>">
                                                <?php $__errorArgs = ['event.name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="row px-3 mb-3">
                                                <div class="col-sm-12 col-lg-6 mb-3 mg-lg-0"
                                                    tooltip="<?php echo e(__('Event Date')); ?>">
                                                    <input type="text"
                                                        class="form-control form-control-user <?php $__errorArgs = ['event.date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        name="event[date]" mask="date"
                                                        value="<?php echo e(old('event.date') ?? ($event->date ?? '')); ?>"
                                                        placeholder="<?php echo e(__('Event Date')); ?>">
                                                    <?php $__errorArgs = ['event.date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="col-sm-12 col-lg-6" tooltip="<?php echo e(__('Event Start Time')); ?>">
                                                    <input type="text"
                                                        class="form-control form-control-user <?php $__errorArgs = ['event.time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        name="event[time]" mask="time"
                                                        value="<?php echo e(old('event.time') ?? ($event->time ?? '')); ?>"
                                                        placeholder="<?php echo e(__('Event Start Time')); ?>">
                                                    <?php $__errorArgs = ['event.time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-3" tooltip="<?php echo e(__('Speaker Name')); ?>">
                                                <input type="text"
                                                    class="form-control form-control-user <?php $__errorArgs = ['event.speaker_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    name="event[speaker_name]"
                                                    value="<?php echo e(old('event.speaker_name') ?? ($event->speaker_name ?? '')); ?>"
                                                    placeholder="<?php echo e(__('Speaker Name')); ?>">
                                                <?php $__errorArgs = ['event.speaker_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="row mx-1">
                                                <div class="col-sm-6 mb-3 mb-sm-0"
                                                    tooltip="<?php echo e(__('Available Vacancies')); ?>">
                                                    <input type="number"
                                                        class="form-control form-control-user <?php $__errorArgs = ['event.available_vacancies'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        name="event[available_vacancies]"
                                                        value="<?php echo e(old('event.available_vacancies') ?? ($event->available_vacancies ?? '')); ?>"
                                                        placeholder="<?php echo e(__('Available Vacancies')); ?>">
                                                    <?php $__errorArgs = ['event.available_vacancies'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="col-sm-6 mb-3" tooltip="<?php echo e(__('Duration')); ?>">
                                                    <input type="text"
                                                        class="form-control form-control-user <?php $__errorArgs = ['event.duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        name="event[duration]" mask="time"
                                                        value="<?php echo e(old('event.duration') ?? ($event->duration ?? '')); ?>"
                                                        placeholder="<?php echo e(__('Duration')); ?>">
                                                    <?php $__errorArgs = ['event.duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card text-center col-12 mb-4" style="--bs-bg-opacity: .5;">
                                            <div class="card-body">
                                                <h4 class="card-title mb-4"><?php echo e(__('Event Certificate')); ?></h4>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0 col-xl-5">
                                                        <div class="file-field">
                                                            <div class="mb-4">
                                                                <label for="certificationImage" style="width: 100%;"
                                                                    image-preview="<?php echo e(__('Upload Image')); ?>">
                                                                    <img src="<?php echo e(isset($event) ? asset($event->certification->image_url) : asset('img/placeholder.png')); ?>"
                                                                        class="placeholder" alt="placeholder">
                                                                </label>
                                                            </div>
                                                            <div class="d-none">
                                                                <input id="certificationImage" name="certificationimage"
                                                                    type="file">
                                                            </div>
                                                        </div>
                                                        <?php $__errorArgs = ['certificationimage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-feedback" role="alert"
                                                                style="display: block; text-align: center;">
                                                                <strong><?php echo e($message); ?></strong>
                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="col-sm-12 mb-3 mb-sm-0 col-xl-7">
                                                        <div class="col-sm-12 mb-3"
                                                            tooltip="<?php echo e(__('Certificate Name')); ?>">
                                                            <input type="text"
                                                                class="form-control form-control-user <?php $__errorArgs = ['event.certification.title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                name="event[certification][title]"
                                                                value="<?php echo e(old('event.certification.title') ?? ($event->certification->title ?? '')); ?>"
                                                                placeholder="<?php echo e(__('Certificate Name')); ?>">
                                                            <?php $__errorArgs = ['event.certification.title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong><?php echo e($message); ?></strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        <div class="col-sm-12 mb-3"
                                                            tooltip="<?php echo e(__('Certificate Text')); ?>">
                                                            <textarea
                                                                class="form-control form-control-user <?php $__errorArgs = ['event.certification.content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                name="event[certification][content]" rows="8"
                                                                placeholder="<?php echo e(__('Certificate Text')); ?>"><?php echo e(old('event.certification.content') ?? ($event->certification->content ?? '')); ?></textarea>
                                                            <?php $__errorArgs = ['event.certification.content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong><?php echo e($message); ?></strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row col-12 mx-auto">
                                            <div class="col-sm-12 mb-3" tooltip="<?php echo e(__('Event Description')); ?>">
                                                <textarea
                                                    class="form-control form-control-user <?php $__errorArgs = ['event.description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    name="event[description]" rows="8"
                                                    placeholder="<?php echo e(__('Event Description')); ?>"><?php echo e(old('event.description') ?? ($event->description ?? '')); ?></textarea>
                                                <?php $__errorArgs = ['event.description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row col-12 mx-auto">
                                            <div class="col-sm-12 mb-3 col-md-4" tooltip="<?php echo e(__('CEP')); ?>">
                                                <input type="text"
                                                    class="form-control form-control-user <?php $__errorArgs = ['event.address.zipcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    name="event[address][zipcode]" data-address="zipcode"
                                                    value="<?php echo e(old('event.address.zipcode') ?? ($event->address->zipcode ?? '')); ?>"
                                                    placeholder="<?php echo e(__('CEP')); ?>">
                                                <?php $__errorArgs = ['event.address.zipcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            <div class="col-sm-12 mb-3 col-md-2" tooltip="<?php echo e(__('UF')); ?>">
                                                <input type="text"
                                                    class="form-control form-control-user <?php $__errorArgs = ['event.address.state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    name="event[address][state]" data-address="state"
                                                    value="<?php echo e(old('event.address.state') ?? ($event->address->state ?? '')); ?>"
                                                    placeholder="<?php echo e(__('UF')); ?>" readonly>
                                                <?php $__errorArgs = ['event.address.state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            <div class="col-sm-12 mb-3 col-md-6" tooltip="<?php echo e(__('City')); ?>">
                                                <input type="text"
                                                    class="form-control form-control-user <?php $__errorArgs = ['event.address.city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    name="event[address][city]" data-address="city"
                                                    value="<?php echo e(old('event.address.city') ?? ($event->address->city ?? '')); ?>"
                                                    placeholder="<?php echo e(__('City')); ?>" readonly>
                                                <?php $__errorArgs = ['event.address.city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>


                                        <div class="form-group row col-12 mx-auto">
                                            <div class="col-sm-12 mb-3 col-md-10" tooltip="<?php echo e(__('Address')); ?>">
                                                <input type="text"
                                                    class="form-control form-control-user <?php $__errorArgs = ['event.address.street'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    name="event[address][street]" data-address="street"
                                                    value="<?php echo e(old('event.address.street') ?? ($event->address->street ?? '')); ?>"
                                                    placeholder="<?php echo e(__('Address')); ?>" readonly>
                                                <?php $__errorArgs = ['event.address.street'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="col-sm-12 mb-3 col-md-2" tooltip="<?php echo e(__('Number')); ?>">
                                                <input type="text"
                                                    class="form-control form-control-user <?php $__errorArgs = ['event.address.number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    name="event[address][number]"
                                                    value="<?php echo e(old('event.address.number') ?? ($event->address->number ?? '')); ?>"
                                                    placeholder="<?php echo e(__('Number')); ?>">
                                                <?php $__errorArgs = ['event.address.number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row col-12 mx-auto">
                                            <div class="col-sm-12 mb-3 col-md-6" tooltip="<?php echo e(__('District')); ?>">
                                                <input type="text"
                                                    class="form-control form-control-user <?php $__errorArgs = ['event.address.district'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    name="event[address][district]" data-address="district"
                                                    value="<?php echo e(old('event.address.district') ?? ($event->address->district ?? '')); ?>"
                                                    placeholder="<?php echo e(__('District')); ?>" readonly>
                                                <?php $__errorArgs = ['event.address.district'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="col-sm-12 mb-3 col-md-6" tooltip="<?php echo e(__('Local')); ?>">
                                                <input type="text"
                                                    class="form-control form-control-user <?php $__errorArgs = ['event.address.complement'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    name="event[address][complement]"
                                                    value="<?php echo e(old('event.address.complement') ?? ($event->address->complement ?? '')); ?>"
                                                    placeholder="<?php echo e(__('Local')); ?>">
                                                <?php $__errorArgs = ['event.address.complement'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row col-12 mx-auto">
                                            <div class="col-sm-12 mb-3 col-md-6" tooltip="<?php echo e(__('Event Status')); ?>">
                                                <select
                                                    class="form-control form-control-user <?php $__errorArgs = ['event.status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    name="event[status]">
                                                    <option value="" disabled selected><?php echo e(__('Event Status')); ?>

                                                    </option>
                                                    <?php if(isset($event)): ?>
                                                        <option value="1" <?php echo e($event->status == '1' ? 'selected' : ''); ?>>
                                                            <?php echo e(__('Active')); ?>

                                                        </option>
                                                        <option value="0" <?php echo e($event->status == '0' ? 'selected' : ''); ?>>
                                                            <?php echo e(__('Inactive')); ?>

                                                        </option>
                                                    <?php else: ?>
                                                        <option value="1"
                                                            <?php echo e(old('event.status') == '1' ? 'selected' : ''); ?>>
                                                            <?php echo e(__('Active')); ?>

                                                        </option>
                                                        <option value="0"
                                                            <?php echo e(old('event.status') == '0' ? 'selected' : ''); ?>>
                                                            <?php echo e(__('Inactive')); ?>

                                                        </option>
                                                    <?php endif; ?>
                                                </select>
                                                <?php $__errorArgs = ['event.status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="col-sm-12 mb-3 col-md-6" tooltip="<?php echo e(__('Method')); ?>">
                                                <select
                                                    class="form-control form-control-user <?php $__errorArgs = ['event.method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    name="event[method]">
                                                    <option value="" disabled selected><?php echo e(__('Method')); ?></option>
                                                    <?php if(isset($event)): ?>
                                                        <option value="1" <?php echo e($event->method == '1' ? 'selected' : ''); ?>>
                                                            <?php echo e(__('Check-in')); ?>

                                                        </option>
                                                        <option value="0" <?php echo e($event->method == '0' ? 'selected' : ''); ?>>
                                                            <?php echo e(__('Check-in and Check-out')); ?>

                                                        </option>
                                                    <?php else: ?>
                                                        <option value="1"
                                                            <?php echo e(old('event.method') == '1' ? 'selected' : ''); ?>>
                                                            <?php echo e(__('Check-in')); ?>

                                                        </option>
                                                        <option value="0"
                                                            <?php echo e(old('event.method') == '0' ? 'selected' : ''); ?>>
                                                            <?php echo e(__('Check-in and Check-out')); ?>

                                                        </option>
                                                    <?php endif; ?>
                                                </select>
                                                <?php $__errorArgs = ['event.method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        <?php echo e(__('Save')); ?>

                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ednotsheeran/Documents/Github/Projeto-Integrado-II/resources/views/events/form.blade.php ENDPATH**/ ?>