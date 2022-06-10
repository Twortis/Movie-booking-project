<?php
	include("include/header.php");
	include("../include/config.php");
	$t_q="select * from theatre";
	$t_res=mysqli_query($con,$t_q);
	$m_q="select * from movies";
	$m_res=mysqli_query($con,$m_q);
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">All Shows</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
	<div class="card-header py-3">
	  <h6 class="m-0 font-weight-bold text-primary">Add New Show</h6>
	</div>
	<div class="card-body">
		<form action="show_add.php" method="post">
			<?php
			
			if(!isset($_SESSION['sr']))
			{
			if(isset($_SESSION['done']))
			{
			echo'<font color="green">'.$_SESSION['done'].'</font>';
		unset($_SESSION['done']);
		unset($_SESSION['sr']);
			}
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
				<select name="movie" class="form-control" required>
				<?php
				while($m_row=mysqli_fetch_array($m_res))
				{
					echo'<option value="'.$m_row['m_id'].'">'.$m_row['m_nm'].'</option>';
				}
				?>
				</select>
			</div>
				<div class="form-group">
				<label>Theatre Name</label>
				<select name="theatre" class="form-control theatre" required>
			<?php
				while($t_row=mysqli_fetch_array($t_res))
				{
					echo'<option value="'.$t_row['t_id'].'">'.$t_row['t_nm'].'</option>';
				}
				?>
				</select>
				</div>
				<div class="form-group">
					<label>Screen Name</label>
 <select  class="form-control screen" name="screen" required>
 </select>
	  </div>
	
				<div class="form-group">
				<label>Show Time</label>
				<input type="time" class="form-control" name="time" required>
				</div>
				<div class="form-group">
				<label>Show Date</label>
				<input type="date" class="form-control" name="date" required>
				</div>


			<div class="form-group">
				<label>Show Price</label><br>
		       
				<input type="text" class="form-control" name="price" required>
			</div>
			<input type="submit" class="btn btn-success btn-sm" value="Submit">
		</form>
	</div>
  </div>

</div>
<script src="jquery1.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
$(".theatre").change(function()
{
var t_id=$(this).val();
var post_id = 'id='+ t_id;

$.ajax
({
type: "POST",
url: "ajax.php",
data: post_id,
cache: false,
success: function(screen)
{
$(".screen").html(screen);
} 
});

});
});
</script>
<!-- /.container-fluid -->
<?php
	include("include/footer.php");
?>