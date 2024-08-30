<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (isset($_POST['submit'])) {
	$fname = $_POST['name'];
	$mobno = $_POST['mobilenumber'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$ret = mysqli_query($con, "select Email from tbluser where Email='$email' ");
	$result = mysqli_fetch_array($ret);
	if ($result > 0) {
		$msg = "Este correo electrónico ya está asociado a otra cuenta";
	} else {
		$query = mysqli_query($con, "insert into tbluser(FullName, MobileNumber, Email, Password) value('$fname', '$mobno', '$email', '$password' )");
		if ($query) {
			$msg = "Te has registrado exitosamente";
		} else {
			$msg = "Algo salió mal. Por favor, inténtalo de nuevo";
		}
	}
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Seguimiento de Gastos Diarios - Registro</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link rel="shortcut icon" href="./assets/images/php-icon.png" type="image/x-icon">
	<script type="text/javascript">
		function checkpass() {
			if (document.signup.password.value != document.signup.repeatpassword.value) {
				alert('Las contraseñas no coinciden');
				document.signup.repeatpassword.focus();
				return false;
			}
			return true;
		}
	</script>
</head>

<body>
	<div class="row">
		<h2 class="text-center">Seguimiento de Gastos Diarios</h2>
		<hr />
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Registrarse</div>
				<div class="panel-body">
					<form role="form" action="" method="post" id="" name="signup" onsubmit="return checkpass();">
						<?php if ($msg): ?>
							<p class="text-center text-danger"><?php echo $msg; ?></p>
						<?php endif; ?>
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Nombre Completo" name="name" type="text" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Correo Electrónico" name="email" type="email" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Número de Teléfono" maxlength="10" pattern="[0-9]{10}" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Contraseña" name="password" type="password" required>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="repeatpassword" name="repeatpassword" placeholder="Repetir Contraseña" required>
							</div>
							<div class="form-group">
								<button type="submit" value="submit" name="submit" class="btn btn-primary">Registrarse</button>
								<a href="index.php" class="btn btn-link">¿Ya tienes una cuenta? Inicia sesión</a>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>