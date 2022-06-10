<?php
include('../include/config.php');
session_start();
extract($_POST);
$error=array();
extract($_FILES);
$ext=strtoupper(substr($_FILES['banner']['name'],-4));
if(! empty($_POST))
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
$sq=mysqli_query($con,"select * from upmovies where um_nm='$mnm' and um_date='$rdate' ");
$row=mysqli_fetch_assoc($sq);
    if('$mnm'==$row['m_nm'])
    {
    $_SESSION['error']="This Movie Already Added";
    header("location:movieup.php");
    }
 else{
 	$t=time();
 	$banner=$t.'_'.$_FILES['banner']['name'];
move_uploaded_file($_FILES['banner']['tmp_name'],'../upload/'.$banner);
     $date=date("d-m-Y", strtotime($rdate));
    $q="insert into upmovies (um_nm,um_date,um_genre,um_duration,um_des,um_banner) values ('$mnm','$date','$genre','$duration','$des','$banner')";
    mysqli_query($con,$q);
    $_SESSION['done']="Successfully Added";
    header("location: movieup.php");
    }
}
 }
else
{
header("location: movieup.php");
}
?>