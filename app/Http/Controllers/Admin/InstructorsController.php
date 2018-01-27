<?php

namespace App\Http\Controllers\Admin;

use App\Models\Instructor;

class InstructorsController extends TemplateController
{
    protected $model = Instructor::class;
    protected $name = 'instructor';
    protected $entries = [
        'id' => '#',
        'first_name' => [
            'name' => 'First name',
            'type' => 'text',
            'required' => true
        ],
        'last_name' => [
            'name' => 'Last name',
            'type' => 'text',
            'required' => true
        ],
        'middle_name' => [
            'name' => 'Middle name',
            'type' => 'text'
        ],
    ];
    protected $actions = ['edit', 'delete'];
    protected $allow_creating = true;
    protected $validation = [
        'first_name' => 'required|max:255',
        'last_name' => 'required|max:255',
        'middle_name' => 'sometimes|max:255'
    ];
}