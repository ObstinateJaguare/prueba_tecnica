<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once('head/head.php'); ?>
  <body>

<div class="container" >
<div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card " style="margin-top:10px;">
                            <div class="card-header h3 mb-3 font-weight-normal"><center> Registro de nuevo usuario</center></div>
                            <div class="card-body">

                                <form class="form-horizontal" method="post" action="sql/register_sql.php">

                                    <div class="form-group">
                                        <label for="name" class="cols-sm-2 control-label ">Nombres</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">

                                                <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Ingresa tus nombres" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="cols-sm-2 control-label ">Apellidos</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">

                                                <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Ingresa tus apellidos" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="cols-sm-2 control-label ">Tipo y numero de identificacion </label>
                                        <div class="cols-sm-6">
                                            <div class="input-group">
                                              <select class="form-control" name="tipo_identificacion" id="tipo_identificacion"required>
                                                <option value="">Seleccione..</option>
                                                <option value="TI">Tarjeta de identidad</option>
                                                <option value="CC">Cedula de ciudadania</option>
                                                <option value="PASP">Pasaporte</option>

                                              </select>

                                                <input type="text" class="form-control" name="num_identificiacion" id="num_identificiacion" placeholder="Ingresa numero de indentificacion" required/>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="confirm" class="cols-sm-2 control-label">Telefono</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">

                                                <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Ingresa tu numero de telefono" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="cols-sm-2 control-label">Correo electronico</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">

                                                <input type="email" class="form-control" name="email" id="email" placeholder="Ingrsa tu correo electronico" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="username" class="cols-sm-2 control-label">Contraseña</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">

                                                <input type="password" class="form-control" name="pswd" id="pswd" placeholder="Ingresar contraseña" required/>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group ">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Registrar</button>
                                    </div>
                                    <div class="login-register">
                                        <a href="login.php">ya tengo cuenta,iniciar session</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
</div>
  </body>
</html>
