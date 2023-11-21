@extends('layouts.app')
@section('content')
<!-- Start Header -->
<div class="p-1 bg-white flex justify-between items-center">
    <h1 class="mt-4 mb-4 ml-4 font-bold text-[20px] md:text-[25px] relative">Data Penilaian</h1>
</div>
<!-- End Header -->
<!-- Start content -->
<div class="flex flex-wrap mx-2.5 md:mx-5 gap-5">
    <article class="article mt-4">
        <div class="p-10 md:p-5 flex justify-between items-center bg-[#eee]">
            <h2 class="text-[20px] font-bold">Matriks Penilaian</h2>
        </div>
        <div class="block md:flex text-center p-5 border-[#eee] justify-center">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                      <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                          <tr>
                            <th scope="col" class="px-6 py-4"></th>
                            @foreach ($kriteria as $kri)
                            <th scope="col" class="px-6 py-4">{{$kri->name_kriteria}}</th>
                            @endforeach
                          </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($alternatif as $alt)
                            <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                            </tr>
                                <td class="whitespace-nowrap px-6 py-4 font-bold">{{$alt->name_alternatif}}</td>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </article>
</div>

@endsection
