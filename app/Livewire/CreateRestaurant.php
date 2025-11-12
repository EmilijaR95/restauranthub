<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\Cuisine;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateRestaurant extends Component
{
    use WithFileUploads;

    #[Validate('required|string|max:255')]
    public string $name = '';

    #[Validate('required|image|max:1024')]
    public ?UploadedFile $picture = null;

    #[Validate('required|string|max:255')]
    public string $address = '';

    /** @var array<int, string> */
    #[Validate('required|array|min:1')]
    public array $selectedCusines = [];

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

    public function save(): void
    {
        $this->validate();

        // Logic to save the restaurant would go here

        session()->flash('message', 'Restaurant created successfully.');
    }
}
