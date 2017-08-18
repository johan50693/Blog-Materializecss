<div class="navbar-fixed">
	 <nav>
	    <div class="nav-wrapper black fixed">
	    	<a href="{{ route('articles.index') }}" class="brand-logo">Mi Blog</a>
	     	
	     	@if(Auth::guest())
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
					<li><a href="{{ route('register') }}">Registrar</a></li>
				</ul>
			@else

				{{-- Contenido del menu desplegable --}}
				<ul id="dropdown1" class="right dropdown-content">
					<li>
						<a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Cerrar Sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        	{{ csrf_field() }}
                        </form>
                    </li>
				</ul>
				
				{{-- Menu derecho con usuario logueado --}}
				<ul class="right hide-on-med-and-down">
					<li><a href="{{ route('front.index') }}">Página principal</a></li>
					<li>
						<a class="dropdown-button" href="#!" data-activates="dropdown1">  
							{{ Auth::user()->name }}
							<i class="material-icons right">arrow_drop_down</i>
						</a>

					</li>

				</ul>
			@endif

	    </div>
	  </nav>
</div>



