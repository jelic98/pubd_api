<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model {

    protected $fillable = [
		'hash',
		'requests',
		'finished'
	];

	protected $dates = ['date_started', 'date_finished'];

	public function company() {
		return $this->belongsTo('App\Company');
	}

	public function place() {
		return $this->belongsTo('App\Place');
	}
}
