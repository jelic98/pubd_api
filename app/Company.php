<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model {

	use SoftDeletes;
   
    protected $fillable = [
        'name', 
		'domain',
		'username',
		'password',
		'email',
		'phone',
		'plan',
		'overflowBlock',
		'paymentBlock',
		'paymentAlert'
	];

	protected $dates = ['dete_created', 'date_deleted'];
	
	public function plan() {
		return $this->belongsTo('App\Plan', 'plan');
	}
}
