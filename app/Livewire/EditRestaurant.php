<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\Cuisine;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;

class EditRestaurant extends Component
{
    use WithFileUploads;

    public Restaurant $restaurant;

    public string $name;

    public TemporaryUploadedFile|string|null $picture = null;

    public string $address;

    /** @var array<int, string> */
    public array $selectedCuisines;

    public string $city;

    public string $openedDate;

    public function mount(Restaurant $restaurant): void
    {
        $this->restaurant = $restaurant;
        $this->name = $restaurant->name;
        $this->picture = $restaurant->picture;
        $this->address = $restaurant->address;
        $this->selectedCuisines = $restaurant->cuisines->pluck('uuid')->toArray();
        $this->city = $restaurant->city_uuid;
        $this->openedDate = $restaurant->opened_date;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'picture' => ['nullable', Rule::when($this->picture instanceof TemporaryUploadedFile, 'image|max:5120')],
            'address' => 'required|string|max:255',
            'selectedCuisines' => 'required|array|min:1',
            'city' => 'required|string|max:255',
            'openedDate' => 'required|date',
        ];
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

    public function update(): void
    {
        $this->validate();

        if ($this->picture instanceof TemporaryUploadedFile) {
            $path = $this->picture->store('restaurants', 'public');

            if ($this->restaurant->picture && Storage::disk('public')->exists($this->restaurant->picture)) {
                Storage::disk('public')->delete($this->restaurant->picture);
            }
        }

        $this->restaurant->update([
            'name' => $this->name,
            'picture' => $this->picture instanceof TemporaryUploadedFile ? $path : $this->picture,
            'address' => $this->address,
            'city_uuid' => $this->city,
            'opened_date' => $this->openedDate,
        ]);

        $this->restaurant->cuisines()->sync($this->selectedCuisines);

        Toaster::success(__('Restaurant updated successfully!'));
    }
}
