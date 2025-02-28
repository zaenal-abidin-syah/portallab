@extends('layout.dosen')
@section('content')
{{-- <div class="w-full px-12 py-6 mx-auto"> --}}

  <!-- Header Section -->
  <div class="">
    <h1 class="text-xl font-bold text-slate-100 dark:text-white">Detail Informasi Dosen</h1>
    <p class="text-sm text-slate-200 dark:text-slate-100">Informasi lengkap mengenai dosen dan detail akademik.</p>
  </div>

  <div class="flex flex-wrap gap-2 md:gap-3">
    <div class="flex justify-center items-center w-full md:w-4/12 shadow-lg rounded-xl bg-white dark:bg-slate-850">
      <div class="w-full">
        <div class="">
          <div class="p-4 md:p-6 text-center flex flex-col items-center">
            <img class="w-32 h-32 md:w-48 md:h-48 p-1 rounded-full ring-4 ring-white shadow-lg shadow-slate-600  dark:ring-slate-900 dark:shadow-slate-500" src="{{ URL::asset("storage/$dosen->foto") }}" alt="Bordered avatar">
            
            <!-- Informasi Dosen -->
            <h3 class="text-sm md:text-base mt-2 md:mt-4 font-semibold text-slate-700 dark:text-white">{{ $dosen->nama }}</h3>
            <p class="text-xs md:text-sm text-slate-500 dark:text-slate-200">NIP: {{ $dosen->nip }}</p>
            <p class="text-xs md:text-sm italic text-blue-500 dark:text-blue-700">{{ $dosen->email }}</p>
          </div>
        </div>
      </div>
    </div>


    <!-- Details Section -->
    <div class="w-full max-w-full md:w-7/12 shadow-lg rounded-xl bg-white dark:bg-slate-850 p-6">
      <div class="">
        
        <!-- Informasi Dosen -->
        {{-- <h2 class="text-sm md:text-xl font-bold text-slate-800 dark:text-white">Informasi Dosen</h2> --}}
        {{-- <div class="grid grid-cols-1 md:grid-cols-2 gap-1">
          <div>
            <span class="block text-sm font-semibold text-slate-800 dark:text-slate-300">Nama</span>
            <input value="{{ $dosen->nama }}" class="text-xs mt-1 block w-full rounded-md border-none dark:bg-slate-800 text-slate-700 dark:text-slate-300">
          </div>
          <div>
            <span class="block text-sm font-semibold text-slate-800 dark:text-slate-300">NIP</span>
            <input value="{{ $dosen->nip }}" class="text-xs mt-1 block w-full rounded-md border-none dark:bg-slate-800 text-slate-700 dark:text-slate-300">
          </div>
          <div>
            <span class="block text-sm font-semibold text-slate-800 dark:text-slate-300">Email</span>
            <input value="{{ $dosen->email }}" class="text-xs mt-1 block w-full rounded-md border-none dark:bg-slate-800 text-slate-700 dark:text-slate-300">
          </div>
        </div> --}}

        <!-- Pendidikan Terakhir -->
        <h2 class="text-sm md:text-base font-bold text-slate-750 dark:text-white my-2">Pendidikan Terakhir</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-1">
          <div>
            <span class="block text-xs md:text-sm font-semibold text-slate-700 dark:text-slate-100">Jenjang</span>
            <span class="text-xxs md:text-xs mt-1 block w-full rounded-md border-none text-slate-700 dark:text-slate-200">{{ $dosen->jenjang }}</span>
          </div>
          <div>
            <span class="block text-xs md:text-sm font-semibold text-slate-700 dark:text-slate-100">Universitas</span>
            <span class="text-xxs md:text-xs mt-1 block w-full rounded-md border-none  text-slate-700 dark:text-slate-200">{{ $dosen->universitas }}</span>
          </div>
        </div>

        <h2 class="text-sm md:text-base font-bold text-slate-750 dark:text-white my-2">Akun Akademik</h2>
        <div class="grid grid-cols-3 gap-4">
          <div class="flex justify-start items-center">
            {{-- <span class="block text-xs  md:text-sm font-medium text-slate-700 dark:text-slate-200">Scopus</span> --}}
            <a href="{{ $dosen->akun_scopus }}" class="scopus-button text-xxs md:text-xs md:py-2 py-2 w-9/10">Scopus</a>
          </div>
          <div class="flex justify-start items-center">
            {{-- <span class="block text-xs  md:text-sm font-medium text-slate-700 dark:text-slate-200">Google Scholar</span> --}}
            <a href="{{ $dosen->akun_googleScholar }}" class="gscholar-button text-xxs md:text-xs md:py-2 py-2 w-9/10">Scholar</a>
          </div>
          <div class="flex justify-start items-center">
            {{-- <span class="block text-xs  md:text-sm font-medium text-slate-700 dark:text-slate-200">Garuda</span> --}}
            <a href="{{ $dosen->akun_googleScholar }}" class="garuda-button text-xxs md:text-xs md:py-2 py-2 w-9/10">Garuda</a>
          </div>
        </div>
        <!-- Jabatan -->
        <h2 class="text-sm md:text-base font-bold text-slate-750 dark:text-white my-2">Jabatan</h2>
        <div>
          <span class="block text-xs md:text-sm font-semibold text-slate-700 dark:text-slate-100">Jabatan Terakhir</span>
          <span class="text-xxs  md:text-xs mt-1 block w-full rounded-md border-none text-slate-700 dark:text-slate-200">
            {{ $dosen->jabatanTerakhir ? $dosen->jabatanTerakhir->jabatan->jabatan : 'Tidak Ada Jabatan' }}
          </span>
        </div>
      </div>
    </div>
    <!-- End Details Section -->

  </div>
{{-- </div> --}}
@endsection
