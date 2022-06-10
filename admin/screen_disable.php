<?php
include("../include/config.php");
session_start();
    if( !empty($_GET))
    {
	session_start();
	$id=$_GET['id'];
	$uq="update  screen set s_status=0 where s_id=$id ";
	mysqli_query($con,$uq);
	$_SESSION['disable']="Successfully Disabled";
	header("location:screen_manage.php");
	}
	else
	{
	header("location:screen.php");
	}

?>