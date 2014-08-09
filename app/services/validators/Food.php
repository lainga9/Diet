<?php namespace Services\Validators;

class Food extends Validator {

	public static $messages = [];

	public static $rules = array(
		'name' => 'required',
		'protein' => 'required|numeric',
		'carbs' => 'required|numeric',
		'fat' => 'required|numeric',
		'calories' => 'required|numeric',
		'type_id' => 'required'
	);

}