@extends('admin.templates.main')

@section('title', 'Lista de Usuarios')

@section('content')

<div class="col s12 ">
	<div class="nav-wrapper blue">
	  <form method="GET" action="{{ route('users.index') }}">
	  	{{ csrf_field() }}

	    <div class="input-field">
	      <input id="search" type="search" name="name" required>
	      <label class="label-icon" for="search"><i class="material-icons">search</i></label>
	      <i class="material-icons">close</i>
	    </div>
	  </form>
	</div>
</div>


<div class="col s12">
	<a href="{{ route('users.create') }}" class="waves-effect waves-light btn boton-registro" >Registrar</a>
</div>
<div class="col s12">
				<table class="centered">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Correo</th>
							<th>Tipo</th>
							<th>Acción</th>
						</tr>
					</thead>
					<tbody>
				
						@foreach($users as $user)
							<tr>
								<td>{{ $user->id }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>
									@if($user->type == 'admin')
										<span class="new badge red darken-4" data-badge-caption="admin"></span>
									@else
										<span class="new badge blue darken-4" data-badge-caption="member"></span>
									@endif
								</td>
								<td>
									<a class="waves-effect waves-light btn orange darken-4" href="{{ route('users.edit',$user->id) }}">
										<i class="material-icons">mode_edit</i>
									</a>
									<a onclick="return confirm('¿Desea eliminar este elemento?')" class="waves-effect waves-light btn red darken-4" href="{{ route('admin.users.destroy', $user->id) }}">
										<i class="material-icons">delete</i>
									</a>
								</td>
							</tr>	
						@endforeach
					</tbody>
				</table>
</div>	

<div class="col s12 center">
		{{ $users->links() }}
</div>

@endsection