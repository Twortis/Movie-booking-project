<?php
    session_start();
    include('include/config.php');
    extract($_POST);
    $error=array();
    $time=time();
    if(! empty($_POST))
    {
    	/*if(! is_numeric($mno))
    {
    	$error[]="Введите действительный номер мобильного телефона";
    }*/
     if(strlen($mno)<18 || strlen($mno)>18)        {
    	$error[]="Введите действительный  номер мобильного  по примеру в форме";
    }
    if($pwd!=$cpwd)
    {
   	$error[]="Пароли не совпадают";
    }
else  if(strlen($pwd)<6)
    {
 	$error[]="Введите минимальный 6-значный пароль";
    }
        $mno=mysqli_real_escape_string($con,$mno);
    $sq="select * from register where r_email='$email' and r_mno='$mno' ";
    $res=mysqli_query($con,$sq);
    $row=mysqli_fetch_assoc($res);
    if($email==$row['r_email'] || $mno==$row['r_mno'])
    {
    	$error[]="Эта Учетная Запись уже существует";
    }
    if(! empty($error))
    {
    	$_SESSION['error']=$error;
      header("location: register.php");
     }
     else
     {
         $hash=password_hash($pwd, PASSWORD_BCRYPT);
$q="insert into  register (r_nm,r_age,r_gender,r_mno,r_email,r_pwd,r_time) values('$nm','$age','$gender','$mno','$email','$hash','$time')";
        mysqli_query($con,$q);
    $_SESSION['done']="успешно зарегистрирован";
    $login=$email.' Зарегистрирован';
	$uq="insert into activity (ac_nm,ac_time) values('$login','$time')";
	mysqli_query($con,$uq);
    header("location: login.php");
   }
   }
    else
    {
    	header("location: register.php");
    }
?>