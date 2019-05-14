///////////MOSTRAR MAS/MOSTRAR MENOS//////////////
$(document).ready(function(){
	$(".mostrarMas").html('Mostrar más... <i class="fas fa-angle-double-down"></i>');

   //////////////////////ACTIVAR TOOLTIP/////////////////////////

   $('[data-toggle="tooltip"]').tooltip();

});

$("#btnFiltros").click(function () {

	if ($(this).hasClass("mostrarMas")){
		$(this).addClass('mostrarMenos');
		$(this).removeClass('mostrarMas');
		$(".mostrarMenos").html('Ocultar... <i class="fas fa-angle-double-up"></i>');
	} else {
		$(this).addClass('mostrarMas');
		$(this).removeClass('mostrarMenos');
		$(this).html('Mostrar más... <i class="fas fa-angle-double-down"></i>');
	}
});

$("#tablaPacientesConsulta").on("click", ".td-datospaciente", function(){
	var codigoP = $(this).data('codigop');
	var nombrep = $(this).data('nombrep');

	$('#codigop').text("Código: " + codigoP);
	$('#nombrep').text(nombrep);

	if(!$(this).data('nombret')){
		tratamiento = $('#tratamiento_actual').text();
		$('#agregar_tratamiento_pacienteM').empty().append('<i class="fas fa-plus"></i> AGREGAR TRATAMIENTO');
		$('#conten_btn').addClass('p-4 mx-auto').removeClass('ml-auto mr-sm-2');
		$('#tratamiento_actual').empty();
		$('#modificar-tratamiento').hide();
		$('.modal-body').hide();
		$('#footer-fichapaciente').hide();
		$('#modal-modificar-paciente').removeClass('modal-xl').addClass('modal-md');
	} else{
		$('#agregar_tratamiento_pacienteM').empty().append('<i class="fas fa-plus"></i>');
		$('#conten_btn').removeClass('p-4 mx-auto').addClass('ml-auto mr-sm-2');
		$('#modificar-tratamiento').show();
		$('#tratamiento_actual').text(tratamiento);
		$('.modal-body').show();
		$('#footer-fichapaciente').show();
		$('#modal-modificar-paciente').removeClass('modal-md').addClass('modal-xl');

		var nombred = $(this).data('nombred');
		var nombrea = $(this).data('nombrea');
		var tipo_implante = $(this).data('tipo_implante');
		var c_guiada = $(this).data('c_guiada');
		var fecha_inicio = $(this).data('fecha_inicio');
		var fecha_definitiva = $(this).data('fecha_definitiva');
		var pic_provisional = $(this).data('pic_provisional');
		var fotos_pre = $(this).data('fotos_pre');
		var orto_pre = $(this).data('orto_pre');
		var tac_pre = $(this).data('tac_pre');
		var ioscan_pre = $(this).data('ioscan_pre');
		var foto_protesis_boca_provisional = $(this).data('foto_protesis_boca_provisional');
		var foto_protesis = $(this).data('foto_protesis');
		var video_pre = $(this).data('video_pre');
		var pic_final = $(this).data('pic_final');
		var foto_post = $(this).data('foto_post');
		var orto_post = $(this).data('orto_post');
		var tac_post = $(this).data('tac_post');
		var ioscan_post = $(this).data('ioscan_post');
		var video_final = $(this).data('video_final');
		var foto_protesis_final = $(this).data('foto_protesis_final');
		var foto_protesis_boca_final = $(this).data('foto_protesis_boca_final');
		var link = $(this).data('link');
		var tratamiento = $(this).data('nombret');
		var powerpoint = $(this).data('powerpoint');
		var pdf = $(this).data('pdf');
		var id_pt = $(this).data('idpt');

		$('#id_pt').val(id_pt);
		$('#dato_anterior-nombred').val(nombred);
		$('#doctor_fichapaciente').text(nombred);
		$('#dato_anterior-nombrea').val(nombrea);
		$('#asesor_fichapaciente').text(nombrea);
		$('#dato_anterior-tipo_implante').val(tipo_implante);
		$('#tipo_implante_fichapaciente').text(tipo_implante);
		$('#dato_anterior-cirugia').val(c_guiada);
		$('#cirugia_fichapaciente').text(c_guiada);
		$('#dato_anterior-finicio').val(fecha_inicio.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1'));
		$('#fecha_inicio_fichapaciente').text(fecha_inicio.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1'));
		$('#dato_anterior-fdef').val(fecha_definitiva.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1'));
		$('#fecha_definitiva_fichapaciente').text(fecha_definitiva.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1'));
		$('#dato_anterior-link').val(link);
		$('#link_dropbox').text(link).attr('href', link);
		$('#tratamiento_actual').text(tratamiento);
		$('#dato_anterior-pptx').val(powerpoint);
		$('#descargarPPTX').attr('href', powerpoint);
		$('#dato_anterior-pdf').val(pdf);
		$('#descargarPDF').attr('href', pdf);

		rellenarListaCB(pic_provisional,'#icono_picpre','#picprovisional-modal','#hidden_pic_provisional');
		rellenarListaCB(pic_final,'#icono_picpost','#picpost-modal','#hidden_pic_final');
		rellenarListaCB(tac_pre,'#icono_tacpre','#tacpre-modal','#hidden_tac_pre');
		rellenarListaCB(tac_post,'#icono_tacpost','#tacpost-modal','#hidden_tac_post');
		rellenarListaCB(orto_pre,'#icono_ortopre','#ortopre-modal','#hidden_orto_pre');
		rellenarListaCB(orto_post,'#icono_ortopost','#ortopost-modal','#hidden_orto_post');
		rellenarListaCB(ioscan_pre,'#icono_ioscanpre','#ioscanpre-modal','#hidden_ioscan_pre');
		rellenarListaCB(ioscan_post,'#icono_ioscanpost','#ioscanpost-modal','#hidden_ioscan_post');
		rellenarListaCB(fotos_pre,'#icono_fotopre','#fotopre-modal','#hidden_fotos_pre');
		rellenarListaCB(foto_post,'#icono_fotopost','#fotopost-modal','#hidden_foto_post');
		rellenarListaCB(foto_protesis,'#icono_fotoprotesispre','#fotoprotesispre-modal','#hidden_foto_protesis');
		rellenarListaCB(foto_protesis_final,'#icono_fotoprotesispost','#fotoprotesispost-modal','#hidden_foto_protesis_final');
		rellenarListaCB(foto_protesis_boca_provisional,'#icono_fotoprotesisbocapre','#fotoprotesisbocapre-modal','#hidden_foto_protesis_boca_provisional');
		rellenarListaCB(foto_protesis_boca_final,'#icono_fotoprotesisbocapost','#fotoprotesisbocapost-modal','#hidden_foto_protesis_boca_final');
		rellenarListaCB(video_pre,'#icono_videopre','#videopre-modal','#hidden_video_pre');
		rellenarListaCB(video_final,'#icono_videopost','#videopost-modal','#hidden_video_final');

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

	}
});


$("#tablaTrabajosConsulta").on("click", ".td-datostrabajo", function(){
	var nombrep = $(this).data('nombrep');
	var apellidos = $(this).data('apellidos');
	var nombret = $(this).data('nombret');
	var material = $(this).data('material');
	var tipotrabajo = $(this).data('tipotrabajo');
	var npiezas = $(this).data('npiezas');
	var color = $(this).data('color');
	var maquina = $(this).data('maquina');
	var notas = $(this).data('notas');
	var codigoD = $(this).data('disco');
	var id_trabajo = $(this).data('idtrabajo');
	var stl = $(this).data('stl');

	$('#id_trabajo').val(id_trabajo);
	$('#nombrep').text(nombrep);
	$('#nombret').text("Tratamiento: " + nombret);
	$('#hidden_material').val(material);
	$('#material_fichatrabajo').text(material);
	$('#hidden_tipo_trabajo').val(tipotrabajo);
	$('#tipotrabajo_fichatrabajo').text(tipotrabajo);
	$('#hidden_n_piezas').val(npiezas);
	$('#npiezas_fichatrabajo').text(npiezas);
	$('#hidden_color_trabajo').val(color);
	$('#color_fichatrabajo').text(color);
	$('#hidden_maquina').val(maquina);
	$('#maquina_fichatrabajo').text(maquina);
	$('#hidden_notas').val(notas);
	$('#notas_fichatrabajo').text(notas);
	$('#hidden_cod_disco').val(codigoD);
	$('#codDisco_fichatrabajo').text(codigoD);
	$('#hidden_stl').val(stl);
	$('#descargarSTL').attr('href', stl);

	if(!$('#descargarSTL').attr('href')){
		$('#descargarSTL').hide();
	} else{
		$('#descargarSTL').show();
	}

});

$("#tablaDiscosConsulta").on("click", ".td-datosdisco", function(){
	var codigo = $(this).data('codigod');
	var materiald = $(this).data('materiald');
	var marcad = $(this).data('marcad');
	var escala = $(this).data('escala');
	var color = $(this).data('color');
	var fecha_alta = $(this).data('fecha_alta');
	var altura = $(this).data('altura');

	$('#cod_disco').text("Código: " + codigo);
	$('#hidden_material').val(materiald);
	$('#material_fichadisco').text(materiald);
	$('#hidden_marca').val(marcad);
	$('#marca_fichadisco').text(marcad);
	$('#hidden_escala').val(escala);
	$('#escala_fichadisco').text(escala);
	$('#color_fichadisco').text(color);
	$('#hidden_color').val(color);
	$('#hidden_altura').val(altura);
	$('#altura_fichadisco').text(altura);
	$('#hidden_fecha_alta_disco').val(fecha_alta.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1'));
	$('#fecha_alta_fichadisco').text(fecha_alta.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1'));
});

$("#modificar-tratamiento").click(function (){
	$('#modal-pacientes').data('bs.modal')._config.backdrop = 'static';
	$('#modal-pacientes').data('bs.modal')._config.keyboard = false;
	$('.btn-fichacliente').hide();
	$('.x-cerrar').hide();
	$('#footer-fichapaciente').hide();

	doctor = $('#doctor_fichapaciente').text();
	asesor = $('#asesor_fichapaciente').text();
	implante = $('#tipo_implante_fichapaciente').text();
	cirugia = $('#cirugia_fichapaciente').text();
	linkDropbox = $('#link_dropbox').text();
	id_pt = $('#id_pt').val();
	pdf = $('#descargarPDF').attr('href');
	pptx = $('#descargarPPTX').attr('href');

	$('#row-btn-files').empty();
	$('#doctor_fichapaciente').empty();
	$('#asesor_fichapaciente').empty();
	$('#tipo_implante_fichapaciente').empty();
	$('#cirugia_fichapaciente').empty();
	$('#dropbox').empty();
	$('#descargarPDF').empty();
	$('#descargarPPTX').empty();

	var checkEstatica = "";
	var checkDinamica = "";
	var checkNinguna = "";
	if(cirugia == "Estática"){
		checkEstatica = 'checked';
	}else if(cirugia == "Dinámica"){
		checkDinamica = 'checked';
	}else{
		checkNinguna = 'checked';
	}

	rb ='<div class="d-flex"><div class="custom-control custom-radio  mr-auto" data-toggle="tooltip" data-placement="left" title="Cirugía estática">'+
	'<input type="radio" id="rbcestatica-modificar" name="rbCirugia-modificar" class="custom-control-input" value="rbcestatica-modificar" '+checkEstatica+'>'+
	'<label class="custom-control-label" for="rbcestatica-modificar">Estática</label>'+
	'</div>'+
	'<div class="custom-control custom-radio mr-auto" data-toggle="tooltip" data-placement="left" title="Cirugía dinámica">'+
	'<input type="radio" id="rbcdinamica-modificar" name="rbCirugia-modificar" class="custom-control-input" value="rbcdinamica-modificar" '+checkDinamica+'>'+
	'<label class="custom-control-label" for="rbcdinamica-modificar">Dinámica</label>'+
	'</div><div class="custom-control custom-radio mr-auto" data-toggle="tooltip" data-placement="left" title="Ninguna">'+
	'<input type="radio" id="rbcheckNinguna-modificar" name="rbCirugia-modificar" class="custom-control-input" value="rbcheckNinguna-modificar" '+checkNinguna+'>'+
	'<label class="custom-control-label" for="rbcheckNinguna-modificar">Ninguna</label>'+
	'</div></div>';

	$('#cirugia_fichapaciente').append(rb);

	$('#tratamiento_actual').append('<a id="modificar-tratamiento_actual"><button class="btn btn-lg btn-warning ml-auto btn-fichacliente ml-sm-2"  data-toggle="tooltip" data-placement="auto" title="Modificar tratamiento" type="submit"><i class="fas fa-sync-alt"></i></button></a>');

	ponerModificarFecha('#fecha_inicio_fichapaciente','f_inicio-modificar');
	ponerModificarFecha('#fecha_definitiva_fichapaciente','f_final-modificar');

	$('#dropbox').append('<input type="hidden" id="dato_anterior-link"><input type="text" class="form-control" name="linkDropbox-modificar" id="linkDropbox-modificar">');
	$("#linkDropbox-modificar").val(linkDropbox);
	$("#dato_anterior-link").val(linkDropbox);

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

	ponerCB('#picprovisional-modal','picprovisional-modificar', "Pic Provisional",'hidden_pic_provisional');
	/*ponerCB('#picpost-modal','picpost-modificar', "Pic Definitivo","hidden_pic_final");
	ponerCB('#tacpre-modal','tacpre-modificar', "TAC pre","hidden_tac_pre");
	ponerCB('#tacpost-modal','tacpost-modificar', "TAC post","hidden_tac_post");
	ponerCB('#ortopre-modal','ortopre-modificar', "Orto pre","hidden_orto_pre");
	ponerCB('#ortopost-modal','ortopost-modificar', "Orto post","hidden_orto_post");
	ponerCB('#ioscanpre-modal','ioscanpre-modificar', "IOScan pre","hidden_ioscan_pre");
	ponerCB('#ioscanpost-modal','ioscanpost-modificar', "IOScan post","hidden_ioscan_post");
	ponerCB('#fotopre-modal','fotopre-modificar', "Fotos pre","hidden_fotos_pre");
	ponerCB('#fotopost-modal','fotopost-modificar', "Fotos post","hidden_foto_post");
	ponerCB('#fotoprotesispre-modal','fotoprotesispre-modificar', "Fotos protesis pre","hidden_foto_protesis");
	ponerCB('#fotoprotesispost-modal','fotoprotesispost-modificar', "Fotos protesis post","hidden_foto_protesis_final");
	ponerCB('#fotoprotesisbocapre-modal','fotoprotesisbocapre-modificar', "Fotos protesis en boca pre","hidden_foto_protesis_boca_provisional");
	ponerCB('#fotoprotesisbocapost-modal','fotoprotesisbocapost-modificar', "Fotos protesis en boca post","hidden_foto_protesis_boca_final");
	ponerCB('#videopre-modal','videopre-modificar', "Video pre","hidden_video_pre");
	ponerCB('#videopost-modal','videopost-modificar', "Video post","hidden_video_final");*/


	$('#row-btn-files').append('<input type="hidden" id="dato_anterior-pptx"><div class="col-md-5 mx-auto input-group">'+
		'<div class="input-group">'+
		'	<div class="input-group-prepend">'+
		'		<span class="input-group-text"><i class="fas fa-file-powerpoint mr-sm-2"></i> POWER POINT:</span>'+
		'	</div>'+
		'	<input type="text" class="form-control p-2" name="pptx-modificar" id="pptx-modificar">'+
		'	</div>'+
		'</div>'+
		'<input type="hidden" id="dato_anterior-pdf"><div class="col-md-5 mx-auto input-group">'+
		'	<div class="input-group">'+
		'		<div class="input-group-prepend">'+
		'			<label class="input-group-text"><i class="fas fa-file-pdf mr-sm-2"></i> PDF:</label>'+
		'		</div>'+
		'		<input type="text" class="form-control p-2" name="pdf-modificar" id="pdf-modificar">'+
		'	</div>'+
		'</div>');

	$("#pptx-modificar").val(pptx);
	$("#pdf-modificar").val(pdf);
	$("#dato_anterior-pptx").val(pptx);
	$("#dato_anterior-pdf").val(pdf);

	$('#ficha-paciente-tratamiento').append('<div class="modal-footer " id="footer-fichapaciente-modificar">'+
		'<div class="ml-auto">'+
		'<a id="cerrar_modal-modificar-paciente"><button class="btn btn-lg btn-warning mr-2" type="submit"><i class="fas fa-arrow-circle-left"></i> ATRÁS</button></a>'+
		'<a id="modificar_tratamiento_paciente"><button class="btn btn-lg btn-warning " type="submit"><i class="fas fa-save"></i> MODIFICAR</button></a>'+
		'</div></div>');
});

$("#modificar-trabajo").click(function (){
	$('#modal-trabajo').data('bs.modal')._config.backdrop = 'static';
	$('#modal-trabajo').data('bs.modal')._config.keyboard = false;
	$('.btn-fichatrabajo').hide();
	$('#footer-trabajo').hide();
	$('.x-cerrar').hide();

	material = $('#material_fichatrabajo').text();
	tipo_trabajo = $('#tipotrabajo_fichatrabajo').text();
	npiezas = $('#npiezas_fichatrabajo').text();
	color = $('#color_fichatrabajo').text();
	codigoDisco = $('#codDisco_fichatrabajo').text();
	maquina = $('#maquina_fichatrabajo').text();
	notas = $('#notas_fichatrabajo').text();
	id_trabajo = $('#id_trabajo').val();
	stl = $('#descargarPPTX').attr('href');

	$('#descargarSTL').empty();
	$('#npiezas_fichatrabajo').empty();
	$('#npiezas_fichatrabajo').append('<input type="text" class="form-control" name="npiezas-modificar" id="npiezas-modificar">');
	$('#npiezas-modificar').val(npiezas);

	$('#notas_fichatrabajo').empty();
	$('#notas_fichatrabajo').append('<textarea class="form-control" id="notas-modificar"></textarea>');
	$('#notas-modificar').val(notas);

	$('#row-btn-stl').show();
	$('#row-btn-stl').empty();


	$('#ficha-trabajo').append('<div class="modal-footer " id="footer-fichatrabajo-modificar">'+
		'<div class="ml-auto">'+
		'<a id="cerrar_modal-modificar-trabajo"><button class="btn btn-lg btn-warning mr-2 p-2" type="submit"><i class="fas fa-arrow-circle-left"></i> ATRÁS</button></a>'+
		'<a id="modificar_trabajo"><button class="btn btn-lg btn-warning  py-2" type="submit"><i class="fas fa-save"></i> MODIFICAR</button></a>'+
		'</div></div>');

	$('#row-btn-stl').append('<div class="col-md-12 mx-auto"><input type="hidden" id="hidden_stl"><div class=" mx-auto input-group">'+
		'<div class="input-group">'+
		'	<div class="input-group-prepend">'+
		'		<span class="input-group-text"><i class="fas fa-file mr-sm-2"></i> STL:</span>'+
		'	</div>'+
		'	<input type="text" class="form-control p-2" name="stl-modificar" id="stl-modificar">'+
		'	</div>'+
		'</div></div>');

	$("#stl-modificar").val(stl);
	$("#hidden_stl").val(stl);
});

$("#modificar-disco").click(function (){
	$('#modal-disco').data('bs.modal')._config.backdrop = 'static';
	$('#modal-disco').data('bs.modal')._config.keyboard = false;
	$('#modificar-disco').hide();
	$('.x-cerrar').hide();
	materialD = $('#material_fichadisco').text();
	marcad = $('#marca_fichadisco').text();
	escala = $('#escala_fichadisco').text();
	altura = $('#altura_fichadisco').text();
	color = $('#color_fichadisco').text();

	ponerModificarFecha('#fecha_alta_fichadisco','fecha_alta_disco-mod')
	$('#escala_fichadisco').empty();
	$('#escala_fichadisco').append('<input type="text" class="form-control" name="escala-modificar" id="escala-modificar">');
	$('#escala-modificar').val(escala);

	$('#altura_fichadisco').empty();
	$('#altura_fichadisco').append('<input type="text" class="form-control" name="altura-modificar" id="altura-modificar">');
	$('#altura-modificar').val(altura);


	$('#ficha-disco').append('<div class="modal-footer " id="footer-fichadisco-modificar">'+
		'<div class="ml-auto">'+
		'<a id="cerrar_modal-modificar-disco"><button class="btn btn-lg btn-warning mr-2 p-2" type="submit"><i class="fas fa-arrow-circle-left"></i> ATRÁS</button></a>'+
		'<a id="modificar_disco"><button class="btn btn-lg btn-warning  py-2" type="submit"><i class="fas fa-save"></i> MODIFICAR</button></a>'+
		'</div></div>');
});

function ponerModificarFecha(id_fecha, nombreFecha) {
	fecha = $(id_fecha).text();
	$(id_fecha).empty();
	var nuevaFecha = fecha.split('/');
	nuevaFecha = nuevaFecha[2]+ '-' + nuevaFecha[1] + '-' + nuevaFecha[0];
	$(id_fecha).append('<input class="form-control" type="date" id="'+nombreFecha+'" name="'+nombreFecha+'" value="'+nuevaFecha+'">');
}


function resetearCB(cb,inputHidden,id_icono,id_td,boton) {
	$(id_icono).addClass('fas');
	if(boton == 'atras'){
		if($(inputHidden).val() == 'uncheck'){
			$(id_icono).removeClass('check');
			$(id_icono).addClass('fa-times');
		}else{
			$(id_icono).removeClass('uncheck');
			$(id_icono).addClass('fa-check');
		}
	}
	if(boton == 'modificar'){
		if(cb){
			$(id_icono).removeClass('uncheck');
			$(id_icono).addClass('fa-check');
			$(inputHidden).val('check');
		}else{
			$(id_icono).removeClass('check');
			$(id_icono).addClass('fa-times');
			$(inputHidden).val('uncheck');
		}
	}

}

function rellenarListaCB(cb,id_icono, id_td,idInputHidden){
	$(id_icono).addClass('fas');
	if(cb == 1){
		$(id_td).removeClass('uncheck');
		$(id_icono).addClass('fa-check');
		$(id_td).addClass('check');
		$(idInputHidden).val('check');

	}else{
		$(id_td).removeClass('check');
		$(id_icono).addClass('fa-times');
		$(id_td).addClass('uncheck');
		$(idInputHidden).val('uncheck');
	}
}

function ponerCB(id_td, id_input,nombreInput,idInputHidden) {
	if($(id_td).hasClass('check')){
		$(id_td).append('<input type="hidden" id="'+idInputHidden+'" value="check"><input class="form-check-input" type="checkbox" value="" id="'+ id_input +'" name="'+ id_input +'" checked="checked"><label class="form-check-label" >'+nombreInput+'</label>');
	}else if($(id_td).hasClass('uncheck')){
		$(id_td).append('<input type="hidden" id="'+idInputHidden+'" value="uncheck"><input class="form-check-input" type="checkbox" value="" id="'+ id_input +'" name="'+ id_input +'"><label class="form-check-label" >'+nombreInput+'</label>');
	}
}






