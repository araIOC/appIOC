$(document).ready(function(){

	filtroTratamientoPaciente();
	buscarDisco();
	buscarTrabajo();
	buscarPaciente();

	$( "#materialDisco,#marcaDisco,#colorDisco" ).on('change', function() {
		buscarDisco();
	});

	$( "#nombrePTrabajo,#codigoPTrabajo,#materialTrabajo,#tipo_trabajo" ).on('change keyup', function() {
		buscarTrabajo();
	});

	$( "#nombrePaciente,#codigoPaciente,#nombreT,#tipo_implante,#doctorPaciente,#asesorPaciente,"+
		"#cbTac_pre,#CBpic_definitivo,#CBpic_provisional,#cbTac_post,#cbIOScan_pre,#cbIOScan_post,#cbOrto_pre,#cbOrto_post,"+
		"#cbFotos_pre,#cbFotos_post,#cbFotos_protesis_pre,#cbFotos_protesis_post,#cbFotos_protesis_boca_pre,"+
		"#cbFotos_protesis_boca_post,#cbVideo_pre,#cbVideo_post,#customSwitch1,[name='rbCirugia'],[name='rangoFecha']" ).on('change keyup click', function() {
			buscarPaciente();
		});
		$("#Dfecha_inicial,#Dfecha_final" ).on('change', function() {
			buscarPaciente();
		});
	});

$( "#modificar-tratamiento" ).on('click', function() {
	modificarDoctorPaciente();
	modificarAsesorPaciente();
	modificarImplantePaciente();
});

$( "#modificar-trabajo" ).on('click', function() {
	modificarMaterialTrabajo();
	modificarTipoTrabajo();
	modificarColorTrabajo();
	modificarDiscoTrabajo();
	modificarMaquinaTrabajo();
});

$( "#modificar-disco" ).on('click', function() {
	modificarColorDisco();
	modificarMaterialDisco();
	modificarMarcaDisco();
});

$("#limpiarFiltroPacientes").click(function () {
	$("[name='rbCirugia']:checked").prop( "checked", false );
	$("[name='rangoFecha']:checked").prop( "checked", false );
	$("#nombrePaciente").val("");
	$("#codigoPaciente").val("");
	$("#nombreT").val($('#nombreT > option:first').val());
	$("#tipo_implante").val($('#tipo_implante > option:first').val());
	$("#doctorPaciente").val($('#doctorPaciente > option:first').val());
	$('#CBpic_provisional').prop('checked', false);
	$('#CBpic_definitivo').prop('checked', false);
	$('#cbTac_pre').prop('checked', false);
	$('#cbTac_post').prop('checked', false);
	$('#cbIOScan_pre').prop('checked', false);
	$('#cbIOScan_post').prop('checked', false);
	$('#cbOrto_pre').prop('checked', false);
	$('#cbOrto_post').prop('checked', false);
	$('#cbFotos_pre').prop('checked', false);
	$('#cbFotos_post').prop('checked', false);
	$('#cbFotos_protesis_pre').prop('checked', false);
	$('#cbFotos_protesis_post').prop('checked', false);
	$('#cbFotos_protesis_boca_pre').prop('checked', false);
	$('#cbFotos_protesis_boca_post').prop('checked', false);
	$('#cbVideo_pre').prop('checked', false);
	$('#cbVideo_post').prop('checked', false);
	$("#Dfecha_final").val("");
	$("#Dfecha_inicial").val("");
	$('#customSwitch1').prop('checked', false);
	buscarPaciente();
});

$("#limpiarFiltroDiscos").click(function () {
	$("#materialDisco").val($('#materialDisco > option:first').val());
	$("#marcaDisco").val($('#marcaDisco > option:first').val());
	$("#colorDisco").val($('#colorDisco > option:first').val());
	buscarDisco();
});

$("#limpiarFiltrosTrabajo").click(function () {
	$("#materialTrabajo").val($('#materialTrabajo > option:first').val());
	$("#tipo_trabajo").val($('#tipo_trabajo > option:first').val());
	$("#nombrePTrabajo").val("");
	$("#codigoPTrabajo").val("");
	buscarTrabajo();
});

$("#descargarPPTX").click(function () {
	var codigop = $(this).data('codigopaciente');
	alert(codigop);
	console.log(codigop);
	var _token = document.getElementsByName("_token")[0].value;
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		url: 'downloadFilepptx',
		method: 'post',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		data: {
			codigopaciente:codigop,
			_token: _token
		},
		success: function(result){
			//alert("aqui va un sweet alert");
			alert(codigop);
			console.log($(codigop));
			alert();
		},
		error: function () {

		}
	});
});

$('#insertarp').on("click","#insertarTratamiento",function () {
	alert("dcs");
	var _token = document.getElementsByName("_token")[0].value;
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		url: 'agregarTratamiento',
		method: 'post',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		data: {
			nombrePaciente: $('#nombrepaciente').val(),
			codigoPaciente: $('#codigopaciente').val(),
			nombreT: $( "#tratamiento_insert" ).val(),
			tipo_implante: $( "#implante_insert" ).val(),
			doctorPaciente: $('#doctor_insertTrat').val(),
			asesorPaciente: $('#asesor_insertTrat').val(),
			rbCirugia: $("input[name='c_insertTrat']:checked").val(),
			cbTac_pre : $('#tac_pre_insertTrat').prop('checked'),
			CBpic_definitivo : $('#pic_def_insertTrat').prop('checked'),
			CBpic_provisional : $('#pic_prov_insertTrat').prop('checked'),
			cbTac_post : $('#tac_post_insertTrat').prop('checked'),
			cbIOScan_pre : $('#ioscan_pre_insertTrat').prop('checked'),
			cbIOScan_post : $('#ioscan_post_insertTrat').prop('checked'),
			cbOrto_pre : $('#orto_pre_insertTrat').prop('checked'),
			cbOrto_post : $('#orto_post_insertTrat').prop('checked'),
			cbFotos_pre : $('#f_pre_insertTrat').prop('checked'),
			cbFotos_post : $('#f_post_insertTrat').prop('checked'),
			cbFotos_protesis_pre : $('#f_protesis_pre_insertTrat').prop('checked'),
			cbFotos_protesis_post : $('#f_protesis_post_insertTrat').prop('checked'),
			cbFotos_protesis_boca_pre : $('#f_protesisboca_pre_insertTrat').prop('checked'),
			cbFotos_protesis_boca_post : $('#f_protesisboca_post_insertTrat').prop('checked'),
			cbVideo_pre : $('#video_pre_insertTrat').prop('checked'),
			cbVideo_post : $('#video_post_insertTrat').prop('checked'),
			linkD : $('#link_insertTrat').val(),
			_token: _token
		},
		success: function(result){

		},
		error: function () {

		}
	});
});

$("#agregarPaciente").click(function(){
	if(!$('#codPacienteAgr').val() || !$('#nombrePacienteAgr').val()){
		Swal.fire(
			'Campos vacíos.',
			'Debe rellenar todos los campos.',
			'warning'
			)
	}else{
		var _token = document.getElementsByName("_token")[0].value;

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url: 'agregarPaciente',
			method: 'post',
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			data: {
				codigop: $('#codPacienteAgr').val(),
				nombrep: $('#nombrePacienteAgr').val(),
				_token: _token
			},
			success: function(result){
				Swal.fire({
					title: 'Paciente insertado.',
					text: "¿Desea agregarle un tratamiento?",
					type: 'question',
					confirmButtonText: 'Sí, ¡Agregar tratamiento!',
					showCancelButton: true,
					cancelButtonText:  'Cancelar',
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					reverseButtons: true

				}).then((result) => {
					if (result.value) {
						$.ajaxSetup({
							headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							}
						});
						$.ajax({
							url: 'registroTratamiento',
							method: 'post',
							headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
							data: {
								codigop: $('#codPacienteAgr').val(),
								nombrep: $('#nombrePacienteAgr').val(),
								_token: _token
							},
							success: function(result){

								$('#insertarp').html(result);

							}});

					}else{
						Swal.fire(
							'Paciente sin tratamiento.',
							'Puede agregarlo más tarde.',
							'info'
							)
					}
				})
			},
			error: function () {
				Swal.fire(
					'¡Error!',
					'Error al insertar el paciente.',
					'error'
					)
			}
		});
	}
});

$("#tablaDiscosConsulta").on("click", ".darBajaDisco", function(){
	Swal.fire({
		title: '¿Estás seguro?',
		text: "¿Desea dar de baja este registro?",
		type: 'warning',
		confirmButtonText: 'Sí, ¡Dar de baja!',
		showCancelButton: true,
		cancelButtonText:  'Cancelar',
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		reverseButtons: true

	}).then((result) => {
		if (result.value) {
			var _token = document.getElementsByName("_token")[0].value;
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				url: 'darBajaDisco',
				method: 'post',
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				data: {
					codigod: $(this).data('codigod'),
					_token: _token
				},
				success: function(result){
					Swal.fire(
						'¡Éxito!',
						'El disco se ha dado de baja.',
						'success'
						)
					buscarDisco();
				},
				error: function () {
					Swal.fire(
						'¡Error!',
						'No se ha podido dar de baja.',
						'error'
						)
				}
			});

		}else{
			Swal.fire(
				'',
				'El disco no se ha dado de baja.',
				'info'
				)
		}
	})
});

$("#modal-pacientes").on("click", "#modificar_tratamiento_paciente", function(){
	alert($("input[name='rbCirugia-modificar']:checked").val());
	Swal.fire({
		title: '¿Estás seguro?',
		text: "¿El registro se modificará?",
		type: 'warning',
		confirmButtonText: 'Modificar',
		showCancelButton: true,
		cancelButtonText:  'Cancelar',
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		reverseButtons: true

	}).then((result) => {
		if (result.value) {
			var _token = document.getElementsByName("_token")[0].value;
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				url: 'modificarTratamientoPaciente',
				method: 'post',
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				data: {
					id_pt:id_pt,
					codigoP:$('#codigop').text(),
					nombreP:$('#nombrep').text(),
					nombreD:doctor,
					nombreA:asesor,
					tipo_implante:implante,
					fecha_inicio:$('#f_inicio-modificar').val(),
					fecha_definitiva:$('#f_final-modificar').val(),
					pic_pre:$('#picprovisional-modificar').prop('checked'),
					pic_post:$('#picpost-modificar').prop('checked'),
					orto_pre:$('#ortopre-modificar').prop('checked'),
					orto_post:$('#ortopost-modificar').prop('checked'),
					fotos_pre:$('#fotopre-modificar').prop('checked'),
					fotos_post:$('#fotopost-modificar').prop('checked'),
					tac_pre:$('#tacpre-modificar').prop('checked'),
					tac_post:$('#tacpost-modificar').prop('checked'),
					ioscan_pre:$('#ioscanpre-modificar').prop('checked'),
					ioscan_post:$('#ioscanpost-modificar').prop('checked'),
					video_pre:$('#videopre-modificar').prop('checked'),
					video_post:$('#videopost-modificar').prop('checked'),
					foto_protesis_pre:$('#fotoprotesispre-modificar').prop('checked'),
					foto_protesis_post:$('#fotoprotesispost-modificar').prop('checked'),
					foto_protesis_boca_pre:$('#fotoprotesisbocapre-modificar').prop('checked'),
					foto_protesis_boca_post:$('#fotoprotesisbocapost-modificar').prop('checked'),
					link:linkDropbox,
					tratamiento:$('#tratamiento_actual').text(),
					c_guiada:$("input[name='rbCirugia-modificar']:checked").val(),
					_token: _token
				},
				success: function(result){
					Swal.fire(
						'¡Éxito!',
						'El paciente se ha modificado.',
						'success'
						);
					restaurarTrabajo();
					buscarTrabajo();
				},
				error: function () {
					Swal.fire(
						'¡Error!',
						'No se ha podido modificar.',
						'error'
						)
				}
			});
		}
	})
});

$("#modal-pacientes").on('click',"#cerrar_modal-modificar-paciente", function () {
	Swal.fire({
		title: '¿Estás seguro que desea volver?',
		text: "No se guardarán los datos modificados.",
		type: 'warning',
		confirmButtonText: 'Sí, volver',
		showCancelButton: true,
		cancelButtonText:  'Cancelar',
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		reverseButtons: true

	}).then((result) => {
		if (result.value) {
			restaurarPaciente();
		}
	})
});

$("#modal-trabajo").on("click", "#cerrar_modal-modificar-trabajo", function(){
	Swal.fire({
		title: '¿Estás seguro que desea volver?',
		text: "No se guardarán los datos modificados.",
		type: 'warning',
		confirmButtonText: 'Sí, volver',
		showCancelButton: true,
		cancelButtonText:  'Cancelar',
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		reverseButtons: true

	}).then((result) => {
		if (result.value) {
			restaurarTrabajo();
		}
	})
});

$("#modal-trabajo").on("click", "#modificar_trabajo", function(){
	Swal.fire({
		title: '¿Estás seguro?',
		text: "¿El registro se modificará?",
		type: 'warning',
		confirmButtonText: 'Modificar',
		showCancelButton: true,
		cancelButtonText:  'Cancelar',
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		reverseButtons: true

	}).then((result) => {
		if (result.value) {
			var _token = document.getElementsByName("_token")[0].value;
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				url: 'modificarTrabajo',
				method: 'post',
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				data: {
					id : id_trabajo,
					materialT : $('#materialTrabajoMod').val(),
					tipo_trabajoT : $('#tipoTrabajoMod').val(),
					npiezasT : $('#npiezas-modificar').val(),
					colorT : $('#colorTrabajoMod').val(),
					codigoDiscoT : $('#discoTrabajoMod').val(),
					maquinaT : $('#maquinaTrabajoMod').val(),
					notasT : $('#notas-modificar').val(),
					_token: _token
				},
				success: function(result){
					Swal.fire(
						'¡Éxito!',
						'El traabajo se ha modificado.',
						'success'
						);
					restaurarTrabajo();
					buscarTrabajo();
				},
				error: function () {
					Swal.fire(
						'¡Error!',
						'No se ha podido modificar.',
						'error'
						)
				}
			});
		}
	})
});

$("#modal-disco").on("click", "#cerrar_modal-modificar-disco", function(){
	Swal.fire({
		title: '¿Estás seguro que desea volver?',
		text: "No se guardarán los datos modificados.",
		type: 'warning',
		confirmButtonText: 'Sí, volver',
		showCancelButton: true,
		cancelButtonText:  'Cancelar',
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		reverseButtons: true

	}).then((result) => {
		if (result.value) {
			restaurarDisco();
		}
	})
});

$("#modal-disco").on("click", "#modificar_disco", function(){
	Swal.fire({
		title: '¿Estás seguro?',
		text: "¿El registro se modificará?",
		type: 'warning',
		confirmButtonText: 'Modificar',
		showCancelButton: true,
		cancelButtonText:  'Cancelar',
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		reverseButtons: true

	}).then((result) => {
		if (result.value) {
			var _token = document.getElementsByName("_token")[0].value;
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				url: 'modificarDisco',
				method: 'post',
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				data: {
					codigod: $('#cod_disco').text(),
					materiald: $('#materialDiscoMod').val(),
					marcad: $('#marcaDiscoMod').val(),
					escala:$('#escala-modificar').val(),
					altura:$('#altura-modificar').val(),
					colord:$('#colorDiscoMod').val(),
					fecha_altad:$('#fecha_alta_disco-mod').val(),
					_token: _token
				},
				success: function(result){
					Swal.fire(
						'¡Éxito!',
						'El disco se ha modificado.',
						'success'
						);
					restaurarDisco();
					buscarDisco();
				},
				error: function () {
					Swal.fire(
						'¡Error!',
						'No se ha podido modificar.',
						'error'
						)
				}
			});
		}
	})
});

function restaurarPaciente() {
	doctor = $('#doctorPacienteMod').val();
	asesor = $('#asesorPacienteMod').val();
	implanteMod = $("#implantePacienteMod").val();
	cirugia = $("input[name='rbCirugia-modificar']:checked").val();
	linkDropbox =$('#linkDropbox-modificar').val();
	finicio = $('#f_inicio-modificar').val();
	fdef = $('#f_final-modificar').val();
	$('.x-cerrar').hide();
	$('#row-btn-files').empty();
	$('#doctor_fichapaciente').empty();
	$('#asesor_fichapaciente').empty();
	$('#tipo_implante_fichapaciente').empty();
	$('#cirugia_fichapaciente').empty();
	$('#dropbox').empty();

	$('#footer-fichapaciente-modificar').remove();
	$('#doctor_fichapaciente').text(doctor);
	$('#asesor_fichapaciente').text(asesor);
	$('#tipo_implante_fichapaciente').text(implanteMod);
	$('#fecha_inicio_fichapaciente').text(finicio.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1'));
	$('#fecha_definitiva_fichapaciente').text(fdef.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1'));

	if(cirugia == 'rbcestatica-modificar'){
		cirugia = "Estática";
	}
	if(cirugia == 'rbcdinamica-modificar'){
		cirugia = "Dinámica";
	}

	$('#cirugia_fichapaciente').text(cirugia);

	$('#modal-pacientes').data('bs.modal')._config.backdrop = 'open';
	$('#modal-pacientes').data('bs.modal')._config.keyboard = true;
	$('.btn-fichacliente').show();
	$('#footer-fichapaciente').show();

	$('#picprovisional-modal').empty();
	$('#picpost-modal').empty();
	$('#tacpre-modal').empty();
	$('#tacpost-modal').empty();
	$('#ortopre-modal').empty();
	$('#ortopost-modal').empty();
	$('#ioscanpre-modal').empty();
	$('#ioscanpost-modal').empty();
	$('#fotopre-modal').empty();
	$('#fotopost-modal').empty();
	$('#fotoprotesispre-modal').empty();
	$('#fotoprotesispost-modal').empty();
	$('#fotoprotesisbocapre-modal').empty();
	$('#fotoprotesisbocapost-modal').empty();
	$('#videopre-modal').empty();
	$('#videopost-modal').empty();

	$('#picprovisional-modal').append('<i id="icono_picpre"></i> PIC provisional');
	$('#tacpre-modal').append('<i id="icono_tacpre"></i> TAC pre');
	$('#ortopre-modal').append('<i id="icono_ortopre"></i> Orto pre');
	$('#ioscanpre-modal').append('<i id="icono_ioscanpre"></i> IOScan pre');
	$('#fotopre-modal').append('<i id="icono_fotopre"></i> Fotos pre');
	$('#fotoprotesispre-modal').append('<i id="icono_fotoprotesispre"></i> Fotos protesis pre');
	$('#fotoprotesisbocapre-modal').append('<i id="icono_fotoprotesisbocapre"></i> Fotos protesis en boca pre');
	$('#videopre-modal').append('<i id="icono_videopre"></i> Video pre');

	resetearCB("#icono_picpre",'#picprovisional-modal');
	resetearCB("#icono_tacpre",'#tacpre-modal');
	resetearCB("#icono_ortopre",'#ortopre-modal');
	resetearCB("#icono_ioscanpre",'#ioscanpre-modal');
	resetearCB("#icono_fotopre",'#fotopre-modal');
	resetearCB("#icono_fotoprotesispre",'#fotoprotesispre-modal');
	resetearCB("#icono_fotoprotesisbocapre",'#fotoprotesisbocapre-modal');
	resetearCB("#icono_videopre",'#videopre-modal');

	$('#picpost-modal').append('<i id="icono_picpost"></i> PIC definitivo');
	$('#tacpost-modal').append('<i id="icono_tacpost"></i> TAC post');
	$('#ortopost-modal').append('<i id="icono_ortopost"></i> Orto post');
	$('#ioscanpost-modal').append('<i id="icono_ioscanpost"></i> IOScan post');
	$('#fotopost-modal').append('<i id="icono_fotopost"></i> Fotos post');
	$('#fotoprotesispost-modal').append('<i id="icono_fotoprotesispost"></i> Fotos protesis post');
	$('#fotoprotesisbocapost-modal').append('<i id="icono_fotoprotesisbocapost"></i> Fotos protesis en boca post');
	$('#videopost-modal').append('<i id="icono_videopost"></i> Video post');

	resetearCB("#icono_picpost",'#picpost-modal');
	resetearCB("#icono_tacpost",'#tacpost-modal');
	resetearCB("#icono_ortopost",'#ortopost-modal');
	resetearCB("#icono_ioscanpost",'#ioscanpost-modal');
	resetearCB("#icono_fotopost",'#fotopost-modal');
	resetearCB("#icono_fotoprotesispost",'#fotoprotesispost-modal');
	resetearCB("#icono_fotoprotesisbocapost",'#fotoprotesisbocapost-modal');
	resetearCB("#icono_videopost",'#videopost-modal');

	$('#dropbox').append('<a href="" target="_blank" id="link_dropbox">' + linkDropbox + '</a>');

	$('#row-btn-files').append('<div class="col-md-4 mx-auto" id="powerpoint-modal">'+
		'<a  id="descargarPPTX"><button class="btn btn-lg btn-warning btn-block" data-toggle="tooltip" data-placement="auto" title="Power Point"><i class="fas fa-download"></i> PPTX</button></a>'+
		' </div>'+
		'<div class="col-md-4 mx-auto" id="pdf-modal">'+
		'<button class="btn btn-lg btn-warning btn-block" data-toggle="tooltip" data-placement="auto" title="PDF"><i class="fas fa-download"></i> PDF</button>'+
		'</div>');
}

function restaurarDisco() {
	$('#modal-disco').data('bs.modal')._config.backdrop = 'open';
	$('#modal-disco').data('bs.modal')._config.keyboard = true;

	$('#modificar-disco').show();

	materialD = $('#materialDiscoMod').val();
	marcad = $('#marcaDiscoMod').val();
	escala = $('#escala-modificar').val();
	altura = $('#altura-modificar').val();
	color = $('#colorDiscoMod').val();
	fecha = $('#fecha_alta_disco-mod').val();


	$('#material_fichadisco').empty();
	$('#marca_fichadisco').empty();
	$('#escala_fichadisco').empty();
	$('#altura_fichadisco').empty();
	$('#color_fichadisco').empty();

	$('#material_fichadisco').text(materialD);
	$('#marca_fichadisco').text(marcad);
	$('#escala_fichadisco').text(escala);
	$('#altura_fichadisco').text(altura);
	$('#color_fichadisco').text(color);
	$('#fecha_alta_fichadisco').text(fecha.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1'));

	$('#ficha-disco').show();

	$('#footer-fichadisco-modificar').remove();
}

function restaurarTrabajo() {
	$('#modal-trabajo').data('bs.modal')._config.backdrop = 'open';
	$('#modal-trabajo').data('bs.modal')._config.keyboard = true;

	$('.btn-fichatrabajo').show();
	$('#footer-trabajo').show();

	material = $('#materialTrabajoMod').val();
	tipo_trabajo = $('#tipoTrabajoMod').val();
	npiezas = $('#npiezas-modificar').val();
	color = $('#colorTrabajoMod').val();
	codigoDisco = $('#discoTrabajoMod').val();
	maquina = $('#maquinaTrabajoMod').val();
	notas = $('#notas-modificar').val();

	$('#material_fichatrabajo').empty();
	$('#tipotrabajo_fichatrabajo').empty();
	$('#npiezas_fichatrabajo').empty();
	$('#color_fichatrabajo').empty();
	$('#codDisco_fichatrabajo').empty();
	$('#maquina_fichatrabajo').empty();
	$('#notas_fichatrabajo').empty();

	$('#material_fichatrabajo').text(material);
	$('#tipotrabajo_fichatrabajo').text(tipo_trabajo);
	$('#npiezas_fichatrabajo').text(npiezas);
	$('#color_fichatrabajo').text(color);
	$('#codDisco_fichatrabajo').text(codigoDisco);
	$('#maquina_fichatrabajo').text(maquina);
	$('#notas_fichatrabajo').text(notas);

	$('#row-btn-stl').empty();
	$('#row-btn-stl').append('<button class="btn btn-lg btn-warning btn-block"  data-toggle="tooltip" data-placement="auto" title="Descargar STL" type="submit"><i class="fas fa-download"></i> STL</button>');

	$('#footer-fichatrabajo-modificar').remove();

	if($('#row-btn-stl').hasClass('sin_stl')){
		$('#row-btn-stl').hide();
	}else if($('#row-btn-stl').hasClass('con_stl')){
		$('#row-btn-stl').show();
	}
}

function modificarMaterialTrabajo(){
	var _token = document.getElementsByName("_token")[0].value;
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		url: 'modificarMaterialTrabajo',
		method: 'post',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		data: {
			material: material,
			_token: _token
		},
		success: function(result){
			$('#material_fichatrabajo').html(result);
		},
		error: function () {

		}
	});
}

function modificarTipoTrabajo(){
	var _token = document.getElementsByName("_token")[0].value;
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		url: 'modificarTipoTrabajo',
		method: 'post',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		data: {
			tipo_trabajo: tipo_trabajo,
			_token: _token
		},
		success: function(result){
			$('#tipotrabajo_fichatrabajo').html(result);
		},
		error: function () {

		}
	});
}

function modificarColorTrabajo(){
	var _token = document.getElementsByName("_token")[0].value;
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		url: 'modificarColorTrabajo',
		method: 'post',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		data: {
			colorT: color,
			_token: _token
		},
		success: function(result){
			$('#color_fichatrabajo').html(result);
		},
		error: function () {

		}
	});
}

function modificarMaquinaTrabajo(){
	var _token = document.getElementsByName("_token")[0].value;
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		url: 'modificarMaquinaTrabajo',
		method: 'post',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		data: {
			colorT: color,
			_token: _token
		},
		success: function(result){
			$('#maquina_fichatrabajo').html(result);
		},
		error: function () {

		}
	});
}

function modificarMarcaDisco(){
	var _token = document.getElementsByName("_token")[0].value;
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		url: 'modificarMarcaDisco',
		method: 'post',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		data: {
			marcad: marcad,
			_token: _token
		},
		success: function(result){
			$('#marca_fichadisco').html(result);
		},
		error: function () {

		}
	});
}

function modificarColorDisco(){
	var _token = document.getElementsByName("_token")[0].value;
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		url: 'modificarColorDisco',
		method: 'post',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		data: {
			colorD: color,
			_token: _token
		},
		success: function(result){
			$('#color_fichadisco').html(result);
		},
		error: function () {

		}
	});
}

function modificarMaterialDisco(){
	var _token = document.getElementsByName("_token")[0].value;
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		url: 'modificarMaterialDisco',
		method: 'post',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		data: {
			materialD: materialD,
			_token: _token
		},
		success: function(result){
			$('#material_fichadisco').html(result);
		},
		error: function () {

		}
	});
}

function modificarDiscoTrabajo(){
	var _token = document.getElementsByName("_token")[0].value;
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		url: 'modificarDiscoTrabajo',
		method: 'post',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		data: {
			codigoDisco: codigoDisco,
			_token: _token
		},
		success: function(result){
			$('#codDisco_fichatrabajo').html(result);
		},
		error: function () {

		}
	});
}

function modificarMaquinaTrabajo(){
	var _token = document.getElementsByName("_token")[0].value;
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		url: 'modificarMaquinaTrabajo',
		method: 'post',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		data: {
			maquinaT: maquina,
			_token: _token
		},
		success: function(result){
			$('#maquina_fichatrabajo').html(result);
		},
		error: function () {

		}
	});
}

function modificarImplantePaciente(){
	var _token = document.getElementsByName("_token")[0].value;
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		url: 'modificarImplantePaciente',
		method: 'post',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		data: {
			implante: implante,
			_token: _token
		},
		success: function(result){
			$('#tipo_implante_fichapaciente').html(result);
		},
		error: function () {

		}
	});
}

function modificarDoctorPaciente(){
	var _token = document.getElementsByName("_token")[0].value;
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		url: 'modificarDoctorPacientes',
		method: 'post',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		data: {
			nombreDoctor: doctor,
			_token: _token
		},
		success: function(result){
			$('#doctor_fichapaciente').html(result);
		},
		error: function () {

		}
	});
}

function modificarAsesorPaciente(){
	var _token = document.getElementsByName("_token")[0].value;
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		url: 'modificarAsesorPacientes',
		method: 'post',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		data: {
			nombreAsesor: asesor,
			_token: _token
		},
		success: function(result){
			$('#asesor_fichapaciente').html(result);
		},
		error: function () {

		}
	});
}

function buscarPaciente(){
	var _token = document.getElementsByName("_token")[0].value;
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		url: 'buscadorPaciente',
		method: 'post',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		data: {
			nombrePaciente: $('#nombrePaciente').val(),
			codigoPaciente: $('#codigoPaciente').val(),
			nombreT: $( "#nombreT" ).val(),
			tipo_implante: $( "#tipo_implante" ).val(),
			doctorPaciente: $('#doctorPaciente').val(),
			asesorPaciente: $('#asesorPaciente').val(),
			rbCirugia: $("input[name='rbCirugia']:checked").val(),
			cbTac_pre : $('#cbTac_pre').prop('checked'),
			CBpic_definitivo : $('#CBpic_definitivo').prop('checked'),
			CBpic_provisional : $('#CBpic_provisional').prop('checked'),
			cbTac_post : $('#cbTac_post').prop('checked'),
			cbIOScan_pre : $('#cbIOScan_pre').prop('checked'),
			cbIOScan_post : $('#cbIOScan_post').prop('checked'),
			cbOrto_pre : $('#cbOrto_pre').prop('checked'),
			cbOrto_post : $('#cbOrto_post').prop('checked'),
			cbFotos_pre : $('#cbFotos_pre').prop('checked'),
			cbFotos_post : $('#cbFotos_post').prop('checked'),
			cbFotos_protesis_pre : $('#cbFotos_protesis_pre').prop('checked'),
			cbFotos_protesis_post : $('#cbFotos_protesis_post').prop('checked'),
			cbFotos_protesis_boca_pre : $('#cbFotos_protesis_boca_pre').prop('checked'),
			cbFotos_protesis_boca_post : $('#cbFotos_protesis_boca_post').prop('checked'),
			cbVideo_pre : $('#cbVideo_pre').prop('checked'),
			cbVideo_post : $('#cbVideo_post').prop('checked'),
			Dfecha_inicial : $('#Dfecha_inicial').val(),
			fecha_definitiva : $('#Dfecha_final').val(),
			invertir : $('#customSwitch1').prop('checked'),
			rangoFecha: $("[name='rangoFecha']:checked").val(),
			_token: _token
		},
		success: function(result){
			$('#tablaPacientesConsulta').html(result);

		},
		error: function () {

		}
	});
}

function buscarTrabajo(){
	var _token = document.getElementsByName("_token")[0].value;

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		url: 'buscadorTrabajo',
		method: 'post',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		data: {
			nombrePTrabajo: $('#nombrePTrabajo').val(),
			codigoPTrabajo: $('#codigoPTrabajo').val(),
			materialTrabajo: $( "#materialTrabajo" ).val(),
			tipo_trabajo: $( "#tipo_trabajo" ).val(),
			_token: _token
		},
		success: function(result){

			$('#tablaTrabajosConsulta').html(result);

		}});
}

function buscarDisco (){
	var _token = document.getElementsByName("_token")[0].value;

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		url: 'buscadorDisco',
		method: 'post',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		data: {
			materialDisco: $( "#materialDisco" ).val(),
			marcaDisco: $( "#marcaDisco" ).val(),
			colorDisco: $( "#colorDisco" ).val(),
			_token: _token
		},
		success: function(result){

			$('#tablaDiscosConsulta').html(result);

		}});
}

function filtroTratamientoPaciente(){

	//rellenar select con los tratamientos del paciente introducido
	//al agregar un nuevo buscadorTrabajo
	$( "#codigopaciente" ).keyup(function() {
		var codigopaciente = document.getElementsByName("codigopaciente")[0].value;
		var _token = document.getElementsByName("_token")[0].value;
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url: 'filtroTratamientos',
			method: 'post',
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			data: {
				codigopaciente: codigopaciente,
				_token: _token
			},
			success: function(result){

				$('#tratamientop').html(result);

			}});
	});
}