@extends('layout.app')

@section('content')
<div class="container py-4">
	<div class="row">
		<div class="col-ms-8 mx-auto">
			<div class="card border-0 px-4 py-4 text-white bg-dark font-weight-bold">
				<form>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputTratamiento">Tratamiento</label>
							<div class=" my-2 my-lg-0">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-Prescription-bottle-alt"></i></label>
									</div>
									<select class="custom-select mr-sm-2" id="inputGroupSelect01">
										<option selected>Elija un tratamiento...</option>
										@foreach($tratamientos as $tratamiento)
										<option value="{{$tratamiento->nombreT}}" class="highlight">{{$tratamiento->nombreT}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>

						<div class="form-group col-md-6">
							<label for="inputImplante">Tipo de implante</label>
							<div class=" my-2 my-lg-0">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-tooth"></i></label>
									</div>
									<select class="custom-select mr-sm-2" id="inputGroupSelect01">
										<option selected>Tipo de implante...</option>
										@foreach($implantes as $implante)
										<option value="{{$implante->tipo}}" class="highlight">{{$implante->tipo}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputDoctor">Doctor</label>
							<div class=" my-2 my-lg-0">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-user-md"></i></label>
									</div>
									<select class="custom-select mr-sm-2" id="inputGroupSelect01">
										<option selected>Elija un doctor...</option>
										@foreach($doctores as $doctor)
										<option value="{{$doctor->nombre}}" class="highlight">{{$doctor->nombre}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label for="inputAsesor">Asesor</label>
							<div class=" my-2 my-lg-0">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-user-nurse"></i></label>
									</div>
									<select class="custom-select mr-sm-2" id="inputGroupSelect01">
										<option selected>Elija un asesor...</option>
										@foreach($asesores as $asesor)
										<option value="{{$asesor->nombre}}" class="highlight">{{$asesor->nombre}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-3">
							<label for="inputTratamiento">Cirugía guiada </label>
							<div class="input-group">
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
									<label class="form-check-label" for="inlineRadio1">Estática</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
									<label class="form-check-label" for="inlineRadio2">Dinámica</label>
								</div>
							</div>
						</div>
						<div class="form-group col-md-3">
							<label for="inputTratamiento">PIC</label>
							<div class="mr-sm-2">
								<div class="form-check ">
									<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										 provisional
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										 definitivo
									</label>
								</div>
							</div>

						</div>
						<div class="form-group col-md-2">
							<label for="inputTratamiento">TAC</label>
							<div class="form-check mr-sm-2">
								<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								<label class="form-check-label" for="defaultCheck1">
									 Pre
								</label>
							</div>
							<div class="form-check mr-sm-2">
								<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								<label class="form-check-label" for="defaultCheck1">
									 Post
								</label>
							</div>
						</div>
						<div class="form-group col-md-2">
							<label for="inputTratamiento">ORTO</label>
							<div class="form-check mr-sm-2">
								<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								<label class="form-check-label" for="defaultCheck1">
									 Pre
								</label>
							</div>
							<div class="form-check mr-sm-2">
								<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								<label class="form-check-label" for="defaultCheck1">
									 Post
								</label>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-2">
							<label for="inputTratamiento">FOTOS</label>
							<div class="form-check mr-sm-2">
								<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								<label class="form-check-label" for="defaultCheck1">
									 Pre
								</label>
							</div>
							<div class="form-check mr-sm-2">
								<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								<label class="form-check-label" for="defaultCheck1">
									 Post
								</label>
							</div>
						</div>
						<div class="form-group col-md-4">
							<label for="inputTratamiento" class="text-dark">FOTOS</label>
							<div class="form-check mr-sm-2">
								<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								<label class="form-check-label" for="defaultCheck1">
									 Protesis pre
								</label>
							</div>
							<div class="form-check mr-sm-2">
								<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								<label class="form-check-label" for="defaultCheck1">
									Protesis post
								</label>
							</div>
						</div>
						<div class="form-group col-md-5">
							<label for="inputTratamiento" class="text-dark">PROTESIS BOCA</label>
							<div class="form-check mr-sm-2">
								<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								<label class="form-check-label" for="defaultCheck1">
									Protesis en boca pre
								</label>
							</div>
							<div class="form-check mr-sm-2">
								<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								<label class="form-check-label" for="defaultCheck1">
									Protesis en boca post
								</label>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-3">
							<div class="mr-sm-2">
								<label for="inputTratamiento">IOScan</label>
								<div class="form-check mr-sm-2">
									<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										 Pre
									</label>
								</div>
								<div class="form-check mr-sm-2">
									<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										 Post
									</label>
								</div>
							</div>
						</div>
						<div class="form-group col-md-2">
							<label for="inputTratamiento">VIDEO</label>
							<div class="form-check mr-sm-2">

								<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								<label class="form-check-label" for="defaultCheck1">
									Pre
								</label>
							</div>
							<div class="form-check mr-sm-2">
								<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								<label class="form-check-label" for="defaultCheck1">
									Post
								</label>
							</div>
						</div>
						<div class="form-group col-md-6">
							<div class=" my-2 my-lg-0">
								<label for="inputTratamiento">Link Dropbox</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="input-group-text" for="inputGroupSelect01"><i class="fab fa-dropbox"></i></label>
									</div>
									<input type="text" class="form-control" placeholder="Link de Dropbox">
								</div>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class=" my-2 my-lg-0 py-2 col-md-6">
							<button type="button" class="btn btn-outline-warning my-2 my-sm-0 ml-auto btn-block">POWER POINT</button>
						</div>
						<div class=" my-2 my-lg-0 py-2 col-md-6">
							<button type="button" class="btn btn-outline-warning my-2 my-sm-0 ml-auto btn-block">PDF</button>
						</div>
					</div>

					<button type="submit" class="btn btn-warning btn-lg btn-block">Guardar</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection