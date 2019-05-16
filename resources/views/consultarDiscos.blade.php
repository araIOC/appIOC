@extends('layout.app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-9">
	<button class="navbar-toggler col-12" type="button" data-toggle="collapse" data-target="#navbar2" aria-controls="navbar2" aria-expanded="false" aria-label="Toggle navigation">Filtros
		<span><i class="fas fa-angle-double-down"></i></span>
	</button>
	<div class="collapse navbar-collapse" id="navbar2">
		{{ csrf_field()}}
		<div class=" form-inline my-2 my-lg-0">
			<div class="input-group">
				<div class="input-group-prepend">
					<label class="input-group-text" for="inputGroupSelect01"><i class="far fa-object-ungroup"></i></label>
				</div>
				<select class="custom-select mr-sm-2" name="materialDisco" id="materialDisco">
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
					<label class="input-group-text" for="inputGroupSelect01"><i class="far fa-hdd"></i></label>
				</div>
				<select class="custom-select mr-sm-2" id="marcaDisco" name="marcaDisco">
					<option selected>Marca...</option>
					@foreach($marcas as $marca)
					<option value="{{$marca->marcaD}}" class="highlight">{{$marca->marcaD}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class=" form-inline my-2 my-lg-0">
			<div class="input-group">
				<div class="input-group-prepend">
					<label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-palette"></i></label>
				</div>
				<select class="custom-select mr-sm-2" id="colorDisco" name="colorDisco">
					<option selected>Color...</option>
					@foreach($colores as $color)
					<option value="{{$color->nombreC}}" class="highlight">{{$color->nombreC}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-inline my-2 my-lg-0">
			<div class="input-group "  data-toggle="tooltip" data-placement="bottom" title="Fecha de alta">
				<div class="input-group-prepend">
					<label class="input-group-text" for="inputGroupSelect01"><i class="far fa-calendar-alt"></i></label>
				</div>
				<input class="form-control" type="date" id="fecha_alta" name="fecha_alta">
				<input class="form-control" type="date" id="fecha_alta2" name="fecha_alta2">
			</div>
		</div>
		<button class="btn btn-outline-warning my-2 my-sm-0 ml-auto" id="limpiarFiltroDiscos" type="submit"data-toggle="tooltip" data-placement="auto" title="Limpiar filtros">Limpiar... <i class="fas fa-brush"></i></button>
	</div>
</nav>
<div class="table-responsive-sm text-center" id="app">
	<table class="table table-hover table-dark consulta">
		<thead>
			<tr>
				<th scope="col"></th>
				<th scope="col">Cod</th>
				<th scope="col">Material</th>
				<th scope="col">Marca</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody id="tablaDiscosConsulta">


		</tbody>
	</table>
	<div class="modal fade modal-ficha-disco" tabindex="-1" role="dialog" id="modal-disco" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-MD">
			<div class="modal-content" id="ficha-disco">
				<div class="modal-header">

					<h5 class="modal-title" id="cod_disco"></h5>
					<button type="button" class="close mx-0 x-cerrar" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<ul class="nav nav-tabs" id="tabTrabajo" role="tablist">
					<li class="ml-auto mr-sm-2" id="conten_btn">
						<button class="btn btn-lg btn-warning ml-auto mr-2" id="modificar-disco"  data-toggle="tooltip" data-placement="auto" title="Modificar disco" type="submit"><i class="fas fa-sync-alt"></i></button>
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
												<td id="material_fichadisco"></td>
											</tr>
											<tr>
												<th scope="row">MARCA:</th>
												<input type="hidden" id="hidden_marca">
												<td id="marca_fichadisco"></td>
											</tr>
											<tr>
												<th scope="row">ESCALA:</th>
												<input type="hidden" id="hidden_escala">
												<td id="escala_fichadisco"></td>
											</tr>
											<tr>
												<th scope="row">ALTURA:</th>
												<input type="hidden" id="hidden_altura">
												<td id="altura_fichadisco"></td>
											</tr>
											<tr>
												<th scope="row">COLOR:</th>
												<input type="hidden" id="hidden_color">
												<td id="color_fichadisco"></td>
											</tr>
											<tr>
												<th scope="row">FECHA DE ALTA:</th>
												<input type="hidden" id="hidden_fecha_alta_disco">
												<td id="fecha_alta_fichadisco"></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection

