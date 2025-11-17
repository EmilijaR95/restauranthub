<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white antialiased dark:bg-linear-to-b dark:from-neutral-950 dark:to-neutral-900">
    <div class="flex w-full flex-col items-center gap-2 relative">
        <a href="{{ route('home') }}" class="flex flex-col gap-2 font-medium" wire:navigate>
            <span class="flex h-auto w-[100px] md:w-[120px] xl:w-[150px] my-4 items-center justify-center rounded-md">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="block dark:hidden" {{ $attributes }} />
                <img src="{{ asset('images/logo-dark.png') }}" alt="Logo Dark" class="hidden dark:block"
                    {{ $attributes }} />
            </span>
            <span class="sr-only">{{ config('app.name', 'RestaurantHub') }}</span>
        </a>

        <div class="absolute top-2 right-2">
            <flux:button x-data x-on:click="$flux.dark = ! $flux.dark" icon="moon" variant="subtle"
                aria-label="Toggle dark mode" />
        </div>

        <div class="w-full flex flex-col gap-6 p-4 md:p-6 xl:p-8">
            {{ $slot }}
        </div>
    </div>

    <!-- Footer -->
    <footer class="w-full border-t border-zinc-300/80 dark:border-zinc-400 mt-10">
        <div
            class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-sm text-slate-500 dark:text-slate-300">
                &copy; {{ date('Y') }} {{ config('app.name', 'RestaurantHub') }}.
                {{ __('Built with ❤️ for food lovers.') }}
            </p>
            <div class="flex items-center gap-4">
                <a href="{{ route('home') }}" class="text-sm text-slate-500 dark:text-slate-300 hover:underline"
                    wire:navigate>
                    {{ __('Home') }}
                </a>
            </div>
        </div>
    </footer>
    @fluxScripts
</body>

</html>
