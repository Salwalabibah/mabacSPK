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
                        <h3>Tambah Kriteria</h3>
                        <div class="mb-3 ">
                            <form action="{{route('kriteria.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for="name_kriteria" class="form-label">Nama Kriteria</label>
                                <input type="text" name="name_kriteria" id="name_kriteria" class="form-control" placeholder="" aria-describedby="name_kriteria">

                                <label for="attribute" class="form-label">Atribut Kriteria</label>
                                <select name="attribute" id="attribute" class="form-control" aria-label="Default select example">
                                    <option value="benefit" selected>Benefit</option>
                                    <option value="cost">Cost</option>
                                </select>

                                <label for="bobot" class="form-label">Bobot Kriteria</label>
                                <input type="text" name="bobot" id="bobot" class="form-control" placeholder="" aria-describedby="bobot">

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
                            <th scope="col">Nama Kriteria</th>
                            <th scope="col">Atribut Kriteria</th>
                            <th scope="col">Bobot</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($kriteria as $kri)
                        <tr class="">
                            <td scope="row">{{$i}}</td>
                            <td>{{$kri->name_kriteria}}</td>
                            <td>{{$kri->attribute}}</td>
                            <td>{{$kri->bobot}}</td>
                            <td>
                                <form action="{{route('kriteria.destroy', $kri->id)}}" method="POST">
                                    <a href="{{route('kriteria.edit', $kri->id)}}" class="btn btn-primary">Edit</a>
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
