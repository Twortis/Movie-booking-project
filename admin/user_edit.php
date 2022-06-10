<?php
	include("include/header.php");
	include("../include/config.php");
	$id=$_GET['id'];
	$sq="select *  from register where r_id=$id ";
	$res=mysqli_query($con,$sq);
	$row=mysqli_fetch_assoc($res);
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Users</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
	<div class="card-header py-3">
	  <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
	</div>
	<div class="card-body">
		<form action="user_editpro.php" method="post">
			<div class="form-group">
				<label>User Name</label>
				<input type="text" class="form-control" name="rnm" value="<?php echo$row['r_nm']; ?>" required>
			</div>
			<div class="form-group">
				<label>User Age</label>
				<input type="text" class="form-control" name="age" value="<?php echo$row['r_age']; ?>" required>
			</div>
			
			
			<div class="form-group">
				<label>Gender</label>
				<select class="form-control" name="gender" >
<option value ="Male">Male</option>
<option value ="Female">Female</option>
</select>
			    <input type="hidden" name="id" value ="<?php echo$row['r_id']; ?>" >
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="email" value="<?php echo$row['r_email']; ?>" required>
				
			</div>
			<div class="form-group">
				<label>Mobile No.</label>
				<input type="text" class="form-control" name="mno" value="<?php echo$row['r_mno']; ?>" required>
			</div>
			<input type="submit" class="btn btn-success btn-sm" value="Submit">
			<a href="user_disable.php?id=<?php echo$row['r_id']; ?>" class="btn btn-danger btn-sm">Disable</a>
		</form>
	</div>
  </div>

</div>
<!-- /.container-fluid -->
<?php
	include("include/footer.php");
?>