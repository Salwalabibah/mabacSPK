@extends('layouts.app')
@section('content')
<div class="col-md-3 py-3">
    <div class="form">
        <div id="component" class="bg-dark">
            <div class="b5 p-4">
                <h3>Tambah Sub Kriteria {{$kriteria->name_kriteria}}</h3>
                <div class="mb-3 ">
                    <form action="{{route('subkriteria.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="name_crips" class="form-label">Nama Alternatif</label>
                        <input type="text" name="name_crips" id="name_crips" class="form-control" placeholder="" aria-describedby="name_crips">
                        <label for="bobot" class="form-label">Bobot</label>
                        <input type="text" name="bobot" id="bobot" class="form-control" placeholder="" aria-describedby="bobot">
                        <label for="id_kriteria" class="form-label">Kriteria</label>
                        <input type="hidden" name="kriteria" id="kriteria" class="form-control" placeholder="" aria-describedby="kriteria", value="{{$kriteria->id}}">
                        {{-- <select name="kriteria" id="kriteria" class="form-control">
                            @foreach ($kriteria as $kri)
                                <option value="{{$kri->id}}" name="kriteria" id="kriteria" class="form-control">{{$kri->name_kriteria}}</option>
                            @endforeach
                        </select> --}}
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
