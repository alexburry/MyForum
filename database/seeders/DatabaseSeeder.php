<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Subforum;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Role;
use App\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Subforum::factory(4)->create();
        User::factory(5)->hasPosts(5)->create();
        User::factory(10)->hasComments(5)->create();

        $this->call(RoleTableSeeder::Class);
    }
}
