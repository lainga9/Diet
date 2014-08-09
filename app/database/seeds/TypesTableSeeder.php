<?php

class TypesTableSeeder extends Seeder {

	public function run()
	{
		$type = Type::create([
			'name'	 	=> 'Protein',
			'factor' 	=> 4
		]);

		$type = Type::create([
			'name' 		=> 'Carbs',
			'factor'	=> 4
		]);

		$type = Type::create([
			'name' 		=> 'Fat',
			'factor' 	=> 9
		]);
	}

}