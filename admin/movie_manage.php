<?php
	include("include/header.php");
	include("../include/config.php");
	session_start();
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Movies</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
	<div class="card-header py-3">
	  <h6 class="m-0 font-weight-bold text-primary">Manage Movies</h6>
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
                      <th>Duration (minutes)</th>
                      <th>Genre</th>
                      <th>Director Name</th>
                     <th>Description</th> 
                     <th>Banner</th> 
                       <th>Action</th> 
                    </tr>
                  </thead>
                  <tbody>
          <?php
  $sq=mysqli_query($con,"select * from movies");
  $co=1;
while($row=mysqli_fetch_assoc($sq))    	
              {
                 echo'<tr>';
               echo'<td>'.$co.'</td>';
               echo'<td>'.$row['m_nm'].'</td>';
             echo'<td>'.$row['m_duration'].'</td>';

              echo'<td>'.$row['m_genre'].'</td>';
              echo'<td>'.$row['m_dnm'].'</td>';
$des=substr($row['m_des'],0,40);
        echo'<td>'.$des.'....</td>';
     echo'<td><img src="../upload/'.$row['m_banner'].'" width="100upx" height="100px" /></td>';
             echo'<td>';
if($row['m_status']==0)
{
	echo'<a href="movie_enable.php?id='.$row['m_id'].'" class="btn btn-info btn-sm">Enable</a>';
}
else
{
echo'<a href="movie_edit.php?id='.$row['m_id'].'" class="btn btn-success btn-sm">Edit</a>';
}
             echo'<a href="movie_delete.php?id='.$row['m_id'].'" class="btn btn-danger btn-sm  ">Delete</a></td>';
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