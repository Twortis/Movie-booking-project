<?php
	include("include/header.php");
	include("../include/config.php");
	$id=$_GET['id'];
	$sq="select *  from screen where s_id=$id ";
	$res=mysqli_query($con,$sq);
	$row=mysqli_fetch_assoc($res);
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Theatres</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
	<div class="card-header py-3">
	  <h6 class="m-0 font-weight-bold text-primary">Edit Theatre</h6>
	</div>
	<div class="card-body">
		<form action="screen_editpro.php" method="post">
			<div class="form-group">
				<label>Screen Name</label>
				<input type="text" class="form-control" name="snm" value="<?php echo$row['s_nm']; ?>" required>
			</div>
			    <input type="hidden" name="id" value ="<?php echo$row['s_id']; ?>" >
			
			<input type="submit" class="btn btn-success btn-sm" value="Submit">
			<a href="screen_disable.php?id=<?php echo$row['s_id']; ?>" class="btn btn-danger btn-sm">Disable</a>
		</form>
	</div>
  </div>

</div>
<!-- /.container-fluid -->
<?php
	include("include/footer.php");
?>