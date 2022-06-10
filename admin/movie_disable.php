<?php
include("../include/config.php");
session_start();
    if( !empty($_GET))
    {
	session_start();
	$id=$_GET['id'];
	$uq="update  movies set m_status=0 where m_id=$id ";
	mysqli_query($con,$uq);
	$_SESSION['disable']="Successfully Disabled";
	header("location:movie_manage.php");
	}
	else
	{
	header("location:movie.php");
	}

?>