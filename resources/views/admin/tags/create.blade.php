@extends('admin.templates.main')

@section('title','Crear Tag')

@section('content')


<div class="row" id="login">
			
	<form class="col s5 offset-s3" method="POST" action="{{ route('tags.store') }}">
		{{ csrf_field() }}
	 	
	 	<div class="row formato-login">
		    <div class="input-field col s12">
		      <i class="material-icons prefix">perm_media</i>
		      <input id="name" name="name" type="text" class="validate" value="{{ old('name') }}" required>
		      <label for="name">Tag</label>
		    </div>
		</div>   

	    <div class="row ">
			<div class="input-field col s12 center">
				<button class="btn waves-effect waves-brown white black-text" type="submit">
					Crear
					<!-- <i class="material-icons right black-text">send</i> -->
				</button>
			</div>
		</div>
					   
	</form>
</div>	

@endsection