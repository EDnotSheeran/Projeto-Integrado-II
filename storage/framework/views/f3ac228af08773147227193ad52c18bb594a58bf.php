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
            <div class="card o-hidden border-0 shadow-lg my-5 col-xl-12">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <?php if(Request::is('*/editar')): ?>
                                        <h1 class="h4 text-gray-900 mb-4"><?php echo e(__('Edit Event')); ?></h1>
                                    <?php else: ?>
                                        <h1 class="h4 text-gray-900 mb-4"><?php echo e(__('Create Event')); ?></h1>
                                    <?php endif; ?>
                                </div>
                                
                                <?php if(Request::is('*/editar')): ?>
                                    <form id="form-update" class="user" method="POST"
                                        action="<?php echo e(route('eventos.editar', $evento->id)); ?>" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0 col-lg-5 col-xl-4">
                                                <div class="file-field">
                                                    <div class="mb-4">
                                                        <label for="imagemEvento" image-preview="Fazer Upload">
                                                            <img src="<?php echo e(asset($evento->imagem)); ?>" class="placeholder"
                                                                alt="placeholder">
                                                    </div>
                                                    </label>
                                                    <div class="file-input">
                                                        <input id="imagemEvento" name="evento[imagem]" type="file" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-3 mb-sm-0 col-lg-7 col-xl-8">
                                                <div class="col-sm-12 mb-3" tooltip="<?php echo e(__('Name')); ?>">
                                                    <input type="text"
                                                        class="form-control form-control-user <?php $__errorArgs = ['evento.nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        id="nomeEvento" name="evento[nome]" required
                                                        value="<?php echo e($evento->nome); ?>" placeholder="<?php echo e(__('Name')); ?>">
                                                    <?php $__errorArgs = ['evento.nome'];
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
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="date"
                                                            class="form-control form-control-user <?php $__errorArgs = ['evento.data'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            id="eventoData" name="evento[data]" required
                                                            value="<?php echo e($evento->data); ?>" tooltip="<?php echo e(__('Date')); ?>">
                                                        <?php $__errorArgs = ['evento.data'];
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
                                                    <div class="col-sm-6 mb-3">
                                                        <input type="time"
                                                            class="form-control form-control-user <?php $__errorArgs = ['evento.hora'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            id="hora" name="evento[hora]" required
                                                            value="<?php echo e($evento->hora); ?>" tooltip="<?php echo e(__('Hour')); ?>">
                                                        <?php $__errorArgs = ['evento.hora'];
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
                                                        class="form-control form-control-user <?php $__errorArgs = ['evento.nome_palestrante'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        id="nome_palestranteEvento" name="evento[nome_palestrante]" required
                                                        value="<?php echo e($evento->nome_palestrante); ?>"
                                                        placeholder="<?php echo e(__('Speaker Name')); ?>">
                                                    <?php $__errorArgs = ['evento.nome_palestrante'];
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
                                                            class="form-control form-control-user <?php $__errorArgs = ['evento.vagas_disponiveis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            id="vagas_disponiveis" name="evento[vagas_disponiveis]" required
                                                            value="<?php echo e($evento->vagas_disponiveis); ?>"
                                                            placeholder="<?php echo e(__('Available Vacancies')); ?>">
                                                        <?php $__errorArgs = ['evento.vagas_disponiveis'];
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
                                                    <div class="col-sm-6 mb-3">
                                                        <input type="time"
                                                            class="form-control form-control-user <?php $__errorArgs = ['evento.duracao'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            id="duracao" name="evento[duracao]" required
                                                            value="<?php echo e($evento->duracao); ?>"
                                                            tooltip="<?php echo e(__('End Date')); ?>">
                                                        <?php $__errorArgs = ['evento.duracao'];
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
                                                    <h4 class="card-title">Certificado do Evento</h4>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12 mb-3 mb-sm-0 col-lg-5 col-xl-4">
                                                            <div class="file-field">
                                                                <div class="mb-4">
                                                                    <label for="imagemCertificado"
                                                                        image-preview="Fazer Upload">
                                                                        <img src="<?php echo e(asset($certificado->imagem)); ?>"
                                                                            class="placeholder" alt="placeholder">
                                                                </div>
                                                                </label>
                                                                <div class="d-none">
                                                                    <input id="imagemCertificado" name="certificado[imagem]"
                                                                        type="file">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 mb-3 mb-sm-0 col-lg-7 col-xl-8">
                                                            <div class="col-sm-12 mb-3"
                                                                tooltip="<?php echo e(__('Certificate Name')); ?>">
                                                                <input type="text"
                                                                    class="form-control form-control-user <?php $__errorArgs = ['certificado.nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                    id="nomeCertificado" name="certificado[nome]" required
                                                                    value="<?php echo e($certificado->nome); ?>"
                                                                    placeholder="<?php echo e(__('Certificate Name')); ?>">
                                                                <?php $__errorArgs = ['certificado.nome'];
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
                                                                    class="form-control form-control-user <?php $__errorArgs = ['certificado.texto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                    id="textoCertificado" name="certificado[texto]" required
                                                                    rows="8"
                                                                    placeholder="<?php echo e(__('Certificate Text')); ?>"><?php echo e($certificado->texto); ?></textarea>
                                                                <?php $__errorArgs = ['certificado.texto'];
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
                                                        class="form-control form-control-user <?php $__errorArgs = ['evento.descricao'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        id="descricaoEvento" name="evento[descricao]" required rows="8"
                                                        placeholder="<?php echo e(__('Event Description')); ?>"><?php echo e($evento->descricao); ?></textarea>
                                                    <?php $__errorArgs = ['evento.descricao'];
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
                                                <div class="col-sm-12 mb-3 col-md-4" tooltip="<?php echo e(__('cep')); ?>">
                                                    <input type="text"
                                                        class="form-control form-control-user <?php $__errorArgs = ['evento.cep'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        id="cepEvento" name="evento[cep]" required
                                                        value="<?php echo e($evento->cep); ?>" placeholder="<?php echo e(__('cep')); ?>">
                                                    <?php $__errorArgs = ['evento.cep'];
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

                                                <div class="col-sm-12 mb-3 col-md-2" tooltip="<?php echo e(__('uf')); ?>">
                                                    <input type="text"
                                                        class="form-control form-control-user <?php $__errorArgs = ['evento.uf'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        id="ufEvento" name="evento[uf]" required
                                                        value="<?php echo e($evento->uf); ?>" placeholder="<?php echo e(__('uf')); ?>"
                                                        readonly>
                                                    <?php $__errorArgs = ['evento.uf'];
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

                                                <div class="col-sm-12 mb-3 col-md-6" tooltip="<?php echo e(__('cidade')); ?>">
                                                    <input type="text"
                                                        class="form-control form-control-user <?php $__errorArgs = ['evento.cidade'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        id="cidadeEvento" name="evento[cidade]" required
                                                        value="<?php echo e($evento->cidade); ?>" placeholder="<?php echo e(__('cidade')); ?>"
                                                        readonly>
                                                    <?php $__errorArgs = ['evento.cidade'];
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
                                                        class="form-control form-control-user <?php $__errorArgs = ['evento.endereco'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        id="enderecoEvento" name="evento[endereco]" required
                                                        value="<?php echo e($evento->endereco); ?>"
                                                        placeholder="<?php echo e(__('Address')); ?>" readonly>
                                                    <?php $__errorArgs = ['evento.endereco'];
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
                                                <div class="col-sm-12 mb-3 col-md-2" tooltip="<?php echo e(__('numero')); ?>">
                                                    <input type="text"
                                                        class="form-control form-control-user <?php $__errorArgs = ['evento.numero'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        id="numeroEvento" name="evento[numero]" required
                                                        value="<?php echo e($evento->numero); ?>"
                                                        placeholder="<?php echo e(__('numero')); ?>">
                                                    <?php $__errorArgs = ['evento.numero'];
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
                                                        class="form-control form-control-user <?php $__errorArgs = ['evento.bairro'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        id="bairroEvento" name="evento[bairro]" required
                                                        value="<?php echo e($evento->bairro); ?>"
                                                        placeholder="<?php echo e(__('District')); ?>" readonly>
                                                    <?php $__errorArgs = ['evento.bairro'];
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
                                                        class="form-control form-control-user <?php $__errorArgs = ['evento.local'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        id="localEvento" name="evento[local]" required
                                                        value="<?php echo e($evento->local); ?>" placeholder="<?php echo e(__('Local')); ?>">
                                                    <?php $__errorArgs = ['evento.local'];
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
                                                        class="form-control form-control-user <?php $__errorArgs = ['evento.status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        id="statusEvento" name="evento[status]" required>
                                                        <option value="" disabled selected><?php echo e(__('Event Status')); ?>

                                                        </option>
                                                        <option value="1" <?php echo e($evento->status == '1' ? 'selected' : ''); ?>>
                                                            Ativo</option>
                                                        <option value="0" <?php echo e($evento->status == '' ? 'selected' : ''); ?>>
                                                            Desativado</option>
                                                    </select>
                                                    <?php $__errorArgs = ['evento.status'];
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
                                                        class="form-control form-control-user <?php $__errorArgs = ['evento.metodo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        id="metodoEvento" name="evento[metodo]" required>
                                                        <option value="" disabled selected><?php echo e(__('Method')); ?></option>
                                                        <option value="1" <?php echo e($evento->metodo == '1' ? 'selected' : ''); ?>>
                                                            Ativo</option>
                                                        <option value="0" <?php echo e($evento->metodo == '' ? 'selected' : ''); ?>>
                                                            Desativado</option>
                                                    </select>
                                                    <?php $__errorArgs = ['evento.metodo'];
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
                                <?php else: ?>
                                    
                                    <form class="user" method="POST" action="<?php echo e(route('eventos.novo')); ?>"
                                        enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0 col-lg-5 col-xl-4">
                                                <div class="file-field">
                                                    <div class="mb-4">
                                                        <label for="imagemEvento" image-preview="Fazer Upload">
                                                            <img src="<?php echo e(asset('img/placeholder.png')); ?>"
                                                                class="placeholder" alt="placeholder">
                                                    </div>
                                                    </label>
                                                    <div class="file-input">
                                                        <input id="imagemEvento" name="evento[imagem]" type="file" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-3 mb-sm-0 col-lg-7 col-xl-8">
                                                <div class="col-sm-12 mb-3" tooltip="<?php echo e(__('Name')); ?>">
                                                    <input type="text"
                                                        class="form-control form-control-user <?php $__errorArgs = ['evento.nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        id="nomeEvento" name="evento[nome]" required
                                                        value="<?php echo e(old('evento.nome')); ?>"
                                                        placeholder="<?php echo e(__('Name')); ?>">
                                                    <?php $__errorArgs = ['evento.nome'];
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
                                                    <div class="col-sm-6 mb-3 mb-sm-0" tooltip="<?php echo e(__('Date')); ?>">
                                                        <input type="date"
                                                            class="form-control form-control-user <?php $__errorArgs = ['evento.data'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            id="eventoData" name="evento[data]" required
                                                            value="<?php echo e(old('evento.data')); ?>"
                                                            placeholder="<?php echo e(__('Date')); ?>">
                                                        <?php $__errorArgs = ['evento.data'];
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
                                                    <div class="col-sm-6 mb-3" tooltip="<?php echo e(__('Hour')); ?>">
                                                        <input type="time"
                                                            class="form-control form-control-user <?php $__errorArgs = ['evento.hora'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            id="hora" name="evento[hora]" required
                                                            value="<?php echo e(old('evento.hora')); ?>"
                                                            placeholder="<?php echo e(__('Hour')); ?>">
                                                        <?php $__errorArgs = ['evento.hora'];
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
                                                        class="form-control form-control-user <?php $__errorArgs = ['evento.nome_palestrante'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        id="nome_palestranteEvento" name="evento[nome_palestrante]" required
                                                        value="<?php echo e(old('evento.nome_palestrante')); ?>"
                                                        placeholder="<?php echo e(__('Speaker Name')); ?>">
                                                    <?php $__errorArgs = ['evento.nome_palestrante'];
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
                                                            class="form-control form-control-user <?php $__errorArgs = ['evento.vagas_disponiveis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            id="vagas_disponiveis" name="evento[vagas_disponiveis]" required
                                                            value="<?php echo e(old('evento.vagas_disponiveis')); ?>"
                                                            placeholder="<?php echo e(__('Available Vacancies')); ?>">
                                                        <?php $__errorArgs = ['evento.vagas_disponiveis'];
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
                                                    <div class="col-sm-6 mb-3" tooltip="<?php echo e(__('End Date')); ?>">
                                                        <input type="time"
                                                            class="form-control form-control-user <?php $__errorArgs = ['evento.duracao'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            id="duracao" name="evento[duracao]" required
                                                            value="<?php echo e(old('evento.duracao')); ?>"
                                                            placeholder="<?php echo e(__('End Date')); ?>">
                                                        <?php $__errorArgs = ['evento.duracao'];
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
                                                    <h4 class="card-title">Certificado do Evento</h4>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12 mb-3 mb-sm-0 col-lg-5 col-xl-4">
                                                            <div class="file-field">
                                                                <div class="mb-4">
                                                                    <label for="imagemCertificado"
                                                                        image-preview="Fazer Upload">
                                                                        <img src="<?php echo e(asset('img/placeholder.png')); ?>"
                                                                            class="placeholder" alt="placeholder">
                                                                </div>
                                                                </label>
                                                                <div class="d-none">
                                                                    <input id="imagemCertificado" name="certificado[imagem]"
                                                                        type="file">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 mb-3 mb-sm-0 col-lg-7 col-xl-8">
                                                            <div class="col-sm-12 mb-3"
                                                                tooltip="<?php echo e(__('Certificate Name')); ?>">
                                                                <input type="text"
                                                                    class="form-control form-control-user <?php $__errorArgs = ['certificado.nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                    id="nomeCertificado" name="certificado[nome]" required
                                                                    value="<?php echo e(old('certificado.nome')); ?>"
                                                                    placeholder="<?php echo e(__('Certificate Name')); ?>">
                                                                <?php $__errorArgs = ['certificado.nome'];
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
                                                                    class="form-control form-control-user <?php $__errorArgs = ['certificado.texto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                    id="textoCertificado" name="certificado[texto]" required
                                                                    rows="8"
                                                                    placeholder="<?php echo e(__('Certificate Text')); ?>"><?php echo e(old('certificado.texto')); ?></textarea>
                                                                <?php $__errorArgs = ['certificado.texto'];
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
                                                        class="form-control form-control-user <?php $__errorArgs = ['evento.descricao'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        id="descricaoEvento" name="evento[descricao]" required rows="8"
                                                        placeholder="<?php echo e(__('Event Description')); ?>"><?php echo e(old('evento.descricao')); ?></textarea>
                                                    <?php $__errorArgs = ['evento.descricao'];
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
                                                <div class="form-group row col-12 mx-auto">
                                                    <div class="col-sm-12 mb-3 col-md-4" tooltip="<?php echo e(__('CEP')); ?>">
                                                        <input type="text"
                                                            class="form-control form-control-user <?php $__errorArgs = ['evento.cep'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            id="cepEvento" name="evento[cep]" required
                                                            value="<?php echo e(old('evento.cep')); ?>"
                                                            placeholder="<?php echo e(__('CEP')); ?>">
                                                        <?php $__errorArgs = ['evento.cep'];
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
                                                            class="form-control form-control-user <?php $__errorArgs = ['evento.cep'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            id="ufEvento" name="evento[uf]" required
                                                            value="<?php echo e(old('evento.uf')); ?>"
                                                            placeholder="<?php echo e(__('UF')); ?>" readonly>
                                                        <?php $__errorArgs = ['evento.uf'];
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


                                                    <div class="col-sm-12 mb-3 col-md-6" tooltip="<?php echo e(__('Cidade')); ?>">
                                                        <input type="text"
                                                            class="form-control form-control-user <?php $__errorArgs = ['evento.cidade'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            id="cidadeEvento" name="evento[cidade]" required
                                                            value="<?php echo e(old('evento.cidade')); ?>"
                                                            placeholder="<?php echo e(__('Cidade')); ?>" readonly>
                                                        <?php $__errorArgs = ['evento.cidade'];
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
                                                    <div class="col-sm-12 mb-3 col-md-10"
                                                        tooltip="<?php echo e(__('Address')); ?>">
                                                        <input type="text"
                                                            class="form-control form-control-user <?php $__errorArgs = ['evento.endereco'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            id="enderecoEvento" name="evento[endereco]" required
                                                            value="<?php echo e(old('evento.endereco')); ?>"
                                                            placeholder="<?php echo e(__('Address')); ?>" readonly>
                                                        <?php $__errorArgs = ['evento.endereco'];
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
                                                            class="form-control form-control-user <?php $__errorArgs = ['evento.numero'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            id="numeroEvento" name="evento[numero]" required
                                                            value="<?php echo e(old('evento.numero')); ?>"
                                                            placeholder="<?php echo e(__('Number')); ?>">
                                                        <?php $__errorArgs = ['evento.numero'];
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
                                                    <div class="col-sm-12 mb-3 col-md-6"
                                                        tooltip="<?php echo e(__('District')); ?>">
                                                        <input type="text"
                                                            class="form-control form-control-user <?php $__errorArgs = ['evento.bairro'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            id="bairroEvento" name="evento[bairro]" required
                                                            value="<?php echo e(old('evento.bairro')); ?>"
                                                            placeholder="<?php echo e(__('District')); ?>" readonly>
                                                        <?php $__errorArgs = ['evento.bairro'];
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


                                                    <div class="col-sm-12 mb-3 col-md-6"
                                                        tooltip="<?php echo e(__('Complemento')); ?>">
                                                        <input type="text"
                                                            class="form-control form-control-user <?php $__errorArgs = ['evento.local'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            id="localEvento" name="evento[local]" required
                                                            value="<?php echo e(old('evento.local')); ?>"
                                                            placeholder="<?php echo e(__('Complemento')); ?>">
                                                        <?php $__errorArgs = ['evento.local'];
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
                                                    <div class="col-sm-12 mb-3 col-md-6"
                                                        tooltip="<?php echo e(__('Event Status')); ?>">
                                                        <select
                                                            class="form-control form-control-user <?php $__errorArgs = ['evento.status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            id="statusEvento" name="evento[status]" required>
                                                            <option value="" disabled selected><?php echo e(__('Event Status')); ?>

                                                            </option>
                                                            <option value="1"
                                                                <?php echo e(old('evento.status') == 'true' ? 'selected' : ''); ?>>
                                                                Ativo</option>
                                                            <option value="0"
                                                                <?php echo e(old('evento.status') == 'false' ? 'selected' : ''); ?>>
                                                                Desativado</option>
                                                        </select>
                                                        <?php $__errorArgs = ['evento.status'];
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
                                                            class="form-control form-control-user <?php $__errorArgs = ['evento.metodo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            id="metodoEvento" name="evento[metodo]" required>
                                                            <option value="" disabled selected><?php echo e(__('Method')); ?>

                                                            </option>
                                                            <option value="1"
                                                                <?php echo e(old('evento.metodo') == 'true' ? 'selected' : ''); ?>>
                                                                Ativo</option>
                                                            <option value="0"
                                                                <?php echo e(old('evento.metodo') == 'false' ? 'selected' : ''); ?>>
                                                                Desativado</option>
                                                        </select>
                                                        <?php $__errorArgs = ['evento.metodo'];
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
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/jquery-3.6.0.js')); ?>"></script>
    <script src="<?php echo e(asset('js/plugins/jquery.mask.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/eventos/eventos.js')); ?>"></script>
    <script type="module">
        ((ids) => {
            ids.forEach(id => {
                let elemento = document.getElementById(id);
                elemento.addEventListener('change', function() {
                    const input = this;
                    const img = document.querySelector('label[for=' + id + '] img');
                    previewImagem(input, img)
                });
            });

        })(['imagemEvento', 'imagemCertificado'])

        function previewImagem(input, img) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    img.setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/eventos/form.blade.php ENDPATH**/ ?>