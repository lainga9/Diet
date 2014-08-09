<?php

class FoodsTableSeeder extends Seeder {

	public function run()
	{
		$food = Food::create([
			'name' => 'M&S Mexican Sliced Chicken',
			'protein' => 25.9,
			'carbs' => 0.8,
			'sugars' => 0.4,
			'fat' => 2.6,
			'calories' => 130,
			'type_id' => 1
		]);
	}

}