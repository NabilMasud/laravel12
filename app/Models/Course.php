<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;

    protected $fillable = ['title', 'description', 'thumbnail', 'price', 'user_id'];

    public function instructor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
