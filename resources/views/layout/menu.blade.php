<!--

=========================================================
* Argon Dashboard 2 Tailwind - v1.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-tailwind
* Copyright 2022 Creative Tim (https://www.creative-tim.com)

* Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="./assets/img/favicon.png" />
    <title>LAB Teknik Informatika</title>
    <script>
      if (localStorage.getItem("dark-mode") === "true") {
        document.documentElement.classList.add("dark");
      }
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="./assets/css/datatables.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- include('layout.partial.link') -->
  </head>

  <body class="m-0 font-sans antialiased dark:bg-slate-900 leading-default bg-slate-50 text-slate-500">
    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
    @include('layout.partial.sidenav')
    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
      {{-- @include('layout.partial.headermenu') --}}
      <x-header-wraper></x-header-wraper>
      <x-content-wraper>
        @yield('content')
      </x-content-wraper>

    </main>
    <!-- include('layout.partial.script') -->
    <script src="./assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>
    <script src="./assets/js/datatables.min.js"></script>

  </body>
</html>
