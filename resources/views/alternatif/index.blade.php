@extends('layouts.app')
@section('content')
<!-- Start Header -->
<div class="p-1 bg-white flex justify-between items-center">
    <h1 class="mt-4 mb-4 ml-4 font-bold text-[20px] md:text-[25px] relative">Data Alternatif</h1>
</div>
<!-- End Header -->
<!-- Start content -->
<div class="flex flex-wrap mx-2.5 md:mx-5 gap-5">
    <article class="article mt-4 lg:flex-none border-2 border-[#CCC4FF] ">
        <div class="p-10 md:p-5 flex justify-between items-center bg-[#CCC4FF]">
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

                                <button type="submit" class="border-2 border-[#FFF785]  hover:bg-[#FFF785] block capitalize tracking-wide text-gray-700 text-xs font-bold mb-2 mt-2 p-2 rounded-lg focus:ring-4 focus:outline-none focus:ring-[#FFF785]">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </article>
    <article class="article mt-4 bg-opacity-50 border-2 border-[#CCC4FF]">
        <div class="p-10 md:p-5 flex justify-between items-center bg-[#CCC4FF]">
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
                            <td class="whitespace-nowrap px-6 py-4 flex">
                                <div class="flex space-x-1">
                                    <!-- Modal toggle -->
                                    <button data-modal-target="edit-modal-{{$alt->id}}" data-modal-toggle="edit-modal-{{$alt->id}}" class="btn btn-edit border-2 border-[#FFF785]  hover:bg-[#FFF785] inline-block focus:ring-4 focus:outline-none focus:ring-[#FFF785]" type="button">
                                        <svg class="h-4 w-4 text-black"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button>

                                    <!-- Main modal -->
                                    <div id="edit-modal-{{$alt->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                        Edit Alternatif {{$alt->name_alternatif}}
                                                    </h3>
                                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="edit-modal-{{$alt->id}}">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <form action="{{ route('alternatif.update', $alt->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded px-8 flex flex-col h-full">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="grid gap-4 mb-4 grid-cols-2 p-4">
                                                        <div class="col-span-2">
                                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Alternatif</label>
                                                            <input type="text" name="name_alternatif" id="name_alternatif" class="peer h-10 rounded-md border-blue-gray-200 -t-transparent font-sans text-sm font-normal w-full bg-gray-200 text-gray-700 border  py-3 px-4 mb-3 focus:ring-gray-200 focus:bg-white" placeholder="" aria-describedby="name_kriteria" value="{{$alt->name_alternatif}}">
                                                        </div>
                                                        <div class="col-span-2">
                                                            <button type="submit" class="bg-[#FFF785] block capitalize tracking-wide text-gray-700 text-xs font-bold mb-2 mx-auto p-2 w-72 rounded-lg focus:ring-4 focus:outline-none focus:ring-[#FFF785]">Simpan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{route('alternatif.destroy', $alt->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn border-2 border-[#F86666] hover:bg-[#F86666] inline-blocks focus:ring-4 focus:outline-none focus:ring-[#F86666]">
                                        <svg class="h-4 w-4 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="3 6 5 6 21 6" />
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                            <line x1="10" y1="11" x2="10" y2="17" />
                                            <line x1="14" y1="11" x2="14" y2="17" />
                                        </svg>
                                    </button>
                                </form>
                                </div>
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
