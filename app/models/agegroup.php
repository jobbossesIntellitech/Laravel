<?php

namespace App\Models;

class Agegroup extends \Eloquent {

	protected $table = 'agegroups';

	public function author()
	{
		return $this->belongsTo('App\Models\User', 'user_id');
	}

}

