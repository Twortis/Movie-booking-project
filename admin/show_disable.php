<?php
include("../include/config.php");
session_start();
    if( !empty($_GET))
    {
	session_start();
	$id=$_GET['id'];
	$mid=$_GET['mid'];
	$uq="update  shows set show_status=0 where show_id=$id ";
	mysqli_query($con,$uq);
	
		//$uqm="update  movies set m_shw=0 where m_id=$mid ";
	//mysqli_query($con,$uqm);
	$_SESSION['disable']="Successfully Disabled";
	header("location:show_manage.php");
	}
	else
	{
	header("location:show.php");
	}

?>