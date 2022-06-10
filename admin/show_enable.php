<?php
include("../include/config.php");
session_start();
    if( !empty($_GET))
    {
	session_start();
	$id=$_GET['id'];
	$mid=$_GET['mid'];
	$uq="update  shows set show_status=1 where show_id=$id ";
	mysqli_query($con,$uq);
		$uqm="update  movies set m_shw=1 where m_id=$mid ";
	mysqli_query($con,$uqm);
	$_SESSION['enable']="Successfully Enabled";
	header("location:show_manage.php");
	}
	else
	{
	header("location:show.php");
	}

?>