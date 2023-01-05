<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mod_permission = Permission::where('slug','edit-posts-and-comments')->first();
		// $manager_permission = Permission::where('slug', 'edit-users')->first();

		$mod_role = new Role();
		$mod_role->slug = 'mod';
		$mod_role->name = 'Moderator';
		$mod_role->save();
		$mod_role->permissions()->attach($mod_permission);

		// $manager_role = new Role();
		// $manager_role->slug = 'manager';
		// $manager_role->name = 'Assistant Manager';
		// $manager_role->save();
		// $manager_role->permissions()->attach($manager_permission);

		$mod_role = Role::where('slug','mod')->first();
		// $manager_role = Role::where('slug', 'manager')->first();

		$editItems = new Permission();
		$editItems->slug = 'edit-posts-and-comments';
		$editItems->name = 'Edit posts and comments';
		$editItems->save();
		$editItems->roles()->attach($mod_role);

		// $editUsers = new Permission();
		// $editUsers->slug = 'edit-users';
		// $editUsers->name = 'Edit Users';
		// $editUsers->save();
		// $editUsers->roles()->attach($manager_role);

		$mod_role = Role::where('slug','mod')->first();
		// $manager_role = Role::where('slug', 'manager')->first();
		$mod_perm = Permission::where('slug','edit-posts-and-comments')->first();
		// $manager_perm = Permission::where('slug','edit-users')->first();

		$moderator = new User();
		$moderator->name = 'Mod';
		$moderator->email = 'mod@myforum.com';
		$moderator->password = bcrypt('secrettt');
		$moderator->save();
		$moderator->roles()->attach($mod_role);
		$moderator->permissions()->attach($mod_perm);

		// $manager = new User();
		// $manager->name = 'Hafizul Islam';
		// $manager->email = 'hafiz@gmail.com';
		// $manager->password = bcrypt('secrettt');
		// $manager->save();
		// $manager->roles()->attach($manager_role);
		// $manager->permissions()->attach($manager_perm);
    }
}
