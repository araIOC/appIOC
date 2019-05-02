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
   var apellidosp = $(this).data('apellidosp');
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

   $('#codigop').text("Código: " + codigoP);
   $('#nombrep').text(nombrep);
   $('#doctor_fichapaciente').text(nombred);
   $('#asesor_fichapaciente').text(nombrea);
   $('#tipo_implante_fichapaciente').text(tipo_implante);
   $('#cirugia_fichapaciente').text(c_guiada);
   $('#fecha_inicio_fichapaciente').text(fecha_inicio.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1'));
   $('#fecha_definitiva_fichapaciente').text(fecha_definitiva.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1'));
   $('#link_dropbox').text(link);
   $('#link_dropbox').attr('href', link);
   $('#tratamiento_actual').text(tratamiento);
   $('#descargarPPTX').data('codigopaciente',codigoP);

   rellenarListaCB(pic_provisional,'#icono_picpre','#picprovisional-modal');
   rellenarListaCB(pic_final,'#icono_picpost','#picpost-modal');
   rellenarListaCB(tac_pre,'#icono_tacpre','#tacpre-modal');
   rellenarListaCB(tac_post,'#icono_tacpost','#tacpost-modal');
   rellenarListaCB(orto_pre,'#icono_ortopre','#ortopre-modal');
   rellenarListaCB(orto_post,'#icono_ortopost','#ortopost-modal');
   rellenarListaCB(ioscan_pre,'#icono_ioscanpre','#ioscanpre-modal');
   rellenarListaCB(ioscan_post,'#icono_ioscanpost','#ioscanpost-modal');
   rellenarListaCB(fotos_pre,'#icono_fotopre','#fotopre-modal');
   rellenarListaCB(foto_post,'#icono_fotopost','#fotopost-modal');
   rellenarListaCB(foto_protesis,'#icono_fotoprotesispre','#fotoprotesispre-modal');
   rellenarListaCB(foto_protesis_final,'#icono_fotoprotesispost','#fotoprotesispost-modal');
   rellenarListaCB(foto_protesis_boca_provisional,'#icono_fotoprotesisbocapre','#fotoprotesisbocapre-modal');
   rellenarListaCB(foto_protesis_boca_final,'#icono_fotoprotesisbocapost','#fotoprotesisbocapost-modal');
   rellenarListaCB(video_pre,'#icono_videopre','#videopre-modal');
   rellenarListaCB(video_final,'#icono_videopost','#videopost-modal');

   if(powerpoint  === 'No'){
      $('#powerpoint-modal').hide();
   }else{
      $('#powerpoint-modal').show();
   }

   if(pdf === 'No'){
      $('#pdf-modal').hide();
   }else{
      $('#pdf-modal').show();
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

	$('#nombrep').text(nombrep);
	$('#nombret').text("Tratamiento: " + nombret);
	$('#material_fichatrabajo').text(material);
	$('#tipotrabajo_fichatrabajo').text(tipotrabajo);
	$('#npiezas_fichatrabajo').text(npiezas);
	$('#color_fichatrabajo').text(color);
	$('#maquina_fichatrabajo').text(maquina);
	$('#notas_fichatrabajo').text(notas);
});

$("#tablaDiscosConsulta").on("click", ".td-datosdisco", function(){
	var codigo = $(this).data('codigod');
	var materiald = $(this).data('materiald');
	var escala = $(this).data('escala');
	var color = $(this).data('color');
	var fecha_alta = $(this).data('fecha_alta');
	var altura = $(this).data('altura');

	$('#cod_disco').text("Código: " + codigo);
	$('#material_fichadisco').text(materiald);
	$('#escala_fichadisco').text(escala);
	$('#color_fichadisco').text(color);
	$('#altura_fichadisco').text(altura);
	$('#fecha_alta_fichadisco').text(fecha_alta.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1'));
});

$("#modificar-tratamiento").click(function (){
   $('#modal-pacientes').data('bs.modal')._config.backdrop = 'static';
   $('#modal-pacientes').data('bs.modal')._config.keyboard = false;
   $('.btn-fichacliente').hide();
   $('#footer-fichapaciente').hide();

   doctor = $('#doctor_fichapaciente').text();
   $('#doctor_fichapaciente').empty();

   asesor = $('#asesor_fichapaciente').text();
   $('#asesor_fichapaciente').empty();

   implante = $('#tipo_implante_fichapaciente').text();
   $('#tipo_implante_fichapaciente').empty();

   cirugia = $('#cirugia_fichapaciente').text();
   $('#cirugia_fichapaciente').empty();

   var checkEstatica = "";
   var checkDinamica = "";
   if(cirugia == "Estática"){
      checkEstatica = 'checked';
   }
   if(cirugia == "Dinámica"){
      checkDinamica = 'checked';
   }
   rb ='<div class="d-flex"><div class="custom-control custom-radio  mr-auto" data-toggle="tooltip" data-placement="left" title="Cirugía estática">'+
   '<input type="radio" id="rbcestatica-modificar" name="rbCirugia-modificar" class="custom-control-input" value="rbcestatica-modificar" '+checkEstatica+'>'+
   '<label class="custom-control-label" for="rbcestatica-modificar">Estática</label>'+
   '</div>'+
   '<div class="custom-control custom-radio mr-auto" data-toggle="tooltip" data-placement="left" title="Cirugía dinámica">'+
   '<input type="radio" id="rbcdinamica-modificar" name="rbCirugia-modificar" class="custom-control-input" value="rbcdinamica-modificar" '+checkDinamica+'>'+
   '<label class="custom-control-label" for="rbcdinamica-modificar">Dinámica</label>'+
   '</div></div>';

   $('#cirugia_fichapaciente').append(rb);

   ponerModificarFecha('#fecha_inicio_fichapaciente','f_inicio-modificar');
   ponerModificarFecha('#fecha_definitiva_fichapaciente','f_final-modificar');

   linkDropbox = $('#link_dropbox').text();
   $('#dropbox').empty();
   $('#dropbox').append('<input type="text" class="form-control" name="linkDropbox-moificar" id="linkDropbox-moificar">');
   $("#linkDropbox-moificar").val(linkDropbox);

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

   ponerCB('#picprovisional-modal','picprovisional-modificar', "Pic Provisional");
   ponerCB('#picpost-modal','picpost-modificar', "Pic Definitivo");
   ponerCB('#tacpre-modal','tacpre-modificar', "TAC pre");
   ponerCB('#tacpost-modal','tacpost-modificar', "TAC post");
   ponerCB('#ortopre-modal','ortopre-modificar', "Orto pre");
   ponerCB('#ortopost-modal','ortopost-modificar', "Orto post");
   ponerCB('#ioscanpre-modal','ioscanpre-modificar', "IOScan pre");
   ponerCB('#ioscanpost-modal','ioscanpost-modificar', "IOScan post");
   ponerCB('#fotopre-modal','fotopre-modificar', "Fotos pre");
   ponerCB('#fotopost-modal','fotopost-modificar', "Fotos post");
   ponerCB('#fotoprotesispre-modal','fotoprotesispre-modificar', "Fotos protesis pre");
   ponerCB('#fotoprotesispost-modal','fotoprotesispost-modificar', "Fotos protesis post");
   ponerCB('#fotoprotesisbocapre-modal','fotoprotesisbocapre-modificar', "Fotos protesis en boca pre");
   ponerCB('#fotoprotesisbocapost-modal','fotoprotesisbocapost-modificar', "Fotos protesis en boca post");
   ponerCB('#videopre-modal','videopre-modificar', "Video pre");
   ponerCB('#videopost-modal','videopost-modificar', "Video post");

   $('#row-btn-files').empty();
   $('#row-btn-files').append('<div class="col-md-4 mx-auto">'+
      '<input type="file" class="custom-file-input" id="customFileLang" lang="es">'+
      '<label class="btn btn-lg custom-file-label" for="customFile" data-browse="Buscar..."><i class="fas fa-file-upload"></i> POWER POINT</label>'+
      '</div>'+
      '<div class="col-md-4 mx-auto">'+
      '<input type="file" class="custom-file-input" id="customFileLang" lang="es">'+
      '<label class="btn btn-lg custom-file-label" for="customFile" data-browse="Buscar..."><i class="fas fa-file-upload"></i> PDF</label>'+
      '</div>');
   $('#ficha-paciente-tratamiento').append('<div class="modal-footer" id="footer-fichapaciente">'+
      '<a id="cerrar_modal-modificar" data-dismiss="modal"><button class="btn btn-lg btn-warning ml-auto" type="submit"><i class="fas fa-save"></i> CANCELAR</button></a>'+
      '<button class="btn btn-lg btn-warning ml-auto" type="submit"><i class="fas fa-save"></i> MODIFICAR</button>'+
      '</div>');


});


function ponerModificarFecha(id_fecha, nombreFecha) {
   fecha = $(id_fecha).text();
   $(id_fecha).empty();
   var nuevaFecha = fecha.split('/');
   nuevaFecha = nuevaFecha[2]+ '-' + nuevaFecha[1] + '-' + nuevaFecha[0];
   $(id_fecha).append('<input class="form-control" type="date" id="'+nombreFecha+'" name="'+nombreFecha+'" value="'+nuevaFecha+'">');

}

function rellenarListaCB(cb,id_icono, id_td){
   if(cb == 1){
      $(id_icono).addClass('fas');
      $(id_icono).addClass('fa-check');
      $(id_td).addClass('check');
   }else{
      $(id_icono).addClass('fas');
      $(id_icono).addClass('fa-times');
      $(id_td).addClass('uncheck');
   }
}

function ponerCB(id_td, id_input,nombreInput) {
   if($(id_td).hasClass('check')){
      $(id_td).append('<input class="form-check-input" type="checkbox" value="" id="'+ id_input +'" checked="checked"><label class="form-check-label" >'+nombreInput+'</label>');
   }else if($(id_td).hasClass('uncheck')){
      $(id_td).append('<input class="form-check-input" type="checkbox" value="" id="'+ id_input +'"><label class="form-check-label" >'+nombreInput+'</label>');
   }
}






