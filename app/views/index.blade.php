@section('title', 'Home')

@section('content')

	<h3>Entries</h3>

	@include('_partials.days', compact('days'))

	@include('_partials.actions')
	
@stop