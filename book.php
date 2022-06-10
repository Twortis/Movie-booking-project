
<?php include('include/header.php');
$id=$_GET['id'];
$avl=array();
if(!isset($_SESSION['client']['status']))
{
	header("location:login.php");
}
	$qry2=mysqli_query($con,"select * from shows where show_id=$id");
	$show=mysqli_fetch_array($qry2);
	$_SESSION['show']=$id;
	$mid=$show['show_m'];
	$_SESSION['movie']=$mid;
	$m_res=mysqli_query($con,"select * from movies where m_id=$mid");
	$m_row=mysqli_fetch_assoc($m_res);
	?>
<div class="content">
	<style type="text/css">
		.redBackground{
			 background-color:red;
		}
	</style>
	<div class="wrap">
		<div class="content-top" >
			<div class="container">
				 
  <div class="col-md-10">
				<div class="section group">
					<div class="about span_1_of_21">	
					<center><h3 style="color:blue;text-transform:uppercase;font-weight:bold;">Название фильма : <?php echo $m_row['m_nm']; ?></h3>	</center>
							<div class="about-top">	
								<div class="grid images_3_of_2">
									<img src="upload/<?php echo $m_row['m_banner']; ?>" alt="banner" width="400px" height="300px"/>
								</div>
								<div class="desc span_3_of_2">
									<p class="p-link" style="font-size:15px;margin-left:10px"><b>Жанр : </b><?php echo $m_row['m_genre']; ?></p>
									<p class="p-link" style="font-size:15px;margin-left:10px"><b>Продолжительность : </b><?php echo $m_row['m_duration']; ?></p>
									<p style="font-size:15px;margin-left:10px"><b>Описание : </b><?php echo $m_row['m_des']; ?></p>
								</div>
								<div class="clear"></div>
							</div>
							
							<table class="table table-hover table-bordered text-center">
							<?php
								$s=mysqli_query($con,"select * from shows where show_id=$id ");
								$shw=mysqli_fetch_array($s);
								
									$t=mysqli_query($con,"select * from theatre where t_id='".$show['show_t']."'");
									$theatre=mysqli_fetch_array($t);
	$_SESSION['theatre']=$theatre['t_id'];
									?>
									<tr>
										<td class="col-md-6">
											<strong>Кинотеатр</strong>
										</td>
										<td>
											<?php echo $theatre['t_nm'].", ".$theatre['t_city'];?>
										</td>
										</tr>
										<tr>
											<td>
												<strong>Экран</strong>
											</td>
										<td>
											<?php 
												$sn=mysqli_query($con,"select  * from screen where s_id='".$show['show_s']."'");
												
												$screen=mysqli_fetch_array($sn);
												echo $screen['s_nm'];
							
												?>
										</td>
									</tr>
									<tr>
										<td>
											<strong>Дата</strong>
										</td>
										<td>
						<?php 
								echo$show['show_date'];
							?>
						
										</td>
									</tr>
									<tr>
										<td>
											<strong>Начало сеанса</strong>
										</td>
										<td>
											<?php echo $show['show_time'];?>
										</td>
									</tr>
									<tr>
										<div class="col-md-12">
										<div class="row">
										<div class="col-md-4">
										<td>
											<strong>Места для бронирования </strong><br><br>
											<i class="fa fa-ban" aria-hidden="true" style="color:red; font-size:20px;"></i>  &nbsp; <b>Уже забронированы</b><br><br>
											<i class="fa fa-square-o" aria-hidden="true" style=" font-size:20px;"></i> &nbsp;<strong>Доступны </strong><br><br>
											<i class="fa fa-check-square-o" aria-hidden="true" style=" font-size:20px;"></i> &nbsp;<strong>Выбраны </strong><br><br>
											<div style="h3 after:hover{color:blue};">
                                           
											</div>
										</td>
										</div>
										<div class="col-md-8"> 
										<td> 
											<form  action="process_booking.php" method="post" id="devel-generate-content-form">
												<input type="hidden" name="screen" value="<?php echo $show['show_s'];?>"/>
												<div class="form-item form-type-checkbox form-item-node-types-forum col-md-11">
												<?php
												$ses=mysqli_query($con,"select * from seat where seat_show=$id");
												while($srow=mysqli_fetch_array($ses))
												{
												 ?>  
												 <div class="col-md-2" style="display:inline-block;">
													<input type="checkbox" id="edit-node-types-article" name="seats[]" <?php if($srow['seat_uid'] != 0){?>  style="display:inline-block; height:20px; width:20px;background-color: #a77e2d !important;
  color: #ffffff !important;"<?php  }else {?> style="display:inline-block; background: red; height:20px;width:20px"<?php } ?>  class="form-control"  value="<?php echo $srow['seat_id'];?>" <?php if($srow['seat_uid'] != 0){ echo ' disabled'; }  ?>>
												  
												<?php  echo $srow['seat_row'].''.$srow['seat_col'].'</div>';}
												?>
												</div>
											
											<input type="hidden" name="amount" id="hm" value="<?php echo $show['show_price'];?>"/>
											<input type="hidden" name="seat" min="1" id="seat" value=""/>
											<input type="hidden" name="seats" min="1" id="seats" value=""/>
											<input type="hidden" name="date" value="<?php echo $show['show_date'];?>"/>
											<input type="hidden" name="time" value="<?php echo $show['show_time'];?>"/>
										</td>
										</div>
										</div>
									</tr>
									<tr>
										<td>
											Стоимость
										</td>
										<td id="amount" style="font-weight:bold;font-size:18px">
                                            ₽ <?php echo $show['show_price']; ?>
										</td>
									</tr>
									<tr>
										<td colspan="2"><?php if($show['show_seat']==0){?><button type="button" class="btn btn-danger" style="width:100%">Полный дом</button><?php } else { ?>
										<button class="btn btn-info" type="submit" style="width:100%">Забронировать</button>
										<?php } ?>
										</form>
										</td>
									</tr>
						<table>
							<tr>
								<td></td>
							</tr>
						</table>
					</div>

			</div>
				<div class="clear"></div>
			
			</div>
	</div>
	</div>
</div>
	
<?php include('include/footer.php');?>
<script type="text/javascript">

		$(document).ready(function(){
			
			$('input[type=checkbox]:checked').css('background-color','black');
		$("form").submit(function(){
			if($('input[type=checkbox]:checked').length<1)
		   {
			   alert("Пожалуйста, выберите место");
			   return false;
		   }
		});
		 
    var $checkboxes = $('#devel-generate-content-form  input[type="checkbox"]');
        
    $checkboxes.change(function(){
        var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
        $('#count-checked-checkboxes').text(countCheckedCheckboxes);
        $('#seats').val(countCheckedCheckboxes);
		var charge=<?php echo $show['show_price'];?>;
	      
		amount=charge*countCheckedCheckboxes;
		$('#amount').html("₽ "+amount);
		$('#hm').val(amount);
		$('#seats').val(countCheckedCheckboxes);
		//Create an Array.
            var selected = new Array();
 
            //Reference the CheckBoxes and insert the checked CheckBox value in Array.
            $("#devel-generate-content-form input[type=checkbox]:checked").each(function () {
                selected.push(this.value);
            });
			$('#seat').val(selected);
			console.log(selected);
    });
});
</script>