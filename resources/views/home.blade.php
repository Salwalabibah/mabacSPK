@extends('layouts.app')
@section('content')
    <!-- Start Header -->
    <div class="p-1 bg-white flex justify-between items-center">
        <h1 class="mt-4 mb-4 ml-4 font-bold text-[20px] md:text-[25px] relative">Studi Kasus</h1>
    </div>
    <!-- End Header -->

    <div class="bg-white dark:bg-slate-850 p-3 mt-3 rounded border mx-2.5">
        <iframe src="{{asset('assets/jurnal/spk_kejaksaan_MABAC.pdf')}}" class="w-full h-96 rounded-lg" frameborder="0"></iframe>
    </div>
@endsection
