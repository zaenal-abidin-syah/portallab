@extends('layout.dosen')
@section('content')
<div class="w-full px-12 py-6 mx-auto">

  <!-- Header Section -->
  <div class="mb-8">
    <h1 class="text-2xl font-bold text-slate-700 dark:text-white">Detail Informasi Dosen</h1>
    <p class="text-sm text-gray-500 dark:text-gray-300">Informasi lengkap mengenai dosen dan detail akademik.</p>
  </div>

  <div class="flex flex-wrap -mx-3 gap-2 ">
    <div class="flex justify-center items-center w-full md:w-4/12 shadow-lg rounded-xl mr-2 bg-white dark:bg-slate-800">
      <div class="w-full">
        <div class="">
          <div class="p-6 text-center flex flex-col items-center">
            <img class="w-48 h-48 p-1 rounded-full ring-4 ring-white shadow-lg shadow-gray-600  dark:ring-gray-500" src="{{ URL::asset("storage/$dosen->foto") }}" alt="Bordered avatar">
            
            <!-- Informasi Dosen -->
            <h3 class="text-2xl mt-8 font-semibold text-slate-700 dark:text-white">{{ $dosen->nama }}</h3>
            <p class="text-xl text-gray-500 dark:text-gray-300">NIP: {{ $dosen->nip }}</p>
            <p class="mt-2 text-lg italic text-blue-500">{{ $dosen->email }}</p>
          </div>
        </div>
      </div>
    </div>


    <!-- Details Section -->
    <div class="w-full max-w-full md:w-7/12 rounded-xl bg-white dark:bg-slate-800 p-8">
      <div class="">
        
        <!-- Informasi Dosen -->
        <h2 class="text-lg font-bold text-slate-700 dark:text-white mb-4">Informasi Dosen</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
            <input readonly type="text" value="{{ $dosen->nama }}" class="mt-1 block w-full rounded-md border-none dark:bg-slate-800 text-gray-700 dark:text-gray-300">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">NIP</label>
            <input readonly type="text" value="{{ $dosen->nip }}" class="mt-1 block w-full rounded-md border-none dark:bg-slate-800 text-gray-700 dark:text-gray-300">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
            <input readonly type="text" value="{{ $dosen->email }}" class="mt-1 block w-full rounded-md border-none dark:bg-slate-800 text-gray-700 dark:text-gray-300">
          </div>
        </div>

        <hr class="my-6 ">

        <!-- Pendidikan Terakhir -->
        <h2 class="text-lg font-bold text-slate-700 dark:text-white mb-4">Pendidikan Terakhir</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jenjang</label>
            <input readonly type="text" value="{{ $dosen->jenjang }}" class="mt-1 block w-full rounded-md border-none dark:bg-slate-800 text-gray-700 dark:text-gray-300">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Universitas</label>
            <input readonly type="text" value="{{ $dosen->universitas }}" class="mt-1 block w-full rounded-md border-none dark:bg-slate-800 text-gray-700 dark:text-gray-300">
          </div>
        </div>

        <hr class="my-6">

        <!-- Akun Akademik -->
        <h2 class="text-lg font-bold text-slate-700 dark:text-white mb-4">Akun Akademik</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
          <div class="flex flex-col justify-between gap-2">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Scopus</label>
            <a href="{{ $dosen->akun_scopus }}" class="scopus-button px-3 py-2 w-1/2">Scopus</a>
          </div>
          <div class="flex flex-col justify-between gap-2">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Google Scholar</label>
            <a href="{{ $dosen->akun_googleScholar }}" class="gscholar-button px-3 py-2 w-1/2">Google Scholar</a>
          </div>
          <div class="flex flex-col justify-between gap-2">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Garuda</label>
            <a href="{{ $dosen->akun_googleScholar }}" class="garuda-button px-3 py-2 w-1/2">Garuda</a>
          </div>
        </div>

        <hr class="my-6">

        <!-- Jabatan -->
        <h2 class="text-lg font-bold text-slate-700 dark:text-white mb-4">Jabatan</h2>
        <div>
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jabatan Terakhir</label>
          <input readonly type="text" value="{{ $dosen->jabatanTerakhir ? $dosen->jabatanTerakhir->jabatan->jabatan : 'Tidak Ada Jabatan' }}" class="mt-1 block w-full rounded-md border-none dark:bg-slate-800 text-gray-700 dark:text-gray-300">
        </div>
      </div>
    </div>
    <!-- End Details Section -->

  </div>
</div>
@endsection
