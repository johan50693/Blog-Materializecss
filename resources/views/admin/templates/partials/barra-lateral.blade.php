<ul id="slide-out" class="side-nav fixed black">
  <li>
    <div class="user-view">
      <div class="background">
        <img src="{{ asset('img/admin4.jpg') }}" class="">
      </div>
      <a href="#"><img class="circle" src="{{ asset('img/perfil.jpg') }}"></a>
      <a href="#"><span class="black-text name">{{ Auth::user()->name }}</span></a>
      <a href="#"><span class="black-text email">{{ Auth::user()->email }}</span></a>
    </div>
  </li>
  {{-- <li><a class="white-text" href="{{ route('admin.home') }}">Inicio</a></li> --}}
  @if(Auth::user()->isadmin())
  <li><a class="waves-effect white-text" href="{{ route('users.index') }}">Usuarios</a></li>
  @endif
  <li><a class="waves-effect white-text" href="{{ route('categories.index') }}" >Categorias</a></li>
  <li><a class="waves-effect white-text" href="{{ route('articles.index') }}" >Articulos</a></li>
  <li><a class="waves-effect white-text" href="{{ route('images.index') }}" >Imágenes</a></li>
  <li><a class="waves-effect white-text" href="{{ route('tags.index') }}" >Tags</a></li>
</ul>

        