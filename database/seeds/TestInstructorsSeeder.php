<?php

use Illuminate\Database\Seeder;

class TestInstructorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Instructor::truncate();
        $data = [
            ['Mad', 'Max', 'X'],
            ['Xerox', 'Dave', 'R'],
            ['Spartans', 'Leonid', 'T'],
            ['Yolopukee', 'Fin', 'C'],
            ['Brezhnev', 'Leonid', 'G'],
        ];
        for ($i = 0; $i < 5; $i++)
        {
            \App\Models\Instructor::create([
                'id' => $i + 1,
                'first_name' => $data[$i][0],
                'last_name' => $data[$i][1],
                'middle_name' => $data[$i][2],
            ]);
        }
    }
}
