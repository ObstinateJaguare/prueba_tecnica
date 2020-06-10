<?php
session_start();
require_once('head/head_panel.php');
if (!isset($_SESSION['id_user'])) {
  header('Location: ../index.php');
}
include('modal/modal_registro_queja.php');
include('modal/modal_quejas_registradas.php');
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Extreme technologies</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href='#'>Panel inicial</a></li>
    <?php if ($_SESSION['privilegios']>0) {
      echo "<li><a href='#'>Validar quejas</a></li>";
    }else {
      echo "<li><a href='#'>Registrar quejas</a></li>";
    } ?>

    </ul>
    <ul class="nav navbar-nav navbar-right">
      <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
      <li><a href="sql/logOut.php"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
    </ul>
  </div>
</nav>
<div class="container">
  <center> <h3>Hola <?php echo $_SESSION['nombres']; ?></h3></center>
<br>
<div class="ajax">

</div>

</div>
  </body>
</html>
<script type="text/javascript" src="../assets/js/ajax_usuarios.js">

</script>
