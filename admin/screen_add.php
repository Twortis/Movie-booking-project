<?php
include('../include/config.php');
session_start();
$time=time();
extract($_POST);
if(! empty($_POST))
 {
$sq=mysqli_query($con,"select * from screen where s_nm='$snm' ");
$row=mysqli_fetch_assoc($sq);
    
    
    $q="insert into screen (s_nm,s_theatre,s_time) values ('$snm','$stheatre','$time')";
    mysqli_query($con,$q);
    $_SESSION['done']="Successfully Added";
    header("location: screen.php");
 }
else
{
header("location: screen.php");
}
?>