<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CurrenciesTablePlans extends Migration {

    public function up() {
        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');

			$table->string('code', 3)->unique();
			$table->string('name');
        });
    }

    public function down() {
        Schema::drop('currencies');
    }
}
