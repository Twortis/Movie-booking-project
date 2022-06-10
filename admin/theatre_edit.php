<?php
	include("include/header.php");
	include("../include/config.php");
	$id=$_GET['id'];
	$sq="select *  from theatre where t_id=$id ";
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
		<form action="theatre_editpro.php" method="post">
			<div class="form-group">
				<label>Theatre Name</label>
				<input type="text" class="form-control" name="tnm" value="<?php echo$row['t_nm']; ?>" required>
			</div>
			
			<div class="form-group">
				<label>City</label>
				<input type="text" class="form-control" name="city" value ="<?php echo$row['t_city']; ?>   " required>
			    <input type="hidden" name="id" value ="<?php echo$row['t_id']; ?>" >
			</div>
			
			<input type="submit" class="btn btn-success btn-sm" value="Submit">
			<a href="theatre_disable.php?id=<?php echo$row['t_id']; ?>" class="btn btn-danger btn-sm">Disable</a>
		</form>
	</div>
  </div>

</div>
<!-- /.container-fluid -->
<?php
	include("include/footer.php");
?>