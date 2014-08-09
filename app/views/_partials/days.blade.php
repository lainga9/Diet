@if( !$days->isEmpty() )

	@foreach( $days as $day )

		<h4>{{ $day->date }} - <a href="{{ URL::route('days.edit', $day->id) }}">edit</a></h4>

		@include('_partials.totals', compact('day'))

		<hr>

	@endforeach

@else

	<div class="alert alert-info">No Days</div>

@endif