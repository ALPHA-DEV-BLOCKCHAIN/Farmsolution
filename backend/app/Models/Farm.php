<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Farm extends Model
{
    use HasFactory;

    // Add the image_url column to the fillable property to allow mass assignment
    protected $fillable = [
        'name',        // Example: 'name' column
        'location',
        'size',
        'user_id',
                           // Example: 'location' column
        'image_url',   // Newly added column
        // Add other fields as needed
    ];

    /**
     * Define the relationship between Farm and Livestock.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function livestocks(): HasMany
    {
        return $this->hasMany(Livestock::class);
    }

    /**
     * Define the relationship between Farm and Crop.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function crops(): HasMany
    {
        return $this->hasMany(Crop::class);
    }

    /**
     * Define the relationship between Farm and User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
