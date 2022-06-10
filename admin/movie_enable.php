<?php
include("../include/config.php");
session_start();
    if( !empty($_GET))
    {
	session_start();
	$id=$_GET['id'];
	$uq="update  movies set m_status=1 where m_id=$id ";
	mysqli_query($con,$uq);
	$_SESSION['enable']="Successfully Enabled";
	header("location:movie_manage.php");
	}
	else
	{
	header("location:movie.php");
	}

?>