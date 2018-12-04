<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	
    public function run() {
		$this->call('UsersTableSeeder');	
		$this->call('CurrenciesTableSeeder');	
		$this->call('PlansTableSeeder');	
		$this->call('CompaniesTableSeeder');	
		$this->call('PlacesTableSeeder');	
		$this->call('InvoicesTableSeeder');	
		$this->call('AttributesTableSeeder');	
		$this->call('SessionsTableSeeder');	
	}
}

