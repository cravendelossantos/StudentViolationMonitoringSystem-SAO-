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
            
        $role_super = new Role();
        $role_super->name = 'Super User';
        $role_super->description = 'Power User';
        $role_super->save();

        $role_admin = new Role();
		$role_admin->name = 'Admin';
		$role_admin->description = 'Administrator';
		$role_admin->save();
		
		$role_secretary = new Role();
		$role_secretary->name = 'Secretary';
		$role_secretary->description = 'Office Secretary';
		$role_secretary->save();


    }
}
