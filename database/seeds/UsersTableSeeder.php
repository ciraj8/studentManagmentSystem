<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'created_at' => \Carbon\Carbon::now(),
                'username' => 'ciraj',
                'image' => '',
                'first_name' => 'aly',
                'last_name' => 'ciraj',
                'role' => 'admin',
                'email' => 'ciraj@gmail.com',
                'password' => bcrypt('admin123'),
                'status' => '1',
                'phone' => '96567794',
                'address' => 'H.hiyaa',
                'gender' => 'male',
                'dob' => '2019-03-12',
                'join_date' => '2019-03-12',
                'city' => 'Male',
                'age' => '28',
            ],
            [
                'created_at' => \Carbon\Carbon::now(),
                'username' => 'wisham',
                'image' => '',
                'first_name' => 'wisham',
                'last_name' => 'moosa',
                'role' => 'student',
                'email' => 'wisham@gmail.com',
                'password' => bcrypt('std123'),
                'status' => '1',
                'phone' => '986133131',
                'address' => 'H.star',
                'gender' => 'male',
                'dob' => '2019-03-12',
                'join_date' => '2019-03-12',
                'city' => 'Male',
                'age' => '27',
            ],
            [
                'created_at' => \Carbon\Carbon::now(),
                'username' => 'ilyas',
                'image' => '',
                'first_name' => 'ilyas',
                'last_name' => 'mohamed',
                'role' => 'student',
                'email' => 'ilyas@gmail.com',
                'password' => bcrypt('std123'),
                'status' => '1',
                'phone' => '986133131',
                'address' => 'H.villa',
                'gender' => 'male',
                'dob' => '2019-03-12',
                'join_date' => '2019-03-12',
                'city' => 'Male',
                'age' => '28',
            ],

            

          
           
        ]);
    }
}
