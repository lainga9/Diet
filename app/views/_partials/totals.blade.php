@if( !$day->foodEntries->isEmpty() )

	<table>
		<tr>
			@if( !$types->isEmpty() )
				@foreach( $types as $type )
					<th>{{ $type->name }}</th>
				@endforeach
			@endif
			<th>Calories</th>
		</tr>
		<tr>
			@if( !$types->isEmpty() )
				@foreach( $types as $type )
					<td>{{ $day->total($type) }}</td>
				@endforeach
			@endif
			<td>{{ $day->calories() }}</td>
		</tr>
		<tr>
			@if( !$types->isEmpty() )
				@foreach( $types as $type )
					<td>{{ $day->percentage($type) }}%</td>
				@endforeach
			@endif
		</tr>
	</table>

@endif