<?php 
	
use Illuminate\Database\Seeder;

class SessionsTableSeeder extends Seeder {

	public function run() {
		DB::table('sessions')->delete();
		DB::table('sessions')->insert([
			[
				'hash' => '9dwvaaUukRt6OklLqUdGAHe54vj8Yj1n',
				'requests' => '10',
				'finished' => 'true',
				'comapany' => '1',
				'place' => '1'
			],
			[
				'hash' => 'H3Is5DuJMViqC0EHMoacT825lVTizFws',
				'requests' => '13',
				'finished' => 'true',
				'comapany' => '1',
				'place' => '2'
			],
			[
				'hash' => '4lTmxCjcZ4blyMfb1vGWP6HGjxLZ28Fe',
				'requests' => '123',
				'finished' => 'false',
				'comapany' => '1'
			],
			[
				'hash' => 'jRbnwv0wWUlxFsUxJaRNN3YYl0RwhnSB',
				'requests' => '53',
				'finished' => 'true',
				'comapany' => '2',
				'place' => '3'
			],
			[
				'hash' => 'u6qZb6qMGYAcHwniTIQyDJCk4uPOhdO3',
				'requests' => '25',
				'finished' => 'false',
				'comapany' => '2'
			]
		);
    }
}
?>
