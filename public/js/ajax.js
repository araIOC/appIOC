$(document).ready(function(){

	filtroTratamientoPaciente();
	buscarDisco();
	buscarTrabajo();

	$( "#materialDisco,#marcaDisco,#colorDisco" ).on('change', function() {
		buscarDisco();
	});
	$( "#nombrePTrabajo,#codigoPTrabajo,#materialTrabajo,#tipo_trabajo" ).on('change keyup', function() {
		buscarTrabajo();
	});
});


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