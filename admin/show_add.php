<?php
session_start();
include("../include/config.php");
extract($_POST);
if(!empty($_POST))
{
	if(! is_numeric($price))
	{
		$_SESSION['error']= "Enter Valid Price";
	}
	else
	{   
		$unq=uniqid();
		$q="insert into shows (show_m,show_t,show_s,show_time,show_date,show_price,show_unq) values($movie,$theatre,$screen,'$time','$date',$price,'$unq')";
		mysqli_query($con,$q);
		$uq="update movies set m_shw=1 where m_id=$movie";
		mysqli_query($con,$uq);
		$_SESSION['done']="Successfully Show Added";
		header("location:seat_add.php?sid=$unq");
   }
}
	else
	{
		header("location:show.php");
	}
?>