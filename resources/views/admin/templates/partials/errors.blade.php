

@if($errors->any())

	<div class="card red accent-4 card-alert">
		<div class="card-content white-text">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		<button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
	</div>	

@endif