<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

$msg = ''; // Inicializamos la variable $msg

if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$query = mysqli_query($con, "SELECT ID FROM tbluser WHERE Email='$email' AND Password='$password'");
	$ret = mysqli_fetch_array($query);
	if ($ret > 0) {
		$_SESSION['detsuid'] = $ret['ID'];
		header('location:dashboard.php');
	} else {
		$msg = "Datos inválidos.";
	}
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Seguimiento Diario de Gastos - Iniciar Sesión</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	<link rel="shortcut icon" href="./assets/images/php-icon.png" type="image/x-icon">
</head>

<body>
	<div class="row">
		<h2 class="text-center">Seguimiento Diario de Gastos</h2>
		<hr />
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Iniciar Sesión</div>
				<div class="panel-body">
					<?php if ($msg): ?>
						<p style="font-size:16px; color:red" class="text-center"><?php echo $msg; ?></p>
					<?php endif; ?>
					<form role="form" action="" method="post" id="login" name="login">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Correo electrónico" name="email" type="email" autofocus required>
							</div>
							<a href="forgot-password.php">¿Olvidaste tu contraseña?</a>
							<div class="form-group">
								<input class="form-control" placeholder="Contraseña" name="password" type="password" required>
							</div>
							<div class="form-group">
								<button type="submit" value="login" name="login" class="btn btn-primary">Iniciar Sesión</button>
								<a href="register.php" class="btn btn-primary float-end">Registrarse</a>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>