

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?> Traders Data <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="pagetitle">
        <h1>Traders Data</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Panel de control</a></li>
                <li class="breadcrumb-item active">Traders Data</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-4 col-12">
                                <div class="form-floating mb-3 me-3">
                                    <input type="datetime-local" class="form-control" id="fechaDesdeInput" required>
                                    <label for="fechaDesdeInput">A partir de:</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-floating mb-3 me-3">
                                    <input type="datetime-local" class="form-control" id="fechaHastaInput" required>
                                    <label for="fechaHastaInput">Hasta:</label>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <button class="btn btn-primary mb-3" id="obtenerRegistros">Generar información</button>
                            </div>
                        </div>
                        <div id="contTable" style="overflow-x: auto;"></div>
                        <!--<div class="col-12 mt-5">-->
                        <!--    <div id="chartdiv"></div>-->
                        <!--</div>-->
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

    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="<?php echo e(asset('/js/estudio_data.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\traders\resources\views/estudio_data/show.blade.php ENDPATH**/ ?>