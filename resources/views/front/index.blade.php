@extends('admin.templates.front')

@section('title', 'Home de Usuarios')

@section('content')

	<div class=" col s12">
		<div class="row articulos">
				<div class="col s8">
					 <div class="row">
					@foreach($articles as $article) 	
					 	<div class="col s6">
					 		<div class="card medium">
					 		   <div class="card-image waves-effect waves-block waves-light">
					 		   		@foreach($article->images as $images)
					 		    		<a href="{{ route('front.view.article',$article->slug) }}">
					 		    			<img class="activator" src="{{ asset('img/articles/'.$images->name) }}">
					 		    		</a>
					 		     	@endforeach
					 		   </div>
					 		   <div class="card-content">
					 		    	<a href="{{ route('front.view.article',$article->slug) }}">
					 		     		<span class="card-title activator grey-text text-darken-4">{{ $article->title }}</span>
					 		    	</a>
					 		   </div>
	 							<div class="card-action">
	 				              <a href="{{ route('front.search.category', $article->category->name) }}">{{ $article->category->name }}</a>
	 				              <a href="#">{{ $article->category->created_at->diffForHumans() }}</a>
	 				            </div>
					 		 </div>
					 	</div>
					@endforeach
					 </div>
				</div>
		</div>

		<div class="row">
			<div class="col s4 push-s8 menu_der">	
				@include('front.partials.aside')
			</div>
		</div>

	</div>

@endsection

