@extends('layout.app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-9">
	<button class="navbar-toggler col-12" type="button" data-toggle="collapse" data-target="#navbar2" aria-controls="navbar2" aria-expanded="false" aria-label="Toggle navigation">Filtros
		<span><i class="fas fa-angle-double-down"></i></span>
	</button>
	<div class="collapse navbar-collapse" id="navbar2">
		{{ csrf_field()}}
		<div class="form-row">
			<div class="form-inline my-2 my-lg-0 ">
				<div class="input-group" data-toggle="tooltip" data-placement="auto" title="Nombre del paciente">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fas fa-address-card"></i></span>
					</div>
					<input class="form-control mr-sm-2" type="search" placeholder="Nombre..." aria-label="Search" name="nombrePaciente" id="nombrePaciente">
				</div>
			</div>
			<div class="form-inline my-2 my-lg-0">
				<div class="input-group" data-toggle="tooltip" data-placement="auto" title="Código del paciente">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fas fa-tags"></i></span>
					</div>
					<input class="form-control mr-sm-2" type="search" placeholder="Código..." aria-label="Search" id="codigoPaciente" name="codigoPaciente">
				</div>
			</div>
			<div class=" form-inline my-2 my-lg-0">
				<div class="input-group">
					<div class="input-group-prepend">
						<label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-prescription-bottle-alt"></i></label>
					</div>
					<select class="custom-select mr-sm-2" id="nombreT" name="nombreT">
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
					<select class="custom-select mr-sm-2" id="tipo_implante" name="tipo_implante">
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
					<select class="custom-select mr-sm-2" id="doctorPaciente" name="doctorPaciente">
						<option selected>Elija un doctor...</option>
						@foreach($doctores as $doctor)
						<option value="{{$doctor->nombreD}}" class="highlight">{{$doctor->nombreD}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div>
				<div class="custom-control custom-radio text-white mr-sm-2 cir" data-toggle="tooltip" data-placement="auto" title="Cirugía estática">
					<input type="radio" id="rbcestatica" name="rbCirugia" class="custom-control-input" value="rbcestatica">
					<label class="custom-control-label" for="rbcestatica">Estática</label>
				</div>
				<div class="custom-control custom-radio text-white mr-sm-2 cir" data-toggle="tooltip" data-placement="auto" title="Cirugía dinámica">
					<input type="radio" id="rbcdinamica" name="rbCirugia" class="custom-control-input" value="rbcdinamica">
					<label class="custom-control-label" for="rbcdinamica">Dinámica</label>
				</div>
			</div>
			<div class="text-white mr-sm-2">
				<div class="form-check ">
					<input class="form-check-input" type="checkbox" value="" id="CBpic_provisional">
					<label class="form-check-label" >
						PIC provisional
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="" id="CBpic_definitivo">
					<label class="form-check-label" >
						PIC definitivo
					</label>
				</div>
			</div>

			<button class="btn btn-outline-warning my-2 my-sm-0 ml-auto" type="submit" id="limpiarFiltroPacientes" data-toggle="tooltip" data-placement="auto" title="Limpiar filtros">Limpiar... <i class="fas fa-brush"></i></button>
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
					<input class="form-control" type="date" id="Dfecha_inicial" name="Dfecha_inicial" data-toggle="tooltip" data-placement="auto" title="Fecha inicial">
					<input class="form-control" type="date" id="Dfecha_final" name="Dfecha_final" data-toggle="tooltip" data-placement="auto" title="Fecha definitiva">
				</div>
			</div>
			<div class=" form-inline my-2 my-lg-0">
				<div class="input-group">
					<div class="input-group-prepend">
						<label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-user-nurse"></i></label>
					</div>
					<select class="custom-select mr-sm-2" id="asesorPaciente" name="asesorPaciente">
						<option selected>Elija un asesor...</option>
						@foreach($asesores as $asesor)
						<option value="{{$asesor->nombreA}}" class="highlight">{{$asesor->nombreA}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="text-white">
				<div class="form-check mr-sm-2">
					<input class="form-check-input" type="checkbox" value="" id="cbTac_pre">
					<label class="form-check-label" >
						TAC pre
					</label>
				</div>
				<div class="form-check mr-sm-2">
					<input class="form-check-input" type="checkbox" value="" id="cbTac_post">
					<label class="form-check-label" >
						TAC post
					</label>
				</div>
			</div>
			<div class="text-white">
				<div class="form-check mr-sm-2">
					<input class="form-check-input" type="checkbox" value="" id="cbIOScan_pre">
					<label class="form-check-label" >
						IOScan pre
					</label>
				</div>
				<div class="form-check mr-sm-2">
					<input class="form-check-input" type="checkbox" value="" id="cbIOScan_post">
					<label class="form-check-label" >
						IOScan post
					</label>
				</div>
			</div>
			<div class="text-white">
				<div class="form-check mr-sm-2">
					<input class="form-check-input" type="checkbox" value="" id="cbOrto_pre">
					<label class="form-check-label" >
						Orto pre
					</label>
				</div>
				<div class="form-check mr-sm-2">
					<input class="form-check-input" type="checkbox" value="" id="cbOrto_post">
					<label class="form-check-label" >
						Orto post
					</label>
				</div>
			</div>
			<div class="text-white">
				<div class="form-check mr-sm-2">
					<input class="form-check-input" type="checkbox" value="" id="cbFotos_pre">
					<label class="form-check-label" >
						Fotos pre
					</label>
				</div>
				<div class="form-check mr-sm-2">
					<input class="form-check-input" type="checkbox" value="" id="cbFotos_post">
					<label class="form-check-label" >
						Fotos post
					</label>
				</div>
			</div>
			<div class="text-white">
				<div class="form-check mr-sm-2">
					<input class="form-check-input" type="checkbox" value="" id="cbFotos_protesis_pre">
					<label class="form-check-label" >
						Foto protesis pre
					</label>
				</div>
				<div class="form-check mr-sm-2">
					<input class="form-check-input" type="checkbox" value="" id="cbFotos_protesis_post">
					<label class="form-check-label" >
						Foto protesis post
					</label>
				</div>
			</div>
			<div class="text-white">
				<div class="form-check mr-sm-2">
					<input class="form-check-input" type="checkbox" value="" id="cbFotos_protesis_boca_pre">
					<label class="form-check-label" >
						Foto protesis en boca pre
					</label>
				</div>
				<div class="form-check mr-sm-2">
					<input class="form-check-input" type="checkbox" value="" id="cbFotos_protesis_boca_post">
					<label class="form-check-label" >
						Foto protesis en boca post
					</label>
				</div>
			</div>
			<div class="text-white">
				<div class="form-check mr-sm-2">
					<input class="form-check-input" type="checkbox" value="" id="cbVideo_pre">
					<label class="form-check-label" >
						Video pre
					</label>
				</div>
				<div class="form-check mr-sm-2">
					<input class="form-check-input" type="checkbox" value="" id="cbVideo_post">
					<label class="form-check-label" >
						Video post
					</label>
				</div>
			</div>
			<div class="border border-warning py-2 px-2 rounded-lg">
				<div class="custom-control custom-switch text-white ">
					<input type="checkbox" class="custom-control-input" id="customSwitch1">
					<label class="custom-control-label" for="customSwitch1">Invertir</label>
				</div>
			</div>
		</nav>
	</div>

	<div class="table-responsive-sm text-center" id="app">
		<table class="table table-hover table-dark consulta">
			<thead>
				<tr>
					<th scope="col"></th>
					<th scope="col">Cod</th>
					<th scope="col">Nombre</th>
					<th scope="col">Tratamiento</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody id="tablaPacientesConsulta">

			</tbody>
		</table>
		<div class="modal fade modal-ficha-cliente" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="nombrep"></h5>

						<h5 class="modal-title ml-auto" id="codigop"></h5>
					</div>
					<ul class="nav nav-tabs" id="tabTratamiento" role="tablist">
						@foreach($pacientes as $paciente)
						<li class="nav-item active">
							<a class="nav-link " id="test" href="#"></a>
						</li>
						@endforeach
						<li class="ml-auto mr-sm-2">
							<a href="{{route('agregarTratamiento')}}"><button type="button" class="btn btn-lg btn-warning py-2" data-toggle="tooltip" data-placement="auto" title="Nuevo tratamiento"><i class="fas fa-plus"></i></button></a>
						</li>
					</ul>
					<div class="modal-body">
						<div class="tab-content" id="tabTratamiento">
							<div class="tab-pane fade show active" id="test" role="tabpanel" aria-labelledby="test-tab">
								<div class="row pb-2">
									<div class="col-md-10"></div>
									<div class="col-md-2">
										<button class="btn btn-lg btn-warning ml-auto"  data-toggle="tooltip" data-placement="auto" title="Modificar tratamiento" type="submit"><i class="fas fa-sync-alt"></i></button>
									</div>

								</div>
								<div class="row">
									<div class="col-md-6">
										<table class="table ">
											<tbody>
												<tr>
													<th scope="row">DOCTOR:</th>
													<td id="doctor_fichapaciente"></td>
												</tr>
												<tr>
													<th scope="row">ASESOR:</th>
													<td id="asesor_fichapaciente"></td>
												</tr>
												<tr>
													<th scope="row">TIPO DE IMPLANTE</th>
													<td id="tipo_implante_fichapaciente"></td>
												</tr>
												<tr>
													<th scope="row">CIRUGIA:</th>
													<td id="cirugia_fichapaciente"></td>
												</tr>
												<tr>
													<th scope="row">FECHA DE INICIO:</th>
													<td id="fecha_inicio_fichapaciente"></td>
												</tr>
												<tr>
													<th scope="row">FECHA DEFINITIVA</th>
													<td id="fecha_definitiva_fichapaciente"></td>
												</tr>
												<tr>
													<th scope="row"><i class="fab fa-dropbox"></i></th>
													<td><a href="" target="_blank" id="link_dropbox"></a></td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="col-md-3">
										<ul class="list-group list-group-flush">
											<li class="list-group-item"><i id="icono_picpre"></i> PIC provisional</li>
											<li class="list-group-item"><i id="icono_tacpre"></i> TAC pre</li>
											<li class="list-group-item"><i id="icono_ortopre"></i> Orto pre</li>
											<li class="list-group-item"><i id="icono_ioscanpre"></i> IOScan pre</li>
											<li class="list-group-item"><i id="icono_fotopre"></i> Fotos pre</li>
											<li class="list-group-item"><i id="icono_fotoprotesispre"></i> Fotos protesis pre</li>
											<li class="list-group-item"><i id="icono_fotoprotesisbocapre"></i> Fotos protesis en boca pre</li>
											<li class="list-group-item"><i id="icono_videopre"></i> Video pre</li>
										</ul>
									</div>
									<div class="col-md-3">
										<ul class="list-group list-group-flush">
											<li class="list-group-item"><i id="icono_picpost"></i> PIC definitivo</li>
											<li class="list-group-item"><i id="icono_tacpost"></i> TAC post</li>
											<li class="list-group-item"><i id="icono_ortopost"></i> Orto post</li>
											<li class="list-group-item"><i id="icono_ioscanpost"></i> IOScan post</li>
											<li class="list-group-item"><i id="icono_fotopost"></i> Fotos post</li>
											<li class="list-group-item"><i id="icono_fotoprotesispost"></i> Fotos protesis post</li>
											<li class="list-group-item"><i id="icono_fotoprotesisbocapost"></i> Fotos protesis en boca post</li>
											<li class="list-group-item"><i id="icono_videopost"></i> Video post</li>
										</ul>
									</div>
								</div>
							</div>
						<!--PRUEBA-LOS BOTONES SON PARA DESCARGAR
			<div class="form-row ">
							<div class="col-md-4 mx-auto">
								<input type="file" class="custom-file-input" id="customFileLang" lang="es">
								<label class="btn btn-lg custom-file-label" for="customFile" data-browse="Buscar..."><i class="fas fa-file-upload"></i> POWER POINT</label>
							</div>
							<div class="col-md-4 mx-auto">
								<input type="file" class="custom-file-input" id="customFileLang" lang="es">
								<label class="btn btn-lg custom-file-label" for="customFile" data-browse="Buscar..."><i class="fas fa-file-upload"></i> PDF</label>
							</div>
						</div>
					-->
					<div class="form-row py-2">
						<div class="col-md-4 mx-auto">
							<button class="btn btn-lg btn-warning btn-block" data-toggle="tooltip" data-placement="auto" title="Descargar Power Point"><i class="fas fa-download"></i> PPTX</button>
						</div>
						<div class="col-md-4 mx-auto">
							<button class="btn btn-lg btn-warning btn-block" data-toggle="tooltip" data-placement="auto" title="Descargar PDF"><i class="fas fa-download"></i> PDF</button>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-lg btn-warning mr-auto"  data-toggle="tooltip" data-placement="auto" title="Ver trabajo" type="submit"><i class="far fa-eye"></i> NOMBRE DEL TRABAJO</button>
				<a href="{{route('registroTrabajo')}}"><button type="button" class="btn btn-lg btn-warning" data-toggle="tooltip" data-placement="auto" title="Nuevo trabajo"><i class="fas fa-plus"></i></button></a>

			</div>
		</div>
	</div>
</div>
<!-- modal modificar -->
@endsection
</div>