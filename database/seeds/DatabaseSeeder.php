<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	
    public function run() {
//		$this->call('UsersTableSeeder');	
		$this->call('CurrenciesTableSeeder');	
//		$this->call('PlansTableSeeder');	
//		$this->call('CompaniesTableSeeder');	
//		$this->call('PlacesTableSeeder');	
//		$this->call('InvicesTableSeeder');	
//		$this->call('AttributesTableSeeder');	
//		$this->call('SessionTableSeeder');	
	}
}

