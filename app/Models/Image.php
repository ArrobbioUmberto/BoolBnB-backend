<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Apartment;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'url',
        'apartment_id',
    ];
    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    protected function imagePath(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                if ($attributes) {

                    return asset('storage/' . $attributes['url']);
                }
            }
        );
    }


    protected $appends = ['image_path'];
}
