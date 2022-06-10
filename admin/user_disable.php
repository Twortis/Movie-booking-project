<?php
include("../include/config.php");
session_start();
    if( !empty($_GET))
    {
	session_start();
	$id=$_GET['id'];
	$uq="update  register set r_status=0 where r_id=$id ";
	mysqli_query($con,$uq);
	$_SESSION['disable']="Successfully Disabled";
	header("location:user_manage.php");
	}
	else
	{
	header("location:index.php");
	}

?>