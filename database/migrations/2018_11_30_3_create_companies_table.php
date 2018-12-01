<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration {

    public function up() {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
	
			$table->string('name');
			$table->string('domain');

			$table->dateTime('date_created');
			$table->dateTime('date_deleted');

			$table->integer('plan')->unsigned()->nullable();
			$table->foreign('plan')->references('id')->on('plans');

			$table->integer('owner')->unsigned()->nullable();
			$table->foreign('owner')->references('id')->on('users');
			
			$table->boolean('overflow_block')->default(0);
			$table->boolean('payment_block')->default(0);
			$table->boolean('payment_alert')->default(0);
			
			$table->softDeletes();
        });
    }

    public function down() {
        Schema::drop('companies');
    }
}
