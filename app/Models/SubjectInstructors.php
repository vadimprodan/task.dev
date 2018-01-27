<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectInstructors extends Model
{
    protected $fillable = [
        'subject_id', 'instructor_id'
    ];

    protected $with = [
        'subject', 'instructor'
    ];

    protected $appends = [
        'name'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }

    public function getNameAttribute()
    {
        return $this->subject->name . ' (' . $this->instructor->first_name . ' ' . $this->instructor->last_name[0] .
            '.' . ($this->instructor->middle_name ? ' ' . $this->instructor->middle_name[0] . '.' : null) . ')';
    }
}
