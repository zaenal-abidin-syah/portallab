@extends('layout.main')
@section('content')

<!-- Main Container -->
<div class="h-full w-full px-4 py-4 mx-auto bg-gray-100 dark:bg-slate-900">
    <div class="flex justify-center items-center">
        <!-- Main Content Section -->
        <div class="w-full px-2">
            <!-- Title Section -->
            <div class="text-center mb-4">
                <h1 class="text-2xl font-bold text-blue-600 dark:text-blue-700">Laboratorium Teknik Informatika UTM</h1>
                <p class="text-slate-600 dark:text-slate-50 text-sm">Pilih laboratorium yang ingin Anda akses</p>
            </div>

            <!-- Cards Section -->
            <div class="grid grid-cols-1 md:grid-cols-6 gap-3">
                <!-- Card 1 -->
                <div class="bg-white dark:bg-slate-800 md:col-span-2 shadow-lg rounded-xl px-2 pt-2 pb0 hover:shadow-xl transition flex justify-center items-center">
                    <form action="{{ route('lab') }}" method="GET" class="text-center m-0">
                        <input type="hidden" name="slug" value="teknologi-informasi-dan-aplikasi">
                        <button type="submit" class="w-full">
                            <img src="{{ asset('assets/img/TIA.png') }}" alt="Lab. Teknologi Informasi dan Aplikasi" class="w-full rounded-xl">
                        </button>
                    </form>
                </div>

                <!-- Card 2 -->
                <div class="bg-white dark:bg-slate-800 md:col-span-2 shadow-lg rounded-xl p-2 hover:shadow-xl transition flex justify-center items-center">
                    <form action="{{ route('lab') }}" method="GET" class="text-center m-0">
                        <input type="hidden" name="slug" value="common-computing">
                        <button type="submit" class="w-full">
                            <img src="{{ asset('assets/img/CC.jpeg') }}" alt="Lab. Common Computing" class="w-full rounded-xl object-contain">
                        </button>
                    </form>
                </div>

                <!-- Card 3 -->
                <div class="bg-white dark:bg-slate-800 md:col-span-2 shadow-lg rounded-xl p-2 hover:shadow-xl transition flex justify-center items-center">
                    <form action="{{ route('lab') }}" method="GET" class="text-center m-0">
                        <input type="hidden" name="slug" value="multimedia">
                        <button type="submit" class="w-full">
                            <img src="{{ asset('assets/img/MM.png') }}" alt="Lab. Multimedia Computing" class="w-full rounded-xl object-contain">
                        </button>
                    </form>
                </div>

                <!-- Card 4 -->
                <div class="bg-white dark:bg-slate-800 md:col-span-3 shadow-lg rounded-xl p-2 hover:shadow-xl transition flex justify-center items-center">
                    <form action="{{ route('lab') }}" method="GET" class="text-center m-0">
                        <input type="hidden" name="slug" value="sistem-terdistribusi">
                        <button type="submit" class="w-full">
                            <img src="{{ asset('assets/img/SISTER.png') }}" alt="Lab. Sistem Terdistribusi" class="w-full rounded-xl object-contain">
                        </button>
                    </form>
                </div>
                <div class="bg-white dark:bg-slate-800 md:col-span-3 shadow-lg rounded-xl p-2 hover:shadow-xl transition flex justify-center items-center">
                    <form action="{{ route('lab') }}" method="GET" class="text-center m-0">
                        <input type="hidden" name="slug" value="riset">
                        <button type="submit" class="w-full">
                            <img src="{{ asset('assets/img/RISET.jpeg') }}" alt="Lab. Riset" class="w-full rounded-xl object-contain">
                        </button>
                    </form>
                </div>
            </div>
            <!-- End Cards Section -->
        </div>
        <!-- End Main Content Section -->
    </div>

    <!-- Footer -->
    <footer class="pt-4">
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

<!-- Add this to your CSS or in a <style> tag in the header -->
<style>
    button:hover {
        transform: scale(1.05); /* Slightly increase button size */
        transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transition */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Add shadow on hover */
    }

    .grid {
        grid-template-columns: repeat(2, 1fr); /* 2 columns layout */
    }

    .bg-white {
        padding: 0.5rem; /* Reduced padding for cards */
    }

    .h-full {
        height: auto; /* Allow container to grow with content */
        min-height: 100vh; /* Ensure content covers full screen */
    }

    /* Larger screen adjustments */
    @media (min-width: 1024px) {
        .grid {
            grid-template-columns: repeat(2, 1fr); /* Keep 2 columns for larger screens */
            max-width: 69%;
            margin: 0 auto;
            {--gap: 1rem;--}/* Aktifkan jika butuh space antar kartu */
        }

        .bg-white {
            padding: 0.75rem; /* Slightly more padding for large screens */
        }
    }
</style>