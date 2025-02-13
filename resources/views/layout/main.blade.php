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
    <title>LAB Teknik Informatika UTM</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('layout.partial.link')
  </head>
  
  <body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-blue-500 text-slate-500">
    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>

    <main class="relative my-5 h-full max-h-screen transition-all duration-200 ease-in-out rounded-xl">
      @include('layout.partial.headermain')

      @yield('content')

    </main>
    @include('layout.partial.footer')
  </body>
  @include('layout.partial.script')
</html>