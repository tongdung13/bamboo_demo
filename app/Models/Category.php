<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',

    ];

    public function blog()
    {
        return $this->hasMany(Blog::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'category_courses', 'category_id', 'course_id')->withTimestamps();
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'category_lesson', 'lesson_id', 'category_id');
    }
}
