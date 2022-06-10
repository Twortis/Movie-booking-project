<?php include('include/header.php');?>
<link rel="stylesheet" href="validation/dist/css/bootstrapValidator.css"/>
    
<script type="text/javascript" src="validation/dist/js/bootstrapValidator.js"></script>
   
</div>
<div class="content">
	<div class="wrap">
		<div class="content-top" style="min-height:400px;padding:0px;width:100%">
			<div class="col-md-12">
				<div class="panel panel-default">
				  <div class="panel-heading">ЗАРЕГИСТРИРУЙТЕСЬ ДЛЯ ПОЛУЧЕНИЯ БИЛЕТА В КИНО</div>
				<?php
			if(isset($_SESSION['error']))
		{
			foreach($_SESSION['error'] as $er)
			{
				echo'<font color="red"><b>'.$er.'</b.</font>';
				echo'<br>';
			}
			unset($_SESSION['error']);
		}
		if(isset($_SESSION['done']))
		{
		echo'<font color="green"><b>'.$_SESSION['done'].'</b.</font>';
		}
		?>
				  <div class="panel-body">
				<form action="process_registration.php" method="post" id="form1">
				    <div class="form-group has-feedback">
        <input name="nm" type="text" size="25" placeholder="Имя" class="form-control" pattern="^[а-яА-ЯёЁa-zA-Z0-9]+$" required/>
</div>
<div class="form-group has-feedback">
          <input name="age" type="text" size="25" placeholder="Возраст" class="form-control".required/>
        </div>
        <div class="form-group has-feedback">
          <select name="gender" class="form-control" required >
            <option value>Выберите пол</option>
            <option>Мужчина</option>
            <option>Женщина</option>
        </select>
        </div>
        <div class="form-group has-feedback">
<input name="mno" type="tel" size="25" placeholder="+7 (xxx) xxx-xx-xx" class="form-control" required  pattern="^\+\d{1} \(\d{3}\) \d{3}-\d{2}-\d{2}$"   />
</div>
<div class="form-group has-feedback">
         <input name="email" type="text" size="25" placeholder="Email" class="form-control"  required   />
         </div>
         <div class="form-group has-feedback">
         <input name="pwd" type="password" size="25" placeholder="Пароль" class="form-control"
required  />
         </div>
         <div class="form-group has-feedback">
             <input name="cpwd" type="password" size="25" placeholder="Подтверждение пароля" class="form-control"   required   />
             </div>
            <div class="form-group">
          <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
      </div>
      </div>
</div>
    </form>
			</div>
		</div>
		<div class="clear"></div>	
		</div>
	</div>
<?php include('include/footer.php');?>