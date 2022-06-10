<?php
include("../include/config.php");
session_start();
    if( !empty($_GET))
    {
	session_start();
	$id=$_GET['id'];
	$mid=$_GET['mid'];
	$dq="delete from shows where show_id=$id ";
	mysqli_query($con,$dq);
	//$uq="update movies set m_shw=0 where m_id=$mid";
	//mysqli_query($con,$uq);
	$_SESSION['del']="Successfully Deleted";
	header("location:show_manage.php");
	}
	else
	{
	header("location:show.php");
	}

?>