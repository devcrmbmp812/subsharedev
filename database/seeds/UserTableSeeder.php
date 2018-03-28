<?php
use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    $role_admin = Role::where('name', 'Admin')->first();
		$role_user  = Role::where('name', 'User')->first();

		// create admin.
		$admin = new User();
    $admin->first_name = 'Administrator';
    $admin->last_name = '123';
    $admin->image = '';
		$admin->email = 'admin@admin.com';
		$admin->password = bcrypt('secret');
		$admin->save();
		$admin->roles()->attach($role_admin);

		// create normal user.
		$user = new User();
    $user->first_name = 'User first name';
    $user->last_name = 'User last name';
    $user->image = '';
		$user->email = 'user@user.com';
		$user->password = bcrypt('secret');
		$user->save();
		$user->roles()->attach($role_user);
    }
}
