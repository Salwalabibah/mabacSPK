<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    //
    public function index(){
    $kriteria = Kriteria::all();
    $alternatif = Alternatif::all();
    $penilaian = Penilaian::with(['alternatif', 'kriteria'])->get();

    $minMax = [];
    $maxXi = [];
    $minXi = [];
    $tij = [];

    $desiredDecimalPlaces = 2; // Ganti dengan jumlah desimal yang diinginkan

    foreach ($kriteria as $k => $v) {
        foreach ($penilaian as $p => $val) {
            if ($v->id == $val->id_kriteria) {
                $minMax[$v->id][] = $val->value;
            }
        }

        // Check if there are values for the current $kriteriaId
        if (!empty($minMax[$v->id])) {
            $values = $minMax[$v->id];
            $maxXi[$v->id] = max($values);
            $minXi[$v->id] = min($values);

            // Initialize $tij for the current $kriteriaId
            $tij[$v->id] = [];

            // Normalisasi
            foreach ($values as $value) {
                if ($v->attribute == "benefit") {
                    $normalizedValue = ($maxXi[$v->id] - $minXi[$v->id]) != 0 ? ($value - $minXi[$v->id]) / ($maxXi[$v->id] - $minXi[$v->id]) : 0;
                } elseif ($v->attribute == "cost") {
                    $normalizedValue = ($maxXi[$v->id] - $minXi[$v->id]) != 0 ? ($maxXi[$v->id] - $value) / ($maxXi[$v->id] - $minXi[$v->id]) : 0;
                }

                // Format the normalized value with the desired decimal places
                $formattedValue = number_format($normalizedValue, $desiredDecimalPlaces);

                $tij[$v->id][] = $formattedValue;
            }
        }
    }

    // dd($tij);

    // Kirim data ke view
    return view('perhitungan.index', ['normalisasi' => $tij, 'kriteria'=>$kriteria, 'alternatif'=>$alternatif, 'penilaian'=>$penilaian] );


    }

}
