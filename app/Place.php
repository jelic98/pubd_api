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

	public function company() {
		return $this->belongsTo('App\Company');
	}
}
