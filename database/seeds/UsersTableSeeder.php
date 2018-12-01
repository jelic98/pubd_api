<?php 
	
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

	public function run() {
		DB::table('currencies')->delete();
		DB::table('currencies')->insert([
			[
				'username' => 'test',
				'password' => 'test123',
				'email' => 'test@test.com'
			],
			[
				'username' => 'johndoe',
				'password' => 'johndoe321',
				'email' => 'johndoe@mail.com'
			]
		]);
    }
}
?>
