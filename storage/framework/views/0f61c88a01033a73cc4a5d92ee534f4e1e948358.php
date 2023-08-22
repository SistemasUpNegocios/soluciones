

<?php $__env->startSection('title'); ?> Cleo Tabla <?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <script src="https://kit.fontawesome.com/ab4fa16bfb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="pagetitle d-flex justify-content-between">
    <div>
        <h1>Cleo Tabla</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Panel de control</a></li>
                <li class="breadcrumb-item">Cleo Tabla</li>
            </ol>
        </nav>
    </div>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card pb-0">
                <div class="card-body" style="padding-top: 20px;" id="contTabla">
                    <table class="table table-striped table-bordered nowrap text-center" id="status">
                        <thead>
                            <tr>
                                <th>PAIR</th>
                                <th>MARKET</th>
                                <th>DIRECTION</th>
                                <th>SHOT</th>
                                <th>FECHA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-priority="0" scope="col">EURUSD</td>
                                <td data-priority="0" scope="col"><?php echo e($eurusd->market); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($eurusd->direction); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($eurusd->shot); ?></td>
                                <td data-priority="0" scope="col"><?php echo e(ucfirst(Carbon\Carbon::parse($eurusd->fecha)->diffForHumans())); ?></td>
                            </tr>
                            <tr>
                                <td data-priority="0" scope="col">GBPUSD</td>
                                <td data-priority="0" scope="col"><?php echo e($gbpusd->market); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($gbpusd->direction); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($gbpusd->shot); ?></td>
                                <td data-priority="0" scope="col"><?php echo e(ucfirst(Carbon\Carbon::parse($gbpusd->fecha)->diffForHumans())); ?></td>
                            </tr>
                            <tr>
                                <td data-priority="0" scope="col">AUDUSD</td>
                                <td data-priority="0" scope="col"><?php echo e($audusd->market); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($audusd->direction); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($audusd->shot); ?></td>
                                <td data-priority="0" scope="col"><?php echo e(ucfirst(Carbon\Carbon::parse($audusd->fecha)->diffForHumans())); ?></td>
                            </tr>
                            <tr>
                                <td data-priority="0" scope="col">NZDUSD</td>
                                <td data-priority="0" scope="col"><?php echo e($nzdusd->market); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($nzdusd->direction); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($nzdusd->shot); ?></td>
                                <td data-priority="0" scope="col"><?php echo e(ucfirst(Carbon\Carbon::parse($nzdusd->fecha)->diffForHumans())); ?></td>
                            </tr>
                            <tr>
                                <td data-priority="0" scope="col">USDCAD</td>
                                <td data-priority="0" scope="col"><?php echo e($usdcad->market); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($usdcad->direction); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($usdcad->shot); ?></td>
                                <td data-priority="0" scope="col"><?php echo e(ucfirst(Carbon\Carbon::parse($usdcad->fecha)->diffForHumans())); ?></td>
                            </tr>
                            <tr>
                                <td data-priority="0" scope="col">USDCHF</td>
                                <td data-priority="0" scope="col"><?php echo e($usdchf->market); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($usdchf->direction); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($usdchf->shot); ?></td>
                                <td data-priority="0" scope="col"><?php echo e(ucfirst(Carbon\Carbon::parse($usdchf->fecha)->diffForHumans())); ?></td>
                            </tr>
                            <tr>
                                <td data-priority="0" scope="col">USDJPY</td>
                                <td data-priority="0" scope="col"><?php echo e($usdjpy->market); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($usdjpy->direction); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($usdjpy->shot); ?></td>
                                <td data-priority="0" scope="col"><?php echo e(ucfirst(Carbon\Carbon::parse($usdjpy->fecha)->diffForHumans())); ?></td>
                            </tr>
                            <tr>
                                <td data-priority="0" scope="col">EURGBP</td>
                                <td data-priority="0" scope="col"><?php echo e($eurgbp->market); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($eurgbp->direction); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($eurgbp->shot); ?></td>
                                <td data-priority="0" scope="col"><?php echo e(ucfirst(Carbon\Carbon::parse($eurgbp->fecha)->diffForHumans())); ?></td>
                            </tr>
                            <tr>
                                <td data-priority="0" scope="col">EURAUD</td>
                                <td data-priority="0" scope="col"><?php echo e($euraud->market); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($euraud->direction); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($euraud->shot); ?></td>
                                <td data-priority="0" scope="col"><?php echo e(ucfirst(Carbon\Carbon::parse($euraud->fecha)->diffForHumans())); ?></td>
                            </tr>
                            <tr>
                                <td data-priority="0" scope="col">EURNZD</td>
                                <td data-priority="0" scope="col"><?php echo e($eurnzd->market); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($eurnzd->direction); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($eurnzd->shot); ?></td>
                                <td data-priority="0" scope="col"><?php echo e(ucfirst(Carbon\Carbon::parse($eurnzd->fecha)->diffForHumans())); ?></td>
                            </tr>
                            <tr>
                                <td data-priority="0" scope="col">GBPAUD</td>
                                <td data-priority="0" scope="col"><?php echo e($gbpaud->market); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($gbpaud->direction); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($gbpaud->shot); ?></td>
                                <td data-priority="0" scope="col"><?php echo e(ucfirst(Carbon\Carbon::parse($gbpaud->fecha)->diffForHumans())); ?></td>
                            </tr>
                            <tr>
                                <td data-priority="0" scope="col">GBPNZD</td>
                                <td data-priority="0" scope="col"><?php echo e($gbpnzd->market); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($gbpnzd->direction); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($gbpnzd->shot); ?></td>
                                <td data-priority="0" scope="col"><?php echo e(ucfirst(Carbon\Carbon::parse($gbpnzd->fecha)->diffForHumans())); ?></td>
                            </tr>
                            <tr>
                                <td data-priority="0" scope="col">AUDNZD</td>
                                <td data-priority="0" scope="col"><?php echo e($audnzd->market); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($audnzd->direction); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($audnzd->shot); ?></td>
                                <td data-priority="0" scope="col"><?php echo e(ucfirst(Carbon\Carbon::parse($audnzd->fecha)->diffForHumans())); ?></td>
                            </tr>
                            <tr>
                                <td data-priority="0" scope="col">EURCAD</td>
                                <td data-priority="0" scope="col"><?php echo e($eurcad->market); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($eurcad->direction); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($eurcad->shot); ?></td>
                                <td data-priority="0" scope="col"><?php echo e(ucfirst(Carbon\Carbon::parse($eurcad->fecha)->diffForHumans())); ?></td>
                            </tr>
                            <tr>
                                <td data-priority="0" scope="col">EURCHF</td>
                                <td data-priority="0" scope="col"><?php echo e($eurchf->market); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($eurchf->direction); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($eurchf->shot); ?></td>
                                <td data-priority="0" scope="col"><?php echo e(ucfirst(Carbon\Carbon::parse($eurchf->fecha)->diffForHumans())); ?></td>
                            </tr>
                            <tr>
                                <td data-priority="0" scope="col">EURJPY</td>
                                <td data-priority="0" scope="col"><?php echo e($eurjpy->market); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($eurjpy->direction); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($eurjpy->shot); ?></td>
                                <td data-priority="0" scope="col"><?php echo e(ucfirst(Carbon\Carbon::parse($eurjpy->fecha)->diffForHumans())); ?></td>
                            </tr>
                            <tr>
                                <td data-priority="0" scope="col">GBPCAD</td>
                                <td data-priority="0" scope="col"><?php echo e($gbpcad->market); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($gbpcad->direction); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($gbpcad->shot); ?></td>
                                <td data-priority="0" scope="col"><?php echo e(ucfirst(Carbon\Carbon::parse($gbpcad->fecha)->diffForHumans())); ?></td>
                            </tr>
                            <tr>
                                <td data-priority="0" scope="col">GBPCHF</td>
                                <td data-priority="0" scope="col"><?php echo e($gbpchf->market); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($gbpchf->direction); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($gbpchf->shot); ?></td>
                                <td data-priority="0" scope="col"><?php echo e(ucfirst(Carbon\Carbon::parse($gbpchf->fecha)->diffForHumans())); ?></td>
                            </tr>
                            <tr>
                                <td data-priority="0" scope="col">GBPJPY</td>
                                <td data-priority="0" scope="col"><?php echo e($gbpjpy->market); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($gbpjpy->direction); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($gbpjpy->shot); ?></td>
                                <td data-priority="0" scope="col"><?php echo e(ucfirst(Carbon\Carbon::parse($gbpjpy->fecha)->diffForHumans())); ?></td>
                            </tr>
                            <tr>
                                <td data-priority="0" scope="col">AUDCAD</td>
                                <td data-priority="0" scope="col"><?php echo e($audcad->market); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($audcad->direction); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($audcad->shot); ?></td>
                                <td data-priority="0" scope="col"><?php echo e(ucfirst(Carbon\Carbon::parse($audcad->fecha)->diffForHumans())); ?></td>
                            </tr>
                            <tr>
                                <td data-priority="0" scope="col">AUDCHF</td>
                                <td data-priority="0" scope="col"><?php echo e($audchf->market); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($audchf->direction); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($audchf->shot); ?></td>
                                <td data-priority="0" scope="col"><?php echo e(ucfirst(Carbon\Carbon::parse($audchf->fecha)->diffForHumans())); ?></td>
                            </tr>
                            <tr>
                                <td data-priority="0" scope="col">AUDJPY</td>
                                <td data-priority="0" scope="col"><?php echo e($audjpy->market); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($audjpy->direction); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($audjpy->shot); ?></td>
                                <td data-priority="0" scope="col"><?php echo e(ucfirst(Carbon\Carbon::parse($audjpy->fecha)->diffForHumans())); ?></td>
                            </tr>
                            <tr>
                                <td data-priority="0" scope="col">NZDCAD</td>
                                <td data-priority="0" scope="col"><?php echo e($nzdcad->market); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($nzdcad->direction); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($nzdcad->shot); ?></td>
                                <td data-priority="0" scope="col"><?php echo e(ucfirst(Carbon\Carbon::parse($nzdcad->fecha)->diffForHumans())); ?></td>
                            </tr>
                            <tr>
                                <td data-priority="0" scope="col">NZDCHF</td>
                                <td data-priority="0" scope="col"><?php echo e($nzdchf->market); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($nzdchf->direction); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($nzdchf->shot); ?></td>
                                <td data-priority="0" scope="col"><?php echo e(ucfirst(Carbon\Carbon::parse($nzdchf->fecha)->diffForHumans())); ?></td>
                            </tr>
                            <tr>
                                <td data-priority="0" scope="col">NZDJPY</td>
                                <td data-priority="0" scope="col"><?php echo e($nzdjpy->market); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($nzdjpy->direction); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($nzdjpy->shot); ?></td>
                                <td data-priority="0" scope="col"><?php echo e(ucfirst(Carbon\Carbon::parse($nzdjpy->fecha)->diffForHumans())); ?></td>
                            </tr>
                            <tr>
                                <td data-priority="0" scope="col">CADCHF</td>
                                <td data-priority="0" scope="col"><?php echo e($cadchf->market); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($cadchf->direction); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($cadchf->shot); ?></td>
                                <td data-priority="0" scope="col"><?php echo e(ucfirst(Carbon\Carbon::parse($cadchf->fecha)->diffForHumans())); ?></td>
                            </tr>
                            <tr>
                                <td data-priority="0" scope="col">CADJPY</td>
                                <td data-priority="0" scope="col"><?php echo e($cadjpy->market); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($cadjpy->direction); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($cadjpy->shot); ?></td>
                                <td data-priority="0" scope="col"><?php echo e(ucfirst(Carbon\Carbon::parse($cadjpy->fecha)->diffForHumans())); ?></td>
                            </tr>
                            <tr>
                                <td data-priority="0" scope="col">CHFJPY</td>
                                <td data-priority="0" scope="col"><?php echo e($chfjpy->market); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($chfjpy->direction); ?></td>
                                <td data-priority="0" scope="col"><?php echo e($chfjpy->shot); ?></td>
                                <td data-priority="0" scope="col"><?php echo e(ucfirst(Carbon\Carbon::parse($chfjpy->fecha)->diffForHumans())); ?></td>
                            </tr>
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
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
<script src="<?php echo e(asset('js/cleo-tabla.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\traders\resources\views/cleo-tabla/show.blade.php ENDPATH**/ ?>