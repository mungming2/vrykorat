
<div style="display: none">
	

<?php
include '../connect_db.php';
ob_start();
session_start();


if($_GET['action'] == 'add'){

	$id = $_POST['id'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	if(!is_numeric($price)){
		$price = "null";
	}
	$card_id = $_POST['card_id'];
	$license_id = $_POST['license_id'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$tel = $_POST['tel'];
	$fax = $_POST['fax'];
	$commision = $_POST['commision'];
	$selectdecimal = $_POST['selectdecimal'];
	if(!is_numeric($commision)){
		$commision = "null";
	}
	$selectPayment = $_POST['selectPayment'];
	$cheque_bank = '';
	$cheque_branch = '';
	$cheque_no = '';
	$cheque_date = '0000-00-00';
	
	if($selectPayment == '999'){
		$selectPayment = $_POST['payment_other'];
	}elseif($selectPayment == 'เช็ค'){
		$cheque_bank = $_POST['cheque_bank'];
		$cheque_branch = $_POST['cheque_branch'];
		$cheque_no = $_POST['cheque_no'];
		$cheque_date = $_POST['cheque_date'];
	}
	$selectRate = $_POST['selectRate'];
	if($selectRate == '999'){
		$selectRate = $_POST['rate_other'];
	}
	$remark = $_POST['remark'];

	echo $sql_form = "INSERT INTO agent(agent_id, name, card_id, license_id, email, address, tel, fax, insure, commision, payment, cheque_bank, cheque_branch, cheque_no, cheque_date, rate, decimal_point, remark, login_id) 
				VALUES ('$id','$name','$card_id', '$license_id', '$email','$address','$tel','$fax',$price,$commision,'$selectPayment', '$cheque_bank', '$cheque_branch', '$cheque_no', '$cheque_date', '$selectRate', '$selectdecimal', '$remark', '".$_SESSION['mem_id']."')";
	$query_form = mysqli_query($conn,$sql_form);
	echo $errCode = mysqli_errno($conn);
	echo $errMsg = mysqli_error($conn);
	if($errCode == 1062){
		$errMsg = "รหัสตัวแทน : ".$id." ซ้ำ กรุณาตรวจสอบข้อมูลอีกครั้ง";
	}

}else if($_GET['action'] == 'edit'){

	$old_id = $_POST['old_id'];
	$id = $_POST['id'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$card_id = $_POST['card_id'];
	$license_id = $_POST['license_id'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$tel = $_POST['tel'];
	$fax = $_POST['fax'];
	$commision = $_POST['commision'];
	$selectdecimal = $_POST['selectdecimal'];

	$selectPayment = $_POST['selectPayment'];
	$cheque_bank = '';
	$cheque_branch = '';
	$cheque_no = '';
	$cheque_date = '0000-00-00';
	if($selectPayment == '999'){
		$selectPayment = $_POST['payment_other'];
	}elseif($selectPayment == 'เช็ค'){
		$cheque_bank = $_POST['cheque_bank'];
		$cheque_branch = $_POST['cheque_branch'];
		$cheque_no = $_POST['cheque_no'];
		$cheque_date = $_POST['cheque_date'];
	}

	$selectRate = $_POST['selectRate'];
	if($selectRate == '999'){
		$selectRate = $_POST['rate_other'];
	}

	$remark = $_POST['remark'];

	$sql_form = "UPDATE agent 
				SET agent_id = '$id', name='$name',card_id='$card_id',license_id='$license_id',email='$email', address='$address', tel='$tel',fax='$fax', insure='$price', commision='$commision',payment='$selectPayment', cheque_bank='$cheque_bank', cheque_branch='$cheque_branch', cheque_no='$cheque_no', cheque_date='$cheque_date', rate='$selectRate', decimal_point='$selectdecimal', remark='$remark', login_id='".$_SESSION['mem_id']."',update_date=now()
				WHERE no = '$old_id'";
	$query_form = mysqli_query($conn,$sql_form);
	$errCode = mysqli_errno($conn);
	if($errCode == 1062){
		$errMsg = "รหัสตัวแทน : ".$id." ซ้ำ กรุณาตรวจสอบข้อมูลอีกครั้ง";
	}

}else if($_GET['action'] == 'delete'){
	
	$sql_form = "DELETE FROM agent WHERE no = '".$_GET['agent_id']."'";
	$query_form = mysqli_query($conn,$sql_form);
}

if($query_form){
	echo "<meta http-equiv='refresh' content='0;url=../main.php?page=agent_list'>";
}else{
	if($_GET['action'] == 'edit'){
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=agent_edit&agent_id=".$old_id."&errMsg=".$errMsg."'>";
	}elseif($_GET['action'] == 'add'){
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=agent_add&agent_id=".$old_id."&errMsg=".$errMsg."'>";
	}else{
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=agent_list'>";
	}
	
}

?>


</div>