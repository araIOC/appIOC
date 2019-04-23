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

   if(pic_provisional == 1){
   	$('#icono_picpre').addClass('fas');
   	$('#icono_picpre').addClass('fa-check');
   }else{
   	$('#icono_picpre').addClass('fas');
   	$('#icono_picpre').addClass('fa-times');
   }
   if(pic_final == 1){
   	$('#icono_picpost').addClass('fas');
   	$('#icono_picpost').addClass('fa-check');
   }else{
   	$('#icono_picpost').addClass('fas');
   	$('#icono_picpost').addClass('fa-times');
   }
   if(tac_pre == 1){
   	$('#icono_tacpre').addClass('fas');
   	$('#icono_tacpre').addClass('fa-check');
   }else{
   	$('#icono_tacpre').addClass('fas');
   	$('#icono_tacpre').addClass('fa-times');
   }
   if(tac_post == 1){
   	$('#icono_tacpost').addClass('fas');
   	$('#icono_tacpost').addClass('fa-check');
   }else{
   	$('#icono_tacpost').addClass('fas');
   	$('#icono_tacpost').addClass('fa-times');
   }
   if(orto_pre == 1){
   	$('#icono_ortopre').addClass('fas');
   	$('#icono_ortopre').addClass('fa-check');
   }else{
   	$('#icono_ortopre').addClass('fas');
   	$('#icono_ortopre').addClass('fa-times');
   }
   if(orto_post == 1){
   	$('#icono_ortopost').addClass('fas');
   	$('#icono_ortopost').addClass('fa-check');
   }else{
   	$('#icono_ortopost').addClass('fas');
   	$('#icono_ortopost').addClass('fa-times');
   }
   if(ioscan_pre == 1){
   	$('#icono_ioscanpre').addClass('fas');
   	$('#icono_ioscanpre').addClass('fa-check');
   }else{
   	$('#icono_ioscanpre').addClass('fas');
   	$('#icono_ioscanpre').addClass('fa-times');
   }
   if(ioscan_post == 1){
   	$('#icono_ioscanpost').addClass('fas');
   	$('#icono_ioscanpost').addClass('fa-check');
   }else{
   	$('#icono_ioscanpost').addClass('fas');
   	$('#icono_ioscanpost').addClass('fa-times');
   }
   if(fotos_pre == 1){
   	$('#icono_fotopre').addClass('fas');
   	$('#icono_fotopre').addClass('fa-check');
   }else{
   	$('#icono_fotopre').addClass('fas');
   	$('#icono_fotopre').addClass('fa-times');
   }
   if(foto_post == 1){
   	$('#icono_fotopost').addClass('fas');
   	$('#icono_fotopost').addClass('fa-check');
   }else{
   	$('#icono_fotopost').addClass('fas');
   	$('#icono_fotopost').addClass('fa-times');
   }
   if(foto_protesis == 1){
   	$('#icono_fotoprotesispre').addClass('fas');
   	$('#icono_fotoprotesispre').addClass('fa-check');
   }else{
   	$('#icono_fotoprotesispre').addClass('fas');
   	$('#icono_fotoprotesispre').addClass('fa-times');
   }
   if(foto_protesis_final == 1){
   	$('#icono_fotoprotesispost').addClass('fas');
   	$('#icono_fotoprotesispost').addClass('fa-check');
   }else{
   	$('#icono_fotoprotesispost').addClass('fas');
   	$('#icono_fotoprotesispost').addClass('fa-times');
   }
   if(foto_protesis_boca_provisional == 1){
   	$('#icono_fotoprotesisbocapre').addClass('fas');
   	$('#icono_fotoprotesisbocapre').addClass('fa-check');
   }else{
   	$('#icono_fotoprotesisbocapre').addClass('fas');
   	$('#icono_fotoprotesisbocapre').addClass('fa-times');
   }
   if(foto_protesis_boca_final == 1){
   	$('#icono_fotoprotesisbocapost').addClass('fas');
   	$('#icono_fotoprotesisbocapost').addClass('fa-check');
   }else{
   	$('#icono_fotoprotesisbocapost').addClass('fas');
   	$('#icono_fotoprotesisbocapost').addClass('fa-times');
   }
   if(video_pre == 1){
   	$('#icono_videopre').addClass('fas');
   	$('#icono_videopre').addClass('fa-check');
   }else{
   	$('#icono_videopre').addClass('fas');
   	$('#icono_videopre').addClass('fa-times');
   }
   if(video_final == 1){
   	$('#icono_videopost').addClass('fas');
   	$('#icono_videopost').addClass('fa-check');
   }else{
   	$('#icono_videopost').addClass('fas');
   	$('#icono_videopost').addClass('fa-times');
   }

   if(!powerpoint){
      $('#powerpoint-modal').hide();
   }

   if(!pdf){
      $('#pdf-modal').hide();
   }
   console.log(pdf);
   console.log(powerpoint);
});
('.test1').click(function () {$
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
$('[data-target=".modal-ficha-disco"]').click(function () {
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
$(".borrar").click(function () {
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
			Swal.fire(
				'¡Hecho!',
				'El registro se ha dado de baja con éxito.',
				'success'
				)
		}
	})
});





