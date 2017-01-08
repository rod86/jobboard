<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
	public function job()
	{
		return $this->belongsTo('App\Models\Job');
	}
}
