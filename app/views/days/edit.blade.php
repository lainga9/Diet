@section('title', 'Edit Entry ' . $day->date)

@section('content')

	<h3>{{ $day->date }}</h3>

	@include('_partials.foodEntries', ['foodEntries' => $day->foodEntries])

	@include('_partials.totals', compact('day'))

	<hr>

	<h4>Add Food Entry</h4>
	
	{{ Form::open(['route' => 'foodEntries.store']) }}

		{{ Form::hidden('day_id', $day->id) }}

		<div>Food</div>
		<select name="food_id" class="select-foods">
			<option value="">Select</option>
			@if( !$foods->isEmpty() )
				@foreach( $foods as $food )
					<option value="{{ $food->id }}" data-route="{{ URL::route('api.servings', $food->id) }}">{{ $food->name }}</option>
				@endforeach
			@endif
		</select>

		<div>Serving Size</div>
		<p>{{ Form::select('serving_id', ['' => '100g'], Input::old('serving_id'), ['class' => 'select-servings']) }}</p>

		<div>Quantity</div>
		<p>{{ Form::text('quantity', Input::old('quantity')) }}</p>

		<div>Notes</div>
		<p>{{ Form::textarea('notes', Input::old('notes')) }}</p>

		<button type="submit" class="btn btn-info">Add Entry</button>

	{{ Form::close() }}

	<hr>

	<a href="{{ URL::route('foods.create') }}" class="btn">Add Food Item</a>

@stop

@section('scripts')

	<script>

		jQuery(document).ready(function($) {

			var $servings = (function() {

				var $foods = $('.select-foods'),
					$servings = $('.select-servings'),

				init = function() {
					initEvents();
				},

				initEvents = function() {
					$foods.on('change', function() {
						var $id = $(this).val();
						var $this = $(this);
						$.ajax({
							type: "GET",
							url: $this.find('option:selected').data('route')
						}).done(function(result) {
							$servings.html('<option value="">100g</option>');
							if(result.length > 0) {
								$.each(result, function(i,v) {
									$servings.append('<option value="' + v.id + '">' + v.name + '</option>');
								});
							}
						});
					});
				},

				populate = function() {

				};

				return {init: init};

			})();

			$servings.init();

		});

	</script>

@stop