<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-zinc-50 antialiased dark:bg-zinc-900">
    <div class="bg-zinc-50 dark:bg-zinc-900 flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10">
        <div class="flex w-full max-w-md flex-col gap-6">


            <div class="flex flex-col gap-6 ">
                <div
                    class="rounded-xl border border-zinc-200 bg-white dark:bg-white/5 dark:border-transparent text-zinc-800 shadow-xs">
                    <div class="px-10 py-8">{{ $slot }}</div>
                </div>
            </div>
        </div>
    </div>
    @fluxScripts
</body>

</html>
