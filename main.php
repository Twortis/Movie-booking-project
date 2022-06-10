<?php
include ("include/header.php");
$sq="select * from movies where m_shw=1";
$res=mysqli_query($con,$sq);
?>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body class="body">
	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<div class="grid">
	<div class="header_login">
	</div>
	<div class="header_autorith">
		<form name="test1" method="post" id="login" action="input1.php">
   		<a href="#" class="button7">Авторизоваться</a>
	</div>
	<div class="logo">
		<img src="Images/logo.jpg" style="width:100px;height:100px;">
	</div>
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
      <img src="Images/first_picture.jpg" class="d-block w-100" alt="..." style="width:100%;height: 400px;">
      <div class="carousel-caption d-none d-md-block">
	  <h5 style="color:white">Все премьеры в день выхода</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="Images/second_picture.jpg" class="d-block w-100" alt="..." style="width:100%;height: 400px;">
      <div class="carousel-caption d-none d-md-block" style="padding: 30px;text-align: bottom;">
	  <p style="color:gray;font-size:10px; text-indent: 40px;"> Для получения скидки, покажи подпску контролеру</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="Images/third_picture.jpg" class="d-block w-100" alt="..." style="width:100%;height: 400px;">
      <div class="carousel-caption d-none d-md-block">
	  <h5 style="color:white">Акции на каждого</h5>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<div class="info">
    <div class="now-showing-movies">
        <h3 class="m-head" align="center">В прокате</h3>
        <?php
        while($m_row=mysqli_fetch_assoc($res))
        {
        ?>

	<div class="card_first_film">
	<a href="buynow.php?id=<?php echo$m_row['m_id']; ?>" class="mask">
		<img src="upload/<?php echo $m_row['m_banner'];?>" />
	</div>
            <div class="m-movie-title">
                <a class="m-movie-link" href="buynow.php?id=<?php echo$m_row['m_id']; ?>"><?php echo$m_row['m_nm']; ?></a>
            </div>
                <div class="clearfix"></div>
                <div class="m-r-date">
                    <p><i class="fa fa-calendar-o"></i><?php echo$m_row['m_date']; ?></p>
                    <a href="buynow.php?id=<?php echo$m_row['m_id']; ?>">Забронировать билет</a>

            </div>
                <div class="clearfix"></div>
            </div>
            </div>
            </a>

	</div>
	<div class="card_second_film">
		<p><img src="Images/second_film_img.jpg" style="height:200px; width:100px;" align="left"></p>
		<p class="card_text">1917</p>
		<p style="color:white">Зал 1</p>
		<p style="color:white">Время: 16:00<sup style="font-size:10px">200₽</sup></p>
	</div>
	<div class="third_film">
		<p><img src="Images/third_film_img.jpg" style="height:200px; width:100px;" align="left"></p>
		<p class="card_text">Паразиты</p>
		<p style="color:white">Зал 1</p>
		<p style="color:white">Время: 21:00<sup style="font-size:10px">300₽</sup></p>
	</div>

	<div class="footer">
		<p>Немного о нас</p>
	</div>
</div>

</body>
	<?php
		}
		?>
<?php
		include ('include/footer.php');
		?>