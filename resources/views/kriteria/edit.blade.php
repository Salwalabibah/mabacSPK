@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('kriteria.update', ['kriterium' => $kriteria->id]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="name_kriteria">Nama Kriteria: </label>
            <input type="text" name="name_kriteria" id="" class="form-control" required="required" value="{{$kriteria->name_kriteria}}"><br>

            <label for="attribute">Atribut: </label>
            <select name="attribute" id="attribute" class="form-control" aria-label="Default select example" value="{{$kriteria->attribute}}">
                <option value="benefit">Benefit</option>
                <option value="cost">Cost</option>
            </select>

            <label for="bobot">Bobot: </label>
            <input type="text" name="bobot" id="" class="form-control" required="required" value="{{$kriteria->bobot}}"><br>

            <button type="submit" name="submit" class="btn btn-primary float-lg-right">Simpan</button>
        </div>
    </form>
</div>
@endsection
