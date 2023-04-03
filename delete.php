<?php 
include "config.php";

if (isset($_GET["delete"])) {
	$id = $_GET["delete"];
	mysqli_query($connection,"DELETE FROM paket_kursus WHERE id = '$id'");
	header("location:index.php");
}


 ?>