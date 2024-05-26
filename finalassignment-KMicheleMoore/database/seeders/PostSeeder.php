<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'title' => 'Test Post',
            'content' => 'This is the post content for User Admin',
            'created_by' => 1,
            'created_at' => Carbon::now(),

        ]);
        DB::table('posts')->insert([
            'title' => 'Another Test Post',
            'content' => 'This is the post content for Moderator',
            'created_by' => 2,
            'created_at' => Carbon::now(),

        ]);
        DB::table('posts')->insert([
            'title' => 'Yet Another Test Post',
            'content' => 'This is the post content for Theme Admin',
            'created_by' => 3,
            'created_at' => Carbon::yesterday(),
        ]);
    }
}
