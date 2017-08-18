
@extends('admin.templates.main')

@section('title', 'Lista de Articulos')

@section('content')

<div class="col s12 ">
	<div class="nav-wrapper blue">
	  <form method="GET" action="{{ route('articles.index') }}">
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
	<a href="{{ route('articles.create') }}" class="waves-effect waves-light btn boton-registro" >Crear Articulo</a>
</div>

<div class="col s12">
				<table class="centered">
					<thead>
						<tr>
							<th>ID</th>
							<th>Titulo</th>
							<th>Categoria</th>
							<th>User</th>
							<th>Acción</th>
						</tr>
					</thead>
					<tbody>
				
						@foreach($articles as $article)
							<tr>
								<td>{{ $article->id }}</td>
								<td>{{ $article->title }}</td>
								<td>{{ $article->category->name }}</td>
								<td>{{ $article->user->name }}</td>
								<td>
									<a class="waves-effect waves-light btn orange darken-4" href="{{ route('articles.edit',$article->id) }}">
										<i class="material-icons">mode_edit</i>
									</a>
									<a onclick="return confirm('¿Desea eliminar este elemento?')" class="waves-effect waves-light btn red darken-4" href="{{ route('admin.articles.destroy',$article->id) }}">
										<i class="material-icons">delete</i>
									</a>
								</td>
							</tr>	
						@endforeach
					</tbody>
				</table>
</div>	

<div class="col s12 center">
		{{ $articles->links() }}
</div>

@endsection