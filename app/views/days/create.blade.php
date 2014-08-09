@section('title', 'Add Day')

@section('content')

	{{ Form::open(['route' => 'days.store']) }}

		<div>Date</div>
		<p>{{ Form::text('date', Input::old('date'), ['class' => 'datepicker']) }}</p>

		<button type="submit" class="btn btn-info">Add Day</button>

	{{ Form::close() }}

@stop