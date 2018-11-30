<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model {

    protected $fillable = [
		'base',
		'sessionLimit',
		'placesLimit',
		'allowOverflow'
	];

	public function currency() {
		return $this->belongsTo('App\Currency');
	}
}
