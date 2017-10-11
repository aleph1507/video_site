@if (Session::has('success'))
	
	<div class="alert alert-success" style="position:relative; z-index:5; margin-top:5%;" role="alert">
		<strong>Success:</strong> {{ Session::get('success') }}
	</div>

@endif

@if (count($errors) > 0)

	<div class="alert alert-danger" style="position:relative; z-index:5; margin-top:5%;" role="alert">
		<strong>Errors:</strong>
		<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach  
		</ul>
	</div>

@endif