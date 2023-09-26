    <div class="row d-flex align-items-center">
        <div class="pagetitle d-flex align-items-center">
            <h1>Live Data</h1>
        </div>
    </div>
    <hr class="m-0 p-0 mb-2">
    <?php $__currentLoopData = $traders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trader): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php
            $last_general = DB::table("general")
            ->where("trader_id", "=", $trader->id)
            ->limit(1)
            ->orderBy("id", "desc")
            ->first();

            $secondLast_general = DB::table('general')
            ->where('trader_id', '=', $trader->id)
            ->orderBy('id', 'desc')
            ->skip(1)
            ->take(1)
            ->first();
        ?>

        <?php if(empty($last_general) || empty($secondLast_general)): ?>
            <div class="alert alert-danger l-bg-bad d-flex align-items-center text-uppercase fw-bolder" role="alert">
                <svg class="bi flex-shrink-0 me-2" fill="#fff" role="img" width="24" height="24" aria-label="Warning:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    No hay datos generales del <?php echo e($trader->nombre); ?>, consulta con sistemas
                </div>
            </div>
        <?php else: ?>
        
            <?php
                $diffBalance = $last_general->balance - $secondLast_general->balance;
                if ($diffBalance != 0 && $secondLast_general->balance != 0) {
                    $perBalance = $diffBalance / $secondLast_general->balance;
                } else {
                    $perBalance = 0;
                }

                $diffEquity = $last_general->equity - $secondLast_general->equity;
                if ($diffEquity != 0 && $secondLast_general->equity != 0) {
                    $perEquity = $diffEquity / $secondLast_general->equity;
                } else {
                    $perEquity = 0;
                }

                $diffMargin = $last_general->margin - $secondLast_general->margin;
                if ($diffMargin != 0 && $secondLast_general->margin != 0) {
                    $perMargin = $diffMargin / $secondLast_general->margin;
                } else {
                    $perMargin = 0;
                }

                $diffRisk = $last_general->risk - $secondLast_general->risk;
                if ($diffRisk != 0 && $secondLast_general->risk != 0) {
                    $perRisk = $diffRisk / $secondLast_general->risk;
                } else {
                    $perRisk = 0;
                }

                $diffProfit = $last_general->profit - $secondLast_general->profit;
                if ($diffProfit != 0 && $secondLast_general->profit != 0) {
                    $perProfit = $diffProfit / $secondLast_general->profit;
                } else {
                    $perProfit = 0;
                }

                $diffRatio = $last_general->ratio - $secondLast_general->ratio;
                if ($diffRatio != 0 && $secondLast_general->ratio != 0) {
                    $perRatio = $diffRatio / $secondLast_general->ratio;
                } else {
                    $perRatio = 0;
                }

                $lastDate = Carbon\Carbon::createFromDate($last_general->fecha);
                $now = Carbon\Carbon::now();

                $diff = $lastDate->diffInMinutes($now);

                $operaciones = App\Models\Operacion::where('trader_id', $trader->id)->where('status', 'abierta')->count();

                $operaciones_conflicto = App\Models\Operacion::where('trader_id', $trader->id)->where('status', 'conflicto')->count();

                $operaciones_hijas = App\Models\OperacionHija::where('trader_id', $trader->id)->where('status', 'abierta')->count();

                $operaciones_abiertasMAM = App\Models\OperacionHija::where('trader_id', 99999)->where('status', 'abierta')->count();

                $operaciones_abiertasPOOL = App\Models\OperacionHija::where('trader_id', 99998)->where('status', 'abierta')->count();

                $operacionesHijasHuerfanas = Illuminate\Support\Facades\DB::table('operacion_hija')
                                    ->join('operacion', 'operacion.no_operacion', '=', 'operacion_hija.operacion_id')
                                    ->select(DB::raw("operacion_hija.status AS statusHija, operacion.status AS statusMadre, operacion_hija.trader_id"))
                                    ->get();

                $operaciones_huerfanasMAM = 0;
                $operaciones_huerfanasPOOL = 0;
                foreach ($operacionesHijasHuerfanas as $operacionHijaHuerfana) {
                    if ($operacionHijaHuerfana->statusHija == "abierta" && $operacionHijaHuerfana->statusMadre == "cerrada") {
                        if ($operacionHijaHuerfana->trader_id == 99998) {
                            $operaciones_huerfanasPOOL++;
                        }elseif ($operacionHijaHuerfana->trader_id == 99999) {
                            $operaciones_huerfanasMAM++;
                        }
                    }
                }

            ?>
            
            <div class="trader mb-0">
                <div class="title-trader d-flex justify-content-between align-items-center">                
                    <div>
                        <?php if($diff > 0): ?>
                            <span class="badge bg-danger">ALERTA: El último dato recibido de <?php echo e($trader->nombre); ?> fue hace más de 1 minuto</span>
                        <?php endif; ?>
                    </div>
                    <div class="mt-1">
                        <h5>
                            Última actualización: <?php echo e(ucfirst(Carbon\Carbon::parse($last_general->fecha)->diffForHumans())); ?>
                        </h5>
                    </div>
                </div>
                <div class="row d-flex align-items-center">
                    <div class="col-xl-2">
                        <div class="card l-bg-blue shadow">
                            <div class="card-statistic-3 p-3">                            
                                <div class="card-icon card-icon-large">
                                    <i class="fa-solid fa-hashtag" style="font-size: 50px"></i>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="d-flex align-items-center justify-content-center mb-0 cant-trader">
                                            <?php echo e($trader->nombre); ?>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="card l-bg-blue-bal shadow">
                            <div class="card-statistic-3 p-3">
                                <?php if($perBalance == 0): ?>
                                    <div class="card-icon card-icon-large">
                                        <i class="fas fa-arrow-right-arrow-left"></i>
                                    </div>
                                <?php elseif($perBalance < 0): ?> 
                                    <div class="card-icon card-icon-large">
                                        <i class="fas fa-arrow-trend-down"></i>
                                    </div>
                                <?php elseif($perBalance > 0): ?>
                                    <div class="card-icon card-icon-large">
                                        <i class="fas fa-arrow-trend-up"></i>
                                    </div>
                                <?php endif; ?>
                                <div class="title-stats text-center">
                                    <h5 class="card-title text-light pt-0 pb-0">Balance</h5>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="d-flex align-items-center justify-content-center mb-0 cant-trader fs-6">
                                            <?php echo e(number_format($last_general->balance, 2)); ?>
                                        </h2>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="card l-bg-good shadow">
                            <div class="card-statistic-3 p-3">
                                <?php if($perEquity == 0): ?>
                                    <div class="card-icon card-icon-large">
                                        <i class="fas fa-arrow-right-arrow-left"></i>
                                    </div>
                                <?php elseif($perEquity < 0): ?> 
                                    <div class="card-icon card-icon-large">
                                        <i class="fas fa-arrow-trend-down"></i>
                                    </div>
                                <?php elseif($perEquity > 0): ?>
                                    <div class="card-icon card-icon-large">
                                        <i class="fas fa-arrow-trend-up"></i>
                                    </div>
                                <?php endif; ?>
                                <div class="title-stats text-center">
                                    <h5 class="card-title text-light pt-0 pb-0">Equity</h5>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="d-flex align-items-center justify-content-center mb-0 cant-trader">
                                            <?php echo e(number_format($last_general->equity, 2)); ?>
                                        </h2>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="card 
                        <?php if($last_general->margin > 70): ?>
                            l-bg-good
                        <?php elseif($last_general->margin > 30 && $last_general[0]->margin <= 70): ?>
                            l-bg-middle
                        <?php elseif($last_general->margin <= 30): ?>
                            l-bg-bad
                        <?php endif; ?>
                        shadow">
                            <div class="card-statistic-3 p-3">
                                <?php if($perMargin == 0): ?>
                                    <div class="card-icon card-icon-large">
                                        <i class="fas fa-arrow-right-arrow-left"></i>
                                    </div>
                                <?php elseif($perMargin < 0): ?> 
                                    <div class="card-icon card-icon-large">
                                        <i class="fas fa-arrow-trend-down"></i>
                                    </div>
                                <?php elseif($perMargin > 0): ?>
                                    <div class="card-icon card-icon-large">
                                        <i class="fas fa-arrow-trend-up"></i>
                                    </div>
                                <?php endif; ?>
                                <div class="title-stats text-center">
                                    <h5 class="card-title text-light pt-0 pb-0">Margin</h5>
                                </div>
                                <div class="row">
                                        <div class="col-12">
                                            <h2 class="d-flex align-items-center justify-content-center mb-0 cant-trader">
                                                <?php echo e(number_format($last_general->margin,2)); ?>
                                            </h2>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="card l-bg-middle shadow">
                            <div class="card-statistic-3 p-3">
                                <?php if($perRisk == 0): ?>
                                    <div class="card-icon card-icon-large">
                                        <i class="fas fa-arrow-right-arrow-left"></i>
                                    </div>
                                <?php elseif($perRisk < 0): ?> 
                                    <div class="card-icon card-icon-large">
                                        <i class="fas fa-arrow-trend-down"></i>
                                    </div>
                                <?php elseif($perRisk > 0): ?>
                                    <div class="card-icon card-icon-large">
                                        <i class="fas fa-arrow-trend-up"></i>
                                    </div>
                                <?php endif; ?>
                                <div class="title-stats text-center">
                                    <h5 class="card-title text-light pt-0 pb-0">Risk</h5>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="d-flex align-items-center justify-content-center mb-0 cant-trader">
                                            <?php echo e(number_format($last_general->risk, 2)); ?>
                                        </h2>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="card l-bg-up shadow">
                            <div class="card-statistic-3 p-3">
                                <div class="card-icon card-icon-large" style="font-size: 95px">
                                    <i class="fas fa-arrow-trend-up"></i>
                                </div>
                                <div class="title-stats text-center">
                                    <h5 class="card-title text-dark pt-0 pb-0">Operaciones</h5>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center ">
                                        <span>Abiertas: 
                                        <?php if($trader->id == 99998): ?>
                                                <?php echo e($operaciones_abiertasPOOL); ?>
                                            </span>
                                            <br>
                                            <span>
                                                Huérfanas:
                                                <?php echo e($operaciones_huerfanasPOOL); ?>
                                            </span>
                                        <?php elseif($trader->id == 99999): ?>
                                            <?php echo e($operaciones_abiertasMAM); ?>
                                            <br>
                                            <span>
                                                Huérfanas:
                                                <?php echo e($operaciones_huerfanasMAM); ?>
                                            </span>
                                        <?php else: ?>
                                            <?php echo e($operaciones); ?>
                                        </span>
                                        <?php endif; ?>
                                        <br>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\laragon\www\soluciones\resources\views/dashboard/pruebavida.blade.php ENDPATH**/ ?>