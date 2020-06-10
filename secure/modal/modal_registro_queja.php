<link rel="stylesheet" href="../assets/css/style.css">
<div class="container">

<body>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <form id="registrar_queja">

            <div class="form-group row">
                <label for="" class="col-sm-4 col-form-label">Asunto</label>
                <div class="col-sm-8">
                  <textarea name="asunto" id="asunto" class="form-control"></textarea>
                  <input type="hidden" id="id_usuario" name="id_usuario" value="">
                </div>
            </div>

            <div class="form-group row">
              <label for="" class="col-sm-4 col-form-label">Cargue una foto: </label>
                 <div class="col-sm-8"> <label for="file" class="custom-file-upload"> <i class="fa fa-upload"></i> Subir Archivo </label>
                   <input type="file" id="file" name="file" >
                 </div>
               </div>
               <button type="submit" class="btn btn-primary" >Enviar</button>
          </form>

        </div>

      </div>

    </div>
  </div>

</div>

</body>
<script type="text/javascript">
// File type validation
$("#file").change(function() {
  var file = this.files[0];
  var fileType = file.type;

  var match = ['image/jpeg', 'image/jpg',  'image/png'];
  if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) )){
      alert('Solo tipos de imagenes JPG, JPEG, PNG se pueden subir.');
      $("#file").val('');
      return false;
  }
});

$("#registrar_queja").submit(function(e){
	e.preventDefault();
  //alert("hola mundo");
	$.ajax({
		url: '../assets/ajax/ajax_registrar_queja.php',
		method: 'POST',
		data: new FormData(this),
		dataType: 'json',
    contentType: false,
    cache: false,
    processData:false,
		success: function(result){
		var mensaje = result['mensaje'];

    $("#asunto").val("");
    $("#file").val("");

		if(mensaje == 'correcto'){

	  alert("Queja enviada con exito");


		}else{

    alert("No se pudo enviar la queja");

		}
    $('#myModal').modal('toggle');
		}
	})

});
</script>
