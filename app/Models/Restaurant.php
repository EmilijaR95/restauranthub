<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Restaurant extends Model
{
    use HasUuids;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'picture',
        'address',
        'city_uuid',
        'opened_date',
    ];

    /**
     *  Get the city where this restaurant is located.
     *
     * @return BelongsTo<City, $this>
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    /**
     * The cuisines that this restaurant offers.
     *
     * @return BelongsToMany<Cuisine, $this, CuisineRestaurant>
     */
    public function cuisines(): BelongsToMany
    {
        return $this->belongsToMany(Cuisine::class)
            ->using(CuisineRestaurant::class)
            ->withTimestamps();
    }
}
