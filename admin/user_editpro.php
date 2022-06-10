<?php
include("../include/config.php");
session_start();
extract($_POST);
    if( !empty($_POST))
    {
	$uq="update  register set 
r_nm='$rnm',
r_age='$age',
r_gender='$gender',
r_email='$email',
r_mno='$mno'
  where r_id=$id ";
	mysqli_query($con,$uq);
	$_SESSION['update']="Successfully Updated";
	header("location:user_manage.php");
	}
	else
	{
	header("location:index.php");
	}

?>