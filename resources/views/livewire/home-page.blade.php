<section class="w-full">
    <flux:heading size="xl" weight="bold" align="center" class="flex justify-center items-center gap-1">
        {{ __('Where Great Meals Begin') }}
        <flux:icon.heart variant="solid" />
    </flux:heading>
    <flux:subheading size="lg" class="mb-6 italic text-center text-[#00A9E0]">
        {{ __('Discover and explore your favorite restaurants all in one place.') }}
    </flux:subheading>

    <div class="w-full flex flex-wrap justify-center mt-10">
        @foreach ($this->restaurants as $restaurant)
            <div wire:key="{{ $restaurant->uuid }}" class="basis-full sm:basis-1/2 md:basis-1/3 p-[16px]">
                <flex:card>
                    <img class="h-55 w-full object-cover rounded-t-md" src="{{ $restaurant->picture }}"
                        alt="{{ Str::title($restaurant->name) }}" />
                    <div
                        class="bg-white dark:bg-white/10 rounded-b-md p-4 border-b border-x border-zinc-300/80 dark:border-white/10">
                        <div class="mb-2 flex flex-wrap sm:flex-nowrap justify-center items-center gap-2">
                            <flux:heading weight="semibold" class="text-[18px] md:text-[20px]">
                                {{ Str::title($restaurant->name) }}
                            </flux:heading>
                            {{-- <flux:badge color="amber" size="sm">{{ $restaurant->city->name }}</flux:badge> --}}
                        </div>
                        <flux:subheading size="sm"
                            class="text-slate-500 dark:text-slate-300 flex justify-center items-center gap-1">
                            <flux:icon.map-pin class="size-4" /> {{ $restaurant->address }}
                        </flux:subheading>
                        @php
                            $cuisines = $restaurant->cuisines->pluck('name');
                        @endphp
                        <div class="mt-4 flex flex-wrap justify-center gap-2">
                            @foreach ($cuisines as $cuisine)
                                <div
                                    class="inline-flex items-center gap-1 px-2 py-1 bg-blue-100/50 dark:bg-blue-900/50 text-blue-800 dark:text-blue-200 text-xs font-medium rounded-full">
                                    <img src="{{ $this->getCuisineImage($cuisine) }}" alt="Icon"
                                        class="inline-block w-[20px]" />
                                    {{ $cuisine }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </flex:card>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $this->restaurants->links() }}
    </div>

</section>
