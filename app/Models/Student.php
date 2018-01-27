<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'class_id');
    }

    public function getClassNameAttribute()
    {
        return $this->classroom->name;
    }
}
