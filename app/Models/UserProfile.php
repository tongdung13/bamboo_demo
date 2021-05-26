<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'dob',
        'height',
        'weight',
        'image',
        'isEarly',
        'earlyAge',
        'pamily',
        'realAge',
        'user_id',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_user_profile', 'userProfile_id', 'course_id');
    }

    public function getImageAttribute($image)
    {
        if ($image != null) {
            return asset('/storage/images/' . $image);
        }

        return null;
    }
}
