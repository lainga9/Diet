@section('title', 'Add Serving Size')

@section('content')

	{{ Form::open(['route' => 'servings.store']) }}

		<div>Food Item</div>
		<p>{{ Form::select('food_id', Helper::toSelect($foods), Input::get('food_id')) }}</p>

		<div>Name</div>
		<p>{{ Form::text('name', Input::old('name')) }}</p>

		<div>Serving Size</div>
		<p>{{ Form::text('size', Input::old('size')) }}</p>

		<button type="submit" class="btn btn-info">Add Serving Size</button>

	{{ Form::close() }}

@stop