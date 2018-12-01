<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model {

	use SoftDeletes;
   
    protected $fillable = [
        'username', 
        'password', 
        'email'
	];
}
