<?php
include('../include/config.php');
session_start();
extract($_POST);
if(! empty($_POST))
{
$sq="select * from admin where a_unm='".addslashes($unm)."' and a_pwd='".addslashes($pwd)."' ";
$res=mysqli_query($con,$sq);
$row=mysqli_fetch_assoc($res);
     if(! empty($row))
    {
	$_SESSION['admin']['nm']=$row['a_nm'];
	$_SESSION['admin']['uid']=$row['a_id'];
    $_SESSION['admin']['status']=true;
			header('location:index.php');
	}
	else
	{
		$_SESSION['error']="Enter Valid Email Or Password!";
		header("location:login.php");
	}

}
else
{
	$_SESSION['error']="please enter email or password!";
	header("location:login.php");
}
?>