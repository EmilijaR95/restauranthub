<section class="w-full">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">
            {{ __('Edit Restaurant:') }} <span
                class="text-[#FFA500]">{{ ' ' . $this->restaurant->uuid . ' - ' . Str::title($this->restaurant->name) }}</span>
        </flux:heading>
        <flux:subheading size="lg" class="mb-6 text-[#00A9E0]">
            {{ __('Modify this restaurant’s information and update its details.') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="my-6 w-full space-y-6">
        <!-- Restaurant Name -->
        <flux:input label="{{ __('Name') }}" wire:model="name" />

        <!-- Restaurant Picture Upload -->
        @if ($picture instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile)
            <img src="{{ $picture->temporaryUrl() }}" class="w-32 h-32 object-cover rounded" />
        @elseif ($picture)
            <img src="{{ Storage::disk('public')->url($picture) }}" class="w-32 h-32 object-cover rounded" />
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
        <flux:button variant="primary" color="orange" wire:click="update" class="w-max">{{ __('Edit') }}
        </flux:button>
    </div>
</section>
