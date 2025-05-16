<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function getImageUrlAttribute(): string
{
    if ($this->image) {
        return asset('storage/' . $this->image);
    }

    return asset('image.jpg');
}

}
