<?php 
	
use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder {

	public function run() {
		DB::table('currencies')->delete();
		DB::table('currencies')->insert([
			['name' => 'US Dollar', 'code' => 'USD'],
			['name' => 'Euro', 'code' => 'EUR'],
			['name' => 'Serbian Dinar', 'code' => 'RSD']
		]);
    }
}
?>
