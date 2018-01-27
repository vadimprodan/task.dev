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
        return $this->belongsToMany(ClassSubject::class, 'id');
    }
}
