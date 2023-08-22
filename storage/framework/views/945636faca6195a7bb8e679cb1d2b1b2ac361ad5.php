

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    Bitácora de Accesos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <div class="pagetitle">
        <h1>Bitácora de accesos al sistema</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Vista general</a></li>
                <li class="breadcrumb-item active">Bitacora de accesos al sistema</li>
            </ol>
        </nav>
    </div>

    <section class="section">
     
        <div class="row">
            <div class="col-12">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                      </svg>                    <div>
                        Registro de inicios de sesión en el sistema, presiona <b>Ver más detalles</b> para consultar la
                        información completa
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body mt-3 overflow-auto" style="height: 55vh !important;">
                        <?php $__currentLoopData = $bitacoras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bitacora): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $fecha_inicio = \Carbon\Carbon::parse($bitacora->fecha_entrada);
                        $fecha_fin = \Carbon\Carbon::parse($bitacora->fecha_salida);
                        $dif_fechas = $fecha_inicio->diffForHumans($fecha_fin, true, false);

                        ?>
                        <?php if(\Carbon\Carbon::parse($bitacora->fecha_salida) > \Carbon\Carbon::now()): ?>
                        <div class="card shadow-sm mt-2 pt-3" id="statusActivo">
                            <div class="card-body w-100">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-md-10 col-12">
                                        <p class="card-text">El usuario <b><?php echo e($bitacora->user_nombre); ?></b> inició una
                                            sesión desde un/una <?php echo e(lcfirst($bitacora->dispositivo)); ?> desde la IP <b><?php echo e($bitacora->direccion_ip); ?></b> </p>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <a href="#" class="btn btn-sm principal-button verDetalles"
                                            data-id="<?php echo e($bitacora->id); ?>" data-bs-toggle="modal"
                                            data-bs-target="#detallesModal">Ver más detalles</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted p-0 ps-3 pt-2 pb-2">
                                <?php echo e(\Carbon\Carbon::parse($bitacora->fecha_entrada)->diffForHumans()); ?>

                            </div>
                        </div>
                        <?php else: ?>
                        <div class="card shadow-sm mt-2 pt-3" id="statusInactivo">
                            <div class="card-body w-100">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-md-10 col-12">
                                        <p class="card-text">El usuario <b><?php echo e($bitacora->user_nombre); ?></b> tuvo una
                                            sesión desde un/una <?php echo e(lcfirst($bitacora->dispositivo)); ?> que duró <?php echo e($dif_fechas); ?> desde la IP <b><?php echo e($bitacora->direccion_ip); ?></b> </p>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <a href="#" class="btn btn-sm principal-button verDetalles"
                                            data-id="<?php echo e($bitacora->id); ?>" data-bs-toggle="modal"
                                            data-bs-target="#detallesModal">Ver más detalles</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted p-0 ps-3 pt-2 pb-2">
                                <?php echo e(\Carbon\Carbon::parse($bitacora->fecha_entrada)->diffForHumans()); ?>

                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="detallesModal" tabindex="-1" aria-labelledby="detallesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalles del acceso al sistema</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                            <use xlink:href="#info-fill" />
                        </svg>
                        <div>
                            Detalles de la sesión
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12 mb-2">
                            <b>Dirección IP</b>: <span id="ip"></span>
                        </div>
                        <div class="col-md-6 col-12 mb-2">
                            <b>Tipo de dispositivo</b>: <span id="td"></span>
                        </div>
                        <div class="col-md-6 col-12 mb-2">
                            <b>Sistema operativo</b>: <span id="so"></span>
                        </div>
                        <div class="col-md-6 col-12 mb-2">
                            <b>Navegador</b>: <span id="br"></span>
                        </div>
                        <div class="col-md-6 col-12 mb-2">
                            <b>Fecha de entrada</b>: <span id="fe"></span>
                        </div>
                        <div class="col-md-6 col-12 mb-2">
                            <b>Fecha de salida</b>: <span id="fs"></span>
                        </div>                        

                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingUs">
                                    <button id="collapseBtn" class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseUs" aria-expanded="false"
                                        aria-controls="collapseUs">
                                    </button>
                                </h2>
                                <div id="collapseUs" class="accordion-collapse collapse" aria-labelledby="headingUs"
                                    data-bs-parent="#accordionUs">
                                    <div class="accordion-body">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-md-6 col-12 mb-2 text-center">
                                                <img src="" id="imgPerfil" alt="" srcset="">
                                            </div>
                                            <div class="col-md-6 col-12 mb-2 text-center">
                                                    <div class="mb-2">
                                                    <b>Nombre</b>: <span id="no"></span>
                                                    </div>
                                                    <div class="mb-2" style="word-break: break-word;">
                                                        <b>Correo electrónico</b>: <span id="ce"></span>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    <script src="<?php echo e(asset('/js/bitacoraAcceso.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\traders\resources\views/bitacora-acceso/show.blade.php ENDPATH**/ ?>