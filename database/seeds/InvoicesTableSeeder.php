<?php 
	
use Illuminate\Database\Seeder;

class InvoicesTableSeeder extends Seeder {

	public function run() {
		DB::table('invoices')->delete();
		DB::table('invoices')->insert([
			[
				'amount' => 99.99,
				'base' => 40.0,
				'places' => 5,
				'sessions' => 10000,
				'paid' => 1,
				'company' => 1,
				'currency' => 1
			],
			[
				'amount' => 150.0,
				'base' => 40.0,
				'places' => 10,
				'sessions' => 30000,
				'paid' => 0,
				'company' => 1,
				'currency' => 1
			],
			[
				'amount' => 200.5,
				'base' => 40.0,
				'places' => 15,
				'sessions' => 50000,
				'paid' => 0,
				'company' => 3,
				'currency' => 2
			]
		]);
    }
}
?>
