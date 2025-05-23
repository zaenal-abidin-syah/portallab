<x-filament::page>
    <style>
        .tab-m {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .tab-m-s {
            margin-top: 20px;
        }

        .lab-box {
            font-size: 20px;
            font-weight: bold;
            padding: 20px;
            min-width: 150px;
            text-align: center;
        }
    </style>

    <div>
        <hr class="h-[3px] bg-gray-300 dark:bg-gray-700 border-0">

        @if(auth()->user()->id == 1)
            <div class="tab-m-s">
                <div class="lab-box inline-block border border-gray-200">
                    SUPER ADMIN
                </div>
            </div>
            <br>
            <p class="font-bold">DESKRIPSI FITUR SUPER ADMIN</p>

        @elseif(auth()->user()->laboratorium->jenis_lab == 'praktikum')
            <div class="tab-m flex flex-wrap justify-start gap-4">
                <span class="lab-box border border-gray-200">
                    LAB {{ strtoupper(auth()->user()->laboratorium->jenis_lab) }}
                </span>
                <span class="lab-box border border-gray-200">
                    {{ strtoupper(auth()->user()->laboratorium->nama_lab) }}
                </span>
            </div>
            <br>
            <p class="font-bold">DESKRIPSI FITUR LAB PRAKTIKUM</p>

        @elseif(auth()->user()->laboratorium->jenis_lab == 'bidang minat')
            <div class="tab-m flex flex-wrap justify-start gap-4">
                <span class="lab-box border border-gray-200">
                    LAB {{ strtoupper(auth()->user()->laboratorium->jenis_lab) }}
                </span>
                <span class="lab-box border border-gray-200">
                    {{ strtoupper(auth()->user()->laboratorium->nama_lab) }}
                </span>
            </div>
            <br>
            <p class="font-bold">DESKRIPSI FITUR LAB BIDANG MINAT</p>
        @endif

        <br>

        <table class="table-auto w-full border-collapse border border-gray-200">
        
{{-- SUPER ADMIN --}}

        @if(auth()->user()->id == 1)
            <tr>
                <td class="border px-4 py-2">Admin</td>
                <td class="border px-4 py-2">Akun untuk admin laboratorium</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Dosen</td>
                <td class="border px-4 py-2">Informasi dosen</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Buku</td>
                <td class="border px-4 py-2">Judul buku yang ditulis dosen</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Jurnal</td>
                <td class="border px-4 py-2">Jurnal publikasi yang ditulis dosen</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Riset</td>
                <td class="border px-4 py-2">Riset yang dilakukan dosen</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Kategori Kegiatan</td>
                <td class="border px-4 py-2">Kategori kegiatan yang dilaksanakan di laboratorium</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Kegiatan Laboratorium</td>
                <td class="border px-4 py-2">Kegiatan yang dilaksanakan di laboratorium</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Perkuliahan</td>
                <td class="border px-4 py-2">Mata kuliah yang bertempat pada laboratorium tertentu</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Pengabdian</td>
                <td class="border px-4 py-2">Kegiatan pengabdian yang dilaksanakan di laboratorium</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Laboratorium</td>
                <td class="border px-4 py-2">Informasi laboratorium</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Fasilitas</td>
                <td class="border px-4 py-2">Fasilitas pada laboratorium</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Jabatan Laboratorium</td>
                <td class="border px-4 py-2">Jabatan dosen pada laboratorium</td>
            </tr>

{{-- LAB PRAKTIKUM --}}

        @elseif(auth()->user()->laboratorium->jenis_lab=='praktikum')
            <tr>
                <td class="border px-4 py-2">Kategori Kegiatan</td>
                <td class="border px-4 py-2">Kategori kegiatan yang dilaksanakan di laboratorium ini</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Kegiatan Laboratorium</td>
                <td class="border px-4 py-2">Kegiatan yang dilaksanakan di laboratorium ini</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Perkuliahan</td>
                <td class="border px-4 py-2">Mata kuliah yang bertempat pada laboratorium ini</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Laboratorium</td>
                <td class="border px-4 py-2">Informasi laboratorium ini</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Fasilitas</td>
                <td class="border px-4 py-2">Fasilitas pada laboratorium ini</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Jabatan Laboratorium</td>
                <td class="border px-4 py-2">Jabatan dosen pada laboratorium</td>
            </tr>

{{-- LAB BIDANG MINAT --}}

        @elseif(auth()->user()->laboratorium->jenis_lab=='bidang minat')
            <tr>
                <td class="border px-4 py-2">Dosen</td>
                <td class="border px-4 py-2">Informasi dosen</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Buku</td>
                <td class="border px-4 py-2">Judul buku yang ditulis dosen</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Jurnal</td>
                <td class="border px-4 py-2">Jurnal publikasi yang ditulis dosen</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Riset</td>
                <td class="border px-4 py-2">Riset yang dilakukan dosen</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Kategori Kegiatan</td>
                <td class="border px-4 py-2">Kategori kegiatan yang dilaksanakan di laboratorium ini</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Kegiatan Laboratorium</td>
                <td class="border px-4 py-2">Kegiatan yang dilaksanakan di laboratorium ini</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Pengabdian</td>
                <td class="border px-4 py-2">Kegiatan pengabdian yang dilaksanakan di laboratorium ini</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Laboratorium</td>
                <td class="border px-4 py-2">Informasi laboratorium ini</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Fasilitas</td>
                <td class="border px-4 py-2">Fasilitas pada laboratorium ini</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Jabatan Laboratorium</td>
                <td class="border px-4 py-2">Jabatan dosen pada laboratorium</td>
            </tr>
        @endif
        </table>

        <br>
        <footer>
            <p style="font-size: 10pt;">
                Copyright &copy; {{date('Y')}} <a class="font-semibold dark:text-white" target="_blank">‧ LAB Teknik Informatika ‧</a> All rights reserved.
            </p>
        </footer>
      
    </div>
</x-filament::page>