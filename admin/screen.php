<?php
	include("include/header.php");
	include("../include/config.php");
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Theatres Screen</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
	<div class="card-header py-3">
	  <h6 class="m-0 font-weight-bold text-primary">Add New Screen</h6>
	</div>
	<div class="card-body">
		<form action="screen_add.php" method="post">
			<?php
			if(isset($_SESSION['done']))
			{
			echo'<font color="green">'.$_SESSION['done'].'</font>';
		unset($_SESSION['done']);
			}
			if(isset($_SESSION['error']))
			{
				echo'<font color="red">'.$_SESSION['error'].'</font>';
				unset($_SESSION['error']);
			}
?>
			<div class="form-group">
				<label>Screen Name</label>
				<input type="text" class="form-control" name="snm" required>
			</div>
			<div class="form-group">
				<label>Theatre Name</label>
				<select name="stheatre" class="form-control">
					<?php
			$sq=mysqli_query($con,"select * from theatre where t_status=1");
        while($row=mysqli_fetch_assoc($sq))	
          {
          echo'<option  value=" '.$row['t_id'].' ">'.$row['t_nm'].'</option>';
          }
          ?>
			    </select>
		</div>
			<input type="submit" class="btn btn-success btn-sm" value="Submit">
		</form>
	</div>
  </div>

</div>
<!-- /.container-fluid -->
<?php
	include("include/footer.php");
?>