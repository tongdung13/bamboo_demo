<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lesson_id'
    ];

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'day_lessons', 'day_id', 'lesson_id');
    }
}
