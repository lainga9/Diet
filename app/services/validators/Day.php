<?php namespace Services\Validators;

class Day extends Validator {

	public static $messages = [];

	public static $rules = array(
		'date' => 'required',
	);

}