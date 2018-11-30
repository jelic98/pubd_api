<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration {

    public function up() {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
	
			$table->string('name');
			$table->string('domain');
			$table->string('username');
			$table->string('password', 128);
			$table->string('email');
			$table->string('phone');

			$table->dateTime('date_created');
			$table->dateTime('date_deleted');

			$table->integer('plan')->unsigned()->nullable();
			$table->foreign('plan')->references('id')->on('plans');
			
			$table->boolean('overflowBlock')->default(0);
			$table->boolean('paymentBlock')->default(0);
			$table->boolean('paymentAlert')->default(0);
			
			$table->softDeletes();
        });
    }

    public function down() {
        Schema::drop('companies');
    }
}