<?php
include ("include/header.php");
$sq="select * from movies where m_shw=1";
$res=mysqli_query($con,$sq);
?>
<div class="now-showing-movies">
		<h3 class="m-head" align="center">В прокате</h3>
		<?php
											while($m_row=mysqli_fetch_assoc($res))
											{
												?>
<div class="col-md-4 movie-preview">

			<a href="buynow.php?id=<?php echo$m_row['m_id']; ?>" class="mask">
				<img src="upload/<?php echo $m_row['m_banner'];?>" width="200px" height="200px" class="img zoom-img" alt="" />
				<div class="m-movie-title">
					<a class="m-movie-link" href="buynow.php?id=<?php echo$m_row['m_id']; ?>"><?php echo$m_row['m_nm']; ?></a>
					<div class="clearfix"></div>
					<div class="m-r-date">
						<p><i class="fa fa-calendar-o"></i><?php echo$m_row['m_date']; ?></p>
						<a href="buynow.php?id=<?php echo$m_row['m_id']; ?>">Забронировать билет</a>
					</div>
					</div>
					 <div class="clearfix"></div>
				</div>
			</a>
		</div>
		<?php
		}
		?>
		 <div class="clearfix"></div>
	</div>		<?php
			$usq="select * from upmovies";
$ures=mysqli_query($con,$usq);
?>
<div class="now-showing-movies">
		<h3  class="m-head" align="center">Скоро на экранах</h3>
		<?php
											while($urow=mysqli_fetch_assoc($ures))
											{
												?>
<div class="col-md-4 movie-preview">
			<a href="movie_details.php?id=<?php echo$urow['um_id']; ?>" class="mask">
				<img src="upload/<?php echo $urow['um_banner'];?>" class="img-responsive zoom-img" alt="" />
				<div class="m-movie-title">
					<a class="m-movie-link" href="movie_details.php?id=<?php echo$urow['um_id']; ?>"><?php echo$urow['um_nm']; ?></a>
					<div class="clearfix"></div>
					<div class="m-r-date">
						<p><i class="fa fa-calendar-o"></i><?php echo$urow['um_date']; ?></p>
						<a href="movie_details.php?id=<?php echo$urow['um_id']; ?>">Подробнее</a>
					</div>
					</div>
					 <div class="clearfix"></div>
				</div>
			</a>
		</div>
		<?php
		}
		?>
		 <div class="clearfix"></div>
	</div>
<?php
		include ('include/footer.php');
		?>