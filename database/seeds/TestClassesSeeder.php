<?php

use Illuminate\Database\Seeder;

class TestClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 3; $i++)
        {
            \App\Models\Classroom::create([
                'id' => $i,
                'name' => "#$i"
            ]);
        }
    }
}
