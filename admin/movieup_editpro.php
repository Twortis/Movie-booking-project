<?php
include("../include/config.php");
session_start();
extract($_POST);
extract($_FILES);
$ext=strtoupper(substr($_FILES['banner']['name'],-4)); 
    if( !empty($_POST))
    {
    	if(empty($_FILES))
    {
    	$error[]="Please Upload Image";
    } 
    else if(!($ext=='.JPG' || $ext=='.PNG'|| $ext=='.GIF' || $ext=='JPEG'))
    {
    $error[]="Upload Proper Image This Type Is Invalid";	
    }
    else if(! empty($error))
    {
    $_SESSION['error']=$error;	
    header("location:movie.php");
    }
    else
    {
    $t=time();
 	$banner=$t.'_'.$_FILES['banner']['name'];
     $date=date("d-m-Y", strtotime($rdate));
move_uploaded_file($_FILES['banner']['tmp_name'],'../upload/'.$banner);
	$uq="update  upmovies set 
um_nm='$mnm',
um_date='$date',
um_genre='$genre',
um_duration='$duration',
um_des='$des',
um_banner='$banner'
  where um_id=$id ";
	mysqli_query($con,$uq);
	$_SESSION['update']="Successfully Updated";
	header("location:movieup_manage.php");
	}
}
	else
	{
	header("location:movieup.php");
	}

?>