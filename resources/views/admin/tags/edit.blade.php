
@extends('admin.templates.main')

@section('title', 'Editar Tag')

@section('content')

<div class="row" id="login">
			
			<form class="col s5 offset-s3" method="POST" action="{{ route('tags.update',$tag) }}">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
			 	
			 	<div class="row formato-login">
				    <div class="input-field col s12">
				      <i class="material-icons prefix">account_circle</i>
				      <input id="name" name="name" type="text" class="validate" value="{{ $tag->name }}" required>
				      <label for="name">Nombre</label>
				    </div>
				</div>   
			 
			    <div class="row ">
					<div class="input-field col s12 center">
						<button class="btn waves-effect waves-brown white black-text" type="submit">
							Modificar
						</button>
					</div>
				</div>
							   
			 
			</form>
</div>	

@endsection