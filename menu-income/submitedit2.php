
<div style="display: none;">
<?php

include '../connect_db.php';
ob_start();
session_start();

    echo "<br>getNo = ".$getNo = $_POST['getNo'];   

	echo "<br>insure_date = ".$insure_date = $_POST['insure_date'];
   	echo "<br>inform_id = ".$inform_id = '01999/'.$_POST['inform_id'];
   	echo "<br>insure_type = ".$insure_type = $_POST['insure_type'];
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

	echo "<br>car_number = ".$car_number = $_POST['car_number'];
	echo "<br>car_brand = ".$car_brand = $_POST['car_brand'];
	echo "<br>car_modal = ".$car_modal = $_POST['car_modal'];
	echo "<br>car_year = ".$car_year = $_POST['car_year'];
	echo "<br>car_color = ".$car_color = $_POST['car_color'];
	echo "<br>car_cc_weight_seat = ".$car_cc_weight_seat = implode(' / ',$_POST['car_cc_weight_seat']);
	echo "<br>car_chassis = ".$car_chassis = $_POST['car_chassis'];
	echo "<br>car_body = ".$car_body = $_POST['car_body'];
	echo "<br>car_price = ".$car_price = $_POST['car_price'];

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
   	echo "<br>insure_status2 = ".$insure_status2 = $_POST['insure_status2'];
   	if($insure_status2 == 1){
   		echo "<br>insure_status2_stock = ".$insure_status2_stock = $_POST['insure_status2_stock1'];
   	}elseif($insure_status2 == 2){
   		echo "<br>insure_status2_stock = ".$insure_status2_stock = $_POST['insure_status2_stock2'];
   	}else{
   		echo "<br>insure_status2_stock = ".$insure_status2_stock = '';
   	}
   	echo "<br>cus_type = ".$cus_type = $_POST['cus_type'];
   	echo "<br>cus_type_detail = ".$cus_type_detail = $_POST['cus_type_detail'];
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

	echo $sql_form = "UPDATE miscellany2 SET insure_date='$insure_date',inform_id='$inform_id',insure_type='$insure_type',inform_code='$inform_code',year_stock='$year_stock',stock_id='$stock_id',cus_name='$cus_name',cus_card_id='$cus_card_id',cus_occupation='$cus_occupation',cus_age='$cus_age',birth_date='$birth_date',cus_address1='$cus_address1',cus_address2='$cus_address2',cus_tel='$cus_tel',car_number='$car_number',car_brand='$car_brand',car_modal='$car_modal',car_year='$car_year',car_color='$car_color',car_cc_weight_seat='$car_cc_weight_seat',car_chassis='$car_chassis',car_body='$car_body',car_price='$car_price',save_date='$save_date',insure_time='$insure_time',insure_duration='$insure_duration',insure_total='$insure_total',insure_code='$insure_code',insure_net='$insure_net',insure_tax='$insure_tax',insure_duty='$insure_duty',insure_total2='$insure_total2',insure_beneficiary='$insure_beneficiary',insure_ralationship_name='$insure_ralationship_name',insure_status='$insure_status',insure_status_stock='$insure_status_stock',insure_status2='$insure_status2',insure_status2_stock='$insure_status2_stock',cus_type='$cus_type',cus_type_detail='$cus_type_detail',stock_date='$stock_date',create_stock_date='$create_stock_date',alert_type='$alert_type',alert_detail='$alert_detail',cancel_date='$cancel_date',cancel_detail='$cancel_detail' WHERE id = '$getNo'";

		$query_form = mysqli_query($conn,$sql_form);
		if ($query_form) {
		    $last_id = mysqli_insert_id($conn);
		    echo "New record created successfully. Last inserted ID is: " . $last_id;
		} else {
		    echo $errMsg = "Error: " . $sql_form . "<br>" . mysqli_error($conn);
		}


	if($query_form){
		echo "<meta http-equiv='refresh' content='0;url=../main.php?status=success&page=miscellany-edit2&search=".$getNo."'>";
	}else{
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=miscellany-edit2&status=fail&msg=".$errMsg."&search=".$getNo."'>";
	}


?>
</div>