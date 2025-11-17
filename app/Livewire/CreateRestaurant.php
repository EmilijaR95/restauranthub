<?php

namespace App\Livewire;

use App\Livewire\Forms\RestaurantForm;
use App\Models\City;
use App\Models\Cuisine;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;

class CreateRestaurant extends Component
{
    use WithFileUploads;

    public RestaurantForm $form;

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
        $this->form->store();

        Toaster::success(__('Restaurant created successfully!'));
    }
}
