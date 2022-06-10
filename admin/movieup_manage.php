<?php
	include("include/header.php");
	include("../include/config.php");
	session_start();
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Upcoming Movies</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
	<div class="card-header py-3">
	  <h6 class="m-0 font-weight-bold text-primary">Manage Upcoming Movies</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php 
       if(isset($_SESSION['del']))
			{
			echo'<font color="red">'.$_SESSION['del'].'</font>';
		unset($_SESSION['del']);
		}
		
			if(isset($_SESSION['update']))
			{
			echo'<font color="green">'.$_SESSION['update'].'</font>';
		unset($_SESSION['update']);
			}
			if(isset($_SESSION['disable']))
			{
			echo'<font color="red">'.$_SESSION['disable'].'</font>';
		unset($_SESSION['disable']);
		}
		if(isset($_SESSION['enable']))
			{
			echo'<font color="green">'.$_SESSION['enable'].'</font>';
		unset($_SESSION['enable']);
		}
?>  
<thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Release Date</th>
                      <th>Genre</th>
                      <th>Duration (minutes)</th>
                     <th>Description</th> 
                     <th>Banner</th>
                     <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
          <?php
          $co=1;
  $sq=mysqli_query($con,"select * from upmovies");
while($row=mysqli_fetch_assoc($sq))    	
              {
                 echo'<tr>';
               echo'<td>'.$co.'</td>';
               echo'<td>'.$row['um_nm'].'</td>';
               echo'<td>'.$row['um_date'].'</td>';
             $cast=substr($row['um_genre'],0,40);
              echo'<td>'.$cast.'..</td>';
              echo'<td>'.$row['um_duration'].'</td>';
              $cnt=strlen($row['um_des']);
	$des=substr($row['um_des'],0,50);
            echo'<td>'.$des.'..</td>';
              echo'<td><img src="../upload/'.$row['um_banner'].'" width="90px" height="90px" /></td>';
             echo'<td>';
if($row['um_status']==0)
{
	echo'<a href="movieup_enable.php?id='.$row['um_id'].'" class="btn btn-info btn-sm">Enable</a>';
}
else
{
echo'<a href="movieup_edit.php?id='.$row['um_id'].'" class="btn btn-success btn-sm">Edit</a>';
}
             echo'<a href="movieup_delete.php?id='.$row['um_id'].'" class="btn btn-danger btn-sm  ">Delete</a></td>';
             $co++;
             }
             ?>
                    </tr>
                  </tbody>
                </table>
              </div>
	</div>
  </div>

</div>
<!-- /.container-fluid -->
<?php
	include("include/footer.php");
?>