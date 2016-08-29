<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;

class Course extends Model
{
    public function students()
    {
    	return $this->hasOne('App\Student');
    }
}
