<?php 
	
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder {

	public function run() {
		DB::table('plans')->delete();
		DB::table('plans')->insert([
			[
				'base' => 40.0,
				'sessions_limit' => 10000,
				'places_limit' => 10,
				'currency' => 1,
				'allow_overflow' => 1
			],
			[
				'base' => 40.0,
				'sessions_limit' => 30000,
				'places_limit' => 15,
				'currency' => 2,
				'allow_overflow' => 1
			],
			[
				'base' => 40.0,
				'sessions_limit' => 40000,
				'places_limit' => 20,
				'currency' => 1,
				'allow_overflow' => 0
			]
		]);
    }
}
?>
