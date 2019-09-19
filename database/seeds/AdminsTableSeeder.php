<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
           'created_at' => \Carbon\Carbon::now(),
           'username' => 'ciraj',
            'image' => '',
            'first_name' => 'aly',
            'last_name' => 'ciraj',
            'email' => 'ciraj@gmail.com',
            'password' => bcrypt('admin123'),
            'status' => '1',
        ]);
    }
}
