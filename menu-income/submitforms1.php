
<div style="display: none;">
<?php

include '../connect_db.php';
ob_start();
session_start();

   	echo "<br>bill_no = ".$bill_no = $_POST['bill_no'];
   	echo "<br>receive_cheque_date = ".$receive_cheque_date = $_POST['receive_cheque_date'];
   	echo "<br>type1 = ".$type1 = $_POST['type1'];
   	echo "<br>inform_id = ".$inform_id = $_POST['inform_id'];
	echo "<br>list_income = ".$list_income = $_POST['list_income'];
	
	$payment_date = '0000-00-00';
	$payment_total = '';
	$bank = '';
	$bank_branch = '';
	$cheque_number = '';

	echo "<br>status_payment = ".$status_payment = $_POST['status_payment'];
	if($_POST['status_payment'] == 1){
		echo "<br>payment_total = ".$payment_total = $_POST['payment_total1'];
	}elseif($_POST['status_payment'] == 2){
		echo "<br>payment_total = ".$payment_total = $_POST['payment_total2'];
		echo "<br>bank = ".$bank = $_POST['bank2'];
		echo "<br>bank_branch = ".$bank_branch = $_POST['bank_branch2'];
		echo "<br>payment_date = ".$payment_date = $_POST['payment_date2'];
	}elseif($_POST['status_payment'] == 3){
		echo "<br>payment_total = ".$payment_total = $_POST['payment_total3'];
		echo "<br>bank = ".$bank = $_POST['bank3'];
		echo "<br>bank_branch = ".$bank_branch = $_POST['bank_branch3'];
		echo "<br>payment_date = ".$payment_date = $_POST['payment_date3'];
		echo "<br>cheque_number = ".$cheque_number = $_POST['cheque_number'];
	}

	$sql = "INSERT INTO income(bill_no, receive_cheque_date, type1, inform_id, list_income, status_payment, payment_total, bank, bank_branch, payment_date, cheque_number) VALUES ('$bill_no', '$receive_cheque_date', '$type1', '$inform_id', '$list_income', '$status_payment', '$payment_total', '$bank', '$bank_branch', '$payment_date', '$cheque_number')";
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