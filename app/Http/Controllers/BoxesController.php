<?php

namespace App\Http\Controllers;

use App\Models\General;
use App\Models\Trader;
use App\Models\Box;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoxesController extends Controller
{
    public function index()
    {

        return view('boxes.show');
        
    }

    public function getBoxes()
    {

        $boxes = Box::all();

        return datatables()->of($boxes)
            ->addColumn('price', 'boxes.price')
            ->addColumn('ra', 'boxes.ra')
            ->addColumn('rab', 'boxes.rab')
            ->addColumn('rb', 'boxes.rb')
            ->addColumn('sb', 'boxes.sb')
            ->addColumn('sbc', 'boxes.sbc')
            ->addColumn('sc', 'boxes.sc')
            ->rawColumns(['price', 'ra', 'rab', 'rb', 'sb', 'sbc', 'sc'])->toJson();
    }

}