<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model {

    protected $fillable = [
		'amount',
		'base',
		'places',
		'sessions',
		'paid'
	];

	public function company() {
		return $this->belongsTo('App\Company', 'company');
	}

	public function corrency() {
		return $this->belongsTo('App\Currency', 'currency');
	}
}
