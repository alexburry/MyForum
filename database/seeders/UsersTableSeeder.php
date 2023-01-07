<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $m = new User;
        $m->name = "Mod";
        $m->email = "mod@myforum.com";
        $m->password = bcrypt('secrettt');
        $m->save();
        $m->roles()->attach(2);

        $a = new User;
        $a->name = "Admin";
        $a->email = "admin@myforum.com";
        $a->password = bcrypt('secrettt');
        $a->save();
        $a->roles()->attach(1);
        $a->roles()->attach(2);
    }
}
