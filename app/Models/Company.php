<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
	public $table = 'companies';

    public $timestamps = false;

	protected $fillable = ['name', 'email', 'password'];

	protected $hidden = ['password', 'remember_token'];

	public function jobs()
	{
		return $this->hasMany('App\Models\Job');
	}

	public function industry()
	{
		return $this->belongsTo('App\Models\CompanyIndustry', 'company_industry_id');
	}

	public function size()
	{
		return $this->belongsTo('App\Models\CompanySize', 'company_size_id');
	}
}
