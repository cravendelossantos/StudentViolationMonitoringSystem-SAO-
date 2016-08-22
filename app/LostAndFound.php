<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class LostAndFound extends Model
{
	protected $fillable = ['item_description','endorser_name','founded_at','owner_name'];
    public function users()
	{
		return $this->belongsTo('App\User');
	}
}
