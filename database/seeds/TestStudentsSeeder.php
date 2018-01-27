<?php

use Illuminate\Database\Seeder;

class TestStudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Student::truncate();
        $data = [
            ['Prodan', 'Vadim', 'V'],
            ['Lenon', 'John', 'P'],
            ['Ivanov', 'Eugene', 'K'],
            ['Kotov', 'Serge', 'S'],
            ['Darwin', 'Jack', 'A'],
            ['Smereka', 'Anrew', 'A'],
            ['Ronaldu', 'Christiano', 'E'],
            ['Jobs', 'Steve', 'D'],
            ['Torvalds', 'Linus', 'X'],
            ['Gates', 'Bill', 'L'],
        ];
        $class_id = 1;
        for ($i = 0; $i < 10; $i++)
        {
            \App\Models\Student::create([
                'id' => $i + 1,
                'first_name' => $data[$i][0],
                'last_name' => $data[$i][1],
                'middle_name' => $data[$i][2],
                'class_id' => $class_id,
            ]);

            if ($class_id == 3) $class_id = 1;
            else $class_id++;
        }
    }
}
