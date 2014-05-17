<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeColumns extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// dit is zeer nasty maar de beste manier om te zoeken
        Schema::table("houses", function(Blueprint $blueprint) {
            $blueprint->boolean("book_store");
            $blueprint->boolean("library");
            $blueprint->boolean("parking");
            $blueprint->boolean("car_repair");
            $blueprint->boolean("car_wash");
            $blueprint->boolean("gas_station");
            $blueprint->boolean("car_dealer");
            $blueprint->boolean("night_club");
            $blueprint->boolean("bar");
            $blueprint->boolean("cafe");
            $blueprint->boolean("shopping_mall");
            $blueprint->boolean("store");
            $blueprint->boolean("shoe_store");
            $blueprint->boolean("dentist");
            $blueprint->boolean("hospital");
            $blueprint->boolean("doctor");
            $blueprint->boolean("pet_store");
            $blueprint->boolean("zoo");
            $blueprint->boolean("veterinary_care");
            $blueprint->boolean("meal_delivery");
            $blueprint->boolean("meal_takeaway");
            $blueprint->boolean("taxi_stand");
            $blueprint->boolean("train_station");
            $blueprint->boolean("bus_station");
            $blueprint->boolean("university");

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table("houses", function(Blueprint $blueprint) {
            $blueprint->dropColumn("book_store");
            $blueprint->dropColumn("library");
            $blueprint->dropColumn("parking");
            $blueprint->dropColumn("car_repair");
            $blueprint->dropColumn("car_wash");
            $blueprint->dropColumn("gas_station");
            $blueprint->dropColumn("car_dealer");
            $blueprint->dropColumn("night_club");
            $blueprint->dropColumn("bar");
            $blueprint->dropColumn("cafe");
            $blueprint->dropColumn("shopping_mall");
            $blueprint->dropColumn("store");
            $blueprint->dropColumn("shoe_store");
            $blueprint->dropColumn("dentist");
            $blueprint->dropColumn("hospital");
            $blueprint->dropColumn("doctor");
            $blueprint->dropColumn("pet_store");
            $blueprint->dropColumn("zoo");
            $blueprint->dropColumn("veterinary_care");
            $blueprint->dropColumn("meal_delivery");
            $blueprint->dropColumn("meal_takeaway");
            $blueprint->dropColumn("taxi_stand");
            $blueprint->dropColumn("train_station");
            $blueprint->dropColumn("bus_station");
            $blueprint->dropColumn("university");
        });
	}

}
