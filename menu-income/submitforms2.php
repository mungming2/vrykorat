
<div style="display: none;">
<?php

include '../connect_db.php';
ob_start();
session_start();

	echo "<br>receive_cheque_date = ".$receive_cheque_date = $_POST['receive_cheque_date'];
	echo "<br>payment_total = ".$payment_total = $_POST['payment_total'];
	echo "<br>bank = ".$bank = $_POST['bank'];
	echo "<br>bank_branch = ".$bank_branch = $_POST['bank_branch'];
   	echo "<br>cheque_date = ".$cheque_date = $_POST['cheque_date'];
   	echo "<br>owner_payment = ".$owner_payment = $_POST['owner_payment'];
	echo "<br>stock_id = ".$stock_id = $_POST['stock_id'];
	echo "<br>owner_cheque = ".$owner_cheque = $_POST['owner_cheque'];
	echo "<br>stock_id = ".$stock_id = $_POST['stock_id'];
	echo "<br>stock_id = ".$stock_id = $_POST['stock_id'];

	echo "<br>list = ".$list = $_POST['list'];
	if($_POST['list'] == 1){
		echo "<br>list_detail = ".$list_detail = $_POST['list_detail1'];
	}elseif($_POST['list'] == 2){
		echo "<br>list_detail = ".$list_detail = $_POST['list_detail2'];
	}
	
	echo "<br>cheque_status = ".$cheque_status = $_POST['cheque_status'];
	if($_POST['cheque_status'] == 1){
		echo "<br>cheque_status_detail = ".$cheque_status_detail = $_POST['cheque_status_detail1'];
	}elseif($_POST['cheque_status'] == 2){
		echo "<br>cheque_status_detail = ".$cheque_status_detail = $_POST['cheque_status_detail2'];
	}elseif($_POST['cheque_status'] == 3){
		echo "<br>cheque_status_detail = ".$cheque_status_detail = $_POST['cheque_status_detail3'];
	}

	$sql = "INSERT INTO cheque(receive_cheque_date, bank, bank_branch, cheque_date, payment_total, owner_payment, stock_id, list, list_detail, owner_cheque, cheque_status, cheque_status_detail) VALUES ('$receive_cheque_date', '$bank', '$bank_branch', '$cheque_date', '$payment_total', '$owner_payment', '$stock_id', '$list', '$list_detail', '$owner_cheque', '$cheque_status', '$cheque_status_detail')";
	$query = mysqli_query($conn,$sql);
	echo $errMsg = mysqli_error($conn);
	echo "<br>";


	if($query){
		echo "<meta http-equiv='refresh' content='0;url=../main.php?status=success&page=income-forms1'>";
	}else{
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=income-forms1&status=fail&msg=".$errMsg."'>";
	}


?>
</div>