<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define Roles
        $userAdmin = DB::table('roles')->where('name', 'User Administrator')->first();
        $moderator = DB::table('roles')->where('name', 'Moderator')->first();
        $themeAdmin = DB::table('roles')->where('name', 'Theme Manager')->first();
        // Define Users
        $jane = DB::table('users')->where('name', 'Jane UserAdmin')->first();
        $bob = DB::table('users')->where('name', 'Bob Moderator')->first();
        $susan = DB::table('users')->where('name', 'Susan ThemeAdmin')->first();

        // Start Seeding
        DB::table('role_user')->insert([
            'role_id' => $userAdmin->id,
            'user_id' => $jane->id,
        ]);
        DB::table('role_user')->insert([
            'role_id' => $moderator->id,
            'user_id' => $bob->id,
        ]);
        DB::table('role_user')->insert([
            'role_id' => $themeAdmin->id,
            'user_id' => $susan->id,
        ]);
    }
}
