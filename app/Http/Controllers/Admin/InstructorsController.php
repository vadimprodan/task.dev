<?php

namespace App\Http\Controllers\Admin;

use App\Models\Instructor;
use App\Models\Subject;
use App\Models\SubjectInstructors;

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
        'first_name' => 'required|max:255',
        'last_name' => 'required|max:255',
        'middle_name' => 'sometimes|max:255'
    ];

    protected function formSetup()
    {
        $this->data['entries']['subjects']['model'] = Subject::get();
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
                SubjectInstructors::create([
                    'instructor_id' => $item->id,
                    'subject_id' => $subject
                ]);
            }
        }

        if ( !empty($subjects['delete']) ) {
            SubjectInstructors::where('instructor_id', $item->id)->whereIn('subject_id', $subjects['delete'])->delete();
        }

        unset($data['subjects']);
    }
}