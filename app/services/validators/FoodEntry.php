<?php namespace Services\Validators;

class FoodEntry extends Validator {

	public static $messages = [];

	public static $rules = array(
		'quantity' => 'required|numeric',
		'day_id' => 'required',
		'food_id' => 'required'
	);

}