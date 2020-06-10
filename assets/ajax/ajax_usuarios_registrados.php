<?php

session_start();
require_once('../../connection/connection.php');

$usuario=$_SESSION['id_user'];

if ($_SESSION['privilegios']==='1') {

   $select_usuarios="SELECT * FROM usuarios WHERE privilegio='1' AND id_usuario='$usuario'";
  if(!$result = $connApp->query($select_usuarios)){
  die('There was an error running the query1 [' . $connApp->error . ']');
  }

}else {

  $select_usuarios="SELECT * FROM usuarios WHERE privilegio='1'";
   if(!$result = $connApp->query($select_usuarios)){
   die('There was an error running the query1 [' . $connApp->error . ']');
   }
}


 ?>

 <table class="table table-hover">
     <thead>
       <tr>
         <th style="text-align:center;" >Nombres</th>
         <th style="text-align:center;" >Tipo de docuento </th>
         <th style="text-align:center;" ># de documento</th>
         <th style="text-align:center;" >Acciones</th>
       </tr>
     </thead>
     <tbody>
       <?php while($row = mysqli_fetch_array($result)){
        //$rowAm['id_factura']; ?>
       <tr>
         <td style="text-align:center;" ><?php echo $row['nombre'] . " " . $row['apellidos']; ?></td>
         <td style="text-align:center;" ><?php echo $row['tipo_doc']; ?></td>
         <td style="text-align:center;" ><?php echo $row['numero_doc']; ?></td>
         <td style="text-align:center;" >

           <?php if ($_SESSION['privilegios']==='1') {?>
             <a type="button" class="btn btn-warning quejas" data-toggle="modal" data-target="#myModalquejas" data-id="<?php echo $row['id_usuario']; ?>" title="Ver quejas de este usuario">
               Quejas</a>


<?php }else { ?>
 <a type="button" class="btn btn-warning quejas" data-toggle="modal" data-target="#myModalquejas" data-id="<?php echo $row['id_usuario']; ?>" title="Ver quejas de este usuario">
   Quejas</a>
   <a type="button" class="btn btn-success registro" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['id_usuario']; ?>" title="Registrar quejas de este usuario">
     Registrar quejas</a>
  <?php } ?>

         </td>

       </tr>

     </tbody>
     <?php } ?>
   </table>
   <script type="text/javascript">
   $( ".registro" ).click(function() {
       var id_usuario= $(this).data("id");
       //alert(id_usuario);
       $("#id_usuario").val(id_usuario);

     });
     $( ".quejas" ).click(function() {
         var id_usuario= $(this).data("id");
         //alert(id_usuario);
         $("#id_usuario_a").val(id_usuario);

         $.ajax({
         	url: '../assets/ajax/ajax_quejas_usuario.php?id='+id_usuario,

         	success: function(respuesta) {
         		$(".ajax_queja").html(respuesta);
         	},
         	error: function() {
                 console.log("No se ha podido obtener la información");
             }
         });
       });
   </script>
