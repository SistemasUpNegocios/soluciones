<?php

namespace App\Http\Controllers;

use App\Models\General;
use App\Models\Trader;
use App\Models\Box;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Boxes2Controller extends Controller
{
    public function index()
    {

        return view('boxes2.show');
        
    }

    public function getBoxes()
    {

        $boxes = Box::all();

        return datatables()->of($boxes)
            ->addColumn('price', 'boxes2.price')
            ->addColumn('ra', 'boxes2.ra')
            ->addColumn('rab', 'boxes2.rab')
            ->addColumn('rb', 'boxes2.rb')
            ->addColumn('sb', 'boxes2.sb')
            ->addColumn('sbc', 'boxes2.sbc')
            ->addColumn('sc', 'boxes2.sc')
            ->rawColumns(['price', 'ra', 'rab', 'rb', 'sb', 'sbc', 'sc'])->toJson();
    }

}