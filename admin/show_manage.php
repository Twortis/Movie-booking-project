<?php
	include("include/header.php");
	include("../include/config.php");

?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Shows</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
	<div class="card-header py-3">
	  <h6 class="m-0 font-weight-bold text-primary">Manage Show</h6>
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
                      <th>Show Time</th>
                      <th>Show Date</th>
                      <th>Movie Name</th>
                      <th>Theatre Name</th>
                      <th>Screen Name</th>
                      <th>Show Price</th> 
                       <th>Action</th> 
                    </tr>
                  </thead>
                  <tbody>
          <?php
  $sq=mysqli_query($con,"select * from shows");

  $co=1;
while($row=mysqli_fetch_assoc($sq))    	
              {
				  $mid=$row['show_m'];
				  $sid=$row['show_s'];
				  $tid=$row['show_t'];
				    $m_sq=mysqli_query($con,"select * from movies where m_id='$mid' ");
					$m_row=mysqli_fetch_array($m_sq);
					
					  $s_sq=mysqli_query($con,"select * from screen where s_id='$sid' ");
					$s_row=mysqli_fetch_array($s_sq);
					
					  $t_sq=mysqli_query($con,"select * from theatre where t_id='$tid' ");
					$t_row=mysqli_fetch_array($t_sq);
                 echo'<tr>';
               echo'<td>'.$co.'</td>';
               echo'<td>'.$row['show_time'].'</td>';
               echo'<td>';
			   $date=strtotime($row['show_date']);
			   $date1=date('d-m-Y',$date);
			   echo $date1;
			  echo'</td>';
               echo'<td>'.$m_row['m_nm'].'</td>';
               echo'<td>'.$t_row['t_nm'].'</td>';
              echo'<td>'.$s_row['s_nm'].'</td>';
              echo'<td>'.$row['show_price'].'</td>';
             echo'<td>';
if($row['show_status']==0)
{
	echo'<a href="show_enable.php?id='.$row['show_id'].'&mid='.$m_row['m_id'].'" class="btn btn-success btn-sm">Enable</a>';
}
else
{
echo'<a href="show_disable.php?id='.$row['show_id'].'&mid='.$m_row['m_id'].'" class="btn btn-info btn-sm btn-sm">Disable</a>';
}
             echo'<a href="show_delete.php?id='.$row['show_id'].'&mid='.$m_row['m_id'].'" class="btn btn-danger btn-sm  ">Delete</a></td>';
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