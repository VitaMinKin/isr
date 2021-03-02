$('#flash-overlay-modal').modal();

$('div.alert').not('.alert-important').delay(3000).fadeOut(350);

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  });

bsCustomFileInput.init();