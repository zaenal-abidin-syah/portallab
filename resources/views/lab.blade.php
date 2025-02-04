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
    <div class="flex flex-wrap mt-6 -mx-3">
      {{-- column 1 --}}
      <div class="w-full max-w-full px-3 mt-0 lg:w-5/12 lg:flex-none">
        <div class="border-black/12.5 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border"> 
          <div class="flex-auto p-4">

            <div class="flex flex-wrap">
              <div class="flex-none w-auto max-w-full">
                <div class="relative inline-flex items-center justify-center text-white transition-all duration-200 ease-in-out text-base h-19 w-19 rounded-xl">
                  @if($kepalaLaboratorium)
                  <img src={{ URL::asset("storage/$kepalaLaboratorium->foto") }} alt="profile_image" class="w-full shadow-2xl rounded-xl" />
                  @else
                  <img alt="Kepala Laboratorium : Belum Ditemukan" class="w-full shadow-2xl rounded-xl" />
                  @endif
                </div>
              </div>

              <div class="flex-none w-auto max-w-full px-3 my-auto">
              @if($kepalaLaboratorium)
                  <h5 class="mb-1 dark:text-white">{{ $kepalaLaboratorium->nama }}</h5>
                  <p class="mb-0 font-semibold leading-normal dark:text-white dark:opacity-60 text-sm"> {{ $kepalaLaboratorium->jabatanSaatIni->first()->jabatan->jabatan }}</p>
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
      <div class="w-full max-w-full px-3 lg:mt-6 lg:w-7/12 lg:flex-none">
        <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
          <div class="flex-auto p-4">
            <p>{!! strip_tags($lab->deskripsi) !!}</p>
          </div>
        </div>
      </div>
      {{-- end column 2 --}}
    </div>
  {{-- end cards row 2 --}}

  <!-- cards row 3 -->
    <div class="flex flex-wrap justify-end mt-6 -mx-3">
      {{-- column 1 --}}
      <div class="w-full max-w-full px-3 mt-0 mb-6 lg:w-7/12 lg:flex-none">
        <div class="border-black/12.5 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border"> 
          <div class="flex-auto p-4">
            <p>Daftar mata kuliah peminatan pada laboratorium {{ $lab->nama_lab }}:</p>
            @foreach($lab->mata_kuliah as $matkul)
            <ul>
              <li>{{$matkul->nama_matKul}}</li>
            </ul>
            @endforeach
          </div>
        </div>
      </div>
      {{-- end column 1 --}}
      {{-- column 2 --}}
      {{-- <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
        <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
          <div class="flex-auto p-4">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error dolorum, dolorem eos cumque magni perspiciatis, atque praesentium vero mollitia veniam laboriosam omnis consequuntur rem. Hic alias molestias numquam assumenda dolore?</p>
          </div>
        </div>
      </div> --}}
      {{-- end column 2 --}}
    </div>
  {{-- end cards row 3 --}}

  {{-- row 4 --}}
  <div class="relative w-full mb-6 mx-auto">

    <div class="relative flex flex-col flex-auto min-w-0 p-4 overflow-hidden break-words bg-white border-0 dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl rounded-2xl bg-clip-border">
      <div class="flex flex-wrap -mx-3">

        <div class="flex-none w-auto max-w-full px-3 my-auto">
          <div class="h-full">
            <h4 id="Fasilitas" class="mb-1 dark:text-white">Fasilitas</h4>
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
          <h6 class="dark:text-white">Tabel Fasilitas</h6>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
          <div class="p-0 overflow-x-auto">
            <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
              <thead class="align-bottom">
                <tr>
                  <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Fasilitas</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Jumlah</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($lab->fasilitas_lab as $fasilitas)
                <tr>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <div class="flex px-2 py-1">
                      <div class="flex flex-col justify-center">
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">{{$fasilitas->fasilitas->nama_fasilitas}}</h6>
                      </div>
                    </div>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{$fasilitas->jumlah}}</span>
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
        <div class="flex-auto px-0 pt-0 pb-2">
          <div class="p-0 overflow-x-auto">
            <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
              <thead class="align-bottom">
                <tr>
                  <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Judul Publikasi</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Terbit</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Link Scopus</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Link Google Scholar</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Link Sinta</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($lab->publikasi_lab as $publikasi)
                <tr>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <div class="flex px-2 py-1">
                      <div class="flex flex-col justify-center">
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">{{$publikasi->publikasi->judul_publikasi}}</h6>
                      </div>
                    </div>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{$publikasi->publikasi->tanggal}}</span>
                  </td>
                  <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">{{$publikasi->publikasi->link_scopus}}</p>
                  </td>
                  <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">{{$publikasi->publikasi->link_googleScholar}}</p>
                  </td>
                  <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">{{$publikasi->publikasi->link_sinta}}</p>
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
        <div class="flex-auto px-0 pt-0 pb-2">
          <div class="p-0 overflow-x-auto">
            <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
              <thead class="align-bottom">
                <tr>
                  <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Judul Buku</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Laboratorium</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Penulis</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Terbit</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($lab->buku_lab as $buku)
                <tr>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <div class="flex px-2 py-1">
                      <div class="flex flex-col justify-center">
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">{{$buku->buku->judul_buku}}</h6>
                      </div>
                    </div>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">{{$buku->laboratorium->nama_lab}}</p>
                  </td>
                  <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    {{-- $buku_penulis = buku_penulis::whereIn('id_buku', $buku->id_buku)->get(['id_dosen']); --}}
                    @foreach ($buku->buku->buku_penulis as $penulis)
                    <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{$penulis->dosen->nama}}</span>
                    @endforeach
                    {{-- @foreach ($buku_penulis as $penulis)
                    <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{$penulis->dosen->nama}}</span>
                    @endforeach --}}
                    
                    {{-- <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{$buku_penulis}}</span> --}}
                    {{-- <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{$buku->id_buku}}</span> --}}
                    
                  </td>
                  <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{$buku->buku->tanggal}}</span>
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
          <h6 class="dark:text-white">Tabel Riset</h6>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
          <div class="p-0 overflow-x-auto">
            <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
              <thead class="align-bottom">
                <tr>
                  <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Judul Riset</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Laboratorium</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($lab->riset as $riset)
                <tr>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <div class="flex px-2 py-1">
                      <div class="flex flex-col justify-center">
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">{{$riset->judul_riset}}</h6>
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
        <div class="flex-auto px-0 pt-0 pb-2">
          <div class="p-0 overflow-x-auto">
            <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
              <thead class="align-bottom">
                <tr>
                  <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Judul Pengabdian</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($lab->pengabdian as $pengabdian)
                <tr>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <div class="flex px-2 py-1">
                      <div class="flex flex-col justify-center">
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">{{$pengabdian->judul_pengabdian}}</h6>
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
        <div class="flex-auto px-0 pt-0 pb-2">
          <div class="p-0 overflow-x-auto">
            <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
              <thead class="align-bottom">
                <tr>
                  <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Kategori Kegiatan</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Judul Kegiatan</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Pelaksanaan</th>
                  <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-solid shadow-none dark:border-white/40 dark:text-white tracking-none whitespace-nowrap"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($lab->kegiatan_lab as $kegiatan)
                <tr>
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
                    <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">{{$kegiatan->nama_kegiatan}}</p>
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
              Copyright ©
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