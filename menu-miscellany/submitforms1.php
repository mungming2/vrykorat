<div style="display: none;">
	<?php

include '../connect_db.php';
ob_start();
session_start();

   	echo "<br>insure_date = ".$insure_date = $_POST['insure_date'];
   	echo "<br>inform_id = ".$inform_id = '01999/'.$_POST['inform_id'];
	echo "<br>insure_type = ".$insure_type = $_POST['insure_type'];
	echo "<br>commission = ".$commission = $_POST['commission'];
   	echo "<br>inform_code = ".$inform_code = $_POST['inform_code'];
   	echo "<br>year_stock = ".$year_stock = $_POST['year_stock'];
   	echo "<br>stock_id = ".$stock_id = $_POST['stock_id'];
   	echo "<br>cus_name = ".$cus_name = $_POST['cus_name'];
   	echo "<br>cus_card_id = ".$cus_card_id = $_POST['cus_card_id'];
   	echo "<br>cus_occupation = ".$cus_occupation = $_POST['cus_occupation'];
   	echo "<br>cus_age = ".$cus_age = $_POST['cus_age'];
   	echo "<br>birth_date = ".$birth_date = $_POST['birth_date'];
   	echo "<br>cus_address1 = ".$cus_address1 = $_POST['cus_address1'];
   	echo "<br>cus_address2 = ".$cus_address2 = $_POST['cus_address2'];
   	echo "<br>cus_tel = ".$cus_tel = $_POST['cus_tel'];
   	echo "<br>save_date = ".$save_date = implode(' ถึง ',$_POST['save_date']);
   	echo "<br>insure_time = ".$insure_time = $_POST['insure_time'];
   	echo "<br>insure_duration = ".$insure_duration = $_POST['insure_duration'];
   	echo "<br>insure_total = ".$insure_total = $_POST['insure_total'];
   	echo "<br>insure_code = ".$insure_code = $_POST['insure_code'];
   	echo "<br>insure_net = ".$insure_net = $_POST['insure_net'];
   	echo "<br>insure_tax = ".$insure_tax = $_POST['insure_tax'];
   	echo "<br>insure_duty = ".$insure_duty = $_POST['insure_duty'];
   	echo "<br>insure_total2 = ".$insure_total2 = $_POST['insure_total2'];
   	echo "<br>insure_beneficiary = ".$insure_beneficiary = $_POST['insure_beneficiary'];
   	echo "<br>insure_ralationship_name = ".$insure_ralationship_name = $_POST['insure_ralationship_name'];
   	echo "<br>insure_status = ".$insure_status = $_POST['insure_status'];
   	echo "<br>insure_status_stock = ".$insure_status_stock = $_POST['insure_status_stock'];
   	echo "<br>cus_type = ".$cus_type = $_POST['cus_type'];
   	if($cus_type == 1){
		echo "<br>cus_type_detail = ".$cus_type_detail = $_POST['cus_type_detail1'];
	}else{
		echo "<br>cus_type_detail = ".$cus_type_detail = $_POST['cus_type_detail2'];
	}
   	echo "<br>stock_date = ".$stock_date = $_POST['stock_date'];
   	echo "<br>create_stock_date = ".$create_stock_date = $_POST['create_stock_date'];
   	echo "<br>alert_type = ".$alert_type = $_POST['alert_type'];
	$alert_detail = '';
	if($_POST['alert_type'] == 'โทรแจ้ง'){
   		echo "<br>alert_detail = ".$alert_detail = $_POST['alert_detail1'];
   	}elseif($_POST['alert_type'] == 'ส่งไปรษณีย์'){
   		echo "<br>alert_detail = ".$alert_detail = $_POST['alert_detail2'];
   	}else{
   		echo "<br>alert_detail = ".$alert_detail = $_POST['alert_detail3'];
	}

	$cancel_date = "0000-00-00";
	if(!empty($_POST['check_cancel_date'])){
		echo "<br>cancel_date = ".$cancel_date = $_POST['cancel_date'];
	}  
	echo "<br>cancel_detail = ".$cancel_detail = $_POST['cancel_detail'];

	echo "<br>";
	$last_id = '';

	echo $sql_form = "INSERT INTO miscellany(insure_date, inform_id, insure_type, commission, inform_code, year_stock, stock_id, cus_name, cus_card_id, cus_occupation, cus_age, birth_date, cus_address1, cus_address2, cus_tel, save_date, insure_time, insure_duration, insure_total, insure_code, insure_net, insure_tax, insure_duty, insure_total2, insure_beneficiary, insure_ralationship_name, insure_status, insure_status_stock, cus_type, cus_type_detail, stock_date, create_stock_date, alert_type, alert_detail, cancel_date, cancel_detail) 
					VALUES ('$insure_date', '$inform_id', '$insure_type', '$commission', '$inform_code', '$year_stock', '$stock_id', '$cus_name', '$cus_card_id', '$cus_occupation', '$cus_age', '$birth_date', '$cus_address1', '$cus_address2', '$cus_tel', '$save_date', '$insure_time', '$insure_duration', '$insure_total', '$insure_code', '$insure_net', '$insure_tax', '$insure_duty', '$insure_total2', '$insure_beneficiary', '$insure_ralationship_name', '$insure_status','$insure_status_stock','$cus_type','$cus_type_detail','$stock_date','$create_stock_date','$alert_type','$alert_detail', '$cancel_date', '$cancel_detail')";

		$query_form = mysqli_query($conn,$sql_form);
		if ($query_form) {
		    $last_id = mysqli_insert_id($conn);
		    echo "New record created successfully. Last inserted ID is: " . $last_id;
		} else {
		    echo $errMsg = "Error: " . $sql_form . "<br>" . mysqli_error($conn);
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
	
	if(count($_POST['status_payment']) > 0){
		print_r($_POST['status_payment']);
		foreach ($_POST['status_payment'] as $value) {
			if($value == 1){
				echo "<br>payment_total1 = ".$payment_total1 = $_POST['payment_total1'];

				echo $sql_payment1 = "INSERT INTO payment(form_type, stock_id, payment_type, type, total, payment_date, arrears, bill_no, refer_no, due_date, period, remark, total_amount, discount, tax_deductions, balance, pay_amount, deadline_amount, account_date, cus_pay_date, clear_date) 
					VALUES ('3','$last_id','$value', '$type_payment','$payment_total1', '$installments_pay_date', '$arrears', '$bill_no', '$installments_number', '$installments_deadline_date', '$installments', '$remark', '$total_amount', '$discount', '$tax_deductions', '$balance', '$installments_pay_amount', '$installments_deadline_amount', '$account_date', '$cus_pay_date', '$clear_date')";
				$query_payment1 = mysqli_query($conn,$sql_payment1);
				echo $errMsg = mysqli_error($conn);
				echo "<br>";
			}else if($value == 2){
				echo "<br>payment_total2 = ".$payment_total2 = $_POST['payment_total2'];
				echo "<br>bank2 = ".$bank2 = $_POST['bank2'];
				echo "<br>bank_branch = ".$bank_branch = $_POST['bank_branch'];
				echo "<br>check_number = ".$check_number = $_POST['check_number'];
				echo "<br>check_date = ".$check_date = $_POST['check_date'];

				echo $sql_payment2 = "INSERT INTO payment(form_type, stock_id, payment_type, type, bank, bank_branch, total, payment_number, payment_date, cheque_date, arrears, bill_no, refer_no, due_date, period, remark, total_amount, discount, tax_deductions, balance, pay_amount, deadline_amount, account_date, cus_pay_date, clear_date) 
					VALUES ('3','$last_id','$value', '$type_payment', '$bank2', '$bank_branch', '$payment_total2', '$check_number', '$installments_pay_date', '$check_date', '$arrears', '$bill_no', '$installments_number', '$installments_deadline_date', '$installments', '$remark', '$total_amount', '$discount', '$tax_deductions', '$balance', '$installments_pay_amount', '$installments_deadline_amount', '$account_date', '$cus_pay_date', '$clear_date')";
				$query_payment2 = mysqli_query($conn,$sql_payment2);
				echo $errMsg = mysqli_error($conn);
				echo "<br>";
			}else if($value == 3){
				echo "<br>payment_total3 = ".$payment_total3 = $_POST['payment_total3'];
				echo "<br>bank3 = ".$bank3 = $_POST['bank3'];

				echo $sql_payment3 = "INSERT INTO payment(form_type, stock_id, payment_type, type, bank, total, payment_date, arrears, bill_no, refer_no, due_date, period, remark, total_amount, discount, tax_deductions, balance, pay_amount, deadline_amount, account_date, cus_pay_date, clear_date) 
					VALUES ('3','$last_id','$value', '$type_payment', '$bank3', '$payment_total3',  '$installments_pay_date', '$arrears', '$bill_no', '$installments_number', '$installments_deadline_date', '$installments', '$remark', '$total_amount', '$discount', '$tax_deductions', '$balance', '$installments_pay_amount', '$installments_deadline_amount', '$account_date', '$cus_pay_date', '$clear_date')";
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

				echo $sql_payment4 = "INSERT INTO payment(form_type, stock_id, payment_type, type, bank, total, payment_number, payment_date, card_type1, card_type2, exp_date, name, relation_name, tel, arrears, bill_no, refer_no, due_date, period, remark, total_amount, discount, tax_deductions, balance, pay_amount, deadline_amount, account_date, cus_pay_date, clear_date) 
					VALUES ('3','$last_id','$value', '$type_payment', '$bank4', '$payment_total4', '$card_number', '$installments_pay_date', '$card_type1', '$card_type2', '$card_expired_date', '$card_name', '$card_ralationship_name', '$card_tel', '$arrears', '$bill_no', '$installments_number', '$installments_deadline_date', '$installments', '$remark', '$total_amount', '$discount', '$tax_deductions', '$balance', '$installments_pay_amount', '$installments_deadline_amount', '$account_date', '$cus_pay_date', '$clear_date')";
				$query_payment4 = mysqli_query($conn,$sql_payment4);
				echo $errMsg = mysqli_error($conn);
				echo "<br>";
			}
		}
	}

	if($query_form){
		echo "<meta http-equiv='refresh' content='0;url=../main.php?status=success&page=miscellany-forms1'>";
	}else{
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=miscellany-forms1&status=fail&msg=".$errMsg."'>";
	}


?>
</div>