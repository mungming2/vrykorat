<div style="display: none;">
<?php

include '../connect_db.php';
ob_start();
session_start();

if($_GET['forms'] == 1){
	echo "<br>bill_no == ".$bill_no = $_POST['bill_no'];
	echo "<br>deposit_date == ".$deposit_date = $_POST['deposit_date'];

	$renew = '';
	if(count($_POST['renew']) > 0){
		echo "<br>";
		echo $renew = implode(',', $_POST['renew']);
	}else{
		echo "<br>";
		echo "renew ==".$renew = NULL;
	}
	
	if($_POST['status_register'] == 999){
		echo "<br>status_register == ".$status_register = $_POST['status_register_999'];
	}else{
		echo "<br>status_register == ".$status_register = $_POST['status_register'];
	}
	echo "<br>stock_id == ".$stock_id = $_POST['stock_id'];
	echo "<br>name == ".$name = $_POST['name'];
	echo "<br>tel == ".$tel = $_POST['tel'];
	echo "<br>address == ".$address = $_POST['address'];
	echo "<br>car_number == ".$car_number = $_POST['car_number'];

	echo "<br>tax_date == ".$tax_date = $_POST['tax_date'];
	echo "<br>pay_insurance == ".$pay_insurance = $_POST['pay_insurance'];
	echo "<br>pay_tax == ".$pay_tax = $_POST['pay_tax'];
	echo "<br>pay_fine == ".$pay_fine = $_POST['pay_fine'];
	echo "<br>pay_change == ".$pay_change = $_POST['pay_change'];
	echo "<br>pay_service == ".$pay_service = $_POST['pay_service'];
	echo "<br>total == ".$total = $_POST['total'];
	echo "<br>appointment_date == ".$appointment_date = $_POST['appointment_date'];
	echo "<br>sign_depositor == ".$sign_depositor = $_POST['sign_depositor'];
	echo "<br>sign_receiver == ".$sign_receiver = $_POST['sign_receiver'];
	echo "<br>receiver == ".$receiver = $_POST['receiver'];
	echo "<br>return_date == ".$return_date = $_POST['return_date'];

	$sql_form = "INSERT INTO registration_renewal(bill_no, deposit_date, renew, status_register, stock_id, name, tel, address, car_number, tax_date, pay_insurance, pay_tax, pay_fine, pay_change, pay_service, total, appointment_date, sign_depositor, sign_receiver, receiver, return_date) VALUES ('$bill_no', '$deposit_date', '$renew', '$status_register', '$stock_id', '$name', '$tel', '$address', '$car_number', '$tax_date', '$pay_insurance', '$pay_tax', '$pay_fine', '$pay_change', '$pay_service', '$total', '$appointment_date', '$sign_depositor', '$sign_receiver', '$receiver', '$return_date')";
	$query_form = mysqli_query($conn,$sql_form);
		echo $errMsg = mysqli_error($conn);
		echo "<br>";

	if($query_form){	
		echo "<meta http-equiv='refresh' content='0;url=../main.php?status=success&page=renewal-forms1'>";
	}else{	
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=renewal-forms1&status=fail&msg=".$errMsg."'>";
	}

}elseif($_GET['forms'] == 'edit1'){
	echo "<br>id == ".$id = $_POST['id'];
	echo "<br>bill_no == ".$bill_no = $_POST['bill_no'];
	echo "<br>deposit_date == ".$deposit_date = $_POST['deposit_date'];

	$renew = '';
	if(count($_POST['renew']) > 0){
		echo "<br>";
		echo $renew = implode(',', $_POST['renew']);
	}else{
		echo "<br>";
		echo "renew ==".$renew = NULL;
	}
	
	if($_POST['status_register'] == 999){
		echo "<br>status_register == ".$status_register = $_POST['status_register_999'];
	}else{
		echo "<br>status_register == ".$status_register = $_POST['status_register'];
	}
	echo "<br>stock_id == ".$stock_id = $_POST['stock_id'];
	echo "<br>name == ".$name = $_POST['name'];
	echo "<br>tel == ".$tel = $_POST['tel'];
	echo "<br>address == ".$address = $_POST['address'];
	echo "<br>car_number == ".$car_number = $_POST['car_number'];

	echo "<br>tax_date == ".$tax_date = $_POST['tax_date'];
	echo "<br>pay_insurance == ".$pay_insurance = $_POST['pay_insurance'];
	echo "<br>pay_tax == ".$pay_tax = $_POST['pay_tax'];
	echo "<br>pay_fine == ".$pay_fine = $_POST['pay_fine'];
	echo "<br>pay_change == ".$pay_change = $_POST['pay_change'];
	echo "<br>pay_service == ".$pay_service = $_POST['pay_service'];
	echo "<br>total == ".$total = $_POST['total'];
	echo "<br>appointment_date == ".$appointment_date = $_POST['appointment_date'];
	echo "<br>sign_depositor == ".$sign_depositor = $_POST['sign_depositor'];
	echo "<br>sign_receiver == ".$sign_receiver = $_POST['sign_receiver'];
	echo "<br>receiver == ".$receiver = $_POST['receiver'];
	echo "<br>return_date == ".$return_date = $_POST['return_date'];

	$sql_form = "UPDATE registration_renewal SET bill_no='$bill_no',deposit_date='$deposit_date',renew='$renew',status_register='$status_register',stock_id='$stock_id',name='$name',tel='$tel',address='$address',car_number='$car_number',tax_date='$tax_date',pay_insurance='$pay_insurance',pay_tax='$pay_tax',pay_fine='$pay_fine',pay_change='$pay_change',pay_service='$pay_service',total='$total',appointment_date='$appointment_date',sign_depositor='$sign_depositor',sign_receiver='$sign_receiver',receiver='$receiver',return_date='$return_date' WHERE id = '$id'";
	$query_form = mysqli_query($conn,$sql_form);
		echo $errMsg = mysqli_error($conn);
		echo "<br>";

	if($query_form){	
		echo "<meta http-equiv='refresh' content='0;url=../main.php?status=success&page=renewal-edit1&search=".$bill_no."'>";
	}else{	
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=renewal-edit1&status=fail&msg=".$errMsg."&search=".$bill_no."'>";
	}

}



?>