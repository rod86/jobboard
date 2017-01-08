<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanySize extends Model
{
	public $timestamps = false;

	public function companies()
	{
		return $this->hasMany('App\Models\Company');
	}
}
