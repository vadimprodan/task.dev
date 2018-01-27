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
        \App\Models\Admin::create([
            'username' => 'admin',
            'password' => bcrypt('111111')
        ]);
    }
}
