<?php

namespace App\Livewire;

use App\Models\Restaurant;
use Flux\Flux;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class DeleteRestaurant extends Component
{
    public Restaurant $restaurant;

    public function mount(Restaurant $restaurant): void
    {
        $this->restaurant = $restaurant;
    }

    public function delete(): void
    {
        $this->restaurant->cuisines()->sync([]);

        if ($this->restaurant->picture && Storage::disk('public')->exists($this->restaurant->picture)) {
            Storage::disk('public')->delete($this->restaurant->picture);
        }

        $this->restaurant->delete();

        Flux::modal('delete-restaurant-'.$this->restaurant->uuid)->close();

        $this->dispatch('restaurantDeleted');

        Toaster::success(__('Restaurant deleted successfully.'));
    }
}
