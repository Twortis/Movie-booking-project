<?php
session_start();
if(!isset($_SESSION['admin']['status']))
	{
	header("location:login.php");
	}
	error_reporting(0);
	include("../include/config.php");
	$dsq="select * from shows";
	$dres=mysqli_query($con,$dsq);
    while($drow=mysqli_fetch_array($dres))
	{  
		$cdate=time();
		$date=$drow['show_date'];
		$time=$drow['show_time'];
		$datetime=($date.' '.$time);
		$sdate=strtotime($datetime);
		if($sdate<$cdate)
		{
            $sid=$drow['show_id'];
			$dqq="delete from shows where show_id=$sid";
			mysqli_query($con,$dqq);
			$uqq="update movies set m_shw=0 where m_id='".$drow['show_m']."'";
			mysqli_query($con,$uqq);
			$_SESSION['error'][]="Show Must be Accepted After Current Time OR Date";
			$_SESSION['sr']=true;
		}
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Panel</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-text mx-3">Admin Panel</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="user_manage.php" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-user"></i>
          <span>Manage Users</span>
        </a>  
      </li>

<li class="nav-item">
        <a class="nav-link collapsed" href="theatre.php" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-film"></i>
          <span>Add Theatres</span>
        </a>  
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="theatre_manage.php" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-film"></i>
          <span>Manage Theatres</span>
        </a>  
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="screen.php"  aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-film"></i>
          <span>Add Screen</span>
        </a>  
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="screen_manage.php" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-film"></i>
          <span>Manage Screen</span>
        </a>  
      </li>
            <li class="nav-item">
        <a class="nav-link collapsed" href="movie.php" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-film"></i>
          <span>Add Movies</span>
        </a>  
      </li>
<li class="nav-item">
        <a class="nav-link collapsed" href="movie_manage.php" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-film"></i>
          <span>Manage Movies</span>
        </a>  
      </li>
  <li class="nav-item">
        <a class="nav-link collapsed" href="movieup.php"  aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-film"></i>
          <span>Upcoming Movies</span>
        </a>  
      </li>
<li class="nav-item">
        <a class="nav-link collapsed" href="movieup_manage.php" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-film"></i>
          <span>Manage Upcoming Movies</span>
        </a>  
      </li>

    
     <li class="nav-item">
        <a class="nav-link collapsed" href="show.php" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-film"></i>
          <span>Add Show</span>
        </a>  
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="show_manage.php" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-film"></i>
          <span>Manage Show</span>
        </a> 
      </li>
	   <li class="nav-item">
        <a class="nav-link collapsed" href="booking_manage.php" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-book"></i>
          <span>View Booking</span>
        </a> 
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="contact_manage.php" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-history"></i>
          <span>View Message</span>
        </a>
      </li>
      
	  <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['admin']['nm'] ; ?></span>
                <img class="img-profile rounded-circle" src="./img/pd.jpg"> 
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

