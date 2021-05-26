<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toy extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'using',
        'image',
    ];

    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }
}
