<?php

use Illuminate\Database\Seeder;

class TestSubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Subject::truncate();
        $data = ['Programming Java language', 'Higher mathematics', 'Theory of information and coding', 'Physics', 'Philosophy'];
        for ($i = 0; $i < 5; $i++)
        {
            \App\Models\Subject::create([
                'id' => $i + 1,
                'name' => $data[$i]
            ]);
        }
    }
}
