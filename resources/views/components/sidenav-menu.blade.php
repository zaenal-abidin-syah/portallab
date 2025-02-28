<li class="w-full">
    <a class="active:text-white active:bg-blue-500 hover:shadow-xs hover:-translate-y-px border-b py-1 text-sm my-0 mx-4 flex items-center whitespace-nowrap" href="{{ $hrefLink }}">
        <div class="mr-2 flex items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
        <i class="relative top-0 text-sm leading-normal {{ $logoColor }} {{ $sidenavLogo }}"></i>
        </div>
        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">{{ $slot }}</span>
    </a>
</li>