
<div class="container py-4">
	<div class="row">
		<div class="col-ms-8 mx-auto">
			<div class="card border-0 px-4 py-4 text-white bg-dark font-weight-bold" id="form-tratamiento">
				{{ csrf_field()}}
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputDoctor">Código del paciente</label>
						<div class=" my-2 my-lg-0">
							<div class="input-group">
								<div class="input-group-prepend">
									<label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-tags"></i></label>
								</div>
								<input type="text" class="form-control" id="codigopaciente" placeholder="Código..." name="codigopaciente" value="{{$codigo}}">
							</div>
						</div>
					</div>
					<div class="form-group col-md-6">
						<label for="inputDoctor">Nombre del paciente</label>
						<div class=" my-2 my-lg-0">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fas fa-address-card"></i></span>
								</div>
								<input class="form-control mr-sm-2" type="search" placeholder="Nombre..." aria-label="Search" name="nombrePaciente" id="nombrepaciente" value="{{$nombre}}">
							</div>
						</div>
					</div>
					<div class="form-group col-md-6">
						<label for="inputTratamiento">Tratamiento</label>
						<div class=" my-2 my-lg-0">
							<div class="input-group">
								<div class="input-group-prepend">
									<label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-prescription-bottle-alt"></i></label>
								</div>
								<select class="custom-select mr-sm-2" id="tratamiento_insert" name="tratamiento_insert">
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
								<select class="custom-select mr-sm-2" id="implante_insert" name="implante_insert">
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
								<select class="custom-select mr-sm-2" id="docot" name="docot">
									<option selected>Elija un doctor...</option>
									@foreach($doctores as $doctor)
									<option value="{{$doctor->nombreD}}" class="highlight">{{$doctor->nombreD}}</option>
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
									<option value="{{$asesor->nombreA}}" class="highlight">{{$asesor->nombreA}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-2">
						<label for="inputTratamiento">Cirugía guiada </label>
						<div class="input-group">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="c_insertTrat" id="c_estatica_insertTrat" value="option1">
								<label class="form-check-label" for="inlineRadio1">Estática</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="c_insertTrat" id="c_dinamica_insertTrat" value="option2">
								<label class="form-check-label" for="inlineRadio2">Dinámica</label>
							</div>
						</div>
					</div>
					<div class="form-group col-md-2">
						<label for="inputTratamiento">PIC</label>
						<div class="mr-sm-2">
							<div class="form-check ">
								<input class="form-check-input" type="checkbox" value="" id="pic_prov_insertTrat">
								<label class="form-check-label" for="pic_prov_insertTrat">
									provisional
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="pic_def_insertTrat">
								<label class="form-check-label" for="pic_def_insertTrat">
									definitivo
								</label>
							</div>
						</div>

					</div>
					<div class="form-group col-md-1">
						<label for="inputTratamiento">TAC</label>
						<div class="form-check mr-sm-2">
							<input class="form-check-input" type="checkbox" value="" id="tac_pre_insertTrat">
							<label class="form-check-label" for="tac_pre_insertTrat">
								Pre
							</label>
						</div>
						<div class="form-check mr-sm-2">
							<input class="form-check-input" type="checkbox" value="" id="tac_post_insertTrat">
							<label class="form-check-label" for="tac_post_insertTrat">
								Post
							</label>
						</div>
					</div>
					<div class="form-group col-md-1">
						<label for="inputTratamiento">ORTO</label>
						<div class="form-check mr-sm-2">
							<input class="form-check-input" type="checkbox" value="" id="orto_pre_insertTrat">
							<label class="form-check-label" for="orto_pre_insertTrat">
								Pre
							</label>
						</div>
						<div class="form-check mr-sm-2">
							<input class="form-check-input" type="checkbox" value="" id="orto_post_insertTrat">
							<label class="form-check-label" for="orto_post_insertTrat">
								Post
							</label>
						</div>
					</div>

					<div class="form-group col-md-1">
						<label for="inputTratamiento">FOTOS</label>
						<div class="form-check mr-sm-2">
							<input class="form-check-input" type="checkbox" value="" id="f_pre_insertTrat">
							<label class="form-check-label" for="f_pre_insertTrat">
								Pre
							</label>
						</div>
						<div class="form-check mr-sm-2">
							<input class="form-check-input" type="checkbox" value="" id="f_post_insertTrat">
							<label class="form-check-label" for="f_post_insertTrat">
								Post
							</label>
						</div>
					</div>
					<div class="form-group col-md-2">
						<label for="inputTratamiento" class="text-dark">FOTOS</label>
						<div class="form-check mr-sm-2">
							<input class="form-check-input" type="checkbox" value="" id="f_protesis_pre_insertTrat">
							<label class="form-check-label" for="f_protesis_pre_insertTrat">
								Protesis pre
							</label>
						</div>
						<div class="form-check mr-sm-2">
							<input class="form-check-input" type="checkbox" value="" id="f_protesis_post_insertTrat">
							<label class="form-check-label" for="f_protesis_post_insertTrat">
								Protesis post
							</label>
						</div>
					</div>
					<div class="form-group col-md-3">
						<label for="inputTratamiento" class="text-dark">PROTESIS BOCA</label>
						<div class="form-check mr-sm-2">
							<input class="form-check-input" type="checkbox" value="" id="f_protesisboca_pre_insertTrat">
							<label class="form-check-label" for="f_protesisboca_pre_insertTrat">
								Protesis en boca pre
							</label>
						</div>
						<div class="form-check mr-sm-2">
							<input class="form-check-input" type="checkbox" value="" id="f_protesisboca_post_insertTrat">
							<label class="form-check-label" for="f_protesisboca_post_insertTrat">
								Protesis en boca post
							</label>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-2">
						<div class="mr-sm-2">
							<label for="inputTratamiento">IOScan</label>
							<div class="form-check mr-sm-2">
								<input class="form-check-input" type="checkbox" value="" id="ioscan_pre_insertTrat">
								<label class="form-check-label" for="ioscan_pre_insertTrat">
									Pre
								</label>
							</div>
							<div class="form-check mr-sm-2">
								<input class="form-check-input" type="checkbox" value="" id="ioscan_post_insertTrat">
								<label class="form-check-label" for="ioscan_post_insertTrat">
									Post
								</label>
							</div>
						</div>
					</div>
					<div class="form-group col-md-2">
						<label for="inputTratamiento">VIDEO</label>
						<div class="form-check mr-sm-2">

							<input class="form-check-input" type="checkbox" value="" id="video_pre_insertTrat">
							<label class="form-check-label" for="video_pre_insertTrat">
								Pre
							</label>
						</div>
						<div class="form-check mr-sm-2">
							<input class="form-check-input" type="checkbox" value="" id="video_post_insertTrat">
							<label class="form-check-label" for="video_post_insertTrat">
								Post
							</label>
						</div>
					</div>
					<div class="form-group col-md-8">
						<div class=" my-2 my-lg-0">
							<label for="inputTratamiento">Link Dropbox</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<label class="input-group-text" for="inputGroupSelect01"><i class="fab fa-dropbox"></i></label>
								</div>
								<input type="text" class="form-control" placeholder="Link de Dropbox" id="link_insertTrat">
							</div>
						</div>
					</div>
				</div>
				<div class="form-row pb-3">
					<div class="col-md-5 mx-auto">
						<input type="file" class="custom-file-input" id="customFileLang" lang="es">
						<label class="btn btn-lg custom-file-label" for="customFile" data-browse="Buscar..."><i class="fas fa-file-upload"></i> PPTX</label>
					</div>
					<div class="col-md-5 mx-auto">
						<input type="file" class="custom-file-input" id="customFileLang" lang="es">
						<label class="btn btn-lg custom-file-label" for="customFile" data-browse="Buscar..."><i class="fas fa-file-upload"></i> PDF</label>
					</div>
				</div>

				<button type="submit" class="btn btn-warning btn-lg btn-block" id="tablaDiscosConsulta"><i class="far fa-save"></i> Guardar</button>
			</div>
		</div>
	</div>
</div>

