<?php 
require 'database.php';
$message = '';

if (!empty($_POST['documento']) && !empty($_POST['firstName'])){
  $sql = "INSERT INTO users (id, nombres, apellidos, email, contrasena, cumpleanos, direccion, telefono, celular, barrio, ocupacion)
  VALUES (:documento,:firstName, :lastName,:inputEmail,:inputPassword,:cumpleanos,:direccion,:telefono,:celular,:barrio,:ocupacion)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':documento',$_POST['documento']);
  $stmt->bindParam(':nombres',$_POST['firstName']);
  $stmt->bindParam(':apellidos',$_POST['lastName']);
  $stmt->bindParam(':email',$_POST['inputEmail']);
  $password = password_hash($_POST['inputPassword'], PASSWORD_BCRYPT);
  $stmt->bindParam(':contrasena',$passport);
  $stmt->bindParam(':cumpleanos',$_POST['cumpleanos']);
  $stmt->bindParam(':direccion',$_POST['direccion']);
  $stmt->bindParam(':telefono',$_POST['telefono']);
  $stmt->bindParam(':celular',$_POST['celular']);
  $stmt->bindParam(':barrio',$_POST['barrio']);
  $stmt->bindParam(':ocupacion',$_POST['ocupacion']);

  if ($stmt->execute()) {
    $message = 'Registro exitoso';
  } else {
    $message = 'Registro NO exitoso, Intentelo de nuevo';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>App transporte - Registro</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body>
  

    <div class="container">
    
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Registro<span> o <a href="login.php">login</a></span></div>
        <div class="card-body">
          <?php if (!empty($message)): ?>
    <p> <?php $message ?></p>
    <?php endif; ?>
          <form action="signup.php" method="POST">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                    <label for="firstName">Nombres</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last name" required="required">
                    <label for="lastName">Apellidos</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="documento" id="documento" class="form-control" placeholder="Documento" required="required">
                <label for="documento">Documento</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="date" name="cumpleanos" id="cumpleanos" class="form-control" placeholder="Cumpleaños" required="required" autofocus="autofocus">
                    <label for="cumpleanos">Cumpleaños</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" name="direccion" id="direccion" class="form-control" placeholder="direccion" required="required">
                    <label for="direccion">Dirección</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                    <label for="telefono">Teléfono</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" name="celular" id="celular" class="form-control" placeholder="Last name" required="required">
                    <label for="celular">Celular</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" name="barrio" id="barrio" class="form-control" placeholder="barrio" required="required" autofocus="autofocus">
                    <label for="barrio">Barrio</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" name="ocupacion" id="ocupacion" class="form-control" placeholder="ocupacion" required="required">
                    <label for="ocupacion">Ocupación</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email address" required="required">
                <label for="inputEmail">Correo electronico</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required="required">
                    <label for="inputPassword">Contraseña</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" name="" id="confirmPassword" class="form-control" placeholder="Confirm password" required="required">
                    <label for="confirmPassword">Confirmar contraseña</label>
                  </div>
                </div>
              </div>
            </div>
            <input type="submit" class="btn btn-primary btn-block" value="Registrar">
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="login.php">Pagina de ingreso</a>
            <a class="d-block small" href="forgot-password.html">Olvido su contraseña?</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
