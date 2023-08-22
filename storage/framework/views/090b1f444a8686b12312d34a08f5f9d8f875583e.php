

<?php $__env->startSection('title'); ?>
Gráfica Balance/Equity
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<script src="https://kit.fontawesome.com/ab4fa16bfb.js" crossorigin="anonymous"></script>
<style>
    #balanceEquity {
        width: 100%;
        height: 500px;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="pagetitle d-flex justify-content-between">
    <div>
        <h1>Gráfica Balance/Equity</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Panel de control</a></li>
                <li class="breadcrumb-item">Gráfica Balance/Equity</li>
            </ol>
        </nav>
    </div>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card pb-0">
                <div class="card-body" style="padding-top: 20px;">
                    <div class="row">
                        <div class="pagetitle d-flex justify-content-between align-items-center">
                            <h1 id="numeroTrader"></h1>
                        </div>
                        <hr class="m-0 p-0 mb-2">
                    </div>
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
                    <div class="row justify-content-ceter mt-2 mb-4 text-center">
                        <div class="col-md-12 col-12 mt-2"><button class="btn btn-dark" id="mostrarTodo">Mostrar todo</button></div>

                        <div class="col-md-4 col-12 mt-2"><button class="btn btn-outline-primary" id="mostrarBalance">Mostar solo balance</button></div>
                        <div class="col-md-4 col-12 mt-2"><button class="btn btn-outline-success" id="mostrarEquity">Mostar solo equity</button></div>
                        <div class="col-md-4 col-12 mt-2"><button class="btn btn-outline-warning" id="mostrarMargenLibre">Mostar solo margen libre</button></div>

                        <div class="col-md-4 col-12 mt-2"><button class="btn btn-outline-success btn_balance_equity" id="mostrarBlanceEquity">Mostrar balance y equity</button></div>
                        <div class="col-md-4 col-12 mt-2"><button class="btn btn-outline-success btn_equity_margen_libre" id="mostrarEquityMargenLibre">Mostrar equity y margen libre</button></div>                    
                        <div class="col-md-4 col-12 mt-2"><button class="btn btn-outline-success btn_balance_margen_libre" id="mostrarBalanceMargenLibre">Mostrar balance y margen libre</button></div>
                    </div>
                    <div id="balanceEquity"></div>
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
<script src="<?php echo e(asset('js/graficaBalanceEquity.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\traders\resources\views/graficas/show.blade.php ENDPATH**/ ?>