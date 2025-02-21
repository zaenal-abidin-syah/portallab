@extends('layout.menu')
@section('content')

<!-- cards -->
<div class="w-full px-6 py-6 mx-auto">
  <div class="relative w-full mx-auto">
    <div class="relative flex flex-col flex-auto min-w-0 p-6 mx-3 overflow-hidden break-words bg-white border-0 dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl rounded-2xl bg-clip-border">
      <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-auto max-w-full px-3 my-auto">
          <div class="h-full">
            <h4 id="lab" class="mb-1 dark:text-white">{{ $lab->nama_lab }}</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="grid grid-cols-1 gap-3 md:grid-cols-5 mt-6 mb-6">
    <div class="w-full md:col-span-2 max-w-full px-3 mt-0">
      <div class="border-black/12.5 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border"> 
        <div class="flex-auto p-4">

          <div class="flex flex-wrap">
            <div class="flex-none w-auto max-w-full">
              <div class="relative inline-flex items-center justify-center text-white transition-all duration-200 ease-in-out text-base h-19 w-19 rounded-xl">
                @if($kepalaLaboratorium)
                <img src={{ URL::asset("storage/$kepalaLaboratorium->foto") }} alt="profile_image" class="w-16 h-16 shadow-2xl rounded-xl" />
                @else
                <img alt="Kepala Laboratorium : Belum Ditemukan" class="w-full shadow-2xl rounded-xl" />
                @endif
              </div>
            </div>
            <div class="flex-none w-auto max-w-full px-3 my-auto">
            @if($kepalaLaboratorium)
                <h5 class="mb-1 dark:text-white">{{ $kepalaLaboratorium->nama }}</h5>
                <p class="mb-0 font-semibold leading-normal dark:text-white text-sm"> Koordinator Laboratorium {{ $kepalaLaboratorium->laboratorium->nama_lab }}</p>
            @else
                <p>Kepala Laboratorium: Belum ditentukan</p>
            @endif
            </div>          
            <div class="flex-none w-auto max-w-full px-3 my-auto ml-auto">
              @if($kepalaLaboratorium)  
              <form action="{{ route('dosendetail')}}" method="POST" class="flex w-full">
                @csrf
                <input type="hidden" name="id_dosen" value="{{$kepalaLaboratorium->id}}">
                <button class="px-3 py-1 text-xs font-semibold text-white bg-blue-500 rounded hover:bg-blue-600">
                      Detail
                </button>
              </form>
              @else
                <p>Kepala Laboratorium: Belum ditentukan</p>
              @endif

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="w-full md:col-span-3 max-w-full px-3">
      <div class="border-black/12.5 dark:text-slate-100 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
        <div class="flex-auto p-4">
          <p>{!! strip_tags($lab->deskripsi) !!}</p>
        </div>
      </div>
    </div>
  </div>

  <x-table-title title="Mata Kuliah"/>
  <x-table-wraper idTable="matakuliah-table" title="Daftar Mata Kuliah pada Laboratorium {{ $lab->nama_lab }} untuk Semester {{ $semester }} Tahun Ajaran {{ $tahunAjaran }}">
    <x-slot name="thead">
      <tr>
        <th class="w-2 font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-slate-400 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
        <th class="font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-slate-400 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Mata Kuliah</th>
      </tr>
    </x-slot>
    <x-slot name="tbody">
      @foreach ($matakuliah_lab as $matkul)
        <tr>
          <td class="align-middle border-b dark:border-slate-400 shadow-transparent">{{ $loop->iteration }}</td>
          <td class="align-middle border-b dark:border-slate-400 whitespace-nowrap shadow-transparent">
            {{ucwords($matkul->nama_matKul)}}
          </td>
        </tr>
      @endforeach
    </x-slot>
  </x-table-wraper>

  <x-table-title title="Fasilitas"/>
  <x-table-wraper idTable="fasilitas-table">
    <x-slot name="thead">
      <tr>
        <th class="w-2 font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-slate-400 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
        <th class="font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-slate-400 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Fasilitas</th>
        <th class="font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-slate-400 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Jumlah</th>
      </tr>
    </x-slot>
    <x-slot name="tbody">
      @foreach ($fasilitas_lab as $fasilitas)
        <tr>
          <td class="align-middle border-b dark:border-slate-400 shadow-transparent">{{ $loop->iteration }}</td>
          <td class="align-middle border-b dark:border-slate-400 whitespace-nowrap shadow-transparent">
            {{$fasilitas->nama_fasilitas}}
          </td>
          <td class="align-middle border-b dark:border-slate-400 whitespace-nowrap shadow-transparent">
           {{$fasilitas->fasilitas_lab[0]->jumlah}}
          </td> 
        </tr>
      @endforeach
    </x-slot>
  </x-table-wraper>

  <x-table-title title="Publikasi"/>
  <x-table-wraper idTable="publikasi-table">
    <x-slot name="thead">
      <tr>
        <th class="w-2 font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-slate-400 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
        <th class="font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-slate-400 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Judul</th>
        <th class="font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-slate-400 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Author</th>
        <th class="font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-slate-400 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tahun</th>
        <th class="font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-slate-400 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Link</th>
      </tr>
    </x-slot>
    <x-slot name="tbody">
      @foreach ($publikasi_lab as $publikasi)
        <tr>
          <td class="align-middle border-b dark:border-slate-400 shadow-transparent">{{ $loop->iteration }}</td>
          <td class="align-middle border-b dark:border-slate-400 whitespace-nowrap shadow-transparent">
            {{ucwords($publikasi->judul_publikasi)}}
          </td>
          <td class="align-middle border-b dark:border-slate-400 whitespace-nowrap shadow-transparent">
            {{$publikasi->publikasi_penulis[0]->dosen->nama}}
          </td> 
          <td class="align-middle border-b dark:border-slate-400 whitespace-nowrap shadow-transparent">
            {{$publikasi->tanggal}}
          </td> 
          <td class="align-middle border-b dark:border-slate-400 whitespace-nowrap shadow-transparent">
            @if ($publikasi->link_googleScholar)
              <a href="{{$publikasi->link_googleScholar}}" class="gscholar-button px-2 py-0 mx-1">
                Scholar
              </a>
            @endif
            @if ($publikasi->link_scopus)
              <a href="{{$publikasi->link_scopus}}" class="scopus-button px-2 py-0 mx-1">
                Scopus
              </a>
            @endif
            @if ($publikasi->link_garuda)
              <a href="{{$publikasi->link_garuda}}" class="garuda-button px-2 py-0 mx-1">
                Garuda
              </a>
            @endif
          </td> 
        </tr>
      @endforeach
    </x-slot>
  </x-table-wraper>


  <x-table-title title="Buku"/>
  <x-table-wraper idTable="buku-table">
    <x-slot name="thead">
      <tr>
        <th class="w-2 font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-slate-400 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
        <th class="font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-slate-400 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Judul</th>
        <th class="font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-slate-400 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Author</th>
        <th class="font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-slate-400 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tahun</th>
      </tr>
    </x-slot>
    <x-slot name="tbody">
      @foreach ($buku_lab as $buku)
        <tr>
          <td class="align-middle border-b dark:border-slate-400 shadow-transparent">{{ $loop->iteration }}</td>
          <td class="align-middle border-b dark:border-slate-400 whitespace-nowrap shadow-transparent">
            {{ucwords($buku->judul_buku)}}
          </td>
          <td class="align-middle border-b dark:border-slate-400 whitespace-nowrap shadow-transparent">
            @foreach ($buku->buku_penulis as $penulis)
              <span>{{$penulis->dosen->nama}}</span>
            @endforeach
          </td> 
          <td class="align-middle border-b dark:border-slate-400 whitespace-nowrap shadow-transparent">
            {{$buku->tanggal}}
          </td> 
        </tr>
      @endforeach
    </x-slot>
  </x-table-wraper>

  <x-table-title title="Riset"/>
  <x-table-wraper idTable="riset-table">
    <x-slot name="thead">
      <tr>
        <th class="w-2 font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-slate-400 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
        <th class="font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-slate-400 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Judul</th>
        <th class="font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-slate-400 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Author</th>
        <th class="font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-slate-400 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tahun</th>
      </tr>
    </x-slot>
    <x-slot name="tbody">
      @foreach ($riset_lab as $riset)
        <tr>
          <td class="align-middle border-b dark:border-slate-400 shadow-transparent">{{ $loop->iteration }}</td>
          <td class="align-middle border-b dark:border-slate-400 whitespace-nowrap shadow-transparent">
            {{ucwords($riset->judul_riset)}}
          </td>
          <td class="align-middle border-b dark:border-slate-400 whitespace-nowrap shadow-transparent">
            {{ $riset->dosen->nama }}
          </td> 
          <td class="align-middle border-b dark:border-slate-400 whitespace-nowrap shadow-transparent">
            {{$riset->tanggal}}
          </td> 
        </tr>
      @endforeach
    </x-slot>
  </x-table-wraper>


  <x-table-title title="Pengabdian Masyarakat"/>
  <x-table-wraper idTable="pengabdian-table">
    <x-slot name="thead">
      <tr>
        <th class="w-2 font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-slate-400 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
        <th class="font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-slate-400 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Judul</th>
        <th class="font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-slate-400 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal</th>
      </tr>
    </x-slot>
    <x-slot name="tbody">
      @foreach ($pengabdian_lab as $pengabdian)
        <tr>
          <td class="align-middle border-b dark:border-slate-400 shadow-transparent">{{ $loop->iteration }}</td>
          <td class="align-middle border-b dark:border-slate-400 whitespace-nowrap shadow-transparent">
            {{ucwords($pengabdian->judul_pengabdian)}}
          </td>
          <td class="align-middle border-b dark:border-slate-400 whitespace-nowrap shadow-transparent">
            {{$pengabdian->tanggal}}
          </td> 
        </tr>
      @endforeach
    </x-slot>
  </x-table-wraper>

  <x-table-title title="Kegiatan"/>
  <x-table-wraper idTable="kegiatan-table">
    <x-slot name="thead">
      <tr>
        <th class="w-2 font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-slate-400 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
        <th class="font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-slate-400 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Judul Kegiatan</th>
        <th class="font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-slate-400 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Kategori Kegiatan</th>
        <th class="font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-slate-400 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Pelaksanaan</th>
        <th class="font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-slate-400 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">#</th>
      </tr>
    </x-slot>
    <x-slot name="tbody">
      @foreach ($kegiatan_lab as $kegiatan)
        <tr>
          <td class="align-middle border-b dark:border-slate-400 shadow-transparent">{{ $loop->iteration }}</td>
          <td class="align-middle border-b dark:border-slate-400 whitespace-nowrap shadow-transparent">
            {{ucwords($kegiatan->nama_kegiatan)}}
          </td>
          <td class="align-middle border-b dark:border-slate-400 whitespace-nowrap shadow-transparent">
            {{$kegiatan->kegiatan->kategori_kegiatan}}
          </td> 
          <td class="align-middle border-b dark:border-slate-400 whitespace-nowrap shadow-transparent">
            {{$kegiatan->tanggal}}
          </td> 
          <td class="align-middle border-b dark:border-slate-400 whitespace-nowrap shadow-transparent">
            <form action="{{ route('kegiatandetail')}}" method="POST">
              @csrf
              <input type="hidden" name="id_kegiatan_lab" value="{{$kegiatan->id}}">
              <button class="px-3 py-1 text-xs font-semibold text-white bg-blue-500 rounded hover:bg-blue-600">
                Detail
              </button>
            </form>
          </td> 
        </tr>
      @endforeach
    </x-slot>
  </x-table-wraper>

    <footer class="pt-4">
      <div class="w-full px-6 mx-auto">
        <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
          <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
            <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
              Copyright © {{ $lab->id_lab }}
              <script>
                document.write(new Date().getFullYear());
              </script>
              <a class="font-semibold text-slate-700 dark:text-white" target="_blank">‧ LAB Teknik Informatika ‧</a>
              All rights reserved. 
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!-- end cards -->
@endsection