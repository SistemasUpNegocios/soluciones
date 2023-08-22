<?php

namespace App\Http\Controllers;

use App\Models\Transmision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransmisionController extends Controller
{
    public function index()
    {
        return view('transmision.show');
    }

    public function getLive()
    {
        $live = DB::table("transmision")
        ->orderBy('id', 'asc')
        ->get();

        return datatables()->of($live)->addColumn('btn', 'transmision.buttons')->rawColumns(['btn'])->toJson();
    }

    public function addLive(Request $request)
    {
        if ($request->ajax()) {

            $request->validate([
                'link' => 'required'
            ]);

            $transmision = new transmision;
            $transmision->link = $request->input('link');

            $transmision->save();
           
            return response($transmision);
            
        }
    }

    public function deleteLive(Request $request)
    {
        if ($request->ajax()) {
            $transmision_id = $request->id;

            Transmision::destroy($request->id);
            
        }
    }

}