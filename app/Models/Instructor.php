<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'middle_name'
    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subject_instructors');
    }
}
