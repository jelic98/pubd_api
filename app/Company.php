<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model {

	use SoftDeletes;
   
    protected $fillable = [
        'name', 
		'domain',
		'plan',
		'overflow_block',
		'payment_block',
		'payment_alert'
	];

	public function plan() {
		return $this->belongsTo('App\Plan');
	}

	public function owner() {
		return $this->belongsTo('App\User');
	}
}
