<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $protected = ['id'];

    protected $appends = ['full_photo_path', 'category_name'];

    protected function fullPhotoPath(): Attribute
    {
        return new Attribute(
            get: fn () => asset('storage/'.$this->photo),
        );
    }

    protected function categoryName(): Attribute
    {
        return new Attribute(
            get: fn () => $this->category->name,
        );
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
