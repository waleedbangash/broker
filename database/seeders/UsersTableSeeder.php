<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        if(DB::table('users')->count() == 0)
        {
         $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'user_type' =>3,
                'role_id' =>1,
            ],
         ];

         User::insert($users);
       }
       else { echo "\e[31mTable is not empty, therefore NOT "; }
    }



}
