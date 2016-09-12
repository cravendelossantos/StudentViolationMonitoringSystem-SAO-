<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon\Carbon;

class LostAndFound extends Model
{
	protected $fillable = ['item_description','endorser_name','founded_at','owner_name'];
	
	
    public function user()
	{
		return $this->belongsTo('App\User');
	}

/*	public function getCreatedAtAttribute($date)
	{
    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
	}

	public function getUpdatedAtAttribute($date)
	{
    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
	}*/
}
