@section('title', 'All Food Items')

@section('content')

	<h3>All Foods</h3>
	@include('_partials.foods', compact('types'))

	<hr>

	<a href="{{ URL::route('foods.create') }}" class="btn btn-info">Add Food Item</a>

@stop