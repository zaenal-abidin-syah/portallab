@extends('layout.kegiatan')
@section('content')
<div class="w-full px-6 py-6 mx-auto">

    <div class="relative flex flex-col flex-auto min-w-0 p-4 overflow-hidden break-words bg-white border-0 dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl rounded-2xl bg-clip-border">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-auto max-w-full px-3 my-auto">
                <div class="h-full">
                <h5 class="mb-1 dark:text-white">{{ $kegiatan->nama_kegiatan }}</h5>
                <p class="mb-0 font-semibold leading-normal dark:text-white dark:opacity-60 text-sm">Kategori : {{ $kegiatan->kegiatan->kategori_kegiatan }}</p>
                <p class="mb-0 dark:text-white dark:opacity-60">
                    Tanggal Pelaksanaan: {{ $kegiatan->tanggal }}
                </p>
                </div>
            </div>
        </div>
    </div>

    <!-- cards -->
    <div class="flex flex-wrap my-3 -mx-3">

        <!-- card1 -->
        @foreach($kegiatan->kegiatan_lab_foto as $foto)
        <div class="w-full max-w-full px-3 mb-6 mt-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-6/12">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    
                    <div class="flex-none w-auto max-w-full">
                        <img src="{{ URL::asset("storage/$foto->foto") }}" class="w-full mb-2 shadow-2xl rounded-xl" alt="foto kegiatan">
                        <p class="text-center mb-0 mt-2 text-gray-600 dark:text-gray-300">{{$foto->keterangan}}</p>
                    </div>
                    
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <!-- end cards -->
</div>
@endsection