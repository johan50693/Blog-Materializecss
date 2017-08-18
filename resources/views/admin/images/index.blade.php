@extends('admin.templates.main')

@section('title', 'Lista de Imagenes')

@section('content')

	
	@foreach($images as $image)
    	<div class="col s6">
			<div class="card large">
			    <div class="card-image waves-effect waves-block waves-light">
			      <img class="activator" src="{{ asset('img/articles/'.$image->name )}}">
			    </div>
			    <div class="card-content">
			      <span class="card-title activator grey-text text-darken-4">{{ $image->article->title }}<i class="material-icons right">more_vert</i></span>
			    </div>   
			</div>
		</div>
    @endforeach		
	
<div class="col s12 center">
		{{ $images->links() }}
</div>

@endsection


