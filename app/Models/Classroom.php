<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = 'classes';

    protected $fillable = [
        'name'
    ];

    public function subjects()
    {
        return $this->belongsToMany(SubjectInstructors::class, 'class_subjects', 'class_id', 'subject_instructor_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }
}
