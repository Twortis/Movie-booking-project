<?php
include("../include/config.php");
session_start();
    if( !empty($_GET))
    {
	session_start();
	$id=$_GET['id'];
	$uq="update  register set r_status=1 where r_id=$id ";
	mysqli_query($con,$uq);
	$_SESSION['enable']="Successfully Enabled";
	header("location:user_manage.php");
	}
	else
	{
	header("location:index.php");
	}

?>