<?php

use Illuminate\Database\Seeder;
use App\Content;


class ContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$login_page = new Content();
    	$login_page->page = "Login";
    	$login_page->value = "Login Page";
    	$login_page->save();

    	$home_page = new Content();
    	$home_page->page = "Home";
    	$home_page->value = "Welcome to Student Affairs Office Home Page!";
    	$home_page->save();
			
	}
}
