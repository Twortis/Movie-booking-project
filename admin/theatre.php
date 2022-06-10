<?php
	include("include/header.php");
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Theatres</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
	<div class="card-header py-3">
	  <h6 class="m-0 font-weight-bold text-primary">Add New Theatre</h6>
	</div>
	<div class="card-body">
		<form action="theatre_add.php" method="post">
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
				<label>Theatre Name</label>
				<input type="text" class="form-control" name="tnm" required>
			</div>
			
			<div class="form-group">
				<label>City</label>
				<input type="text" class="form-control" name="city" required>
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