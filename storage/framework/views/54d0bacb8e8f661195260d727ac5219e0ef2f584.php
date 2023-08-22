<?php if($condicional): ?>
    <?php
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_eurusd = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumabuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $voleurusd_sell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $voleurusd_buy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        
        foreach ($magiceurusd as $eurusd) {
            $magiceurusdsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $eurusd->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $eurusd->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiceurusdsell_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $eurusd->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $eurusd->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiceurusdbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $eurusd->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $eurusd->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiceurusdbuy_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $eurusd->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $eurusd->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $eurusd->serie_magic) {
                $sumarest += $eurusd->profit;
            } else {
                $sumarest = $eurusd->profit;
            }
        
            $rest = substr($eurusd->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_eurusd[$i] = $sumarest;
                    $sumasell_array[$i] = $magiceurusdsell->sumsell;
                    $sumabuy_array[$i] = $magiceurusdbuy->sumbuy;
        
                    if (empty($magiceurusdsell_vol)) {
                        $voleurusd_sell_array[$i] = 0;
                    } else {
                        $voleurusd_sell_array[$i] = $magiceurusdsell_vol->volume;
                    }
        
                    if (empty($magiceurusdbuy_vol)) {
                        $voleurusd_buy_array[$i] = 0;
                    } else {
                        $voleurusd_buy_array[$i] = $magiceurusdbuy_vol->volume;
                    }
                }
        
                if ($sumasell_array[$i] == null) {
                    $sumasell_array[$i] = 0;
                }
                if ($sumabuy_array[$i] == null) {
                    $sumabuy_array[$i] = 0;
                }
                if ($voleurusd_sell_array[$i] == null) {
                    $voleurusd_sell_array[$i] = 0;
                }
                if ($voleurusd_buy_array[$i] == null) {
                    $voleurusd_buy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $eurusd->serie_magic;
        }
        $suma_eurusd = array_sum($array_eurusd);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_gbpusd = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumagbpusdsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumagbpusdbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volgbpusd_sell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volgbpusd_buy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        
        foreach ($magicgbpusd as $gbpusd) {
            $magicgbpusdsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $gbpusd->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $gbpusd->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicgbpusdbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $gbpusd->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $gbpusd->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicgbpusdsell_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $gbpusd->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $gbpusd->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicgbpusdbuy_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $gbpusd->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', "$gbpusd->magicnumber")
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $gbpusd->serie_magic) {
                $sumarest += $gbpusd->profit;
            } else {
                $sumarest = $gbpusd->profit;
            }
        
            $rest = substr($gbpusd->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_gbpusd[$i] = $sumarest;
                    $sumagbpusdsell_array[$i] = $magicgbpusdsell->sumsell;
                    $sumagbpusdbuy_array[$i] = $magicgbpusdbuy->sumbuy;
        
                    if (empty($magicgbpusdsell_vol)) {
                        $volgbpusd_sell_array[$i] = 0;
                    } else {
                        $volgbpusd_sell_array[$i] = $magicgbpusdsell_vol->volume;
                    }
        
                    if (empty($magicgbpusdbuy_vol)) {
                        $volgbpusd_buy_array[$i] = 0;
                    } else {
                        $volgbpusd_buy_array[$i] = $magicgbpusdbuy_vol->volume;
                    }
                }
                if ($sumagbpusdsell_array[$i] == null) {
                    $sumagbpusdsell_array[$i] = 0;
                }
                if ($sumagbpusdbuy_array[$i] == null) {
                    $sumagbpusdbuy_array[$i] = 0;
                }
                if ($volgbpusd_sell_array[$i] == null) {
                    $volgbpusd_sell_array[$i] = 0;
                }
                if ($volgbpusd_buy_array[$i] == null) {
                    $volgbpusd_buy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $gbpusd->serie_magic;
        }
        
        $suma_gbpusd = array_sum($array_gbpusd);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_audusd = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaaudusdsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaaudusdbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volaudusd_sell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volaudusd_buy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicaudusd as $audusd) {
            $magicaudusdsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $audusd->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $audusd->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicaudusdbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $audusd->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $audusd->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicaudusdsell_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $audusd->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', "$audusd->magicnumber")
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicaudusdbuy_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $audusd->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', "$audusd->magicnumber")
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $audusd->serie_magic) {
                $sumarest += $audusd->profit;
            } else {
                $sumarest = $audusd->profit;
            }
        
            $rest = substr($audusd->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_audusd[$i] = $sumarest;
                    $sumaaudusdsell_array[$i] = $magicaudusdsell->sumsell;
                    $sumaaudusdbuy_array[$i] = $magicaudusdbuy->sumbuy;
        
                    if (empty($magicaudusdsell_vol)) {
                        $volaudusd_sell_array[$i] = 0;
                    } else {
                        $volaudusd_sell_array[$i] = $magicaudusdsell_vol->volume;
                    }
        
                    if (empty($magicaudusdbuy_vol)) {
                        $volaudusd_buy_array[$i] = 0;
                    } else {
                        $volaudusd_buy_array[$i] = $magicaudusdbuy_vol->volume;
                    }
                }
                if ($sumaaudusdsell_array[$i] == null) {
                    $sumaaudusdsell_array[$i] = 0;
                }
                if ($sumaaudusdbuy_array[$i] == null) {
                    $sumaaudusdbuy_array[$i] = 0;
                }
                if ($volaudusd_sell_array[$i] == null) {
                    $volaudusd_sell_array[$i] = 0;
                }
                if ($volaudusd_buy_array[$i] == null) {
                    $volaudusd_buy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $audusd->serie_magic;
        }
        
        $suma_audusd = array_sum($array_audusd);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_nzdusd = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumanzdusdsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumanzdusdbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volnzdusd_sell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volnzdusd_buy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicnzdusd as $nzdusd) {
            $magicnzdusdsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $nzdusd->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $nzdusd->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicnzdusdbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $nzdusd->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $nzdusd->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicnzdusdsell_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $nzdusd->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', "$nzdusd->magicnumber")
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicnzdusdbuy_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $nzdusd->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', "$nzdusd->magicnumber")
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $nzdusd->serie_magic) {
                $sumarest += $nzdusd->profit;
            } else {
                $sumarest = $nzdusd->profit;
            }
        
            $rest = substr($nzdusd->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_nzdusd[$i] = $sumarest;
                    $sumanzdusdsell_array[$i] = $magicnzdusdsell->sumsell;
                    $sumanzdusdbuy_array[$i] = $magicnzdusdbuy->sumbuy;
        
                    if (empty($magicnzdusdsell_vol)) {
                        $volnzdusd_sell_array[$i] = 0;
                    } else {
                        $volnzdusd_sell_array[$i] = $magicnzdusdsell_vol->volume;
                    }
        
                    if (empty($magicnzdusdbuy_vol)) {
                        $volnzdusd_buy_array[$i] = 0;
                    } else {
                        $volnzdusd_buy_array[$i] = $magicnzdusdbuy_vol->volume;
                    }
                }
                if ($sumanzdusdsell_array[$i] == null) {
                    $sumanzdusdsell_array[$i] = 0;
                }
                if ($sumanzdusdbuy_array[$i] == null) {
                    $sumanzdusdbuy_array[$i] = 0;
                }
                if ($volnzdusd_sell_array[$i] == null) {
                    $volnzdusd_sell_array[$i] = 0;
                }
                if ($volnzdusd_buy_array[$i] == null) {
                    $volnzdusd_buy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $nzdusd->serie_magic;
        }
        
        $suma_nzdusd = array_sum($array_nzdusd);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_usdcad = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumausdcadsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumausdcadbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volusdcad_sell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volusdcad_buy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicusdcad as $usdcad) {
            $magicusdcadsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $usdcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $usdcad->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicusdcadbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $usdcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $usdcad->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicusdcadsell_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $usdcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $usdcad->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicusdcadbuy_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $usdcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $usdcad->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $usdcad->serie_magic) {
                $sumarest += $usdcad->profit;
            } else {
                $sumarest = $usdcad->profit;
            }
        
            $rest = substr($usdcad->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_usdcad[$i] = $sumarest;
                    $sumausdcadsell_array[$i] = $magicusdcadsell->sumsell;
                    $sumausdcadbuy_array[$i] = $magicusdcadbuy->sumbuy;
        
                    if (empty($magicusdcadsell_vol)) {
                        $volusdcad_sell_array[$i] = 0;
                    } else {
                        $volusdcad_sell_array[$i] = $magicusdcadsell_vol->volume;
                    }
        
                    if (empty($magicusdcadbuy_vol)) {
                        $volusdcad_buy_array[$i] = 0;
                    } else {
                        $volusdcad_buy_array[$i] = $magicusdcadbuy_vol->volume;
                    }
                }
                if ($sumausdcadsell_array[$i] == null) {
                    $sumausdcadsell_array[$i] = 0;
                }
                if ($sumausdcadbuy_array[$i] == null) {
                    $sumausdcadbuy_array[$i] = 0;
                }
                if ($volusdcad_sell_array[$i] == null) {
                    $volusdcad_sell_array[$i] = 0;
                }
                if ($volusdcad_buy_array[$i] == null) {
                    $volusdcad_buy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $usdcad->serie_magic;
        }
        
        $suma_usdcad = array_sum($array_usdcad);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_usdchf = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumausdchfsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumausdchfbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volusdchf_sell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volusdchf_buy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicusdchf as $usdchf) {
            $magicusdchfsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $usdchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $usdchf->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicusdchfbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $usdchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $usdchf->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicusdchfsell_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $usdchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', "$usdchf->magicnumber")
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicusdchfbuy_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $usdchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', "$usdchf->magicnumber")
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $usdchf->serie_magic) {
                $sumarest += $usdchf->profit;
            } else {
                $sumarest = $usdchf->profit;
            }
        
            $rest = substr($usdchf->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_usdchf[$i] = $sumarest;
                    $sumausdchfsell_array[$i] = $magicusdchfsell->sumsell;
                    $sumausdchfbuy_array[$i] = $magicusdchfbuy->sumbuy;
        
                    if (empty($magicusdchfsell_vol)) {
                        $volusdchf_sell_array[$i] = 0;
                    } else {
                        $volusdchf_sell_array[$i] = $magicusdchfsell_vol->volume;
                    }
        
                    if (empty($magicusdchfbuy_vol)) {
                        $volusdchf_buy_array[$i] = 0;
                    } else {
                        $volusdchf_buy_array[$i] = $magicusdchfbuy_vol->volume;
                    }
                }
                if ($sumausdchfsell_array[$i] == null) {
                    $sumausdchfsell_array[$i] = 0;
                }
                if ($sumausdchfbuy_array[$i] == null) {
                    $sumausdchfbuy_array[$i] = 0;
                }
                if ($volusdchf_sell_array[$i] == null) {
                    $volusdchf_sell_array[$i] = 0;
                }
                if ($volusdchf_buy_array[$i] == null) {
                    $volusdchf_buy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $usdchf->serie_magic;
        }
        
        $suma_usdchf = array_sum($array_usdchf);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_usdjpy = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumausdjpysell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumausdjpybuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volusdjpy_sell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volusdjpy_buy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicusdjpy as $usdjpy) {
            $magicusdjpysell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $usdjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $usdjpy->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicusdjpybuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $usdjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $usdjpy->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicusdjpysell_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $usdjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', "$usdjpy->magicnumber")
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicusdjpybuy_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $usdjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', "$usdjpy->magicnumber")
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $usdjpy->serie_magic) {
                $sumarest += $usdjpy->profit;
            } else {
                $sumarest = $usdjpy->profit;
            }
        
            $rest = substr($usdjpy->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_usdjpy[$i] = $sumarest;
                    $sumausdjpysell_array[$i] = $magicusdjpysell->sumsell;
                    $sumausdjpybuy_array[$i] = $magicusdjpybuy->sumbuy;
        
                    if (empty($magicusdjpysell_vol)) {
                        $volusdjpy_sell_array[$i] = 0;
                    } else {
                        $volusdjpy_sell_array[$i] = $magicusdjpysell_vol->volume;
                    }
        
                    if (empty($magicusdjpybuy_vol)) {
                        $volusdjpy_buy_array[$i] = 0;
                    } else {
                        $volusdjpy_buy_array[$i] = $magicusdjpybuy_vol->volume;
                    }
                }
                if ($sumausdjpysell_array[$i] == null) {
                    $sumausdjpysell_array[$i] = 0;
                }
                if ($sumausdjpybuy_array[$i] == null) {
                    $sumausdjpybuy_array[$i] = 0;
                }
                if ($volusdjpy_sell_array[$i] == null) {
                    $volusdjpy_sell_array[$i] = 0;
                }
                if ($volusdjpy_buy_array[$i] == null) {
                    $volusdjpy_buy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $usdjpy->serie_magic;
        }
        
        $suma_usdjpy = array_sum($array_usdjpy);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_eurgbp = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaeurgbpsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaeurgbpbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $voleurgbp_sell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $voleurgbp_buy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magiceurgbp as $eurgbp) {
            $magiceurgbpsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $eurgbp->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $eurgbp->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiceurgbpbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $eurgbp->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $eurgbp->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiceurgbpsell_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $eurgbp->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', "$eurgbp->magicnumber")
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiceurgbpbuy_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $eurgbp->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', "$eurgbp->magicnumber")
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $eurgbp->serie_magic) {
                $sumarest += $eurgbp->profit;
            } else {
                $sumarest = $eurgbp->profit;
            }
        
            $rest = substr($eurgbp->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_eurgbp[$i] = $sumarest;
                    $sumaeurgbpsell_array[$i] = $magiceurgbpsell->sumsell;
                    $sumaeurgbpbuy_array[$i] = $magiceurgbpbuy->sumbuy;
        
                    if (empty($magiceurgbpsell_vol)) {
                        $voleurgbp_sell_array[$i] = 0;
                    } else {
                        $voleurgbp_sell_array[$i] = $magiceurgbpsell_vol->volume;
                    }
        
                    if (empty($magiceurgbpbuy_vol)) {
                        $voleurgbp_buy_array[$i] = 0;
                    } else {
                        $voleurgbp_buy_array[$i] = $magiceurgbpbuy_vol->volume;
                    }
                }
                if ($sumaeurgbpsell_array[$i] == null) {
                    $sumaeurgbpsell_array[$i] = 0;
                }
                if ($sumaeurgbpbuy_array[$i] == null) {
                    $sumaeurgbpbuy_array[$i] = 0;
                }
                if ($voleurgbp_sell_array[$i] == null) {
                    $voleurgbp_sell_array[$i] = 0;
                }
                if ($voleurgbp_buy_array[$i] == null) {
                    $voleurgbp_buy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $eurgbp->serie_magic;
        }
        $suma_eurgbp = array_sum($array_eurgbp);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_euraud = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaeuraudsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaeuraudbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $voleuraud_sell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $voleuraud_buy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magiceuraud as $euraud) {
            $magiceuraudsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $euraud->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $euraud->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiceuraudbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $euraud->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $euraud->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiceuraudsell_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $euraud->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', "$euraud->magicnumber")
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiceuraudbuy_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $euraud->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', "$euraud->magicnumber")
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $euraud->serie_magic) {
                $sumarest += $euraud->profit;
            } else {
                $sumarest = $euraud->profit;
            }
        
            $rest = substr($euraud->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_euraud[$i] = $sumarest;
                    $sumaeuraudsell_array[$i] = $magiceuraudsell->sumsell;
                    $sumaeuraudbuy_array[$i] = $magiceuraudbuy->sumbuy;
        
                    if (empty($magiceuraudsell_vol)) {
                        $voleuraud_sell_array[$i] = 0;
                    } else {
                        $voleuraud_sell_array[$i] = $magiceuraudsell_vol->volume;
                    }
        
                    if (empty($magiceuraudbuy_vol)) {
                        $voleuraud_buy_array[$i] = 0;
                    } else {
                        $voleuraud_buy_array[$i] = $magiceuraudbuy_vol->volume;
                    }
                }
                if ($sumaeuraudsell_array[$i] == null) {
                    $sumaeuraudsell_array[$i] = 0;
                }
                if ($sumaeuraudbuy_array[$i] == null) {
                    $sumaeuraudbuy_array[$i] = 0;
                }
                if ($voleuraud_sell_array[$i] == null) {
                    $voleuraud_sell_array[$i] = 0;
                }
                if ($voleuraud_buy_array[$i] == null) {
                    $voleuraud_buy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $euraud->serie_magic;
        }
        
        $suma_euraud = array_sum($array_euraud);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_eurnzd = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaeurnzdsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaeurnzdbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $voleurnzd_sell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $voleurnzd_buy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magiceurnzd as $eurnzd) {
            $magiceurnzdsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $eurnzd->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $eurnzd->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiceurnzdbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $eurnzd->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $eurnzd->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiceurnzdsell_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $eurnzd->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', "$eurnzd->magicnumber")
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiceurnzdbuy_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $eurnzd->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', "$eurnzd->magicnumber")
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $eurnzd->serie_magic) {
                $sumarest += $eurnzd->profit;
            } else {
                $sumarest = $eurnzd->profit;
            }
        
            $rest = substr($eurnzd->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_eurnzd[$i] = $sumarest;
                    $sumaeurnzdsell_array[$i] = $magiceurnzdsell->sumsell;
                    $sumaeurnzdbuy_array[$i] = $magiceurnzdbuy->sumbuy;
        
                    if (empty($magiceurnzdsell_vol)) {
                        $voleurnzd_sell_array[$i] = 0;
                    } else {
                        $voleurnzd_sell_array[$i] = $magiceurnzdsell_vol->volume;
                    }
        
                    if (empty($magiceurnzdbuy_vol)) {
                        $voleurnzd_buy_array[$i] = 0;
                    } else {
                        $voleurnzd_buy_array[$i] = $magiceurnzdbuy_vol->volume;
                    }
                }
                if ($sumaeurnzdsell_array[$i] == null) {
                    $sumaeurnzdsell_array[$i] = 0;
                }
                if ($sumaeurnzdbuy_array[$i] == null) {
                    $sumaeurnzdbuy_array[$i] = 0;
                }
                if ($voleurnzd_sell_array[$i] == null) {
                    $voleurnzd_sell_array[$i] = 0;
                }
                if ($voleurnzd_buy_array[$i] == null) {
                    $voleurnzd_buy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $eurnzd->serie_magic;
        }
        
        $suma_eurnzd = array_sum($array_eurnzd);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_gbpaud = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumagbpaudsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumagbpaudbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volgbpaud_sell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volgbpaud_buy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicgbpaud as $gbpaud) {
            $magicgbpaudsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $gbpaud->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $gbpaud->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicgbpaudbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $gbpaud->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $gbpaud->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicgbpaudsell_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $gbpaud->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', "$gbpaud->magicnumber")
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicgbpaudbuy_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $gbpaud->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', "$gbpaud->magicnumber")
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $gbpaud->serie_magic) {
                $sumarest += $gbpaud->profit;
            } else {
                $sumarest = $gbpaud->profit;
            }
        
            $rest = substr($gbpaud->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_gbpaud[$i] = $sumarest;
                    $sumagbpaudsell_array[$i] = $magicgbpaudsell->sumsell;
                    $sumagbpaudbuy_array[$i] = $magicgbpaudbuy->sumbuy;
        
                    if (empty($magicgbpaudsell_vol)) {
                        $volgbpaud_sell_array[$i] = 0;
                    } else {
                        $volgbpaud_sell_array[$i] = $magicgbpaudsell_vol->volume;
                    }
        
                    if (empty($magicgbpaudbuy_vol)) {
                        $volgbpaud_buy_array[$i] = 0;
                    } else {
                        $volgbpaud_buy_array[$i] = $magicgbpaudbuy_vol->volume;
                    }
                }
                if ($sumagbpaudsell_array[$i] == null) {
                    $sumagbpaudsell_array[$i] = 0;
                }
                if ($sumagbpaudbuy_array[$i] == null) {
                    $sumagbpaudbuy_array[$i] = 0;
                }
                if ($volgbpaud_sell_array[$i] == null) {
                    $volgbpaud_sell_array[$i] = 0;
                }
                if ($volgbpaud_buy_array[$i] == null) {
                    $volgbpaud_buy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $gbpaud->serie_magic;
        }
        
        $suma_gbpaud = array_sum($array_gbpaud);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_gbpnzd = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumagbpnzdsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumagbpnzdbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volgbpnzd_sell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volgbpnzd_buy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicgbpnzd as $gbpnzd) {
            $magicgbpnzdsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $gbpnzd->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $gbpnzd->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicgbpnzdbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $gbpnzd->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $gbpnzd->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicgbpnzdsell_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $gbpnzd->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', "$gbpnzd->magicnumber")
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicgbpnzdbuy_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $gbpnzd->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', "$gbpnzd->magicnumber")
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $gbpnzd->serie_magic) {
                $sumarest += $gbpnzd->profit;
            } else {
                $sumarest = $gbpnzd->profit;
            }
        
            $rest = substr($gbpnzd->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_gbpnzd[$i] = $sumarest;
                    $sumagbpnzdsell_array[$i] = $magicgbpnzdsell->sumsell;
                    $sumagbpnzdbuy_array[$i] = $magicgbpnzdbuy->sumbuy;
        
                    if (empty($magicgbpnzdsell_vol)) {
                        $volgbpnzd_sell_array[$i] = 0;
                    } else {
                        $volgbpnzd_sell_array[$i] = $magicgbpnzdsell_vol->volume;
                    }
        
                    if (empty($magicgbpnzdbuy_vol)) {
                        $volgbpnzd_buy_array[$i] = 0;
                    } else {
                        $volgbpnzd_buy_array[$i] = $magicgbpnzdbuy_vol->volume;
                    }
                }
                if ($sumagbpnzdsell_array[$i] == null) {
                    $sumagbpnzdsell_array[$i] = 0;
                }
                if ($sumagbpnzdbuy_array[$i] == null) {
                    $sumagbpnzdbuy_array[$i] = 0;
                }
                if ($volgbpnzd_sell_array[$i] == null) {
                    $volgbpnzd_sell_array[$i] = 0;
                }
                if ($volgbpnzd_buy_array[$i] == null) {
                    $volgbpnzd_buy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $gbpnzd->serie_magic;
        }
        
        $suma_gbpnzd = array_sum($array_gbpnzd);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_audnzd = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaaudnzdsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaaudnzdbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volaudnzd_sell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volaudnzd_buy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicaudnzd as $audnzd) {
            $magicaudnzdsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $audnzd->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $audnzd->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicaudnzdbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $audnzd->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $audnzd->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicaudnzdsell_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $audnzd->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', "$audnzd->magicnumber")
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicaudnzdbuy_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $audnzd->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', "$audnzd->magicnumber")
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $audnzd->serie_magic) {
                $sumarest += $audnzd->profit;
            } else {
                $sumarest = $audnzd->profit;
            }
        
            $rest = substr($audnzd->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_audnzd[$i] = $sumarest;
                    $sumaaudnzdsell_array[$i] = $magicaudnzdsell->sumsell;
                    $sumaaudnzdbuy_array[$i] = $magicaudnzdbuy->sumbuy;
        
                    if (empty($magicaudnzdsell_vol)) {
                        $volaudnzd_sell_array[$i] = 0;
                    } else {
                        $volaudnzd_sell_array[$i] = $magicaudnzdsell_vol->volume;
                    }
        
                    if (empty($magicaudnzdbuy_vol)) {
                        $volaudnzd_buy_array[$i] = 0;
                    } else {
                        $volaudnzd_buy_array[$i] = $magicaudnzdbuy_vol->volume;
                    }
                }
                if ($sumaaudnzdsell_array[$i] == null) {
                    $sumaaudnzdsell_array[$i] = 0;
                }
                if ($sumaaudnzdbuy_array[$i] == null) {
                    $sumaaudnzdbuy_array[$i] = 0;
                }
                if ($volaudnzd_sell_array[$i] == null) {
                    $volaudnzd_sell_array[$i] = 0;
                }
                if ($volaudnzd_buy_array[$i] == null) {
                    $volaudnzd_buy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $audnzd->serie_magic;
        }
        
        $suma_audnzd = array_sum($array_audnzd);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_eurcad = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaeurcadsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaeurcadbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $voleurcad_sell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $voleurcad_buy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magiceurcad as $eurcad) {
            $magiceurcadsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $eurcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $eurcad->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiceurcadbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $eurcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $eurcad->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiceurcadsell_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $eurcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', "$eurcad->magicnumber")
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiceurcadbuy_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $eurcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', "$eurcad->magicnumber")
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $eurcad->serie_magic) {
                $sumarest += $eurcad->profit;
            } else {
                $sumarest = $eurcad->profit;
            }
        
            $rest = substr($eurcad->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_eurcad[$i] = $sumarest;
                    $sumaeurcadsell_array[$i] = $magiceurcadsell->sumsell;
                    $sumaeurcadbuy_array[$i] = $magiceurcadbuy->sumbuy;
        
                    if (empty($magiceurcadsell_vol)) {
                        $voleurcad_sell_array[$i] = 0;
                    } else {
                        $voleurcad_sell_array[$i] = $magiceurcadsell_vol->volume;
                    }
        
                    if (empty($magiceurcadbuy_vol)) {
                        $voleurcad_buy_array[$i] = 0;
                    } else {
                        $voleurcad_buy_array[$i] = $magiceurcadbuy_vol->volume;
                    }
                }
                if ($sumaeurcadsell_array[$i] == null) {
                    $sumaeurcadsell_array[$i] = 0;
                }
                if ($sumaeurcadbuy_array[$i] == null) {
                    $sumaeurcadbuy_array[$i] = 0;
                }
                if ($voleurcad_sell_array[$i] == null) {
                    $voleurcad_sell_array[$i] = 0;
                }
                if ($voleurcad_buy_array[$i] == null) {
                    $voleurcad_buy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $eurcad->serie_magic;
        }
        
        $suma_eurcad = array_sum($array_eurcad);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_eurchf = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaeurchfsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaeurchfbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $voleurchf_sell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $voleurchf_buy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magiceurchf as $eurchf) {
            $magiceurchfsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $eurchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $eurchf->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiceurchfbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $eurchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $eurchf->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiceurchfsell_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $eurchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', "$eurchf->magicnumber")
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiceurchfbuy_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $eurchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', "$eurchf->magicnumber")
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $eurchf->serie_magic) {
                $sumarest += $eurchf->profit;
            } else {
                $sumarest = $eurchf->profit;
            }
        
            $rest = substr($eurchf->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_eurchf[$i] = $sumarest;
                    $sumaeurchfsell_array[$i] = $magiceurchfsell->sumsell;
                    $sumaeurchfbuy_array[$i] = $magiceurchfbuy->sumbuy;
        
                    if (empty($magiceurchfsell_vol)) {
                        $voleurchf_sell_array[$i] = 0;
                    } else {
                        $voleurchf_sell_array[$i] = $magiceurchfsell_vol->volume;
                    }
        
                    if (empty($magiceurchfbuy_vol)) {
                        $voleurchf_buy_array[$i] = 0;
                    } else {
                        $voleurchf_buy_array[$i] = $magiceurchfbuy_vol->volume;
                    }
                }
                if ($sumaeurchfsell_array[$i] == null) {
                    $sumaeurchfsell_array[$i] = 0;
                }
                if ($sumaeurchfbuy_array[$i] == null) {
                    $sumaeurchfbuy_array[$i] = 0;
                }
                if ($voleurchf_sell_array[$i] == null) {
                    $voleurchf_sell_array[$i] = 0;
                }
                if ($voleurchf_buy_array[$i] == null) {
                    $voleurchf_buy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $eurchf->serie_magic;
        }
        
        $suma_eurchf = array_sum($array_eurchf);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_eurjpy = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaeurjpysell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaeurjpybuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $voleurjpy_sell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $voleurjpy_buy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magiceurjpy as $eurjpy) {
            $magiceurjpysell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $eurjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $eurjpy->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiceurjpybuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $eurjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $eurjpy->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiceurjpysell_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $eurjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', "$eurjpy->magicnumber")
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiceurjpybuy_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $eurjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', "$eurjpy->magicnumber")
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $eurjpy->serie_magic) {
                $sumarest += $eurjpy->profit;
            } else {
                $sumarest = $eurjpy->profit;
            }
        
            $rest = substr($eurjpy->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_eurjpy[$i] = $sumarest;
                    $sumaeurjpysell_array[$i] = $magiceurjpysell->sumsell;
                    $sumaeurjpybuy_array[$i] = $magiceurjpybuy->sumbuy;
        
                    if (empty($magiceurjpysell_vol)) {
                        $voleurjpy_sell_array[$i] = 0;
                    } else {
                        $voleurjpy_sell_array[$i] = $magiceurjpysell_vol->volume;
                    }
        
                    if (empty($magiceurjpybuy_vol)) {
                        $voleurjpy_buy_array[$i] = 0;
                    } else {
                        $voleurjpy_buy_array[$i] = $magiceurjpybuy_vol->volume;
                    }
                }
                if ($sumaeurjpysell_array[$i] == null) {
                    $sumaeurjpysell_array[$i] = 0;
                }
                if ($sumaeurjpybuy_array[$i] == null) {
                    $sumaeurjpybuy_array[$i] = 0;
                }
                if ($voleurjpy_sell_array[$i] == null) {
                    $voleurjpy_sell_array[$i] = 0;
                }
                if ($voleurjpy_buy_array[$i] == null) {
                    $voleurjpy_buy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $eurjpy->serie_magic;
        }
        
        $suma_eurjpy = array_sum($array_eurjpy);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_gbpcad = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumagbpcadsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumagbpcadbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volgbpcad_sell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volgbpcad_buy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicgbpcad as $gbpcad) {
            $magicgbpcadsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $gbpcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $gbpcad->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicgbpcadbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $gbpcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $gbpcad->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicgbpcadsell_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $gbpcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', "$gbpcad->magicnumber")
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicgbpcadbuy_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $gbpcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', "$gbpcad->magicnumber")
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $gbpcad->serie_magic) {
                $sumarest += $gbpcad->profit;
            } else {
                $sumarest = $gbpcad->profit;
            }
        
            $rest = substr($gbpcad->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_gbpcad[$i] = $sumarest;
                    $sumagbpcadsell_array[$i] = $magicgbpcadsell->sumsell;
                    $sumagbpcadbuy_array[$i] = $magicgbpcadbuy->sumbuy;
        
                    if (empty($magicgbpcadsell_vol)) {
                        $volgbpcad_sell_array[$i] = 0;
                    } else {
                        $volgbpcad_sell_array[$i] = $magicgbpcadsell_vol->volume;
                    }
        
                    if (empty($magicgbpcadbuy_vol)) {
                        $volgbpcad_buy_array[$i] = 0;
                    } else {
                        $volgbpcad_buy_array[$i] = $magicgbpcadbuy_vol->volume;
                    }
                }
                if ($sumagbpcadsell_array[$i] == null) {
                    $sumagbpcadsell_array[$i] = 0;
                }
                if ($sumagbpcadbuy_array[$i] == null) {
                    $sumagbpcadbuy_array[$i] = 0;
                }
                if ($volgbpcad_sell_array[$i] == null) {
                    $volgbpcad_sell_array[$i] = 0;
                }
                if ($volgbpcad_buy_array[$i] == null) {
                    $volgbpcad_buy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $gbpcad->serie_magic;
        }
        
        $suma_gbpcad = array_sum($array_gbpcad);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_gbpchf = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumagbpchfsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumagbpchfbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volgbpchf_sell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volgbpchf_buy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicgbpchf as $gbpchf) {
            $magicgbpchfsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $gbpchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $gbpchf->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicgbpchfbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $gbpchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $gbpchf->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicgbpchfsell_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $gbpchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', "$gbpchf->magicnumber")
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicgbpchfbuy_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $gbpchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', "$gbpchf->magicnumber")
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $gbpchf->serie_magic) {
                $sumarest += $gbpchf->profit;
            } else {
                $sumarest = $gbpchf->profit;
            }
        
            $rest = substr($gbpchf->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_gbpchf[$i] = $sumarest;
                    $sumagbpchfsell_array[$i] = $magicgbpchfsell->sumsell;
                    $sumagbpchfbuy_array[$i] = $magicgbpchfbuy->sumbuy;
        
                    if (empty($magicgbpchfsell_vol)) {
                        $volgbpchf_sell_array[$i] = 0;
                    } else {
                        $volgbpchf_sell_array[$i] = $magicgbpchfsell_vol->volume;
                    }
        
                    if (empty($magicgbpchfbuy_vol)) {
                        $volgbpchf_buy_array[$i] = 0;
                    } else {
                        $volgbpchf_buy_array[$i] = $magicgbpchfbuy_vol->volume;
                    }
                }
                if ($sumagbpchfsell_array[$i] == null) {
                    $sumagbpchfsell_array[$i] = 0;
                }
                if ($sumagbpchfbuy_array[$i] == null) {
                    $sumagbpchfbuy_array[$i] = 0;
                }
                if ($volgbpchf_sell_array[$i] == null) {
                    $volgbpchf_sell_array[$i] = 0;
                }
                if ($volgbpchf_buy_array[$i] == null) {
                    $volgbpchf_buy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $gbpchf->serie_magic;
        }
        
        $suma_gbpchf = array_sum($array_gbpchf);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_gbpjpy = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumagbpjpysell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumagbpjpybuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volgbpjpy_sell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volgbpjpy_buy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicgbpjpy as $gbpjpy) {
            $magicgbpjpysell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $gbpjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $gbpjpy->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicgbpjpybuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $gbpjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $gbpjpy->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicgbpjpysell_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $gbpjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', "$gbpjpy->magicnumber")
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicgbpjpybuy_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $gbpjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', "$gbpjpy->magicnumber")
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $gbpjpy->serie_magic) {
                $sumarest += $gbpjpy->profit;
            } else {
                $sumarest = $gbpjpy->profit;
            }
        
            $rest = substr($gbpjpy->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_gbpjpy[$i] = $sumarest;
                    $sumagbpjpysell_array[$i] = $magicgbpjpysell->sumsell;
                    $sumagbpjpybuy_array[$i] = $magicgbpjpybuy->sumbuy;
        
                    if (empty($magicgbpjpysell_vol)) {
                        $volgbpjpy_sell_array[$i] = 0;
                    } else {
                        $volgbpjpy_sell_array[$i] = $magicgbpjpysell_vol->volume;
                    }
        
                    if (empty($magicgbpjpybuy_vol)) {
                        $volgbpjpy_buy_array[$i] = 0;
                    } else {
                        $volgbpjpy_buy_array[$i] = $magicgbpjpybuy_vol->volume;
                    }
                }
                if ($sumagbpjpysell_array[$i] == null) {
                    $sumagbpjpysell_array[$i] = 0;
                }
                if ($sumagbpjpybuy_array[$i] == null) {
                    $sumagbpjpybuy_array[$i] = 0;
                }
                if ($volgbpjpy_sell_array[$i] == null) {
                    $volgbpjpy_sell_array[$i] = 0;
                }
                if ($volgbpjpy_buy_array[$i] == null) {
                    $volgbpjpy_buy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $gbpjpy->serie_magic;
        }
        
        $suma_gbpjpy = array_sum($array_gbpjpy);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_audcad = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaaudcadsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaaudcadbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volaudcad_sell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volaudcad_buy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicaudcad as $audcad) {
            $magicaudcadsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $audcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $audcad->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicaudcadbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $audcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $audcad->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicaudcadsell_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $audcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', "$audcad->magicnumber")
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicaudcadbuy_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $audcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', "$audcad->magicnumber")
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $audcad->serie_magic) {
                $sumarest += $audcad->profit;
            } else {
                $sumarest = $audcad->profit;
            }
        
            $rest = substr($audcad->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_audcad[$i] = $sumarest;
                    $sumaaudcadsell_array[$i] = $magicaudcadsell->sumsell;
                    $sumaaudcadbuy_array[$i] = $magicaudcadbuy->sumbuy;
        
                    if (empty($magicaudcadsell_vol)) {
                        $volaudcad_sell_array[$i] = 0;
                    } else {
                        $volaudcad_sell_array[$i] = $magicaudcadsell_vol->volume;
                    }
        
                    if (empty($magicaudcadbuy_vol)) {
                        $volaudcad_buy_array[$i] = 0;
                    } else {
                        $volaudcad_buy_array[$i] = $magicaudcadbuy_vol->volume;
                    }
                }
                if ($sumaaudcadsell_array[$i] == null) {
                    $sumaaudcadsell_array[$i] = 0;
                }
                if ($sumaaudcadbuy_array[$i] == null) {
                    $sumaaudcadbuy_array[$i] = 0;
                }
                if ($volaudcad_sell_array[$i] == null) {
                    $volaudcad_sell_array[$i] = 0;
                }
                if ($volaudcad_buy_array[$i] == null) {
                    $volaudcad_buy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $audcad->serie_magic;
        }
        
        $suma_audcad = array_sum($array_audcad);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_audchf = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaaudchfsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaaudchfbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volaudchf_sell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volaudchf_buy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicaudchf as $audchf) {
            $magicaudchfsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $audchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $audchf->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicaudchfbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $audchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $audchf->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicaudchfsell_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $audchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', "$audchf->magicnumber")
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicaudchfbuy_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $audchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', "$audchf->magicnumber")
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $audchf->serie_magic) {
                $sumarest += $audchf->profit;
            } else {
                $sumarest = $audchf->profit;
            }
        
            $rest = substr($audchf->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_audchf[$i] = $sumarest;
                    $sumaaudchfsell_array[$i] = $magicaudchfsell->sumsell;
                    $sumaaudchfbuy_array[$i] = $magicaudchfbuy->sumbuy;
        
                    if (empty($magiceurusdsell_vol)) {
                        $volaudchf_sell_array[$i] = 0;
                    } else {
                        $volaudchf_sell_array[$i] = $magicaudchfsell_vol->volume;
                    }
        
                    if (empty($magicaudchfbuy_vol)) {
                        $volaudchf_buy_array[$i] = 0;
                    } else {
                        $volaudchf_buy_array[$i] = $magicaudchfbuy_vol->volume;
                    }
                }
                if ($sumaaudchfsell_array[$i] == null) {
                    $sumaaudchfsell_array[$i] = 0;
                }
                if ($sumaaudchfbuy_array[$i] == null) {
                    $sumaaudchfbuy_array[$i] = 0;
                }
                if ($volaudchf_sell_array[$i] == null) {
                    $volaudchf_sell_array[$i] = 0;
                }
                if ($volaudchf_buy_array[$i] == null) {
                    $volaudchf_buy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $audchf->serie_magic;
        }
        
        $suma_audchf = array_sum($array_audchf);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_audjpy = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaaudjpysell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaaudjpybuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volaudjpy_sell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volaudjpy_buy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicaudjpy as $audjpy) {
            $magicaudjpysell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $audjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $audjpy->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicaudjpybuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $audjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $audjpy->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicaudjpysell_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $audjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', "$audjpy->magicnumber")
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicaudjpybuy_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $audjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', "$audjpy->magicnumber")
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $audjpy->serie_magic) {
                $sumarest += $audjpy->profit;
            } else {
                $sumarest = $audjpy->profit;
            }
        
            $rest = substr($audjpy->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_audjpy[$i] = $sumarest;
                    $sumaaudjpysell_array[$i] = $magicaudjpysell->sumsell;
                    $sumaaudjpybuy_array[$i] = $magicaudjpybuy->sumbuy;
        
                    if (empty($magicaudjpysell_vol)) {
                        $volaudjpy_sell_array[$i] = 0;
                    } else {
                        $volaudjpy_sell_array[$i] = $magicaudjpysell_vol->volume;
                    }
        
                    if (empty($magicaudjpybuy_vol)) {
                        $volaudjpy_buy_array[$i] = 0;
                    } else {
                        $volaudjpy_buy_array[$i] = $magicaudjpybuy_vol->volume;
                    }
                }
                if ($sumaaudjpysell_array[$i] == null) {
                    $sumaaudjpysell_array[$i] = 0;
                }
                if ($sumaaudjpybuy_array[$i] == null) {
                    $sumaaudjpybuy_array[$i] = 0;
                }
                if ($volaudjpy_sell_array[$i] == null) {
                    $volaudjpy_sell_array[$i] = 0;
                }
                if ($volaudjpy_buy_array[$i] == null) {
                    $volaudjpy_buy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $audjpy->serie_magic;
        }
        
        $suma_audjpy = array_sum($array_audjpy);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $rest = 0;
        $array_nzdcad = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumanzdcadsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumanzdcadbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volnzdcad_sell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volnzdcad_buy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicnzdcad as $nzdcad) {
            $magicnzdcadsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $nzdcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $nzdcad->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicnzdcadbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $nzdcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $nzdcad->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicnzdcadsell_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $nzdcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', "$nzdcad->magicnumber")
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicnzdcadbuy_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $nzdcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', "$nzdcad->magicnumber")
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $nzdcad->serie_magic) {
                $sumarest += $nzdcad->profit;
            } else {
                $sumarest = $nzdcad->profit;
            }
        
            $rest = substr($nzdcad->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_nzdcad[$i] = floatval($sumarest);
                    $sumanzdcadsell_array[$i] = $magicnzdcadsell->sumsell;
                    $sumanzdcadbuy_array[$i] = $magicnzdcadbuy->sumbuy;
        
                    if (empty($magicnzdcadsell_vol)) {
                        $volnzdcad_sell_array[$i] = 0;
                    } else {
                        $volnzdcad_sell_array[$i] = $magicnzdcadsell_vol->volume;
                    }
        
                    if (empty($magicnzdcadbuy_vol)) {
                        $volnzdcad_buy_array[$i] = 0;
                    } else {
                        $volnzdcad_buy_array[$i] = $magicnzdcadbuy_vol->volume;
                    }
                }
                if ($sumanzdcadsell_array[$i] == null) {
                    $sumanzdcadsell_array[$i] = 0;
                }
                if ($sumanzdcadbuy_array[$i] == null) {
                    $sumanzdcadbuy_array[$i] = 0;
                }
                if ($volnzdcad_sell_array[$i] == null) {
                    $volnzdcad_sell_array[$i] = 0;
                }
                if ($volnzdcad_buy_array[$i] == null) {
                    $volnzdcad_buy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $nzdcad->serie_magic;
        }
        $suma_nzdcad = array_sum($array_nzdcad);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_nzdchf = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumanzdchfsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumanzdchfbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volnzdchf_sell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volnzdchf_buy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicnzdchf as $nzdchf) {
            $magicnzdchfsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $nzdchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $nzdchf->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicnzdchfbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $nzdchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $nzdchf->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicnzdchfsell_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $nzdchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', "$nzdchf->magicnumber")
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicnzdchfbuy_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $nzdchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', "$nzdchf->magicnumber")
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $nzdchf->serie_magic) {
                $sumarest += $nzdchf->profit;
            } else {
                $sumarest = $nzdchf->profit;
            }
        
            $rest = substr($nzdchf->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_nzdchf[$i] = $sumarest;
                    $sumanzdchfsell_array[$i] = $magicnzdchfsell->sumsell;
                    $sumanzdchfbuy_array[$i] = $magicnzdchfbuy->sumbuy;
        
                    if (empty($magicnzdchfsell_vol)) {
                        $volnzdchf_sell_array[$i] = 0;
                    } else {
                        $volnzdchf_sell_array[$i] = $magicnzdchfsell_vol->volume;
                    }
        
                    if (empty($magicnzdchfbuy_vol)) {
                        $volnzdchf_buy_array[$i] = 0;
                    } else {
                        $volnzdchf_buy_array[$i] = $magicnzdchfbuy_vol->volume;
                    }
                }
                if ($sumanzdchfsell_array[$i] == null) {
                    $sumanzdchfsell_array[$i] = 0;
                }
                if ($sumanzdchfbuy_array[$i] == null) {
                    $sumanzdchfbuy_array[$i] = 0;
                }
                if ($volnzdchf_sell_array[$i] == null) {
                    $volnzdchf_sell_array[$i] = 0;
                }
                if ($volnzdchf_buy_array[$i] == null) {
                    $volnzdchf_buy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $nzdchf->serie_magic;
        }
        
        $suma_nzdchf = array_sum($array_nzdchf);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_nzdjpy = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumanzdjpysell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumanzdjpybuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volnzdjpy_sell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volnzdjpy_buy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicnzdjpy as $nzdjpy) {
            $magicnzdjpysell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $nzdjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $nzdjpy->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicnzdjpybuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $nzdjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $nzdjpy->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicnzdjpysell_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $nzdjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', "$nzdjpy->magicnumber")
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicnzdjpybuy_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $nzdjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', "$nzdjpy->magicnumber")
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $nzdjpy->serie_magic) {
                $sumarest += $nzdjpy->profit;
            } else {
                $sumarest = $nzdjpy->profit;
            }
        
            $rest = substr($nzdjpy->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_nzdjpy[$i] = $sumarest;
                    $sumanzdjpysell_array[$i] = $magicnzdjpysell->sumsell;
                    $sumanzdjpybuy_array[$i] = $magicnzdjpybuy->sumbuy;
        
                    if (empty($magicnzdjpysell_vol)) {
                        $volnzdjpy_sell_array[$i] = 0;
                    } else {
                        $volnzdjpy_sell_array[$i] = $magicnzdjpysell_vol->volume;
                    }
        
                    if (empty($magicnzdjpybuy_vol)) {
                        $volnzdjpy_buy_array[$i] = 0;
                    } else {
                        $volnzdjpy_buy_array[$i] = $magicnzdjpybuy_vol->volume;
                    }
                }
                if ($sumanzdjpysell_array[$i] == null) {
                    $sumanzdjpysell_array[$i] = 0;
                }
                if ($sumanzdjpybuy_array[$i] == null) {
                    $sumanzdjpybuy_array[$i] = 0;
                }
                if ($volnzdjpy_sell_array[$i] == null) {
                    $volnzdjpy_sell_array[$i] = 0;
                }
                if ($volnzdjpy_buy_array[$i] == null) {
                    $volnzdjpy_buy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $nzdjpy->serie_magic;
        }
        
        $suma_nzdjpy = array_sum($array_nzdjpy);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_cadchf = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumacadchfsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumacadchfbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volcadchf_sell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volcadchf_buy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magiccadchf as $cadchf) {
            $magiccadchfsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $cadchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $cadchf->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiccadchfbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $cadchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $cadchf->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiccadchfsell_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $cadchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', "$cadchf->magicnumber")
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiccadchfbuy_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $cadchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', "$cadchf->magicnumber")
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $cadchf->serie_magic) {
                $sumarest += $cadchf->profit;
            } else {
                $sumarest = $cadchf->profit;
            }
        
            $rest = substr($cadchf->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_cadchf[$i] = $sumarest;
                    $sumacadchfsell_array[$i] = $magiccadchfsell->sumsell;
                    $sumacadchfbuy_array[$i] = $magiccadchfbuy->sumbuy;
        
                    if (empty($magiccadchfsell_vol)) {
                        $volcadchf_sell_array[$i] = 0;
                    } else {
                        $volcadchf_sell_array[$i] = $magiccadchfsell_vol->volume;
                    }
        
                    if (empty($magiccadchfbuy_vol)) {
                        $volcadchf_buy_array[$i] = 0;
                    } else {
                        $volcadchf_buy_array[$i] = $magiccadchfbuy_vol->volume;
                    }
                }
                if ($sumacadchfsell_array[$i] == null) {
                    $sumacadchfsell_array[$i] = 0;
                }
                if ($sumacadchfbuy_array[$i] == null) {
                    $sumacadchfbuy_array[$i] = 0;
                }
                if ($volcadchf_sell_array[$i] == null) {
                    $volcadchf_sell_array[$i] = 0;
                }
                if ($volcadchf_buy_array[$i] == null) {
                    $volcadchf_buy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $cadchf->serie_magic;
        }
        
        $suma_cadchf = array_sum($array_cadchf);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_cadjpy = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumacadjpysell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumacadjpybuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volcadjpy_sell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volcadjpy_buy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magiccadjpy as $cadjpy) {
            $magiccadjpysell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $cadjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $cadjpy->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiccadjpybuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $cadjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $cadjpy->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiccadjpysell_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $cadjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', "$cadjpy->magicnumber")
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiccadjpybuy_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $cadjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', "$cadjpy->magicnumber")
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $cadjpy->serie_magic) {
                $sumarest += $cadjpy->profit;
            } else {
                $sumarest = $cadjpy->profit;
            }
        
            $rest = substr($cadjpy->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_cadjpy[$i] = $sumarest;
                    $sumacadjpysell_array[$i] = $magiccadjpysell->sumsell;
                    $sumacadjpybuy_array[$i] = $magiccadjpybuy->sumbuy;
        
                    if (empty($magiccadjpysell_vol)) {
                        $volcadjpy_sell_array[$i] = 0;
                    } else {
                        $volcadjpy_sell_array[$i] = $magiccadjpysell_vol->volume;
                    }
        
                    if (empty($magiccadjpybuy_vol)) {
                        $volcadjpy_buy_array[$i] = 0;
                    } else {
                        $volcadjpy_buy_array[$i] = $magiccadjpybuy_vol->volume;
                    }
                }
                if ($sumacadjpysell_array[$i] == null) {
                    $sumacadjpysell_array[$i] = 0;
                }
                if ($sumacadjpybuy_array[$i] == null) {
                    $sumacadjpybuy_array[$i] = 0;
                }
                if ($volcadjpy_sell_array[$i] == null) {
                    $volcadjpy_sell_array[$i] = 0;
                }
                if ($volcadjpy_buy_array[$i] == null) {
                    $volcadjpy_buy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $cadjpy->serie_magic;
        }
        
        $suma_cadjpy = array_sum($array_cadjpy);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_chfjpy = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumachfjpysell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumachfjpybuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volchfjpy_sell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $volchfjpy_buy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicchfjpy as $chfjpy) {
            $magicchfjpysell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $chfjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $chfjpy->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicchfjpybuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $chfjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $chfjpy->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicchfjpysell_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $chfjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', "$chfjpy->magicnumber")
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicchfjpybuy_vol = DB::table('operaciones')
                ->select('volume')
                ->where('symbol', '=', $chfjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', "$chfjpy->magicnumber")
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $chfjpy->serie_magic) {
                $sumarest += $chfjpy->profit;
            } else {
                $sumarest = $chfjpy->profit;
            }
        
            $rest = substr($chfjpy->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_chfjpy[$i] = $sumarest;
                    $sumachfjpysell_array[$i] = $magicchfjpysell->sumsell;
                    $sumachfjpybuy_array[$i] = $magicchfjpybuy->sumbuy;
        
                    if (empty($magicchfjpysell_vol)) {
                        $volchfjpy_sell_array[$i] = 0;
                    } else {
                        $volchfjpy_sell_array[$i] = $magicchfjpysell_vol->volume;
                    }
        
                    if (empty($magicchfjpybuy_vol)) {
                        $volchfjpy_buy_array[$i] = 0;
                    } else {
                        $volchfjpy_buy_array[$i] = $magicchfjpybuy_vol->volume;
                    }
                }
                if ($sumachfjpysell_array[$i] == null) {
                    $sumachfjpysell_array[$i] = 0;
                }
                if ($sumachfjpybuy_array[$i] == null) {
                    $sumachfjpybuy_array[$i] = 0;
                }
                if ($volchfjpy_sell_array[$i] == null) {
                    $volchfjpy_sell_array[$i] = 0;
                }
                if ($volchfjpy_buy_array[$i] == null) {
                    $volchfjpy_buy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $chfjpy->serie_magic;
        }
        
        $suma_chfjpy = array_sum($array_chfjpy);
        
        if ($numero == 0) {
            $sum_totales = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumtotal'))
                ->where('trader_id', $trader_id)
                ->first()->sumtotal;
        } else {
            $sum_totales = $suma_eurusd + $suma_gbpusd + $suma_audusd + $suma_nzdusd + $suma_usdcad + $suma_usdchf + $suma_usdjpy + $suma_eurgbp + $suma_euraud + $suma_eurnzd + $suma_gbpaud + $suma_gbpnzd + $suma_audnzd + $suma_eurcad + $suma_eurchf + $suma_eurjpy + $suma_gbpcad + $suma_gbpchf + $suma_gbpjpy + $suma_audcad + $suma_audchf + $suma_audjpy + $suma_nzdcad + $suma_nzdchf + $suma_nzdjpy + $suma_cadchf + $suma_cadjpy + $suma_chfjpy;
        }
        
    ?>
    <table class="table table-striped table-bordered nowrap text-center" id="status">
        <thead>
            <tr>
                <th data-priority="0" scope="col" colspan="4">Trader: <span
                        style="font-weight: 500"><?php echo e($nombre_trader->nombre); ?></span></th>
                <th data-priority="0" scope="col" colspan="4">Total totales: <span
                        style="font-weight: 500"><?php echo e($sum_totales); ?></span> </th>
                <th data-priority="0" scope="col" colspan="4">Serie: <span style="font-weight: 500"
                        id="seriemagic_number"></span> </th>
            </tr>
            <tr>
                <th>MONEDA</th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>
                <th>8</th>
                <th>9</th>
                <th>Total</th>
            </tr>
        </thead>
        <div class="text-center">
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-dark mb-3" id="obtener403">Serie 403</button>
                    <button type="button" class="btn btn-dark mb-3" id="obtener404">Serie 404</button>
                    <button type="button" class="btn btn-dark mb-3" id="obtener405">Serie 405</button>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-dark mb-3" id="obtenerTodos">Todas las series</button>
                    </div>

                </div>
            </div>
        </div>
        <div class="text-center">
            <div class="text">

            </div>
        </div>
        <tbody>
            <tr>
                <td data-priority="0" scope="col">EURUSD</td>
                <?php for($i = 0; $i < 9; $i++): ?>
                    <?php
                        $sumabuy_sell = $sumabuy_array[$i] + $sumasell_array[$i];
                    ?>
                    <?php if($voleurusd_sell_array[$i] == $voleurusd_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500"><?php echo e($array_eurusd[$i]); ?></td>
                    <?php elseif($voleurusd_sell_array[$i] != $voleurusd_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500"><?php echo e($array_eurusd[$i]); ?>

                        <?php elseif($voleurusd_sell_array[$i] != $voleurusd_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            <?php echo e($array_eurusd[$i]); ?>

                        <?php elseif($voleurusd_sell_array[$i] == $voleurusd_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500"><?php echo e($array_eurusd[$i]); ?></td>
                    <?php else: ?>
                        <td data-priority="0" scope="col"><?php echo e($array_eurusd[$i]); ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
                <td data-priority="0" scope="col"><?php echo e($suma_eurusd); ?></td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">GBPUSD</td>
                <?php for($i = 0; $i < 9; $i++): ?>
                    <?php
                        $sumabuy_sell = $sumagbpusdbuy_array[$i] + $sumagbpusdsell_array[$i];
                    ?>
                    <?php if($volgbpusd_sell_array[$i] == $volgbpusd_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500"><?php echo e($array_gbpusd[$i]); ?></td>
                    <?php elseif($volgbpusd_sell_array[$i] != $volgbpusd_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500"><?php echo e($array_gbpusd[$i]); ?>

                        <?php elseif($volgbpusd_sell_array[$i] != $volgbpusd_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            <?php echo e($array_gbpusd[$i]); ?>

                        <?php elseif($volgbpusd_sell_array[$i] == $volgbpusd_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500"><?php echo e($array_gbpusd[$i]); ?>

                        </td>
                    <?php else: ?>
                        <td data-priority="0" scope="col"><?php echo e($array_gbpusd[$i]); ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
                <td data-priority="0" scope="col"><?php echo e($suma_gbpusd); ?></td>
            </tr>


            <tr>
                <td data-priority="0" scope="col">AUDUSD</td>
                <?php for($i = 0; $i < 9; $i++): ?>
                    <?php
                        $sumabuy_sell = $sumaaudusdbuy_array[$i] + $sumaaudusdsell_array[$i];
                    ?>
                    <?php if($volaudusd_sell_array[$i] == $volaudusd_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500"><?php echo e($array_audusd[$i]); ?>

                        </td>
                    <?php elseif($volaudusd_sell_array[$i] != $volaudusd_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500"><?php echo e($array_audusd[$i]); ?>

                        <?php elseif($volaudusd_sell_array[$i] != $volaudusd_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            <?php echo e($array_audusd[$i]); ?>

                        <?php elseif($volaudusd_sell_array[$i] == $volaudusd_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500"><?php echo e($array_audusd[$i]); ?>

                        </td>
                    <?php else: ?>
                        <td data-priority="0" scope="col"><?php echo e($array_audusd[$i]); ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
                <td data-priority="0" scope="col"><?php echo e($suma_audusd); ?></td>
            </tr>


            <tr>
                <td data-priority="0" scope="col">NZDUSD</td>
                <?php for($i = 0; $i < 9; $i++): ?>
                    <?php
                        $sumabuy_sell = $sumanzdusdbuy_array[$i] + $sumanzdusdsell_array[$i];
                    ?>
                    <?php if($volnzdusd_sell_array[$i] == $volnzdusd_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500"><?php echo e($array_nzdusd[$i]); ?>

                        </td>
                    <?php elseif($volnzdusd_sell_array[$i] != $volnzdusd_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500"><?php echo e($array_nzdusd[$i]); ?>

                        <?php elseif($volnzdusd_sell_array[$i] != $volnzdusd_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            <?php echo e($array_nzdusd[$i]); ?>

                        <?php elseif($volnzdusd_sell_array[$i] == $volnzdusd_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500"><?php echo e($array_nzdusd[$i]); ?>

                        </td>
                    <?php else: ?>
                        <td data-priority="0" scope="col"><?php echo e($array_nzdusd[$i]); ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
                <td data-priority="0" scope="col"><?php echo e($suma_nzdusd); ?></td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">USDCAD</td>
                <?php for($i = 0; $i < 9; $i++): ?>
                    <?php
                        $sumabuy_sell = $sumausdcadbuy_array[$i] + $sumausdcadsell_array[$i];
                    ?>
                    <?php if($volusdcad_sell_array[$i] == $volusdcad_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500"><?php echo e($array_usdcad[$i]); ?>

                        </td>
                    <?php elseif($volusdcad_sell_array[$i] != $volusdcad_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500"><?php echo e($array_usdcad[$i]); ?>

                        <?php elseif($volusdcad_sell_array[$i] != $volusdcad_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            <?php echo e($array_usdcad[$i]); ?>

                        <?php elseif($volusdcad_sell_array[$i] == $volusdcad_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500"><?php echo e($array_usdcad[$i]); ?>

                        </td>
                    <?php else: ?>
                        <td data-priority="0" scope="col"><?php echo e($array_usdcad[$i]); ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
                <td data-priority="0" scope="col"><?php echo e($suma_usdcad); ?></td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">USDCHF</td>
                <?php for($i = 0; $i < 9; $i++): ?>
                    <?php
                        $sumabuy_sell = $sumausdchfbuy_array[$i] + $sumausdchfsell_array[$i];
                    ?>
                    <?php if($volusdchf_sell_array[$i] == $volusdchf_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500"><?php echo e($array_usdchf[$i]); ?>

                        </td>
                    <?php elseif($volusdchf_sell_array[$i] != $volusdchf_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500"><?php echo e($array_usdchf[$i]); ?>

                        <?php elseif($volusdchf_sell_array[$i] != $volusdchf_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            <?php echo e($array_usdchf[$i]); ?>

                        <?php elseif($volusdchf_sell_array[$i] == $volusdchf_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500"><?php echo e($array_usdchf[$i]); ?>

                        </td>
                    <?php else: ?>
                        <td data-priority="0" scope="col"><?php echo e($array_usdchf[$i]); ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
                <td data-priority="0" scope="col"><?php echo e($suma_usdchf); ?></td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">USDJPY</td>
                <?php for($i = 0; $i < 9; $i++): ?>
                    <?php
                        $sumabuy_sell = $sumausdjpybuy_array[$i] + $sumausdjpysell_array[$i];
                    ?>
                    <?php if($volusdjpy_sell_array[$i] == $volusdjpy_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500"><?php echo e($array_usdjpy[$i]); ?>

                        </td>
                    <?php elseif($volusdjpy_sell_array[$i] != $volusdjpy_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500"><?php echo e($array_usdjpy[$i]); ?>

                        <?php elseif($volusdjpy_sell_array[$i] != $volusdjpy_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            <?php echo e($array_usdjpy[$i]); ?>

                        <?php elseif($volusdjpy_sell_array[$i] == $volusdjpy_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500"><?php echo e($array_usdjpy[$i]); ?>

                        </td>
                    <?php else: ?>
                        <td data-priority="0" scope="col"><?php echo e($array_usdjpy[$i]); ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
                <td data-priority="0" scope="col"><?php echo e($suma_usdjpy); ?></td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">EURGBP</td>
                <?php for($i = 0; $i < 9; $i++): ?>
                    <?php
                        $sumabuy_sell = $sumaeurgbpbuy_array[$i] + $sumaeurgbpsell_array[$i];
                    ?>
                    <?php if($voleurgbp_sell_array[$i] == $voleurgbp_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500"><?php echo e($array_eurgbp[$i]); ?>

                        </td>
                    <?php elseif($voleurgbp_sell_array[$i] != $voleurgbp_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500"><?php echo e($array_eurgbp[$i]); ?>

                        <?php elseif($voleurgbp_sell_array[$i] != $voleurgbp_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            <?php echo e($array_eurgbp[$i]); ?>

                        <?php elseif($voleurgbp_sell_array[$i] == $voleurgbp_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500"><?php echo e($array_eurgbp[$i]); ?>

                        </td>
                    <?php else: ?>
                        <td data-priority="0" scope="col"><?php echo e($array_eurgbp[$i]); ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
                <td data-priority="0" scope="col"><?php echo e($suma_eurgbp); ?></td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">EURAUD</td>
                <?php for($i = 0; $i < 9; $i++): ?>
                    <?php
                        $sumabuy_sell = $sumaeuraudbuy_array[$i] + $sumaeuraudsell_array[$i];
                    ?>
                    <?php if($voleuraud_sell_array[$i] == $voleuraud_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500"><?php echo e($array_euraud[$i]); ?>

                        </td>
                    <?php elseif($voleuraud_sell_array[$i] != $voleuraud_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500"><?php echo e($array_euraud[$i]); ?>

                        <?php elseif($voleuraud_sell_array[$i] != $voleuraud_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            <?php echo e($array_euraud[$i]); ?>

                        <?php elseif($voleuraud_sell_array[$i] == $voleuraud_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500"><?php echo e($array_euraud[$i]); ?>

                        </td>
                    <?php else: ?>
                        <td data-priority="0" scope="col"><?php echo e($array_euraud[$i]); ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
                <td data-priority="0" scope="col"><?php echo e($suma_euraud); ?></td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">EURNZD</td>
                <?php for($i = 0; $i < 9; $i++): ?>
                    <?php
                        $sumabuy_sell = $sumaeurnzdbuy_array[$i] + $sumaeurnzdsell_array[$i];
                    ?>
                    <?php if($voleurnzd_sell_array[$i] == $voleurnzd_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500"><?php echo e($array_eurnzd[$i]); ?>

                        </td>
                    <?php elseif($voleurnzd_sell_array[$i] != $voleurnzd_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500"><?php echo e($array_eurnzd[$i]); ?>

                        <?php elseif($voleurnzd_sell_array[$i] != $voleurnzd_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            <?php echo e($array_eurnzd[$i]); ?>

                        <?php elseif($voleurnzd_sell_array[$i] == $voleurnzd_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500"><?php echo e($array_eurnzd[$i]); ?>

                        </td>
                    <?php else: ?>
                        <td data-priority="0" scope="col"><?php echo e($array_eurnzd[$i]); ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
                <td data-priority="0" scope="col"><?php echo e($suma_eurnzd); ?></td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">GBPAUD</td>
                <?php for($i = 0; $i < 9; $i++): ?>
                    <?php
                        $sumabuy_sell = $sumagbpaudbuy_array[$i] + $sumagbpaudsell_array[$i];
                    ?>
                    <?php if($volgbpaud_sell_array[$i] == $volgbpaud_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500"><?php echo e($array_gbpaud[$i]); ?>

                        </td>
                    <?php elseif($volgbpaud_sell_array[$i] != $volgbpaud_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500"><?php echo e($array_gbpaud[$i]); ?>

                        <?php elseif($volgbpaud_sell_array[$i] != $volgbpaud_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            <?php echo e($array_gbpaud[$i]); ?>

                        <?php elseif($volgbpaud_sell_array[$i] == $volgbpaud_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500"><?php echo e($array_gbpaud[$i]); ?>

                        </td>
                    <?php else: ?>
                        <td data-priority="0" scope="col"><?php echo e($array_gbpaud[$i]); ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
                <td data-priority="0" scope="col"><?php echo e($suma_gbpaud); ?></td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">GBPNZD</td>
                <?php for($i = 0; $i < 9; $i++): ?>
                    <?php
                        $sumabuy_sell = $sumagbpnzdbuy_array[$i] + $sumagbpnzdsell_array[$i];
                    ?>
                    <?php if($volgbpnzd_sell_array[$i] == $volgbpnzd_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500"><?php echo e($array_gbpnzd[$i]); ?>

                        </td>
                    <?php elseif($volgbpnzd_sell_array[$i] != $volgbpnzd_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500"><?php echo e($array_gbpnzd[$i]); ?>

                        <?php elseif($volgbpnzd_sell_array[$i] != $volgbpnzd_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            <?php echo e($array_gbpnzd[$i]); ?>

                        <?php elseif($volgbpnzd_sell_array[$i] == $volgbpnzd_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500"><?php echo e($array_gbpnzd[$i]); ?>

                        </td>
                    <?php else: ?>
                        <td data-priority="0" scope="col"><?php echo e($array_gbpnzd[$i]); ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
                <td data-priority="0" scope="col"><?php echo e($suma_gbpnzd); ?></td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">AUDNZD</td>
                <?php for($i = 0; $i < 9; $i++): ?>
                    <?php
                        $sumabuy_sell = $sumaaudnzdbuy_array[$i] + $sumaaudnzdsell_array[$i];
                    ?>
                    <?php if($volaudnzd_sell_array[$i] == $volaudnzd_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500"><?php echo e($array_audnzd[$i]); ?>

                        </td>
                    <?php elseif($volaudnzd_sell_array[$i] != $volaudnzd_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500"><?php echo e($array_audnzd[$i]); ?>

                        <?php elseif($volaudnzd_sell_array[$i] != $volaudnzd_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            <?php echo e($array_audnzd[$i]); ?>

                        <?php elseif($volaudnzd_sell_array[$i] == $volaudnzd_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500"><?php echo e($array_audnzd[$i]); ?>

                        </td>
                    <?php else: ?>
                        <td data-priority="0" scope="col"><?php echo e($array_audnzd[$i]); ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
                <td data-priority="0" scope="col"><?php echo e($suma_audnzd); ?></td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">EURCAD</td>
                <?php for($i = 0; $i < 9; $i++): ?>
                    <?php
                        $sumabuy_sell = $sumaeurcadbuy_array[$i] + $sumaeurcadsell_array[$i];
                    ?>
                    <?php if($voleurcad_sell_array[$i] == $voleurcad_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500"><?php echo e($array_eurcad[$i]); ?>

                        </td>
                    <?php elseif($voleurcad_sell_array[$i] != $voleurcad_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500"><?php echo e($array_eurcad[$i]); ?>

                        <?php elseif($voleurcad_sell_array[$i] != $voleurcad_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            <?php echo e($array_eurcad[$i]); ?>

                        <?php elseif($voleurcad_sell_array[$i] == $voleurcad_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500"><?php echo e($array_eurcad[$i]); ?>

                        </td>
                    <?php else: ?>
                        <td data-priority="0" scope="col"><?php echo e($array_eurcad[$i]); ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
                <td data-priority="0" scope="col"><?php echo e($suma_eurcad); ?></td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">EURCHF</td>
                <?php for($i = 0; $i < 9; $i++): ?>
                    <?php
                        $sumabuy_sell = $sumaeurchfbuy_array[$i] + $sumaeurchfsell_array[$i];
                    ?>
                    <?php if($voleurchf_sell_array[$i] == $voleurchf_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500"><?php echo e($array_eurchf[$i]); ?>

                        </td>
                    <?php elseif($voleurchf_sell_array[$i] != $voleurchf_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500"><?php echo e($array_eurchf[$i]); ?>

                        <?php elseif($voleurchf_sell_array[$i] != $voleurchf_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            <?php echo e($array_eurchf[$i]); ?>

                        <?php elseif($voleurchf_sell_array[$i] == $voleurchf_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500"><?php echo e($array_eurchf[$i]); ?>

                        </td>
                    <?php else: ?>
                        <td data-priority="0" scope="col"><?php echo e($array_eurchf[$i]); ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
                <td data-priority="0" scope="col"><?php echo e($suma_eurchf); ?></td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">EURJPY</td>
                <?php for($i = 0; $i < 9; $i++): ?>
                    <?php
                        $sumabuy_sell = $sumaeurjpybuy_array[$i] + $sumaeurjpysell_array[$i];
                    ?>
                    <?php if($voleurjpy_sell_array[$i] == $voleurjpy_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500"><?php echo e($array_eurjpy[$i]); ?>

                        </td>
                    <?php elseif($voleurjpy_sell_array[$i] != $voleurjpy_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500"><?php echo e($array_eurjpy[$i]); ?>

                        <?php elseif($voleurjpy_sell_array[$i] != $voleurjpy_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            <?php echo e($array_eurjpy[$i]); ?>

                        <?php elseif($voleurjpy_sell_array[$i] == $voleurjpy_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500"><?php echo e($array_eurjpy[$i]); ?>

                        </td>
                    <?php else: ?>
                        <td data-priority="0" scope="col"><?php echo e($array_eurjpy[$i]); ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
                <td data-priority="0" scope="col"><?php echo e($suma_eurjpy); ?></td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">GBPCAD</td>
                <?php for($i = 0; $i < 9; $i++): ?>
                    <?php
                        $sumabuy_sell = $sumagbpcadbuy_array[$i] + $sumagbpcadsell_array[$i];
                    ?>
                    <?php if($volgbpcad_sell_array[$i] == $volgbpcad_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500"><?php echo e($array_gbpcad[$i]); ?>

                        </td>
                    <?php elseif($volgbpcad_sell_array[$i] != $volgbpcad_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500"><?php echo e($array_gbpcad[$i]); ?>

                        <?php elseif($volgbpcad_sell_array[$i] != $volgbpcad_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            <?php echo e($array_gbpcad[$i]); ?>

                        <?php elseif($volgbpcad_sell_array[$i] == $volgbpcad_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500"><?php echo e($array_gbpcad[$i]); ?>

                        </td>
                    <?php else: ?>
                        <td data-priority="0" scope="col"><?php echo e($array_gbpcad[$i]); ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
                <td data-priority="0" scope="col"><?php echo e($suma_gbpcad); ?></td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">GBPCHF</td>
                <?php for($i = 0; $i < 9; $i++): ?>
                    <?php
                        $sumabuy_sell = $sumagbpchfbuy_array[$i] + $sumagbpchfsell_array[$i];
                    ?>
                    <?php if($volgbpchf_sell_array[$i] == $volgbpchf_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500"><?php echo e($array_gbpchf[$i]); ?>

                        </td>
                    <?php elseif($volgbpchf_sell_array[$i] != $volgbpchf_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500"><?php echo e($array_gbpchf[$i]); ?>

                        <?php elseif($volgbpchf_sell_array[$i] != $volgbpchf_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            <?php echo e($array_gbpchf[$i]); ?>

                        <?php elseif($volgbpchf_sell_array[$i] == $volgbpchf_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500"><?php echo e($array_gbpchf[$i]); ?>

                        </td>
                    <?php else: ?>
                        <td data-priority="0" scope="col"><?php echo e($array_gbpchf[$i]); ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
                <td data-priority="0" scope="col"><?php echo e($suma_gbpchf); ?></td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">GBPJPY</td>
                <?php for($i = 0; $i < 9; $i++): ?>
                    <?php
                        $sumabuy_sell = $sumagbpjpybuy_array[$i] + $sumagbpjpysell_array[$i];
                    ?>
                    <?php if($volgbpjpy_sell_array[$i] == $volgbpjpy_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500"><?php echo e($array_gbpjpy[$i]); ?>

                        </td>
                    <?php elseif($volgbpjpy_sell_array[$i] != $volgbpjpy_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500"><?php echo e($array_gbpjpy[$i]); ?>

                        <?php elseif($volgbpjpy_sell_array[$i] != $volgbpjpy_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            <?php echo e($array_gbpjpy[$i]); ?>

                        <?php elseif($volgbpjpy_sell_array[$i] == $volgbpjpy_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500"><?php echo e($array_gbpjpy[$i]); ?>

                        </td>
                    <?php else: ?>
                        <td data-priority="0" scope="col"><?php echo e($array_gbpjpy[$i]); ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
                <td data-priority="0" scope="col"><?php echo e($suma_gbpjpy); ?></td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">AUDCAD</td>
                <?php for($i = 0; $i < 9; $i++): ?>
                    <?php
                        $sumabuy_sell = $sumaaudcadbuy_array[$i] + $sumaaudcadsell_array[$i];
                    ?>
                    <?php if($volaudcad_sell_array[$i] == $volaudcad_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500"><?php echo e($array_audcad[$i]); ?>

                        </td>
                    <?php elseif($volaudcad_sell_array[$i] != $volaudcad_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500"><?php echo e($array_audcad[$i]); ?>

                        <?php elseif($volaudcad_sell_array[$i] != $volaudcad_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            <?php echo e($array_audcad[$i]); ?>

                        <?php elseif($volaudcad_sell_array[$i] == $volaudcad_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500"><?php echo e($array_audcad[$i]); ?>

                        </td>
                    <?php else: ?>
                        <td data-priority="0" scope="col"><?php echo e($array_audcad[$i]); ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
                <td data-priority="0" scope="col"><?php echo e($suma_audcad); ?></td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">AUDCHF</td>
                <?php for($i = 0; $i < 9; $i++): ?>
                    <?php
                        $sumabuy_sell = $sumaaudchfbuy_array[$i] + $sumaaudchfsell_array[$i];
                    ?>
                    <?php if($volaudchf_sell_array[$i] == $volaudchf_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500"><?php echo e($array_audchf[$i]); ?>

                        </td>
                    <?php elseif($volaudchf_sell_array[$i] != $volaudchf_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500"><?php echo e($array_audchf[$i]); ?>

                        <?php elseif($volaudchf_sell_array[$i] != $volaudchf_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            <?php echo e($array_audchf[$i]); ?>

                        <?php elseif($volaudchf_sell_array[$i] == $volaudchf_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500"><?php echo e($array_audchf[$i]); ?>

                        </td>
                    <?php else: ?>
                        <td data-priority="0" scope="col"><?php echo e($array_audchf[$i]); ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
                <td data-priority="0" scope="col"><?php echo e($suma_audchf); ?></td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">AUDJPY</td>
                <?php for($i = 0; $i < 9; $i++): ?>
                    <?php
                        $sumabuy_sell = $sumaaudjpybuy_array[$i] + $sumaaudjpysell_array[$i];
                    ?>
                    <?php if($volaudjpy_sell_array[$i] == $volaudjpy_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500"><?php echo e($array_audjpy[$i]); ?>

                        </td>
                    <?php elseif($volaudjpy_sell_array[$i] != $volaudjpy_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500"><?php echo e($array_audjpy[$i]); ?>

                        <?php elseif($volaudjpy_sell_array[$i] != $volaudjpy_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            <?php echo e($array_audjpy[$i]); ?>

                        <?php elseif($volaudjpy_sell_array[$i] == $volaudjpy_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500"><?php echo e($array_audjpy[$i]); ?>

                        </td>
                    <?php else: ?>
                        <td data-priority="0" scope="col"><?php echo e($array_audjpy[$i]); ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
                <td data-priority="0" scope="col"><?php echo e($suma_audjpy); ?></td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">NZDCAD</td>
                <?php for($i = 0; $i < 9; $i++): ?>
                    <?php
                        $sumabuy_sell = $sumanzdcadbuy_array[$i] + $sumanzdcadsell_array[$i];
                    ?>
                    <?php if($volnzdcad_sell_array[$i] == $volnzdcad_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500"><?php echo e($array_nzdcad[$i]); ?>

                        </td>
                    <?php elseif($volnzdcad_sell_array[$i] != $volnzdcad_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500"><?php echo e($array_nzdcad[$i]); ?>

                        <?php elseif($volnzdcad_sell_array[$i] != $volnzdcad_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            <?php echo e($array_nzdcad[$i]); ?>

                        <?php elseif($volnzdcad_sell_array[$i] == $volnzdcad_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500"><?php echo e($array_nzdcad[$i]); ?>

                        </td>
                    <?php else: ?>
                        <td data-priority="0" scope="col"><?php echo e($array_nzdcad[$i]); ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
                <td data-priority="0" scope="col"><?php echo e($suma_nzdcad); ?></td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">NZDCHF</td>
                <?php for($i = 0; $i < 9; $i++): ?>
                    <?php
                        $sumabuy_sell = $sumanzdchfbuy_array[$i] + $sumanzdchfsell_array[$i];
                    ?>
                    <?php if($volnzdchf_sell_array[$i] == $volnzdchf_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500"><?php echo e($array_nzdchf[$i]); ?>

                        </td>
                    <?php elseif($volnzdchf_sell_array[$i] != $volnzdchf_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500"><?php echo e($array_nzdchf[$i]); ?>

                        <?php elseif($volnzdchf_sell_array[$i] != $volnzdchf_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            <?php echo e($array_nzdchf[$i]); ?>

                        <?php elseif($volnzdchf_sell_array[$i] == $volnzdchf_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500"><?php echo e($array_nzdchf[$i]); ?>

                        </td>
                    <?php else: ?>
                        <td data-priority="0" scope="col"><?php echo e($array_nzdchf[$i]); ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
                <td data-priority="0" scope="col"><?php echo e($suma_nzdchf); ?></td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">NZDJPY</td>
                <?php for($i = 0; $i < 9; $i++): ?>
                    <?php
                        $sumabuy_sell = $sumanzdjpybuy_array[$i] + $sumanzdjpysell_array[$i];
                    ?>
                    <?php if($volnzdjpy_sell_array[$i] == $volnzdjpy_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500"><?php echo e($array_nzdjpy[$i]); ?>

                        </td>
                    <?php elseif($volnzdjpy_sell_array[$i] != $volnzdjpy_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500"><?php echo e($array_nzdjpy[$i]); ?>

                        <?php elseif($volnzdjpy_sell_array[$i] != $volnzdjpy_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            <?php echo e($array_nzdjpy[$i]); ?>

                        <?php elseif($volnzdjpy_sell_array[$i] == $volnzdjpy_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500"><?php echo e($array_nzdjpy[$i]); ?>

                        </td>
                    <?php else: ?>
                        <td data-priority="0" scope="col"><?php echo e($array_nzdjpy[$i]); ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
                <td data-priority="0" scope="col"><?php echo e($suma_nzdjpy); ?></td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">CADCHF</td>
                <?php for($i = 0; $i < 9; $i++): ?>
                    <?php
                        $sumabuy_sell = $sumacadchfbuy_array[$i] + $sumacadchfsell_array[$i];
                    ?>
                    <?php if($volcadchf_sell_array[$i] == $volcadchf_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500"><?php echo e($array_cadchf[$i]); ?>

                        </td>
                    <?php elseif($volcadchf_sell_array[$i] != $volcadchf_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500"><?php echo e($array_cadchf[$i]); ?>

                        <?php elseif($volcadchf_sell_array[$i] != $volcadchf_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            <?php echo e($array_cadchf[$i]); ?>

                        <?php elseif($volcadchf_sell_array[$i] == $volcadchf_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500"><?php echo e($array_cadchf[$i]); ?>

                        </td>
                    <?php else: ?>
                        <td data-priority="0" scope="col"><?php echo e($array_cadchf[$i]); ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
                <td data-priority="0" scope="col"><?php echo e($suma_cadchf); ?></td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">CADJPY</td>
                <?php for($i = 0; $i < 9; $i++): ?>
                    <?php
                        $sumabuy_sell = $sumacadjpybuy_array[$i] + $sumacadjpysell_array[$i];
                    ?>
                    <?php if($volcadjpy_sell_array[$i] == $volcadjpy_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500"><?php echo e($array_cadjpy[$i]); ?>

                        </td>
                    <?php elseif($volcadjpy_sell_array[$i] != $volcadjpy_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500"><?php echo e($array_cadjpy[$i]); ?>

                        <?php elseif($volcadjpy_sell_array[$i] != $volcadjpy_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            <?php echo e($array_cadjpy[$i]); ?>

                        <?php elseif($volcadjpy_sell_array[$i] == $volcadjpy_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500"><?php echo e($array_cadjpy[$i]); ?>

                        </td>
                    <?php else: ?>
                        <td data-priority="0" scope="col"><?php echo e($array_cadjpy[$i]); ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
                <td data-priority="0" scope="col"><?php echo e($suma_cadjpy); ?></td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">CHFJPY</td>
                <?php for($i = 0; $i < 9; $i++): ?>
                    <?php
                        $sumabuy_sell = $sumachfjpybuy_array[$i] + $sumachfjpysell_array[$i];
                    ?>
                    <?php if($volchfjpy_sell_array[$i] == $volchfjpy_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500"><?php echo e($array_chfjpy[$i]); ?>

                        </td>
                    <?php elseif($volchfjpy_sell_array[$i] != $volchfjpy_buy_array[$i] && $sumabuy_sell > 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500"><?php echo e($array_chfjpy[$i]); ?>

                        <?php elseif($volchfjpy_sell_array[$i] != $volchfjpy_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            <?php echo e($array_chfjpy[$i]); ?>

                        <?php elseif($volchfjpy_sell_array[$i] == $volchfjpy_buy_array[$i] && $sumabuy_sell < 0): ?>
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500"><?php echo e($array_chfjpy[$i]); ?>

                        </td>
                    <?php else: ?>
                        <td data-priority="0" scope="col"><?php echo e($array_chfjpy[$i]); ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
                <td data-priority="0" scope="col"><?php echo e($suma_chfjpy); ?></td>
            </tr>
        </tbody>
    </table>
    <div class="text-center">
        <a class="btn principal-button mb-3 new" id="imprimirAnalisis"><i
                class="bi bi-printer-fill me-1"></i>Imprimir PDF</a>
    </div>
<?php else: ?>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="info-fill" fill="#fff" viewBox="0 0 16 16">
            <path
                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="#fff" viewBox="0 0 16 16">
            <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>
    <div class="alert alert-primary d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
            <use xlink:href="#info-fill" />
        </svg>
        <div>
            No se encontró ningún registro
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home1/upnegoci/soluciones.uptradingexperts.com/resources/views/magicnumber/tabla.blade.php ENDPATH**/ ?>