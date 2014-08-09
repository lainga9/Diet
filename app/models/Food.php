<?php

class Food extends \Eloquent {
	protected $guarded = [];

	public function type()
	{
		return $this->belongsTo('Type');
	}

	public function days()
	{
		return $this->belongsToMany('Day');
	}

	public function servings()
	{
		return $this->hasMany('Serving');
	}

	public function insert($input, $validation)
	{
		if( !$validation->passes() )
		{
			return $validation->errors;
		}

		$food = $this->create($input);

		return $food;
	}
}