@if( !$foodEntries->isEmpty() )

	<table>
		<tr>
			<th>Serving Size</th>
			<th>Name</th>
			<th>Type</th>
			<th>Protein</th>
			<th>Carbs</th>
			<th>Fat</th>
			<th>Calories</th>
			<th>Notes</th>
			<th>Quantity</th>
		</tr>
		@foreach( $foodEntries as $foodEntry )
			<?php $serving = $foodEntry->serving ? $foodEntry->serving->size : 1; ?>
			<tr>
				<td>{{ $foodEntry->serving->name }} ({{ $foodEntry->serving->size * 100 }}g)</td>
				<td>{{ $foodEntry->food->name }}</td>
				<td>{{ $foodEntry->food->type->name }}</td>
				@if( !$types->isEmpty() )
					@foreach( $types as $type )
						<?php $name = strtolower($type->name); ?>
						<td>{{ $foodEntry->quantity * $foodEntry->food->$name * $serving }}</td>
					@endforeach
				@endif
				<td>{{ $foodEntry->quantity * $foodEntry->food->calories * $serving }}</td>
				<td>{{ $foodEntry->notes }}</td>
				<td>
					{{ Form::open([
						'route' => [
							'foodEntries.update',
							$foodEntry->id
						],
						'method' => 'PUT'
					]) }}
						{{ Form::text('quantity', $foodEntry->quantity) }}
						<button type="submit">Update</button>
					{{ Form::close() }}
				</td>
			</tr>
		@endforeach
	</table>

@else

	<div class="alert alert-info">
		No Items
	</div>

@endif