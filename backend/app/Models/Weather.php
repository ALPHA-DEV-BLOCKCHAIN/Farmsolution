<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Farm; 

class Weather extends Model
{
    use HasFactory;  

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'farm_id',
        'temperature',
        'rainfall',
        'forecast',
        'image_url', // Added image_url to the fillable properties
    ];

    /**
     * Define the relationship between Weather and Farm.
     *
     * @return BelongsTo
     */
    public function farm(): BelongsTo
    {
        return $this->belongsTo(Farm::class);
    }
}
