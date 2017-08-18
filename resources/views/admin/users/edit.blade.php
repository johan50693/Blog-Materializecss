
@extends('admin.templates.main')

@section('title', 'Editar Usuario')

@section('content')

<div class="row" id="login">
			
			<form class="col s5 offset-s3" method="POST" action="{{ route('users.update',$user) }}">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
			 	
			 	<div class="row formato-login">
				    <div class="input-field col s12">
				      <i class="material-icons prefix">account_circle</i>
				      <input id="name" name="name" type="text" class="validate" value="{{ $user->name }}" required>
				      <label for="name">Nombre</label>
				    </div>
				</div>   

				<div class="row formato-login">
				    <div class="input-field col s12">
				      <i class="material-icons prefix">email</i>
				      <input id="email" name="email" type="text" class="validate" value="{{ $user->email }}" required>
				      <label for="email">Correo</label>
				    </div>
				</div>   

			    <div class="row formato-login">
				    <div class="input-field col s12">
				    	<i class="material-icons prefix">supervisor_account</i>
					    <select name="type" >
					    	@if($user->type == 'member')
							    <option selected="true" value="member">Miembro</option>
							    <option value="admin">Administrador</option>
						    @else
								<option value="member">Miembro</option>
							    <option selected="true" value="admin">Administrador</option>
						    @endif
					    </select>
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