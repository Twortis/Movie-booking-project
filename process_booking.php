
<?php 
error_reporting(0); 
include('include/header.php');
if(!isset($_SESSION['client']['status']))
{
	header('location:login.php');
}
?>
  <!-- =============================================== -->
  	<link rel="stylesheet" href="validation/dist/css/bootstrapValidator.css"/>
    
<script type="text/javascript" src="validation/dist/js/bootstrapValidator.js"></script>
</div>
<div class="content">
	<div class="wrap">
		<div class="content-top">
			<center><font color="navyblue" size="6px"><h4>Добавьте информацию о своей Дебетовой карте</h4></font></center>
			<form action="bank.php" method="post" id="form1">
			<div class="col-md-4 col-md-offset-4" style="margin-bottom:50px">
			<div class="form-group">
   <label class="control-label">Имя владельца карты</label>
    <input type="text" class="form-control" name="name">
</div>
<div class="form-group">
   <label class="control-label">Номер карты</label>
    <input type="text" class="form-control" name="number" required title="Enter 16 digit card number">
  
</div>      
<div class="form-group">
   <label class="control-label">Срок годности карты</label>
    <input type="text" class="form-control" name="date" placeholder="01/22">
</div>
<div class="form-group">
   <label class="control-label">CVV</label>
    <input type="text" class="form-control" name="cvv">
</div>
<div class="form-group">
    <button class="btn btn-success">Совершить платеж</button>
    </form>
</div>
</div>
			</div>
			
		<div class="clear"></div>	
		
	</div>
<?php include('include/footer.php');?>
</div>
<?php
    
    extract($_POST);
    include('include/config.php');
    $_SESSION['screen']=$screen;
    $_SESSION['seatno']=$seat;
	if(empty($seat))
	{
		header("book.php");
	}
	print_r($seat);
    $_SESSION['seats']=$seats;
    $_SESSION['amount']=$amount;
    $_SESSION['date']=$date;
    $_SESSION['time']=$time;
    header('location:bank.php');
?>
<script>
        $(document).ready(function() {
            $('#form1').bootstrapValidator({
            fields: { 
            name: {
            verbose: false,
                validators: {notEmpty: {
                        message: 'Имя является обязательным и не может быть пустым'
                    },regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'Имя может состоять только из букв английского алфавита'
                    } } },
            number: {
            verbose: false,
                validators: {notEmpty: {
                        message: 'Номер карты является обязательным и не может быть пустым'
                    },stringLength: {
                    min: 16,
                    max: 16,
                    message: 'Номер карты должен содержать 16 символов'
                },regexp: {
                        regexp: /^[0-9 ]+$/,
                        message: 'Введите действительный номер карты'
                    } } },
            date: {
            verbose: false,
                validators: {notEmpty: {
                        message: 'Дата истечения срока действия обязательна и не может быть пустой'
				},
				stringLength: {
                    min: 5,
                    max: 5,
					
                    message: 'Длина даты должна составлять 4 символа с чертой по середине'
                },
                      regexp:{  regexp: /^\d{2}\/\d{2}$/,
						message: 'Дата истечения срока действия недействительна'
                    } } },
            cvv: {
            verbose: false,
                validators: {notEmpty: {
                        message: 'СVV является обязательным и не может быть пустым'
                    },stringLength: {
                    min: 3,
                    max: 3,
                    message: 'Длина CVV должна составлять 3 символа'
                },regexp: {
                        regexp: /^[0-9 ]+$/,
                        message: 'Введите действительный CVV код'
                    } } }}
            });
            });

</script>