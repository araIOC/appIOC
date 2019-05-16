$(document).ready(function(){

	buscarDisco();
	buscarTrabajo();
	buscarPaciente();

	$( "#materialDisco,#marcaDisco,#colorDisco" ).on('change', function() {
		buscarDisco();
	});
	$("#fecha_alta,#fecha_alta2" ).on('change', function() {
		if($('#fecha_alta').val() > $('#fecha_alta2').val() && $('#fecha_alta2').val() && $('#fecha_alta').val()){
			Swal.fire(
				'¡Error!',
				'La fecha de inicio es posterior a la fecha definitiva.',
				'error'
				)
		}
		buscarDisco();
	});

	$( "#nombrePTrabajo,#codigoPTrabajo,#materialTrabajo,#tipo_trabajo" ).on('change keyup', function() {
		buscarTrabajo();
	});

	$('#nombrePaciente,#codigoPaciente').on('keyup' , function(){
		buscarPaciente();
	});

	$( "#nombreT,#tipo_implante,#doctorPaciente,#asesorPaciente,"+
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

$('#nombrePaciente').val(localStorage.getItem("nombrep"));
$('#codigoPaciente').val(localStorage.getItem("codigop"));
$('#nombreT').val(localStorage.getItem("nombreT"));
$('#codigoPaciente').keyup();
$('.filtros').click(function () {
	localStorage.setItem("nombrep", "");
	localStorage.setItem("codigop", "");
	localStorage.setItem("nombreT", "Elija un tratamiento...");
})

$( "#modal-pacientes" ).on('click','#modificar-tratamiento_actual', function() {
	Swal.fire({
		title: '¿Estás seguro que desea modificar el tratamiento?',
		type: 'warning',
		confirmButtonText: 'Sí, modificar',
		showCancelButton: true,
		cancelButtonText:  'Cancelar',
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		reverseButtons: true

	}).then((result) => {
		if (result.value) {
			ponerModificarTratamientoPaciente();
		}
	})
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
	$('#fecha_alta').val("");
	$('#fecha_alta2').val("");
	buscarDisco();
});

$("#limpiarFiltrosTrabajo").click(function () {
	$("#materialTrabajo").val($('#materialTrabajo > option:first').val());
	$("#tipo_trabajo").val($('#tipo_trabajo > option:first').val());
	$("#nombrePTrabajo").val("");
	$("#codigoPTrabajo").val("");
	buscarTrabajo();
});

$('#guardar_disco').click(function () {
	if($('#cod_disco').val() == "" || $('#material').val() == "Elija un material..." || $('#color').val() == "Color..." || $('#marca').val() == "Elija una marca..."){
		Swal.fire(
			'¡Atención!',
			'Los campos código, material, color y marca no pueden estar vacíos.',
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
			url: 'agregarDisco',
			method: 'post',
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			data: {
				codigod: $('#cod_disco').val(),
				material: $('#material').val(),
				marca: $('#marca').val(),
				escala: $('#escala').val(),
				color: $('#color').val(),
				altura: $('#altura').val(),
				_token: _token
			},
			success: function(result){
				window.location.href = "/disco";
			},
			error: function () {
				Swal.fire(
					'¡Error!',
					'No se ha podido insertar el disco.',
					'error'
					)
			}
		});
	}
});

$('#guardar_disco').click(function () {
	if($('#cod_disco').val() == "" || $('#material').val() == "Elija un material..." || $('#color').val() == "Color..." || $('#marca').val() == "Elija una marca..."){
		Swal.fire(
			'¡Atención!',
			'Los campos código, material, color y marca no pueden estar vacíos.',
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
			url: 'agergarDisco',
			method: 'post',
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			data: {
				codigod: $('#cod_disco').val(),
				material: $('#material').val(),
				marca: $('#marca').val(),
				escala: $('#escala').val(),
				color: $('#color').val(),
				altura: $('#altura').val(),
				_token: _token
			},
			success: function(result){
				window.location.href = "/disco";
			},
			error: function () {
				Swal.fire(
					'¡Error!',
					'No se ha podido insertar el disco.',
					'error'
					)
			}
		});
	}
});

$('#app').on("click","#guardarTratamiento",function () {
	var codigop =  $('#codigopaciente').val();
	var nombrep = $('#nombrepaciente').val();
	localStorage.setItem("nombrep", nombrep);
	localStorage.setItem("codigop", codigop);

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
			codigopaciente: $('#codigopaciente').val(),
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
			pptx : $('#pptx_insertTrat').val(),
			pdf : $('#pdf_insertTrat').val(),
			_token: _token
		},
		success: function(result){

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				url: 'agregar',
				method: 'get',
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				data: {
					_token: _token
				},
				success: function(result){
					window.location.href = "/app";

					Swal.fire(
						'¡Éxito!',
						'Tratamiento guardado.',
						'success'
						)
				}});
		},
		error: function(result){
			Swal.fire(
				'¡Error!',
				'No se ha podido agregar el tratamiento.',
				'error'
				)
		}
	});
});

$('#app').on('click','#insertarTrabajo',function () {
	var codigop =  $('#codigopaciente').val();
	var nombrep = $('#nombrePacienteTrabajo').val();
	var tratamiento = $('#tratamientop').val();
	localStorage.setItem("nombrep", nombrep);
	localStorage.setItem("codigop", codigop);
	localStorage.setItem("nombreT", tratamiento);


	if($('#codigoDisco_trabajo').val() == "Nº disco..." && $('#material_trabajo').val() == "Elija un material..."
		&& $('#t_trabajo').val() == "Tipo de trabajo..." && $('#color_trabajo').val() == "Color...."
		&& $('#maquina_trabajo').val() == "Máquina..."){
		Swal.fire(
			'¡Atención!',
			'Los campos código de disco, material, maquina, tipo de trabajo y color no pueden estar vacíos.',
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
			url: 'agregarTrabajo',
			method: 'post',
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			data: {
				id_pt : $('#id_pt_trabajo').val(),
				material_trabajo: $('#material_trabajo').val(),
				t_trabajo: $('#t_trabajo').val(),
				numeroPiezas: $('#numeroPiezas').val(),
				color_trabajo: $('#color_trabajo').val(),
				codigoDisco_trabajo: $('#codigoDisco_trabajo').val(),
				maquina_trabajo: $('#maquina_trabajo').val(),
				fecha_alta_trabajo: $('#fecha_alta_trabajo').val(),
				notas: $('#notas').val(),
				stl_insertTrab: $('#stl_insertTrab').val(),
				_token: _token
			},
			success: function(result){
				window.location.href = "/app";
			},
			error: function () {
				Swal.fire(
					'¡Error!',
					'No se ha podido insertar el trabajo.',
					'error'
					)
			}
		});
	}

});

$('#modal-pacientes').on("click", "#agregar_nuevo_tratamiento" ,function(){
	var _token = document.getElementsByName("_token")[0].value;

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
			codigop: $('#codigop').text(),
			nombrep: $('#nombrep').text(),
			_token: _token
		},
		success: function(result){

			$('#app').html(result);

		}});
});

$("#agregarPaciente").click(function(){
	var codigop =  $('#codPacienteAgr').val();
	var nombrep = $('#nombrePacienteAgr').val();
	localStorage.setItem("nombrep", nombrep);
	localStorage.setItem("codigop", codigop);
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
				codigop :codigop,
				nombrep: nombrep,
				_token: _token
			},
			success: function(result){
				Swal.fire({
					title: 'Paciente insertado.',
					text: "¿Desea agregarle un tratamiento?",
					type: 'question',
					confirmButtonText: 'Sí, ¡Agregar tratamiento!',
					showCancelButton: true,
					cancelButtonText:  'Más tarde.',
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
								codigop: "Cod: " + $('#codPacienteAgr').val(),
								nombrep: $('#nombrePacienteAgr').val(),
								_token: _token
							},
							success: function(result){

								$('#insertarp').html(result);

							}});

					}else{

						$.ajaxSetup({
							headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							}
						});
						$.ajax({
							url: 'agregar',
							method: 'get',
							headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
							data: {
								_token: _token
							},
							success: function(result){

								window.location.href = "/app";
								Swal.fire(
									'Paciente sin tratamiento.',
									'Puede agregarlo más tarde.',
									'info'
									)
							}});
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

$("#modal-trabajo").on("click", "#eliminar_trabajo", function(){
	Swal.fire({
		title: '¿Estás seguro?',
		text: "¿Desea eliminar este trabajo?",
		type: 'warning',
		confirmButtonText: 'Sí, ¡Eliminar!',
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
				url: 'eliminarTrabajo',
				method: 'post',
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				data: {
					id: $('#id_trabajo').val(),
					_token: _token
				},
				success: function(result){
					window.location.href = "/trabajos";
				},
				error: function () {
					Swal.fire(
						'¡Error!',
						'No se ha podido eliminar el trabajo.',
						'error'
						)
				}
			});

		}else{
			Swal.fire(
				'',
				'El trabajo no se ha eliminado.',
				'info'
				)
		}
	})
});

$("#modal-pacientes").on("click", "#modificar_tratamiento_paciente", function(){
	if($('#f_inicio-modificar').val() > $('#f_final-modificar').val()){
		Swal.fire(
			'¡Error!',
			'La fecha de inicio es posterior a la fecha definitiva.',
			'error'
			)
	}else{
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
						nombreT:$('#tratamiento_actual').text(),
						nuevoTratamiento:$('#tratamientoPacienteMod').val(),
						nombreD:$('#doctorPacienteMod').val(),
						nombreA:$('#asesorPacienteMod').val(),
						tipo_implante:$('#implantePacienteMod').val(),
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
						link:$('#linkDropbox-modificar').val(),
						pdf:$('#pdf-modificar').val(),
						powerpoint:$('#pptx-modificar').val(),
						c_guiada:$("input[name='rbCirugia-modificar']:checked").val(),
						_token: _token
					},
					success: function(result){
						Swal.fire(
							'¡Éxito!',
							'El paciente se ha modificado.',
							'success'
							);
						doctor = $('#doctorPacienteMod').val();
						asesor = $('#asesorPacienteMod').val();
						implanteMod = $("#implantePacienteMod").val();
						cirugia = $("input[name='rbCirugia-modificar']:checked").val();
						linkDropbox =$('#linkDropbox-modificar').val();
						finicio = $('#f_inicio-modificar').val();
						fdef = $('#f_final-modificar').val();
						pptx =$('#pptx-modificar').val();
						pdf =$('#pdf-modificar').val();
						tratamiento =$('#tratamientoPacienteMod').val();
						restaurarTratamiento(doctor,asesor,implanteMod,cirugia,linkDropbox,finicio,fdef,pptx,pdf,'modificar',tratamiento);
						buscarPaciente();
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
	}
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

			finicio = $('#dato_anterior-finicio').val();
			fdef = $('#dato_anterior-fdef').val();

			tratamiento = $('#hidden_tratamiento_actual').val();
			doctor = $('#dato_anterior-nombred').val();
			asesor = $('#dato_anterior-nombrea').val();
			implanteMod = $('#dato_anterior-tipo_implante').val();
			cirugia = $('#dato_anterior-cirugia').val();
			linkDropbox = $('#dato_anterior-link').val();
			pdf = $('#dato_anterior-pptx').val();
			pptx = $('#dato_anterior-pdf').val();

			restaurarTratamiento(doctor,asesor,implanteMod,cirugia,linkDropbox,finicio,fdef,pptx,pdf,'atras',tratamiento);
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
			material = $('#hidden_material').val();
			tipo_trabajo = $('#hidden_tipo_trabajo').val();
			npiezas = $('#hidden_n_piezas').val();
			color = $('#hidden_color_trabajo').val();
			codigoDisco = $('#hidden_cod_disco').val();
			maquina = $('#hidden_maquina').val();
			notas = $('#hidden_notas').val();
			stl = $('#hidden_stl').val();
			restaurarTrabajo(material,tipo_trabajo,npiezas,color,codigoDisco,maquina,notas,stl);
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
					stl : $('#stl-modificar').val(),
					_token: _token
				},
				success: function(result){
					Swal.fire(
						'¡Éxito!',
						'El trabajo se ha modificado.',
						'success'
						);

					material = $('#materialTrabajoMod').val();
					tipo_trabajo = $('#tipoTrabajoMod').val();
					npiezas = $('#npiezas-modificar').val();
					color = $('#colorTrabajoMod').val();
					codigoDisco = $('#discoTrabajoMod').val();
					maquina = $('#maquinaTrabajoMod').val();
					notas = $('#notas-modificar').val();
					stl = $('#stl-modificar').val();

					restaurarTrabajo(material,tipo_trabajo,npiezas,color,codigoDisco,maquina,notas,stl);
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

$("#modal-pacientes").on('click',"#nuevo_trabajo", function () {
	var _token = document.getElementsByName("_token")[0].value;
	var modal = $(this).closest('.modal');
	$(modal).modal('hide');
	$('.modal-backdrop.fade').removeClass('show');

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		url: 'registroTrabajo',
		method: 'post',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		data: {
			codigop: $('#codigop').text(),
			nombrep: $('#nombrep').text(),
			tratamiento: $('#tratamiento_actual').text(),
			id_pt:$('#id_pt').val(),
			_token: _token
		},
		success: function(result){

			$('#contenido').html(result);

		}});
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
			materialD = $('#hidden_material').val();
			marcad = $('#hidden_marca').val();
			escala = $('#hidden_escala').val();
			altura = $('#hidden_altura').val();
			color = $('#hidden_color').val();
			fecha = $('#hidden_fecha_alta_disco').val();
			restaurarDisco(materialD,marcad,escala,altura,color,fecha);
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
					materialD = $('#materialDiscoMod').val();
					marcad = $('#marcaDiscoMod').val();
					escala = $('#escala-modificar').val();
					altura = $('#altura-modificar').val();
					color = $('#colorDiscoMod').val();
					fecha = $('#fecha_alta_disco-mod').val();

					restaurarDisco(materialD,marcad,escala,altura,color,fecha);
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

$('#consultarPiezas').on("click" ,function(){
	var _token = document.getElementsByName("_token")[0].value;

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		url: 'calcularPiezas',
		method: 'get',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		data: {
			primera_fecha: $('#piezas_primera_fecha').text(),
			segunda_fecha: $('#piezas_segunda_fecha').text(),
			color: $('#piezas_material').text(),
			material: $('#piezas_color').text(),
			_token: _token
		},
		success: function(result){

			$('#piezasResultado').html(result);

		}});
});

$("#modal-pacientes").on('click',"#mod_paciente", function () {
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
				url: 'modificarPaciente',
				method: 'get',
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				data: {
					id_p : $('#hidden_id_p').val(),
					nombre : $('#nombrepaciente_mod').val(),
					codigo : $('#codigopaciente_mod').val(),
					_token: _token
				},
				success: function(result){
					Swal.fire(
						'¡Éxito!',
						'El paciente se ha modificado.',
						'success'
						);

					nombre = $('#nombrepaciente_mod').val();
					codigo = $('#codigopaciente_mod').val();

					restaurarPaciente(nombre,codigo);
					buscarPaciente();
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

$("#modal-pacientes").on('click',"#cerrar_modal-atras_p", function () {
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

			nombre = $('#hidden_nombre').val();
			codigo = $('#hidden_codigo').val();

			restaurarPaciente(nombre,codigo);
		}
	})
});

function restaurarPaciente(nombre,codigo) {
	$('#modal-pacientes').data('bs.modal')._config.backdrop = 'open';
	$('#modal-pacientes').data('bs.modal')._config.keyboard = true;
	$('.btn-fichacliente').show();
	$('#footer-fichapaciente').show();
	$('.x-cerrar').show();

	id_p = $('#hidden_id_p').val()
	id_pt = $('#id_pt').val();

	$('.modal-header').empty();
	$('.modal-header').append('<h5 class="modal-title" id="nombrep">'+nombre+'</h5>'+
		'<input type="hidden" id="id_pt" value="'+id_pt+'"><input type="hidden" id="hidden_id_p" value="'+id_p+'"><input type="hidden" id="hidden_nombre" value="'+nombre+'"><input type="hidden" id="hidden_codigo" value="'+codigo+'">'+
		'<h5 class="modal-title ml-auto mr-2" id="codigop">Código: '+codigo+'</h5>'+
		'<a id="modificar-paciente" class="pt-1" data-toggle="tooltip" data-placement="auto" title="Modificar paciente"><i class="fas fa-sync-alt"></i></a>'+
		'<button type="button" class="close mx-0 x-cerrar" data-dismiss="modal" aria-label="Close">'+
		'<span aria-hidden="true">&times;</span>'+
		'</button>');
}

function restaurarTratamiento(doctor,asesor,implanteMod,cirugia,linkDropbox,finicio,fdef,pptx,pdf,boton,tratamiento) {

	$('#row-btn-files').empty();
	$('#tr_doctor').empty();
	$('#tr_asesor').empty();
	$('#tr_implante').empty();
	$('#cirugia_fichapaciente').empty();
	$('#dropbox').empty();


	$('#footer-fichapaciente-modificar').remove();

	$('#tr_doctor').append('<th scope="row" class="th_tabla_paciente_modificar">DOCTOR:</th><input type="hidden" id="dato_anterior-nombred" value="'+doctor+'"><td id="doctor_fichapaciente"></td>');
	$('#doctor_fichapaciente').text(doctor);

	$('#tr_asesor').append('<th scope="row" class="th_tabla_paciente_modificar">ASESOR:</th><input type="hidden" id="dato_anterior-nombrea" value="'+asesor+'"><td id="asesor_fichapaciente"></td>');
	$('#asesor_fichapaciente').text(asesor);

	$('#tr_implante').append('<th scope="row" class="th_tabla_paciente_modificar">TIPO DE IMPLANTE</th><input type="hidden" id="dato_anterior-tipo_implante" value="'+implanteMod+'"><td id="tipo_implante_fichapaciente"></td>');
	$('#tipo_implante_fichapaciente').text(implanteMod);

	$('#fecha_inicio_fichapaciente').text(finicio.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1'));
	$('#fecha_definitiva_fichapaciente').text(fdef.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1'));

	if(cirugia == 'rbcestatica-modificar'){
		cirugia = "Estática";
	}
	if(cirugia == 'rbcdinamica-modificar'){
		cirugia = "Dinámica";
	}
	if(cirugia == 'rbcheckNinguna-modificar'){
		cirugia = "";
	}
	$('#cirugia_fichapaciente').text(cirugia);

	$('#modal-pacientes').data('bs.modal')._config.backdrop = 'open';
	$('#modal-pacientes').data('bs.modal')._config.keyboard = true;
	$('.btn-fichacliente').show();
	$('#footer-fichapaciente').show();
	$('.x-cerrar').show();

	var picpre = $('#picprovisional-modificar').prop('checked');
	var picpost = $('#picpost-modificar').prop('checked');
	var tacpre = $('#tacpre-modificar').prop('checked');
	var tacpost = $('#tacpost-modificar').prop('checked');
	var ortopre = $('#ortopre-modificar').prop('checked');
	var ortopost = $('#ortopost-modificar').prop('checked');
	var ioscanpre = $('#ioscanpre-modificar').prop('checked');
	var ioscanpost = $('#ioscanpost-modificar').prop('checked');
	var fotopre = $('#fotopre-modificar').prop('checked');
	var fotopost = $('#fotopost-modificar').prop('checked');
	var fotoprotesispre = $('#fotoprotesispre-modificar').prop('checked');
	var fotoprotesispost = $('#fotoprotesispost-modificar').prop('checked');
	var fotoprotesisbocapre = $('#fotoprotesisbocapre-modificar').prop('checked');
	var fotoprotesisbocapost = $('#fotoprotesisbocapost-modificar').prop('checked');
	var videopre = $('#videopre-modificar').prop('checked');
	var videopost = $('#videopost-modificar').prop('checked');

	if(boton == "atras"){
		picpre = $('#hidden_pic_provisional').val();
		picpost = $('#hidden_pic_final').val();
		tacpre = $('#hidden_tac_pre').val();
		tacpost = $('#hidden_tac_post').val();
		ortopre = $('#hidden_orto_pre').val();
		ortopost = $('#hidden_orto_post').val();
		ioscanpre = $('#hidden_ioscan_pre').val();
		ioscanpost = $('#hidden_ioscan_post').val();
		fotopre = $('#hidden_fotos_pre').val();
		fotopost = $('#hidden_foto_post').val();
		fotoprotesispre = $('#hidden_foto_protesis').val();
		fotoprotesispost = $('#hidden_foto_protesis_final').val();
		fotoprotesisbocapre = $('#hidden_foto_protesis_boca_provisional').val();
		fotoprotesisbocapost = $('#hidden_foto_protesis_boca_final').val();
		videopre = $('#hidden_video_pre').val();
		videopost = $('#hidden_video_final').val();
	}

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

	$('#picprovisional-modal').append('<input type="hidden" id="hidden_pic_provisional" value="'+picpre+'"><i id="icono_picpre"></i> PIC provisional');
	$('#tacpre-modal').append('<input type="hidden" id="hidden_tac_pre" value="'+tacpre+'"><i id="icono_tacpre"></i> TAC pre');
	$('#ortopre-modal').append('<input type="hidden" id="hidden_orto_pre" value="'+ortopre+'"><i id="icono_ortopre"></i> Orto pre');
	$('#ioscanpre-modal').append('<input type="hidden" id="hidden_ioscan_pre" value="'+ioscanpre+'"><i id="icono_ioscanpre"></i> IOScan pre');
	$('#fotopre-modal').append('<input type="hidden" id="hidden_fotos_pre" value="'+fotopre+'"><i id="icono_fotopre"></i> Fotos pre');
	$('#fotoprotesispre-modal').append('<input type="hidden" id="hidden_foto_protesis" value="'+fotoprotesispre+'"><i id="icono_fotoprotesispre"></i> Fotos protesis pre');
	$('#fotoprotesisbocapre-modal').append('<input type="hidden" id="hidden_foto_protesis_boca_provisional" value="'+fotoprotesisbocapre+'"><i id="icono_fotoprotesisbocapre"></i> Fotos protesis en boca pre');
	$('#videopre-modal').append('<input type="hidden" id="hidden_video_pre" value="'+videopre+'"><i id="icono_videopre"></i> Video pre');

	resetearCB(picpre, "#hidden_pic_provisional" ,"#icono_picpre",'#picprovisional-modal',boton);
	resetearCB(tacpre , "#hidden_tac_pre","#icono_tacpre",'#tacpre-modal',boton);
	resetearCB( ortopre, "#hidden_orto_pre","#icono_ortopre",'#ortopre-modal',boton);
	resetearCB( ioscanpre, "#hidden_ioscan_pre","#icono_ioscanpre",'#ioscanpre-modal',boton);
	resetearCB(fotopre , "#hidden_fotos_pre","#icono_fotopre",'#fotopre-modal',boton);
	resetearCB( fotoprotesispre, "#hidden_foto_protesis","#icono_fotoprotesispre",'#fotoprotesispre-modal',boton);
	resetearCB(fotoprotesisbocapre , "#hidden_foto_protesis_boca_provisional","#icono_fotoprotesisbocapre",'#fotoprotesisbocapre-modal',boton);
	resetearCB( videopre, "#hidden_video_pre","#icono_videopre",'#videopre-modal',boton);

	$('#picpost-modal').append('<input type="hidden" id="hidden_pic_final" value="'+picpost+'"><i id="icono_picpost"></i> PIC definitivo');
	$('#tacpost-modal').append('<input type="hidden" id="hidden_tac_post" value="'+tacpost+'"><i id="icono_tacpost"></i> TAC post');
	$('#ortopost-modal').append('<input type="hidden" id="hidden_orto_post" value="'+ortopost+'"><i id="icono_ortopost"></i> Orto post');
	$('#ioscanpost-modal').append('<input type="hidden" id="hidden_ioscan_post" value="'+ioscanpre+'"><i id="icono_ioscanpost"></i> IOScan post');
	$('#fotopost-modal').append('<input type="hidden" id="hidden_foto_post" value="'+fotopost+'"><i id="icono_fotopost"></i> Fotos post');
	$('#fotoprotesispost-modal').append('<input type="hidden" id="hidden_foto_protesis_final" value="'+fotoprotesispost+'"><i id="icono_fotoprotesispost"></i> Fotos protesis post');
	$('#fotoprotesisbocapost-modal').append('<input type="hidden" id="hidden_foto_protesis_boca_final" value="'+fotoprotesisbocapost+'"><i id="icono_fotoprotesisbocapost"></i> Fotos protesis en boca post');
	$('#videopost-modal').append('<input type="hidden" id="hidden_video_final" value="'+videopost+'"><i id="icono_videopost"></i> Video post');

	resetearCB(picpost, "#hidden_pic_final","#icono_picpost",'#picpost-modal',boton);
	resetearCB(tacpost, "#hidden_tac_post","#icono_tacpost",'#tacpost-modal',boton);
	resetearCB(ortopost, "#hidden_orto_post","#icono_ortopost",'#ortopost-modal',boton);
	resetearCB(ioscanpost, "#hidden_ioscan_post","#icono_ioscanpost",'#ioscanpost-modal',boton);
	resetearCB(fotopost, "#hidden_foto_post","#icono_fotopost",'#fotopost-modal',boton);
	resetearCB(fotoprotesispost, "#hidden_foto_protesis_final","#icono_fotoprotesispost",'#fotoprotesispost-modal',boton);
	resetearCB(fotoprotesisbocapost, "#hidden_foto_protesis_boca_final","#icono_fotoprotesisbocapost",'#fotoprotesisbocapost-modal',boton);
	resetearCB(videopost, "#hidden_video_final","#icono_videopost",'#videopost-modal',boton);

	$('#t_paciente').hide();
	$('#dropbox').append('<a href="' + linkDropbox + '" target="_blank" id="link_dropbox">' + linkDropbox + '</a>');


	$('#row-btn-files').append('<div class="col-md-4 mx-auto" id="powerpoint-modal">'+
		'<a href="' + pptx + '" target="_blank" id="descargarPPTX"><input type="hidden" id="dato_anterior-pptx" value="'+pptx+'">'+
		'<button class="btn btn-lg btn-warning btn-block mb-2" data-toggle="tooltip" data-placement="auto" title="Descargar Power Point"><i class="fas fa-file-powerpoint"></i> PPTX</button>'+
		'</a>'+
		'</div>'+
		'<div class="col-md-4 mx-auto" id="pdf-modal"><input type="hidden" id="dato_anterior-pdf" value="'+pdf+'">'+
		'<a href="' + pdf + '" target="_blank" id="descargarPDF">'+
		'<button class="btn btn-lg btn-warning btn-block mb-2" data-toggle="tooltip" data-placement="auto" title="Descargar PDF"><i class="fas fa-file-pdf"></i>PDF</button>'+
		'</a>'+
		'</div>');

	if(!$('#descargarPDF').attr('href')){
		$('#descargarPDF').hide();
	} else{
		$('#descargarPDF').show();
	}

	if(!$('#descargarPPTX').attr('href')){
		$('#descargarPPTX').hide();
	} else{
		$('#descargarPPTX').show();
	}

	trat =$('#tratamiento_actual').text();

	if( $('#tratamientoPacienteMod').val()){
		trat =$('#tratamientoPacienteMod').val();
	}

	$('#tratamiento_paciente_actual').empty();
	$('#tratamiento_paciente_actual').append('<input type="hidden" id="hidden_tratamiento_actual" value="'+ tratamiento +'"><a class="nav-link" id="tratamiento_actual">'+ tratamiento + '</a>');
}

function restaurarDisco(materialD,marcad,escala,altura,color,fecha) {
	$('#modal-disco').data('bs.modal')._config.backdrop = 'open';
	$('#modal-disco').data('bs.modal')._config.keyboard = true;
	$('.x-cerrar').show();
	$('#modificar-disco').show();

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

function restaurarTrabajo(material,tipo_trabajo,npiezas,color,codigoDisco,maquina,notas,stl) {
	$('#modal-trabajo').data('bs.modal')._config.backdrop = 'open';
	$('#modal-trabajo').data('bs.modal')._config.keyboard = true;
	$('.x-cerrar').show();
	$('.btn-fichatrabajo').show();
	$('#footer-trabajo').show();

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

	$('#row-btn-stl').empty();

	$('#row-btn-stl').append('<div class="col-md-12 py-2 px-2" id="row-btn-stl">'+
		'<a href="'+stl+'" target="_blank" id="descargarSTL">'+
		'<button class="btn btn-lg btn-warning btn-block"  data-toggle="tooltip" data-placement="auto" title="Ir a STL" type="submit"><i class="fas fa-download"></i> STL</button>'+
		'</a>'+
		'</div>');
	if(!$('#descargarSTL').attr('href')){
		$('#descargarSTL').hide();
	} else{
		$('#descargarSTL').show();
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

function ponerModificarTratamientoPaciente(){
	var _token = document.getElementsByName("_token")[0].value;
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		url: 'ponerModificarTratamientoPaciente',
		method: 'post',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		data: {
			tratamiento: $('#tratamiento_actual').text(),
			_token: _token
		},
		success: function(result){
			$('#tratamiento_paciente_actual').html(result);
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
			$('#tr_implante').html(result);
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
			$('#tr_doctor').html(result);
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
			$('#tr_asesor').html(result);
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


			if (!result) {
				/*Swal.fire(
					'No se han encontrado resultados.',
					'',
					'info'
					);*/
					/*Swal.fire({
						title: 'No se han encontrados resultados.',
						text: "¿Desea agregar un paciente?",
						type: 'question',
						confirmButtonText: 'Sí, ¡Agregar paciente!',
						showCancelButton: true,
						cancelButtonText:  'Más tarde.',
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
								url: 'registroTrabajo',
								method: 'get',
								headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
								data: {
									codigop: $('#codigoPaciente').val(),
									nombrep: $('#nombrePaciente').val(),
									_token: _token
								},
								success: function(result){

									$('body').html(result);

								}});
						}
					})*/
				} else {
					$('#tablaPacientesConsulta').html(result);
				}


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
			fecha_alta: $( "#fecha_alta" ).val(),
			fecha_alta2: $( "#fecha_alta2" ).val(),
			_token: _token
		},
		success: function(result){

			$('#tablaDiscosConsulta').html(result);

		}});
}

/*function filtroTratamientoPaciente(){

	//rellenar select con los tratamientos del paciente introducido
	//al agregar un nuevo buscadorTrabajo

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
	}*/
