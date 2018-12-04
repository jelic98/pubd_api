<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration {

    public function up() {
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id');

			$table->float('base', 8, 2)->unsigned();
			$table->bigInteger('sessions_limit')->unsigned();
			$table->bigInteger('places_limit')->unsigned();

			$table->integer('currency')->unsigned();
			$table->foreign('currency')->references('id')->on('currencies');
			
			$table->boolean('allow_overflow')->default(0);
        });
    }

    public function down() {
        Schema::drop('plans');
    }
}
