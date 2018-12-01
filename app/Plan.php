<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model {

    protected $fillable = [
		'base',
		'sessions_limit',
		'places_limit',
		'allow_overflow'
	];

	public function currency() {
		return $this->belongsTo('App\Currency');
	}
}
