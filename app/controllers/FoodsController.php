<?php

class FoodsController extends \BaseController {

	protected $layout = 'layouts.main';
	protected $food;
	protected $type;
	protected $validator;

	public function __construct(Food $food, Type $type, Services\Validators\Food $validator)
	{
		$this->food 		= $food;
		$this->type 		= $type;
		$this->validator 	= $validator;
	}

	/**
	 * Display a listing of the resource.
	 * GET /foods
	 *
	 * @return Response
	 */
	public function index()
	{
		$types = $this->type->all();
		$this->layout->content = View::make('foods.index', compact('types'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /foods/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$types = $this->type->all();
		$this->layout->content = View::make('foods.create', compact('types'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /foods
	 *
	 * @return Response
	 */
	public function store()
	{
		$food = $this->food->insert(Input::all(), $this->validator);

		if(get_class($food) == 'Illuminate\Support\MessageBag')
		{
			return Redirect::back()->withInput()->withErrors($food);
		}

		return Redirect::route('foods.index')
		->with('success', 'Item added successfully');
	}

	/**
	 * Display the specified resource.
	 * GET /foods/{id}
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
	 * GET /foods/{id}/edit
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
	 * PUT /foods/{id}
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
	 * DELETE /foods/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function apiServings($id)
	{
		$food = $this->food->find($id);

		return $food->servings;
	}

}