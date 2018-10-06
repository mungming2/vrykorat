<div style="display: none;">

<?php 

include '../connect_db.php';
ob_start();
session_start();

if($_GET['forms'] == 'addPayment'){
	echo "<br>edit_form = ".$edit_form = $_POST['form_type'];
	echo "<br>edit_index_id = ".$edit_index_id = $_POST['index_id'];
	echo "<br>edit_stock_id = ".$edit_stock_id = $_POST['stock_id'];

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

				echo $sql_payment1 = "INSERT INTO payment(count, form_type, index_id, stock_id, payment_type, type, total, payment_date, arrears, bill_no, refer_no, due_date, period, remark, total_amount, discount, tax_deductions, balance, pay_amount, deadline_amount, account_date, cus_pay_date, clear_date) 
					VALUES ('$edit_count','$edit_form','$edit_index_id','$edit_stock_id','$value', '$type_payment','$payment_total1', '$installments_pay_date', '$arrears', '$bill_no', '$installments_number', '$installments_deadline_date', '$installments', '$remark', '$total_amount', '$discount', '$tax_deductions', '$balance', '$installments_pay_amount', '$installments_deadline_amount', '$account_date', '$cus_pay_date', '$clear_date')";
				$query_payment1 = mysqli_query($conn,$sql_payment1);
				echo $errMsg = mysqli_error($conn);
				echo "<br>";
			}else if($value == 2){
				echo "<br>payment_total2 = ".$payment_total2 = $_POST['payment_total2'];
				echo "<br>bank2 = ".$bank2 = $_POST['bank2'];
				echo "<br>bank_branch = ".$bank_branch = $_POST['bank_branch'];
				echo "<br>check_number = ".$check_number = $_POST['check_number'];
				echo "<br>check_date = ".$check_date = $_POST['check_date'];

				echo $sql_payment2 = "INSERT INTO payment(count, form_type, index_id, stock_id, payment_type, type, bank, bank_branch, total, payment_number, payment_date, cheque_date, arrears, bill_no, refer_no, due_date, period, remark, total_amount, discount, tax_deductions, balance, pay_amount, deadline_amount, account_date, cus_pay_date, clear_date) 
					VALUES ('$edit_count','$edit_form','$edit_index_id','$edit_stock_id','$value', '$type_payment', '$bank2', '$bank_branch', '$payment_total2', '$check_number', '$installments_pay_date', '$check_date', '$arrears', '$bill_no', '$installments_number', '$installments_deadline_date', '$installments', '$remark', '$total_amount', '$discount', '$tax_deductions', '$balance', '$installments_pay_amount', '$installments_deadline_amount', '$account_date', '$cus_pay_date', '$clear_date')";
				$query_payment2 = mysqli_query($conn,$sql_payment2);
				echo $errMsg = mysqli_error($conn);
				echo "<br>";
			}else if($value == 3){
				echo "<br>payment_total3 = ".$payment_total3 = $_POST['payment_total3'];
				echo "<br>bank3 = ".$bank3 = $_POST['bank3'];

				echo $sql_payment3 = "INSERT INTO payment(count, form_type, index_id, stock_id, payment_type, type, bank, total, payment_date, arrears, bill_no, refer_no, due_date, period, remark, total_amount, discount, tax_deductions, balance, pay_amount, deadline_amount, account_date, cus_pay_date, clear_date) 
					VALUES ('$edit_count','$edit_form','$edit_index_id','$edit_stock_id','$value', '$type_payment', '$bank3', '$payment_total3',  '$installments_pay_date', '$arrears', '$bill_no', '$installments_number', '$installments_deadline_date', '$installments', '$remark', '$total_amount', '$discount', '$tax_deductions', '$balance', '$installments_pay_amount', '$installments_deadline_amount', '$account_date', '$cus_pay_date', '$clear_date')";
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

				echo $sql_payment4 = "INSERT INTO payment(count, form_type, index_id, stock_id, payment_type, type, bank, total, payment_number, payment_date, card_type1, card_type2, exp_date, name, relation_name, tel, arrears, bill_no, refer_no, due_date, period, remark, total_amount, discount, tax_deductions, balance, pay_amount, deadline_amount, account_date, cus_pay_date, clear_date) 
					VALUES ('$edit_count','$edit_form','$edit_index_id','$edit_stock_id','$value', '$type_payment', '$bank4', '$payment_total4', '$card_number', '$installments_pay_date', '$card_type1', '$card_type2', '$card_expired_date', '$card_name', '$card_ralationship_name', '$card_tel', '$arrears', '$bill_no', '$installments_number', '$installments_deadline_date', '$installments', '$remark', '$total_amount', '$discount', '$tax_deductions', '$balance', '$installments_pay_amount', '$installments_deadline_amount', '$account_date', '$cus_pay_date', '$clear_date')";
				$query_payment4 = mysqli_query($conn,$sql_payment4);
				echo $errMsg = mysqli_error($conn);
				echo "<br>";
			}
		}
	}


	if(empty($errMsg)){	
		echo "pass";
		echo "<meta http-equiv='refresh' content='0;url=../main.php?status=success&page=payment-edit".$edit_form."&search=".$edit_stock_id."'>";
	}else{	
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=payment-edit".$edit_form."&status=fail&msg=".$errMsg."&search=".$edit_stock_id."'>";
	}
}elseif($_GET['forms'] == 'update1'){
	echo "<br>no == ".$no = $_GET['no'];
	echo "<br>index_id == ".$index_id = $_POST['index_id'];
	echo "<br>year_stock = ".$year_stock = $_POST['year_stock']; 
	echo "<br>stock_id = ".$stock_id = $_POST['stock_id']; 
	echo "<br>stock_type = ".$stock_type = $_POST['stock_type'];
	echo "<br>inform_id = ".$inform_id = $_POST['inform_id']; 
	echo "<br>cus_title = ".$cus_title = $_POST['cus_title'];
	echo "<br>cus_firstname = ".$cus_firstname = $_POST['cus_firstname']; 
	echo "<br>cus_lastname = ".$cus_lastname = $_POST['cus_lastname'];
	echo "<br>cus_type = ".$cus_type = $_POST['cus_type']; 
	echo "<br>cus_card_id = ".$cus_card_id = $_POST['cus_card_id'];
	echo "<br>cus_address = ".$cus_address = implode('//',$_POST['cus_address']);
	echo "<br>cus_tel = ".$cus_tel = $_POST['cus_tel'];
	echo "<br>cus_type2 = ".$cus_type2 = $_POST['cus_type2'];
	$cus_detail = '';

	if($cus_type2 == 'vip'){
		echo "<br>cus_detail = ".$cus_detail = $_POST['cus_detail1'];
	}elseif($cus_type2 == 'ตัวแทน'){
		echo "<br>cus_detail = ".$cus_detail = $_POST['cus_detail2'];
	}
	echo "<br>cus_status = ".$cus_status = $_POST['cus_status'];
	echo "<br>cus_status_stock = ".$cus_status_stock = $_POST['cus_status_stock'];

	echo "<br>car_id = ".$car_id = $_POST['car_id'];
	echo "<br>car_number = ".$car_number = $_POST['car_number'];
	echo "<br>car_province = ".$car_province = $_POST['car_province'];
	echo "<br>car_cc_weight_seat = ".$car_cc_weight_seat = implode(' / ',$_POST['car_cc_weight_seat']);
	echo "<br>car_brand = ".$car_brand = $_POST['car_brand'];
	echo "<br>car_color = ".$car_color = $_POST['car_color'];
	echo "<br>car_chassis = ".$car_chassis = $_POST['car_chassis'];
	echo "<br>car_body = ".$car_body = $_POST['car_body'];
	echo "<br>insure_type = ".$insure_type = $_POST['insure_type'];
	echo "<br>insure_date = ".$insure_date = implode(' ถึง ',$_POST['insure_date']);
	echo "<br>insure_time = ".$insure_time = $_POST['insure_time'];
	echo "<br>insure_total1 = ".$insure_total1 = $_POST['insure_total1'];
	echo "<br>insure = ".$insure = $_POST['insure'];
	// echo "<br>insure_discount = ".$insure_discount = $_POST['insure_discount'];
	echo "<br>insure_net = ".$insure_net = $_POST['insure_net'];
	echo "<br>insure_duty = ".$insure_duty = $_POST['insure_duty'];
	echo "<br>insure_tex = ".$insure_tex = $_POST['insure_tex'];
	echo "<br>insure_total2 = ".$insure_total2 = $_POST['insure_total2'];
	echo "<br>stock_date = ".$stock_date = $_POST['stock_date'];
	echo "<br>tex_date = ".$tex_date = $_POST['tex_date'];

	$receive_payment = "";
	$receive_date = "0000-00-00";
	$payment_date = "0000-00-00";
	$cancel_date = "0000-00-00";
	$create_date = "0000-00-00";

	if(!empty($_POST['defaultCheck1'])){
		echo "<br>receive_date = ".$receive_date = $_POST['receive_date'];
	}
	if(!empty($_POST['check_payment_date'])){
		echo "<br>payment_date = ".$payment_date = $_POST['payment_date'];
	}
	if(!empty($_POST['check_cancel_date'])){
		echo "<br>cancel_date = ".$cancel_date = $_POST['cancel_date'];
	}
	if(!empty($_POST['check_create_date'])){
		echo "<br>create_date = ".$create_date = $_POST['create_date'];
	}

	echo "<br>cancel_detail = ".$cancel_detail = $_POST['cancel_detail'];

	echo $receive_payment = "'".$receive_date."','".$payment_date."','".$cancel_date."','".$create_date."'";

		echo $sql_form = "UPDATE insure_payment SET index_id='$index_id',year_stock='$year_stock',stock_id='$stock_id',stock_type='$stock_type',inform_id='$inform_id',cus_title='$cus_title',cus_firstname='$cus_firstname',cus_lastname='$cus_lastname',cus_type='$cus_type',cus_card_id='$cus_card_id',cus_address='$cus_address',cus_tel='$cus_tel',cus_type2='$cus_type2',cus_detail='$cus_detail',cus_status='$cus_status',cus_status_stock='$cus_status_stock',car_id='$car_id',car_number='$car_number',car_province='$car_province',car_cc_weight_seat='$car_cc_weight_seat',car_brand='$car_brand',car_color='$car_color',car_chassis='$car_chassis',car_body='$car_body',insure_type='$insure_type',insure_date='$insure_date',insure_time='$insure_time',insure_total1='$insure_total1',insure='$insure',insure_net='$insure_net',insure_duty='$insure_duty',insure_tex='$insure_tex',insure_total2='$insure_total2',stock_date='$stock_date',tex_date='$tex_date',receive_date='$receive_date',payment_date='$payment_date',cancel_date='$cancel_date',create_date='$create_date',cancel_detail='$cancel_detail' WHERE no = '$no'";
		$query_form = mysqli_query($conn,$sql_form);
		echo $errMsg = mysqli_error($conn);
		echo "<br>";

	if($query_form){	
		echo "<meta http-equiv='refresh' content='0;url=../main.php?status=success&page=payment-edit1&search=".$stock_id."'>";
	}else{	
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=payment-edit1&status=fail&msg=".$errMsg."&search=".$stock_id."'>";
	}

}elseif($_GET['forms'] == 'update2'){
	echo "<br>no == ".$no = $_GET['no'];
	echo "<br>getStockId = ".$getStockId = $_POST['getStockId'];
	echo "<br>index_type = ".$index_type = $_POST['index_type'];
	echo "<br>create_date = ".$create_date = $_POST['create_date'];
	echo "<br>inform_date = ".$inform_date = $_POST['inform_date'];
	echo "<br>selectagent = ".$selectagent = $_POST['selectagent'];
	echo "<br>year_stock = ".$year_stock = $_POST['year_stock']; 
	echo "<br>stock_id = ".$stock_id = $_POST['stock_id']; 
	echo "<br>stock_type = ".$stock_type = $_POST['stock_type'];
	echo "<br>inform_id = ".$inform_id = $_POST['inform_id']; 
	echo "<br>barcode = ".$barcode = $_POST['barcode']; 
	echo "<br>inform_code = ".$inform_code = $_POST['inform_code']; 

	echo "<br>cus_title = ".$cus_title = $_POST['cus_title'];
	echo "<br>cus_firstname = ".$cus_firstname = $_POST['cus_firstname']; 
	echo "<br>cus_lastname = ".$cus_lastname = $_POST['cus_lastname'];
	echo "<br>cus_type = ".$cus_type = $_POST['cus_type']; 
	echo "<br>cus_card_id = ".$cus_card_id = $_POST['cus_card_id'];
	echo "<br>cus_address = ".$cus_address = implode('//',$_POST['cus_address']);
	echo "<br>cus_tel = ".$cus_tel = $_POST['cus_tel'];
	echo "<br>cus_type2 = ".$cus_type2 = $_POST['cus_type2'];
	$cus_detail = '';

	if($cus_type2 == 'vip'){
		echo "<br>cus_detail = ".$cus_detail = $_POST['cus_detail1'];
	}elseif($cus_type2 == 'ตัวแทน'){
		echo "<br>cus_detail = ".$cus_detail = $_POST['cus_detail2'];
	}
	
	echo "<br>cus_status = ".$cus_status = $_POST['cus_status'];
	echo "<br>cus_status_stock = ".$cus_status_stock = $_POST['cus_status_stock'];

	echo "<br>insure_date = ".$insure_date = implode(' ถึง ',$_POST['insure_date']);
	echo "<br>insure_time = ".$insure_time = $_POST['insure_time'];
	echo "<br>insure_total1 = ".$insure_total1 = $_POST['insure_total1'];
	echo "<br>insure = ".$insure = $_POST['insure'];
	echo "<br>insure_discount = ".$insure_discount = $_POST['insure_discount'];
	echo "<br>insure_net = ".$insure_net = $_POST['insure_net'];
	echo "<br>insure_duty = ".$insure_duty = $_POST['insure_duty'];
	echo "<br>insure_tex = ".$insure_tex = $_POST['insure_tex'];
	echo "<br>insure_total2 = ".$insure_total2 = $_POST['insure_total2'];
	echo "<br>tax_deductions = ".$tax_deductions = $_POST['tax_deductions'];

	echo "<br>car_id = ".$car_id = $_POST['car_id'];
	echo "<br>car_number = ".$car_number = $_POST['car_number'];
	echo "<br>car_province = ".$car_province = $_POST['car_province'];
	echo "<br>car_cc_weight_seat = ".$car_cc_weight_seat = implode(' / ',$_POST['car_cc_weight_seat']);
	echo "<br>car_brand = ".$car_brand = $_POST['car_brand'];
	echo "<br>car_modal = ".$car_modal = $_POST['car_modal'];
	echo "<br>car_year = ".$car_year = $_POST['car_year'];
	echo "<br>insurance = ".$insurance = $_POST['insurance'];
	echo "<br>car_chassis = ".$car_chassis = $_POST['car_chassis'];
	echo "<br>car_body = ".$car_body = $_POST['car_body'];

	echo "<br>status = ".$status = $_POST['status'];
	if($status == 1){
		echo "<br>detail1 = ".$detail = $_POST['detail1'];
	}elseif($status == 2){
		echo "<br>detail2 = ".$detail = $_POST['detail2'];
	}
	echo "<br>vehicle = ".$vehicle = $_POST['vehicle'];
	echo "<br>type_insure = ".$type_insure = $_POST['type_insure'];
	echo "<br>driver1 = ".$driver1 = $_POST['driver1'];
	echo "<br>birth_date1 = ".$birth_date1 = $_POST['birth_date1'];
	echo "<br>occupation1 = ".$occupation1 = $_POST['occupation1'];
	echo "<br>card_number1 = ".$card_number1 = $_POST['card_number1'];
	echo "<br>driver2 = ".$driver2 = $_POST['driver2'];
	echo "<br>birth_date2 = ".$birth_date2 = $_POST['birth_date2'];
	echo "<br>occupation2 = ".$occupation2 = $_POST['occupation2'];
	echo "<br>card_number2 = ".$card_number2 = $_POST['card_number2'];
	echo "<br>beneficiary = ".$beneficiary = $_POST['beneficiary'];

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

	echo $sql_form = "UPDATE insure_payment2 SET index_type='$index_type',create_date='$create_date',inform_date='$inform_date',selectagent='$selectagent',year_stock='$year_stock',stock_id='$stock_id',stock_type='$stock_type',inform_id='$inform_id',barcode='$barcode',inform_code='$inform_code',cus_title='$cus_title',cus_firstname='$cus_firstname',cus_lastname='$cus_lastname',cus_type='$cus_type',cus_card_id='$cus_card_id',cus_address='$cus_address',cus_tel='$cus_tel',cus_type2='$cus_type2',cus_detail='$cus_detail',cus_status='$cus_status',cus_status_stock='$cus_status_stock',insure_date='$insure_date',insure_time='$insure_time',insure_total1='$insure_total1',insure='$insure',insure_net='$insure_net',insure_duty='$insure_duty',insure_tex='$insure_tex',insure_total2='$insure_total2',tax_deductions='$tax_deductions',car_id='$car_id',car_number='$car_number',car_province='$car_province',car_cc_weight_seat='$car_cc_weight_seat',car_brand='$car_brand',car_modal='$car_modal',car_year='$car_year',insurance='$insurance',car_chassis='$car_chassis',car_body='$car_body',status='$status',detail='$detail',vehicle='$vehicle',type_insure='$type_insure',driver1='$driver1',driver2='$driver2',birth_date1='$birth_date1',birth_date2='$birth_date2',occupation1='$occupation1',occupation2='$occupation2',card_number1='$card_number1',card_number2='$card_number2',beneficiary='$beneficiary',alert_type='$alert_type',alert_detail='$alert_detail',cancel_date='$cancel_date',cancel_detail='$cancel_detail'  WHERE no = '$no'";

		$query_form = mysqli_query($conn,$sql_form);
		$errMsg = mysqli_error($conn);

	if($query_form){
		echo "<meta http-equiv='refresh' content='0;url=../main.php?status=success&page=payment-edit2&search=".$getStockId."'>";
	}else{
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=payment-edit2&status=fail&msg=".$errMsg."&search=".$getStockId."'>";
	}
	
}elseif($_GET['forms'] == 'editPayment'){
	echo "<br>getStockId = ".$getStockId = $_POST['getStockId'];
	echo "<br>edit_count = ".$edit_count = $_POST['edit_count'];
	echo "<br>edit_form = ".$edit_form = $_POST['edit_form'];
	$edit_id = explode(',', $_POST['edit_id']);

	if($edit_form == 1){
		$edit_stock_id = $getStockId;
	}else{
		echo "<br>edit_stock_id = ".$edit_stock_id = $_POST['edit_stock_id'];
	}
	
	echo "<br>edit_index_id = ".$edit_index_id = $_POST['edit_index_id'];

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

	foreach ($edit_id as $key_id => $value_id) {
		echo $sql_delete = "DELETE FROM payment WHERE id = '$value_id'";
		$query_delete = mysqli_query($conn,$sql_delete);
		echo $errMsg = mysqli_error($conn);
		echo "<br>";
	}

	if(count($_POST['status_payment']) > 0){
		print_r($_POST['status_payment']);
		foreach ($_POST['status_payment'] as $value) {
			if($value == 1){
				echo "<br>payment_total1 = ".$payment_total1 = $_POST['payment_total1'];

				echo $sql_payment1 = "INSERT INTO payment(count, form_type, index_id, stock_id, payment_type, type, total, payment_date, arrears, bill_no, refer_no, due_date, period, remark, total_amount, discount, tax_deductions, balance, pay_amount, deadline_amount, account_date, cus_pay_date, clear_date) 
					VALUES ('$edit_count','$edit_form','$edit_index_id','$edit_stock_id','$value', '$type_payment','$payment_total1', '$installments_pay_date', '$arrears', '$bill_no', '$installments_number', '$installments_deadline_date', '$installments', '$remark', '$total_amount', '$discount', '$tax_deductions', '$balance', '$installments_pay_amount', '$installments_deadline_amount', '$account_date', '$cus_pay_date', '$clear_date')";
				$query_payment1 = mysqli_query($conn,$sql_payment1);
				echo $errMsg = mysqli_error($conn);
				echo "<br>";
			}else if($value == 2){
				echo "<br>payment_total2 = ".$payment_total2 = $_POST['payment_total2'];
				echo "<br>bank2 = ".$bank2 = $_POST['bank2'];
				echo "<br>bank_branch = ".$bank_branch = $_POST['bank_branch'];
				echo "<br>check_number = ".$check_number = $_POST['check_number'];
				echo "<br>check_date = ".$check_date = $_POST['check_date'];

				echo $sql_payment2 = "INSERT INTO payment(count, form_type, index_id, stock_id, payment_type, type, bank, bank_branch, total, payment_number, payment_date, cheque_date, arrears, bill_no, refer_no, due_date, period, remark, total_amount, discount, tax_deductions, balance, pay_amount, deadline_amount, account_date, cus_pay_date, clear_date) 
					VALUES ('$edit_count','$edit_form','$edit_index_id','$edit_stock_id','$value', '$type_payment', '$bank2', '$bank_branch', '$payment_total2', '$check_number', '$installments_pay_date', '$check_date', '$arrears', '$bill_no', '$installments_number', '$installments_deadline_date', '$installments', '$remark', '$total_amount', '$discount', '$tax_deductions', '$balance', '$installments_pay_amount', '$installments_deadline_amount', '$account_date', '$cus_pay_date', '$clear_date')";
				$query_payment2 = mysqli_query($conn,$sql_payment2);
				echo $errMsg = mysqli_error($conn);
				echo "<br>";
			}else if($value == 3){
				echo "<br>payment_total3 = ".$payment_total3 = $_POST['payment_total3'];
				echo "<br>bank3 = ".$bank3 = $_POST['bank3'];

				echo $sql_payment3 = "INSERT INTO payment(count, form_type, index_id, stock_id, payment_type, type, bank, total, payment_date, arrears, bill_no, refer_no, due_date, period, remark, total_amount, discount, tax_deductions, balance, pay_amount, deadline_amount, account_date, cus_pay_date, clear_date) 
					VALUES ('$edit_count','$edit_form','$edit_index_id','$edit_stock_id','$value', '$type_payment', '$bank3', '$payment_total3',  '$installments_pay_date', '$arrears', '$bill_no', '$installments_number', '$installments_deadline_date', '$installments', '$remark', '$total_amount', '$discount', '$tax_deductions', '$balance', '$installments_pay_amount', '$installments_deadline_amount', '$account_date', '$cus_pay_date', '$clear_date')";
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

				echo $sql_payment4 = "INSERT INTO payment(count, form_type, index_id, stock_id, payment_type, type, bank, total, payment_number, payment_date, card_type1, card_type2, exp_date, name, relation_name, tel, arrears, bill_no, refer_no, due_date, period, remark, total_amount, discount, tax_deductions, balance, pay_amount, deadline_amount, account_date, cus_pay_date, clear_date) 
					VALUES ('$edit_count','$edit_form','$edit_index_id','$edit_stock_id','$value', '$type_payment', '$bank4', '$payment_total4', '$card_number', '$installments_pay_date', '$card_type1', '$card_type2', '$card_expired_date', '$card_name', '$card_ralationship_name', '$card_tel', '$arrears', '$bill_no', '$installments_number', '$installments_deadline_date', '$installments', '$remark', '$total_amount', '$discount', '$tax_deductions', '$balance', '$installments_pay_amount', '$installments_deadline_amount', '$account_date', '$cus_pay_date', '$clear_date')";
				$query_payment4 = mysqli_query($conn,$sql_payment4);
				echo $errMsg = mysqli_error($conn);
				echo "<br>";
			}
		}
	}


	if(empty($errMsg)){	
		echo "pass";
		echo "<meta http-equiv='refresh' content='0;url=../main.php?status=success&page=payment-edit".$edit_form."&search=".$getStockId."'>";
	}else{	
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=payment-edit".$edit_form."&status=fail&msg=".$errMsg."&search=".$getStockId."'>";
	}
}

elseif($_GET['forms'] == 'deletePayment'){

	echo "<br>stock_id = ".$stock_id = $_GET['stock_id'];
	echo "<br>count = ".$count = $_GET['count'];
	echo "<br>form = ".$form = $_GET['form'];

	$sql_del = "DELETE FROM payment WHERE count = '$count' AND stock_id = '$stock_id'";
	$query_del = mysqli_query($conn,$sql_del);
	echo $errMsg = mysqli_error($conn);

	if($query_del){	
		echo "pass";
		echo "<meta http-equiv='refresh' content='0;url=../main.php?status=success&page=payment-edit".$form."&search=".$stock_id."'>";
	}else{	
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=payment-edit".$form."&status=fail&msg=".$errMsg."&search=".$stock_id."'>";
	}

}



?>


</div>