<?php
include("../include/config.php");
session_start();
    if( !empty($_GET))
    {
	session_start();
	$id=$_GET['id'];
	$uq="update  theatre set t_status=1 where t_id=$id ";
	mysqli_query($con,$uq);
	$_SESSION['enable']="Successfully Enabled";
	header("location:theatre_manage.php");
	}
	else
	{
	header("location:theatre.php");
	}

?>