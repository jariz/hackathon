<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('houses', function($table) {
            $table->increments('id');
            $table->string('adres');
            $table->string('postal_code');
            $table->integer('year');
            $table->integer('living_area');
            $table->integer('plot_area');
            $table->integer('price');
            $table->string('lat');
            $table->string('lng');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('houses');
	}

}
