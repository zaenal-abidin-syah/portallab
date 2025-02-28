<!-- sidenav  -->
<aside class="fixed mt-10 inset-y-0 flex-wrap items-center justify-between block w-full p-0 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
    <div class="text-center">
      <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden" sidenav-close></i>
      <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700" target="_blank">
        <img src="./assets/img/logo-ct-dark.png" class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8" alt="main_logo" />
        <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">LAB Teknik Informatika</span>
      </a>
    </div>
    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
    <div class="items-center block w-auto max-h-screen h-sidenav grow basis-full">
      <ul class="flex flex-col pl-0 mb-0">
      <ul class="space-y-0.5"> 
        <li class="w-full">
          <h6 class="ml-2 pl-6 text-xs font-bold leading-none uppercase dark:text-white opacity-60">Menu</h6>
        </li>
        <li class="w-full">
          <a class="active:text-white active:bg-blue-500 hover:shadow-xs hover:-translate-y-px border-b py-0.5 px-4 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap text-slate-700" href="index">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Laboratorium</span>
          </a>
        </li>
        <li class="w-full">
          <a class="active:text-white active:bg-blue-500 hover:shadow-xs hover:-translate-y-px order-b py-1 px-4 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap text-slate-700" href="dosen">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-paper-diploma"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Daftar Dosen</span>
          </a>
        </li>
      </ul>
  
      
      <ul class="space-y-0.5">    
        <li class="w-full mt-4">
          <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">Laboratorium</h6>
        </li>
        {{ $slot }}
        {{-- <li class="w-full">
          <a class="active:text-white active:bg-blue-500 hover:shadow-xs hover:-translate-y-px border-b py-1 text-sm my-0 mx-2 flex items-center whitespace-nowrap px-4" href="#Matakuliah">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
              <i class="relative top-0 text-sm leading-normal text-emerald-500 ni ni-book-bookmark"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 ease">Mata Kuliah</span>
          </a>
        </li>
        <li class="w-full">
          <a class="active:text-white active:bg-blue-500 hover:shadow-xs hover:-translate-y-px border-b py-1 text-sm my-0 mx-2 flex items-center whitespace-nowrap px-4" href="#Fasilitas">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
              <i class="relative top-0 text-sm leading-normal text-emerald-500 ni ni-credit-card"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 ease">Fasilitas</span>
          </a>
        </li>
        <li class="w-full">
          <a class="active:text-white active:bg-blue-500 hover:shadow-xs hover:-translate-y-px border-b py-1 text-sm my-0 mx-2 flex items-center whitespace-nowrap px-4" href="#Publikasi">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-bullet-list-67"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 ease">Publikasi</span>
          </a>
        </li>
        <li class="w-full">
          <a class="active:text-white active:bg-blue-500 hover:shadow-xs hover:-translate-y-px border-b py-1 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4" href="#buku">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-folder-17"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Buku</span>
          </a>
        </li>
        <li class="w-full">
          <a class="active:text-white active:bg-blue-500 hover:shadow-xs hover:-translate-y-px border-b py-1 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4" href="#riset">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-trophy"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Riset</span>
          </a>
        </li>
        <li class="w-full">
          <a class="active:text-white active:bg-blue-500 hover:shadow-xs hover:-translate-y-px border-b py-1 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4" href="#pengabdian">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <i class="relative top-0 text-sm leading-normal text-red-600 ni ni-pin-3"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Pengabdian Masyarakat</span>
          </a>
        </li>
        <li class="w-full">
          <a class="active:text-white active:bg-blue-500 hover:shadow-xs hover:-translate-y-px border-b py-1 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4" href="#kegiatan">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <i class="relative top-0 text-sm leading-normal text-red-600 ni ni-spaceship"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Kegiatan</span>
          </a>
        </li> --}}
        
        </ul>
      </ul>
    </div>
  </aside>
  
  <!-- end sidenav -->