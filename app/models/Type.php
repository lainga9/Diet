<?php

class Type extends \Eloquent {
	protected $guarded = [];

	public function foods()
	{
		return $this->hasMany('Food');
	}
}