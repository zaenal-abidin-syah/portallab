@extends('layout.dosen')
@section('content')
<div class="w-full px-6 py-6 mx-auto">

  <!-- Header Section -->
  <div class="mb-8">
    <h1 class="text-2xl font-bold text-slate-700 dark:text-white">Detail Informasi Dosen</h1>
    <p class="text-sm text-gray-500 dark:text-gray-300">Informasi lengkap mengenai dosen dan detail akademik.</p>
  </div>

  <div class="flex flex-wrap -mx-3">
    <div class="flex justify-center px-3 w-full md:w-4/12">
      <div class="w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-xl">
        <div class="border border-gray-200 dark:border-slate-700 shadow-lg rounded-xl bg-white dark:bg-slate-800">
          <div class="p-6 text-center">
            <!-- Foto Profil -->
            <div class="mx-auto mb-4 w-32 h-32 sm:w-40 sm:h-40 md:w-48 md:h-48 overflow-hidden rounded-full">
              <img 
                src="{{ URL::asset("storage/$dosen->foto") }}" 
                class="w-full h-24 object-cover"
                alt="profile image"
              >
            </div>
            
            <!-- Informasi Dosen -->
            <h3 class="text-xl font-semibold text-slate-700 dark:text-white">{{ $dosen->nama }}</h3>
            <p class="text-sm text-gray-500 dark:text-gray-300">NIP: {{ $dosen->nip }}</p>
            <p class="mt-2 text-sm text-blue-500">{{ $dosen->email }}</p>
          </div>
        </div>
      </div>
    </div>


    <!-- Details Section -->
    <div class="w-full max-w-full px-3 md:w-8/12">
      <div class="border border-gray-200 dark:border-slate-700 shadow-lg rounded-xl bg-white dark:bg-slate-800 p-6">
        
        <!-- Informasi Dosen -->
        <h2 class="text-lg font-bold text-slate-700 dark:text-white mb-4">Informasi Dosen</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
            <input readonly type="text" value="{{ $dosen->nama }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-slate-700 bg-gray-50 dark:bg-slate-800 text-gray-700 dark:text-gray-300 shadow-sm">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">NIP</label>
            <input readonly type="text" value="{{ $dosen->nip }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-slate-700 bg-gray-50 dark:bg-slate-800 text-gray-700 dark:text-gray-300 shadow-sm">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
            <input readonly type="text" value="{{ $dosen->email }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-slate-700 bg-gray-50 dark:bg-slate-800 text-gray-700 dark:text-gray-300 shadow-sm">
          </div>
        </div>

        <hr class="my-6 border-gray-200 dark:border-slate-700">

        <!-- Pendidikan Terakhir -->
        <h2 class="text-lg font-bold text-slate-700 dark:text-white mb-4">Pendidikan Terakhir</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jenjang</label>
            <input readonly type="text" value="{{ $dosen->jenjang }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-slate-700 bg-gray-50 dark:bg-slate-800 text-gray-700 dark:text-gray-300 shadow-sm">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Universitas</label>
            <input readonly type="text" value="{{ $dosen->universitas }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-slate-700 bg-gray-50 dark:bg-slate-800 text-gray-700 dark:text-gray-300 shadow-sm">
          </div>
        </div>

        <hr class="my-6 border-gray-200 dark:border-slate-700">

        <!-- Akun Akademik -->
        <h2 class="text-lg font-bold text-slate-700 dark:text-white mb-4">Akun Akademik</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Scopus</label>
            <input readonly type="text" value="{{ $dosen->akun_scopus }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-slate-700 bg-gray-50 dark:bg-slate-800 text-gray-700 dark:text-gray-300 shadow-sm">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Google Scholar</label>
            <input readonly type="text" value="{{ $dosen->akun_googleScholar }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-slate-700 bg-gray-50 dark:bg-slate-800 text-gray-700 dark:text-gray-300 shadow-sm">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Sinta</label>
            <input readonly type="text" value="{{ $dosen->akun_sinta }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-slate-700 bg-gray-50 dark:bg-slate-800 text-gray-700 dark:text-gray-300 shadow-sm">
          </div>
        </div>

        <hr class="my-6 border-gray-200 dark:border-slate-700">

        <!-- Jabatan -->
        <h2 class="text-lg font-bold text-slate-700 dark:text-white mb-4">Jabatan</h2>
        <div>
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jabatan Terakhir</label>
          <input readonly type="text" value="{{ $dosen->jabatanTerakhir ? $dosen->jabatanTerakhir->jabatan->jabatan : 'Tidak Ada Jabatan' }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-slate-700 bg-gray-50 dark:bg-slate-800 text-gray-700 dark:text-gray-300 shadow-sm">
        </div>
      </div>
    </div>
    <!-- End Details Section -->

  </div>
</div>
@endsection
