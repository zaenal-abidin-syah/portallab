<div class="flex flex-wrap mx-3 my-6">
    <div class="flex-none w-full max-w-full">
        <div class="p-6 relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6 class="dark:text-white">{{ $title ?? '' }}</h6>
            </div>
            <div class="flex-auto pt-0">
                <div class="overflow-x-auto">
                    <table id="{{ $idTable }}" class="w-full border-collapse dark:border-slate-400 text-slate-700 dark:text-slate-50">
                        <thead class="align-bottom">
                            {{ $thead }}
                        </thead>
                        <tbody>
                            {{ $tbody }}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>