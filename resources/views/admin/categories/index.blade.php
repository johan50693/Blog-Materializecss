@extends('admin.templates.main')

@section('title', 'Lista de Categorias')

@section('content')

<div class="col s12 ">
	<div class="nav-wrapper blue">
	  <form method="GET" action="{{ route('categories.index') }}">
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
	<a href="{{ route('categories.create') }}" class="waves-effect waves-light btn boton-registro" >Crear Categoria</a>
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
				
						@foreach($categories as $category)
							<tr>
								<td>{{ $category->id }}</td>
								<td>{{ $category->name }}</td>
								<td>
									<a class="waves-effect waves-light btn orange darken-4" href="{{ route('categories.edit',$category->id) }}">
										<i class="material-icons">mode_edit</i>
									</a>
									<a onclick="return confirm('¿Desea eliminar este elemento?')" class="waves-effect waves-light btn red darken-4" href="{{ route('admin.categories.destroy',$category->id) }}">
										<i class="material-icons">delete</i>
									</a>
								</td>
							</tr>	
						@endforeach
					</tbody>
				</table>
</div>	

<div class="col s12 center">
		{{ $categories->links() }}
</div>

@endsection