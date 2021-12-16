<?php $__env->startSection('title', 'Alterar Evento'); ?>

<?php $__env->startSection('content'); ?>
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
            <?php if($errors->any()): ?>
                <?php echo e(implode('', $errors->all('<div>:message</div>'))); ?>

            <?php endif; ?>
            <div class="card o-hidden border-0 shadow-lg my-5 col-xl-12">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"><?php echo e(__('My Data')); ?></h1>
                                </div>
                                
                                <form id="form-update" class="user" method="POST"
                                    action="<?php echo e(route('profile')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control form-control-user <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="name" name="name" value="<?php echo e(old('name') ?? ($user->name ?? '')); ?>"
                                            autocomplete="name" autofocus placeholder="<?php echo e(__('Name')); ?>">
                                        <?php $__errorArgs = ['name'];
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
                                    <div class="form-group row mb-0 mb-lg-3">
                                        <div class="col-sm-12 col-lg-6 mb-3 mb-lg-0">
                                            <input type="text"
                                                class="form-control form-control-user <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                id="username" name="username" placeholder="<?php echo e(__('Username')); ?>"
                                                value="<?php echo e(old('username') ?? ($user->username ?? '')); ?>"
                                                autocomplete="username" autofocus>
                                            <?php $__errorArgs = ['username'];
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
                                        <div class="col-sm-12 col-lg-6 mb-3 mb-lg-0">
                                            <input type="text"
                                                class="form-control form-control-user <?php $__errorArgs = ['cpf'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                id="cpf" name="cpf" mask="cpf"
                                                value="<?php echo e(old('cpf') ?? ($user->cpf ?? '')); ?>"
                                                placeholder="<?php echo e(__('CPF')); ?>">
                                            <?php $__errorArgs = ['cpf'];
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
                                    <div class="form-group">
                                        <input type="email"
                                            class="form-control form-control-user <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="email" name="email" value="<?php echo e(old('email') ?? ($user->email ?? '')); ?>"
                                            autocomplete="email" placeholder="<?php echo e(__('E-Mail Address')); ?>">
                                        <?php $__errorArgs = ['email'];
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
                                    <div class="form-group row">
                                        <div class="col-sm-12 col-lg-6 mb-3 mb-lg-0">
                                            <input type="password"
                                                class="form-control form-control-user <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                id="password" name="password" autocomplete="new-password"
                                                placeholder="<?php echo e(__('Password')); ?>">
                                            <?php $__errorArgs = ['password'];
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
                                        <div class="col-sm-12 col-lg-6">
                                            <input type="password" class="form-control form-control-user"
                                                id="password-confirm" name="password_confirmation"
                                                autocomplete="new-password" placeholder="<?php echo e(__('Confirm Password')); ?>">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input class="custom-control-input" type="checkbox" name="kind" id="kind"
                                                <?php echo e(old('kind') ?? isset($user->job_id) ? 'checked' : ''); ?>>

                                            <label class="custom-control-label" for="kind" style="line-height: 26px;">
                                                <?php echo e(__('City Hall employee')); ?>

                                            </label>
                                        </div>
                                    </div>
                                    <div id="additionalData">
                                        <hr>
                                        <div class="form-group row mb-0 mb-lg-3">
                                            <div class="col-sm-12 col-lg-6 mb-3 mb-lg-0">
                                                <input type="text"
                                                    class="form-control form-control-user <?php $__errorArgs = ['registration_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="registration_number" name="registration_number"
                                                    value="<?php echo e(old('registration_number') ?? ($user->registration_number ?? '')); ?>"
                                                    placeholder="<?php echo e(__('Registration')); ?>">
                                                <?php $__errorArgs = ['registration_number'];
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
                                            <div class="col-sm-12 col-lg-6 mb-3 mb-lg-0">
                                                <select
                                                    class="form-control form-control-user <?php $__errorArgs = ['job'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="job" name="job">
                                                    <option value="" disabled>
                                                        <?php echo e(__('Office')); ?></option>
                                                    <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($job->id); ?>"
                                                            <?php echo e((!isset($user->job_id) ? old('job') == $job->id : $user->job_id == $job->id) ? 'selected' : ''); ?>>
                                                            <?php echo e($job->name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php $__errorArgs = ['job'];
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
                                        <div class="form-group">
                                            <select
                                                class="form-control form-control-user <?php $__errorArgs = ['head_office'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                id="head_office" name="head_office">

                                                <option value="" disabled>
                                                    <?php echo e(__('Head Office')); ?></option>
                                                <?php $__currentLoopData = $headOffices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $headOffice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($headOffice->id); ?>"
                                                        <?php echo e((!isset($user->head_office_id) ? old('head_office') == $headOffice->id : $user->head_office_id == $headOffice->id) ? 'selected' : ''); ?>>
                                                        <?php echo e($headOffice->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['head_office'];
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
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        <?php echo e(__('Save')); ?>

                                    </button>
                                    <a href="<?php echo e(route('profile.delete')); ?>" class="btn btn-danger btn-user btn-block"
                                        data-toggle="modal" data-target="#deleteModal"
                                        onclick="event.preventDefault();document.querySelector('#deleteButton').href = this.href">
                                        <?php echo e(__('Delete profile')); ?>

                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body"><?php echo e(__('Please confirm below if you want to delete your profile.')); ?>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                        <a id="deleteButton" class="btn btn-primary" aria-labelledby="navbarDropdown" href="#">
                            <?php echo e(__('Delete')); ?>

                        </a>
                    </div>
                </div>
            </div>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ednotsheeran/Documents/Github/Projeto-Integrado-II/resources/views/users/profile.blade.php ENDPATH**/ ?>