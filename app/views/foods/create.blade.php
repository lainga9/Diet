@section('title', 'Add Food Item')

@section('content')

	{{ Form::open(['route' => 'foods.store']) }}

		<div>Name</div>
		<p>{{ Form::text('name', Input::old('name')) }}</p>

		<div>Type</div>
		<p>{{ Form::select('type_id', Helper::toSelect($types), Input::old('type_id')) }}</p>

		@if( !$types->isEmpty() )

			@foreach( $types as $type )

				<div>{{ $type->name }}</div>
				<p>{{ Form::text(strtolower($type->name), Input::old(strtolower($type->name))) }}</p>

			@endforeach

		@endif

		<div>Calories</div>
		<p>{{ Form::text('calories', Input::old('calories')) }}</p>

		<button type="submit" class="btn btn-info">Add Food Item</button>

	{{ Form::close() }}

@stop