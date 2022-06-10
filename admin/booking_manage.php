<?php
	include("include/header.php");
	include("../include/config.php");
	session_start();
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Booking History</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
	<div class="card-header py-3">
	  <h6 class="m-0 font-weight-bold text-primary">View History</h6>
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
                      <th>Movie</th>
                      <th>Theatre</th>
                      <th>Screen</th>
                      <th>Time</th>
                      <th>Seats</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                  <tbody>
          <?php
  $sq=mysqli_query($con,"select * from booking,shows,theatre,screen where b_show=show_id and b_theatre=t_id and b_screen=s_id");
  $co=1;
while($row=mysqli_fetch_assoc($sq))    	
              {
        
       $tt=date('d-m-Y',$row['s_time']);
            $m=mysqli_query($con,"select * from movies where m_id='".$row['show_m']."'");
			$mov=mysqli_fetch_array($m);
			
			$seatres=mysqli_query($con,"select * from seat where seat_uid='".$row['b_unm']."' and seat_b='".$row['show_id']."' ");
			   echo'<tr>';
               echo'<td>'.$co.'</td>';
               echo'<td>'.$mov['m_nm'].'</td>';
               echo'<td>'.$row['t_nm'].'</td>';
               echo'<td>'.$row['s_nm'].'</td>';
               echo'<td>'.$row['show_date'].'<br>'.$row['show_time'].'</td>';
			      echo'<td>';
			while($seatrow=mysqli_fetch_array($seatres))
			 {
           echo $seatrow['seat_row'].'-'.$seatrow['seat_col'].' ';
             }
			 echo'</td>';
             echo'<td>'.$row['b_amt'].'</td>';
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