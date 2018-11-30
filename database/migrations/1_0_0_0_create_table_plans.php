<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePlans extends Migration {

    public function up() {
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id');

			$table->float('base', 8, 2)->unsigned();
			$table->bigInteger('sessionLimit')->unsigned();
			$table->bigInteger('placesLimit')->unsigned();

			$table->integer('currency')->unsigned()->nullable();
			$table->foreign('currency')->references('id')->on('currencies');
			
			$table->boolean('allowOverflow')->default(0);
        });
    }

    public function down() {
        Schema::drop('plans');
    }
}
