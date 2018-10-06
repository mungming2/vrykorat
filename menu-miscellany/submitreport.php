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
		$where_date = " stock_date BETWEEN DATE('$dateRangeArry[0]') AND DATE('$dateRangeArry[1]')";
	}
	if(!empty($search)){
		if(!empty($where_date)){ 
			$and = ' AND ';
		}
		$where = ' WHERE ';
		$where_search = " CONCAT(m.stock_id,' ',cus_name,' ',insure_net,' ',insure_tax,' ',insure_duty,' ',insure_total2,' ',inform_id) LIKE '%$search%'";
	}
	if (empty($dateRange) && empty($search)) {
		$limit = ' LIMIT 0 ';
	}

	$sql_report = "SELECT m.id, insure_date, inform_id, insure_type, inform_code, year_stock, m.stock_id, cus_name, cus_card_id, cus_occupation, cus_age, birth_date, cus_address1, cus_address2, cus_tel, save_date, insure_time, insure_duration, insure_total, insure_code, insure_net, insure_tax, insure_duty, insure_total2, insure_beneficiary, insure_ralationship_name, insure_status, insure_status_stock, cus_type, cus_type_detail, stock_date, create_stock_date, alert_type, alert_detail,p.total_amount,p.count,p.discount AS p_discount,p.tax_deductions AS p_tax_deductions,p.balance AS p_balance,p.cus_pay_date AS p_payment_date
				FROM miscellany m
				LEFT JOIN payment p
				ON m.id = p.stock_id AND p.form_type = '3'"
					.$where.$where_date.$and.$where_search.$limit;
    $query_report = mysqli_query($conn,$sql_report);
    $res_report = mysqli_fetch_all($query_report,MYSQLI_ASSOC);

    foreach ($res_report as $key => $value) {
    	$res_report[$key]['num'] = $key+1;
		$getMsg = "คุณต้องการลบข้อมูลเบ็ดเตล็ดอุบัติเหตุและสุขภาพ /อื่น เลขที่กรมธรรม์ ".$value['stock_id']." ใช่หรือไม่?";
		$res_report[$key]['action'] = '<a href="?page=miscellany-edit1&search='.$res_report[$key]['id'].'"><i class="far fa-edit fa-2x pr-2 text-warning" data-toggle="tooltip" data-placement="top" title="แก้ไขข้อมูล"></i></a>
		<a href="menu-miscellany/submitdelete.php?id='.$res_report[$key]['id'].'&form_type=3" onclick="return confirm(\''.$getMsg.'\')"><i class="fas fa-trash-alt fa-2x text-danger" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล"></i></a>
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
		$where_date = " stock_date BETWEEN DATE('$dateRangeArry[0]') AND DATE('$dateRangeArry[1]')";
	}
	if(!empty($search)){
		if(!empty($where_date)){ 
			$and = ' AND ';
		}
		$where = ' WHERE ';
		$where_search = " CONCAT(m.stock_id,' ',car_number,' ',cus_name,' ',insure_net,' ',insure_tax,' ',insure_duty,' ',insure_total2,' ',inform_id) LIKE '%$search%'";
	}
	if (empty($dateRange) && empty($search)) {
		$limit = ' LIMIT 0 ';
	}

	$sql_report = "SELECT m.id, insure_date, inform_id, insure_type, inform_code, year_stock, m.stock_id, cus_name, cus_card_id, cus_occupation, cus_age, birth_date, cus_address1, cus_address2, cus_tel, car_number, car_brand, car_modal, car_year, car_color, car_cc_weight_seat, car_chassis, car_body, car_price, save_date, insure_time, insure_duration, insure_total, insure_code, insure_net, insure_tax, insure_duty, insure_total2, insure_beneficiary, insure_ralationship_name, insure_status, insure_status_stock, insure_status2, insure_status2_stock, cus_type, cus_type_detail, stock_date, create_stock_date, alert_type, alert_detail, cancel_date, cancel_detail,p.total_amount,p.count,p.discount AS p_discount,p.tax_deductions AS p_tax_deductions,p.balance AS p_balance,p.cus_pay_date AS p_payment_date
				FROM miscellany2 m
				LEFT JOIN payment p
				ON m.id = p.stock_id AND p.form_type = '4'"
					.$where.$where_date.$and.$where_search.$limit;
    $query_report = mysqli_query($conn,$sql_report);
    $res_report = mysqli_fetch_all($query_report,MYSQLI_ASSOC);

    foreach ($res_report as $key => $value) {
    	$res_report[$key]['num'] = $key+1;
		$getMsg = "คุณต้องการลบข้อมูลเบ็ดเตล็ดเกี่ยวกับรถ เลขที่กรมธรรม์ ".$value['stock_id']." ใช่หรือไม่?";
		$res_report[$key]['action'] = '<a href="?page=miscellany-edit2&search='.$res_report[$key]['id'].'"><i class="far fa-edit fa-2x pr-2 text-warning" data-toggle="tooltip" data-placement="top" title="แก้ไขข้อมูล"></i></a>
		<a href="menu-miscellany/submitdelete.php?id='.$res_report[$key]['id'].'&form_type=4" onclick="return confirm(\''.$getMsg.'\')"><i class="fas fa-trash-alt fa-2x text-danger" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล"></i></a>
			';
			
	}
	$getJson['data'] = $res_report;
	//echo '<pre>';
	
	print_r(json_encode( $getJson));
	//echo '</pre>';

}elseif($_GET['reports'] == 4){
	$dateRange = $_GET['select_date'];
	$dateRangeArry = explode(" ถึง ",$dateRange);
	$search = $_GET['search'];
	$type = $_GET['type'];
	$where = '';
	$and = '';
	$where_search = '';
	$where_date = '';
	$limit = '';

	if($type == 1){
		if(!empty($dateRange)){
			$where_date = " AND stock_date BETWEEN DATE('$dateRangeArry[0]') AND DATE('$dateRangeArry[1]') ";
		}
		if(!empty($search)){
			$where_search = " AND CONCAT(p.bill_no,' ',i.year_stock,' ',i.stock_id,' ', cus_name,' ', p.arrears,' ', i.inform_id) LIKE '%$search%' ";
		}
		if (empty($dateRange) && empty($search)) {
			$limit = ' LIMIT 0 ';
		}

		$sql = "SELECT i.id, i.stock_date,p.bill_no, p.account_date, p.clear_date, CONCAT(i.year_stock,'-',i.stock_id) AS stock_id, cus_name, p.arrears, i.inform_id
			FROM miscellany i
			LEFT JOIN payment p
			ON i.id = p.stock_id AND p.form_type = 3
			WHERE (p.arrears<>'' OR p.count IS NULL) "
			.$where_date.$and.$where_search." ORDER BY stock_id ASC ".$limit;
		$query = mysqli_query($conn,$sql);
		$res_report = mysqli_fetch_all($query,MYSQLI_ASSOC);
		foreach ($res_report as $key => $value) {
	    	$res_report[$key]['num'] = $key+1;
	    }
	}else{
		if(!empty($dateRange)){
			$where_date = " AND stock_date BETWEEN DATE('$dateRangeArry[0]') AND DATE('$dateRangeArry[1]') ";
		}
		if(!empty($search)){
			$where_search = " AND CONCAT(p.bill_no,' ',i.year_stock,' ',i.stock_id,' ', cus_name,' ', i.car_number,' ', p.arrears,' ', i.inform_id) LIKE '%$search%' ";
		}
		if (empty($dateRange) && empty($search)) {
			$limit = ' LIMIT 0 ';
		}

		$sql = "SELECT i.id, i.stock_date,p.bill_no, p.account_date, p.clear_date, CONCAT(i.year_stock,'-',i.stock_id) AS stock_id, cus_name, i.car_number, p.arrears, i.inform_id
			FROM miscellany2 i
			LEFT JOIN payment p
			ON i.id = p.stock_id AND p.form_type = 4
			WHERE (p.arrears<>'' OR p.count IS NULL) "
			.$where_date.$and.$where_search." ORDER BY stock_id ASC ".$limit;
		$query = mysqli_query($conn,$sql);
		$res_report = mysqli_fetch_all($query,MYSQLI_ASSOC);
		foreach ($res_report as $key => $value) {
	    	$res_report[$key]['num'] = $key+1;
	    }

	}

	

	$getJson['data'] = $res_report;
	//echo '<pre>';
	
	print_r(json_encode( $getJson));
	//echo '</pre>';


}


?>