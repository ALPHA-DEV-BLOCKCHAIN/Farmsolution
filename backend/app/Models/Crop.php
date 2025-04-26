<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // ✅ Add this
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Crop extends Model
{
    use HasFactory; // 

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'farm_id',
         'type',
          'planting_date', 
          'harvest_date', 
          'expected_yield',
          'image_url'
        ]; 

    /**
     * Define the relationship between Crop and Farm.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function farm(): BelongsTo
    {
        return $this->belongsTo(Farm::class);
    }
}
