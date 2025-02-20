@extends('layout.menu')
@section('content')

<!-- cards -->
<div class="w-full px-6 py-6 mx-auto">

  {{-- row 1 --}}
  <div class="relative w-full mx-auto">

    <div class="relative flex flex-col flex-auto min-w-0 p-4 overflow-hidden break-words bg-white border-0 dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl rounded-2xl bg-clip-border">
      <div class="flex flex-wrap -mx-3">

        <div class="flex-none w-auto max-w-full px-3 my-auto">
          <div class="h-full">
            <h4 id="lab" class="mb-1 dark:text-white">{{ $lab->nama_lab }}</h4>
            {{-- <p class="mb-0 font-semibold leading-normal dark:text-white dark:opacity-60 text-sm">Public Relations</p> --}}
          </div>
        </div>
    
      </div>
    </div>
  </div>
  {{-- end row 1 --}}

  <!-- cards row 2 -->
    <div class="grid grid-cols-1 gap-3 md:grid-cols-5 mt-6 -mx-3 mb-6">
      {{-- column 1 --}}
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
                {{-- <a href="{{ url('/dosen#dosen-$lab->nama_lab') }}"> --}}

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
      {{-- end column 1 --}}
      {{-- column 2 --}}
      <div class="w-full md:col-span-3 max-w-full px-3">
        <div class="border-black/12.5 dark:text-slate-100 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
          <div class="flex-auto p-4">
            <p>{!! strip_tags($lab->deskripsi) !!}</p>
          </div>
        </div>
      </div>
      {{-- end column 2 --}}
    </div>
  {{-- end cards row 2 --}}
  <div class="relative w-full mb-6 mx-auto">

    <div class="relative flex flex-col flex-auto min-w-0 p-4 overflow-hidden break-words bg-white border-0 dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl rounded-2xl bg-clip-border">
      <div class="flex flex-wrap -mx-3">

        <div class="flex-none w-auto max-w-full px-3 my-auto">
          <div class="h-full">
            <h4 id="Matakuliah" class="mb-1 dark:text-white">Mata Kuliah</h4>
          </div>
        </div>
    
      </div>
    </div>
  </div>
  <div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <h6 class="dark:text-white">Daftar Mata Kuliah pada Laboratorium {{ $lab->nama_lab }} untuk Semester {{ $semester }} Tahun Ajaran {{ $tahunAjaran }}</h6>
        </div>
        <div class="flex-auto px-5 pb-5 pt-0">
          <div class="p-0 overflow-x-auto">
            <table id="matakuliah-table" class="items-center w-full mb-3 align-top border-collapse dark:border-white/40 text-slate-500">
              <thead class="align-bottom">
                <tr>
                  <th class="py-3 w-2 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                  <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Mata Kuliah</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tahun Ajaran</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Semester</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($matakuliah_lab as $matkul)
                <tr>
                  <td class="px-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparen">{{ $loop->iteration }}</td>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <div class="flex px-2 py-1">
                      <div class="flex flex-col justify-center">
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ucwords($matkul->nama_matKul)}}</h6>
                      </div>
                    </div>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{$matkul->tahun_ajaran_1 . "/" . $matkul->tahun_ajaran_2}}</span>
                  </td>
                  <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">{{$matkul->semester}}</p>
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



  <div class="flex flex-wrap w-full mt-6 -mx-3">
    <div class="w-full max-w-full px-3 mt-0 mb-6 lg:w-7/12 lg:flex-none">
      <div class="border-black/12.5 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border"> 
      </div>
    </div>
  </div>
  <div class="relative w-full mb-6 mx-auto">
    <div class="relative flex flex-col flex-auto min-w-0 p-4 overflow-hidden break-words bg-white border-0 dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl rounded-2xl bg-clip-border">
      <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-auto max-w-full px-3 my-auto">
          <div class="h-full">
            <h4 id="Fasilitas" class="mb-1 dark:text-white">Fasilitas</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- end row 4 --}}

  {{-- row 5 table --}}
  <div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <h6 class="dark:text-white">Tabel Fasilitas</h6>
        </div>
        <div class="flex-auto px-5 pb-5 pt-0">
          <div class="py-0 px-5 overflow-x-auto">
            <table id="fasilitas-table" class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
              <thead class="align-bottom">
                <tr>
                  <th class="w-2 py-3 font-bold uppercase text-center align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                  <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Fasilitas</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Jumlah</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($fasilitas_lab as $fasilitas)
                <tr>
                  <td class="px-2 py-3 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">{{ $loop->iteration }}</td>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <div class="flex px-2 py-1">
                      <div class="flex flex-col justify-center">
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">{{$fasilitas->nama_fasilitas}}</h6>
                      </div>
                    </div>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{$fasilitas->fasilitas_lab[0]->jumlah}}</span>
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
  {{-- end row 5 table --}}

  {{-- row 4 --}}
  <div class="relative w-full mb-6 mx-auto">

    <div class="relative flex flex-col flex-auto min-w-0 p-4 overflow-hidden break-words bg-white border-0 dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl rounded-2xl bg-clip-border">
      <div class="flex flex-wrap -mx-3">

        <div class="flex-none w-auto max-w-full px-3 my-auto">
          <div class="h-full">
            <h4 id="Publikasi" class="mb-1 dark:text-white">Publikasi</h4>
            {{-- <p class="mb-0 font-semibold leading-normal dark:text-white dark:opacity-60 text-sm">Public Relations</p> --}}
          </div>
        </div>
    
      </div>
    </div>
  </div>
  {{-- end row 4 --}}

  {{-- row 5 table --}}
  <div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <h6 class="dark:text-white">Tabel Publikasi</h6>
        </div>
        <div class="flex-auto px-5 pb-5 pt-0">
          <div class="py-0 px-5 overflow-x-auto">
            <table id="publikasi-table" class="items-center w-full mb-4 align-top border-collapse dark:border-white/40 text-slate-500">
              <thead class="align-bottom">
                <tr>
                  <th class="py-3 w-2 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                  <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Judul Publikasi</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Author</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tahun Terbit</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Link Publikasi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($publikasi_lab as $publikasi)
                <tr>
                  <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">{{ $loop->iteration }}</td>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <div class="flex px-2 py-1">
                      <div class="flex flex-col justify-center">
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ucwords($publikasi->judul_publikasi)}}</h6>
                      </div>
                    </div>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{$publikasi->publikasi_penulis[0]->dosen->nama}}</span>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{$publikasi->tanggal}}</span>
                  </td>
                  <td class="p-2 text-sm leading-normal align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
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
                    </p>
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
  {{-- end row 5 table --}}

   {{-- row 6 --}}
   <div class="relative w-full mb-6 mx-auto">

    <div class="relative flex flex-col flex-auto min-w-0 p-4 overflow-hidden break-words bg-white border-0 dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl rounded-2xl bg-clip-border">
      <div class="flex flex-wrap -mx-3">

        <div class="flex-none w-auto max-w-full px-3 my-auto">
          <div class="h-full">
            <h4 id="buku" class="mb-1 dark:text-white">Buku</h4>
            {{-- <p class="mb-0 font-semibold leading-normal dark:text-white dark:opacity-60 text-sm">Public Relations</p> --}}
          </div>
        </div>
    
      </div>
    </div>
  </div>
  {{-- end row 6 --}}

  {{-- row 6 table --}}
  <div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <h6 class="dark:text-white">Buku lab</h6>
        </div>
        <div class="flex-auto px-5 pb-5 pt-0">
          <div class="p-0 overflow-x-auto">
            <table id="buku-table" class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
              <thead class="align-bottom">
                <tr>
                  <th class="py-3 w-2 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                  <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Judul Buku</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Laboratorium</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Penulis</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tahun Terbit</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($buku_lab as $buku)
                {{-- @dd() --}}
                <tr>
                  <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">{{ $loop->iteration }}</td>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <div class="flex px-2 py-1">
                      <div class="flex flex-col justify-center">
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ucwords($buku->judul_buku)}}</h6>
                      </div>
                    </div>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">{{$buku->buku_lab[0]->laboratorium->nama_lab}}</p>
                  </td>
                  <td class="p-2 text-sm leading-normal align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    @foreach ($buku->buku_penulis as $penulis)
                    <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{$penulis->dosen->nama}}</span>
                    @endforeach
                  </td>
                  <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{$buku->tanggal}}</span>
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
  {{-- end row 6 table --}}

  {{-- row 7 --}}
  <div class="relative w-full mb-6 mx-auto">
    <div class="relative flex flex-col flex-auto min-w-0 p-4 overflow-hidden break-words bg-white border-0 dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl rounded-2xl bg-clip-border">
      <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-auto max-w-full px-3 my-auto">
          <div class="h-full">
            <h4 id="riset" class="mb-1 dark:text-white">Riset</h4>
          </div>
        </div>    
      </div>
    </div>
  </div>
  {{-- end row 7 --}}

  {{-- row 7 table --}}
  <div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <h6 class="dark:text-white">Tabel Riset</h6>
        </div>
        <div class="flex-auto px-5 pb-5 pt-0">
          <div class="p-0 overflow-x-auto">
            <table id="riset-table" class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
              <thead class="align-bottom">
                <tr>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                  <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Judul Riset</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Laboratorium</th>
                </tr>
              </thead>
              <tbody> 
                @foreach ($riset_lab as $riset)
                <tr>
                  <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">{{ $loop->iteration }}</td>
                    <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <div class="flex px-2 py-1">
                      <div class="flex flex-col justify-center">
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ucwords($riset->judul_riset)}}</h6>
                      </div>
                    </div>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{$riset->laboratorium->nama_lab}}</span>
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
  {{-- end row 7 table --}}

   {{-- row 7 --}}
   <div class="relative w-full mb-6 mx-auto">

    <div class="relative flex flex-col flex-auto min-w-0 p-4 overflow-hidden break-words bg-white border-0 dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl rounded-2xl bg-clip-border">
      <div class="flex flex-wrap -mx-3">

        <div class="flex-none w-auto max-w-full px-3 my-auto">
          <div class="h-full">
            <h4 id="pengabdian" class="mb-1 dark:text-white">Pengabdian Masyarakat</h4>
            {{-- <p class="mb-0 font-semibold leading-normal dark:text-white dark:opacity-60 text-sm">Public Relations</p> --}}
          </div>
        </div>
    
      </div>
    </div>
  </div>
  {{-- end row 7 --}}

  {{-- row 7 table --}}
  <div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <h6 class="dark:text-white">Tabel Pengabdian</h6>
        </div>
        <div class="flex-auto px-5 pb-5 pt-0">
          <div class="p-0 overflow-x-auto">
            <table id="pengabdian-table" class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
              <thead class="align-bottom">
                <tr>
                  <th class="py-3 w-2 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                  <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Judul Pengabdian</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pengabdian_lab as $pengabdian)
                <tr>
                  <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">{{ $loop->iteration }}</td>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <div class="flex px-2 py-1">
                      <div class="flex flex-col justify-center">
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ucwords($pengabdian->judul_pengabdian)}}</h6>
                      </div>
                    </div>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{$pengabdian->tanggal}}</span>
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
  {{-- end row 7 table --}}

  {{-- row 9 --}}
  <div class="relative w-full mb-6 mx-auto">

    <div class="relative flex flex-col flex-auto min-w-0 p-4 overflow-hidden break-words bg-white border-0 dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl rounded-2xl bg-clip-border">
      <div class="flex flex-wrap -mx-3">

        <div class="flex-none w-auto max-w-full px-3 my-auto">
          <div class="h-full">
            <h4 id="kegiatan" class="mb-1 dark:text-white">Kegiatan</h4>
            {{-- <p class="mb-0 font-semibold leading-normal dark:text-white dark:opacity-60 text-sm">Public Relations</p> --}}
          </div>
        </div>
    
      </div>
    </div>
  </div>
  {{-- end row 9 --}}

  {{-- row 9 table --}}
  <div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <h6 class="dark:text-white">Tabel Kegiatan</h6>
        </div>
        <div class="flex-auto px-5 pb-5 pt-0">
          <div class="p-0 overflow-x-auto">
            <table id="kegiatan-table" class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
              <thead class="align-bottom">
                <tr>
                  <th class="py-3 w-2 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                  <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Kategori Kegiatan</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Judul Kegiatan</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Pelaksanaan</th>
                  <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-solid shadow-none dark:border-white/40 dark:text-white tracking-none whitespace-nowrap"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($kegiatan_lab as $kegiatan)
                <tr>
                  <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">{{ $loop->iteration }}</td>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <div class="flex px-2 py-1">
                      {{-- <div>
                        <img src="../assets/img/team-2.jpg" class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-9 w-9 rounded-xl" alt="user1" />
                      </div> --}}
                      <div class="flex flex-col justify-center">
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">{{$kegiatan->kegiatan->kategori_kegiatan}}</h6>
                      </div>
                    </div>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">{{ucwords($kegiatan->nama_kegiatan)}}</p>
                  </td>
                  <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{$kegiatan->tanggal}}</span>
                  </td>

                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
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
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- end row 9 table --}}


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
  {{-- <table id="table-coba"></table> --}}

  {{-- <table id="riset2" class="display" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Riset</th>
            <th>Tahun</th>
            <th>Laboratorium</th>
        </tr>
    </thead>
    <tbody>
      <tr>
        <td>halo</td>
        <td>halo</td>
        <td>halo</td>
        <td>halo</td>
      </tr>
    </tbody>
</table> --}}



  <script>
      

    //   $(document).ready(function() {
    //     $('#riset-table').DataTable({
    //         // Menggunakan AJAX untuk mengambil data dari Laravel
    //         ajax: {
    //             url: '{{ route("research") }}', // URL route yang mengembalikan JSON
    //             data : function (d) 
    //             {
    //               d.slug = "{{ $lab->slug }}"
    //             },
    //             dataSrc: 'data', // Jika data JSON yang dikembalikan berupa array
    //             error: function (xhr, error, code) {
    //                 console.error("AJAX error:", error, code);
    //             }
    //         },
    //         columns: [
    //             {
    //                 data: null,
    //                 name: 'No',
    //                 render: function (data, type, row, meta) {
    //                     return meta.row + meta.settings._iDisplayStart + 1;
    //                 }
    //             },
    //             { data: 'judul_riset', name: 'Judul Riset' },
    //             { data: 'tahun', name: 'tahun' },
    //             { data: 'laboratorium.nama_lab', name: 'Laboratorium' },
    //         ],
    //         responsive : true,

    //     }).columns.adjust()
		// 		.responsive.recalc();
    // });


    // const table = new DataTable('#table-coba', {
    //     serverSide: true,
    //     processing : true,
    //     ordering: true,
    //     ajax: {
    //       url : "{ route("getResearch") }}",
    //       data : function (d) 
    //       {
    //         d.slug = "{ $lab->slug }}"
    //       },
    //       dataSrc : 'data',
    //       error: function (xhr, error, code) {
    //         console.error("AJAX error:", error, code);
    //     }
    //     },
    //     columns : [
    //       {data : "judul_riset", title : "Judul Riset", orderable: true},
    //       {data : "tahun", title : "tahun", orderable: true},
    //       {data : "laboratorium.nama_lab", title : "Laboratorium", orderable: false}
    //     ],
    //     order: [[1, 'asc']]
        
    // });
    // $('#table-coba').on('xhr.dt', function (e, settings, json, xhr) {
    //   console.log("Data yang diterima dari server:", json);
    // });

  </script>

@endsection