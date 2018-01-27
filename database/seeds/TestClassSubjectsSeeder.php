<?php

use Illuminate\Database\Seeder;

class TestClassSubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ClassSubject::truncate();
        $data = [
            [1, 2, 4, 6, 10],
            [3, 11, 14, 15, 9],
            [5, 7, 8, 12, 13]
        ];

        foreach ($data as $i => $cake)
        {
            foreach ($cake as $piece)
            {
                \App\Models\ClassSubject::create([
                    'class_id' => $i + 1,
                    'subject_instructor_id' => $piece
                ]);
            }
        }
    }
}
