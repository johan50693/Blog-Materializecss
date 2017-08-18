@extends('admin.templates.main')

@section('title','Crear Tag')

@section('content')

<div class="col s12 ">
	<div class="nav-wrapper blue">
	  <form method="GET" action="{{ route('tags.index') }}">
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
		<a href="{{ route('tags.create') }}" class="waves-effect waves-light btn boton-registro" >Crear Tag</a>
	</div>
	<div class="col s12">
					<table class="centered">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nombre</th>
								<th>Acción</th>
							</tr>
						</thead>
						<tbody>
					
							@foreach($tags as $tag)
								<tr>
									<td>{{ $tag->id }}</td>
									<td>{{ $tag->name }}</td>
									<td>
										<a class="waves-effect waves-light btn orange darken-4" href="{{ route('tags.edit',$tag->id) }}">
											<i class="material-icons">mode_edit</i>
										</a>
										<a onclick="return confirm('¿Desea eliminar este elemento?')" class="waves-effect waves-light btn red darken-4" href="{{ route('admin.tags.destroy',$tag->id) }}">
											<i class="material-icons">delete</i>
										</a>
									</td>
								</tr>	
							@endforeach
						</tbody>
					</table>
	</div>	

	<div class="col s12 center">
			{{ $tags->links() }}
	</div>


@endsection

