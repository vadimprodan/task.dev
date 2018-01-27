<?php

namespace App\Http\Controllers\Admin;

use App\Models\Classroom;
use App\Models\ClassSubject;
use App\Models\SubjectInstructors;

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
        ],
        'subjects' => [
            'name' => 'Subjects',
            'type' => 'select2',
            'hidden' => true,
            'multiple' => true,
            'model_column' => 'name',
            'relation' => 'subjects',
            'pluck' => 'id'
        ]
    ];
    protected $actions = ['edit', 'delete'];
    protected $allow_creating = true;
    protected $validation = [
        'name' => 'required|max:255'
    ];

    protected function formSetup()
    {
        $this->data['entries']['subjects']['model'] = SubjectInstructors::get();
    }

    protected function putSetup(&$item, &$data)
    {
        // TODO: optimize this, whenever.
        if (!isset($data['subjects'])) $data['subjects'] = [];

        $item_subjects = $item->subjects->pluck('id')->toArray();

        $subjects['add'] = array_diff($data['subjects'], $item_subjects);
        $subjects['delete'] = array_diff($item_subjects, $data['subjects']);

        if ( !empty($subjects['add']) ) {
            foreach ($subjects['add'] as $subject)
            {
                ClassSubject::create([
                    'class_id' => $item->id,
                    'subject_instructor_id' => $subject
                ]);
            }
        }

        if ( !empty($subjects['delete']) ) {
            ClassSubject::where('class_id', $item->id)->whereIn('subject_instructor_id', $subjects['delete'])->delete();
        }

        unset($data['subjects']);
    }
}