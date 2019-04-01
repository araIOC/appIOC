@extends('layout.app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-9">
	<button class="navbar-toggler col-12" type="button" data-toggle="collapse" data-target="#navbar2" aria-controls="navbar2" aria-expanded="false" aria-label="Toggle navigation">Filtros
		<span><i class="fas fa-angle-double-down"></i></span>
	</button>
	<div class="collapse navbar-collapse" id="navbar2">
		<form class="form-inline my-2 my-lg-0 ">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1"><i class="fas fa-address-card"></i></span>
				</div>
				<input class="form-control mr-sm-2" type="search" placeholder="Nombre..." aria-label="Search">
			</div>
		</form>
		<form class="form-inline my-2 my-lg-0">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1"><i class="fas fa-tags"></i></span>
				</div>
				<input class="form-control mr-sm-2" type="search" placeholder="Código..." aria-label="Search">
			</div>
		</form>
		<div class=" form-inline my-2 my-lg-0">
			<div class="input-group">
				<div class="input-group-prepend">
					<label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-prescription-bottle-alt"></i></label>
				</div>
				<select class="custom-select mr-sm-2" id="inputGroupSelect01">
					<option selected>Elija un tratamiento...</option>
					@foreach($tratamientos as $tratamiento)
					<option value="{{$tratamiento->nombreT}}" class="highlight">{{$tratamiento->nombreT}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class=" form-inline my-2 my-lg-0">
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
		<div class=" form-inline my-2 my-lg-0">
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
		<div>
			<div class="custom-control custom-radio text-white mr-sm-2">
				<input type="radio" id="rbcestatica" name="rbCirugia" class="custom-control-input">
				<label class="custom-control-label" for="rbcestatica">Estática</label>
			</div>
			<div class="custom-control custom-radio text-white mr-sm-2">
				<input type="radio" id="rbcdinamica" name="rbCirugia" class="custom-control-input">
				<label class="custom-control-label" for="rbcdinamica">Dinámica</label>
			</div>
		</div>
		<div class="text-white mr-sm-2">
			<div class="form-check ">
				<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
				<label class="form-check-label" for="defaultCheck1">
					PIC provisional
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
				<label class="form-check-label" for="defaultCheck1">
					PIC definitivo
				</label>
			</div>
		</div>
		<button class="btn btn-outline-warning my-2 my-sm-0 ml-auto" type="submit">Buscar... <i class="fas fa-search"></i></button>
		<button class="btn btn-outline-warning my-2 my-sm-0 ml-auto mostrarMas" type="button" data-toggle="collapse" data-target="#navbar3" aria-controls="navbar3" aria-expanded="false" aria-label="Toggle navigation" id="btnFiltros">
		</button>
	</div>
</nav>

<div class="collapse navbar-collapse" id="navbar3">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">

		<div class="mr-sm-2 my-2 my-lg-0">
			<div class="input-group">
				<div class="input-group-prepend">
					<label class="input-group-text" for="inputGroupSelect01"><i class="far fa-calendar-alt"></i></label>
				</div>
				<input class="form-control" type="date" value="2011-08-19" id="example-date-input">
				<input class="form-control" type="date" value="2011-08-19" id="example-date-input">
			</div>
		</div>

		<div class=" form-inline my-2 my-lg-0">
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
		<div class="text-white">
			<div class="form-check mr-sm-2">
				<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
				<label class="form-check-label" for="defaultCheck1">
					TAC pre
				</label>
			</div>
			<div class="form-check mr-sm-2">
				<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
				<label class="form-check-label" for="defaultCheck1">
					TAC post
				</label>
			</div>
		</div>
		<div class="text-white">
			<div class="form-check mr-sm-2">
				<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
				<label class="form-check-label" for="defaultCheck1">
					IOScan pre
				</label>
			</div>
			<div class="form-check mr-sm-2">
				<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
				<label class="form-check-label" for="defaultCheck1">
					IOScan post
				</label>
			</div>
		</div>
		<div class="text-white">
			<div class="form-check mr-sm-2">
				<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
				<label class="form-check-label" for="defaultCheck1">
					Orto pre
				</label>
			</div>
			<div class="form-check mr-sm-2">
				<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
				<label class="form-check-label" for="defaultCheck1">
					Orto post
				</label>
			</div>
		</div>
		<div class="text-white">
			<div class="form-check mr-sm-2">
				<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
				<label class="form-check-label" for="defaultCheck1">
					Fotos pre
				</label>
			</div>
			<div class="form-check mr-sm-2">
				<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
				<label class="form-check-label" for="defaultCheck1">
					Fotos post
				</label>
			</div>
		</div>
		<div class="text-white">
			<div class="form-check mr-sm-2">
				<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
				<label class="form-check-label" for="defaultCheck1">
					Foto protesis pre
				</label>
			</div>
			<div class="form-check mr-sm-2">
				<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
				<label class="form-check-label" for="defaultCheck1">
					Foto protesis post
				</label>
			</div>
		</div>
		<div class="text-white">
			<div class="form-check mr-sm-2">
				<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
				<label class="form-check-label" for="defaultCheck1">
					Foto protesis en boca pre
				</label>
			</div>
			<div class="form-check mr-sm-2">
				<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
				<label class="form-check-label" for="defaultCheck1">
					Foto protesis en boca post
				</label>
			</div>
		</div>
		<div class="text-white">
			<div class="form-check mr-sm-2">
				<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
				<label class="form-check-label" for="defaultCheck1">
					Video pre
				</label>
			</div>
			<div class="form-check mr-sm-2">
				<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
				<label class="form-check-label" for="defaultCheck1">
					Video post
				</label>
			</div>
		</div>
	</nav>
</div>
<div class="table-responsive-sm text-center">
	<table class="table table-hover table-dark consulta">
		<thead>
			<tr>
				<th scope="col">Cod</th>
				<th scope="col">Nombre</th>
				<th scope="col">Tratamiento</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			@foreach($pacientes as $paciente)
			<tr data-toggle="modal" data-target=".bd-example-modal-xl">
				<th scope="row">{{$paciente->codigoP}}</th>
				<td>{{$paciente->apellidosP}}, {{$paciente->nombreP}}</td>
				<td>{{$paciente->nombreT}}</td>
				<td><div class="form-check-inline"><button class="btn btn-outline-warning mr-sm-2 mx-auto" type="submit"><i class="fas fa-trash-alt"></i></button>
					<button class="btn btn-outline-warning mx-auto" type="submit"><i class="fas fa-sync-alt"></i></button></div>
				</td>
			</tr>

			@endforeach
		</tbody>
	</table>
	<div class="modal fade bd-example-modal-xl " tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">{{$paciente->apellidosP}}, {{$paciente->nombreP}}</h5>

					<h5 class="modal-title ml-auto" id="exampleModalCenterTitle">Código: {{$paciente->codigoP}}</h5>
				</div>
				<ul class="nav nav-tabs" id="tabTratamiento" role="tablist">
					@foreach($pacientes as $paciente)
					<li class="nav-item active">
						<a class="nav-link " id="test" href="#">{{$paciente->nombreT}}</a>
					</li>
					@endforeach
					<li class="ml-auto mr-sm-2">
						<button type="button" class="btn btn-warning py-2"><i class="fas fa-plus"></i></button>
					</li>

				</ul>
				<div class="tab-content" id="tabTratamiento">
					<div class="tab-pane fade show active" id="test" role="tabpanel" aria-labelledby="test-tab">
						<div class="row">
							<div class="col-md-4">
								<table class="table ">
									<tbody>
										<tr>
											<th scope="row">DOCTOR:</th>
											<td>Aránzazu Martín</td>
										</tr>
										<tr>
											<th scope="row">ASESOR:</th>
											<td>Cristina Sosa</td>
										</tr>
										<tr>
											<th scope="row">TIPO DE IMPLANTE</th>
											<td>Standar</td>
										</tr>
										<tr>
											<th scope="row">CIRUGIA:</th>
											<td>Estática</td>
										</tr>
										<tr>
											<th scope="row">FECHA DE INICIO:</th>
											<td>12/04/2019</td>
										</tr>
										<tr>
											<th scope="row">FECHA DEFINITIVA</th>
											<td>12/04/2019</td>
										</tr>
										<tr>
											<th scope="row"><i class="fab fa-dropbox"></i></th>
											<td><a href="https://www.dropbox.com/es_ES/">https://www.dropbox.com/es_ES/</a></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-md-4">
								<ul class="list-group list-group-flush">
									<li class="list-group-item"><i class="fas fa-check"></i> Cras justo odio</li>
									<li class="list-group-item"><i class="fas fa-check"></i> Dapibus ac facilisis in</li>
									<li class="list-group-item"><i class="fas fa-check"></i> Porta ac consectetur ac</li>
									<li class="list-group-item"><i class="fas fa-check"></i> Vestibulum at eros</li>
								</ul>
							</div>
							<div class="col-md-4">
								<ul class="list-group list-group-flush">
									<li class="list-group-item"><i class="fas fa-times"></i> Cras justo odio</li>
									<li class="list-group-item"><i class="fas fa-times"></i> Dapibus ac facilisis in</li>
									<li class="list-group-item"><i class="fas fa-times"></i> Porta ac consectetur ac</li>
									<li class="list-group-item"><i class="fas fa-times"></i> Vestibulum at eros</li>
								</ul>
							</div>
						</div>
					</div>
					<button class="btn btn-warning btn-lg ml-auto" type="submit"><i class="fas fa-file-pdf"></i> PDF</button>
					<button class="btn btn-warning btn-lg ml-auto" type="submit"><i class="fas fa-file-powerpoint"></i> POWER POINT</button>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-warning"><i class="fas fa-plus"></i> Trabajo</button>
					<button class="btn btn-warning py-2" type="submit"><i class="fas fa-trash-alt"></i></button>
					<button class="btn btn-warning py-2" type="submit"><i class="fas fa-sync-alt"></i></button>
				</div>
			</div>
		</div>
	</div>
	@endsection

</div>