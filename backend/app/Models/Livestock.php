<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Livestock extends Model
{
    use HasFactory; 

    /**
     * The attributes that are mass assignable.
     * Added 'image_url' to allow image storage. (MODIFIED)
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'farm_id',
         'type',
          'breed',
           'quantity',
            'health_status',
             'image_url']; // 

    /**
     * Define the relationship between Livestock and Farm.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function farm(): BelongsTo
    {
        return $this->belongsTo(Farm::class);
    }
}
