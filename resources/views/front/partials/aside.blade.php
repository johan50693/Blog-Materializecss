	
	<div>
		<ul class="collection">
	      <li class="collection-item active">Categorías</li>
	      @foreach($categories as $category)
	      <li class="collection-item">
			<a href="{{ route('front.search.category', $category->name) }}" title="">{{ $category->name }}</a>
	      </li>
	      @endforeach
	    </ul>
	</div>

	<div>
		<ul class="collection">
	      <li class="collection-item active  blue darken-4 valign-wrapper">Tags</li>
	    
	      
			@foreach($tags as $tag)

				@if($loop->iteration == 1)
					<li class="collection-item">
						<a href="{{ route('front.search.tag', $tag->name) }}" title=""> 
							<span class="new badge" data-badge-caption="">{{ $tag->name }} </span>
						</a>
					
				@elseif(($loop->iteration % 5) == 0)
					</li>
					<li class="collection-item">
						<a href="{{ route('front.search.tag', $tag->name) }}" title=""> 
							<span class="new badge" data-badge-caption="">{{ $tag->name }} </span>
						</a>
				@elseif($loop->last)
					<a href="{{ route('front.search.tag', $tag->name) }}" title=""> 
						<span class="new badge" data-badge-caption="">{{ $tag->name }} </span>
					</a>
					</li>
				@else
					<a href="{{ route('front.search.tag', $tag->name) }}" title=""> 
						<span class="new badge" data-badge-caption="">{{ $tag->name }} </span>
					</a>
				@endif

			@endforeach
	     
	    </ul>
	</div>