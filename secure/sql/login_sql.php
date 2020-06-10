<?php
session_start();
require_once('../../connection/connection.php');

 $correo= mysqli_real_escape_string($connApp,$_POST['email']);
 $psw= mysqli_real_escape_string($connApp,$_POST['pswd']);

 if(get_magic_quotes_gpc()) {
  $correo = trim(stripslashes($correo));
  $psw = trim(stripslashes($psw));
 }


 //exit();
  $select_user="SELECT * FROM usuarios WHERE correo_electronico='$correo' ";
   if(!$result = $connApp->query($select_user)){
  die('There was an error running the query1 [' . $connApp->error . ']');
}
  $numRow= $result->num_rows;
if ($numRow==0) {
header('Location: ');
}elseif ($numRow>0) {

$row = $result->fetch_assoc();

 $passwordok = $row['clave'];

if (password_verify ($psw ,$passwordok)) {

  $_SESSION['nombres'] = $row['nombre'] . ' ' . $row['apellidos'];
  $_SESSION['privilegios']=$row['privilegio'];
  $_SESSION['id_user']= $row['id_usuario'];
  header("location: ../panel.php");

}else {
  echo'<script type="text/javascript">
       alert("clave incorrecta");

       </script>';
}


}


 ?>
