<?php
//superusuario (si privilegio = 0) base de datos dirige a sandbox//pdte

$hostname_connApp = "localhost";
$database_connApp = "prueba_tecnica";
$username_connApp = "root";
$password_connApp = "";//╭∩╮(Ο_Ο)╭∩╮

$connApp = new mysqli($hostname_connApp, $username_connApp, $password_connApp, $database_connApp);
if($connApp->connect_errno > 0){
    die('Unable to connect to database [' . $connApp->connect_error . ']');
}
/* change character set to utf8 */
if (!$connApp->set_charset("utf8")) {
  printf("Error loading character set utf8: %s\n", $connApp->error);
}

?>
