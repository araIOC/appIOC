@extends('layout.app')

@section('content')
<div class="container py-4" id="insertarp">
	<div class="row">
		<div class="col-md-6 mx-auto">
			<div class="card border-0 px-4 py-4 text-white bg-dark font-weight-bold">
					{{ csrf_field()}}
					<div class="form-group row" data-toggle="tooltip" data-placement="auto" title="Separados por coma ','">
						<label for="nomprePaciente" class="col-sm-4 col-form-label ">Nombre y apellidos:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="nombre" id="nombrePacienteAgr" placeholder="Martel Alemán, Juan" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="codigoPaciente" class="col-sm-4 col-form-label">Código:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="codigo"id="codPacienteAgr" placeholder="Código..." required>
						</div>
					</div>
					<button type="submit" class="btn btn-warning btn-block" id="agregarPaciente"><i class="far fa-save"></i> REGISTRAR</button>
			</div>
		</div>
	</div>
</div>

@endsection