<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name','admin')->first();
        $role_user = Role::where('name','standard')->first();

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'ramijames@gmail.com';
        $admin->password = bcrypt('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $standard = new User();
        $standard->name = 'First User';
        $standard->email = 'firstuser@gmail.com';
        $standard->password = bcrypt('secret');
        $standard->save();
        $standard->roles()->attach($role_user);
    }
}
