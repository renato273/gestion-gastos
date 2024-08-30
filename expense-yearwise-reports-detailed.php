<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid'] == 0)) {
	header('location:logout.php');
} else {
?>
	<!DOCTYPE html>
	<html lang="es">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Seguimiento de Gastos Diarios || Informe de Gastos Anual</title>
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
					<li class="active">Informe de Gastos Anual</li>
				</ol>
			</div><!--/.row-->

			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Informe de Gastos Anual</div>
						<div class="panel-body">
							<div class="col-md-12">
								<?php
								$fdate = $_POST['fromdate'];
								$tdate = $_POST['todate'];
								$rtype = $_POST['requesttype'];
								?>
								<h5 class="text-center text-primary">Informe de Gastos Anual desde <?php echo $fdate ?> hasta <?php echo $tdate ?></h5>
								<hr />
								<div class="table-responsive">
									<table id="datatable" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>N°</th>
												<th>Año</th>
												<th>Monto de Gastos</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$userid = $_SESSION['detsuid'];
											$ret = mysqli_query($con, "SELECT YEAR(ExpenseDate) as rptyear, SUM(ExpenseCost) as totalyear FROM tblexpense WHERE (ExpenseDate BETWEEN '$fdate' AND '$tdate') AND (UserId='$userid') GROUP BY YEAR(ExpenseDate)");
											$cnt = 1;
											$totalsexp = 0;
											while ($row = mysqli_fetch_array($ret)) {
											?>
												<tr>
													<td><?php echo $cnt; ?></td>
													<td><?php echo $row['rptyear']; ?></td>
													<td><?php echo $ttlsl = $row['totalyear']; ?></td>
												</tr>
											<?php
												$totalsexp += $ttlsl;
												$cnt++;
											} ?>
										</tbody>
										<tfoot>
											<tr>
												<th colspan="2" class="text-right">Total General</th>
												<td><?php echo $totalsexp; ?></td>
											</tr>
										</tfoot>
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
<?php } ?>