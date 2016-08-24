<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$role_admin = Role::where('name', 'Admin')->first();		
	 	$admin = new User();
		$admin->first_name = 'Craven';
		$admin->last_name = 'Delos Santos';
		$admin->email = 'delossantoscraven@gmail.com';
    	$admin->password = bcrypt('craven');
		$admin->save();
		$admin->roles()->attach($role_admin);
		
		$role_secretary = Role::where('name', 'Secretary')->first();		
	 	$secretary = new User();
		$secretary->first_name = 'Elmar';
		$secretary->last_name = 'Anchuelo';
		$secretary->email = 'ejanchuelo@gmail.com';
    	$secretary->password = bcrypt('elmar');
		$secretary->save();
		$secretary->roles()->attach($role_secretary);
		
	}
}
