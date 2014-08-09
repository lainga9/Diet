<?php

class DaysController extends \BaseController {

	protected $layout = 'layouts.main';
	protected $day;
	protected $type;
	protected $food;
	protected $validator;

	public function __construct(Day $day, Services\Validators\Day $validator, Type $type, Food $food)
	{
		$this->day 			= $day;
		$this->type 		= $type;
		$this->food 		= $food;
		$this->validator 	= $validator;
	}

	/**
	 * Display a listing of the resource.
	 * GET /days
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /days/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('days.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /days
	 *
	 * @return Response
	 */
	public function store()
	{
		$day = $this->day->insert(Input::all(), $this->validator);

		if(get_class($day) == 'Illuminate\Support\MessageBag')
		{
			return Redirect::back()->withInput()->withErrors($day);
		}

		return Redirect::route('days.edit', $day->id)
		->with('success', 'Entry added successfully');
	}

	/**
	 * Display the specified resource.
	 * GET /days/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /days/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$day 	= $this->day->find($id);
		$types 	= $this->type->all();
		$foods 	= $this->food->all();

		$data = [
			'day' 	=> $day, 
			'types' => $types,
			'foods' => $foods
		];

		$this->layout->content = View::make('days.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /days/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /days/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}