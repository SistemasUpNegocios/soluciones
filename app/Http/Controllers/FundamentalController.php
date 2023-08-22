<?php

namespace App\Http\Controllers;

use App\Models\General;
use App\Models\Trader;
use App\Models\Box;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FundamentalController extends Controller
{
   
    public function index()
    {
        return view('fundamentales.show');
    }


}