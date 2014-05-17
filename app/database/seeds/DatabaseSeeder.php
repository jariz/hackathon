<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		 $this->call('HousesSeeder');
        $this->call('TypesSeeder');
        $this->call('CompaniesSeeder');
//		 $this->call('CompanyTypesSeeder');
	}

}
