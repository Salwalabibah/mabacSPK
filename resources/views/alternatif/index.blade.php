@extends('layouts.app')
@section('content')
<div class="container">
    <h2>List Kriteria</h2>
    <div class="row">
        <!-- Form Column -->
        <div class="col-md-3 py-3">
            <div class="form">
                <div id="component" class="bg-dark">
                    <div class="b5 p-4">
                        <h3>Tambah Alternatif</h3>
                        <div class="mb-3 ">
                            <form action="{{route('alternatif.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for="name_alternatif" class="form-label">Nama Alternatif</label>
                                <input type="text" name="name_alternatif" id="name_alternatif" class="form-control" placeholder="" aria-describedby="name_alternatif">

                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Column -->
        <div class="col-md-9 py-3">
            <div class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Alternatif</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alternatif as $index => $alt)
                        <tr class="">
                            <td>{{$index+1}}</td>
                            <td scope="row">{{$alt->name_alternatif}}</td>
                            <td>
                                <form action="{{route('alternatif.destroy', $alt->id)}}" method="POST">
                                    <a href="{{route('alternatif.edit', $alt->id)}}" class="btn btn-primary">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
