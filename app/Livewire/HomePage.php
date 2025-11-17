<?php

namespace App\Livewire;

use App\HasCuisineImages;
use App\Models\Restaurant;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Home')]
class HomePage extends Component
{
    use HasCuisineImages, WithPagination;

    /**
     * @return LengthAwarePaginator<array-key, Restaurant>
     */
    #[Computed]
    public function restaurants(): LengthAwarePaginator
    {
        return Restaurant::latest()->paginate(9);
    }

    public function render(): View
    {
        return view('livewire.home-page')->layout('components.layouts.main');
    }
}
