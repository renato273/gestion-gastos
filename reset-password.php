<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['submit'])) {
	$contactno = $_SESSION['contactno'];
	$email = $_SESSION['email'];
	$password = md5($_POST['newpassword']);

	$query = mysqli_query($con, "UPDATE tbluser SET Password='$password' WHERE Email='$email' AND MobileNumber='$contactno'");
	if ($query) {
		echo "<script>alert('Contraseña cambiada exitosamente');</script>";
		session_destroy();
	}
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Seguimiento de Gastos Diarios - Restablecer Contraseña</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<script type="text/javascript">
		function checkpass() {
			if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
				alert('La nueva contraseña y la confirmación no coinciden');
				document.changepassword.confirmpassword.focus();
				return false;
			}
			return true;
		}
	</script>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h2 class="text-center">Seguimiento de Gastos Diarios</h2>
				<hr />
				<div class="panel panel-default">
					<div class="panel-heading">Restablecer Contraseña</div>
					<div class="panel-body">
						<?php if (isset($msg)): ?>
							<p class="text-danger text-center"><?php echo $msg; ?></p>
						<?php endif; ?>
						<form role="form" action="" method="post" name="changepassword" onsubmit="return checkpass()">
							<div class="form-group">
								<input class="form-control" placeholder="Nueva Contraseña" name="newpassword" type="password" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Confirmar Contraseña" name="confirmpassword" type="password" required>
							</div>
							<div class="form-group">
								<button type="submit" name="submit" class="btn btn-primary btn-block">Restablecer</button>
							</div>
							<div class="text-center">
								<a href="index.php" class="btn btn-link">Volver al Inicio de Sesión</a>
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