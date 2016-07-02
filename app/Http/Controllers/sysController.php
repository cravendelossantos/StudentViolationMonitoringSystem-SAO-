<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class sysController extends Controller {

    public function showIndex()
    {
        return view('index');
    }
	
}