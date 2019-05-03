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
				'No se modificará el disco.',
				'info'
				)
		}
	})
});

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
}
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
