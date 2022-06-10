<?php
include('../include/config.php');
session_start();
extract($_POST);
extract($_FILES);
$error=array();
if(! empty($_POST))
 {
$sq=mysqli_query($con,"select * from movies where m_nm='$mnm' ");
$row=mysqli_fetch_assoc($sq);    $ext=strtoupper(substr($_FILES['banner']['name'],-4));
    if(!empty($row))
    {
    $error[]="This Movie Already Added";
    header("location:movie.php");
    }
    else if(empty($_FILES))
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
 else{
 	$t=time();
 	$banner=$t.'_'.$_FILES['banner']['name'];
    move_uploaded_file($_FILES['banner']['tmp_name'],'../upload/'.$banner);
	
    $q="insert into movies (m_nm,m_duration,m_genre,m_dnm,m_des,m_banner) values ('$mnm','$duration','$genre','$dnm','$des','$banner')";
    mysqli_query($con,$q);
    $_SESSION['done']="Successfully Added";
    header("location: movie.php");
    }
 }
else
{
header("location: movie.php");
}
?>