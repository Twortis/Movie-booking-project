<?php include('include/header.php');
if(!isset($_SESSION['client']['status']))
{
	header('location:login.php');
}
	$qry2=mysqli_query($con,"select * from movies where m_id='".$_SESSION['movie']."'");
	$movie=mysqli_fetch_array($qry2);
	?>
<div class="content">
	<div class="wrap">
		<div class="content-top">
				<div class="section group">
					<div class="about span_1_of_2">	
						<h3>Билеты</h3>
						<?php
						if(isset($_SESSION['error']))
						{
							echo'<font color="red" >'.$_SESSION['error'].'</font>';
							unset($_SESSION['error']);
						}
						if(isset($_SESSION['success']))
						{
							echo'<font color="green" >'.$_SESSION['success'].'</font>';
							unset($_SESSION['success']);
						}
						?>
						<?php
				$bk=mysqli_query($con,"select * from booking where b_unm='".$_SESSION['client']['uid']."' order by b_id desc");
				if(mysqli_num_rows($bk))
				{
					?>
					<table class="table table-bordered">
						<thead>
						<th>Номер билета</th>
						<th>Фильм</th>
						<th>Кинотеатр</th>
						<th>Экран</th>
						<th>Время показа</th>
						<th>Место</th>
						<th>Цена</th>
						<th></th>
						</thead>
						<tbody>
						<?php
						while($bkg=mysqli_fetch_array($bk))
						{
							$m=mysqli_query($con,"select * from movies where m_id=(select show_m from shows where show_id='".$bkg['b_show']."')");
							$mov=mysqli_fetch_array($m);
							$s=mysqli_query($con,"select * from screen,seat where s_id='".$bkg['b_screen']."'");
							$srn=mysqli_fetch_array($s);
							$shw=mysqli_query($con,"select * from shows where show_id='".$bkg['b_show']."'");
							$shr=mysqli_fetch_array($shw);
							$seat=mysqli_query($con,"select * from seat where seat_show='".$bkg['b_show']."' and seat_uid='".$_SESSION['client']['uid']."' "); 
							$tt=mysqli_query($con,"select * from theatre where t_id='".$bkg['b_theatre']."'");
							$thr=mysqli_fetch_array($tt);
							?>
							<tr>
								<td>
									<?php echo $bkg['b_bookid'];?>
								</td>
								<td>
									<?php echo $mov['m_nm'];?>
								</td>
								<td>
									<?php echo $thr['t_nm'];?>
								</td>
								<td>
									<?php echo $srn['s_nm'];?>
								</td>
								<td>
									<?php echo $shr['show_date'].'<br>'.$shr['show_time'];?>
								</td>
								<td>
									<?php 
							while($seatrow=mysqli_fetch_array($seat))
							{
							echo $seatrow['seat_row'].'-'.$seatrow['seat_col'].' ';
							$_SESSION['seat_uid']=$seatrow['seat_uid'];
							}
							?>
								</td>
								<td>
									Rs. <?php echo $bkg['b_amt'];?>
								</td>
								<td>
									<?php  if($bkg['b_date']<date('Y-m-d'))
									{
										?>
										<i class="glyphicon glyphicon-ok"></i>
										<?php
									}
									else
									{
									echo'<a href="cancel.php?id='.$bkg['b_bookid'].'&sid='.$shr['show_id'].'">Сдать билет обратно</a>';
									}
								
									?>
								</td>
							</tr>
							<?php
						}
						?></tbody>
					</table>
					<?php
				}
				else
				{
					?>
					<h3>Нет забронированных билетов</h3>
					<?php
				}
				?>
					</div>			
				</div>
				<div class="clear"></div>		
			</div>
	</div>
</div>
<?php include('include/footer.php');?>
<script type="text/javascript">
	$('#seats').change(function(){
		var charge=<?php echo $screen['charge'];?>;
		amount=charge*$(this).val();
		$('#amount').html("Rs "+amount);
		$('#hm').val(amount);
	});
</script>