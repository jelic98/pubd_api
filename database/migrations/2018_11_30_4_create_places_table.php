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
			$table->string('image')->nullable();
	
			$table->integer('company')->unsigned();
			$table->foreign('company')->references('id')->on('companies');
			
			$table->softDeletes();
			$table->timestamps();
        });
    }

    public function down() {
        Schema::drop('places');
    }
}
