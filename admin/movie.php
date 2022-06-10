<?php
	include("include/header.php");
	include("../include/config.php");
?>
<!-- Begin Page Content -->
<div class="container-fluid">



  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">All Movies</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
	<div class="card-header py-3">
	  <h6 class="m-0 font-weight-bold text-primary">Add New Movie</h6>
	</div>
	<div class="card-body">
		<form action="movie_add.php" method="post"  name="form" enctype="multipart/form-data">
			<?php
			if(isset($_SESSION['done']))
			{
			echo'<font color="green">'.$_SESSION['done'].'</font>';
		unset($_SESSION['done']);
			}
			if(isset($_SESSION['error']))
			{
				foreach($_SESSION['error'] as $er)
				{
				echo'<font color="red">'.$er.'</font>';
				}
				unset($_SESSION['error']);
			}
?>
			<div class="form-group">
				<label>Movie Name</label>
				<input type="text" class="form-control" name="mnm" required>
			</div>
			<div class="form-group">
				<label>Duration (minutes)</label>
				<input type="text"   size="12" class="form-control" name="duration">
			</div>
			<div class="form-group">
				<label>Director Name</label>
				<input type="text" class="form-control" name="dnm" required>
			</div>
			<div class="form-group">
				<label>Genre</label>
				<input type="text" class="form-control" name="genre" required>
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea class="form-control" name="des"></textarea>
			</div>
			<div class="form-group">
				<label>Movie Banner</label>
				<input type="file" class="form-control" name="banner" required >
			</div>
			<input type="submit"  class="btn btn-success btn-sm" value="Submit">
		</form>
	</div>
  </div>

</div>
<!-- /.container-fluid -->
<?php
	include("include/footer.php");
?>