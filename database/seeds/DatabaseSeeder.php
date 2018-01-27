<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(TestAdminSeeder::class);
        $this->call(TestStudentsSeeder::class);
        $this->call(TestInstructorsSeeder::class);
    }
}
