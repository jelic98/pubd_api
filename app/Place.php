<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model {

    protected $fillable = [
		'name',
		'address',
		'url',
		'image'
	];

	protected $dates = ['dete_created', 'date_deleted'];
	
	public function company() {
		return $this->belongsTo('App\Company', 'company');
	}
}
