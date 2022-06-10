<?php include('include/header.php');?>
<div class="content">
	<div class="wrap">
		<div class="content-left" style="min-height:300px;padding:20px;width:100%">
			<div class="col-md-12">
				<div class="panel panel-default">
				  <div class="panel-heading">Авторизоваться</div>
				  <div class="panel-body">
				  	<?php
				if(isset($_SESSION['error']))
				{
				echo'<font color="red">'.$_SESSION['error'].'</font>';
				unset($_SESSION['error']);
			    }
				if(isset($_SESSION['done']))
				{
				echo'<font color="green">'.$_SESSION['done'].'</font>';
				unset($_SESSION['done']);
			    }
				?>
				<p class="login-box-msg">Авторизуйтесь, чтобы забронировать билеты</p>
				<form action="process_login.php" method="post">
      <div class="form-group has-feedback">
        <input name="email" type="text" size="25" placeholder="Email" class="form-control" placeholder="Email"/>

      </div>
     <div class="form-group has-feedback">
        <input name="pwd" type="password" size="25" placeholder="Password" class="form-control" placeholder="Password" />
     
      </div>
      <div class="form-group">
          <button type="submit" class="btn btn-primary">Авторизоваться</button>
 
          <p class="login-box-msg" style="padding-top:20px">Нет аккаунта? <a href="register.php">Зарегистрируйтесь</a></p>
      </div>
      </div>
</div>
    </form>
			</div>
		</div>
		</div>
	</div>
<?php include('include/footer.php');?>