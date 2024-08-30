<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['detsuid'] == 0)) {
	header('location:logout.php');
} else {
	if (isset($_POST['submit'])) {
		$userid = $_SESSION['detsuid'];
		$cpassword = md5($_POST['currentpassword']);
		$newpassword = md5($_POST['newpassword']);
		$query = mysqli_query($con, "SELECT ID FROM tbluser WHERE ID='$userid' AND Password='$cpassword'");
		$row = mysqli_fetch_array($query);
		if ($row > 0) {
			$ret = mysqli_query($con, "UPDATE tbluser SET Password='$newpassword' WHERE ID='$userid'");
			$msg = "Su contraseña se ha cambiado con éxito";
		} else {
			$msg = "Su contraseña actual es incorrecta";
		}
	}
?>
	<!DOCTYPE html>
	<html lang="es">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Seguimiento de Gastos Diarios || Cambiar Contraseña</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/datepicker3.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">

		<!--Fuente Personalizada-->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
		<script type="text/javascript">
			function checkpass() {
				if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
					alert('La nueva contraseña y la confirmación de la contraseña no coinciden');
					document.changepassword.confirmpassword.focus();
					return false;
				}
				return true;
			}
		</script>

		<link rel="shortcut icon" href="./assets/images/php-icon.png" type="image/x-icon">
	</head>

	<body>
		<?php include_once('includes/header.php'); ?>
		<?php include_once('includes/sidebar.php'); ?>

		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="#"><em class="fa fa-home"></em></a></li>
					<li class="active">Cambiar Contraseña</li>
				</ol>
			</div><!--/.row-->

			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Cambiar Contraseña</div>
						<div class="panel-body">
							<?php if ($msg): ?>
								<p class="alert alert-<?php echo strpos($msg, 'éxito') !== false ? 'success' : 'danger'; ?>" role="alert">
									<?php echo $msg; ?>
								</p>
							<?php endif; ?>
							<div class="col-md-12">
								<?php
								$userid = $_SESSION['detsuid'];
								$ret = mysqli_query($con, "SELECT * FROM tbluser WHERE ID='$userid'");
								$row = mysqli_fetch_array($ret);
								?>
								<form role="form" method="post" action="" name="changepassword" onsubmit="return checkpass();">
									<div class="form-group">
										<label>Contraseña Actual</label>
										<input type="password" name="currentpassword" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Nueva Contraseña</label>
										<input type="password" name="newpassword" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Confirmar Nueva Contraseña</label>
										<input type="password" name="confirmpassword" class="form-control" required>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary" name="submit">Cambiar Contraseña</button>
									</div>
								</form>
							</div>
						</div>
					</div><!-- /.panel-->
				</div><!-- /.col-->
				<?php include_once('includes/footer.php'); ?>
			</div><!-- /.row -->
		</div><!--/.main-->

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/chart.min.js"></script>
		<script src="js/chart-data.js"></script>
		<script src="js/easypiechart.js"></script>
		<script src="js/easypiechart-data.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
		<script src="js/custom.js"></script>
	</body>

	</html>
<?php }  ?>