<?php

include '../connect_db.php';


if($_GET['reports'] == 1){

	$dateRange = $_GET['select_date'];
	$dateRangeArry = explode(" ถึง ",$dateRange);
	$search = $_GET['search'];
	$where = '';
	$and = '';
	$where_search = '';
	$where_date = '';
	$limit = '';

	if(!empty($dateRange)){
		$where = ' WHERE ';
		$where_date = " receive_cheque_date BETWEEN DATE('$dateRangeArry[0]') AND DATE('$dateRangeArry[1]')";
	}
	if(!empty($search)){
		if(!empty($where_date)){ 
			$and = ' AND ';
		}
		$where = ' WHERE ';
		$where_search = " CONCAT(type1,' ',list_income,' ',bank,' ',bank_branch,' ',bill_no,' ',cheque_number,' ',inform_id) LIKE '%$search%'";
	}
	if (empty($dateRange) && empty($search)) {
		$limit = ' LIMIT 0 ';
	}

	$sql_report = "SELECT id, bill_no, receive_cheque_date, type1, inform_id, list_income, 
	CASE status_payment WHEN 1 THEN 'เงินสด'
				WHEN 2 THEN 'โอน'
				WHEN 3 THEN CONCAT('เช็ค ',cheque_number)
	END AS status_payment, payment_total, bank, bank_branch, payment_date, cheque_number FROM income 
	WHERE type1 = 'รายรับ' AND "
					.$where_date.$and.$where_search.$limit;
    $query_report = mysqli_query($conn,$sql_report);
    $res_report = mysqli_fetch_all($query_report,MYSQLI_ASSOC);

    foreach ($res_report as $key => $value) {
    	$res_report[$key]['num'] = $key+1;
		$getMsg = "คุณต้องการลบข้อมูลรายการรับจ่าย เลขที่ ".$value['bill_no']." ใช่หรือไม่?";
		$res_report[$key]['action'] = '<a href="?page=income-edit1&search='.$res_report[$key]['id'].'"><i class="far fa-edit fa-2x pr-2 text-warning" data-toggle="tooltip" data-placement="top" title="แก้ไขข้อมูล"></i></a>
		<a href="menu-income/submitdelete.php?id='.$res_report[$key]['id'].'&type=1" onclick="return confirm(\''.$getMsg.'\')"><i class="fas fa-trash-alt fa-2x text-danger" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล"></i></a>
			';
			
	}
	$getJson['data'] = $res_report;
	//echo '<pre>';
	
	print_r(json_encode( $getJson));
	//echo '</pre>';

}elseif($_GET['reports'] == 2){
	$dateRange = $_GET['select_date'];
	$dateRangeArry = explode(" ถึง ",$dateRange);
	$search = $_GET['search'];
	$where = '';
	$and = '';
	$where_search = '';
	$where_date = '';
	$limit = '';

	if(!empty($dateRange)){
		$where = ' WHERE ';
		$where_date = " receive_cheque_date BETWEEN DATE('$dateRangeArry[0]') AND DATE('$dateRangeArry[1]')";
	}
	if(!empty($search)){
		if(!empty($where_date)){ 
			$and = ' AND ';
		}
		$where = ' WHERE ';
		$where_search = " CONCAT(type1,' ',list_income,' ',bank,' ',bank_branch,' ',bill_no,' ',cheque_number,' ',inform_id) LIKE '%$search%'";
	}
	if (empty($dateRange) && empty($search)) {
		$limit = ' LIMIT 0 ';
	}

	$sql_report = "SELECT id, bill_no, receive_cheque_date, type1, inform_id, list_income, 
	CASE status_payment WHEN 1 THEN 'เงินสด'
				WHEN 2 THEN 'โอน'
				WHEN 3 THEN CONCAT('เช็ค ',cheque_number)
	END AS status_payment, payment_total, bank, bank_branch, payment_date, cheque_number FROM income 
	WHERE type1 = 'รายจ่าย' AND "
					.$where_date.$and.$where_search.$limit;
    $query_report = mysqli_query($conn,$sql_report);
    $res_report = mysqli_fetch_all($query_report,MYSQLI_ASSOC);

    foreach ($res_report as $key => $value) {
    	$res_report[$key]['num'] = $key+1;
		$getMsg = "คุณต้องการลบข้อมูลรายการรับจ่าย เลขที่ ".$value['bill_no']." ใช่หรือไม่?";
		$res_report[$key]['action'] = '<a href="?page=income-edit1&search='.$res_report[$key]['id'].'"><i class="far fa-edit fa-2x pr-2 text-warning" data-toggle="tooltip" data-placement="top" title="แก้ไขข้อมูล"></i></a>
		<a href="menu-income/submitdelete.php?id='.$res_report[$key]['id'].'&type=2" onclick="return confirm(\''.$getMsg.'\')"><i class="fas fa-trash-alt fa-2x text-danger" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล"></i></a>
			';
			
	}
	$getJson['data'] = $res_report;
	//echo '<pre>';
	
	print_r(json_encode( $getJson));
	//echo '</pre>';

}elseif($_GET['reports'] == 3){
	$dateRange = $_GET['select_date'];
	$dateRangeArry = explode(" ถึง ",$dateRange);
	$search = $_GET['search'];
	$where = '';
	$and = '';
	$where_search = '';
	$where_date = '';
	$limit = '';

	if(!empty($dateRange)){
		$where = ' WHERE ';
		$where_date = " receive_cheque_date BETWEEN DATE('$dateRangeArry[0]') AND DATE('$dateRangeArry[1]')";
	}
	if(!empty($search)){
		if(!empty($where_date)){ 
			$and = ' AND ';
		}
		$where = ' WHERE ';
		$where_search = " CONCAT(stock_id,' ',owner_cheque,' ',bank,' ',bank_branch) LIKE '%$search%'";
	}
	if (empty($dateRange) && empty($search)) {
		$limit = ' LIMIT 0 ';
	}

	$sql_report = "SELECT id, receive_cheque_date, CONCAT(bank,' / ', bank_branch) AS bank, cheque_date, payment_total, owner_payment, stock_id, list, list_detail, owner_cheque, 
	CASE cheque_status WHEN 1 THEN 'เข้าบัญชี'
	WHEN 2 THEN 'เคลียร์เบี้ย'
	WHEN 3 THEN 'อื่นๆ '
END AS cheque_status, cheque_status_detail FROM cheque"
	.$where.$where_date.$and.$where_search.$limit;
    $query_report = mysqli_query($conn,$sql_report);
    $res_report = mysqli_fetch_all($query_report,MYSQLI_ASSOC);

    foreach ($res_report as $key => $value) {
    	$res_report[$key]['num'] = $key+1;
		$getMsg = "คุณต้องการลบข้อมูลรายการรับเช็ค เลขที่ ".$value['stock_id']." ใช่หรือไม่?";
		$res_report[$key]['action'] = '<a href="?page=income-edit2&search='.$res_report[$key]['id'].'"><i class="far fa-edit fa-2x pr-2 text-warning" data-toggle="tooltip" data-placement="top" title="แก้ไขข้อมูล"></i></a>
		<a href="menu-income/submitdelete.php?id='.$res_report[$key]['id'].'&type=3" onclick="return confirm(\''.$getMsg.'\')"><i class="fas fa-trash-alt fa-2x text-danger" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล"></i></a>
			';
			
	}
	$getJson['data'] = $res_report;
	//echo '<pre>';
	
	print_r(json_encode( $getJson));
	//echo '</pre>';

}


?>