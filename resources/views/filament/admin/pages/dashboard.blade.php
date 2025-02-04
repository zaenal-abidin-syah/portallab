<x-filament::page>
    <div>
        <hr style="height: 3px;">
        <br>
        <p style="font-weight: bold;">{{ auth()->user()->name }}</p>
        <br>
        @if(auth()->user()->id == 1)
            <p>Super Admin merupakan admin yang mengatur segala aktivitas tanpa terhalang oleh sesuatu. Pada portal ini Super Admin dapat melakukan semua yang dilakukan oleh Admin Laboratorium, dengan tambahan:</p>         
            <ul class="list-disc" style="margin-left: 15px;">
                <li>Membuat User/Admin baru untuk lab tertentu</li>
                <li>Memberikan tugas untuk semua admin (termasuk super admin sendiri), yaitu membagi Role</li>
                <li>Menambahkan Laboratorium baru</li>
            </ul>
        @else
            <p>Sebagai Admin suatu laboratorium tentu memiliki batasan, yaitu hanya dapat berinteraksi dengan konten sesuai dengan laboratorium nya, seperti menampilkan, tambah, edit, hapus sesuai laboratorium nya masing-masing.</p>
        @endif

        <br>
        <p style="font-weight: bold;">DESKRIPSI</p>
        <br>
        <table class="table-auto w-full border-collapse border border-gray-200">
        @if(auth()->user()->id == 1)
            <tr>
                <td class="border px-4 py-2">Admin</td>
                <td class="border px-4 py-2">Bagian pembuatan akun untuk admin, berisi nama, email, password, role, dan lab</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Role</td>
                <td class="border px-4 py-2">Penugasan atau mengatur akses untuk tiap role</td>
            </tr>
        @endif
        <tr>
            <td class="border px-4 py-2">Dosen</td>
            <td class="border px-4 py-2">Berisi dosen pada laboratorium tertentu</td>
        </tr>
        <tr>
            <td class="border px-4 py-2">Buku</td>
            <td class="border px-4 py-2">Buku yang ditulis oleh dosen</td>
        </tr>
        <tr>
            <td class="border px-4 py-2">Jurnal</td>
            <td class="border px-4 py-2">Jurnal atau publikasi yang dikerjakan oleh dosen</td>
        </tr>
        <tr>
            <td class="border px-4 py-2">Riset</td>
            <td class="border px-4 py-2">Riset yang dilakukan oleh dosen tertentu</td>
        </tr>
        
        <tr>
            <td class="border px-4 py-2">Kategori Kegiatan</td>
            <td class="border px-4 py-2">Berisi tentang kategori kegiatan yang dilaksanakan</td>
        </tr>
        <tr>
            <td class="border px-4 py-2">Kegiatan Laboratorium</td>
            <td class="border px-4 py-2">Berisi tentang kegiatan pada laboratorium tertentu sesuai kategori kegiatan</td>
        </tr>
        <tr>
            <td class="border px-4 py-2">Perkuliahan</td>
            <td class="border px-4 py-2">Berisi tentang kegiatan perkuliahan yang bertempat pada laboratorium tertentu</td>
        </tr>
        <tr>
            <td class="border px-4 py-2">Pengabdian</td>
            <td class="border px-4 py-2">Berisi tentang kegiatan pengabdian yang dilakukan pada laboratorium tertentu</td>
        </tr>
        
        <tr>
            <td class="border px-4 py-2">Laboratorium</td>
            <td class="border px-4 py-2">Menampilkan laboratorium pada program studi Teknik Informatika UTM</td>
        </tr>
        <tr>
            <td class="border px-4 py-2">Fasilitas</td>
            <td class="border px-4 py-2">Fasilitas/barang yang dimiliki oleh laboratorium tertentu</td>
        </tr>
        <tr>
            <td class="border px-4 py-2">Jabatan Laboratorium</td>
            <td class="border px-4 py-2">Jabatan pada laboratorium, terikat pada dosen</td>
        </tr>
        </table>

        <br>

        <p style="font-size:10pt; font-style:italic;">*nb: logout bisa dilakukan setelah menekan tombol profil (foto) pada pojok kanan atas, serta mengubah mode tampilan (gelap - terang).</p>

        <br>

        <footer>
            <p style="font-size: 10pt;">
                Copyright &copy; {{date('Y')}} <a class="font-semibold dark:text-white" target="_blank">‧ LAB Teknik Informatika ‧</a> All rights reserved.
            </p>
        </footer>
      
    </div>
</x-filament::page>
