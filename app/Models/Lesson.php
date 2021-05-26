<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'content',
        'video',
        'age_id',
        'toy_id',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_lesson', 'lesson_id', 'category_id');
    }

    public function age()
    {
        return $this->belongsTo(Age::class);
    }

    public function toy()
    {
        return $this->belongsTo(Toy::class);
    }

    public function getVideoAttribute($video)
    {
        if ($video != null) {
            return asset('/storage/videos/' . $video);
        }

        return null;
    }

    public function days()
    {
        return $this->belongsToMany(Day::class, 'day_lessons', 'day_id', 'lesson_id');
    }
}
