<?php
include("../include/config.php");
session_start();
extract($_POST);
print_r($_POST);
exit;
    if( !empty($_POST))
    {
	$uq="update  shows set 
show_m='$mid',
show_t='$tid',
show_price='$price'
where show_id=$id ";
	mysqli_query($con,$uq);
	$_SESSION['update']="Successfully Updated";
	header("location:show_manage.php");
	}
	else
	{
	header("location:show.php");
	}

?>