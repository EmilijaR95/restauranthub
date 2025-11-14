<section class="w-full">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('List All Restaurants') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6 text-[#00A9E0]">
            {{ __('View and manage all restaurants in your list') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="overflow-x-auto">
        <table class="border-collapse table-auto w-full text-sm">
            <thead>
                <tr>
                    <th
                        class="border-b border-zinc-300/80 dark:border-zinc-400 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                        #
                    </th>
                    <th
                        class="border-b border-zinc-300/80 dark:border-zinc-400 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                        {{ __('Restaurant') }}
                    </th>
                    <th
                        class="border-b border-zinc-300/80 dark:border-zinc-400 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                        {{ __('City') }}
                    </th>
                    <th
                        class="border-b border-zinc-300/80 dark:border-zinc-400 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                        {{ __('Actions') }}
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-white/10">
                @foreach ($this->restaurants as $restaurant)
                    <tr>
                        <td class="border-b border-zinc-200 dark:border-zinc-400 p-4 text-slate-500 dark:text-white">
                            {{ $restaurant->uuid }}</td>
                        <td
                            class="border-b border-zinc-200 dark:border-zinc-400 p-4 pl-8 text-slate-500 dark:text-white">
                            <div class="flex flex-wrap items-center gap-2">
                                <img class="inline-block rounded-sm h-8 w-8 object-cover"
                                    src="{{ $restaurant->picture }}" alt="{{ Str::title($restaurant->name) }}" />
                                {{ Str::title($restaurant->name) }}
                            </div>
                        </td>
                        <td class="border-b border-zinc-200 dark:border-zinc-400 p-4 text-slate-500 dark:text-white">
                            {{ $restaurant->city->name }}</td>
                        <td class="border-b border-zinc-200 dark:border-zinc-400 p-4 text-slate-500 dark:text-white">
                            <div class="flex items-center gap-2">
                                <flux:button variant="primary" color="orange" size="sm"
                                    :href="route('restaurants.create')" wire:navigate>
                                    {{ __('Edit') }}
                                </flux:button>
                                <flux:button variant="primary" color="red" size="sm">
                                    {{ __('Delete') }}
                                </flux:button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-6">
        {{ $this->restaurants->links() }}
    </div>
</section>
