<?php



namespace App\Http\Controllers;



use App\Models\General;

use App\Models\Trader;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use \PDF;




class GraficaController2023 extends Controller

{

    public function index($id)

    {
        $activos = array("EURUSD", "GBPUSD", "AUDUSD", "NZDUSD", "USDCAD", "USDCHF", "USDJPY", "EURGBP", "EURAUD", "EURNZD", "GBPAUD", "GBPNZD", "AUDNZD", "EURCAD", "EURCHF", "EURJPY", "GBPCAD", "GBPCHF", "GBPJPY", "AUDCAD", "AUDCHF", "AUDJPY", "NZDCAD", "NZDCHF", "NZDJPY", "CADCHF", "CADJPY", "CHFJPY");

        return view('graficas2023.show', compact('id') , compact('activos'));
    }



    public function getTrader2023(Request $request)

    {

        $traders = General::select()

            ->where('trader_id', $request->id)

            ->whereBetween('fecha', [$request->inicio, $request->fin])

            ->orderBy('fecha', 'asc')

            ->get();

        $balanceInicialFiltro = General::select('balance')

            ->select('balance')
            
            ->whereBetween('fecha', [$request->inicio, $request->fin])

            ->where('trader_id', $request->id)

            ->orderBy('balance', 'asc')

            ->limit(1)

            ->first();

        $balanceFinalFiltro = General::select('balance')

            ->select('balance')
            
            ->whereBetween('fecha', [$request->inicio, $request->fin])

            ->where('trader_id', $request->id)

            ->orderBy('balance', 'desc')

            ->limit(1)

            ->first();

        $tradersNombre = Trader::select()->where('id', $request->id)->get();

        return response(['traders' => $traders, 'tradersNombre' => $tradersNombre, 'balanceInicialFiltro' => $balanceInicialFiltro, 'balanceFinalFiltro' => $balanceFinalFiltro]);

    }

    public function getResume2023(Request $request)
    {

        $totalTrades = DB::table('historico_operaciones')

            ->where('trader_id', $request->id)

            ->whereBetween('time_close', [$request->inicio, $request->fin])

            ->count();


        $rentables = DB::table('historico_operaciones')

        ->where('trader_id', $request->id)

        ->whereBetween('time_close', [$request->inicio, $request->fin])

        ->where('profit','>',0)

        ->count();


        $noRentables = DB::table('historico_operaciones')

        ->where('trader_id', $request->id)

        ->whereBetween('time_close', [$request->inicio, $request->fin])

        ->where('profit','<',0)

        ->count();


        $compras = DB::table('historico_operaciones')

        ->where('trader_id', $request->id)

        ->whereBetween('time_close', [$request->inicio, $request->fin])

        ->where('type_operation','=','Buy')

        ->count();


        $ventas = DB::table('historico_operaciones')

        ->where('trader_id', $request->id)

        ->whereBetween('time_close', [$request->inicio, $request->fin])

        ->where('type_operation','=','Sell')

        ->count();

        
        $beneficioBruto = DB::table('historico_operaciones')

        ->where('trader_id', $request->id)

        ->whereBetween('time_close', [$request->inicio, $request->fin])

        ->where('profit','>',0)

        ->sum('profit');

               
        $perdidasBruto = DB::table('historico_operaciones')

        ->where('trader_id', $request->id)

        ->whereBetween('time_close', [$request->inicio, $request->fin])

        ->where('profit','<',0)

        ->sum('profit');

        if ($rentables == 0) {
            $beneficioMedio = 0;
        } else {
            $beneficioMedio = $beneficioBruto/$rentables;
        }

        if ($noRentables == 0) {
            $perdidasMedias = 0;
        } else {
            $perdidasMedias = $perdidasBruto/$noRentables;
        }


        $tradersNombre = Trader::select()->where('id', $request->id)->get();
        $tradersID = Trader::select()->where('id', $request->id)->get();


        $activos = array("EURUSD", "GBPUSD", "AUDUSD", "NZDUSD", "USDCAD", "USDCHF", "USDJPY", "EURGBP", "EURAUD", "EURNZD", "GBPAUD", "GBPNZD", "AUDNZD", "EURCAD", "EURCHF", "EURJPY", "GBPCAD", "GBPCHF", "GBPJPY", "AUDCAD", "AUDCHF", "AUDJPY", "NZDCAD", "NZDCHF", "NZDJPY", "CADCHF", "CADJPY", "CHFJPY");
        
        $resultados = [];

        $resultadosCortas = [];

        $resultadosLargas = [];

        foreach ($activos as $activo) {
            $activosOperaciones = DB::table('historico_operaciones')
            ->where('trader_id', $request->id)
            ->whereBetween('time_close', [$request->inicio, $request->fin])
            ->where('symbol','=', $activo)
            ->count();

            $resultados[$activo] = $activosOperaciones;

            $activosCortas = DB::table('historico_operaciones')
            ->where('trader_id', $request->id)
            ->whereBetween('time_close', [$request->inicio, $request->fin])
            ->where('symbol','=', $activo)
            ->where('type_operation','=','Sell')
            ->count();

            $resultadosCortas[$activo] = $activosCortas;

            $activosLargas = DB::table('historico_operaciones')
            ->where('trader_id', $request->id)
            ->whereBetween('time_close', [$request->inicio, $request->fin])
            ->where('symbol','=', $activo)
            ->where('type_operation','=','Buy')
            ->count();

            $resultadosLargas[$activo] = $activosLargas;

        }

        return response(['totalTrades' => $totalTrades, 'tradersNombre' => $tradersNombre, 'rentables' => $rentables, 'noRentables' => $noRentables, 'beneficioBruto' => $beneficioBruto, 'perdidasBruto' => $perdidasBruto, 'beneficioMedio' => $beneficioMedio, 'perdidasMedias' => $perdidasMedias, 'compras' => $compras, 'ventas' => $ventas, 'tradersID' => $tradersID, 'activosOperaciones' => $resultados, 'activosCortas' => $resultadosCortas, 'activosLargas' => $resultadosLargas]);

    }

    public function getPDF(Request $request)
    {

        $id = $request->id;

        $tradersNombre = DB::table('traders_data')->select('id', 'Signal', 'Balance')->where('id', $request->id)->first();

        // $tr = $request->tr;
        // $variant = $request->variant;
        
        $fecha_inicio = \Carbon\Carbon::parse($request->inicio)->format('d/m/Y');
        $fecha_fin = \Carbon\Carbon::parse($request->fin)->format('d/m/Y');

        $totalTrades = DB::table('historico_operaciones')

        ->where('trader_id', $request->id)

        ->whereBetween('time_close', [$request->inicio, $request->fin])

        ->count();


            $rentables = DB::table('historico_operaciones')

            ->where('trader_id', $request->id)

            ->whereBetween('time_close', [$request->inicio, $request->fin])

            ->where('profit','>',0)

            ->count();


            $noRentables = DB::table('historico_operaciones')

            ->where('trader_id', $request->id)

            ->whereBetween('time_close', [$request->inicio, $request->fin])

            ->where('profit','<',0)

            ->count();


            $compras = DB::table('historico_operaciones')

            ->where('trader_id', $request->id)

            ->whereBetween('time_close', [$request->inicio, $request->fin])

            ->where('type_operation','=','Buy')

            ->count();


            $ventas = DB::table('historico_operaciones')

            ->where('trader_id', $request->id)

            ->whereBetween('time_close', [$request->inicio, $request->fin])

            ->where('type_operation','=','Sell')

            ->count();

            
            $beneficioBruto = DB::table('historico_operaciones')

            ->where('trader_id', $request->id)

            ->whereBetween('time_close', [$request->inicio, $request->fin])

            ->where('profit','>',0)

            ->sum('profit');

                
            $perdidasBruto = DB::table('historico_operaciones')

            ->where('trader_id', $request->id)

            ->whereBetween('time_close', [$request->inicio, $request->fin])

            ->where('profit','<',0)

            ->sum('profit');

            if ($rentables == 0) {
                $beneficioMedio = 0;
            } else {
                $beneficioMedio = $beneficioBruto/$rentables;
            }

            if ($noRentables == 0) {
                $perdidasMedias = 0;
            } else {
                $perdidasMedias = $perdidasBruto/$noRentables;
            }


            $tradersNombre = Trader::select()->where('id', $request->id)->get();
            $tradersID = Trader::select()->where('id', $request->id)->get();


            $activos = array("EURUSD", "GBPUSD", "AUDUSD", "NZDUSD", "USDCAD", "USDCHF", "USDJPY", "EURGBP", "EURAUD", "EURNZD", "GBPAUD", "GBPNZD", "AUDNZD", "EURCAD", "EURCHF", "EURJPY", "GBPCAD", "GBPCHF", "GBPJPY", "AUDCAD", "AUDCHF", "AUDJPY", "NZDCAD", "NZDCHF", "NZDJPY", "CADCHF", "CADJPY", "CHFJPY");
            
            $resultados = [];

            $resultadosCortas = [];

            $resultadosLargas = [];

            foreach ($activos as $activo) {
                $activosOperaciones = DB::table('historico_operaciones')
                ->where('trader_id', $request->id)
                ->whereBetween('time_close', [$request->inicio, $request->fin])
                ->where('symbol','=', $activo)
                ->count();

                $resultados[$activo] = $activosOperaciones;

                $activosCortas = DB::table('historico_operaciones')
                ->where('trader_id', $request->id)
                ->whereBetween('time_close', [$request->inicio, $request->fin])
                ->where('symbol','=', $activo)
                ->where('type_operation','=','Sell')
                ->count();

                $resultadosCortas[$activo] = $activosCortas;

                $activosLargas = DB::table('historico_operaciones')
                ->where('trader_id', $request->id)
                ->whereBetween('time_close', [$request->inicio, $request->fin])
                ->where('symbol','=', $activo)
                ->where('type_operation','=','Buy')
                ->count();

                $resultadosLargas[$activo] = $activosLargas;

            }

            $balanceInicialFiltro = General::select('balance')

            ->select('balance')
            
            ->whereBetween('fecha', [$request->inicio, $request->fin])

            ->where('trader_id', $request->id)

            ->orderBy('balance', 'asc')

            ->limit(1)

            ->first();

        $balanceFinalFiltro = General::select('balance')

            ->select('balance')
            
            ->whereBetween('fecha', [$request->inicio, $request->fin])

            ->where('trader_id', $request->id)

            ->orderBy('balance', 'desc')

            ->limit(1)

            ->first();



                $data = array(
                    "fecha_inicio" => $fecha_inicio,
                    "fecha_fin" => $fecha_fin,
                    "activos" => $activos,
                    "totalTrades" => $totalTrades,
                    "tradersNombre" => $tradersNombre,
                    "rentables" => $rentables,
                    "noRentables" => $noRentables,
                    "beneficioBruto" => $beneficioBruto,
                    "perdidasBruto" => $perdidasBruto,
                    "beneficioMedio" => $beneficioMedio,
                    "perdidasMedias" => $perdidasMedias,
                    "compras" => $compras,
                    "ventas" => $ventas,
                    "tradersID" => $tradersID,
                    "activosOperaciones" => $resultados,
                    "activosCortas" => $resultadosCortas,
                    "activosLargas" => $resultadosLargas,
                    "balanceInicialFiltro" => $balanceInicialFiltro,
                    "balanceFinalFiltro" => $balanceFinalFiltro,
                    "id" => $id,
                );
                
                ini_set('max_execution_time', 180); //3 minutes

                $pdf = PDF::loadView('graficas2023.imprimir', $data)->setPaper('a4', 'landscape');
                return $pdf->stream('resume.pdf');

    }

}