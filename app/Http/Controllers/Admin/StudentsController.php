<?php

namespace App\Http\Controllers\Admin;

use App\Models\Classroom;
use App\Models\Student;

class StudentsController extends TemplateController
{
    protected $model = Student::class;
    protected $name = 'student';
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
        'class_id' => [
            'name' => 'Class',
            'type' => 'select',
            'model_column' => 'name',
            'hidden' => true
        ],
        'class_name' => [
            'name' => 'Class'
        ]
    ];
    protected $actions = ['edit', 'delete'];
    protected $allow_creating = true;
    protected $validation = [
        'first_name' => 'required|max:255',
        'last_name' => 'required|max:255',
        'middle_name' => 'sometimes|max:255',
        'class_id' => 'required|numeric',
    ];
    protected $multipart = false;

    protected function formSetup()
    {
        $this->data['entries']['class_id']['model'] = Classroom::get();
    }
}