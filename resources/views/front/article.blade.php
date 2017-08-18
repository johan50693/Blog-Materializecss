@extends('admin.templates.front')

@section('title', $article->name)

@section('content')

	<div class=" col s12">
		<div class="row">
				<div class="col s6 push-s2">
					 					 		  
					<div>
						<h2>  {{ $article->title }}</h2>
					</div>

					<div>
					@foreach($article->images as $image)
	 		    			<img class="img_article " src="{{ asset('img/articles/'.$image->name) }}">
	 		     	@endforeach	
	 		     	</div>

					<div>
						<p>{{ $article->content }}</p>
					</div>
	 				            
				</div>
		</div>

			<div class="row">
				<div id="disqus_thread" class="col s6 push-s2" ></div>
			</div>

			<script>

			/**
			*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
			*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
			/*
			var disqus_config = function () {
			this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
			this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
			};
			*/
			(function() { // DON'T EDIT BELOW THIS LINE
			var d = document, s = d.createElement('script');
			s.src = 'https://mybloglaravel.disqus.com/embed.js';
			s.setAttribute('data-timestamp', +new Date());
			(d.head || d.body).appendChild(s);
			})();
			</script>
			<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                            
		

		<div class="row">
			<div class="col s4 push-s8 menu_der">	
				@include('front.partials.aside')
			</div>
		</div>

	</div>

@endsection

