@if( !$types->isEmpty() )

	@foreach( $types as $type )

		<h4>{{ $type->name }}</h4>

		@if( !$type->foods->isEmpty() )

			<table>
				<tr>
					<th>Name</th>
					<th>Type</th>
					<th>Protein</th>
					<th>Carbs</th>
					<th>Sugars</th>
					<th>Fat</th>
					<th>Calories</th>
					<th></th>
				</tr>
				@foreach( $type->foods as $food )
					<tr>
						<td>{{ $food->name }}</td>
						<td>{{ $food->type->name }}</td>
						<td>{{ $food->protein }}</td>
						<td>{{ $food->carbs }}</td>
						<td>{{ $food->sugars }}</td>
						<td>{{ $food->fat }}</td>
						<td>{{ $food->calories }}</td>
						<td><a href="{{ URL::route('servings.create', ['food_id' => $food->id]) }}">Add Serving Size</a></td>
					</tr>
				@endforeach
			</table>

		@else

			<div class="alert alert-info">
				No Items
			</div>

		@endif

	@endforeach

@endif