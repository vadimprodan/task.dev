<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'middle_name', 'class_id'
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'class_id');
    }

    public function getClassNameAttribute()
    {
        return $this->classroom->name;
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}" . ($this->middle_name ? " {$this->middle_name}" : null);
    }
}
