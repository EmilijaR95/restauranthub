<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\Cuisine;
use App\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;

class CreateRestaurant extends Component
{
    use WithFileUploads;

    #[Validate('required|string|max:255')]
    public string $name = '';

    #[Validate('required|image|max:5120')]
    public ?UploadedFile $picture = null;

    #[Validate('required|string|max:255')]
    public string $address = '';

    /** @var array<int, string> */
    #[Validate('required|array|min:1')]
    public array $selectedCuisines = [];

    #[Validate('required|string|max:255')]
    public string $city = '';

    #[Validate('required|date')]
    public Carbon $openedDate;

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

    public function store(): void
    {
        $this->validate();

        $restaurant = Restaurant::create([
            'name' => $this->name,
            'picture' => $this->picture->store('restaurants', 'public'),
            'address' => $this->address,
            'city_uuid' => $this->city,
            'opened_date' => $this->openedDate->toDateString(),
        ]);

        $restaurant->cuisines()->sync($this->selectedCuisines);

        $this->reset();

        Toaster::success(__('Restaurant created successfully!'));
    }
}
