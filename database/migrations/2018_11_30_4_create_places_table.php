<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration {

    public function up() {
        Schema::create('places', function (Blueprint $table) {
            $table->increments('id');
			
			$table->string('name');
			$table->string('address');
			$table->string('url');
			$table->binary('image');
	
			$table->dateTime('date_created');
			$table->dateTime('date_deleted');
			
			$table->integer('company')->unsigned()->nullable();
			$table->foreign('company')->references('id')->on('companies');
			
			$table->softDeletes();
        });
    }

    public function down() {
        Schema::drop('places');
    }
}
