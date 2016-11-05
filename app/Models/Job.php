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

	public static function types()
	{
		return [self::TYPE_CONTRACT, self::TYPE_PERMANENT];
	}
}
