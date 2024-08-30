<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['submit'])) {
	$contactno = $_POST['contactno'];
	$email = $_POST['email'];

	$query = mysqli_query($con, "SELECT ID FROM tbluser WHERE Email='$email' AND MobileNumber='$contactno'");
	$ret = mysqli_fetch_array($query);
	if ($ret > 0) {
		$_SESSION['contactno'] = $contactno;
		$_SESSION['email'] = $email;
		header('location:reset-password.php');
	} else {
		$msg = "Datos inválidos. Por favor, intente de nuevo.";
	}
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Seguimiento de Gastos Diarios - Recuperar Contraseña</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link rel="shortcut icon" href="./assets/images/php-icon.png" type="image/x-icon">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h2 class="text-center">Seguimiento de Gastos Diarios</h2>
				<hr />
				<div class="panel panel-default">
					<div class="panel-heading">Recuperar Contraseña</div>
					<div class="panel-body">
						<?php if ($msg): ?>
							<p class="alert alert-danger"><?php echo $msg; ?></p>
						<?php endif; ?>
						<form role="form" action="" method="post" id="login" name="login">
							<div class="form-group">
								<label for="email">Correo Electrónico</label>
								<input class="form-control" placeholder="Correo Electrónico" name="email" type="email" autofocus required>
							</div>
							<div class="form-group">
								<label for="contactno">Número de Teléfono</label>
								<input class="form-control" placeholder="Número de Teléfono" name="contactno" type="tel" required>
							</div>
							<div class="form-group">
								<button type="submit" name="submit" class="btn btn-primary btn-block">Restablecer</button>
							</div>
							<div class="text-center">
								<a href="index.php" class="btn btn-link">Volver a Iniciar Sesión</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>