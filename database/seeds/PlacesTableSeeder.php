<?php 
	
use Illuminate\Database\Seeder;

class PlacesTableSeeder extends Seeder {

	public function run() {
		DB::table('places')->delete();
		DB::table('places')->insert([
			[
				'name' => 'Cafe',
				'address' => 'Another street 321',
				'company' => 1,
				'url' => 'https://www.google.com/search?q=1'
			],
			[
				'name' => 'Bar',
				'address' => 'Second street 123',
				'company' => 1,
				'url' => 'https://www.google.com/search?q=2'
			],
			[
				'name' => 'Club',
				'address' => 'Main Street 2',
				'company' => 2,
				'url' => 'https://www.google.com/search?q=3'
			]
		]);
    }
}
?>
