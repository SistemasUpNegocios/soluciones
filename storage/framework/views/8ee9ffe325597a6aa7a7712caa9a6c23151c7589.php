

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?> Traders <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="pagetitle">
    <h1>Traders</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Panel de control</a></li>
            <li class="breadcrumb-item active">Traders</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <a class="btn principal-button mb-3 new me-1" data-bs-toggle="modal" data-bs-target="#formModal"> <i class="bi-plus-lg me-1"> </i>Añadir un nuevo trader</a>
                <div class="card-body mt-3" id="contBotones">
                    <?php $__currentLoopData = $traders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trader): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            if ($trader->modificable == "activado"){
                                $clase_modificable = "btn-primary";
                                $icono_modificable = "bi bi-unlock-fill";
                                $disabled = "";
                            }else{
                                $clase_modificable = "btn-warning";
                                $icono_modificable = "bi bi-lock-fill";
                                $disabled = "disabled";
                            }

                            if ($trader->activado == "activado"){
                                $clase_activado = "btn-success";
                                $icono_activado = "bi bi-check-lg";
                            }else{
                                $clase_activado = "btn-danger";
                                $icono_activado = "bi bi-x-lg";
                            }

                            if ($trader->sl == "activado"){
                                $clase_sl = "btn-success";
                                $icono_sl = "bi bi-check-lg";
                            }else{
                                $clase_sl = "btn-danger";
                                $icono_sl = "bi bi-x-lg";
                            }

                            if ($trader->tp == "activado"){
                                $clase_tp = "btn-success";
                                $icono_tp = "bi bi-check-lg";
                            }else{
                                $clase_tp = "btn-danger";
                                $icono_tp = "bi bi-x-lg";
                            }
                        ?>

                        <div class="row">
                            <div class="pagetitle d-flex align-items-center">
                                <h1><?php echo e($trader->nombre); ?></h1>
                                <div class="ms-5">
                                    <?php if($trader->cleo == true): ?>                                        
                                        <button class="btn btn-success">Cleo vivo <i class="bi bi-emoji-smile"></i></button>
                                    <?php else: ?>
                                        <button class="btn btn-danger">Cleo apagado <i class="bi bi-emoji-frown"></i></button>                                        
                                    <?php endif; ?>
                                </div>
                            </div>
                            <hr class="m-0 p-0 mb-2">
                        </div>
                        <div class="row mb-5">
                            <div class="col-3 text-center">
                                <div class="mb-1">Modificable</div>
                                <button class="btn <?php echo e($clase_modificable); ?> editarStatusMod" style="width: 33%;" data-id="<?php echo e($trader->id); ?>">
                                    <i class="<?php echo e($icono_modificable); ?>"></i>
                                </button>
                            </div>
                            <div class="col-3 text-center">
                                <div class="mb-1">Activado</div>
                                <button class="btn <?php echo e($clase_activado); ?> editarStatusAct" style="width: 33%;" data-id="<?php echo e($trader->id); ?>" <?php echo e($disabled); ?>>
                                    <i class="<?php echo e($icono_activado); ?>"></i>
                                </button>
                            </div>
                            <div class="col-3 text-center">
                                <div class="mb-1">SL</div>
                                <button class="btn <?php echo e($clase_sl); ?> editarStatusSL" style="width: 33%;" data-id="<?php echo e($trader->id); ?>" <?php echo e($disabled); ?>>
                                    <i class="<?php echo e($icono_sl); ?>"></i>
                                </button>
                            </div>
                            <div class="col-3 text-center">
                                <div class="mb-1">TP</div>
                                <button class="btn <?php echo e($clase_tp); ?> editarStatusTP" style="width: 33%;" data-id="<?php echo e($trader->id); ?>" <?php echo e($disabled); ?>>
                                    <i class="<?php echo e($icono_tp); ?>"></i>
                                </button>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Añadir trader</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="traderForm" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" id="idInput">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" placeholder="Ingresa el número de trader" id="numeroInput" name="numero" required>
                                <label for="numeroInput">Número de trader</label>
                            </div>
                        </div>
                    </div>
                    <div id="alertMessage"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="btnCancel" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn principal-button" id="btnSubmit">Añadir trader</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('preloader'); ?>
<div id="loader" class="loader">
    <h1></h1>
    <span></span>
    <span></span>
    <span></span>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<footer id="footer" class="footer">
    <div class="copyright" id="copyright">
    </div>
    <div class="credits">
        Todos los derechos reservados
    </div>
</footer>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?php echo e(asset('/js/traders.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\traders\resources\views/traders/show.blade.php ENDPATH**/ ?>