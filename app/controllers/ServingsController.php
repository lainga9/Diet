<?php

class ServingsController extends \BaseController {

	protected $layout = 'layouts.main';
	protected $serving;
	protected $food;
	protected $validator;

	public function __construct(Serving $serving, Food $food, Services\Validators\Serving $validator)
	{
		$this->serving 		= $serving;
		$this->food 		= $food;
		$this->validator 	= $validator;
	}

	/**
	 * Display a listing of the resource.
	 * GET /servings
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /servings/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$foods = $this->food->all();
		$this->layout->content = View::make('servings.create', compact('foods'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /servings
	 *
	 * @return Response
	 */
	public function store()
	{
		if( !$this->validator->passes() )
		{
			return Redirect::back()->withInput()->withErrors($this->validator->errors);
		}
		
		$serving = $this->serving->create(Input::all());

		return Redirect::back()
		->with('success', 'Serving size added successfully');
	}

	/**
	 * Display the specified resource.
	 * GET /servings/{id}
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
	 * GET /servings/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /servings/{id}
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
	 * DELETE /servings/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}