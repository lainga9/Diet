<?php namespace Services\Validators;

abstract class Validator {
	
	protected $attributes;
	protected $update;
	protected $customRules;
	public $errors;

	public function __construct($attributes = null, $update = false, $customRules = null) {
		$this->attributes 	= $attributes ?: \Input::all();
		$this->update 		= $update ? true : false;
		$this->customRules 	= $customRules ?: null;
	}

	public function passes() {
		if($this->update)
		{
			$validation = \Validator::make($this->attributes, static::$updateRules, static::$messages);
		}
		else
		{
			$validation = \Validator::make($this->attributes, static::$rules, static::$messages);
		}

		if($this->customRules)
		{
			$validation = \Validator::make($this->attributes, $this->customRules, static::$messages);
		}

		if($validation->passes()) return true;
		$this->errors = $validation->messages();
		return false;
	}

}