<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassSubject extends Model
{
    protected $fillable = [
        'class_id', 'subject_instructor_id'
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'class_id');
    }

    public function subject_instructor()
    {
        return $this->belongsTo(SubjectInstructors::class, 'subject_instructor_id');
    }
}
