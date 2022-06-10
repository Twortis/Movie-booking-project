<?php
session_start();
include('include/config.php');
$id=$_GET['id'];
$sid=$_GET['sid'];
$sq=mysqli_query($con,"select * from booking where b_bookid='$id' ");
$row=mysqli_fetch_array($sq);
$ticket=$row['b_seat'];
$us="update seat set seat_uid=0  where seat_show=$sid and seat_uid='".$_SESSION['client']['uid']."' ";
mysqli_query($con,$us);
$uq="update shows set show_seat=(show_seat + $ticket) where show_id=$sid ";
mysqli_query($con,$uq);
$t=time();
$cancl=$ticket. ' Ticket Cancellled';
	$uq="insert into activity (ac_nm,ac_time) values('$cancl','$t')";
	mysqli_query($con,$uq);
mysqli_query($con,"delete from booking where b_bookid='$id' ");
header('location:profile.php');
unset($_SESSION['seat_b']);
?>