<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subject;

class SubjectsController extends TemplateController
{
    protected $model = Subject::class;
    protected $name = 'subject';
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