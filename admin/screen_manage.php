<?php
	include("include/header.php");
	include("../include/config.php");
	session_start();
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Screens</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
	<div class="card-header py-3">
	  <h6 class="m-0 font-weight-bold text-primary">Manage Screens</h6>
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
                      <th>Theatre</th>
                      <th>Time</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
          <?php
  $sq=mysqli_query($con,"select * from screen");
  $co=1;
while($row=mysqli_fetch_assoc($sq))    	
              {
             $sid=$row['s_theatre'];	
       $tt=date('d-m-Y',$row['s_time']);
      $t_sq="select * from theatre where t_id=$sid";
               $t_res=mysqli_query($con,$t_sq);
               $t_row=mysqli_fetch_assoc($t_res);
             
               echo'<tr>';
               echo'<td>'.$co.'</td>';
               echo'<td>'.$row['s_nm'].'</td>';
               echo'<td>'.$t_row['t_nm'].'</td>';
              echo'<td>'.$tt.'</td>';
             echo'<td>';
if($row['s_status']==0)
{
	echo'<a href="screen_enable.php?id='.$row['s_id'].'" class="btn btn-info btn-sm">Enable</a>';
}
else
{
echo'<a href="screen_edit.php?id='.$row['s_id'].'" class="btn btn-success btn-sm">Edit</a>';
}
             echo'<a href="screen_delete.php?id='.$row['s_id'].'" class="btn btn-danger btn-sm  ">Delete</a></td>';
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