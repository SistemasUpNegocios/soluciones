<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\General;
use Illuminate\Support\Facades\DB;
use Http;
class IndexController extends Controller
{
    public function index()
    {

        $traders = General::distinct()->get(['trader']);

        return view('dashboard.show', compact("traders"));
    }

    public function getTraders(Request $request)
    {
        $traders = General::select()->where('trader', $request->trader)->get();
        return response($traders);
    }
}
