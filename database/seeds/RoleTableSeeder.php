<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // We want admins to have role id of 1
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'Admin for WeeklyPixels';
        $role_admin->save();

        // We want users to have role id of 2
        $role_standard = new Role();
        $role_standard->name = 'standard';
        $role_standard->description = 'General WeeklyPixels User';
        $role_standard->save();
    }
}
