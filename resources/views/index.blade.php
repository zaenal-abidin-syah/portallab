@extends('layout.main')
@section('content')

<!-- Main Container -->
<div class="w-full h-screen flex flex-col justify-around px-4 py-4 mx-auto bg-slate-100 dark:bg-slate-900">
    <div class="flex justify-center items-center">
        <!-- Main Content Section -->
        <div class="w-full px-2 flex flex-col gap-3 justify-between">
            <!-- Title Section -->
            <div class="text-center mb-4">
                <h1 class="text-2xl font-bold text-blue-600 dark:text-blue-700">Laboratorium Teknik Informatika UTM</h1>
                <p class="text-slate-700 dark:text-slate-50 text-sm">Pilih laboratorium yang ingin Anda akses</p>
            </div>

            <!-- Cards Section -->
            <div class="grid grid-cols-1 md:w-9/12 mx-auto md:grid-cols-6 gap-4">
                <!-- Card 1 -->
                <div class="bg-white dark:bg-slate-850 md:col-span-2 shadow-lg dark:shadow-dark-xl rounded-sm md:rounded-md p-2 hover:shadow-xl transition flex justify-items-center">
                    <form action="{{ route('lab') }}" method="GET" class="text-center m-0 flex justify-items-center">
                        <input type="hidden" class="hidden" name="slug" value="teknologi-informasi-dan-aplikasi">
                        <button type="submit" class="w-full h-full m-auto transition-transform duration-300 ease-in-out hover:scale-y-110 hover:scale-x-105">
                            <img src="{{ asset('assets/img/TIA.png') }}" alt="Lab. Teknologi Informasi dan Aplikasi" class="w-full rounded-sm md:rounded-md">
                        </button>
                    </form>
                </div>

                <!-- Card 2 -->
                <div class="bg-white dark:bg-slate-850 md:col-span-2 shadow-lg  dark:shadow-dark-xl rounded-sm md:rounded-md p-2 hover:shadow-xl transition flex justify-items-center">
                    <form action="{{ route('lab') }}" method="GET" class="text-center m-0 flex justify-items-center">
                        <input type="hidden" class="hidden" name="slug" value="common-computing">
                        <button type="submit" class="w-full h-full transition-transform duration-300 ease-in-out hover:scale-y-110 hover:scale-x-105">
                            <img src="{{ asset('assets/img/CC.jpeg') }}" alt="Lab. Common Computing" class="w-full rounded-sm md:rounded-md object-contain">
                        </button>
                    </form>
                </div>

                <!-- Card 3 -->
                <div class="bg-white dark:bg-slate-850 md:col-span-2 shadow-lg dark:shadow-black rounded-sm md:rounded-md p-2 hover:shadow-xl transition flex justify-center items-center">
                    <form action="{{ route('lab') }}" method="GET" class="text-center m-0 flex justify-items-center">
                        <input type="hidden" class="hidden" name="slug" value="multimedia">
                        <button type="submit" class="w-full h-full m-auto transition-transform duration-300 ease-in-out hover:scale-y-110 hover:scale-x-105">
                            <img src="{{ asset('assets/img/MM.png') }}" alt="Lab. Multimedia Computing" class="w-full rounded-sm md:rounded-md object-contain">
                        </button>
                    </form>
                </div>

                <!-- Card 4 -->
                <div class="bg-white dark:bg-slate-850 md:col-span-3 shadow-lg dark:shadow-black rounded-sm md:rounded-md p-2 hover:shadow-xl transition flex justify-center items-center">
                    <form action="{{ route('lab') }}" method="GET" class="text-center m-0 flex justify-items-center">
                        <input type="hidden" class="hidden" name="slug" value="sistem-terdistribusi">
                        <button type="submit" class="w-full h-full m-auto transition-transform duration-300 ease-in-out hover:scale-y-110 hover:scale-x-105">
                            <img src="{{ asset('assets/img/SISTER.png') }}" alt="Lab. Sistem Terdistribusi" class="w-full rounded-sm md:rounded-md object-contain">
                        </button>
                    </form>
                </div>
                <div class="bg-white dark:bg-slate-850 md:col-span-3 shadow-lg dark:shadow-black rounded-sm md:rounded-md p-2 hover:shadow-xl transition flex justify-center items-center">
                    <form action="{{ route('lab') }}" method="GET" class="text-center m-0 flex justify-items-center">
                        <input type="hidden" class="hidden" name="slug" value="riset">
                        <button type="submit" class="w-full h-full m-auto transition-transform duration-300 ease-in-out hover:scale-y-110 hover:scale-x-105">
                            <img src="{{ asset('assets/img/RISET.jpeg') }}" alt="Lab. Riset" class="w-full rounded-sm md:rounded-md object-contain">
                        </button>
                    </form>
                </div>
            </div>
            <!-- End Cards Section -->
        </div>
        <!-- End Main Content Section -->
    </div>

    <!-- Footer -->
    <footer class="pb-2">
      <div class="w-full px-4 mx-auto">
        <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
          <div class="w-full max-w-full px-3 mt-0 mb-4 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
            <div class="text-xs leading-normal text-center text-slate-500 dark:text-slate-50 lg:text-left">
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
<!-- End Main Container -->

@endsection
