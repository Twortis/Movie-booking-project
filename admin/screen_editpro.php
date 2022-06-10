<?php
include("../include/config.php");
session_start();
extract($_POST);
    if( !empty($_POST))
    {
	$uq="update  screen set 
s_nm='$snm'  where s_id=$id ";
	mysqli_query($con,$uq);
	$_SESSION['update']="Successfully Updated";
	header("location:screen_manage.php");
	}
	else
	{
	header("location:screen.php");
	}

?>