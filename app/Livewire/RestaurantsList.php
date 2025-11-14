<?php

namespace App\Livewire;

use App\Models\Restaurant;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class RestaurantsList extends Component
{
    use WithPagination;

    /**
     * @return LengthAwarePaginator<array-key, Restaurant>
     */
    #[Computed]
    public function restaurants(): LengthAwarePaginator
    {
        return Restaurant::paginate();
    }
}
