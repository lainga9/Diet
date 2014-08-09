<?php

class HomeController extends BaseController {

	protected $layout = 'layouts.main';
	protected $food;
	protected $type;
	protected $day;

	public function __construct(Food $food, Type $type, Day $day)
	{
		$this->food = $food;
		$this->type = $type;
		$this->day 	= $day;
	}

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		$types 	= $this->type->all();
		$days 	= $this->day->orderBy('date', 'ASC')->get();

		$data = [
			'types'	=> $types,
			'days'	=> $days
		];

		$this->layout->content = View::make('index', $data);
	}

}
