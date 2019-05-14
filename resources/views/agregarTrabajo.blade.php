
<div class="container py-4">
	<div class="row">
		<div class="col-md-8 mx-auto">
			<div class="card border-0 px-4 py-4 text-white bg-dark font-weight-bold">
				{!! csrf_field() !!}

				<div class="form-row">
					<div class="form-group col-md-6">
						<input type="hidden" value="{{$id_pt}}" id="id_pt_trabajo">
						<label for="inputDoctor">Código del paciente</label>
						<div class=" my-2 my-lg-0">
							<div class="input-group">
								<div class="input-group-prepend">
									<label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-tags"></i></label>
								</div>
								<input type="text" class="form-control" value="{{$codigo}}" id="codigopaciente" placeholder="Nombre..." name="codigopaciente" disabled>
							</div>
						</div>
					</div>
					<div class="form-group col-md-6">
						<label for="inputDoctor">Nombre del paciente</label>
						<div class=" my-2 my-lg-0">
							<div class="input-group">
								<div class="input-group-prepend">
									<label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-tags"></i></label>
								</div>
								<input type="text" class="form-control" value="{{$nombre}}" id="nombrePacienteTrabajo" placeholder="Código..." name="nombrePacienteTrabajo" disabled>
							</div>
						</div>
					</div></div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="inputTratamiento">Tratamiento</label>
							<div class=" my-2 my-lg-0">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="input-group-text" for="inputGroupSelect01"><i class="far fa-object-ungroup"></i></label>
									</div>
									<input type="text" class="form-control" value="{{$tratamiento}}" id="tratamientop" placeholder="Código..." name="tratamientop" disabled>
								</div>
							</div>
						</div>

						<div class="form-group col-md-4">
							<label for="inputTratamiento">Material</label>
							<div class=" my-2 my-lg-0">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="input-group-text" for="inputGroupSelect01"><i class="far fa-object-ungroup"></i></label>
									</div>
									<select class="custom-select mr-sm-2" id="material_trabajo" name="material_trabajo">
										<option selected>Elija un material...</option>
										@foreach($materiales as $material)
										<option value="{{$material->nombreM}}" class="highlight">{{$material->nombreM}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>

						<div class="form-group col-md-4">
							<label for="inputImplante">Tipo de trabajo</label>
							<div class=" my-2 my-lg-0">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-briefcase"></i></label>
									</div>
									<select class="custom-select mr-sm-2" id="t_trabajo" name="t_trabajo">
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
									<input type="text" class="form-control" id="numeroPiezas" name="piezas" placeholder="10...">
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
									<select class="custom-select mr-sm-2" id="color_trabajo" name="color_trabajo">
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
									<select class="custom-select mr-sm-2" id="codigoDisco_trabajo" name="codigoDisco_trabajo">
										<option selected>Nº disco...</option>
										@foreach($discos as $disco)
										<option value="{{$disco->codigoD}}" class="highlight">{{$disco->codigoD}}</option>
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
									<select class="custom-select mr-sm-2" id="maquina_trabajo" name="maquina_trabajo">
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
											<input class="form-control" type="date" value="2011-08-19" id="fecha_alta_trabajo" data-toggle="tooltip" data-placement="auto" title="Fecha inicial">
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
					<div class="form-row pb-3">
						<div class="col-md-12 mx-auto input-group">
							<label for="inputDoctor">STL</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-file"></i></span>
								</div>
								<input type="text" class="form-control p-2" placeholder="STL" name="stl_insertTrab" id="stl_insertTrab">
							</div>
						</div>
					</div>
					<a id="insertarTrabajo">
						<button type="submit" class="btn btn-warning btn-lg btn-block" id="insertarTrabajo"><i class="fas fa-save"></i> Guardar</button>
					</a>
				</div>
			</div>
		</div>
	</div>

