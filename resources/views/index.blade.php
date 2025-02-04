@extends('layout.main')
@section('content')

<!-- Main Container -->
<div class="h-full w-full px-6 py-6 mx-auto bg-gray-100">
    <div class="flex">
        <!-- Main Content Section -->
        <div class="w-full md:w-3/4 px-4">
            <!-- Title Section -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-blue-600">Laboratorium Teknik Informatika UTM</h1>
                <p class="text-gray-600">Pilih laboratorium yang ingin Anda akses</p>
            </div>

            <!-- Cards Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                <!-- Card 1 -->
                <div class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition">
                    <form action="{{ route('lab') }}" method="POST" class="text-center">
                        @csrf
                        <input type="hidden" name="id_lab" value="3">
                        <button type="submit" class="w-full">
                            <img src="{{ asset('assets/img/TIA.png') }}" alt="Lab. Teknologi Informasi dan Aplikasi" class="w-full h-auto rounded-xl">
                        </button>
                    </form>
                </div>

                <!-- Card 2 -->
                <div class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition">
                    <form action="{{ route('lab') }}" method="POST" class="text-center">
                        @csrf
                        <input type="hidden" name="id_lab" value="4">
                        <button type="submit" class="w-full">
                            <img src="{{ asset('assets/img/CC.png') }}" alt="Lab. Common Computing" class="w-full h-auto rounded-xl">
                        </button>
                    </form>
                </div>

                <!-- Card 3 -->
                <div class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition">
                    <form action="{{ route('lab') }}" method="POST" class="text-center">
                        @csrf
                        <input type="hidden" name="id_lab" value="5">
                        <button type="submit" class="w-full">
                            <img src="{{ asset('assets/img/MM.png') }}" alt="Lab. Multimedia Computing" class="w-full h-auto rounded-xl">
                        </button>
                    </form>
                </div>

                <!-- Card 4 -->
                <div class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition">
                    <form action="{{ route('lab') }}" method="POST" class="text-center">
                        @csrf
                        <input type="hidden" name="id_lab" value="6">
                        <button type="submit" class="w-full">
                            <img src="{{ asset('assets/img/SISTER.png') }}" alt="Lab. Sistem Terdistribusi" class="w-full h-auto rounded-xl">
                        </button>
                    </form>
                </div>
            </div>
            <!-- End Cards Section -->
        </div>
        <!-- End Main Content Section -->
    </div>

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
<!-- End Main Container -->

@endsection

<!-- Add this to your CSS or in a <style> tag in the header -->
<style>
    button:hover {
        transform: scale(1.05); /* Memperbesar tombol sedikit */
        transition: transform 0.3s ease, box-shadow 0.3s ease; /* Transisi untuk smooth */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Menambahkan shadow saat hover */
    }
</style>
