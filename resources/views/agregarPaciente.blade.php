@extends('layout.app')

@section('content')
<div class="container py-4">
	<div class="row">
		<div class="col-md-6 mx-auto">
			<div class="card border-0 px-4 py-4 text-white bg-dark font-weight-bold">
				<form action="{{ route('agregarPaciente') }}" method="POST">
					{{ csrf_field()}}
					<div class="form-group row">
						<label for="nomprePaciente" class="col-sm-3 col-form-label ">Nombre:</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="nombre" placeholder="Nombre...">
						</div>
					</div>
					<div class="form-group row">
						<label for="apellidosPaciente" class="col-sm-3 col-form-label ">Apellidos:</label>
						<div class="col-sm-9">
							<input type="text" class="form-control"name="apellidos" placeholder="Apellidos...">
						</div>
					</div>
					<div class="form-group row">
						<label for="codigoPaciente" class="col-sm-3 col-form-label">Código:</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="codigo" placeholder="Código...">
						</div>
					</div>
					<button type="submit" class="btn btn-warning btn-block "><i class="far fa-save"></i> REGISTRAR PACIENTE</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection