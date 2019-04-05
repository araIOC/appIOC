@extends('layout.app')

@section('content')
<div class="container py-4">
	<div class="row">
		<div class="col-md-8 mx-auto">
			<div class="card border-0 px-4 py-4 text-white bg-dark font-weight-bold">
				<form action="{{ route('agregarTrabajo') }}" method="POST">
					{{csrf_field()}}
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputDoctor">Código del paciente</label>
							<div class=" my-2 my-lg-0">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-tags"></i></label>
									</div>
									<input type="text" class="form-control" placeholder="Código...">
								</div>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label for="inputTratamiento">Tratamiento</label>
							<div class=" my-2 my-lg-0">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="input-group-text" for="inputGroupSelect01"><i class="far fa-object-ungroup"></i></label>
									</div>
									<select class="custom-select mr-sm-2" id="inputGroupSelect01">
										<!--tratamiento del paciente que escriba -->
										<option selected>Elija un tratamiento...</option>
										@foreach($tratamientos as $tratamiento)
										<option value="{{$tratamiento->nombreT}}" class="highlight">{{$tratamiento->nombreT}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputTratamiento">Material</label>
							<div class=" my-2 my-lg-0">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="input-group-text" for="inputGroupSelect01"><i class="far fa-object-ungroup"></i></label>
									</div>
									<select class="custom-select mr-sm-2" id="inputGroupSelect01">
										<option selected>Elija un material...</option>
										@foreach($materiales as $material)
										<option value="{{$material->nombreM}}" class="highlight">{{$material->nombreM}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>

						<div class="form-group col-md-6">
							<label for="inputImplante">Tipo de trabajo</label>
							<div class=" my-2 my-lg-0">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-briefcase"></i></label>
									</div>
									<select class="custom-select mr-sm-2" id="inputGroupSelect01">
										<option selected>Tipo de trabajo...</option>
										@foreach($tipos_trabajo as $tipo_trabajo)
										<option value="{{$tipo_trabajo->tipoT}}" class="highlight">{{$tipo_trabajo->tipoT}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="inputDoctor">Nº de piezas</label>
							<div class=" my-2 my-lg-0">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-tooth"></i></label>
									</div>
									<input type="text" class="form-control" name="piezas" placeholder="10...">
								</div>
							</div>
						</div>
						<div class="form-group col-md-4">
							<label for="inputAsesor">Color</label>
							<div class=" my-2 my-lg-0">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-palette"></i></label>
									</div>
									<select class="custom-select mr-sm-2" id="inputGroupSelect01">
										<option selected>Color...</option>
										@foreach($colores as $color)
										<option value="{{$color->nombreC}}" class="highlight">{{$color->nombreC}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="form-group col-md-4">
							<label for="inputAsesor">Código de disco</label>
							<div class=" my-2 my-lg-0">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-compact-disc"></i></label>
									</div>
									<select class="custom-select mr-sm-2" id="inputGroupSelect01">
										<option selected>Nº disco...</option>
										@foreach($discos as $disco)
										<option value="{{$disco->codigo}}" class="highlight">{{$disco->codigo}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-8">
							<label for="inputAsesor">Máquina</label>
							<div class=" my-2 my-lg-0">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="input-group-text" for="inputGroupSelect01"><i class="far fa-hdd"></i></label>
									</div>
									<select class="custom-select mr-sm-2" id="inputGroupSelect01">
										<option selected>Máquina...</option>
										@foreach($maquinas as $maquina)
										<option value="{{$maquina->nombreMaq}}" class="highlight">{{$maquina->nombreMaq}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="form-group col-md-4">
							<label for="inputAsesor">Fecha</label>
							<div class=" my-2 my-lg-0">
								<div class="input-group">
									<div class="mr-sm-2 my-2 my-lg-0">
										<div class="input-group">
											<div class="input-group-prepend">
												<label class="input-group-text" for="inputGroupSelect01"><i class="far fa-calendar-alt"></i></label>
											</div>
											<input class="form-control" type="date" value="2011-08-19" id="example-date-input" data-toggle="tooltip" data-placement="auto" title="Fecha inicial">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="inputDoctor">Notas</label>
							<div class=" my-lg-0">
								<div class="input-group">
									<textarea class="form-control" id="notas" placeholder="Inserte las notas adicionales..."></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="form-row pb-3 mx-1">
						<div class="custom-file form-group col-md-12">
							<input type="file" class="custom-file-input" id="stl" lang="es">
							<label class="btn btn-lg custom-file-label" for="stl" data-browse="Buscar..."><i class="fas fa-upload"></i> STL</label>
						</div>
					</div>

					<button type="submit" class="btn btn-warning btn-lg btn-block">Guardar</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection