@extends('layouts.app')

@section('content')
<!-- Start Header -->
<div class="p-1 bg-white flex justify-between items-center">
    <h1 class="mt-4 mb-4 ml-4 font-bold text-[20px] md:text-[25px] relative">Data Alternatif</h1>
</div>
<!-- End Header -->

<div class="flex flex-wrap mx-2.5 md:mx-5 gap-5">
    <article class="article mt-4">
        <div class="p-10 md:p-5 flex justify-between items-center bg-[#eee]">
            <h2 class="text-[20px] font-bold">Edit Alternatif</h2>
        </div>
            <div class="flex flex-col p-5">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                            <form action="{{ route('alternatif.update', ['alternatif' => $alternatif->id]) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded px-8 flex flex-col h-full">
                                @method('PUT')
                                @csrf
                                    <label for="name_alternatif" class="form-label block capitalize tracking-wide text-gray-700 text-xs font-bold mb-2">Nama Kriteria</label>
                                    <input type="text" name="name_alternatif" id="name_alternatif" class="peer h-10 rounded-md border-blue-gray-200 -t-transparent font-sans text-sm font-normal w-full bg-gray-200 text-gray-700 border  py-3 px-4 mb-3 focus:ring-gray-200 focus:bg-white" placeholder="" aria-describedby="name_alternatif" value="{{$alternatif->name_alternatif}}">

                                    <button type="submit" class="btn btn-primary  block capitalize tracking-wide text-gray-700 text-xs font-bold mb-2 mt-2 p-2">Simpan</button>
                            </form>
                </div>
              </div>
        </div>
    </article>
</div>
@endsection
