<?php include('include/header.php');
$id=$_GET['id'];
$qry2=mysqli_query($con,"select * from movies where m_id=$id ");
$movie=mysqli_fetch_array($qry2);
  if($movie['m_shw']==0)
  {
	  $dis=true;
  }
  $s_q="select * from shows,theatre,screen,movies where show_t=t_id and show_s=s_id and show_m=m_id and show_m=$id and show_status=1";
  $s_res=mysqli_query($con,$s_q) or die (mysqli_error("no"));
 
?>
<div class="content">
<div class="wrap">
<div class="content-top" >
<div class="section group">
<div class="about span_1_of_2">	
<center><h3 style="color:blue;text-transform:uppercase;font-weight:bold">Название фильма : <?php echo $movie['m_nm']; ?></font></b></h3>	</center>
	<div class="about-top">

		<div class="grid images_3_of_2">
			<img src="upload/<?php echo $movie['m_banner']; ?>" width="40000px" height="300px"  alt="Banner Not Supported"/>
		</div>
		<div class="desc span_3_of_2">
			<p class="p-link" style="font-size:15px"><b>Жанр : </b><?php echo $movie['m_genre']; ?></p>
			<p class="p-link" style="font-size:15px"><b>Продолжительность :</b> <?php echo $movie['m_duration'] .' минут'; ?></p>
			<p style="font-size:15px"><b>Описание :</b> <?php
{
	echo $movie['m_des'];
}
?></p>
			
		</div>
		<div class="clear"></div>
	</div>
	<?php if(!isset($dis))
				{
				?>
	<table class="table table-hover table-bordered text-center" width="100%">
<tr>
				<td><b>Город</b></td>
				<td><b>Кинотеатр</b></td>
				<td><b>Экран</b></td>
				<td><b>Время</b></td>
			</tr>
			
			<?php
			
			while($s_row=mysqli_fetch_array($s_res))
			{
				
               $mdate=strtotime($s_row['show_date']);
				echo'<tr>';
				echo'<td>'.$s_row['t_city'].'</td>';
				echo'<td>'.$s_row['t_nm'].'</td>';
				echo'<td>'.$s_row['s_nm'].'</td>';
				echo'<td><a href="book.php?id='.$s_row['show_id'].'" ><b>'.$s_row['show_time'].' - '.date('d-m-Y',$mdate).'<b/></a></td>';
			}
			?>
</table>
				<?php } 
				else
				{
					echo "<center><font color='red'><h3>Нет доступных сеансов</h3></font></center>";
				}
				?>
</div>			

</div>
<div class="clear"></div>		
</div>
</div>
</div>
<?php include('include/footer.php');?>