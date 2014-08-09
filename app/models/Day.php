<?php

class Day extends \Eloquent {
	protected $guarded = [];

	public function Foods()
	{
		return $this->hasMany('Food');
	}

	public function FoodEntries()
	{
		return $this->hasMany('FoodEntry');
	}

	public function getDateAttribute($value)
	{
		return date('l d-m-Y', strtotime($value));
	}

	/* Create and store a day model in the database */
	public function insert($input, $validation)
	{
		if( !$validation->passes() )
		{
			return $validation->errors;
		}

		$day = $this->create($input);

		return $day;
	}

	/* Return the total amount of protein for the day */
	public function total($type)
	{
		$total = 0;

		$entries = $this->foodEntries;

		if( !$entries->isEmpty() )
		{
			foreach( $entries as $entry )
			{
				$name = strtolower($type->name);
				$serving = $entry->serving ? $entry->serving->size : 1;
				$total += $entry->food->$name * $entry->quantity * $serving;
			}
		}

		return $total;
	}

	public function calories($type = null)
	{
		$calories = 0;

		if( !$type )
		{
			$entries = $this->foodEntries;

			if( !$entries->isEmpty() )
			{
				foreach( $entries as $entry )
				{
					$serving = $entry->serving ? $entry->serving->size : 1;
					$calories += $entry->food->calories * $entry->quantity * $serving;
				}
			}
		}

		return $calories;
	}

	public function percentage($type)
	{
		$totalCalories = $this->calories();

		$totalType = $this->total($type) * $type->factor;

		return intval( $totalType / $totalCalories * 100 );
	}
}