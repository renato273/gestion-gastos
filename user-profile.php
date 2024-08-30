<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid'] == 0)) {
	header('location:logout.php');
} else {
	if (isset($_POST['submit'])) {
		$userid = $_SESSION['detsuid'];
		$fullname = $_POST['fullname'];
		$mobno = $_POST['contactnumber'];

		$query = mysqli_query($con, "UPDATE tbluser SET FullName ='$fullname', MobileNumber='$mobno' WHERE ID='$userid'");
		if ($query) {
			$msg = "El perfil de usuario ha sido actualizado.";
		} else {
			$msg = "Algo salió mal. Por favor, inténtelo de nuevo.";
		}
	}
?>
	<!DOCTYPE html>
	<html lang="es">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Seguimiento de Gastos Diarios || Perfil de Usuario</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/datepicker3.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		<link rel="shortcut icon" href="./assets/images/php-icon.png" type="image/x-icon">

		<!--Fuente Personalizada-->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	</head>

	<body>
		<?php include_once('includes/header.php'); ?>
		<?php include_once('includes/sidebar.php'); ?>

		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="#"><em class="fa fa-home"></em></a></li>
					<li class="active">Perfil</li>
				</ol>
			</div><!--/.row-->

			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Perfil</div>
						<div class="panel-body">
							<?php if ($msg): ?>
								<p class="alert alert-<?php echo strpos($msg, 'actualizado') !== false ? 'success' : 'danger'; ?>" role="alert">
									<?php echo $msg; ?>
								</p>
							<?php endif; ?>
							<div class="col-md-12">
								<?php
								$userid = $_SESSION['detsuid'];
								$ret = mysqli_query($con, "SELECT * FROM tbluser WHERE ID='$userid'");
								$row = mysqli_fetch_array($ret);
								?>
								<form role="form" method="post" action="">
									<div class="form-group">
										<label>Nombre Completo</label>
										<input class="form-control" type="text" value="<?php echo $row['FullName']; ?>" name="fullname" required>
									</div>
									<div class="form-group">
										<label>Correo Electrónico</label>
										<input type="email" class="form-control" name="email" value="<?php echo $row['Email']; ?>" required readonly>
									</div>
									<div class="form-group">
										<label>Número de Teléfono</label>
										<input class="form-control" type="tel" value="<?php echo $row['MobileNumber']; ?>" required name="contactnumber" maxlength="10">
									</div>
									<div class="form-group">
										<label>Fecha de Registro</label>
										<input class="form-control" name="regdate" type="text" value="<?php echo $row['RegDate']; ?>" readonly>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary" name="submit">Actualizar</button>
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