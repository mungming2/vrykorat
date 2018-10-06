<?php 

include '../connect_db.php';

if($_GET['check'] == 'bill_no'){
	$check_id = $_POST['id'];

	$sql = "SELECT bill_no FROM registration_renewal WHERE bill_no = '$check_id'";
	$query = mysqli_query($conn,$sql);
	$num = mysqli_num_rows($query);

	echo $num;
}elseif($_GET['check'] == 'edit_bill_no'){
	$check_id = $_POST['id'];

	$sql = "SELECT bill_no FROM registration_renewal WHERE bill_no = '$check_id'";
	$query = mysqli_query($conn,$sql);
	$num = mysqli_num_rows($query);
	if($_POST['search'] == $check_id){
		echo '99';
	}else{
		echo $num;
	}

	
}elseif($_GET['check'] == 'stock_id'){
	$check_id = $_POST['id'];
	$arr_stock = array();

	$sql = "SELECT stock_id, CONCAT(cus_title, cus_firstname,' ', cus_lastname) AS cus_name, cus_tel, cus_address, car_number FROM insure_payment WHERE stock_id = '$check_id'";
	$query = mysqli_query($conn,$sql);
	$num = mysqli_num_rows($query);
	$res = mysqli_fetch_array($query,MYSQLI_ASSOC);

	if($num == 0){
		$arr_stock['status'] = 0;
	   	$arr_stock['address'] = '';
	   	$arr_stock['name'] = '';
	   	$arr_stock['tel'] = '';
	   	$arr_stock['car'] = '';

	}else{
		$address1 = array();
		$address = explode('//', $res['cus_address']);

	   	if(count($address) <= 1){
	   		$address = explode(' ', $res['cus_address']);
	   	}

	   	if(!empty($address[0])){
	   		$address1[0] = "บ้านเลขที่ ".$address[0];
	   	}if(!empty($address[1])){
	   		$address1[1] = "ตึก/หมู่บ้าน ".$address[1];
	   	}if(!empty($address[2])){
	   		$address1[2] = "หมู่ที่ ".$address[2];
	   	}if(!empty($address[3])){
	   		$address1[3] = "ตรอก ".$address[3];
	   	}if(!empty($address[4])){
	   		$address1[4] = "ซอย ".$address[4];
	   	}if(!empty($address[5])){
	   		$address1[5] = "ถนน ".$address[5];
	   	}if(!empty($address[6])){
	   		$address1[6] = "ตำบล ".$address[6];
	   	}if(!empty($address[7])){
	   		$address1[7] = "อำเภอ ".$address[7];
	   	}if(!empty($address[8])){
	   		$sql_province = "SELECT PROVINCE_ID, PROVINCE_NAME FROM province WHERE PROVINCE_ID = '$address[8]'";
			$query_province = mysqli_query($conn,$sql_province);
			$res_province = mysqli_fetch_array($query_province,MYSQLI_ASSOC);
	   		$address1[8] = "จังหวัด".$res_province['PROVINCE_NAME'];
	   	}elseif(!empty($address[9])){
	   		$address1[9] = "รหัสไปรษณีย์ ".$address[9];
	   	}


	   	$arr_stock['status'] = 1;
	   	$arr_stock['address'] = implode(' ', $address1);
	   	$arr_stock['name'] = $res['cus_name'];
	   	$arr_stock['tel'] = $res['cus_tel'];
	   	$arr_stock['car'] = $res['car_number'];
	}

	echo $getJson = json_encode($arr_stock);

}



?>