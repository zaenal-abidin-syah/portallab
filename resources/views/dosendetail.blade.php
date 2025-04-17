@extends('layout.dosendetail')
@section('content')
  <div class="">
    <h1 class="text-xl font-bold text-slate-100 dark:text-white">Detail Informasi Dosen</h1>
    <p class="text-sm text-slate-200 dark:text-slate-100">Informasi lengkap mengenai dosen dan detail akademik.</p>
  </div>

  <div class="flex flex-wrap gap-2 md:gap-3">
    <div class="flex justify-center items-center w-full md:w-4/12 shadow-lg rounded-sm md:rounded-md bg-white dark:bg-slate-850">
      <div class="w-full">
        <div class="">
          <div class="p-4 md:p-6 text-center flex flex-col items-center">
            <img class="w-32 h-32 md:w-48 md:h-48 p-1 rounded-full ring-4 ring-white shadow-lg shadow-slate-600  dark:ring-slate-900 dark:shadow-slate-500" src="{{ URL::asset("storage/$dosen->foto") }}" alt="Bordered avatar">
            <h3 class="text-sm md:text-base mt-2 md:mt-4 font-semibold text-slate-700 dark:text-white">{{ $dosen->nama }}</h3>
            <p class="text-xs md:text-sm text-slate-500 dark:text-slate-200">NIP: {{ $dosen->nip }}</p>
            <p class="text-xs md:text-sm italic text-blue-500 dark:text-blue-700">{{ $dosen->email }}</p>
          </div>
        </div>
      </div>
    </div>

    <div class="w-full max-w-full md:w-7/12 shadow-lg rounded-sm md:rounded-md bg-white dark:bg-slate-850 p-6">
      <div class="">
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
        @php
            $accounts = [
                'Scopus'        => $dosen->akun_scopus,
                'Scholar'       => $dosen->akun_googleScholar,
                'Garuda'        => $dosen->akun_garuda,
                'Sinta'         => $dosen->akun_sinta,
            ];
            $available = array_filter($accounts);
            $colCount = count($available) ?: 1; 
        @endphp
        <div class="grid grid-cols-{{ $colCount }} gap-2">
          @if ($dosen->akun_scopus)
            <div class="flex justify-start items-center">
              <a href="{{ $dosen->akun_scopus }}" class="scopus-button text-xxs md:text-xs md:py-2 py-2 w-9/10">Scopus</a>
            </div>
          @endif
          @if ($dosen->akun_googleScholar)
            <div class="flex justify-start items-center">
              <a href="{{ $dosen->akun_googleScholar }}" class="gscholar-button text-xxs md:text-xs md:py-2 py-2 w-9/10">Scholar</a>
            </div>
          @endif
          @if ($dosen->akun_garuda)
            <div class="flex justify-start items-center">
              <a href="{{ $dosen->akun_garuda }}" class="garuda-button text-xxs md:text-xs md:py-2 py-2 w-9/10">Garuda</a>
            </div>
          @endif
          @if ($dosen->akun_sinta)
            <div class="flex justify-start items-center">
              <a href="{{ $dosen->akun_sinta }}" class="sinta-button text-xxs md:text-xs md:py-2 py-2 w-9/10">Sinta</a>
            </div>
          @endif
        </div>
        <!-- Jabatan -->
        <h2 class="text-sm md:text-base font-bold text-slate-750 dark:text-white my-2">Bidang Minat</h2>
        <div>
          {{-- <span class="block text-xs md:text-sm font-semibold text-slate-700 dark:text-slate-100">Jabatan Terakhir</span> --}}
          <span class="text-xxs  md:text-xs mt-1 block w-full rounded-md border-none text-slate-700 dark:text-slate-200">
            {{-- {{ $dosen->jabatanTerakhir ? $dosen->jabatanTerakhir->jabatan->jabatan : 'Tidak Ada Jabatan' }} --}}
            {{ $dosen->laboratorium->nama_lab }}
          </span>
        </div>
      </div>
    </div>
    <!-- End Details Section -->

  </div>
{{-- </div> --}}
@endsection
