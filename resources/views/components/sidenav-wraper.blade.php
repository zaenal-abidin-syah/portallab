<!-- sidenav  -->
<aside class="fixed mt-10 inset-y-0 flex-wrap items-center justify-between block w-full p-0 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
    <div class="text-center">
      <i class="absolute top-0 right-0 p-2 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden" sidenav-close></i>
      <a class="block px-4 py-3 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700" target="_blank">
        <img src="./assets/img/logo-ct-dark.png" class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8" alt="main_logo" />
        <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">LAB Teknik Informatika</span>
      </a>
    </div>
    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
    <div class="items-center block w-auto max-h-screen h-sidenav grow basis-full">
      <ul class="flex flex-col pl-0 mb-0">
        {{ $slot }}
      </ul>
    </div>
  </aside>
  
  <!-- end sidenav -->