<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
	const TYPE_CONTRACT = 'contract';
	const TYPE_PERMANENT = 'permanent';

	public function company()
	{
		return $this->belongsTo('App\Models\Company');
	}
}
