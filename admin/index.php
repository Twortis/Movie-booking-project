<?php
	include("include/header.php");
	include("../include/config.php");
	$sq="select * from booking ";
	$res=mysqli_query($con,$sq);
	$total=0;
	$ttlbooking =0;
	while($row=mysqli_fetch_array($res))
	{
		$total=$total+$row['b_amt'];
		$ttlbooking=$ttlbooking+$row['b_seat'];
	}
	$shw = mysqli_query($con,"SELECT * FROM shows");
    $ttlshow = mysqli_num_rows($shw);

    
	
	$usr = mysqli_query($con,"SELECT * FROM register");
    $ttluser = mysqli_num_rows($usr);
	

?>
  <div class="container-fluid">

 <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Earnings</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-rupee-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			
			    <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Shows</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $ttlshow; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-film fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Bookings</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $ttlbooking; ?></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width:
<?php
if($ttlbooking==0)
  {
echo "0%";
  }
elseif($ttlbooking<10)
  {
echo "10%";
  }
 elseif($ttlbooking<20)
  {
echo "20%";
  }
 elseif($ttlbooking<30)
  {
echo "30%";
  }
 elseif($ttlbooking<40)
  {
echo "40%";
  }
  elseif($ttlbooking<50)
  {
echo "50%";
  }
  elseif($ttlbooking<60)
  {
echo "50%";
  }
  elseif($ttlbooking<70)
  {
echo "70%";
  }
  else
  {
  	echo"80%";
  }
?>" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
              	
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Users</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $ttluser; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>
        <h3 align="center" class="m-0 font-weight-bold text-primary">All Activities</h3>
      <div class="card-body">
		<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Time</th>
                      
                    </tr>
                  </thead>
                <tbody>
  <?php
  $ac_res=mysqli_query($con,"select * from activity  order by ac_id   desc");   
     $co=1;     while($ac_row=mysqli_fetch_assoc($ac_res))
           {
                 	
                   echo'<tr>
                      <td>'.$co.'</td>
                      <td>'.$ac_row['ac_nm'].'</td>
                      <td>'.date('d-m-Y',$ac_row['ac_time']).'</td>
                      
                    </tr>';
                    $co++;
          }
 ?>
    </tbody>
                </table>
              </div>
			  <a href="clearlogs.php" class="btn btn-danger btn-sm btn-sm">Clear Activities</a>
	</div>

<!-- /.container-fluid -->
<?php
	include("include/footer.php");
?>