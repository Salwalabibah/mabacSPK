@extends('layouts.app')
@section('content')

<!-- Start Header -->
<div class="p-1 bg-white flex justify-between items-center">
    <h1 class="mt-4 mb-4 ml-4 font-bold text-[20px] md:text-[25px] relative">Hasil Perankingan</h1>
</div>
<!-- End Header -->

<!-- Start content -->
<div class="flex flex-wrap mx-2.5 md:mx-5 gap-5">
    <article class="article mt-4 bg-opacity-50 border-2 border-[#CCC4FF]">
        <div class="p-10 md:p-5 flex justify-between items-center bg-[#CCC4FF]">
            <h2 class="text-[20px] font-bold">Hasil Akhir</h2>
        </div>
        <div class="block p-5 border-[#eee]">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden w-full">
                        @foreach ($ranking as $alternativeId => $total)
                            @php
                                $alternative = $alternatif->where('id', $alternativeId)->first();
                            @endphp
                            <p class="px-5 py-3 text-justify md:mt-4 sm:mt-4">
                                Dari hasil perhitungan diatas dapat disimpulkan bahwa berdasarkan kriteria
                                @foreach ($kriteria as $kri)
                                    <span class="font-bold">{{$kri->name_kriteria}}, </span>
                                @endforeach
                                maka <span class="font-bold">{{$alternative->name_alternatif}}</span> terpilih sebagai distributor karena memiliki nilai Bobot Evaluasi tertinggi yaitu sebesar <span class="font-bold">{{ number_format($total, 2) }}</span>.
                                        <!-- Modal toggle -->
                                <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="mt-5 block text-black bg-[#CCC4FF] hover:bg-[#bcb2ff] focus:ring-4 focus:outline-none focus:ring-[#CCC4FF] font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                                    Lihat Langkah
                                </button>
                            </p>
                            @break {{-- Add this line to break out of the loop after the first iteration --}}
                        @endforeach
                  </div>
                </div>
              </div>
        </div>
    </article>
    <article class="article mt-4 bg-opacity-50 border-2 border-[#CCC4FF]">
        <div class="p-10 md:p-5 flex justify-between items-center bg-[#CCC4FF]">
            <h2 class="text-[20px] font-bold">Perankingan</h2>
        </div>
        <div class="block md:flex text-center p-3 border-[#eee] justify-center">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table
                        class="items-center overflow-x-auto w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Ranking
                                    </th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Alternatif</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Total
                                    </th>
                                </tr>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ranking as $alternativeId => $total)
                                @php
                                    $alternative = $alternatif->where('id', $alternativeId)->first();
                                @endphp
                                <tr>
                                    <td class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <span class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                            {{ $loop->iteration }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <span class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                            {{ $alternative->name_alternatif }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <span class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                            {{ number_format($total, 2) }}
                                        </span>
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

            <!-- Main modal -->
            <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-5 w-full max-w-5xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Langkah-Langkah Perhitungan
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            <article class="article mt-3 bg-opacity-50 border-2 border-[#CCC4FF] w-11/12 mx-auto">
                                <div class="p-3 md:p-5 flex justify-between items-center bg-[#CCC4FF]">
                                    <span class="font-bold text-left uppercase align-middle shadow-none dark:border-white/40 dark:text-white text-sm text-black opacity-70">1. Matriks Penilaian</span>
                                </div>
                                    <div class="block py-4 px-3 border-[#eee] justify-center items-center ">
                                        <div class="flex flex-col ">
                                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                <div class="inline-block min-w-full sm:px-6 lg:px-8 ">
                                                    <div class="overflow-hidden w-full">
                                                        <table
                                                    class="items-center overflow-x-auto w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                                    <thead class="align-bottom">
                                                        <tr>
                                                            <th
                                                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                                Alternatif</th>
                                                            @foreach ($kriteria as $index => $c)
                                                                <th
                                                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                                    C{{ $index+1}}</th>
                                                            @endforeach
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($alternatif as $a)
                                                            <tr>
                                                                <td
                                                                    class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                                    <span
                                                                        class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                                        {{ $a->name_alternatif }}
                                                                    </span>
                                                                </td>
                                                                @foreach ($kriteria as $c)
                                                                @php
                                                                $penilaianRecord = $penilaian
                                                                    ->where('id_kriteria', $c->id)
                                                                    ->where('id_alternatif', $a->id)
                                                                    ->first();
                                                                 @endphp

                                                                    <td
                                                                        class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                                        <span
                                                                            class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                                            {{ $penilaianRecord ? $penilaianRecord->value : 0 }}
                                                                        </span>
                                                                    </td>
                                                                @endforeach
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </article>

                            <article class="article mt-5 bg-opacity-50 border-2 border-[#CCC4FF] w-11/12 mx-auto">
                                <div class="p-3 md:p-5 flex justify-between items-center bg-[#CCC4FF]">
                                    <span class="font-bold text-left uppercase align-middle shadow-none dark:border-white/40 dark:text-white text-sm text-black opacity-70">2. Matriks Normalisasi</span>
                                </div>
                                    <div class="block md:flex py-4 px-3 border-[#eee] justify-center items-center ">
                                        <div class="flex flex-col ">
                                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                <div class="inline-block min-w-full sm:px-6 lg:px-8 ">
                                                    <div class="overflow-hidden w-full">
                                                        <table
                                                    class="items-center overflow-x-auto w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                                    <thead class="align-bottom">
                                                        <tr>
                                                            <th
                                                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                                Alternatif</th>
                                                                @foreach ($kriteria as $index => $c)
                                                                <th
                                                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                                    C{{$index+1}}</th>
                                                                @endforeach
                                                        </tr>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($alternatif as $a)
                                                            <tr>
                                                                <td
                                                                    class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                                    <span
                                                                        class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                                        {{ $a->name_alternatif }}
                                                                    </span>
                                                                </td >
                                                                @foreach ($kriteria as $c)
                                                                {{-- @php
                                                                $penilaianRecord = $penilaian
                                                                    ->where('id_kriteria', $c->id)
                                                                    ->where('id_alternatif', $a->id)
                                                                    ->first();
                                                                 @endphp --}}

                                                                    <td  class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                                        <span
                                                                            class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                                            {{ $normalisasi[$c->id][($a->id)-1] ?? '0' }}
                                                                        </span>
                                                                    </td>
                                                                @endforeach
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </article>

                            <article class="article mt-5 bg-opacity-50 border-2 border-[#CCC4FF] w-11/12 mx-auto">
                                <div class="p-3 md:p-5 flex justify-between items-center bg-[#CCC4FF]">
                                    <span class="font-bold text-left uppercase align-middle shadow-none dark:border-white/40 dark:text-white text-sm text-black opacity-70">3. Matriks Tertimbang (V)</span>
                                </div>
                                    <div class="block md:flex py-4 px-3 border-[#eee] justify-center items-center ">
                                        <div class="flex flex-col ">
                                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                <div class="inline-block min-w-full sm:px-6 lg:px-8 ">
                                                    <div class="overflow-hidden w-full">
                                                        <table
                                                    class="items-center overflow-x-auto w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                                    <thead class="align-bottom">
                                                        <tr>
                                                            <th
                                                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                                Alternatif</th>
                                                                @foreach ($kriteria as $index => $c)
                                                                <th
                                                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                                    C{{$index+1}}</th>
                                                                @endforeach
                                                        </tr>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($alternatif as $a)
                                                            <tr>
                                                                <td
                                                                    class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                                    <span
                                                                        class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                                        {{ $a->name_alternatif }}
                                                                    </span>
                                                                </td >
                                                                @foreach ($kriteria as $c)
                                                                {{-- @php
                                                                $penilaianRecord = $penilaian
                                                                    ->where('id_kriteria', $c->id)
                                                                    ->where('id_alternatif', $a->id)
                                                                    ->first();
                                                                 @endphp --}}

                                                                    <td  class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                                        <span
                                                                            class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                                            {{ $pembobotan[$c->id][$a->id-1] ?? '0' }}
                                                                        </span>
                                                                    </td>
                                                                @endforeach
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </article>

                            <article class="article mt-5 bg-opacity-50 border-2 border-[#CCC4FF] w-11/12 mx-auto">
                                <div class="p-3 md:p-5 flex justify-between items-center bg-[#CCC4FF]">
                                    <span class="font-bold text-left uppercase align-middle shadow-none dark:border-white/40 dark:text-white text-sm text-black opacity-70">4. Penentuan Matriks Area Perkiraan Batas (G)</span>
                                </div>
                                    <div class="block md:flex py-4 px-3 border-[#eee] justify-center items-center ">
                                        <div class="flex flex-col ">
                                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                <div class="inline-block min-w-full sm:px-6 lg:px-8 ">
                                                    <div class="overflow-hidden w-full">
                                                        <table
                                                    class="items-center overflow-x-auto w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                                    <thead class="align-bottom">
                                                        <tr>
                                                            <th
                                                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                                Kriteria</th>
                                                                @foreach ($kriteria as $index => $c)
                                                                <th
                                                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                                    C{{$index+1}}</th>
                                                                @endforeach
                                                        </tr>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td
                                                                class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                                <span
                                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                                   G
                                                                </span>
                                                            </td >
                                                            @foreach ($kriteria as $c)

                                                                <td  class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                                    <span
                                                                        class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                                        {{ $perkiraanBatas[$c->id] ?? '0' }}
                                                                    </span>
                                                                </td>
                                                            @endforeach

                                                </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </article>

                            <article class="article mt-5 bg-opacity-50 border-2 border-[#CCC4FF] w-11/12 mx-auto">
                                <div class="p-3 md:p-5 flex justify-between items-center bg-[#CCC4FF]">
                                    <span class="font-bold text-left uppercase align-middle shadow-none dark:border-white/40 dark:text-white text-sm text-black opacity-70">5. Perhitungan elemen matriks jarak alternatif dari daerah perkiraan perbatasan (Q)</span>
                                </div>
                                    <div class="block md:flex py-4 px-3 border-[#eee] justify-center items-center ">
                                        <div class="flex flex-col ">
                                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                <div class="inline-block min-w-full sm:px-6 lg:px-8 ">
                                                    <div class="overflow-hidden w-full">
                                                        <table
                                                    class="items-center overflow-x-auto w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                                    <thead class="align-bottom">
                                                        <tr>
                                                            <th
                                                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                                Alternatif</th>
                                                                @foreach ($kriteria as $index => $c)
                                                                <th
                                                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                                    C{{$index+1}}</th>
                                                                @endforeach
                                                        </tr>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($alternatif as $a)
                                                            <tr>
                                                                <td
                                                                    class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                                    <span
                                                                        class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                                        {{ $a->name_alternatif }}
                                                                    </span>
                                                                </td >
                                                                @foreach ($kriteria as $c)
                                                                    <td  class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                                        <span
                                                                            class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                                            {{ $jarakAlternatif[$c->id][($a->id)-1] ?? '0' }}
                                                                        </span>
                                                                    </td>
                                                                @endforeach
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                {{-- </div> --}}
                            </article>
                        </div>

                    </div>
                </div>
            </div>


<script>
    setTwoNumberDecimal = myHTMLNumberInput.onchange ;

    function setTwoNumberDecimal(event) {
        this.value = parseFloat(this.value).toFixed(2);
    }
</script>
@endsection
