<?php
session_start();
include("../include/config.php");
$sid=$_GET['sid'];
 
     $sq="select * from shows where show_unq='".$sid."' ";
     $res=mysqli_query($con,$sq);
	 $row=mysqli_fetch_array($res);
	 $snm=$row['show_id'];
	for($i='A'; $i<='H'; $i++)
	{
		for($j=1; $j<=6; $j++)
		{
			$row=$i;
			$col=$j;
			$q1="insert into seat (seat_row,seat_col,seat_show) values ('$row','$col','$snm')";
			mysqli_query($con,$q1);
			
		}
	}
		header("location:show.php");
?>