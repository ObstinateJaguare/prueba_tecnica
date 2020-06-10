$( document ).ready(function() {
  $.ajax({
	url: '../assets/ajax/ajax_usuarios_registrados.php',
	success: function(respuesta) {
		$(".ajax").html(respuesta);
	},
	error: function() {

    }
});
});
