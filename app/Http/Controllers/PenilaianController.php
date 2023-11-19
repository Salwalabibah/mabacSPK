<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    //
    public function index(){
        $alternatif = Alternatif::with('penilaian.crips');
        return view("penilaian.index", compact('alternatif'));
    }
}
