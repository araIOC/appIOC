$(document).ready(function(){
  $(".mostrarMas").html('Mostrar más... <i class="fas fa-angle-double-down"></i>');
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

