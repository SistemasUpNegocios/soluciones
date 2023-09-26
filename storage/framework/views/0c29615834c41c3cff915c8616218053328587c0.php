

<?php $__env->startSection('css'); ?>
    <link href="https://canvasjs.com/assets/css/jquery-ui.1.11.2.min.css" rel="stylesheet" />

    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
            max-width: 100%
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    Gráfica Portafolios
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="pagetitle">
        <h1>Gráfica Portafolios</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Panel de control</a></li>
                <li class="breadcrumb-item active">Gráfica Portafolios</li>
            </ol>
        </nav>
    </div>


    <section class="section dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card pb-0">
                    <div class="card-body" style="padding-top: 20px;">

                        <div class="row d-flex align-items-center">
                           
                            <div class="col-md-2 col-12">
                                <div class="form-floating mb-3 me-3">
                                    <select class="form-select" aria-label="Default select example" id="portafolioGraph">
                                        <?php
                                            $chartData = DB::table('portafolios')
                                                ->select('value')
                                                ->distinct()
                                                ->get();
                                        ?>
                                       <?php $__currentLoopData = $chartData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($data->value); ?>"><?php echo e($data->value); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <label for="portafolioGraph">Portafolio</label>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <button class="btn btn-primary mb-3" id="obtenerRegistros">Generar información</button>
                            </div>
                        </div>





                        <div id="chartdiv"></div>


                    </div>
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
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js"></script>
    <script src="<?php echo e(asset('js/portafolioGraph.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\soluciones\resources\views/portafolioGraph/show.blade.php ENDPATH**/ ?>