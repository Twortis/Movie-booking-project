<?php include("include/header.php"); 
$sq="select * from movies";
$res=mysqli_query($con,$sq);
?>

<div class="slider">
    <div class="slaidlist" style="margin-top: 30px;width:100%;height:400px;padding:30px;">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/first_picture.jpg" class="d-block w-100" alt="..." style="width:100%;height: 400px;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 style="color:white">Все премьеры в день выхода</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/second_picture.jpg" class="d-block w-100" alt="..." style="width:100%;height: 400px;">
                    <div class="carousel-caption d-none d-md-block" style="padding: 30px;text-align: center;">
                        <p style="color:gray;font-size:10px; text-indent: 40px;"> Для получения скидки, покажи подпску контролеру</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/third_picture.jpg" class="d-block w-100" alt="..." style="width:100%;height: 400px;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 style="color:white">Акции на каждого</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="now-showing-movies">
		<h3 class="m-head">В прокате</h3>
		<?php
											while($nm=mysqli_fetch_assoc($res))
											{
												
												?>
<div class="col-md-4 movie-preview">
			<a href="buynow.php?id=<?php echo$nm['m_id']; ?>" class="mask">
				<img src="upload/<?php echo $nm['m_banner'];?>" class="img-responsive zoom-img" alt="" />
				<div class="m-movie-title">
					<a class="m-movie-link" href="buynow.php?id=<?php echo$nm['m_id']; ?>"><?php echo$nm['m_nm']; ?></a>
					<div class="clearfix"></div>
					<div class="m-r-date">

						<a href="buynow.php?id=<?php echo$nm['m_id']; ?>">Забронировать билет</a>
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
	<div class="now-showing-movies">
		<h3 class="m-head">Скоро в прокате</h3>
		<?php $sq1="select * from upmovies";
$res1=mysqli_query($con,$sq1);
while($nm1=mysqli_fetch_assoc($res1))
											{
												
												?>
		<div class="col-md-4 movie-preview">
		<a href="movie_details.php?id=<?php echo$nm1['um_id']; ?>" class="mask">
				<img src="upload/<?php echo $nm1['um_banner'];?> " class="img-responsive zoom-img" alt="" />
				<div class="m-movie-title">
				<a class="m-movie-link" href="buynow.php?id=<?php echo$nm['m_id']; ?>"><?php echo$nm['m_nm']; ?></a>
					<div class="clearfix"></div>
					<div class="m-r-date">
                    <div class="text_preview">
						<p ><b  ><?php echo $nm1['um_nm']; ?></b></p>
                    </div>
					</div>
					</a>
					 <div class="clearfix"></div>
				
		</div>
		</div>
		<?php
				}
				?>
		<div class="clearfix"></div>
		</div>

 <?php include ("include/footer.php"); ?>