<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    use HasFactory;

    protected $protected = ['id'];

    protected $appends = ['full_photo_path'];

    protected function fullPhotoPath(): Attribute
    {
        return new Attribute(
            get: fn () => asset('storage/'.$this->svg),
        );
    }
}
