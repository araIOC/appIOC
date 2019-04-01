<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	content="width-device-width, user-scalable=no, initial-scale=1.,maximun-scale=1.0,minimun-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{mix('css/app.css')}}">
	<title>INICIO</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<img src="{{asset('./img/appIOC.png')}}" class="navbar-brand">
	</nav>
	<main class="py-4">
		<div class="container" id="app">
			<div class="row">
				<div class="col-md-6 mx-auto">
					<div class="card border-0 px-6 py-2 text-white bg-dark">
						<form action="{{ route('login')}}" method="POST">
							{{ csrf_field()}}
							<div class="card-body">
								<div class="form-group">
									<label for="name">Usuario:</label>
									<input class="form-control border-0 bg-light {{ $errors->has('name') ? 'is-invalid' : ''}}"
										name="name"
										placeholder="Tu nombre..."
										value="{{ old('name')}}">
										{!! $errors->first('name','<span class="help-block">:message</span>')!!}
								</div>
								<div class="form-group">
									<label for="password">Contraseña:</label>
									<input class="form-control border-0 bg-light {{ $errors->has('password') ? 'is-invalid' : ''}}"
										type="password"
										name="password"
										placeholder="Tu contraseña...">
										{!! $errors->first('password','<span class="help-block ">:message</span>')!!}
								</div>
								<button class="btn btn-warning btn-block" id="login-btn" >ENTRAR</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<script type="text/javascript" src="js/app.js"></script>
</body>
</html>
