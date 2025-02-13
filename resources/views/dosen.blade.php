@extends('layout.dosen')
@section('content')
<!-- Container -->
<div class="w-full px-6 py-6 mx-auto">
  @if($laboratorium->isEmpty())
    <div class="text-center text-slate-500 dark:text-white">
      <h4 class="text-lg font-semibold">Belum ada data laboratorium tersedia.</h4>
    </div>
  @else
    @foreach($laboratorium as $lab)
    {{-- Card for Laboratory --}}
    <div class="relative w-full mb-6 mx-auto">
      <div class="relative flex flex-col min-w-0 p-4 overflow-hidden break-words bg-white shadow-lg rounded-2xl dark:bg-slate-850 dark:shadow-dark-xl">
        <div class="flex justify-between items-center px-3 py-2">
          <h4 id="dosen-{{$lab->nama_lab}}" class="text-xl font-semibold text-slate-700 dark:text-white">
            Dosen Laboratorium {{$lab->nama_lab}}
          </h4>
        </div>
      </div>
    </div>
    {{-- Table for Lecturers --}}
    <div class="flex flex-wrap -mx-3">
      <div class="flex-none w-full px-3">
        <div class="relative flex flex-col mb-6 shadow-xl bg-white dark:bg-slate-850 rounded-2xl">
          <div class="p-4 border-b border-gray-200 dark:border-slate-700">
            <h6 class="font-bold text-slate-700 dark:text-white">Daftar Dosen</h6>
          </div>
          <div class="p-4 overflow-x-auto">
            <table class="table-auto w-full text-left text-slate-500 dark:text-white">
              <thead class="bg-gray-100 dark:bg-slate-700">
                <tr>
                  <th class="px-4 py-2">Nama Dosen</th>
                  <th class="px-4 py-2">NIP</th>
                  <th class="px-4 py-2">Email</th>
                  <th class="px-4 py-2">Pendidikan Terakhir</th>
                  <th class="px-4 py-2">Jabatan Terakhir</th>
                  <th class="px-4 py-2 text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($lab->dosen as $dosen)
                <tr class="border-t border-gray-200 dark:border-slate-700">
                  <td class="px-4 py-3">
                    <div class="flex items-center">
                      <img src="{{ URL::asset("storage/$dosen->foto") }}" alt="Foto {{$dosen->nama}}" class="w-10 h-10 rounded-full mr-3">
                      <span>{{$dosen->nama}}</span>
                    </div>
                  </td>
                  <td class="px-4 py-3">{{$dosen->nip}}</td>
                  <td class="px-4 py-3">{{$dosen->email}}</td>
                  <td class="px-4 py-3">{{$dosen->jenjang}}, {{$dosen->universitas}}</td>
                  <td class="px-4 py-3">
                    @if($dosen->jabatanTerakhir)
                      {{ $dosen->jabatanTerakhir->jabatan->jabatan }}
                    @else
                      <span class="text-gray-400">Tidak ada jabatan</span>
                    @endif
                  </td>
                  <td class="px-4 py-3 text-center">
                    <form action="{{ route('dosendetail') }}" method="POST">
                      @csrf
                      <input type="hidden" name="id_dosen" value="{{$dosen->id}}">
                      <button class="px-3 py-1 text-xs font-semibold text-white bg-blue-500 rounded hover:bg-blue-600">
                        Detail
                      </button>
                    </form>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="6" class="px-4 py-3 text-center text-gray-500 dark:text-white">Belum ada dosen di laboratorium ini.</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  @endif
  {{-- Footer --}}
  <footer class="pt-4">
    <div class="text-center text-sm text-slate-500 dark:text-white">
      <p>Copyright © <script>document.write(new Date().getFullYear());</script> ‧ LAB Teknik Informatika ‧ All rights reserved.</p>
    </div>
  </footer>
</div>
@endsection
