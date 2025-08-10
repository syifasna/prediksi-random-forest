<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
               'name'=>'Nia Sania',
               'email'=>'admin@paudattaqwa.com',
               'role'=>1,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Mila Amalia',
               'email'=>'kepsek@paudattaqwa.com',
               'role'=> 2,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'User',
               'email'=>'user@paudattaqwa.com',
               'role'=>0,
               'password'=> bcrypt('123456'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
