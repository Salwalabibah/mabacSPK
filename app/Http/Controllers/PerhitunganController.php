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

    $desiredDecimalPlaces = 2; // Ganti jumlah desimal
    $criteriCount = count($kriteria);

    foreach ($kriteria as $k => $v) {
        foreach ($penilaian as $p => $val) {
            if ($v->id == $val->id_kriteria) {
                $minMax[$v->id][] = $val->value;
                $w[$v->id] = $v->bobot;
            }
        }

        // Check if there are values for the current $kriteriaId
        if (!empty($minMax[$v->id])) {
            $values = $minMax[$v->id];
            $maxXi[$v->id] = max($values);
            $minXi[$v->id] = min($values);

            // Initialize $tij for the current $kriteriaId
            $tij[$v->id] = [];
            $V[$v->id][] = [];

            // Normalisasi
            foreach ($values as $value) {
                if ($v->attribute == "benefit") {
                    $normalizedValue = ($maxXi[$v->id] - $minXi[$v->id]) != 0 ? ($value - $minXi[$v->id]) / ($maxXi[$v->id] - $minXi[$v->id]) : 0;
                } elseif ($v->attribute == "cost") {
                    $normalizedValue = ($maxXi[$v->id] - $minXi[$v->id]) != 0 ? ($maxXi[$v->id] - $value) / ($maxXi[$v->id] - $minXi[$v->id]) : 0;
                }

                // Format the normalized value with the desired decimal places
                $formattedValue = number_format($normalizedValue, $desiredDecimalPlaces);

                // Normalisasi
                $tij[$v->id][] = $formattedValue;

                // matriks tertimbang
                $V[$v->id][] = number_format((($formattedValue * $v->bobot) + $v->bobot), $desiredDecimalPlaces);

            }
        }
    }

    // dd($V, $w);

    // Kirim data ke view
    return view('perhitungan.index', ['normalisasi' => $tij, 'kriteria'=>$kriteria, 'alternatif'=>$alternatif, 'penilaian'=>$penilaian, 'pembobotan'=>$V] );

    }

}
