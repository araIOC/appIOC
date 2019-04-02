<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	content="width-device-width, user-scalable=no, initial-scale=1.,maximun-scale=1.0,minimun-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{mix('css/app.css')}}">
	<link rel="stylesheet" type="text/css" href="css/appioc.css">
	<title>INICIO</title>
</head>
<body>
	@include('sweetalert::alert')
	<nav class="navbar  navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="{{ route('app') }}"><img src="{{asset('./img/appIOC.png')}}"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-address-card"></i> PACIENTES
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('consultar') }}"><i class="fas fa-search"></i> CONSULTAR</a>
						<a class="dropdown-item" href="{{ route('agregar') }}"><i class="fas fa-user-plus"></i> AGREGAR</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-teeth"></i> TRABAJOS
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('consultarTrabajos') }}"><i class="fas fa-search"></i> CONSULTAR</a>
						<a class="dropdown-item" href="{{ route('registroTrabajo') }}"><i class="fas fa-plus-circle"></i> AGREGAR</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-compact-disc"></i> DISCOS
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('consultarDiscos') }}"><i class="fas fa-search"></i> CONSULTAR</a>
						<a class="dropdown-item" href="{{ route('registroDisco') }}"><i class="fas fa-plus-circle"></i> AGREGAR</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> CERRAR SESIÓN</a>
				</li>
			</ul>
		</div>
	</nav>
	<main>
		<div id="app">

			@yield('content')

		</div>
	</main>

	<script defer src="https://use.fontawesome.com/releases/v5.8.0/js/all.js" integrity="sha384-ukiibbYjFS/1dhODSWD+PrZ6+CGCgf8VbyUH7bQQNUulL+2r59uGYToovytTf4Xm" crossorigin="anonymous"></script>
	<script type="text/javascript" src="{{mix('js/app.js')}}"></script>
	<script type="text/javascript" src="js/appioc.js"></script>

</body>
</html>