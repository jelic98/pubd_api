<?php 
	
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder {

	public function run() {
		DB::table('companies')->delete();
		DB::table('companies')->insert([
			[
				'name' => 'Company 1',
				'domain' => 'company1.io',
				'plan' => '1',
				'owner' => '1',
			],
			[
				'name' => 'Company 2',
				'domain' => 'www.company2.org',
				'plan' => '2',
				'owner' => '2',
			],
			[
				'name' => 'Company 3',
				'domain' => 'app.company3.com',
				'plan' => '3',
				'owner' => '1',
			]

		]);
    }
}
?>
