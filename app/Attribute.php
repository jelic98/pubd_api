<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model {

    protected $fillable = [
		'name',
		'question',
		'parent_value'
	];

	public function parent() {
		return $this->belongsTo('App\Attribute', 'parent');
	}
}
