<?php

namespace Database\Seeders;

use App\LkpUserType;
use Illuminate\Database\Seeder;
use Tests\Browser\RolesTest;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            UserTypeSeeder::class,
            UserStatusSeeder::class,
            OrderStatusSeeder::class,
            PermissionRoleTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
        ]);
    }
}
