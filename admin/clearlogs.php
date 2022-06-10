<?php
include("../include/config.php");
session_start();
	$dq="delete from activity";
	mysqli_query($con,$dq);
	$_SESSION['del']="Successfully Deleted";
	header("location: index.php");
?>