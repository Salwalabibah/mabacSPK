<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    //
    public function index(){
        $kriteria = Kriteria::all();
        return view("kriteria.index", $kriteria);
    }

    public function store(Request $request){
        $request -> validate([
            'name_kriteria' => 'required|string',
            'attribute'     => 'required|string',
            'bobot'         => 'required|number',
        ]);

        Kriteria::create($request->all());
        return redirect()->route('kriteria.index')
            ->with('success','Kriteria berhasil ditambahkan');
    }

    public function edit(string $id){
        $kriteria = Kriteria::find($id);
        return view('kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, string $id){
        $request -> validate([
            'name_kriteria' => 'required|string',
            'attribute'     => 'required|string',
            'bobot'         => 'required|number',
        ]);

        Kriteria::find($id)->update($request->all());
        return redirect()->route('kriteria.index')
        ->with('success', 'Kriteria berhasil diupdate');
    }

    public function destroy(Kriteria $kriteria){
        $kriteria->delete();
        return redirect()->route('kriteria.index')
        ->with('success','Kriteria berhasil dihapus');
    }
}
