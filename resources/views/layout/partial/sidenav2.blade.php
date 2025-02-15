<aside class="fixed mt-6 inset-y-0 flex-wrap items-center justify-between block w-full p-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
    <div class="h-19">
        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden" sidenav-close></i>
        <!--<a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700" href="https://demos.creative-tim.com/argon-dashboard-tailwind/pages/dashboard.html" target="_blank">
            <img src="./assets/img/logo-ct-dark.png" class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8" alt="main_logo" />
            {{-- <img src="./assets/img/logo-ct.png" class="hidden h-full max-w-full transition-all duration-200 dark:inline ease-nav-brand max-h-8" alt="main_logo" /> --}}
            <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">LAB Tenik Informatika</span>
        </a>-->
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700" target="_blank">
            <img src="./assets/img/logo-ct-dark.png" class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8" alt="main_logo" />
            {{-- <img src="./assets/img/logo-ct.png" class="hidden h-full max-w-full transition-all duration-200 dark:inline ease-nav-brand max-h-8" alt="main_logo" /> --}}
            <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">LAB Tenik Informatika</span>
        </a>
    </div>

    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

    <div class="items-center block w-auto max-h-screen h-sidenav grow basis-full">
        <ul class="space-y-0.5">
            <li class="w-full">
                <h6 class="ml-2 pl-6 text-xs font-bold leading-none uppercase dark:text-white opacity-60">Menu</h6>
              </li>

            <!-- Laboratorium Link -->
            <li class="w-full">
                <a class="active:text-white active:bg-blue-500 hover:shadow-xs hover:-translate-y-px border-b py-0.5 px-4 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap text-slate-700" href="index">
                  <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                    <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                  </div>
                  <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Laboratorium</span>
                </a>
              </li>

            <!-- Daftar Dosen Link -->
            <li class="w-full">
                <a class="active:text-white active:bg-blue-500 hover:shadow-xs hover:-translate-y-px order-b py-1 px-4 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap text-slate-700" href="dosen">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                    <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-paper-diploma"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Daftar Dosen</span>
                </a>
            </li>

            <li class="w-full mt-4">
                <h6 class="pl-6 ml-2 text-xs font-semibold leading-tight uppercase dark:text-white opacity-70">Dosen Laboratorium</h6>
            </li>

            <!-- Dosen Teknologi Informasi Link -->
            <li class="w-full">
                <a class="active:text-white active:bg-blue-500 hover:shadow-xs hover:-translate-y-px border-b py-1 text-sm my-0 mx-2 flex items-center whitespace-nowrap px-4" href="#teknologi-informasi-dan-aplikasi">
                  <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                    <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-app"></i>
                  </div>
                  <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Teknologi Informasi</span>
                </a>
            </li>
            
            <!-- Dosen Common Computing Link -->
            <li class="w-full">
                <a class="active:text-white active:bg-blue-500 hover:shadow-xs hover:-translate-y-px border-b py-1 text-sm my-0 mx-2 flex items-center whitespace-nowrap px-4" href="#common-computing">
                  <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                    <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-compass-04"></i>
                  </div>
                  <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Common Computing</span>
                </a>
              </li>

            <!-- Dosen Multimedia Computing Link -->
            <li class="w-full">
                <a class="active:text-white active:bg-blue-500 hover:shadow-xs hover:-translate-y-px border-b py-1 text-sm my-0 mx-2 flex items-center whitespace-nowrap px-4" href="#multimedia">
                  <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                    <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-button-play"></i>
                  </div>
                  <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Multimedia</span>
                </a>
              </li>

            <!-- Dosen Sistem Terdistribusi Link -->
            <li class="w-full">
                <a class="active:text-white active:bg-blue-500 hover:shadow-xs hover:-translate-y-px border-b py-1 text-sm my-0 mx-2 flex items-center whitespace-nowrap px-4" href="#sistem-terdistribusi">
                  <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                    <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-books"></i>
                  </div>
                  <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Sistem Terdistribusi</span>
                </a>
            </li>
            <!-- Dosen Riset Link -->
            <li class="w-full">
                <a class="active:text-white active:bg-blue-500 hover:shadow-xs hover:-translate-y-px border-b py-1 text-sm my-0 mx-2 flex items-center whitespace-nowrap px-4" href="#riset">
                  <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                    <i class="relative top-0 text-sm leading-normal text-lime-500 ni ni-collection"></i>
                  </div>
                  <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Riset</span>
                </a>
            </li>
            
        </ul>
    </div>
</aside>
