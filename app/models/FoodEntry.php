<?php

class FoodEntry extends \Eloquent {
	protected $guarded = [];

	public function Food()
	{
		return $this->belongsTo('Food');
	}

	public function Serving()
	{
		return $this->belongsTo('Serving');
	}
}