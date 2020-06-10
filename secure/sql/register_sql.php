<?php

session_start();
require_once('../../connection/connection.php');

 $nombres= mysqli_real_escape_string($connApp,$_POST['nombres']);
 $apellidos= mysqli_real_escape_string($connApp,$_POST['apellidos']);
 $telefono= mysqli_real_escape_string($connApp,$_POST['telefono']);
 $email= mysqli_real_escape_string($connApp,$_POST['email']);
 $pswd= mysqli_real_escape_string($connApp,$_POST['pswd']);
 $tipo_identificacion= mysqli_real_escape_string($connApp,$_POST['tipo_identificacion']);
 $num_identificiacion= mysqli_real_escape_string($connApp,$_POST['num_identificiacion']);



 if(get_magic_quotes_gpc()) {
  $nombres = trim(stripslashes($nombres));
  $apellidos = trim(stripslashes($apellidos));
  $telefono = trim(stripslashes($telefono));
  $email = trim(stripslashes($email));
  $pswd = trim(stripslashes($pswd));
  $tipo_identificacion = trim(stripslashes($tipo_identificacion));
  $num_identificiacion = trim(stripslashes($num_identificiacion));

 }

 $passHash = password_hash($pswd, PASSWORD_DEFAULT);


//VALIDAR SI EL USUARIO YA EXISTE

 $select_user="SELECT * FROM usuarios WHERE tipo_doc='$tipo_identificacion' AND numero_doc='$num_identificiacion' ";
if(!$result = $connApp->query($select_user)){
die('There was an error running the query1 [' . $connApp->error . ']');
}
 $numRow= $result->num_rows;


if ($numRow===0) {
//SI EL USUARIO NO EXISTE , SE REGISTRA
    $sql_insert=" INSERT INTO `usuarios`(`nombre`, `apellidos`, `tipo_doc`, `numero_doc`, `telefono`, `correo_electronico`, `clave`)
   VALUES ('$nombres','$apellidos','$tipo_identificacion','$num_identificiacion','$telefono','$email','$passHash')";
   if(!$result = $connApp->query($sql_insert)){
   die('There was an error running the query1 [' . $connApp->error . ']');
 }else {
   echo'<script type="text/javascript">
        alert("Usuario registrado con exito");
        window.location.href="../login.php";
        </script>';

 }

}elseif ($numRow>0) {
  //SI EL USUARIO EXISTE LO REGRESA A LOGIN
  echo'<script type="text/javascript">
       alert("El numero de documento ya esxiste , si no recuerda el usuario por favor ir a recuperar contraseña");
       window.location.href="../login.php";
       </script>';
}
?>
