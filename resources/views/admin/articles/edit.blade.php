
@extends('admin.templates.main')

@section('title', 'Editar Articulo')

@section('content')

<div class="row" id="login">
			
	<form class="col s5 offset-s3" method="POST" action="{{ route('articles.update',$article) }}" files="true" enctype="multipart/form-data">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
	 	
	 	<div class="row formato-login">
		    <div class="input-field col s12">
		      <i class="material-icons prefix">perm_media</i>
		      <input id="title" name="title" type="text" class="validate" value="{{ $article->title }}" required>
		      <label for="title">Titulo</label>
		    </div>
		</div>   

		<div class="row formato-login">
		    <div class="input-field col s12">
		    	<i class="material-icons prefix">supervisor_account</i>
			    <select name="category_id" required>
				    <option value="{{ $article->category->id }}" selected="true">{{ $article->category->name }}</option>
				    @foreach($categories as $category)
				    	@if($article->category->name != $category->name)
					    	<option value="{{ $category->id }}">{{ $category->name }}</option>
					    @endif
					@endforeach
			    </select>
		    </div>
		</div>  

		<div class="row formato-login">
		    <div class="input-field col s12">
		      <i class="material-icons prefix">perm_media</i>
		      <textarea id="content" name="content"  class="materialize-textarea" value="" required>{{ $article->content }}
		      </textarea>
		      <label for="content">Contenido del Articulo</label>
		    </div>
		</div> 

		<div class="row formato-login">
		    <div class="input-field col s12">
		    	<i class="material-icons prefix">supervisor_account</i>
			    <select name="tags[]" multiple required>
				    @foreach($tags_array as $array)
				    		<option  selected="true" value="{{ $array->id }}">{{ $array->name }}</option>
				    @endforeach

				    @foreach($disponibles as $disponible)
						<option   value="{{ $disponible->id }}">{{ $disponible->name }}</option>
				    @endforeach
			    </select>
		    </div>
		</div>  

	    <div class="row ">
			<div class="input-field col s12 center">
				<button class="btn waves-effect waves-brown white black-text" type="submit">
					Editar
					<!-- <i class="material-icons right black-text">send</i> -->
				</button>
			</div>
		</div>
					   
	 
	</form>
</div>	

@endsection




