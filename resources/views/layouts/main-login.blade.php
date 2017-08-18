<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title','Default')</title>

	<!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	

	<link rel="stylesheet" href="{{ asset('css/materialize.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/main-login.css') }}">

</head>
<body>
	<header>
	
		@include('layouts.nav-bar')

	
	</header>

	<main>
		<div class="row contenido">
				@include('admin.templates.partials.errors')
				@yield('content')
		</div>
	</main>

	<footer class="page-footer black">
	  <div class="footer-copyright black">
	    <div class="container center">
	    © 2017 Copyright Albert Urbina 
	    </div>
	  </div>
    </footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	<script src="{{ asset('js/materialize.js') }}"></script>
	<script>
		$('document').ready(function(){

			$('.button-collapse').sideNav({
				menuWidth: 200, // Default is 300
				edge: 'left', // Choose the horizontal origin
				closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
		    });

		    $(".dropdown-button").dropdown();

		    $('select').material_select();

		    $(".close").click(function(e){
			$(this).parent().remove();
			e.preventDefault();
			});

		});
	</script>
</html>


