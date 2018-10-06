<div style="display: none;">

<?php 

include '../connect_db.php';
ob_start();
session_start();

    echo "<br>edit_form = ".$edit_form = $_POST['form_type'];
	echo "<br>edit_stock_id = ".$edit_stock_id = $_POST['stock_id'];
	if($edit_form == 3){
        $getAction = 1;
    }else{
        $getAction = 2;
    }

	$account_date = "0000-00-00";
	$cus_pay_date = "0000-00-00";
	$clear_date = "0000-00-00";
	$installments_deadline_date = "0000-00-00";
	$installments_pay_date = "0000-00-00";

	if(!empty($_POST['check_account_date'])){
		echo "<br>account_date = ".$account_date = $_POST['account_date'];
	}
	if(!empty($_POST['check_cus_pay_date'])){
		echo "<br>cus_pay_date = ".$cus_pay_date = $_POST['cus_pay_date'];
	}
	if(!empty($_POST['check_clear_date'])){
		echo "<br>clear_date = ".$clear_date = $_POST['clear_date'];
	}
	if(!empty($_POST['check_installments_deadline_date'])){
		echo "<br>installments_deadline_date = ".$installments_deadline_date = $_POST['installments_deadline_date'];
	}
	if(!empty($_POST['check_pay_date'])){
		echo "<br>installments_pay_date = ".$installments_pay_date = $_POST['installments_pay_date'];
	}

	$arrears = '';
	echo "<br>bill_no = ".$bill_no = $_POST['bill_no'];
	if(!empty($_POST['arrears'])){
		echo "<br>arrears = ".$arrears = $_POST['arrears'];
		
	}
	echo "<br>installments_number = ".$installments_number = $_POST['installments_number'];
	echo "<br>installments = ".$installments = $_POST['installments'];
	echo "<br>installments_deadline_amount = ".$installments_deadline_amount = $_POST['installments_deadline_amount'];
	echo "<br>installments_pay_amount = ".$installments_pay_amount = $_POST['installments_pay_amount'];
	echo "<br>remark = ".$remark = $_POST['remark'];

	echo "<br>total_amount = ".$total_amount = $_POST['total_amount'];
	echo "<br>discount = ".$discount = $_POST['discount'];
	echo "<br>tax_deductions = ".$tax_deductions = $_POST['tax_deductions'];
	echo "<br>balance = ".$balance = $_POST['balance'];
	echo "<br>type_payment = ".$type_payment = $_POST['type_payment'];
	

	echo "<br>";
	
	$edit_count = 0;
	
	echo $sql_count = "SELECT DISTINCT(count) FROM payment WHERE stock_id = '$edit_stock_id' AND form_type = '$edit_form'";
	$query_count = mysqli_query($conn,$sql_count);
	echo $rows = mysqli_num_rows($query_count);
	
	$edit_count = $rows+1;

	if(count($_POST['status_payment']) > 0){
		print_r($_POST['status_payment']);
		foreach ($_POST['status_payment'] as $value) {
			if($value == 1){
				echo "<br>payment_total1 = ".$payment_total1 = $_POST['payment_total1'];

				echo $sql_payment1 = "INSERT INTO payment(count, form_type, stock_id, payment_type, type, total, payment_date, arrears, bill_no, refer_no, due_date, period, remark, total_amount, discount, tax_deductions, balance, pay_amount, deadline_amount, account_date, cus_pay_date, clear_date) 
					VALUES ('$edit_count','$edit_form','$edit_stock_id','$value', '$type_payment','$payment_total1', '$installments_pay_date', '$arrears', '$bill_no', '$installments_number', '$installments_deadline_date', '$installments', '$remark', '$total_amount', '$discount', '$tax_deductions', '$balance', '$installments_pay_amount', '$installments_deadline_amount', '$account_date', '$cus_pay_date', '$clear_date')";
				$query_payment1 = mysqli_query($conn,$sql_payment1);
				echo $errMsg = mysqli_error($conn);
				echo "<br>";
			}else if($value == 2){
				echo "<br>payment_total2 = ".$payment_total2 = $_POST['payment_total2'];
				echo "<br>bank2 = ".$bank2 = $_POST['bank2'];
				echo "<br>bank_branch = ".$bank_branch = $_POST['bank_branch'];
				echo "<br>check_number = ".$check_number = $_POST['check_number'];
				echo "<br>check_date = ".$check_date = $_POST['check_date'];

				echo $sql_payment2 = "INSERT INTO payment(count, form_type, stock_id, payment_type, type, bank, bank_branch, total, payment_number, payment_date, cheque_date, arrears, bill_no, refer_no, due_date, period, remark, total_amount, discount, tax_deductions, balance, pay_amount, deadline_amount, account_date, cus_pay_date, clear_date) 
					VALUES ('$edit_count','$edit_form','$edit_stock_id','$value', '$type_payment', '$bank2', '$bank_branch', '$payment_total2', '$check_number', '$installments_pay_date', '$check_date', '$arrears', '$bill_no', '$installments_number', '$installments_deadline_date', '$installments', '$remark', '$total_amount', '$discount', '$tax_deductions', '$balance', '$installments_pay_amount', '$installments_deadline_amount', '$account_date', '$cus_pay_date', '$clear_date')";
				$query_payment2 = mysqli_query($conn,$sql_payment2);
				echo $errMsg = mysqli_error($conn);
				echo "<br>";
			}else if($value == 3){
				echo "<br>payment_total3 = ".$payment_total3 = $_POST['payment_total3'];
				echo "<br>bank3 = ".$bank3 = $_POST['bank3'];

				echo $sql_payment3 = "INSERT INTO payment(count, form_type, stock_id, payment_type, type, bank, total, payment_date, arrears, bill_no, refer_no, due_date, period, remark, total_amount, discount, tax_deductions, balance, pay_amount, deadline_amount, account_date, cus_pay_date, clear_date) 
					VALUES ('$edit_count','$edit_form','$edit_stock_id','$value', '$type_payment', '$bank3', '$payment_total3',  '$installments_pay_date', '$arrears', '$bill_no', '$installments_number', '$installments_deadline_date', '$installments', '$remark', '$total_amount', '$discount', '$tax_deductions', '$balance', '$installments_pay_amount', '$installments_deadline_amount', '$account_date', '$cus_pay_date', '$clear_date')";
				$query_payment3 = mysqli_query($conn,$sql_payment3);
				echo $errMsg = mysqli_error($conn);
				echo "<br>";
			}else if($value == 4){
				echo "<br>payment_total4 = ".$payment_total4 = $_POST['payment_total4'];
				echo "<br>bank4 = ".$bank4 = $_POST['bank4'];
				echo "<br>card_type2 = ".$card_type2 = $_POST['card_type2'];
				echo "<br>card_type1 = ".$card_type1 = $_POST['card_type1'];
				echo "<br>card_number = ".$card_number = $_POST['card_number'];
				echo "<br>card_expired_date = ".$card_expired_date = $_POST['card_expired_date'];
				echo "<br>card_name = ".$card_name = $_POST['card_name'];
				echo "<br>card_ralationship_name = ".$card_ralationship_name = $_POST['card_ralationship_name'];
				echo "<br>card_tel = ".$card_tel = $_POST['card_tel'];

				echo $sql_payment4 = "INSERT INTO payment(count, form_type, stock_id, payment_type, type, bank, total, payment_number, payment_date, card_type1, card_type2, exp_date, name, relation_name, tel, arrears, bill_no, refer_no, due_date, period, remark, total_amount, discount, tax_deductions, balance, pay_amount, deadline_amount, account_date, cus_pay_date, clear_date) 
					VALUES ('$edit_count','$edit_form','$edit_stock_id','$value', '$type_payment', '$bank4', '$payment_total4', '$card_number', '$installments_pay_date', '$card_type1', '$card_type2', '$card_expired_date', '$card_name', '$card_ralationship_name', '$card_tel', '$arrears', '$bill_no', '$installments_number', '$installments_deadline_date', '$installments', '$remark', '$total_amount', '$discount', '$tax_deductions', '$balance', '$installments_pay_amount', '$installments_deadline_amount', '$account_date', '$cus_pay_date', '$clear_date')";
				$query_payment4 = mysqli_query($conn,$sql_payment4);
				echo $errMsg = mysqli_error($conn);
				echo "<br>";
			}
		}
	}


	if(empty($errMsg)){	
		echo "pass";
		echo "<meta http-equiv='refresh' content='0;url=../main.php?status=success&page=miscellany-edit".$getAction."&search=".$edit_stock_id."'>";
	}else{	
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=miscellany-edit".$getAction."&status=fail&msg=".$errMsg."&search=".$edit_stock_id."'>";
    }
    
?>

</div>