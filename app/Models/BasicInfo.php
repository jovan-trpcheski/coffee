<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicInfo extends Model
{
    use HasFactory;
    protected $protected = ['id'];
    protected $appends = ['full_meta_picture_path'];

    protected function fullMetaPicturePath(): Attribute
    {
        return new Attribute(
            get: fn () => asset('storage/'.$this->meta_picture),
        );
    }
}
