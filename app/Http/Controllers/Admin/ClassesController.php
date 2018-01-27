<?php

namespace App\Http\Controllers\Admin;

use App\Models\Classroom;

class ClassesController extends TemplateController
{
    protected $model = Classroom::class;
    protected $name = 'class';
    protected $entries = [
        'id' => '#',
        'name' => [
            'name' => 'Name',
            'type' => 'text',
            'required' => true
        ]
    ];
    protected $actions = ['edit', 'delete'];
    protected $allow_creating = true;
    protected $validation = [
        'name' => 'required|max:255'
    ];
}