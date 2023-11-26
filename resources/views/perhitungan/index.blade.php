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
        <div class="p-10 md:p-5 flex justify-between items-center bg-white">
            <h2 class="text-[20px] font-bold">Matriks Penilaian</h2>
        </div>

        <div class="block md:flex p-5 border-[#eee] justify-center items-center ">
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
        <div class="block md:flex p-5 border-[#eee] justify-center items-center ">
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
                                                {{ $normalisasi[$c->id][($a->id)-1] ?? 'N/A' }}
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
        <div class="block md:flex p-5 border-[#eee] justify-center items-center ">
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
                                                {{ $pembobotan[$c->id][$a->id] ?? 'N/A' }}
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
</div>


<script>
    setTwoNumberDecimal = myHTMLNumberInput.onchange ;

    function setTwoNumberDecimal(event) {
        this.value = parseFloat(this.value).toFixed(2);
    }
</script>
@endsection
