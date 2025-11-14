<section class="w-full">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Create Restaurant') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6 text-[#00A9E0]">{{ __('Add a new restaurant to your list') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="my-6 w-full space-y-6">
        <!-- Restaurant Name -->
        <flux:input label="{{ __('Name') }}" wire:model="name" />

        <!-- Restaurant Picture Upload -->
        @if ($picture)
            <img src="{{ $picture->temporaryUrl() }}" class="w-32 h-32 object-cover rounded">
        @endif
        <flux:input type="file" label="{{ __('Picture') }}" wire:model="picture" />

        <!-- Restaurant Address -->
        <flux:textarea rows="2" label="{{ __('Address') }}" wire:model="address" />

        <!-- Restaurant Cuisines -->
        <flux:checkbox.group wire:model="selectedCuisines" label="{{ __('Cuisines') }}">
            <div class="flex flex-wrap gap-4 *:gap-x-2">
                @foreach ($this->cuisines as $cuisine)
                    <flux:checkbox value="{{ $cuisine->uuid }}" label="{{ $cuisine->name }}" />
                @endforeach
            </div>
        </flux:checkbox.group>

        <!-- Restaurant City -->
        <flux:select wire:model="city" placeholder="{{ 'Choose city...' }}" label="{{ __('City') }}">
            @foreach ($this->cities as $city)
                <flux:select.option value="{{ $city->uuid }}">{{ $city->name }}</flux:select.option>
            @endforeach
        </flux:select>

        <!-- Opened Date -->
        <flux:input type="date" wire:model="openedDate" label="{{ __('Opened Date') }}" />

        <!-- Save Button -->
        <flux:button variant="primary" color="emerald" wire:click="save" class="w-max">{{ __('Save') }}
        </flux:button>
    </div>
</section>
