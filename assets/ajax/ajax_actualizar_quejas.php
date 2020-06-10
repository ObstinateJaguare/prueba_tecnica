<?php

session_start();
require_once('../../connection/connection.php');

 echo $asunto= mysqli_real_escape_string($connApp,$_GET['cambios']);
 echo $id_queja= mysqli_real_escape_string($connApp,$_GET['id_asunto']);

echo $update="UPDATE quejas SET queja='$asunto' WHERE id_quejas='$id_queja'";
if(!$result = $connApp->query($update)){
die('There was an error running the query1 [' . $connApp->error . ']');
}

 ?>
