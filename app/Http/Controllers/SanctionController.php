<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SanctionController extends Controller
{
    public function showSanctions()
    {
    	return view('sanction_monitoring');
    }
}
