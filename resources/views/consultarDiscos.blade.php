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
				<td data-toggle="modal" data-target=".modal-ficha-disco" data-codigod="{{$disco->codigo}}" data-materiald="{{$disco->material}}" data-escala="{{$disco->escala}}" data-color="{{$disco->color}}" data-fecha_alta="{{$disco->fecha_alta}}" data-altura="{{$disco->altura}}"></td>
				<th scope="row" data-toggle="modal" data-target=".modal-ficha-disco" data-codigod="{{$disco->codigo}}" data-materiald="{{$disco->material}}" data-escala="{{$disco->escala}}" data-color="{{$disco->color}}" data-fecha_alta="{{$disco->fecha_alta}}" data-altura="{{$disco->altura}}">{{$disco->codigo}}</th>
				<td data-toggle="modal" data-target=".modal-ficha-disco" data-codigod="{{$disco->codigo}}" data-materiald="{{$disco->material}}" data-escala="{{$disco->escala}}" data-color="{{$disco->color}}" data-fecha_alta="{{$disco->fecha_alta}}" data-altura="{{$disco->altura}}">{{$disco->material}}</td>
				<td data-toggle="modal" data-target=".modal-ficha-disco" data-codigod="{{$disco->codigo}}" data-materiald="{{$disco->material}}" data-escala="{{$disco->escala}}" data-color="{{$disco->color}}" data-fecha_alta="{{$disco->fecha_alta}}" data-altura="{{$disco->altura}}">{{$disco->marca}}</td>
				<td>
					<button data-toggle="tooltip" data-placement="auto" title="Dar de baja" class="btn btn-outline-warning mr-sm-2 mx-auto borrar" type="submit" name="{{$disco->codigo}}"><i class="fas fa-arrow-alt-circle-down"></i></button>

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

					<h5 class="modal-title ml-auto" id="cod_disco"></h5>
				</div>
				<div class="modal-body">
					<div class="tab-content" id="tabTratamiento">
						<div class="tab-pane fade show active" id="test" role="tabpanel" aria-labelledby="test-tab">
							<div class="row pb-2">
								<div class="col-md-10"></div>
								<div class="col-md-2">
									<button class="btn btn-lg btn-warning ml-auto"  data-toggle="tooltip" data-placement="auto" title="Modificar disco" type="submit"><i class="fas fa-sync-alt"></i></button>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<table class="table ">
										<tbody>
											<tr>
												<th scope="row">MATERIAL:</th>
												<td id="material_fichadisco"></td>
											</tr>
											<tr>
												<th scope="row">ESCALA:</th>
												<td id="escala_fichadisco"></td>
											</tr>
											<tr>
												<th scope="row">ALTURA:</th>
												<td id="altura_fichadisco"></td>
											</tr>
											<tr>
												<th scope="row">COLOR:</th>
												<td id="color_fichadisco"></td>
											</tr>
											<tr>
												<th scope="row">FECHA DE ALTA:</th>
												<td id="fecha_alta_fichadisco"></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-lg btn-warning mr-auto btn-block"  data-toggle="tooltip" data-placement="auto" title="Dar de baja" type="submit"><i class="fas fa-arrow-alt-circle-down"></i> DAR DE BAJA</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

