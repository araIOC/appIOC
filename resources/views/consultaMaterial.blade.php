@extends('layout.app')

@section('content')
<div class="container py-4" id="">
	<div class="row">
		<div class="col-md-8 mx-auto">
			<div class="card border-0 px-4 py-4 text-white bg-dark font-weight-bold">
				{{ csrf_field()}}
				<div class="form-group row">
					<div class="input-group mb-3 col-md-6">
						<div class="input-group-prepend">
							<label class="input-group-text" for="inputGroupSelect01"><i class="far fa-calendar-alt mr-sm-2"></i> Primera fecha:</label>
						</div>
						<input class="form-control" type="date" id="piezas_primera_fecha" name="piezas_primera_fecha">
					</div>
					<div class="input-group mb-3 col-md-6">
						<div class="input-group-prepend">
							<label class="input-group-text" for="inputGroupSelect01"><i class="far fa-calendar-alt mr-sm-2"></i> Segunda fecha:</label>
						</div>
						<input class="form-control" type="date" id="piezas_segunda_fecha" name="piezas_segunda_fecha">
					</div>
				</div>

				<button type="submit" class="btn btn-warning btn-block" id="consultarPiezas"><i class="fas fa-search"></i> CONSULTAR</button>
				<div id="piezasResultado"></div>
			</div>
		</div>
	</div>
</div>

@endsection