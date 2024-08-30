<?php
$con = mysqli_connect("localhost", "root", "", "gestion-gastos");
if (mysqli_connect_errno()) {
  echo "Connection Fail" . mysqli_connect_error();
}
