@extends('layout.app')

@section('content')
<div class="py-4">
	<div class="card col-md-4 mx-auto text-white bg-dark">
		<div class="card-header"><h1>Bienvenido {{ auth()->user()->name}}</h1></div>
		<div class="card-body">
			<h5 class="card-title">INFORMACIÓN NECESARIA</h5>
			<p class="card-text">datos, actualizacion, recordatorio....</p>

		</div>
		<div class="card-footer"><a href="#" class="btn btn-warning btn-block">CERRAR SESIÓN?</a></div>
	</div>
</div>
@endsection