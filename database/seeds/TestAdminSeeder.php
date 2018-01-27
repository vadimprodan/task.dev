<?php

use Illuminate\Database\Seeder;

class TestAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::truncate();
        \App\Models\Admin::create([
            'id' => 1,
            'username' => 'admin',
            'password' => bcrypt('111111')
        ]);
    }
}
