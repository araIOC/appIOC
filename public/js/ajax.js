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
		"#cbFotos_protesis_boca_post,#cbVideo_pre,#cbVideo_post,#Dfecha_inicial,#Dfecha_final,#customSwitch1" ).on('change keyup click', function() {
			buscarPaciente();
		});

	});

$("#limpiarFiltroPacientes").click(function () {
	//limpiar radio $('#CBpic_provisional').attr('checked',false);
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
			Dfecha_final : $('#Dfecha_final').val(),
			invertir : $('#customSwitch1').prop('checked'),
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