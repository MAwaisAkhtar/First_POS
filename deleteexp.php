<?php
require('db.php');
$id=$_GET["id"];
$dlt="DELETE FROM `expenses` WHERE id=$id";
$drun=mysqli_query($con,$dlt);
header("location:manage_expense.php");

?>