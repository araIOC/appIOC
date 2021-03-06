@extends('layout.app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-9">
	<button class="navbar-toggler col-12" type="button" data-toggle="collapse" data-target="#navbar2" aria-controls="navbar2" aria-expanded="false" aria-label="Toggle navigation">Filtros
		<span><i class="fas fa-angle-double-down"></i></span>
	</button>
	<div class="collapse navbar-collapse" id="navbar2">
		{{ csrf_field()}}
		<div class="form-inline my-2 my-lg-0 ">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1"><i class="fas fa-address-card"></i></span>
				</div>
				<input name="nombrePTrabajo" id="nombrePTrabajo" class="form-control mr-sm-2" type="search" placeholder="Martel Alemán, Juan"  aria-label="Search">
			</div>
		</div>
		<div class="form-inline my-2 my-lg-0">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1"><i class="fas fa-tags"></i></span>
				</div>
				<input class="form-control mr-sm-2" type="search" placeholder="Código del paciente..." aria-label="Search" name="codigoPTrabajo" id="codigoPTrabajo">
			</div>
		</div>
		<div class=" form-inline my-2 my-lg-0">
			<div class="input-group">
				<div class="input-group-prepend">
					<label class="input-group-text" for="inputGroupSelect01"><i class="far fa-object-ungroup"></i></label>
				</div>
				<select class="custom-select mr-sm-2" id="materialTrabajo" name="materialTrabajo">
					<option selected>Material...</option>
					@foreach($materiales as $material)
					<option value="{{$material->nombreM}}" class="highlight">{{$material->nombreM}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class=" form-inline my-2 my-lg-0">
			<div class="input-group">
				<div class="input-group-prepend">
					<label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-briefcase"></i></label>
				</div>
				<select class="custom-select mr-sm-2" id="tipo_trabajo" name="tipo_trabajo">
					<option selected>Tipo de trabajo...</option>
					@foreach($tipos_trabajo as $tipo_trabajo)
					<option value="{{$tipo_trabajo->tipoT}}" class="highlight">{{$tipo_trabajo->tipoT}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<button class="btn btn-outline-warning my-2 my-sm-0 ml-auto" type="submit" id="limpiarFiltrosTrabajo" data-toggle="tooltip" data-placement="auto" title="Limpiar filtros">Limpiar... <i class="fas fa-brush"></i></button>
	</div>
</nav>
<div class="table-responsive-sm text-center" id="app">
	<table class="table table-hover table-dark consulta">
		<thead>
			<tr>
				<th scope="col">Cod Paciente</th>
				<th scope="col">Paciente</th>
				<th scope="col">Tipo de trabajo</th>
			</tr>
		</thead>
		<tbody id="tablaTrabajosConsulta">

		</tbody>
	</table>
	<div class="modal fade modal-ficha-trabajo" id="modal-trabajo" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-MD">
			<div class="modal-content" id="ficha-trabajo">
				<div class="modal-header">
					<h5 class="modal-title" id="nombrep"></h5>

					<h5 class="modal-title ml-auto" id="nombret"></h5>
					<input type="hidden" id="id_trabajo">

					<button type="button" class="close mx-0 x-cerrar" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<ul class="nav nav-tabs" id="tabTrabajo" role="tablist">
					<li class="ml-auto mr-sm-2" id="conten_btn">
						<a id="eliminar_trabajo">
							<button class="btn btn-lg btn-warning  mr-2 py-2 btn-fichatrabajo"data-toggle="tooltip" data-placement="auto" title="Eliminar trabajo" type="submit"><i class="fas fa-trash-alt"></i></button>
						</a>
						<a id="modificar-trabajo"><button class="btn btn-lg btn-warning ml-auto btn-fichatrabajo mr-2" id="modificar-trabajo" data-toggle="tooltip" data-placement="auto" title="Modificar trabajo" type="submit"><i class="fas fa-sync-alt"></i></button></a>
					</li>
				</ul>
				<div class="modal-body">
					<div class="tab-content" id="tabTratamiento">
						<div class="tab-pane fade show active" id="test" role="tabpanel" aria-labelledby="test-tab">
							<div class="row">
								<div class="col-md-12">
									<table class="table ">
										<tbody>
											<tr>
												<th scope="row">MATERIAL:</th>
												<input type="hidden" id="hidden_material">
												<td id="material_fichatrabajo"></td>
											</tr>
											<tr>
												<th scope="row">TIPO DE TRABAJO:</th>
												<input type="hidden" id="hidden_tipo_trabajo">
												<td id="tipotrabajo_fichatrabajo"></td>
											</tr>
											<tr>
												<th scope="row">NÚMERO DE PIEZAS:</th>
												<input type="hidden" id="hidden_n_piezas">
												<td id="npiezas_fichatrabajo"></td>
											</tr>
											<tr>
												<th scope="row">COLOR:</th>
												<input type="hidden" id="hidden_color_trabajo">
												<td id="color_fichatrabajo"></td>
											</tr>
											<tr>
												<th scope="row">MÁQUINA:</th>
												<input type="hidden" id="hidden_maquina">
												<td id="maquina_fichatrabajo"></td>
											</tr>
											<tr>
												<th scope="row">CÓDIGO DE DISCO:</th>
												<input type="hidden" id="hidden_cod_disco">
												<td id="codDisco_fichatrabajo"></td>
											</tr>
											<tr>
												<th scope="row">REPETIDO:</th>
												<input type="hidden" id="hidden_repetido">
												<td id="repetido_fichatrabajo"></td>
											</tr>
											<tr>
												<th scope="row">NOTAS:</th>
												<input type="hidden" id="hidden_notas">
												<td id="notas_fichatrabajo"></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col-md-12 py-2 px-2" id="row-btn-stl">
								<input type="hidden" id="hidden_stl">
								<a href="" target="_blank" id="descargarSTL">
									<button class="btn btn-lg btn-warning btn-block"  data-toggle="tooltip" data-placement="auto" title="Descargar STL" type="submit"><i class="fas fa-download"></i> STL</button>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer"  id="footer-trabajo">
					<button class="btn btn-lg btn-warning mr-auto"  data-toggle="tooltip" data-placement="auto" title="Ver disco" type="submit"><i class="far fa-eye"></i> DISCO</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection