<?php
require('db.php');
$id=$_GET["id"];
$dlt="DELETE FROM `project` WHERE id=$id";
$drun=mysqli_query($con,$dlt);
header("location:manage_admins.php");

?>