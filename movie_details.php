<?php include('include/header.php');
$qry2=mysqli_query($con,"select * from upmovies where um_id='".$_GET['id']."'");
$movie=mysqli_fetch_array($qry2);
$id=$_GET['id'];
?>
<div class="content"  >
<div class="wrap">
<div class="content-top" >
<div class="section group">
<div class="about span_1_of_21">	
<center><h3 style="color:blue;text-transform:uppercase;font-weight:bold">Название фильма: <?php echo $movie['um_nm']; ?></h3>	</center>
	<div class="about-top">	
		
			<div class="grid images_3_of_2">
			<img src="upload/<?php echo $movie['um_banner']; ?>" width="400px" height="200px" alt="Banner Not Supported"/>
		</div>
		
		<div class="desc span_3_of_2">
            <p class="p-link" style="font-size:15px" ><b>Дата выхода : </b><?php echo $movie['um_date']; ?></p>
			<p class="p-link" style="font-size:15px" ><b>Жанр : </b><?php echo $movie['um_genre']; ?></p>
			<p class="p-link" style="font-size:15px"><b>Продолжительность : </b><?php echo $movie['um_duration'] .' минут'; ?></p>
			<p style="font-size:15px"><b>Описание : </b><?php echo $movie['um_des']; ?></p>
		</div>
		<div class="clear"></div>
	</div>
</div>			
</div>
</div>
</div>
<?php include('include/footer.php');?>