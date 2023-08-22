

<?php $__env->startSection('title', 'Equity'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <style>
        button {
            margin: 5px 5px 5px 5px;
            width: 8rem;
        }
    </style>
    <div class="pagetitle">
        <h1>Equity</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Vista general</a></li>
                <li class="breadcrumb-item active">Equity</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body mt-3" id="contBotonesSwitcher">
                        <div class="row justify-content-center">
                            <div class="col-md-12 col-12 text-center">




                                <?php $__currentLoopData = $switchers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $switcher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        if ($switcher->status_usd == 'activado') {
                                            $clase_modificable1 = 'bi-lock-fill';
                                        } else {
                                            $clase_modificable1 = 'bi-unlock-fill';
                                        }
                                        
                                        if ($switcher->status_eur == 'activado') {
                                            $clase_modificable2 = 'bi-lock-fill';
                                        } else {
                                            $clase_modificable2 = 'bi-unlock-fill';
                                        }
                                        
                                        if ($switcher->status_gbp == 'activado') {
                                            $clase_modificable3 = 'bi-lock-fill';
                                        } else {
                                            $clase_modificable3 = 'bi-unlock-fill';
                                        }
                                        
                                        if ($switcher->status_aud == 'activado') {
                                            $clase_modificable4 = 'bi-lock-fill';
                                        } else {
                                            $clase_modificable4 = 'bi-unlock-fill';
                                        }
                                        
                                        if ($switcher->status_nzd == 'activado') {
                                            $clase_modificable5 = 'bi-lock-fill';
                                        } else {
                                            $clase_modificable5 = 'bi-unlock-fill';
                                        }
                                        
                                        if ($switcher->status_cad == 'activado') {
                                            $clase_modificable6 = 'bi-lock-fill';
                                        } else {
                                            $clase_modificable6 = 'bi-unlock-fill';
                                        }
                                        
                                        if ($switcher->status_chf == 'activado') {
                                            $clase_modificable7 = 'bi-lock-fill';
                                        } else {
                                            $clase_modificable7 = 'bi-unlock-fill';
                                        }
                                        
                                        if ($switcher->status_jpy == 'activado') {
                                            $clase_modificable8 = 'bi-lock-fill';
                                        } else {
                                            $clase_modificable8 = 'bi-unlock-fill';
                                        }
                                        
                                        $clase = 'btn-success';
                                        
                                    ?>
                                    <div class="table-responsive">
                                        <table class="table">

                                            <tbody>

                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <?php
                                                            $sumausd = $switcher->usdchf + $switcher->usdjpy + $switcher->usdcad;
                                                        ?>
                                                        <?php echo e($sumausd); ?>

                                                    </td>

                                                    <td>
                                                        <?php
                                                            $sumaeur = $switcher->eurusd + $switcher->eurgbp + $switcher->euraud + $switcher->eurnzd + $switcher->eurcad + $switcher->eurchf + $switcher->eurjpy;
                                                        ?>
                                                        <?php echo e($sumaeur); ?>

                                                    </td>

                                                    <td>
                                                        <?php
                                                            $sumagbp = $switcher->gbpusd + $switcher->gbpaud + $switcher->gbpnzd + $switcher->gbpcad + $switcher->gbpchf + $switcher->gbpjpy;
                                                        ?>
                                                        <?php echo e($sumagbp); ?>

                                                    </td>

                                                    <td><?php
                                                        $sumaaud = $switcher->audusd + $switcher->audnzd + $switcher->audcad + $switcher->audchf + $switcher->audjpy;
                                                    ?>
                                                        <?php echo e($sumaaud); ?></td>

                                                    <td><?php
                                                        $sumanzd = $switcher->nzdusd + $switcher->nzdcad + $switcher->nzdchf + $switcher->nzdjpy;
                                                    ?>
                                                        <?php echo e($sumanzd); ?></td>

                                                    <td><?php
                                                        $sumacad = $switcher->cadchf + $switcher->cadjpy;
                                                    ?>
                                                        <?php echo e($sumacad); ?></td>

                                                    <td><?php
                                                        $sumachf = $switcher->chfjpy;
                                                    ?>
                                                        <?php echo e($sumachf); ?></td>

                                                    <td><?php
                                                        
                                                    ?>
                                                        0</td>
                                                </tr>

                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td><button id="botonUSDH" class="btn btn-dark m-2 "
                                                            data-id="<?php echo e($switcher->id); ?>">USD <i
                                                                class="bi <?php echo e($clase_modificable1); ?> m-1"
                                                                id="USDH"></i></button></td>
                                                    <td><button id="botonEURH" class="btn btn-dark m-2"
                                                            data-id="<?php echo e($switcher->id); ?>">EUR <i
                                                                class="bi <?php echo e($clase_modificable2); ?> m-1"
                                                                id="EURH"></i></button></td>
                                                    <td><button id="botonGBPH" class="btn btn-dark m-2"
                                                            data-id="<?php echo e($switcher->id); ?>">GBP <i
                                                                class="bi <?php echo e($clase_modificable3); ?> m-1"
                                                                id="GBPH"></i></button></td>
                                                    <td><button id="botonAUDH" class="btn btn-dark m-2"
                                                            data-id="<?php echo e($switcher->id); ?>">AUD <i
                                                                class="bi <?php echo e($clase_modificable4); ?> m-1"
                                                                id="AUDH"></i></button></td>
                                                    <td><button id="botonNZDH" class="btn btn-dark m-2"
                                                            data-id="<?php echo e($switcher->id); ?>">NZD <i
                                                                class="bi <?php echo e($clase_modificable5); ?> m-1"
                                                                id="NZDH"></i></button></td>
                                                    <td><button id="botonCADH" class="btn btn-dark m-2"
                                                            data-id="<?php echo e($switcher->id); ?>">CAD <i
                                                                class="bi <?php echo e($clase_modificable6); ?> m-1"
                                                                id="CADH"></i></button></td>
                                                    <td><button id="botonCHFH" class="btn btn-dark m-2"
                                                            data-id="<?php echo e($switcher->id); ?>">CHF <i
                                                                class="bi <?php echo e($clase_modificable7); ?> m-1"
                                                                id="CHFH"></i></button></td>
                                                    <td><button id="botonJPYH" class="btn btn-dark m-2"
                                                            data-id="<?php echo e($switcher->id); ?>">JPY <i
                                                                class="bi <?php echo e($clase_modificable8); ?> m-1"
                                                                id="JPYH"></i></button></td>
                                                </tr>

                                                <tr>
                                                    <td> <?php
                                                        $sumausdv = $switcher->eurusd + $switcher->gbpusd + $switcher->audusd + $switcher->nzdusd;
                                                    ?>
                                                        <?php echo e($sumausdv); ?></td>
                                                    <td><button id="botonUSDV" class="btn btn-light m-2">USD</button></td>
                                                    <td></td>
                                                    <td><button id="boton1"
                                                            class="btn <?php echo e($switcher->eurusd > 0 ? $clase : ($switcher->eurusd < 0 ? 'btn-danger' : 'btn-light')); ?>  m-2"><?php echo e($switcher->eurusd); ?></button>
                                                    </td>
                                                    <td><button id="boton2"
                                                            class="btn <?php echo e($switcher->gbpusd > 0 ? $clase : ($switcher->gbpusd < 0 ? 'btn-danger' : 'btn-light')); ?>  m-2"><?php echo e($switcher->gbpusd); ?></button>
                                                    </td>
                                                    <td><button id="boton3"
                                                            class="btn <?php echo e($switcher->audusd > 0 ? $clase : ($switcher->audusd < 0 ? 'btn-danger' : 'btn-light')); ?>  m-2"><?php echo e($switcher->audusd); ?></button>
                                                    </td>
                                                    <td><button id="boton4"
                                                            class="btn <?php echo e($switcher->nzdusd > 0 ? $clase : ($switcher->nzdusd < 0 ? 'btn-danger' : 'btn-light')); ?>  m-2"><?php echo e($switcher->nzdusd); ?></button>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>

                                                </tr>

                                                <tr>
                                                    <td>0</td>
                                                    <td><button id="botonEURV" class="btn btn-light m-2">EUR</button></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td><?php
                                                        $sumagbpv = $switcher->eurgbp;
                                                    ?>
                                                        <?php echo e($sumagbpv); ?></td>
                                                    <td><button id="botonGBPV" class="btn btn-light m-2">GBP</button></td>
                                                    <td></td>
                                                    <td><button id="boton5"
                                                            class="btn <?php echo e($switcher->eurgbp > 0 ? $clase : ($switcher->eurgbp < 0 ? 'btn-danger' : 'btn-light')); ?>  m-2"><?php echo e($switcher->eurgbp); ?></button>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>

                                                </tr>

                                                <tr>
                                                    <td><?php
                                                        $sumaaudv = $switcher->euraud + $switcher->gbpaud;
                                                    ?>
                                                        <?php echo e($sumaaudv); ?></td>
                                                    <td><button id="botonAUDV" class="btn btn-light m-2">AUD</button></td>
                                                    <td></td>
                                                    <td><button id="boton6"
                                                            class="btn <?php echo e($switcher->euraud > 0 ? $clase : ($switcher->euraud < 0 ? 'btn-danger' : 'btn-light')); ?>  m-2"><?php echo e($switcher->euraud); ?></button>
                                                    </td>
                                                    <td><button id="boton7"
                                                            class="btn <?php echo e($switcher->gbpaud > 0 ? $clase : ($switcher->gbpaud < 0 ? 'btn-danger' : 'btn-light')); ?>  m-2"><?php echo e($switcher->gbpaud); ?></button>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>

                                                </tr>

                                                <tr>
                                                    <td><?php
                                                        $sumanzdv = $switcher->eurnzd + $switcher->gbpnzd + $switcher->audnzd;
                                                    ?>
                                                        <?php echo e($sumanzdv); ?></td>
                                                    <td><button id="botonNZDV" class="btn btn-light m-2">NZD</button></td>
                                                    <td></td>
                                                    <td><button id="boton8"
                                                            class="btn <?php echo e($switcher->eurnzd > 0 ? $clase : ($switcher->eurnzd < 0 ? 'btn-danger' : 'btn-light')); ?>  m-2"><?php echo e($switcher->eurnzd); ?></button>
                                                    </td>
                                                    <td><button id="boton9"
                                                            class="btn <?php echo e($switcher->gbpnzd > 0 ? $clase : ($switcher->gbpnzd < 0 ? 'btn-danger' : 'btn-light')); ?>  m-2"><?php echo e($switcher->gbpnzd); ?></button>
                                                    </td>
                                                    <td><button id="boton10"
                                                            class="btn <?php echo e($switcher->audnzd > 0 ? $clase : ($switcher->audnzd < 0 ? 'btn-danger' : 'btn-light')); ?>  m-2"><?php echo e($switcher->audnzd); ?></button>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>

                                                </tr>

                                                <tr>
                                                    <td><?php
                                                        $sumacadv = $switcher->usdcad + $switcher->eurcad + $switcher->gbpcad + $switcher->audcad + $switcher->nzdcad;
                                                    ?>
                                                        <?php echo e($sumacadv); ?></td>
                                                    <td><button id="botonCADV" class="btn btn-light m-2">CAD</button></td>
                                                    <td><button id="boton11"
                                                            class="btn <?php echo e($switcher->usdcad > 0 ? $clase : ($switcher->usdcad < 0 ? 'btn-danger' : 'btn-light')); ?>  m-2"><?php echo e($switcher->usdcad); ?></button>
                                                    </td>
                                                    <td><button id="boton12"
                                                            class="btn <?php echo e($switcher->eurcad > 0 ? $clase : ($switcher->eurcad < 0 ? 'btn-danger' : 'btn-light')); ?>  m-2"><?php echo e($switcher->eurcad); ?></button>
                                                    </td>
                                                    <td><button id="boton13"
                                                            class="btn <?php echo e($switcher->gbpcad > 0 ? $clase : ($switcher->gbpcad < 0 ? 'btn-danger' : 'btn-light')); ?>  m-2"><?php echo e($switcher->gbpcad); ?></button>
                                                    </td>
                                                    <td><button id="boton14"
                                                            class="btn <?php echo e($switcher->audcad > 0 ? $clase : ($switcher->audcad < 0 ? 'btn-danger' : 'btn-light')); ?>  m-2"><?php echo e($switcher->audcad); ?></button>
                                                    </td>
                                                    <td><button id="boton15"
                                                            class="btn <?php echo e($switcher->nzdcad > 0 ? $clase : ($switcher->nzdcad < 0 ? 'btn-danger' : 'btn-light')); ?>  m-2"><?php echo e($switcher->nzdcad); ?></button>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>

                                                </tr>

                                                <tr>
                                                    <td><?php
                                                        $sumachfv = $switcher->usdchf + $switcher->eurchf + $switcher->gbpchf + $switcher->audchf + $switcher->nzdchf + $switcher->cadchf;
                                                    ?>
                                                        <?php echo e($sumachfv); ?></td>
                                                    <td><button id="botonCHFV" class="btn btn-light m-2">CHF</button></td>
                                                    <td><button id="boton16"
                                                            class="btn <?php echo e($switcher->usdchf > 0 ? $clase : ($switcher->usdchf < 0 ? 'btn-danger' : 'btn-light')); ?>  m-2"><?php echo e($switcher->usdchf); ?></button>
                                                    </td>
                                                    <td><button id="boton17"
                                                            class="btn <?php echo e($switcher->eurchf > 0 ? $clase : ($switcher->eurchf < 0 ? 'btn-danger' : 'btn-light')); ?>  m-2"><?php echo e($switcher->eurchf); ?></button>
                                                    </td>
                                                    <td><button id="boton18"
                                                            class="btn <?php echo e($switcher->gbpchf > 0 ? $clase : ($switcher->gbpchf < 0 ? 'btn-danger' : 'btn-light')); ?>  m-2"><?php echo e($switcher->gbpchf); ?></button>
                                                    </td>
                                                    <td><button id="boton19"
                                                            class="btn <?php echo e($switcher->audchf > 0 ? $clase : ($switcher->audchf < 0 ? 'btn-danger' : 'btn-light')); ?>  m-2"><?php echo e($switcher->audchf); ?></button>
                                                    </td>
                                                    <td><button id="boton20"
                                                            class="btn <?php echo e($switcher->nzdchf > 0 ? $clase : ($switcher->nzdchf < 0 ? 'btn-danger' : 'btn-light')); ?>  m-2"><?php echo e($switcher->nzdchf); ?></button>
                                                    </td>
                                                    <td><button id="boton21"
                                                            class="btn <?php echo e($switcher->cadchf > 0 ? $clase : ($switcher->cadchf < 0 ? 'btn-danger' : 'btn-light')); ?>  m-2"><?php echo e($switcher->cadchf); ?></button>
                                                    </td>
                                                    <td></td>
                                                    <td></td>

                                                </tr>

                                                <tr>
                                                    <td><?php
                                                        $sumajpyv = $switcher->usdjpy + $switcher->eurjpy + $switcher->gbpjpy + $switcher->audjpy + $switcher->nzdjpy + $switcher->cadjpy + $switcher->chfjpy;
                                                    ?>
                                                        <?php echo e($sumajpyv); ?></td>
                                                    <td><button id="botonJPYV" class="btn btn-light m-2">JPY</button></td>
                                                    <td><button id="boton22"
                                                            class="btn <?php echo e($switcher->usdjpy > 0 ? $clase : ($switcher->usdjpy < 0 ? 'btn-danger' : 'btn-light')); ?>  m-2"><?php echo e($switcher->usdjpy); ?></button>
                                                    </td>
                                                    <td><button id="boton23"
                                                            class="btn <?php echo e($switcher->eurjpy > 0 ? $clase : ($switcher->eurjpy < 0 ? 'btn-danger' : 'btn-light')); ?>  m-2"><?php echo e($switcher->eurjpy); ?></button>
                                                    </td>
                                                    <td><button id="boton24"
                                                            class="btn <?php echo e($switcher->gbpjpy > 0 ? $clase : ($switcher->gbpjpy < 0 ? 'btn-danger' : 'btn-light')); ?>  m-2"><?php echo e($switcher->gbpjpy); ?></button>
                                                    </td>
                                                    <td><button id="boton25"
                                                            class="btn <?php echo e($switcher->audjpy > 0 ? $clase : ($switcher->audjpy < 0 ? 'btn-danger' : 'btn-light')); ?>  m-2"><?php echo e($switcher->audjpy); ?></button>
                                                    </td>
                                                    <td><button id="boton26"
                                                            class="btn <?php echo e($switcher->nzdjpy > 0 ? $clase : ($switcher->nzdjpy < 0 ? 'btn-danger' : 'btn-light')); ?>  m-2"><?php echo e($switcher->nzdjpy); ?></button>
                                                    </td>
                                                    <td><button id="boton27"
                                                            class="btn <?php echo e($switcher->cadjpy > 0 ? $clase : ($switcher->cadjpy < 0 ? 'btn-danger' : 'btn-light')); ?>  m-2"><?php echo e($switcher->cadjpy); ?></button>
                                                    </td>
                                                    <td><button id="boton28"
                                                            class="btn <?php echo e($switcher->chfjpy > 0 ? $clase : ($switcher->chfjpy < 0 ? 'btn-danger' : 'btn-light')); ?>  m-2"><?php echo e($switcher->chfjpy); ?></button>
                                                    </td>
                                                    <td></td>
                                                </tr>

                                            </tbody>
                                        </table>

                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>



                        </div>
                        <div class="col-md-10 col-12 text-center">

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="<?php echo e(asset('js/botones.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\traders\resources\views/botones/show.blade.php ENDPATH**/ ?>