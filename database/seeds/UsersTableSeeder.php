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

    	
    	$role_super = Role::where('name', 'Super User')->first();		
	 	$super = new User();
		$super->first_name = 'Craven';
		$super->last_name = 'Delos Santos';
		$super->email = 'delossantoscraven@gmail.com';
    	$super->password = bcrypt('craven');
		$super->save();
		$super->roles()->attach($role_super);
		


		$role_super = Role::where('name', 'Super User')->first();		
	 	$super = new User();
		$super->first_name = 'Elmar';
		$super->last_name = 'Anchuelo';
		$super->email = 'ejanchuelo@gmail.com';
    	$super->password = bcrypt('elmar');
		$super->save();
		$super->roles()->attach($role_super);
		
	}
}
