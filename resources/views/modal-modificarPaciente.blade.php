<div class="modal fade modal-ficha-cliente" id="modificarPacientel" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl" >
		<div class="modal-content" id="ficha-paciente-tratamiento">
			<div class="modal-header">
				<h5 class="modal-title" id="nombrep"></h5>

				<h5 class="modal-title ml-auto" id="codigop"></h5>
			</div>
			<ul class="nav nav-tabs" id="tabTratamiento" role="tablist">

				<li class="nav-item active">
					<a class="nav-link" id="tratamiento_actual"></a>
				</li>
			</ul>
			<div class="modal-body">
				<div class="tab-content" id="tabTratamiento">
					<div class="tab-pane fade show active" id="test" role="tabpanel" aria-labelledby="test-tab">
						<div class="row">
							<div class="col-md-6">
								<table class="table ">
									<tbody>
										<tr>
											<th scope="row">DOCTOR:</th>
											<td id="doctor_fichapaciente-mod">
												<select class="custom-select mr-sm-2" id="doctorPaciente" name="doctorPaciente">
													<option selected></option>

												</select>
											</td>
										</tr>
										<tr>
											<th scope="row">ASESOR:</th>
											<td id="asesor_fichapaciente-mod"></td>
										</tr>
										<tr>
											<th scope="row">TIPO DE IMPLANTE</th>
											<td id="tipo_implante_fichapaciente-mod"></td>
										</tr>
										<tr>
											<th scope="row">CIRUGIA:</th>
											<td id="cirugia_fichapaciente-mod"></td>
										</tr>
										<tr>
											<th scope="row">FECHA DE INICIO:</th>
											<td id="fecha_inicio_fichapaciente-mod"></td>
										</tr>
										<tr>
											<th scope="row">FECHA DEFINITIVA</th>
											<td id="fecha_definitiva_fichapaciente-mod"></td>
										</tr>
										<tr>
											<th scope="row"><i class="fab fa-dropbox"></i></th>
											<td id="dropbox"><a href="" target="_blank" id="link_dropbox"></a></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-md-3">
								<ul class="list-group list-group-flush">
									<li class="list-group-item" id="picprovisional-modal"><i id="icono_picpre"></i> PIC provisional</li>
									<li class="list-group-item" id="tacpre-modal"><i id="icono_tacpre"></i> TAC pre</li>
									<li class="list-group-item" id="ortopre-modal"><i id="icono_ortopre"></i> Orto pre</li>
									<li class="list-group-item" id="ioscanpre-modal"><i id="icono_ioscanpre"></i> IOScan pre</li>
									<li class="list-group-item" id="fotopre-modal"><i id="icono_fotopre"></i> Fotos pre</li>
									<li class="list-group-item" id="fotoprotesispre-modal"><i id="icono_fotoprotesispre"></i> Fotos protesis pre</li>
									<li class="list-group-item" id="fotoprotesisbocapre-modal"><i id="icono_fotoprotesisbocapre"></i> Fotos protesis en boca pre</li>
									<li class="list-group-item" id="videopre-modal"><i id="icono_videopre"></i> Video pre</li>
								</ul>
							</div>
							<div class="col-md-3">
								<ul class="list-group list-group-flush">
									<li class="list-group-item" id="picpost-modal"><i id="icono_picpost"></i> PIC definitivo</li>
									<li class="list-group-item" id="tacpost-modal"><i id="icono_tacpost"></i> TAC post</li>
									<li class="list-group-item" id="ortopost-modal"><i id="icono_ortopost"></i> Orto post</li>
									<li class="list-group-item" id="ioscanpost-modal"><i id="icono_ioscanpost"></i> IOScan post</li>
									<li class="list-group-item" id="fotopost-modal"><i id="icono_fotopost"></i> Fotos post</li>
									<li class="list-group-item" id="fotoprotesispost-modal"><i id="icono_fotoprotesispost"></i> Fotos protesis post</li>
									<li class="list-group-item" id="fotoprotesisbocapost-modal"><i id="icono_fotoprotesisbocapost"></i> Fotos protesis en boca post</li>
									<li class="list-group-item" id="videopost-modal"><i id="icono_videopost"></i> Video post</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="form-row py-2" id="row-btn-files">
						<div class="col-md-4 mx-auto" id="powerpoint-modal">
							<a href="{{route('downloadFilepptx')}}" id="descargarPPTX"><button class="btn btn-lg btn-warning btn-block" data-toggle="tooltip" data-placement="auto" title="Descargar Power Point"><i class="fas fa-download"></i> PPTX</button></a>
						</div>
						<div class="col-md-4 mx-auto" id="pdf-modal">
							<button class="btn btn-lg btn-warning btn-block" data-toggle="tooltip" data-placement="auto" title="Descargar PDF"><i class="fas fa-download"></i> PDF</button>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer" id="footer-fichapaciente">
				<button class="btn btn-lg btn-warning mr-auto"  data-toggle="tooltip" data-placement="auto" title="Ver trabajo" type="submit"><i class="far fa-eye"></i> NOMBRE DEL TRABAJO</button>
				<a href="{{route('registroTrabajo')}}"><button type="button" class="btn btn-lg btn-warning" data-toggle="tooltip" data-placement="auto" title="Nuevo trabajo"><i class="fas fa-plus"></i></button></a>

			</div>
		</div>
	</div>
</div>