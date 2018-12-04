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
		return $this->belongsTo('App\Currency', 'currency');
	}

	public static function create(array $attributes = []) {
		// TODO Extract base plan as a constant
		$basePlan = [
			'base' => 50,
			'currency' => 1,
			'session_limit' => 1000,
			'places_limit' => 5,
			'allow_overflow' => 0
		];

    	return static::query()->create($basePlan);
	}
}
