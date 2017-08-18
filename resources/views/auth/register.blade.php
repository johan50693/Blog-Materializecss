@extends('layouts.main-login')

@section('title','Registrar Usuario')

@section('content')


<div class="row" id="login">


            <form class="col s5 offset-s2" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                
                <div class="row formato-login">
                    <div class="input-field col s12">
                      <i class="material-icons prefix">account_circle</i>
                      <input id="name" name="name" type="text" class="validate" value="{{ old('name') }}" required>
                      <label for="name">Nombre</label>
                    </div>
                </div>   

                <div class="row formato-login">
                    <div class="input-field col s12">
                      <i class="material-icons prefix">email</i>
                      <input id="email" name="email" type="text" class="validate" value="{{ old('email') }}" required>
                      <label for="email">Correo</label>
                    </div>
                </div>   

                <div class="row formato-login">
                    <div class="input-field col s12">
                      <i class="material-icons prefix ">lock</i>
                      <input id="password" name="password" type="password" class="validate" required>
                      <label for="password">Contraseña</label>
                    </div>
                </div> 

                <div class="row formato-login">
                    <div class="input-field col s12">
                      <i class="material-icons prefix ">lock</i>
                      <input id="password_confirmation" type="password" class="validate" name="password_confirmation" required>
                      <label for="password_confirmation">Confirmar Contraseña</label>
                    </div>
                </div> 
               
                <div class="row ">
                    <div class="input-field col s12 center">
                        <button class="btn waves-effect waves-brown white black-text" type="submit">
                            Registrar
                            <!-- <i class="material-icons right black-text">send</i> -->
                        </button>
                    </div>
                </div>
                               
             
            </form>
</div>  
@endsection



