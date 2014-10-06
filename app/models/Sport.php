<?php

namespace App\Models;

class Sport extends \Eloquent {

	protected $table = 'sports';

	public function author()
	{
		return $this->belongsTo('App\Models\User', 'user_id');
	}

}

