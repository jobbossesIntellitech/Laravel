<?php

namespace App\Models;

class Skill extends \Eloquent {

	protected $table = 'skills';

	public function author()
	{
		return $this->belongsTo('App\Models\User', 'user_id');
	}

}

