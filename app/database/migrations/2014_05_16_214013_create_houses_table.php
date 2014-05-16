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
            $table->string('photo');
            $table->string('price_sort');
            $table->string('house_id');
            $table->integer('price');
            $table->string('lat');
            $table->string('lng');
            $table->string('url');
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
