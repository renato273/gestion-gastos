<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid'] == 0)) {
	header('location:logout.php');
} else {

	// Código para eliminar
	if (isset($_GET['delid'])) {
		$rowid = intval($_GET['delid']);
		$query = mysqli_query($con, "DELETE FROM tblexpense WHERE ID='$rowid'");
		if ($query) {
			echo "<script>alert('Registro eliminado con éxito');</script>";
			echo "<script>window.location.href='manage-expense.php'</script>";
		} else {
			echo "<script>alert('Algo salió mal. Por favor, inténtelo de nuevo');</script>";
		}
	}

?>
	<!DOCTYPE html>
	<html lang="es">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Seguimiento de Gastos Diarios || Gestionar Gastos</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/datepicker3.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">

		<!--Fuente Personalizada-->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

		<link rel="shortcut icon" href="./assets/images/php-icon.png" type="image/x-icon">
	</head>

	<body>
		<?php include_once('includes/header.php'); ?>
		<?php include_once('includes/sidebar.php'); ?>

		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="#"><em class="fa fa-home"></em></a></li>
					<li class="active">Gastos</li>
				</ol>
			</div><!--/.row-->

			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Gestionar Gastos</div>
						<div class="panel-body">
							<?php if (isset($msg)) { ?>
								<p class="alert alert-danger"><?php echo $msg; ?></p>
							<?php } ?>
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<th>N°</th>
												<th>Concepto del Gasto</th>
												<th>Costo del Gasto</th>
												<th>Fecha del Gasto</th>
												<th>Acción</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$userid = $_SESSION['detsuid'];
											$ret = mysqli_query($con, "SELECT * FROM tblexpense WHERE UserId='$userid'");
											$cnt = 1;
											while ($row = mysqli_fetch_array($ret)) {
											?>
												<tr>
													<td><?php echo $cnt; ?></td>
													<td><?php echo $row['ExpenseItem']; ?></td>
													<td><?php echo $row['ExpenseCost']; ?></td>
													<td><?php echo $row['ExpenseDate']; ?></td>
													<td>
														<a href="manage-expense.php?delid=<?php echo $row['ID']; ?>"
															onclick="return confirm('¿Está seguro de que desea eliminar este gasto?');"
															class="btn btn-danger btn-sm">
															Eliminar
														</a>
													</td>
												</tr>
											<?php
												$cnt++;
											}
											?>
										</tbody>
									</table>
								</div>
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