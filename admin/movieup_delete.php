<?php
include("../include/config.php");
session_start();
    if( !empty($_GET))
    {
	session_start();
	$id=$_GET['id'];
	$dq="delete from upmovies where um_id=$id ";
	mysqli_query($con,$dq);
	$_SESSION['del']="Successfully Deleted";
	header("location: movieup_manage.php");
	}
	else
	{
	header("location:movieup.php");
	}

?>