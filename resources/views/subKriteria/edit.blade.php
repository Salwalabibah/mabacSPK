@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('subkriteria.update', ['subkriterium' => $crips->id]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="name_crips">Nama Sub Kriteria: </label>
            <input type="text" name="name_crips" id="" class="form-control" required="required" value="{{$crips->name_crips}}"><br>

            <label for="attribute">Atribut: </label>

            <label for="bobot">Bobot: </label>
            <input type="text" name="bobot" id="" class="form-control" required="required" value="{{$crips->bobot}}"><br>

            <button type="submit" name="submit" class="btn btn-primary float-lg-right">Simpan</button>
        </div>
    </form>
</div>
@endsection
