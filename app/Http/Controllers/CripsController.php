<?php

namespace App\Http\Controllers;

use App\Models\Crips;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class CripsController extends Controller
{
    //
    public function index(){
        $kriteria = Kriteria::all();
        $crips = Crips::with('kriteria')
        ->join('kriteria', 'crips.id_kriteria', '=', 'kriteria.id')
        ->select('crips.name_crips', 'crips.bobot', 'kriteria.name_kriteria')
        ->get();

        return view('subKriteria.index', compact('crips','kriteria'));
    }

    public function create(){
    // Use $id_kriteria as needed in your logic
        // $kriteria = Kriteria::all();
        return view("subKriteria.create", compact("id"));
    }

    public function add(string $id){
        $kriteria = Kriteria::find($id);
        return view("subKriteria.create", compact("kriteria"));
    }

    public function store(Request $request){
        $request->validate([
            'name_crips'=> 'required',
            'bobot'=> 'required',
            'kriteria'=>'required',
        ]);

        Crips::create([
            'name_crips'=> $request->get('name_crips'),
            'bobot'=> $request->get('bobot'),
            'id_kriteria'=> $request->get('kriteria'),
        ]);

        return redirect()->route('subkriteria.index')->with('success','sub kriteria berhasil ditambahkan');
    }

    public function show($id){}
    public function edit($id){
        $crips = Crips::with('kriteria')->where('id', $id)->first();
        $kriteria = Kriteria::all();
        return view('subKriteria.edit', compact('crips','kriteria'));
    }

    public function update(Request $request, $id){
        $crips = Crips::find($id);
        $request->validate([
            // 'id_kriteria'=>'required',
            'name_crips'=> 'required',
            'bobot'=> 'required',
        ]);

        $crips->update([
            // 'id_kriteria'=> $request->get('kriteria'),
            'name_crips'=> $request->get('name_crips'),
            'bobot'=> $request->get('bobot'),
        ]);

        return redirect()->route('subkriteria.index')->with('success','sub kriteria berhasil ditambahkan');

    }

    public function destroy($id){
        $crips = Crips::find($id);
        $crips->delete();
        return redirect()->route('subkriteria.index')->with('success','sub kriteria berhasil dihapus');
    }

}
