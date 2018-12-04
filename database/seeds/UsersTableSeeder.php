<?php 
	
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

	public function run() {
		DB::table('users')->delete();
		DB::table('users')->insert([
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
