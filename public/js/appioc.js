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

/*$(".borrar").click(function () {
  Swal.fire({
    title: '¿Estás seguro?',
    text: "¿Desea eliminar este registro?",
    type: 'warning',
    confirmButtonText: 'Sí, ¡Eliminar!',
    showCancelButton: 'Cancelar',
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    reverseButtons: true

  }).then((result) => {
    if (result.value) {
      Swal.fire(
        '¡Eliminado!',
        'El registro se ha eliminado con éxito.',
        'success'
        )
    }
  })
});*/

$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});

  $('.borrar').click(function() {
    e.preventDefault();
    Swal.fire({
      title: '¿Estás seguro?',
      text: "¿Desea eliminar este registro?",
      type: 'warning',
      confirmButtonText: 'Sí, ¡Eliminar!',
      showCancelButton: 'Cancelar',
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      reverseButtons: true

    }).then((result) => {
      if (!result.value) {
        return false;
      }
      Swal.fire(
        '¡Eliminado!',
        'El registro se ha eliminado con éxito.',
        'success'
        )
    })
  });

