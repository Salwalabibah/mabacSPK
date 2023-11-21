@extends('layouts.app')
@section('content')

<!-- Start Header -->
<div class="p-1 bg-white flex justify-between items-center">
    <h1 class="mt-4 mb-4 ml-4 font-bold text-[20px] md:text-[25px] relative head-progress">Data Sub Kriteria</h1>
</div>
<!-- End Header -->
<!-- Start content -->
<div class="flex flex-wrap mx-2.5 md:mx-5 gap-5">
    @foreach ($kriteria as $kri)
    <article class="article mt-4">
        <div class="p-10 md:p-5 flex justify-between items-center bg-[#eee]">
            <h2 class="text-[20px] font-bold">{{$kri->name_kriteria}}</h2>
            <button class="ml-auto" type="button" data-te-toggle="modal"
            data-te-target="#exampleModal" data-te-ripple-init data-te-ripple-color="light">
                <a href="{{route('subkriteria.add', $kri->id)}}">
                  <svg class="h-8 w-8 text-black-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z"/>
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                </svg>
                </a>

              </button>
        </div>

        <div class="block md:flex text-center p-5 border-[#eee] justify-center">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                      <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                          <tr>
                            <th scope="col" class="px-6 py-4">No</th>
                            <th scope="col" class="px-6 py-4">Nama Kriteria</th>
                            <th scope="col" class="px-6 py-4">Bobot</th>
                            <th scope="col" class="px-6 py-4">Aksi</th>
                          </tr>
                        </thead>
                        <tbody class="">
                         @foreach ($kri->crips as $index => $sub)
                          <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $index + 1 }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $sub->name_crips }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $sub->bobot }}</td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <form action="{{route('subkriteria.destroy', $sub->id)}}" method="POST">
                                <a href="{{route('subkriteria.edit', $sub->id)}}" class="btn btn-edit border-blue-500 hover:bg-blue-600">
                                    <svg class="h-4 w-4 text-black"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                      </svg>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ">
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
    @endforeach
</div>
@endsection
