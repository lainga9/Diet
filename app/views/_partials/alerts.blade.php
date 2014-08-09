@if( Session::has('error') || Session::has('success') || Session::has('info') )

	@if( $error = Session::get('error') )

		<div class="alert alert-danger">{{ $error }}</div>

	@endif

	@if( $success = Session::get('success') )

		<div class="alert alert-success">{{ $success }}</div>

	@endif

	@if( $info = Session::get('info') )

		<div class="alert alert-info">{{ $info }}</div>

	@endif

@endif