<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model {

    protected $fillable = [
		'hash',
		'requests',
		'finished'
	];

	public function company() {
		return $this->belongsTo('App\Company', 'company');
	}

	public function place() {
		return $this->belongsTo('App\Place', 'place');
	}
}
