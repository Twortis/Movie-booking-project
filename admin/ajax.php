<?php
include('../include/config.php');
if($_POST['id']){
	$id=$_POST['id'];
	$sql = mysqli_query($con,"SELECT * FROM `screen` WHERE s_theatre='$id'");
			while($row = mysqli_fetch_array($sql)){
				echo '<option value="'.$row['s_id'].'">'.$row['s_nm'].'</option>';
		}
		}
?>