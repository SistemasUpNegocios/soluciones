

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?> Reporte de operaciones <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="pagetitle">
    <h1>Reporte de operaciones</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Panel de control</a></li>
            <li class="breadcrumb-item active">Reporte de operaciones</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body mt-3">                    
                    <?php
                        $i = 0;
                        $hijas = DB::table("operacion_hija")
                        ->get();
                    ?>

                    <?php $__currentLoopData = $hijas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hija): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $operacionMadre = DB::table("operacion")
                            ->where("no_operacion", "=", $hija->operacion_id)
                            ->get();
                            $fechaOperacion = Carbon\Carbon::createFromDate($hija->fecha);
                            $fecha_limite = strtotime("2022-08-15 11:58:38");
                            $fecha_operacion = strtotime($fechaOperacion);
                        ?>
                        <?php if($operacionMadre->isEmpty()): ?>
                            <?php if($fecha_operacion > $fecha_limite && $hija->operacion_id > 0 && $hija->status == "abierta"): ?>
                                <?php $i++; ?>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php $__currentLoopData = $operacionMadre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $madre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($fecha_operacion > $fecha_limite): ?>
                                    <?php if($madre->status == "cerrada" && $hija->status == "abierta"): ?>                                
                                        <?php $i++; ?>                                
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if($i > 0): ?>
                        <a class="btn btn-primary mb-3" href="/admin/operacion/reportHuerfanas">Imprimir operaciones huerfanas</a>
                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </symbol>
                        </svg>
                        <div class="alert alert-danger d-flex align-items-center l-bg-bad" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                <use xlink:href="#exclamation-triangle-fill" />
                            </svg>
                            <div>
                                <span class="fw-bolder">ALERTA:</span> Hay <?php echo e($i); ?> operaciones huérfanas. Revísalas ahora
                                mismo.
                            </div>
                        </div>
                    <?php else: ?>
                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </symbol>
                        </svg>
                        <div class="alert alert-success d-flex align-items-center l-bg-good" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                                <use xlink:href="#check-circle-fill" />
                            </svg>
                            <div>
                                No hay ninguna operación huérfana
                            </div>
                        </div>
                    <?php endif; ?>
                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                            </symbol>
                        </svg>

                        <div class="alert alert-primary d-flex align-items-center l-bg-primary" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                                <use xlink:href="#info-fill" />
                            </svg>
                            <div>
                                Lista de operaciones madre
                            </div>
                        </div>
                        <table class="table table-striped table-bordered nowrap mb-5" id="operacion">
                            <thead class="text-center">
                                <tr>
                                    <th data-priority="0" scope="col"># de operación</th>
                                    <th data-priority="0" scope="col">Status</th>
                                    <th data-priority="0" scope="col">Trader</th>
                                    <th data-priority="0" scope="col">Último registro</th>
                                </tr>
                            </thead>
                            <tbody class="text-center"></tbody>
                        </table>
                        <div class="alert alert-primary d-flex align-items-center l-bg-primary mt-2" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                                <use xlink:href="#info-fill" />
                            </svg>
                            <div>
                                Lista de operaciones hija
                            </div>
                        </div>
                        <table class="table table-striped table-bordered nowrap" id="operacionHija">
                            <thead class="text-center">
                                <tr>
                                    <th data-priority="0" scope="col"># de operación</th>
                                    <th data-priority="0" scope="col">Status</th>
                                    <th data-priority="0" scope="col">Trader</th>
                                    <th data-priority="0" scope="col">Último registro</th>
                                    <th data-priority="0" scope="col">Operación madre</th>
                                </tr>
                            </thead>
                            <tbody class="text-center"></tbody>
                        </table>
                </div>
            </div>

        </div>
    </div>
</section>
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
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?php echo e(asset('/js/operacion.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\traders\resources\views/operacion/show.blade.php ENDPATH**/ ?>