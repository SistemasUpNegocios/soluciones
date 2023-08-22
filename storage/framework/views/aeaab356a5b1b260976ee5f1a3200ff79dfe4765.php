<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1" name="viewport">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Estudio Analysis</title>
    <meta content="" name="description">

    <link rel="shortcut icon" href="<?php echo e(url('img/favicon.png')); ?>" type="image/x-icon">
    <link rel="icon" href="<?php echo e(url('img/favicon.png')); ?>" type="image/x-icon">
    <link href="<?php echo e(url('img/favicon.png')); ?>" rel="apple-touch-icon">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
        hr {
            page-break-after: always;
            border: none;
            margin: 0;
            padding: 0;
        }

        .imgUP_superior {
            position: absolute;
            width: 320px;
            left: -45px;
            top: -46px;
        }
        
        .observaciones {
            padding:4rem;
            width:70%;
            margin:2rem auto;
            border: 3px solid #000;
        }
    </style>
</head>

<body class="analisis-imprimir">
    

    <img class="imgUP_superior" src="<?php echo e(url('img/logo_sup.png')); ?>" alt="Logo uptrading">


<p class="font-weight-bold" style="text-align: right;">Variant: <span style="font-weight:400"><?php echo e($variant); ?> </span></p>




<?php
    $datapairs = DB::table('estudio')
        ->where('time', $tr)
        ->where('variant', $variant)
        ->orderByRaw("FIELD(pair , 'EURUSD', 'GBPUSD', 'AUDUSD', 'NZDUSD', 'USDCAD', 'USDCHF', 'USDJPY', 'EURGBP', 'EURAUD', 'EURNZD', 'GBPAUD', 'GBPNZD', 'AUDNZD', 'EURCAD', 'EURCHF', 'EURJPY', 'GBPCAD', 'GBPCHF', 'GBPJPY', 'AUDCAD', 'AUDCHF', 'AUDJPY', 'NZDCAD', 'NZDCHF', 'NZDJPY', 'CADCHF', 'CADJPY', 'CHFJPY') ASC")
        ->orderBy('value', 'asc')
        ->get();
    
    $registros = DB::table('estudio')
        ->where('pair', $monedas)
        ->count();
    
    $redaccion = DB::table('estudio_lista')
        ->where('id', $variant)
        ->get();
    
    $datafilter = DB::table('estudio')
        ->where('pair', $monedas)
        ->where('time', $tr)
        ->where('variant', $variant)
        ->orderBy('value', 'asc')
        ->count();
?>

<div class="row d-flex justify-content-center">
<table class="table table-fixed table-striped table-bordered nowrap"
    style="width: 100% !important; margin-left: 0px !important; margin-right: 0px !important;" id="trader_data">
    <thead class="text-center"
        style="z-index: 999; background-color:white; vertical-align: middle !important; text-align: center !important;" >
        <tr>
            <?php if($datafilter > 0): ?>
                <th data-priority="0" scope="col" colspan="20" style="position: fixed">
                    <br>
                    <small>Reporte eficiencia señal
                        <?php echo e(\Carbon\Carbon::parse(strtotime($datapairs[0]->date))->format('d-m-Y')); ?></small>
                    <br>
                    <small>Periodo de estudio
                        <?php echo e(\Carbon\Carbon::parse(strtotime($datapairs[0]->date_ranges1))->format('d-m-Y')); ?> y
                        <?php echo e(\Carbon\Carbon::parse(strtotime($datapairs[0]->date_ranges1))->format('d-m-Y')); ?></small>
                    <br>
                    <small><?php echo e($redaccion[0]->redaccion); ?></small>
                </th>
            <?php elseif($datafilter == 0): ?>
                <th data-priority="0" scope="col" colspan="20" style="color: grey;">
                    No hay registros
                </th>
            <?php endif; ?>

        </tr>

        <tr >
            <th data-priority="0" scope="col" colspan="1" rowspan="3">Par</th>
            <th data-priority="0" scope="col" colspan="1" rowspan="3">Valor</th>
            <th data-priority="0" scope="col" colspan="8">Compras</th>
            <th data-priority="0" scope="col" colspan="8">Ventas</th>
            <th data-priority="0" scope="col" colspan="2" rowspan="2">Eficiencia</th>
            <th data-priority="0" scope="col" colspan="1" rowspan="2">Mejor</th>

        </tr>
        <tr>
            <th data-priority="0" scope="col" colspan="4">Ganadas</th>
            <th data-priority="0" scope="col" colspan="4">Perdidas</th>
            <th data-priority="0" scope="col" colspan="4">Ganadas</th>
            <th data-priority="0" scope="col" colspan="4">Perdidas</th>

        </tr>

        <tr>
            <th data-priority="0" scope="col">N</th>
            <th data-priority="0" scope="col">R1</th>
            <th data-priority="0" scope="col">R2</th>
            <th data-priority="0" scope="col">R3</th>
            <th data-priority="0" scope="col">N</th>
            <th data-priority="0" scope="col">R1</th>
            <th data-priority="0" scope="col">R2</th>
            <th data-priority="0" scope="col">R3</th>
            <th data-priority="0" scope="col">N</th>
            <th data-priority="0" scope="col">R1</th>
            <th data-priority="0" scope="col">R2</th>
            <th data-priority="0" scope="col">R3</th>
            <th data-priority="0" scope="col">N</th>
            <th data-priority="0" scope="col">R1</th>
            <th data-priority="0" scope="col">R2</th>
            <th data-priority="0" scope="col">R3</th>
            <th data-priority="0" scope="col">Compras</th>
            <th data-priority="0" scope="col">Ventas</th>
            <th data-priority="0" scope="col">Balance</th>

        </tr>

    </thead>

    <tbody style="vertical-align: middle !important; text-align: center !important; padding: 5px !important">
        <?php $__currentLoopData = $datapairs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datapair): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


            <?php
                $registros = DB::table('estudio')
                    ->where('pair', $monedas)
                    ->count();
                
                //     $datafilter = DB::table('estudio')
                //     ->where('pair', $par)
                //     ->where('time', $tr)
                //     ->where('variant', $variant)
                //     ->orderBy('value', 'asc')
                //     ->count();
                
                // $redaccion = DB::table('estudio_lista')
                //     ->where('id', $variant)
                //     ->get();
                
            ?>

            <?php if($datafilter > 0): ?>
                <?php if($datapair->pair == 'EURUSD'): ?>
                    <tr style="background-color: Oldlace">
                        
                        <td><?php echo e($datapair->pair); ?></td>

                        

                        <td><?php echo e($datapair->value); ?></td>

                        

                        <td><?php echo e($datapair->bw_n); ?></td>
                        <td><?php echo e($datapair->bw_r1); ?></td>
                        <td><?php echo e($datapair->bw_r2); ?></td>
                        <td><?php echo e($datapair->bw_r3); ?></td>


                        
                        <td><?php echo e($datapair->bl_n); ?></td>
                        <td><?php echo e($datapair->bl_r1); ?></td>
                        <td><?php echo e($datapair->bl_r2); ?></td>
                        <td><?php echo e($datapair->bl_r3); ?></td>


                        
                        <td><?php echo e($datapair->sw_n); ?></td>
                        <td><?php echo e($datapair->sw_r1); ?></td>
                        <td><?php echo e($datapair->sw_r2); ?></td>
                        <td><?php echo e($datapair->sw_r3); ?></td>


                        
                        <td><?php echo e($datapair->sl_n); ?></td>
                        <td><?php echo e($datapair->sl_r1); ?></td>
                        <td><?php echo e($datapair->sl_r2); ?></td>
                        <td><?php echo e($datapair->sl_r3); ?></td>

                        
                        <?php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaCompras, 2)); ?></td>


                        
                        <?php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaVentas, 2)); ?></td>

                        
                        <?php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 ?>
                        <?php if($mejorBalance >= 56): ?>
                            <td style="background-color: #3f9d50"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php elseif($mejorBalance >= 50 && $mejorBalance < 56): ?>
                            <td style="background-color: #F2C94C"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php else: ?>
                            <td style="background-color: #ea5651"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php endif; ?>

                        


                    </tr>
                <?php endif; ?>

                <?php if($datapair->pair == 'GBPUSD'): ?>
                    <tr style="background-color: Whitesmoke">
                        
                        <td><?php echo e($datapair->pair); ?></td>

                        

                        <td><?php echo e($datapair->value); ?></td>

                        

                        <td><?php echo e($datapair->bw_n); ?></td>
                        <td><?php echo e($datapair->bw_r1); ?></td>
                        <td><?php echo e($datapair->bw_r2); ?></td>
                        <td><?php echo e($datapair->bw_r3); ?></td>


                        
                        <td><?php echo e($datapair->bl_n); ?></td>
                        <td><?php echo e($datapair->bl_r1); ?></td>
                        <td><?php echo e($datapair->bl_r2); ?></td>
                        <td><?php echo e($datapair->bl_r3); ?></td>


                        
                        <td><?php echo e($datapair->sw_n); ?></td>
                        <td><?php echo e($datapair->sw_r1); ?></td>
                        <td><?php echo e($datapair->sw_r2); ?></td>
                        <td><?php echo e($datapair->sw_r3); ?></td>


                        
                        <td><?php echo e($datapair->sl_n); ?></td>
                        <td><?php echo e($datapair->sl_r1); ?></td>
                        <td><?php echo e($datapair->sl_r2); ?></td>
                        <td><?php echo e($datapair->sl_r3); ?></td>

                        
                        <?php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaCompras, 2)); ?></td>


                        
                        <?php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaVentas, 2)); ?></td>

                        
                        <?php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 ?>
                        <?php if($mejorBalance >= 56): ?>
                            <td style="background-color: #3f9d50"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php elseif($mejorBalance >= 50 && $mejorBalance < 56): ?>
                            <td style="background-color: #F2C94C"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php else: ?>
                            <td style="background-color: #ea5651"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php endif; ?>

                        


                    </tr>
                <?php endif; ?>

                <?php if($datapair->pair == 'AUDUSD'): ?>
                    <tr style="background-color: Oldlace">
                        
                        <td><?php echo e($datapair->pair); ?></td>

                        

                        <td><?php echo e($datapair->value); ?></td>

                        

                        <td><?php echo e($datapair->bw_n); ?></td>
                        <td><?php echo e($datapair->bw_r1); ?></td>
                        <td><?php echo e($datapair->bw_r2); ?></td>
                        <td><?php echo e($datapair->bw_r3); ?></td>


                        
                        <td><?php echo e($datapair->bl_n); ?></td>
                        <td><?php echo e($datapair->bl_r1); ?></td>
                        <td><?php echo e($datapair->bl_r2); ?></td>
                        <td><?php echo e($datapair->bl_r3); ?></td>


                        
                        <td><?php echo e($datapair->sw_n); ?></td>
                        <td><?php echo e($datapair->sw_r1); ?></td>
                        <td><?php echo e($datapair->sw_r2); ?></td>
                        <td><?php echo e($datapair->sw_r3); ?></td>


                        
                        <td><?php echo e($datapair->sl_n); ?></td>
                        <td><?php echo e($datapair->sl_r1); ?></td>
                        <td><?php echo e($datapair->sl_r2); ?></td>
                        <td><?php echo e($datapair->sl_r3); ?></td>

                        
                        <?php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaCompras, 2)); ?></td>


                        
                        <?php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaVentas, 2)); ?></td>

                        
                        <?php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 ?>
                        <?php if($mejorBalance >= 56): ?>
                            <td style="background-color: #3f9d50"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php elseif($mejorBalance >= 50 && $mejorBalance < 56): ?>
                            <td style="background-color: #F2C94C"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php else: ?>
                            <td style="background-color: #ea5651"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php endif; ?>

                        


                    </tr>
                <?php endif; ?>


                <?php if($datapair->pair == 'NZDUSD'): ?>
                    <tr style="background-color: Whitesmoke">
                        
                        <td><?php echo e($datapair->pair); ?></td>

                        

                        <td><?php echo e($datapair->value); ?></td>

                        

                        <td><?php echo e($datapair->bw_n); ?></td>
                        <td><?php echo e($datapair->bw_r1); ?></td>
                        <td><?php echo e($datapair->bw_r2); ?></td>
                        <td><?php echo e($datapair->bw_r3); ?></td>


                        
                        <td><?php echo e($datapair->bl_n); ?></td>
                        <td><?php echo e($datapair->bl_r1); ?></td>
                        <td><?php echo e($datapair->bl_r2); ?></td>
                        <td><?php echo e($datapair->bl_r3); ?></td>


                        
                        <td><?php echo e($datapair->sw_n); ?></td>
                        <td><?php echo e($datapair->sw_r1); ?></td>
                        <td><?php echo e($datapair->sw_r2); ?></td>
                        <td><?php echo e($datapair->sw_r3); ?></td>


                        
                        <td><?php echo e($datapair->sl_n); ?></td>
                        <td><?php echo e($datapair->sl_r1); ?></td>
                        <td><?php echo e($datapair->sl_r2); ?></td>
                        <td><?php echo e($datapair->sl_r3); ?></td>

                        
                        <?php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaCompras, 2)); ?></td>


                        
                        <?php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaVentas, 2)); ?></td>

                        
                        <?php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 ?>
                        <?php if($mejorBalance >= 56): ?>
                            <td style="background-color: #3f9d50"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php elseif($mejorBalance >= 50 && $mejorBalance < 56): ?>
                            <td style="background-color: #F2C94C"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php else: ?>
                            <td style="background-color: #ea5651"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php endif; ?>

                        


                    </tr>
                <?php endif; ?>

                <?php if($datapair->pair == 'USDCAD'): ?>
                    <tr style="background-color: Oldlace">
                        
                        <td><?php echo e($datapair->pair); ?></td>

                        

                        <td><?php echo e($datapair->value); ?></td>

                        

                        <td><?php echo e($datapair->bw_n); ?></td>
                        <td><?php echo e($datapair->bw_r1); ?></td>
                        <td><?php echo e($datapair->bw_r2); ?></td>
                        <td><?php echo e($datapair->bw_r3); ?></td>


                        
                        <td><?php echo e($datapair->bl_n); ?></td>
                        <td><?php echo e($datapair->bl_r1); ?></td>
                        <td><?php echo e($datapair->bl_r2); ?></td>
                        <td><?php echo e($datapair->bl_r3); ?></td>


                        
                        <td><?php echo e($datapair->sw_n); ?></td>
                        <td><?php echo e($datapair->sw_r1); ?></td>
                        <td><?php echo e($datapair->sw_r2); ?></td>
                        <td><?php echo e($datapair->sw_r3); ?></td>


                        
                        <td><?php echo e($datapair->sl_n); ?></td>
                        <td><?php echo e($datapair->sl_r1); ?></td>
                        <td><?php echo e($datapair->sl_r2); ?></td>
                        <td><?php echo e($datapair->sl_r3); ?></td>

                        
                        <?php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaCompras, 2)); ?></td>


                        
                        <?php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaVentas, 2)); ?></td>

                        
                        <?php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 ?>
                        <?php if($mejorBalance >= 56): ?>
                            <td style="background-color: #3f9d50"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php elseif($mejorBalance >= 50 && $mejorBalance < 56): ?>
                            <td style="background-color: #F2C94C"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php else: ?>
                            <td style="background-color: #ea5651"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php endif; ?>

                        


                    </tr>
                <?php endif; ?>

                <?php if($datapair->pair == 'USDCHF'): ?>
                    <tr style="background-color: Whitesmoke">
                        
                        <td><?php echo e($datapair->pair); ?></td>

                        

                        <td><?php echo e($datapair->value); ?></td>

                        

                        <td><?php echo e($datapair->bw_n); ?></td>
                        <td><?php echo e($datapair->bw_r1); ?></td>
                        <td><?php echo e($datapair->bw_r2); ?></td>
                        <td><?php echo e($datapair->bw_r3); ?></td>


                        
                        <td><?php echo e($datapair->bl_n); ?></td>
                        <td><?php echo e($datapair->bl_r1); ?></td>
                        <td><?php echo e($datapair->bl_r2); ?></td>
                        <td><?php echo e($datapair->bl_r3); ?></td>


                        
                        <td><?php echo e($datapair->sw_n); ?></td>
                        <td><?php echo e($datapair->sw_r1); ?></td>
                        <td><?php echo e($datapair->sw_r2); ?></td>
                        <td><?php echo e($datapair->sw_r3); ?></td>


                        
                        <td><?php echo e($datapair->sl_n); ?></td>
                        <td><?php echo e($datapair->sl_r1); ?></td>
                        <td><?php echo e($datapair->sl_r2); ?></td>
                        <td><?php echo e($datapair->sl_r3); ?></td>

                        
                        <?php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaCompras, 2)); ?></td>


                        
                        <?php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaVentas, 2)); ?></td>

                        
                        <?php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 ?>
                        <?php if($mejorBalance >= 56): ?>
                            <td style="background-color: #3f9d50"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php elseif($mejorBalance >= 50 && $mejorBalance < 56): ?>
                            <td style="background-color: #F2C94C"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php else: ?>
                            <td style="background-color: #ea5651"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php endif; ?>

                        


                    </tr>
                <?php endif; ?>

                <?php if($datapair->pair == 'USDJPY'): ?>
                    <tr style="background-color: Oldlace">
                        
                        <td><?php echo e($datapair->pair); ?></td>

                        

                        <td><?php echo e($datapair->value); ?></td>

                        

                        <td><?php echo e($datapair->bw_n); ?></td>
                        <td><?php echo e($datapair->bw_r1); ?></td>
                        <td><?php echo e($datapair->bw_r2); ?></td>
                        <td><?php echo e($datapair->bw_r3); ?></td>


                        
                        <td><?php echo e($datapair->bl_n); ?></td>
                        <td><?php echo e($datapair->bl_r1); ?></td>
                        <td><?php echo e($datapair->bl_r2); ?></td>
                        <td><?php echo e($datapair->bl_r3); ?></td>


                        
                        <td><?php echo e($datapair->sw_n); ?></td>
                        <td><?php echo e($datapair->sw_r1); ?></td>
                        <td><?php echo e($datapair->sw_r2); ?></td>
                        <td><?php echo e($datapair->sw_r3); ?></td>


                        
                        <td><?php echo e($datapair->sl_n); ?></td>
                        <td><?php echo e($datapair->sl_r1); ?></td>
                        <td><?php echo e($datapair->sl_r2); ?></td>
                        <td><?php echo e($datapair->sl_r3); ?></td>

                        
                        <?php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaCompras, 2)); ?></td>


                        
                        <?php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaVentas, 2)); ?></td>

                        
                        <?php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 ?>
                        <?php if($mejorBalance >= 56): ?>
                            <td style="background-color: #3f9d50"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php elseif($mejorBalance >= 50 && $mejorBalance < 56): ?>
                            <td style="background-color: #F2C94C"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php else: ?>
                            <td style="background-color: #ea5651"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php endif; ?>

                        


                    </tr>
                <?php endif; ?>

                <?php if($datapair->pair == 'EURGBP'): ?>
                    <tr style="background-color: Whitesmoke">
                        
                        <td><?php echo e($datapair->pair); ?></td>

                        

                        <td><?php echo e($datapair->value); ?></td>

                        

                        <td><?php echo e($datapair->bw_n); ?></td>
                        <td><?php echo e($datapair->bw_r1); ?></td>
                        <td><?php echo e($datapair->bw_r2); ?></td>
                        <td><?php echo e($datapair->bw_r3); ?></td>


                        
                        <td><?php echo e($datapair->bl_n); ?></td>
                        <td><?php echo e($datapair->bl_r1); ?></td>
                        <td><?php echo e($datapair->bl_r2); ?></td>
                        <td><?php echo e($datapair->bl_r3); ?></td>


                        
                        <td><?php echo e($datapair->sw_n); ?></td>
                        <td><?php echo e($datapair->sw_r1); ?></td>
                        <td><?php echo e($datapair->sw_r2); ?></td>
                        <td><?php echo e($datapair->sw_r3); ?></td>


                        
                        <td><?php echo e($datapair->sl_n); ?></td>
                        <td><?php echo e($datapair->sl_r1); ?></td>
                        <td><?php echo e($datapair->sl_r2); ?></td>
                        <td><?php echo e($datapair->sl_r3); ?></td>

                        
                        <?php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaCompras, 2)); ?></td>


                        
                        <?php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaVentas, 2)); ?></td>

                        
                        <?php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 ?>
                        <?php if($mejorBalance >= 56): ?>
                            <td style="background-color: #3f9d50"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php elseif($mejorBalance >= 50 && $mejorBalance < 56): ?>
                            <td style="background-color: #F2C94C"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php else: ?>
                            <td style="background-color: #ea5651"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php endif; ?>

                        


                    </tr>
                <?php endif; ?>

                <?php if($datapair->pair == 'EURAUD'): ?>
                    <tr style="background-color: Oldlace">
                        
                        <td><?php echo e($datapair->pair); ?></td>

                        

                        <td><?php echo e($datapair->value); ?></td>

                        

                        <td><?php echo e($datapair->bw_n); ?></td>
                        <td><?php echo e($datapair->bw_r1); ?></td>
                        <td><?php echo e($datapair->bw_r2); ?></td>
                        <td><?php echo e($datapair->bw_r3); ?></td>


                        
                        <td><?php echo e($datapair->bl_n); ?></td>
                        <td><?php echo e($datapair->bl_r1); ?></td>
                        <td><?php echo e($datapair->bl_r2); ?></td>
                        <td><?php echo e($datapair->bl_r3); ?></td>


                        
                        <td><?php echo e($datapair->sw_n); ?></td>
                        <td><?php echo e($datapair->sw_r1); ?></td>
                        <td><?php echo e($datapair->sw_r2); ?></td>
                        <td><?php echo e($datapair->sw_r3); ?></td>


                        
                        <td><?php echo e($datapair->sl_n); ?></td>
                        <td><?php echo e($datapair->sl_r1); ?></td>
                        <td><?php echo e($datapair->sl_r2); ?></td>
                        <td><?php echo e($datapair->sl_r3); ?></td>

                        
                        <?php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaCompras, 2)); ?></td>


                        
                        <?php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaVentas, 2)); ?></td>

                        
                        <?php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 ?>
                        <?php if($mejorBalance >= 56): ?>
                            <td style="background-color: #3f9d50"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php elseif($mejorBalance >= 50 && $mejorBalance < 56): ?>
                            <td style="background-color: #F2C94C"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php else: ?>
                            <td style="background-color: #ea5651"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php endif; ?>

                        


                    </tr>
                <?php endif; ?>

                <?php if($datapair->pair == 'EURNZD'): ?>
                    <tr style="background-color: Whitesmoke">
                        
                        <td><?php echo e($datapair->pair); ?></td>

                        

                        <td><?php echo e($datapair->value); ?></td>

                        

                        <td><?php echo e($datapair->bw_n); ?></td>
                        <td><?php echo e($datapair->bw_r1); ?></td>
                        <td><?php echo e($datapair->bw_r2); ?></td>
                        <td><?php echo e($datapair->bw_r3); ?></td>


                        
                        <td><?php echo e($datapair->bl_n); ?></td>
                        <td><?php echo e($datapair->bl_r1); ?></td>
                        <td><?php echo e($datapair->bl_r2); ?></td>
                        <td><?php echo e($datapair->bl_r3); ?></td>


                        
                        <td><?php echo e($datapair->sw_n); ?></td>
                        <td><?php echo e($datapair->sw_r1); ?></td>
                        <td><?php echo e($datapair->sw_r2); ?></td>
                        <td><?php echo e($datapair->sw_r3); ?></td>


                        
                        <td><?php echo e($datapair->sl_n); ?></td>
                        <td><?php echo e($datapair->sl_r1); ?></td>
                        <td><?php echo e($datapair->sl_r2); ?></td>
                        <td><?php echo e($datapair->sl_r3); ?></td>

                        
                        <?php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaCompras, 2)); ?></td>


                        
                        <?php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaVentas, 2)); ?></td>

                        
                        <?php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 ?>
                        <?php if($mejorBalance >= 56): ?>
                            <td style="background-color: #3f9d50"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php elseif($mejorBalance >= 50 && $mejorBalance < 56): ?>
                            <td style="background-color: #F2C94C"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php else: ?>
                            <td style="background-color: #ea5651"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php endif; ?>

                        


                    </tr>
                <?php endif; ?>

                <?php if($datapair->pair == 'GBPAUD'): ?>
                    <tr style="background-color: Oldlace">
                        
                        <td><?php echo e($datapair->pair); ?></td>

                        

                        <td><?php echo e($datapair->value); ?></td>

                        

                        <td><?php echo e($datapair->bw_n); ?></td>
                        <td><?php echo e($datapair->bw_r1); ?></td>
                        <td><?php echo e($datapair->bw_r2); ?></td>
                        <td><?php echo e($datapair->bw_r3); ?></td>


                        
                        <td><?php echo e($datapair->bl_n); ?></td>
                        <td><?php echo e($datapair->bl_r1); ?></td>
                        <td><?php echo e($datapair->bl_r2); ?></td>
                        <td><?php echo e($datapair->bl_r3); ?></td>


                        
                        <td><?php echo e($datapair->sw_n); ?></td>
                        <td><?php echo e($datapair->sw_r1); ?></td>
                        <td><?php echo e($datapair->sw_r2); ?></td>
                        <td><?php echo e($datapair->sw_r3); ?></td>


                        
                        <td><?php echo e($datapair->sl_n); ?></td>
                        <td><?php echo e($datapair->sl_r1); ?></td>
                        <td><?php echo e($datapair->sl_r2); ?></td>
                        <td><?php echo e($datapair->sl_r3); ?></td>

                        
                        <?php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaCompras, 2)); ?></td>


                        
                        <?php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaVentas, 2)); ?></td>

                        
                        <?php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 ?>
                        <?php if($mejorBalance >= 56): ?>
                            <td style="background-color: #3f9d50"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php elseif($mejorBalance >= 50 && $mejorBalance < 56): ?>
                            <td style="background-color: #F2C94C"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php else: ?>
                            <td style="background-color: #ea5651"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php endif; ?>

                        


                    </tr>
                <?php endif; ?>

                <?php if($datapair->pair == 'GBPNZD'): ?>
                    <tr style="background-color: Whitesmoke">
                        
                        <td><?php echo e($datapair->pair); ?></td>

                        

                        <td><?php echo e($datapair->value); ?></td>

                        

                        <td><?php echo e($datapair->bw_n); ?></td>
                        <td><?php echo e($datapair->bw_r1); ?></td>
                        <td><?php echo e($datapair->bw_r2); ?></td>
                        <td><?php echo e($datapair->bw_r3); ?></td>


                        
                        <td><?php echo e($datapair->bl_n); ?></td>
                        <td><?php echo e($datapair->bl_r1); ?></td>
                        <td><?php echo e($datapair->bl_r2); ?></td>
                        <td><?php echo e($datapair->bl_r3); ?></td>


                        
                        <td><?php echo e($datapair->sw_n); ?></td>
                        <td><?php echo e($datapair->sw_r1); ?></td>
                        <td><?php echo e($datapair->sw_r2); ?></td>
                        <td><?php echo e($datapair->sw_r3); ?></td>


                        
                        <td><?php echo e($datapair->sl_n); ?></td>
                        <td><?php echo e($datapair->sl_r1); ?></td>
                        <td><?php echo e($datapair->sl_r2); ?></td>
                        <td><?php echo e($datapair->sl_r3); ?></td>

                        
                        <?php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaCompras, 2)); ?></td>


                        
                        <?php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaVentas, 2)); ?></td>

                        
                        <?php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 ?>
                        <?php if($mejorBalance >= 56): ?>
                            <td style="background-color: #3f9d50"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php elseif($mejorBalance >= 50 && $mejorBalance < 56): ?>
                            <td style="background-color: #F2C94C"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php else: ?>
                            <td style="background-color: #ea5651"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php endif; ?>

                        


                    </tr>
                <?php endif; ?>

                <?php if($datapair->pair == 'AUDNZD'): ?>
                    <tr style="background-color: Oldlace">
                        
                        <td><?php echo e($datapair->pair); ?></td>

                        

                        <td><?php echo e($datapair->value); ?></td>

                        

                        <td><?php echo e($datapair->bw_n); ?></td>
                        <td><?php echo e($datapair->bw_r1); ?></td>
                        <td><?php echo e($datapair->bw_r2); ?></td>
                        <td><?php echo e($datapair->bw_r3); ?></td>


                        
                        <td><?php echo e($datapair->bl_n); ?></td>
                        <td><?php echo e($datapair->bl_r1); ?></td>
                        <td><?php echo e($datapair->bl_r2); ?></td>
                        <td><?php echo e($datapair->bl_r3); ?></td>


                        
                        <td><?php echo e($datapair->sw_n); ?></td>
                        <td><?php echo e($datapair->sw_r1); ?></td>
                        <td><?php echo e($datapair->sw_r2); ?></td>
                        <td><?php echo e($datapair->sw_r3); ?></td>


                        
                        <td><?php echo e($datapair->sl_n); ?></td>
                        <td><?php echo e($datapair->sl_r1); ?></td>
                        <td><?php echo e($datapair->sl_r2); ?></td>
                        <td><?php echo e($datapair->sl_r3); ?></td>

                        
                        <?php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaCompras, 2)); ?></td>


                        
                        <?php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaVentas, 2)); ?></td>

                        
                        <?php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 ?>
                        <?php if($mejorBalance >= 56): ?>
                            <td style="background-color: #3f9d50"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php elseif($mejorBalance >= 50 && $mejorBalance < 56): ?>
                            <td style="background-color: #F2C94C"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php else: ?>
                            <td style="background-color: #ea5651"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php endif; ?>

                        


                    </tr>
                <?php endif; ?>

                <?php if($datapair->pair == 'EURCAD'): ?>
                    <tr style="background-color: Whitesmoke">
                        
                        <td><?php echo e($datapair->pair); ?></td>

                        

                        <td><?php echo e($datapair->value); ?></td>

                        

                        <td><?php echo e($datapair->bw_n); ?></td>
                        <td><?php echo e($datapair->bw_r1); ?></td>
                        <td><?php echo e($datapair->bw_r2); ?></td>
                        <td><?php echo e($datapair->bw_r3); ?></td>


                        
                        <td><?php echo e($datapair->bl_n); ?></td>
                        <td><?php echo e($datapair->bl_r1); ?></td>
                        <td><?php echo e($datapair->bl_r2); ?></td>
                        <td><?php echo e($datapair->bl_r3); ?></td>


                        
                        <td><?php echo e($datapair->sw_n); ?></td>
                        <td><?php echo e($datapair->sw_r1); ?></td>
                        <td><?php echo e($datapair->sw_r2); ?></td>
                        <td><?php echo e($datapair->sw_r3); ?></td>


                        
                        <td><?php echo e($datapair->sl_n); ?></td>
                        <td><?php echo e($datapair->sl_r1); ?></td>
                        <td><?php echo e($datapair->sl_r2); ?></td>
                        <td><?php echo e($datapair->sl_r3); ?></td>

                        
                        <?php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaCompras, 2)); ?></td>


                        
                        <?php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaVentas, 2)); ?></td>

                        
                        <?php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 ?>
                        <?php if($mejorBalance >= 56): ?>
                            <td style="background-color: #3f9d50"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php elseif($mejorBalance >= 50 && $mejorBalance < 56): ?>
                            <td style="background-color: #F2C94C"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php else: ?>
                            <td style="background-color: #ea5651"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php endif; ?>

                        


                    </tr>
                <?php endif; ?>

                <?php if($datapair->pair == 'EURCHF'): ?>
                    <tr style="background-color: Oldlace">
                        
                        <td><?php echo e($datapair->pair); ?></td>

                        

                        <td><?php echo e($datapair->value); ?></td>

                        

                        <td><?php echo e($datapair->bw_n); ?></td>
                        <td><?php echo e($datapair->bw_r1); ?></td>
                        <td><?php echo e($datapair->bw_r2); ?></td>
                        <td><?php echo e($datapair->bw_r3); ?></td>


                        
                        <td><?php echo e($datapair->bl_n); ?></td>
                        <td><?php echo e($datapair->bl_r1); ?></td>
                        <td><?php echo e($datapair->bl_r2); ?></td>
                        <td><?php echo e($datapair->bl_r3); ?></td>


                        
                        <td><?php echo e($datapair->sw_n); ?></td>
                        <td><?php echo e($datapair->sw_r1); ?></td>
                        <td><?php echo e($datapair->sw_r2); ?></td>
                        <td><?php echo e($datapair->sw_r3); ?></td>


                        
                        <td><?php echo e($datapair->sl_n); ?></td>
                        <td><?php echo e($datapair->sl_r1); ?></td>
                        <td><?php echo e($datapair->sl_r2); ?></td>
                        <td><?php echo e($datapair->sl_r3); ?></td>

                        
                        <?php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaCompras, 2)); ?></td>


                        
                        <?php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaVentas, 2)); ?></td>

                        
                        <?php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 ?>
                        <?php if($mejorBalance >= 56): ?>
                            <td style="background-color: #3f9d50"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php elseif($mejorBalance >= 50 && $mejorBalance < 56): ?>
                            <td style="background-color: #F2C94C"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php else: ?>
                            <td style="background-color: #ea5651"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php endif; ?>

                        


                    </tr>
                <?php endif; ?>

                <?php if($datapair->pair == 'EURJPY'): ?>
                    <tr style="background-color: Whitesmoke">
                        
                        <td><?php echo e($datapair->pair); ?></td>

                        

                        <td><?php echo e($datapair->value); ?></td>

                        

                        <td><?php echo e($datapair->bw_n); ?></td>
                        <td><?php echo e($datapair->bw_r1); ?></td>
                        <td><?php echo e($datapair->bw_r2); ?></td>
                        <td><?php echo e($datapair->bw_r3); ?></td>


                        
                        <td><?php echo e($datapair->bl_n); ?></td>
                        <td><?php echo e($datapair->bl_r1); ?></td>
                        <td><?php echo e($datapair->bl_r2); ?></td>
                        <td><?php echo e($datapair->bl_r3); ?></td>


                        
                        <td><?php echo e($datapair->sw_n); ?></td>
                        <td><?php echo e($datapair->sw_r1); ?></td>
                        <td><?php echo e($datapair->sw_r2); ?></td>
                        <td><?php echo e($datapair->sw_r3); ?></td>


                        
                        <td><?php echo e($datapair->sl_n); ?></td>
                        <td><?php echo e($datapair->sl_r1); ?></td>
                        <td><?php echo e($datapair->sl_r2); ?></td>
                        <td><?php echo e($datapair->sl_r3); ?></td>

                        
                        <?php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaCompras, 2)); ?></td>


                        
                        <?php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaVentas, 2)); ?></td>

                        
                        <?php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 ?>
                        <?php if($mejorBalance >= 56): ?>
                            <td style="background-color: #3f9d50"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php elseif($mejorBalance >= 50 && $mejorBalance < 56): ?>
                            <td style="background-color: #F2C94C"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php else: ?>
                            <td style="background-color: #ea5651"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php endif; ?>

                        


                    </tr>
                <?php endif; ?>

                <?php if($datapair->pair == 'GBPCAD'): ?>
                    <tr style="background-color: Oldlace">
                        
                        <td><?php echo e($datapair->pair); ?></td>

                        

                        <td><?php echo e($datapair->value); ?></td>

                        

                        <td><?php echo e($datapair->bw_n); ?></td>
                        <td><?php echo e($datapair->bw_r1); ?></td>
                        <td><?php echo e($datapair->bw_r2); ?></td>
                        <td><?php echo e($datapair->bw_r3); ?></td>


                        
                        <td><?php echo e($datapair->bl_n); ?></td>
                        <td><?php echo e($datapair->bl_r1); ?></td>
                        <td><?php echo e($datapair->bl_r2); ?></td>
                        <td><?php echo e($datapair->bl_r3); ?></td>


                        
                        <td><?php echo e($datapair->sw_n); ?></td>
                        <td><?php echo e($datapair->sw_r1); ?></td>
                        <td><?php echo e($datapair->sw_r2); ?></td>
                        <td><?php echo e($datapair->sw_r3); ?></td>


                        
                        <td><?php echo e($datapair->sl_n); ?></td>
                        <td><?php echo e($datapair->sl_r1); ?></td>
                        <td><?php echo e($datapair->sl_r2); ?></td>
                        <td><?php echo e($datapair->sl_r3); ?></td>

                        
                        <?php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaCompras, 2)); ?></td>


                        
                        <?php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaVentas, 2)); ?></td>

                        
                        <?php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 ?>
                        <?php if($mejorBalance >= 56): ?>
                            <td style="background-color: #3f9d50"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php elseif($mejorBalance >= 50 && $mejorBalance < 56): ?>
                            <td style="background-color: #F2C94C"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php else: ?>
                            <td style="background-color: #ea5651"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php endif; ?>

                        


                    </tr>
                <?php endif; ?>


                <?php if($datapair->pair == 'GBPCHF'): ?>
                    <tr style="background-color: Whitesmoke">
                        
                        <td><?php echo e($datapair->pair); ?></td>

                        

                        <td><?php echo e($datapair->value); ?></td>

                        

                        <td><?php echo e($datapair->bw_n); ?></td>
                        <td><?php echo e($datapair->bw_r1); ?></td>
                        <td><?php echo e($datapair->bw_r2); ?></td>
                        <td><?php echo e($datapair->bw_r3); ?></td>


                        
                        <td><?php echo e($datapair->bl_n); ?></td>
                        <td><?php echo e($datapair->bl_r1); ?></td>
                        <td><?php echo e($datapair->bl_r2); ?></td>
                        <td><?php echo e($datapair->bl_r3); ?></td>


                        
                        <td><?php echo e($datapair->sw_n); ?></td>
                        <td><?php echo e($datapair->sw_r1); ?></td>
                        <td><?php echo e($datapair->sw_r2); ?></td>
                        <td><?php echo e($datapair->sw_r3); ?></td>


                        
                        <td><?php echo e($datapair->sl_n); ?></td>
                        <td><?php echo e($datapair->sl_r1); ?></td>
                        <td><?php echo e($datapair->sl_r2); ?></td>
                        <td><?php echo e($datapair->sl_r3); ?></td>

                        
                        <?php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaCompras, 2)); ?></td>


                        
                        <?php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaVentas, 2)); ?></td>

                        
                        <?php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 ?>
                        <?php if($mejorBalance >= 56): ?>
                            <td style="background-color: #3f9d50"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php elseif($mejorBalance >= 50 && $mejorBalance < 56): ?>
                            <td style="background-color: #F2C94C"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php else: ?>
                            <td style="background-color: #ea5651"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php endif; ?>

                        


                    </tr>
                <?php endif; ?>

                <?php if($datapair->pair == 'GBPJPY'): ?>
                    <tr style="background-color: Oldlace">
                        
                        <td><?php echo e($datapair->pair); ?></td>

                        

                        <td><?php echo e($datapair->value); ?></td>

                        

                        <td><?php echo e($datapair->bw_n); ?></td>
                        <td><?php echo e($datapair->bw_r1); ?></td>
                        <td><?php echo e($datapair->bw_r2); ?></td>
                        <td><?php echo e($datapair->bw_r3); ?></td>


                        
                        <td><?php echo e($datapair->bl_n); ?></td>
                        <td><?php echo e($datapair->bl_r1); ?></td>
                        <td><?php echo e($datapair->bl_r2); ?></td>
                        <td><?php echo e($datapair->bl_r3); ?></td>


                        
                        <td><?php echo e($datapair->sw_n); ?></td>
                        <td><?php echo e($datapair->sw_r1); ?></td>
                        <td><?php echo e($datapair->sw_r2); ?></td>
                        <td><?php echo e($datapair->sw_r3); ?></td>


                        
                        <td><?php echo e($datapair->sl_n); ?></td>
                        <td><?php echo e($datapair->sl_r1); ?></td>
                        <td><?php echo e($datapair->sl_r2); ?></td>
                        <td><?php echo e($datapair->sl_r3); ?></td>

                        
                        <?php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaCompras, 2)); ?></td>


                        
                        <?php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaVentas, 2)); ?></td>

                        
                        <?php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 ?>
                        <?php if($mejorBalance >= 56): ?>
                            <td style="background-color: #3f9d50"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php elseif($mejorBalance >= 50 && $mejorBalance < 56): ?>
                            <td style="background-color: #F2C94C"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php else: ?>
                            <td style="background-color: #ea5651"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php endif; ?>

                       

                    </tr>
                <?php endif; ?>

                <?php if($datapair->pair == 'AUDCAD'): ?>
                    <tr style="background-color: Whitesmoke">
                        
                        <td><?php echo e($datapair->pair); ?></td>

                        

                        <td><?php echo e($datapair->value); ?></td>

                        

                        <td><?php echo e($datapair->bw_n); ?></td>
                        <td><?php echo e($datapair->bw_r1); ?></td>
                        <td><?php echo e($datapair->bw_r2); ?></td>
                        <td><?php echo e($datapair->bw_r3); ?></td>


                        
                        <td><?php echo e($datapair->bl_n); ?></td>
                        <td><?php echo e($datapair->bl_r1); ?></td>
                        <td><?php echo e($datapair->bl_r2); ?></td>
                        <td><?php echo e($datapair->bl_r3); ?></td>


                        
                        <td><?php echo e($datapair->sw_n); ?></td>
                        <td><?php echo e($datapair->sw_r1); ?></td>
                        <td><?php echo e($datapair->sw_r2); ?></td>
                        <td><?php echo e($datapair->sw_r3); ?></td>


                        
                        <td><?php echo e($datapair->sl_n); ?></td>
                        <td><?php echo e($datapair->sl_r1); ?></td>
                        <td><?php echo e($datapair->sl_r2); ?></td>
                        <td><?php echo e($datapair->sl_r3); ?></td>

                        
                        <?php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaCompras, 2)); ?></td>


                        
                        <?php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaVentas, 2)); ?></td>

                        
                        <?php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 ?>
                        <?php if($mejorBalance >= 56): ?>
                            <td style="background-color: #3f9d50"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php elseif($mejorBalance >= 50 && $mejorBalance < 56): ?>
                            <td style="background-color: #F2C94C"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php else: ?>
                            <td style="background-color: #ea5651"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php endif; ?>

                        


                    </tr>
                <?php endif; ?>

                <?php if($datapair->pair == 'AUDCHF'): ?>
                    <tr style="background-color: Oldlace">
                        
                        <td><?php echo e($datapair->pair); ?></td>

                        

                        <td><?php echo e($datapair->value); ?></td>

                        

                        <td><?php echo e($datapair->bw_n); ?></td>
                        <td><?php echo e($datapair->bw_r1); ?></td>
                        <td><?php echo e($datapair->bw_r2); ?></td>
                        <td><?php echo e($datapair->bw_r3); ?></td>


                        
                        <td><?php echo e($datapair->bl_n); ?></td>
                        <td><?php echo e($datapair->bl_r1); ?></td>
                        <td><?php echo e($datapair->bl_r2); ?></td>
                        <td><?php echo e($datapair->bl_r3); ?></td>


                        
                        <td><?php echo e($datapair->sw_n); ?></td>
                        <td><?php echo e($datapair->sw_r1); ?></td>
                        <td><?php echo e($datapair->sw_r2); ?></td>
                        <td><?php echo e($datapair->sw_r3); ?></td>


                        
                        <td><?php echo e($datapair->sl_n); ?></td>
                        <td><?php echo e($datapair->sl_r1); ?></td>
                        <td><?php echo e($datapair->sl_r2); ?></td>
                        <td><?php echo e($datapair->sl_r3); ?></td>

                        
                        <?php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaCompras, 2)); ?></td>


                        
                        <?php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaVentas, 2)); ?></td>

                        
                        <?php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 ?>
                        <?php if($mejorBalance >= 56): ?>
                            <td style="background-color: #3f9d50"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php elseif($mejorBalance >= 50 && $mejorBalance < 56): ?>
                            <td style="background-color: #F2C94C"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php else: ?>
                            <td style="background-color: #ea5651"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php endif; ?>

                        


                    </tr>
                <?php endif; ?>

                <?php if($datapair->pair == 'AUDJPY'): ?>
                    <tr style="background-color: Whitesmoke">
                        
                        <td><?php echo e($datapair->pair); ?></td>

                        

                        <td><?php echo e($datapair->value); ?></td>

                        

                        <td><?php echo e($datapair->bw_n); ?></td>
                        <td><?php echo e($datapair->bw_r1); ?></td>
                        <td><?php echo e($datapair->bw_r2); ?></td>
                        <td><?php echo e($datapair->bw_r3); ?></td>


                        
                        <td><?php echo e($datapair->bl_n); ?></td>
                        <td><?php echo e($datapair->bl_r1); ?></td>
                        <td><?php echo e($datapair->bl_r2); ?></td>
                        <td><?php echo e($datapair->bl_r3); ?></td>


                        
                        <td><?php echo e($datapair->sw_n); ?></td>
                        <td><?php echo e($datapair->sw_r1); ?></td>
                        <td><?php echo e($datapair->sw_r2); ?></td>
                        <td><?php echo e($datapair->sw_r3); ?></td>


                        
                        <td><?php echo e($datapair->sl_n); ?></td>
                        <td><?php echo e($datapair->sl_r1); ?></td>
                        <td><?php echo e($datapair->sl_r2); ?></td>
                        <td><?php echo e($datapair->sl_r3); ?></td>

                        
                        <?php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaCompras, 2)); ?></td>


                        
                        <?php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaVentas, 2)); ?></td>

                        
                        <?php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 ?>
                        <?php if($mejorBalance >= 56): ?>
                            <td style="background-color: #3f9d50"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php elseif($mejorBalance >= 50 && $mejorBalance < 56): ?>
                            <td style="background-color: #F2C94C"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php else: ?>
                            <td style="background-color: #ea5651"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php endif; ?>

                        


                    </tr>
                <?php endif; ?>

                <?php if($datapair->pair == 'NZDCAD'): ?>
                    <tr style="background-color: Oldlace">
                        
                        <td><?php echo e($datapair->pair); ?></td>

                        

                        <td><?php echo e($datapair->value); ?></td>

                        

                        <td><?php echo e($datapair->bw_n); ?></td>
                        <td><?php echo e($datapair->bw_r1); ?></td>
                        <td><?php echo e($datapair->bw_r2); ?></td>
                        <td><?php echo e($datapair->bw_r3); ?></td>


                        
                        <td><?php echo e($datapair->bl_n); ?></td>
                        <td><?php echo e($datapair->bl_r1); ?></td>
                        <td><?php echo e($datapair->bl_r2); ?></td>
                        <td><?php echo e($datapair->bl_r3); ?></td>


                        
                        <td><?php echo e($datapair->sw_n); ?></td>
                        <td><?php echo e($datapair->sw_r1); ?></td>
                        <td><?php echo e($datapair->sw_r2); ?></td>
                        <td><?php echo e($datapair->sw_r3); ?></td>


                        
                        <td><?php echo e($datapair->sl_n); ?></td>
                        <td><?php echo e($datapair->sl_r1); ?></td>
                        <td><?php echo e($datapair->sl_r2); ?></td>
                        <td><?php echo e($datapair->sl_r3); ?></td>

                        
                        <?php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaCompras, 2)); ?></td>


                        
                        <?php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaVentas, 2)); ?></td>

                        
                        <?php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 ?>
                        <?php if($mejorBalance >= 56): ?>
                            <td style="background-color: #3f9d50"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php elseif($mejorBalance >= 50 && $mejorBalance < 56): ?>
                            <td style="background-color: #F2C94C"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php else: ?>
                            <td style="background-color: #ea5651"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php endif; ?>

                        


                    </tr>
                <?php endif; ?>

                <?php if($datapair->pair == 'NZDCHF'): ?>
                    <tr style="background-color: Whitesmoke">
                        
                        <td><?php echo e($datapair->pair); ?></td>

                        

                        <td><?php echo e($datapair->value); ?></td>

                        

                        <td><?php echo e($datapair->bw_n); ?></td>
                        <td><?php echo e($datapair->bw_r1); ?></td>
                        <td><?php echo e($datapair->bw_r2); ?></td>
                        <td><?php echo e($datapair->bw_r3); ?></td>


                        
                        <td><?php echo e($datapair->bl_n); ?></td>
                        <td><?php echo e($datapair->bl_r1); ?></td>
                        <td><?php echo e($datapair->bl_r2); ?></td>
                        <td><?php echo e($datapair->bl_r3); ?></td>


                        
                        <td><?php echo e($datapair->sw_n); ?></td>
                        <td><?php echo e($datapair->sw_r1); ?></td>
                        <td><?php echo e($datapair->sw_r2); ?></td>
                        <td><?php echo e($datapair->sw_r3); ?></td>


                        
                        <td><?php echo e($datapair->sl_n); ?></td>
                        <td><?php echo e($datapair->sl_r1); ?></td>
                        <td><?php echo e($datapair->sl_r2); ?></td>
                        <td><?php echo e($datapair->sl_r3); ?></td>

                        
                        <?php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaCompras, 2)); ?></td>


                        
                        <?php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaVentas, 2)); ?></td>

                        
                        <?php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 ?>
                        <?php if($mejorBalance >= 56): ?>
                            <td style="background-color: #3f9d50"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php elseif($mejorBalance >= 50 && $mejorBalance < 56): ?>
                            <td style="background-color: #F2C94C"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php else: ?>
                            <td style="background-color: #ea5651"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php endif; ?>

                        


                    </tr>
                <?php endif; ?>


                <?php if($datapair->pair == 'NZDJPY'): ?>
                    <tr style="background-color: Oldlace">
                        
                        <td><?php echo e($datapair->pair); ?></td>

                        

                        <td><?php echo e($datapair->value); ?></td>

                        

                        <td><?php echo e($datapair->bw_n); ?></td>
                        <td><?php echo e($datapair->bw_r1); ?></td>
                        <td><?php echo e($datapair->bw_r2); ?></td>
                        <td><?php echo e($datapair->bw_r3); ?></td>


                        
                        <td><?php echo e($datapair->bl_n); ?></td>
                        <td><?php echo e($datapair->bl_r1); ?></td>
                        <td><?php echo e($datapair->bl_r2); ?></td>
                        <td><?php echo e($datapair->bl_r3); ?></td>


                        
                        <td><?php echo e($datapair->sw_n); ?></td>
                        <td><?php echo e($datapair->sw_r1); ?></td>
                        <td><?php echo e($datapair->sw_r2); ?></td>
                        <td><?php echo e($datapair->sw_r3); ?></td>


                        
                        <td><?php echo e($datapair->sl_n); ?></td>
                        <td><?php echo e($datapair->sl_r1); ?></td>
                        <td><?php echo e($datapair->sl_r2); ?></td>
                        <td><?php echo e($datapair->sl_r3); ?></td>

                        
                        <?php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaCompras, 2)); ?></td>


                        
                        <?php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaVentas, 2)); ?></td>

                        
                        <?php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 ?>
                        <?php if($mejorBalance >= 56): ?>
                            <td style="background-color: #3f9d50"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php elseif($mejorBalance >= 50 && $mejorBalance < 56): ?>
                            <td style="background-color: #F2C94C"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php else: ?>
                            <td style="background-color: #ea5651"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php endif; ?>

                        


                    </tr>
                <?php endif; ?>

                <?php if($datapair->pair == 'CADCHF'): ?>
                    <tr style="background-color: Whitesmoke">
                        
                        <td><?php echo e($datapair->pair); ?></td>

                        

                        <td><?php echo e($datapair->value); ?></td>

                        

                        <td><?php echo e($datapair->bw_n); ?></td>
                        <td><?php echo e($datapair->bw_r1); ?></td>
                        <td><?php echo e($datapair->bw_r2); ?></td>
                        <td><?php echo e($datapair->bw_r3); ?></td>


                        
                        <td><?php echo e($datapair->bl_n); ?></td>
                        <td><?php echo e($datapair->bl_r1); ?></td>
                        <td><?php echo e($datapair->bl_r2); ?></td>
                        <td><?php echo e($datapair->bl_r3); ?></td>


                        
                        <td><?php echo e($datapair->sw_n); ?></td>
                        <td><?php echo e($datapair->sw_r1); ?></td>
                        <td><?php echo e($datapair->sw_r2); ?></td>
                        <td><?php echo e($datapair->sw_r3); ?></td>


                        
                        <td><?php echo e($datapair->sl_n); ?></td>
                        <td><?php echo e($datapair->sl_r1); ?></td>
                        <td><?php echo e($datapair->sl_r2); ?></td>
                        <td><?php echo e($datapair->sl_r3); ?></td>

                        
                        <?php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaCompras, 2)); ?></td>


                        
                        <?php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaVentas, 2)); ?></td>

                        
                        <?php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 ?>
                        <?php if($mejorBalance >= 56): ?>
                            <td style="background-color: #3f9d50"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php elseif($mejorBalance >= 50 && $mejorBalance < 56): ?>
                            <td style="background-color: #F2C94C"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php else: ?>
                            <td style="background-color: #ea5651"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php endif; ?>

                        


                    </tr>
                <?php endif; ?>

                <?php if($datapair->pair == 'CADJPY'): ?>
                    <tr style="background-color: Oldlace">
                        
                        <td><?php echo e($datapair->pair); ?></td>

                        

                        <td><?php echo e($datapair->value); ?></td>

                        

                        <td><?php echo e($datapair->bw_n); ?></td>
                        <td><?php echo e($datapair->bw_r1); ?></td>
                        <td><?php echo e($datapair->bw_r2); ?></td>
                        <td><?php echo e($datapair->bw_r3); ?></td>


                        
                        <td><?php echo e($datapair->bl_n); ?></td>
                        <td><?php echo e($datapair->bl_r1); ?></td>
                        <td><?php echo e($datapair->bl_r2); ?></td>
                        <td><?php echo e($datapair->bl_r3); ?></td>


                        
                        <td><?php echo e($datapair->sw_n); ?></td>
                        <td><?php echo e($datapair->sw_r1); ?></td>
                        <td><?php echo e($datapair->sw_r2); ?></td>
                        <td><?php echo e($datapair->sw_r3); ?></td>


                        
                        <td><?php echo e($datapair->sl_n); ?></td>
                        <td><?php echo e($datapair->sl_r1); ?></td>
                        <td><?php echo e($datapair->sl_r2); ?></td>
                        <td><?php echo e($datapair->sl_r3); ?></td>

                        
                        <?php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaCompras, 2)); ?></td>


                        
                        <?php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaVentas, 2)); ?></td>

                        
                        <?php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 ?>
                        <?php if($mejorBalance >= 56): ?>
                            <td style="background-color: #3f9d50"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php elseif($mejorBalance >= 50 && $mejorBalance < 56): ?>
                            <td style="background-color: #F2C94C"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php else: ?>
                            <td style="background-color: #ea5651"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php endif; ?>

                        


                    </tr>
                <?php endif; ?>

                <?php if($datapair->pair == 'CHFJPY'): ?>
                    <tr style="background-color: Whitesmoke">
                        
                        <td><?php echo e($datapair->pair); ?></td>

                        

                        <td><?php echo e($datapair->value); ?></td>

                        

                        <td><?php echo e($datapair->bw_n); ?></td>
                        <td><?php echo e($datapair->bw_r1); ?></td>
                        <td><?php echo e($datapair->bw_r2); ?></td>
                        <td><?php echo e($datapair->bw_r3); ?></td>


                        
                        <td><?php echo e($datapair->bl_n); ?></td>
                        <td><?php echo e($datapair->bl_r1); ?></td>
                        <td><?php echo e($datapair->bl_r2); ?></td>
                        <td><?php echo e($datapair->bl_r3); ?></td>


                        
                        <td><?php echo e($datapair->sw_n); ?></td>
                        <td><?php echo e($datapair->sw_r1); ?></td>
                        <td><?php echo e($datapair->sw_r2); ?></td>
                        <td><?php echo e($datapair->sw_r3); ?></td>


                        
                        <td><?php echo e($datapair->sl_n); ?></td>
                        <td><?php echo e($datapair->sl_r1); ?></td>
                        <td><?php echo e($datapair->sl_r2); ?></td>
                        <td><?php echo e($datapair->sl_r3); ?></td>

                        
                        <?php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaCompras, 2)); ?></td>


                        
                        <?php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 ?>
                        <td><?php echo e(number_format($eficienciaVentas, 2)); ?></td>

                        
                        <?php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 ?>
                        <?php if($mejorBalance >= 56): ?>
                            <td style="background-color: #3f9d50"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php elseif($mejorBalance >= 50 && $mejorBalance < 56): ?>
                            <td style="background-color: #F2C94C"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php else: ?>
                            <td style="background-color: #ea5651"><?php echo e(number_format($mejorBalance, 2)); ?></td>
                        <?php endif; ?>

                        


                    </tr>
                <?php endif; ?>
            <?php elseif($registros == 0): ?>
                <tr>
                    <td colspan="20">No hay registros</td>
                </tr>
            <?php endif; ?>


        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table>
</div>
</body>

</html>
<?php /**PATH C:\laragon\www\traders\resources\views/estudio/imprimir.blade.php ENDPATH**/ ?>