@extends('layout.app')

@section('content')
<div class="container py-4">
	<div class="row">
		<div class="col-md-8 mx-auto">
			<div class="card border-0 px-4 py-4 text-white bg-dark font-weight-bold">
				<form action="{{ route('agregarDisco') }}" method="POST">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputEmail4">Código del disco</label>
							<input type="text" class="form-control" name="codigo" placeholder="Código...">
						</div>
						<div class="form-group col-md-6">
							<label for="inputTratamiento">Material</label>
							<div class=" my-2 my-lg-0">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="input-group-text" for="inputGroupSelect01"><i class="far fa-object-ungroup"></i></label>
									</div>
									<select class="custom-select mr-sm-2" name="material">
										<option selected>Elija un material...</option>
										@foreach($materiales as $material)
										<option value="{{$material->nombreM}}" class="highlight">{{$material->nombreM}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputTratamiento">Marca</label>
							<div class=" my-2 my-lg-0">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="input-group-text" for="inputGroupSelect01"><i class="far fa-object-ungroup"></i></label>
									</div>
									<select class="custom-select mr-sm-2" name="marca">
										<option selected>Elija una marca...</option>
										@foreach($marcas as $marca)
										<option value="{{$marca->marcaD}}" class="highlight">{{$marca->marcaD}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>

						<div class="form-group col-md-6">
							<label for="inputDoctor">Escala</label>
							<div class=" my-2 my-lg-0">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-arrows-alt"></i></label>
									</div>
									<input type="text" class="form-control" name="escala" placeholder="1.343...">
								</div>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputAsesor">Color real</label>
							<div class=" my-2 my-lg-0">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-palette"></i></label>
									</div>
									<select class="custom-select mr-sm-2" name="color">
										<option selected>Color...</option>
										@foreach($colores as $color)
										<option value="{{$color->nombreC}}" class="highlight">{{$color->nombreC}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label for="inputDoctor">Altura</label>
							<div class=" my-2 my-lg-0">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-arrows-alt-v"></i></label>
									</div>
									<input type="text" class="form-control" name="altura" placeholder="12...">
								</div>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-warning btn-lg btn-block">Guardar</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection