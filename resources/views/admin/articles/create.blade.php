
@extends('admin.templates.main')

@section('title', 'Crear Articulo')

@section('content')

<div class="row" id="login">
			
	<form class="col s5 offset-s3" method="POST" action="{{ route('articles.store') }}" files="true" enctype="multipart/form-data">
		{{ csrf_field() }}
	 	
	 	<div class="row formato-login">
		    <div class="input-field col s12">
		      <i class="material-icons prefix">perm_media</i>
		      <input id="title" name="title" type="text" class="validate" value="{{ old('title') }}" required>
		      <label for="title">Titulo</label>
		    </div>
		</div>   

		<div class="row formato-login">
		    <div class="input-field col s12">
		    	<i class="material-icons prefix">supervisor_account</i>
			    <select name="category_id" required>
				    <option value="" disabled selected>Seleccione una Categoría</option>
				    @foreach($categories as $category)
					    <option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
			    </select>
		    </div>
		</div>  

		<div class="row formato-login">
		    <div class="input-field col s12">
		      <i class="material-icons prefix">perm_media</i>
		      <textarea id="content" name="content"  class="materialize-textarea" value="" required>{{ old('content') }}</textarea>
		      <label for="content">Contenido del Articulo</label>
		    </div>
		</div> 

		<div class="row formato-login">
		    <div class="input-field col s12">
		    	<i class="material-icons prefix">supervisor_account</i>
			    <select name="tags[]" multiple required>
				    <option  disabled selected>Seleccione un Tag</option>
				    @foreach($tags as $tag)
					    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
					@endforeach
			    </select>
		    </div>
		</div>  

		<div class="row formato-login">
			
			    <div class="file-field input-field col s12">
			      <div class="btn">
			        <span>Imagen</span>
			        <input type="file" name="image1" required>
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" type="text" name="image" >
			      </div>
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