<?php

namespace App\Livewire\Restaurants;

use App\Livewire\Forms\RestaurantForm;
use App\Models\City;
use App\Models\Cuisine;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;

class EditRestaurant extends Component
{
    use WithFileUploads;

    public RestaurantForm $form;

    public function mount(Restaurant $restaurant): void
    {
        $this->form->setRestaurant($restaurant);
    }

    /**
     * @return Collection<int, Cuisine>
     */
    #[Computed]
    public function cuisines(): Collection
    {
        return Cuisine::all();
    }

    /**
     * @return Collection<int, City>
     */
    #[Computed]
    public function cities(): Collection
    {
        return City::all();
    }

    public function save(): void
    {
        $this->form->update();

        Toaster::success(__('Restaurant updated successfully!'));
    }
}
