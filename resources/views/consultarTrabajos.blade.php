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
				<input class="form-control mr-sm-2" type="search" placeholder="Nombre del paciente..." aria-label="Search">
			</div>
		</form>
		<form class="form-inline my-2 my-lg-0">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1"><i class="fas fa-tags"></i></span>
				</div>
				<input class="form-control mr-sm-2" type="search" placeholder="Código del paciente..." aria-label="Search">
			</div>
		</form>
		<div class=" form-inline my-2 my-lg-0">
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
		<div class=" form-inline my-2 my-lg-0">
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
		<button class="btn btn-outline-warning my-2 my-sm-0 ml-auto" type="submit">Buscar... <i class="fas fa-search"></i></button>
	</div>
</nav>
@endsection

</div>