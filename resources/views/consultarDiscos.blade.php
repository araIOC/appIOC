@extends('layout.app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-9">
	<button class="navbar-toggler col-12" type="button" data-toggle="collapse" data-target="#navbar2" aria-controls="navbar2" aria-expanded="false" aria-label="Toggle navigation">Filtros
		<span><i class="fas fa-angle-double-down"></i></span>
	</button>
	<div class="collapse navbar-collapse" id="navbar2">
		<form action="{{route('buscadorDisco')}}" method="POST">
			{{ csrf_field()}}
			<div class="form-row">
				<div class=" form-inline my-2 my-lg-0">
					<div class="input-group">
						<div class="input-group-prepend">
							<label class="input-group-text" for="inputGroupSelect01"><i class="far fa-object-ungroup"></i></label>
						</div>
						<select class="custom-select mr-sm-2" name="material" id="material">
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
						<select class="custom-select mr-sm-2" id="marca" name="marca">
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
						<select class="custom-select mr-sm-2" id="color" name="color">
							<option selected>Color...</option>
							@foreach($colores as $color)
							<option value="{{$color->nombreC}}" class="highlight">{{$color->nombreC}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<button class="btn btn-outline-warning my-2 my-sm-0 ml-auto" type="submit">Buscar... <i class="fas fa-search"></i></button>
			</div>
		</form>
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
		<tbody>
			@foreach($discos as $disco)
			<tr>
				<td data-toggle="modal" data-target=".modal-ficha-disco"></td>
				<th scope="row" data-toggle="modal" data-target=".modal-ficha-disco" data-codigoP="{{$disco->codigo}}">{{$disco->codigo}}</th>
				<td data-toggle="modal" data-target=".modal-ficha-disco">{{$disco->material}}</td>
				<td data-toggle="modal" data-target=".modal-ficha-disco">{{$disco->marca}}</td>
				<td>
					<button data-toggle="tooltip" data-placement="auto" title="Eliminar" class="btn btn-outline-warning mr-sm-2 mx-auto borrar" type="submit" name="{{$disco->codigo}}"><i class="fas fa-trash-alt"></i></button>

					<button data-toggle="tooltip" data-placement="auto" title="Modificar" class="btn btn-outline-warning mx-auto" type="submit"><i class="fas fa-sync-alt"></i></button>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="modal fade modal-ficha-disco" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-MD">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="nombrep"></h5>

					<h5 class="modal-title ml-auto" id="nombret"></h5>
				</div>
				<div class="modal-body">
					<div class="tab-content" id="tabTratamiento">
						<div class="tab-pane fade show active" id="test" role="tabpanel" aria-labelledby="test-tab">
							<div class="row pb-2">
								<div class="col-md-8"></div>
								<div class="col-md-4">
									<button class="btn btn-lg btn-warning ml-auto"  data-toggle="tooltip" data-placement="auto" title="Modificar trabajo" type="submit"><i class="fas fa-sync-alt"></i></button>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<table class="table ">
										<tbody>
											<tr>
												<th scope="row">MATERIAL:</th>
												<td id="material_fichatrabajo"></td>
											</tr>
											<tr>
												<th scope="row">TIPO DE TRABAJO:</th>
												<td id="tipotrabajo_fichatrabajo"></td>
											</tr>
											<tr>
												<th scope="row">NÚMERO DE PIEZAS:</th>
												<td id="npiezas_fichatrabajo"></td>
											</tr>
											<tr>
												<th scope="row">COLOR:</th>
												<td id="color_fichatrabajo"></td>
											</tr>
											<tr>
												<th scope="row">MÁQUINA:</th>
												<td id="maquina_fichatrabajo"></td>
											</tr>
											<tr>
												<th scope="row">NOTAS:</th>
												<td id="notas_fichatrabajo"></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="row py-2 px-2">
								<button class="btn btn-lg btn-warning btn-block"  data-toggle="tooltip" data-placement="auto" title="Ver disco" type="submit"><i class="fas fa-download"></i> STL</button>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-lg btn-warning mr-auto"  data-toggle="tooltip" data-placement="auto" title="Ver disco" type="submit"><i class="far fa-eye"></i> DISCO</button>
					<a href="{{route('registroDisco')}}"><button type="button" class="btn btn-lg btn-warning" data-toggle="tooltip" data-placement="auto" title="Nuevo disco"><i class="fas fa-plus"></i></button></a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

