@extends('layouts.app')
@section('content')
<!-- Start Header -->
<div class="p-1 bg-white flex justify-between items-center">
    <h1 class="mt-4 mb-4 ml-4 font-bold text-[20px] md:text-[25px] relative">Data Alternatif</h1>
</div>
<!-- End Header -->
<!-- Start content -->
<div class="flex flex-wrap mx-2.5 md:mx-5 gap-5">
    <article class="article mt-4 flex-none">
        <div class="p-10 md:p-5 flex justify-between items-center bg-[#eee]">
            <h2 class="text-[20px] font-bold">Tambah Alternatif</h2>
        </div>
        <div class="block md:flex p-5 border-[#eee]">
            <div class="flex flex-col h-full">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden w-full">
                            <form action="{{route('alternatif.store')}}" method="POST" enctype="multipart/form-data" class="bg-white rounded px-8 flex flex-col h-full">
                                @csrf
                                <label for="name_alternatif" class="form-label block capitalize tracking-wide text-gray-700 text-xs font-bold mb-2">Nama Alternatif</label>
                                <input type="text" name="name_alternatif" id="name_alternatif" class="peer h-10 rounded-md border-blue-gray-200 -t-transparent font-sans text-sm font-normal w-full bg-gray-200 text-gray-700 border  py-3 px-4 mb-3 focus:ring-gray-200 focus:bg-white" placeholder="" aria-describedby="name_alternatif">

                                <button type="submit" class="btn  btn-primary  block capitalize tracking-wide text-gray-700 text-xs font-bold mb-2 mt-auto">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </article>
    <article class="article mt-4">
        <div class="p-10 md:p-5 flex justify-between items-center bg-[#eee]">
            <h2 class="text-[20px] font-bold">List Alternatif</h2>
        </div>
        <div class="block md:flex text-center p-5 border-[#eee] justify-center">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="inline-block w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                      <table class="w-full text-left text-sm font-light table-fixed">
                        <thead class="border-b font-medium dark:border-neutral-500">
                          <tr>
                            <th scope="col" class="px-6 py-4">No</th>
                            <th scope="col" class="px-6 py-4">Nama Alternatif</th>
                            <th scope="col" class="px-6 py-4">Aksi</th>
                          </tr>
                        </thead>
                        <tbody class="">
                         @foreach ($alternatif as $index => $alt)
                          <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $index + 1 }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $alt->name_alternatif}}</td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <form action="{{route('alternatif.destroy', $alt->id)}}" method="POST">
                                <a href="{{route('alternatif.edit', $alt->id)}}" class="btn btn-edit border-blue-500 hover:bg-blue-600">
                                    <svg class="h-4 w-4 text-black"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                      </svg>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <svg class="h-4 w-4 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="3 6 5 6 21 6" />
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                        <line x1="10" y1="11" x2="10" y2="17" />
                                        <line x1="14" y1="11" x2="14" y2="17" />
                                    </svg>
                                </button>
                            </form>
                            </td>
                          </tr>
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
