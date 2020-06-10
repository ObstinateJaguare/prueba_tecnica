<?php
session_start();
require_once('../../connection/connection.php');

$id= mysqli_real_escape_string($connApp,$_GET['id']);

 $selec_quejas="SELECT * FROM quejas WHERE id_usuario='$id'";
if(!$result = $connApp->query($selec_quejas)){
die('There was an error running the query1 [' . $connApp->error . ']');
}


 ?>
 <table class="table table-hover">
     <thead>
       <tr>
         <th style="text-align:center;" >Queja</th>
         <th style="text-align:center;" >Soporte</th>
         <th style="text-align:center;" >Fecha de registro </th>

       </tr>
     </thead>
     <tbody>
       <?php while($row = mysqli_fetch_array($result)){
       ?>
       <tr>
         <td style="text-align:center;" > <textarea name="name" id="<?php echo 'text_' . $row['id_quejas']; ?>" disabled><?php echo $row['queja']; ?></textarea> </td>
         <td style="text-align:center;" ><img style="width:50%;" src="../assets/img/<?php echo $row['imagen']; ?>"></td>
         <td style="text-align:center;" ><?php echo $row['fecha_registro']; ?></td>

         <td style="text-align:center;" >
          <?php if ($_SESSION['privilegios']==='1') {

          }else {
            echo "<a type='button' class='btn btn-primary editar'  data-id='" . $row['id_quejas'] . "' title='Editar queja'>Editar</a>";
            echo "<a type='button' class='btn btn-success guardar'  data-id='" . $row['id_quejas'] . "' title='Guardar cambios'>Guardar cambios</a>";
          } ?>


         </td>

       </tr>

     </tbody>
     <?php } ?>
   </table>
<script type="text/javascript">
$( ".editar" ).click(function() {
 var id_asunto= $(this).data("id");

 $("#text_"+id_asunto).removeAttr('disabled');
 alert(id_asunto);
});

$( ".guardar" ).click(function() {
 var id_asunto= $(this).data("id");

 var cambios= $("#text_"+id_asunto).val();

 $.ajax({
	url: '../assets/ajax/ajax_actualizar_quejas.php?id_asunto='+id_asunto+"&cambios="+cambios,
	success: function(respuesta) {
    $("#text_"+id_asunto).prop('disabled', true);
    $('#myModalquejas').modal('toggle');
		alert('Cambios guardados con exito');

	},
	error: function() {
        console.log("No se ha podido obtener la información");
    }
});




});
</script>
