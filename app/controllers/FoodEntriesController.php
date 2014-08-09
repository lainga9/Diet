<?php

class FoodEntriesController extends \BaseController {

	protected $layout = 'layouts.main';
	protected $foodEntry;
	protected $day;
	protected $validator;

	public function __construct(FoodEntry $foodEntry, Day $day, Services\Validators\FoodEntry $validator)
	{
		$this->foodEntry 	= $foodEntry;
		$this->day 			= $day;
		$this->validator	= $validator;
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /foods
	 *
	 * @return Response
	 */
	public function store()
	{
		if( !$this->validator->passes() )
		{
			return Redirect::back()->withInput()->withErrors($this->validator->errors);
		}
		
		$foodEntry = $this->foodEntry->create(Input::all());

		return Redirect::back()
		->with('success', 'Entry added successfully');
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
		$foodEntry = $this->foodEntry->find($id);
		$foodEntry = $foodEntry->update(Input::all());

		return Redirect::back()
		->with(
			'success',
			'Quantity successfully updated'
		);
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

}