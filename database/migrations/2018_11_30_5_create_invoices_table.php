<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration {

    public function up() {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
			
			$table->float('amount', 8, 2);
			$table->float('base', 8, 2);
			$table->integer('places');
			$table->integer('sessions');
			$table->boolean('paid');

			$table->dateTime('paid_at')->nullable();
	
			$table->integer('company')->unsigned();
			$table->foreign('company')->references('id')->on('companies');

			$table->integer('currency')->unsigned();
			$table->foreign('currency')->references('id')->on('currencies');
			
			$table->timestamps();
        });
    }

    public function down() {
        Schema::drop('invoices');
    }
}
