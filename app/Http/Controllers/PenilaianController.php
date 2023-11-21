<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    //
    public function index(){
        $alternatif = Alternatif::all();
        $kriteria = Kriteria::all();
        return view("penilaian.index", compact('alternatif', 'kriteria'));
    }
}
