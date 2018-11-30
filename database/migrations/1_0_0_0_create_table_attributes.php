<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAttributes extends Migration {

    public function up() {
        Schema::create('attributes', function (Blueprint $table) {
            $table->increments('id');

			$table->string('name');
			$table->string('question');
			$table->boolean('parentValue');

			$table->integer('parent')->unsigned()->nullable();
			$table->foreign('parent')->references('id')->on('attributes');
        });
    }

    public function down() {
        Schema::drop('attributes');
    }
}
