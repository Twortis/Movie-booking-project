<?php
	include("include/header.php");
	include("../include/config.php");
	$id=$_GET['id'];
	$sq="select *  from shows where show_id=$id ";
	$res=mysqli_query($con,$sq);
	$row=mysqli_fetch_assoc($res);
	$t_q="select * from theatre";
	$t_res=mysqli_query($con,$t_q);
	$m_q="select * from movies";
	$m_res=mysqli_query($con,$m_q);
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
		<form action="show_editpro.php" method="post">
			<div class="form-group">
				<label>Show Movie</label>
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
				<label>Show Theatre</label>
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
			<label>Show Price</label>
			<input type="text" name="price" class="form-control" value="<?php echo $row['show_price']; ?> "required>
			    <input type="hidden" name="id" value ="<?php echo $row['show_id']; ?>" >
			    <input type="hidden" name="mid" value ="<?php echo $m_row['m_id']; ?>" >
			  
			    <input type="hidden" name="tid" value ="<?php echo $t_row['t_id']; ?>" >
			
			<input type="submit" class="btn btn-success btn-sm" value="Submit">
			<a href="screen_disable.php?id=<?php echo $row['show_id']; ?>" class="btn btn-danger btn-sm">Disable</a>
		</form>
	</div>
  </div>

</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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