<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\YearLevel;
use App\Course;

class Student extends Model
{
	public function courses()
 	{
    return $this->hasOne('App\Course');
	}
}
	