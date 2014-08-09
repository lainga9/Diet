<?php namespace Services\Validators;

class Serving extends Validator {

	public static $messages = [];

	public static $rules = array(
		'size' => 'required|numeric',
		'food_id' => 'required',
		'name' => 'required'
	);

}