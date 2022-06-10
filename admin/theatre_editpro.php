<?php
include("../include/config.php");
session_start();
extract($_POST);
    if( !empty($_POST))
    {
	$uq="update  theatre set 
t_nm='$tnm',
t_city='$city'  where t_id=$id ";
	mysqli_query($con,$uq);
	$_SESSION['update']="Successfully Updated";
	header("location:theatre_manage.php");
	}
	else
	{
	header("location:theatre.php");
	}

?>