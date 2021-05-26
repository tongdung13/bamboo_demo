<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Age extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function course ()
    {
        return $this->hasMany(Course::class);
    }

    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }

    public function blog()
    {
        return $this->hasMany(Blog::class);
    }
}
