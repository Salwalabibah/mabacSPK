@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('alternatif.update', ['alternatif' => $alternatif->id]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="name_alternatif">Nama alternatif: </label>
            <input type="text" name="name_alternatif" id="" class="form-control" required="required" value="{{$alternatif->name_alternatif}}"><br>

            <button type="submit" name="submit" class="btn btn-primary float-lg-right">Simpan</button>
        </div>
    </form>
</div>
@endsection
