<?php

use Illuminate\Database\Seeder;

class TestSubjectInstructorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SubjectInstructors::truncate();
        $data = [
            [1, 3],
            [4, 3],
            [2],
            [5, 2, 1],
            [1, 2, 3, 5]
        ];

        $i = 1;
        foreach ($data as $num => $piece)
        {
            foreach ($piece as $piece_of_cake)
            {
                \App\Models\SubjectInstructors::create([
                    'subject_id' => $piece_of_cake,
                    'instructor_id' => $num + 1,
                    'id' => $i
                ]);
                $i++;
            }
        }
    }
}
