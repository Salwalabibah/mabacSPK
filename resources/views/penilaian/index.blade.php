@extends('layouts.app')
@section('content')
<div class="container">
    <h2>List Sub Kriteria</h2>
    <div class="row">

        <!-- Table Column -->
        @foreach ($kriteria as $kri)
        <div class="col-md-9 py-3">
            <div class="table-responsive">
                <table class="table table-primary">
                    <a href="{{ route('subkriteria.add', $kri->id)}}">tambah sub kriteria</a>
                    <h3>{{$kri->name_kriteria}}</h3>
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kriteria</th>
                            <th scope="col" style="text-align: center">Bobot</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kri->crips as $index => $sub)
                        <tr class="">
                            <td scope="row">{{ $index + 1 }}</td>
                            <td>{{ $sub->name_crips }}</td>
                            <td style="text-align: center">{{ $sub->bobot }}</td>
                            <td>
                                <form action="{{route('subkriteria.destroy', $sub->id)}}" method="POST">
                                    <a href="{{route('subkriteria.edit', $sub->id)}}" class="btn btn-primary">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
