<?php

include '../connect_db.php';

$check_id = $_POST['id'];
if($_GET['forms'] == 1){
	if($check_id != 0 || $check_id != '-'){
		$sql = "SELECT index_id FROM insure_payment WHERE index_id = '$check_id'";
		$query = mysqli_query($conn,$sql);
		$num = mysqli_num_rows($query);
		
		echo $num;
	}else{
		echo '0';
	}
}elseif ($_GET['forms'] == 2) {
	if($check_id != 0 || $check_id != '-'){
		$sql = "SELECT stock_id FROM insure_payment2 WHERE stock_id = '$check_id'";
		$query = mysqli_query($conn,$sql);
		$num = mysqli_num_rows($query);
		
		echo $num;
	}else{
		echo '0';
	}
}

	



?>