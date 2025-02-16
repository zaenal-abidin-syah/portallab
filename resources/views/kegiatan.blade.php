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
        @foreach($kegiatan->kegiatan_lab_foto as $foto)
        <div class="w-full px-3 mb-6 sm:w-full xl:w-full">
            <div class="relative flex flex-row justify-center items-start min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border responsive-card">
                <div class="w-1/2 p-4 image-container">
                    <img src="{{ URL::asset('storage/' . $foto->foto) }}" class="w-full shadow-2xl rounded-xl" alt="foto kegiatan">
                </div>
                <div class="w-1/2 p-4 text-container">
                    <p class="text-justify text-slate-600 dark:text-slate-200">{{$foto->keterangan}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- end cards -->
</div>

<style>
@media (max-width: 768px) {
    .responsive-card {
        flex-direction: column;
    }
    .image-container, .text-container {
        width: 100% !important;
    }
}
</style>
@endsection