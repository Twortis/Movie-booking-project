<?php
include("../include/config.php");
session_start();
extract($_POST);
extract($_FILES);
$error=array();
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
    header("location:movie_edit.php");
    }
    else
    {
    $t=time();
 	$banner=$t.'_'.$_FILES['banner']['name'];
    move_uploaded_file($_FILES['banner']['tmp_name'],'../upload/'.$banner);	
    $uq="update  movies set 
m_nm='$mnm',
m_duration='$duration',
m_genre='$genre',
m_dnm='$dnm',
m_des='$des',
m_banner='$banner'
  where m_id=$id ";
	mysqli_query($con,$uq);
	$_SESSION['update']="Successfully Updated";
	header("location:movie_manage.php");
	}
}
	else
	{
	header("location:movie.php");
	}

?>