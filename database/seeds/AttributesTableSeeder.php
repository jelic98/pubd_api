<?php 
	
use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder {

	public function run() {
		DB::table('attributes')->delete();
		DB::table('attributes')->insert([
			[
				'name' => 'Attribute 1',
				'question' => 'Question for attribute one?',
				'parent' => null,
				'parent_value' => null
			],
			[
				'name' => 'Attribute 2',
				'question' => 'Question for attribute two?',
				'parent' => 1,
				'parent_value' => 1
			],
			[
				'name' => 'Attribute 3',
				'question' => 'Question for attribute three?',
				'parent' => null,
				'parent_value' => null
			],
			[
				'name' => 'Attribute 4',
				'question' => 'Question for attribute four?',
				'parent' => null,
				'parent_value' => null
			],
			[
				'name' => 'Attribute 5',
				'question' => 'Question for attribute five?',
				'parent' => 1,
				'parent_value' => 1
			],
			[
				'name' => 'Attribute 6',
				'question' => 'Question for attribute six?',
				'parent' => null,
				'parent_value' => null
			]
		]);
    }
}
?>
