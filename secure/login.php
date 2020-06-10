

<!DOCTYPE html>
<html lang="en">
<?php require_once('head/head.php');?>
<body>
  <div class="container">


    <div id="logreg-forms">
        <form class="form-signin" method="post" action="sql/login_sql.php">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Iniciar session</h1>

            <input type="email" name="email" id="email" class="form-control" placeholder="Correo electronico" >
            <br>
            <input type="password" name="pswd" id="pswd" class="form-control" placeholder="Contraseña" required="">

            <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Ingresar </button>
            <a href="#" id="forgot_pswd">Recuperar contraseña</a>
            <br>
            <hr>
            <!-- <p>Don't have an account!</p>  -->
            <a href="register.php" class="btn btn-primary btn-block" type="button" id="btn-signup"><i class="fas fa-user-plus"></i> Crear cuenta </a>
            </form>

            <br>

    </div>
    </div>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="/script.js"></script>
</html>
