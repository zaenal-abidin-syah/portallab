@extends('layout.dosen')
@section('content')
<!-- Container -->
<div class="px-6 py-6 flex justify-start flex-col">
  @if($laboratorium->isEmpty())
    <div class="text-center text-slate-500 dark:text-white">
      <h4 class="text-lg font-semibold">Belum ada data laboratorium tersedia.</h4>
    </div>
  @else
    @foreach($laboratorium as $lab)
    {{-- Card for Laboratory --}}
    <div class="relative w-full mb-2 p-2 md:mb-6 md:p-6 mx-auto">
      <div class="relative flex flex-col min-w-0 p-4 overflow-hidden break-words bg-white shadow-lg rounded-2xl dark:bg-slate-850 dark:shadow-dark-xl">
        <div class="flex justify-between items-center px-3 py-2">
          <h4 id="{{$lab->slug}}" class="text-xl font-semibold text-slate-700 dark:text-white">
            Dosen Laboratorium {{$lab->nama_lab}}
          </h4>
        </div>
      </div>
    </div>
    {{-- Table for Lecturers --}}
    <div class="flex flex-wrap p-2 md:mb-6 md:p-6 -mx-3">
      <div class="flex-none w-full px-3">
        <div class="relative flex flex-col mb-6 shadow-xl bg-white dark:bg-slate-850 rounded-2xl">
          <div class="p-4 border-b border-gray-200 dark:border-slate-700">
            <h6 class="font-bold md:text-xl text-slate-700 dark:text-white">Daftar Dosen</h6>
          </div>
          <div class="p-4 overflow-hidden">
              <div class="w-full overflow-x-auto">
                <table class="table-auto w-full text-left text-slate-500 dark:text-white table table-striped table-responsive">
                  <thead class="bg-gray-100 dark:bg-slate-700 text-xs md:text-xl">
                    <tr>
                      <th class="p-1 sm:px-2 sm:py-2 text-center">No</th>
                      <th class="p-1 sm:px-2 sm:py-2 w-6/12 lg:w-4/12 text-center">Nama</th>
                      <th class="p-1 sm:px-2 sm:py-2 md-max:hidden text-center">NIP</th>
                      <th class="p-1 sm:px-2 sm:py-2 md-max:hidden text-center">Email</th>  
                      <th class="p-1 sm:px-2 sm:py-2 lg:whitespace-nowrap text-center">jenjang</th>
                      <th class="p-1 sm:px-2 sm:py-2 text-center">Jabatan</th>
                      <th class="p-1 sm:px-2 sm:py-2 text-center">Aksi</th>
                    </tr>
                  </thead>
                    <tbody class="text-xs md:text-sm">
                      @foreach($lab->dosen as $index => $dosen)
                      <tr class="border-t border-gray-200 dark:border-slate-700">
                        <td class="p-1 md:px-3 md:py-3 text-xs md:text-lg text-center">{{ $loop->iteration }}</td>
                        <td class="p-1 md:px-3 md:py-3 text-xs md:text-lg">
                          <div class="flex items-center flex-nowrap">
                            <img src="{{ URL::asset("storage/$dosen->foto") }}" 
                                alt="Foto {{$dosen->nama}}" 
                                class="w-8 h-8 md:w-10 md:h-10 rounded-full mr-2 md:mr-3">
                            <span>{{ $dosen->nama }}</span> <!-- Wrap text -->
                          </div>
                        </td>
                        <td class="p-1 md:px-3 md:py-3 text-xs md:text-lg text-center whitespace-nowrap md-max:hidden">{{$dosen->nip}}</td> 
                        <td class="p-1 md:px-3 md:py-3 text-xs md:text-lg whitespace-nowrap md-max:hidden">{{$dosen->email}}</td> 
                        <td class="p-1 md:px-3 md:py-3 text-xs md:text-lg whitespace-nowrap">{{$dosen->jenjang}} <span class="md-max:hidden">{{ $dosen->universitas }}</span></td>
                        <td class="p-1 md:px-3 md:py-3 text-xs md:text-lg">
                          @if($dosen->jabatanTerakhir)
                            {{ $dosen->jabatanTerakhir->jabatan->jabatan }}
                          @else
                            <span class="text-gray-400">Tidak ada jabatan</span>
                          @endif
                        </td>
                        <td class="p-1 md:px-3 md:py-3 text-xs md:text-lg text-center whitespace-nowrap">
                          <form action="{{ route('dosendetail') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_dosen" value="{{$dosen->id}}">
                            <button class="px-2 py-0.5 text-xs md:text-sm text-white bg-blue-500 rounded-full hover:bg-blue-600">
                              detail
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
<style>
/* @media (max-width: 768px) {
    .nip-column, .email-column {
        display: none;
    }
}
@media (min-width: 1024px) {
    th:nth-child(5), td:nth-child(5) {
      width: 20%; 
      white-space: nowrap; 
    }
} */
</style>