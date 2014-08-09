<?php

class Helper extends Eloquent {

	public static function toSelect($collection, $key = null, $default = null)
	{
		$return = [];

		if( $default )
		{
			$return[''] = $default;
		}

		$key = $key ? $key : 'name';

		if( $collection->isEmpty() ) return false;

		foreach( $collection as $item )
		{
			$return[$item->id] = $item->$key;
		}

		return $return;
	}

}
