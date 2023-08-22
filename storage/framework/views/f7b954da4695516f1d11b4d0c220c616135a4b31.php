

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">

    <style>
        #logs td,
        #logs th {
            width: auto !important;
            white-space: normal !important;
            text-overflow: ellipsis !important;
            overflow: hidden !important;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?> Logs <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="pagetitle">
        <h1>Logs</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Panel de control</a></li>
                <li class="breadcrumb-item active">Logs</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="form-floating mb-3 me-3">
                                    <input type="datetime-local" class="form-control" id="fechaInicioInput" required>
                                    <label for="fechaInicioInput">A partir de:</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-floating mb-3 me-3">
                                    <input type="datetime-local" class="form-control" id="fechaFinInput" required>
                                    <label for="fechaFinInput">Hasta:</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <table class="table table-striped table-bordered nowrap text-center" style="width: 100%; font-size: 14px !important; vertical-align: middle !important;" id="logs">
                                <thead style="vertical-align: middle !important;">
                                    <tr>
                                        <th data-priority="0" scope="col">Fecha</th>
                                        <th data-priority="0" scope="col"># terminal</th>
                                        <th data-priority="0" scope="col"># cuenta</th>
                                        <th data-priority="0" scope="col"># robot</th>
                                        <th data-priority="0" scope="col">Clave</th>
                                        <th data-priority="0" scope="col">Mensaje</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    <script src="<?php echo e(asset('/js/logs.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\traders\resources\views/logs/show.blade.php ENDPATH**/ ?>