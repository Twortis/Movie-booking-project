<?php
include('include/config.php');
session_start();
extract($_POST);
if(! empty($_POST))
{
    $email=mysqli_real_escape_string($con,$email);
    $pwd=mysqli_real_escape_string($con,$pwd);
$sq=mysqli_query($con,"select * from register where r_email='".($email)."' ");
$row=mysqli_fetch_assoc($sq);
     if(! empty($row)  )
    {
		if($row['r_status']==0)
		{
			$_SESSION['error']="Ваш аккаунт заблокирован!";
		header("location:login.php");
		}
		else if(password_verify($pwd, $row['r_pwd'])==true)
             {
                $t = time();
                $_SESSION['client']['nm'] = $row['r_nm'];
                $_SESSION['client']['uid'] = $row['r_id'];
                $_SESSION['client']['status'] = true;
                header('location:index.php');
                $login = $email . ' Вошел в систему';
                $uq = "insert into activity (ac_nm,ac_time) values('$login','$t')";
                mysqli_query($con, $uq);
            }

	}
	else
	{
		$_SESSION['error']="Неверный Email или пароль!";
		header("location:login.php");
	}

}
else
{
	$_SESSION['error']="Пожалуйста, введите Email  и пароль";
	header("location:login.php");
}
?>