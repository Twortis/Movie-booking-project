<?php
include('../include/config.php');
session_start();
$time=time();
extract($_POST);
if(! empty($_POST))
 {
$sq=mysqli_query($con,"select * from theatre where t_nm='$tnm' ");
$row=mysqli_fetch_assoc($sq);
    if($tnm==$row['t_nm'])
    {
    $_SESSION['error']="This Theatre Is Already Exists";
    header("location: theatre.php");
    }
    else
    {
    $q="insert into theatre (t_nm,t_city,t_time) values ('$tnm','$city','$time')";
    mysqli_query($con,$q);
    $_SESSION['done']="Successfully Added";
    header("location: theatre.php");
    }
 }
else
{
header("location: theatre.php");
}
?>