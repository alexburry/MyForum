<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new Role;
        $a->rolename = "Admin";
        $a->save();

        $m = new Role;
        $m->rolename = "Moderator";
        $m->save();
    }
}
