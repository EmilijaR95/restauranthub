<div>
    <flux:modal.trigger name="delete-restaurant-{{ $restaurant->uuid }}">
        <flux:button variant="primary" color="red" size="sm">{{ __('Delete') }}</flux:button>
    </flux:modal.trigger>

    <flux:modal name="delete-restaurant-{{ $restaurant->uuid }}" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ __('Confirm Deletion') }}</flux:heading>

                <flux:text class="mt-2">
                    {!! __("You're about to delete this restaurant: <b>:restaurant</b>.", [
                        'restaurant' => $restaurant->name,
                    ]) !!}<br>
                    {{ __('This action cannot be reversed.') }}
                </flux:text>
            </div>

            <div class="flex gap-2">
                <flux:spacer />

                <flux:modal.close>
                    <flux:button variant="ghost">{{ __('Cancel') }}</flux:button>
                </flux:modal.close>

                <flux:button type="submit" variant="danger" wire:click="delete">{{ __('Delete') }}</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
