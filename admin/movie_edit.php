<?php
	include("include/header.php");
	include("../include/config.php");
	$id=$_GET['id'];
	$sq="select *  from movies where m_id=$id ";
	$res=mysqli_query($con,$sq);
	$row=mysqli_fetch_assoc($res);
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Movies</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
	<div class="card-header py-3">
	  <h6 class="m-0 font-weight-bold text-primary">Edit Movie</h6>
	</div>
	<div class="card-body">
		<form action="movie_editpro.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Movie Name</label>
				<input type="text" class="form-control" name="mnm" value="<?php echo$row['m_nm']; ?>" required>
			</div>
			<div class="form-group">
				<label>Duration (minutes)</label>
				<input type="text" class="form-control" name="duration" value="<?php echo$row['m_duration']; ?>" required>
			</div>
			<div class="form-group">
				<label>Genre</label>
				<input type="text" class="form-control" name="genre" value="<?php echo$row['m_genre']; ?>" required>
			</div>
			<div class="form-group">
				<label>Director Name</label>
				<input type="text" class="form-control" name="dnm" value="<?php echo$row['m_dnm']; ?>" required>
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea class="form-control" name="des" required><?php echo$row['m_des']; ?>    </textarea>
			</div>

			<div class="form-group">
				<label>Movie Banner</label>
				<img src="../upload/<?php echo$row['m_banner']; ?>" width="90px" height="90px">
				<input type="file" class="form-control" name="banner" value="<?php echo$row['m_banner']; ?>" required>
				
			</div>
			    <input type="hidden" name="id" value ="<?php echo$row['m_id']; ?>" >
			
			<input type="submit" class="btn btn-success btn-sm" value="Submit">
			<a href="movie_disable.php?id=<?php echo$row['m_id']; ?>" class="btn btn-danger btn-sm">Disable</a>
		</form>
	</div>
  </div>

</div>
<!-- /.container-fluid -->
<?php
	include("include/footer.php");
?>