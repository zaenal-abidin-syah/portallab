@extends('layout.dosen')
@section('content')
<!-- Container -->
{{-- <div class="flex mb-3 mt-2 justify-start flex-col"> --}}
  @if($laboratorium->isEmpty())
    <div class="text-center text-slate-500 dark:text-white">
      <h4 class="text-lg font-semibold">Belum ada data laboratorium tersedia.</h4>
    </div>
  @else
    @foreach($laboratorium as $lab)
    {{-- Card for Laboratory --}}
    <div class="relative w-full mx-auto">
      <div class="mx-5 mb-5 py-1 px-5 relative flex flex-col min-w-0 overflow-hidden break-words bg-white shadow-md rounded-md dark:bg-slate-850 dark:shadow-dark-xl">
        <div class="flex">
          <span id="{{$lab->slug}}" class="text-xxs sm:text-xs md:text-sm font-semibold text-slate-700 dark:text-white">
            Dosen Laboratorium {{$lab->nama_lab}}
          </span>
        </div>
      </div>
    </div>
    {{-- Table for Lecturers --}}
    <div class="flex flex-wrap">
      <div class="flex-none w-full">
        <div class="mx-5 mb-5 p-2 relative flex flex-col shadow-xl bg-white dark:bg-slate-850 rounded-md">
          <div class="overflow-hidden">
              <div class="w-full overflow-x-auto">
                <table class="table-auto w-full text-left text-slate-500 dark:text-white table table-striped table-responsive">
                  <thead class="bg-slate-100 dark:bg-slate-700 text-xxs sm:text-xs md:text-sm">
                    <tr>
                      <th class="py-0 sm:px-2 w-1/12 text-center text-xxs sm:text-xs md:text-sm">No</th>
                      <th class="py-0 sm:px-2 md-max:hidden text-center text-xxs sm:text-xs md:text-sm">NIP</th>
                      <th class="py-0 sm:px-2 w-6/12 lg:w-4/12 text-center text-xxs sm:text-xs md:text-sm">Nama</th>
                      {{-- <th class="py-0 sm:px-2 md-max:hidden text-center text-xxs sm:text-xs md:text-sm">Email</th>  
                      <th class="py-0 sm:px-2 lg:whitespace-nowrap text-center text-xxs sm:text-xs md:text-sm">jenjang</th>
                      <th class="py-0 sm:px-2 text-center text-xxs sm:text-xs md:text-sm">Jabatan</th> --}}
                      <th class="py-0 w-1/12 sm:px-2 text-center text-xxs sm:text-xs md:text-sm">Aksi</th>
                    </tr>
                  </thead>
                    <tbody class="text-xs md:text-sm">
                      @foreach($lab->dosen as $index => $dosen)
                      <tr class="border-t border-slate-200 dark:border-slate-700">
                        <td class="py-0 md:px-3 text-xs md:text-sm text-center">{{ $loop->iteration }}</td>
                        <td class="py-0 md:px-3 text-xs md:text-sm whitespace-nowrap md-max:hidden">{{$dosen->nip}}</td> 
                        <td class="py-0 md:px-3 text-xs md:text-sm">
                          {{-- <div class="flex items-center flex-nowrap">
                            <img src="{{ URL::asset("storage/$dosen->foto") }}" 
                                alt="Foto {{$dosen->nama}}" 
                                class="w-8 h-8 md:w-10 md:h-10 rounded-full mr-2 md:mr-3">
                            <span>{{ $dosen->nama }}</span> <!-- Wrap text -->
                          </div> --}}
                          <span>{{ $dosen->nama }}</span> <!-- Wrap text -->
                        </td>
                        {{-- <td class="py-0 md:px-3 text-xs md:text-sm whitespace-nowrap md-max:hidden">{{$dosen->email}}</td>  --}}
                        {{-- <td class="py-0 md:px-3 text-xs md:text-sm whitespace-nowrap">{{$dosen->jenjang}} <span class="md-max:hidden">{{ $dosen->universitas }}</span></td> --}}
                        {{-- <td class="py-0 md:px-3 text-xs md:text-sm">
                          @if($dosen->jabatanTerakhir)
                            {{ $dosen->jabatanTerakhir->jabatan->jabatan }}
                          @else
                            <span class="text-slate-400">Tidak ada jabatan</span>
                          @endif
                        </td> --}}
                        <td class="py-0 md:px-3 text-xs md:text-sm whitespace-nowrap">
                            <form action="{{ route('dosendetail') }}" method="POST">
                              @csrf
                              <input type="hidden" name="id_dosen" value="{{$dosen->id}}">
                              <button class="px-2 py-0 text-xs md:text-sm text-white bg-blue-500 rounded-full hover:bg-blue-600">
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
{{-- </div> --}}
@endsection
