<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'category_id',
        'age',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function age()
    {
        return $this->belongsTo(Age::class);
    }

    public function getImageAttribute($image)
    {
        if ($image != null) {
            return asset('/storage/images/' . $image);
        }

        return null;
    }


}
