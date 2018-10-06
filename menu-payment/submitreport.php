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
		$where_search = " CONCAT(insure_payment.stock_id,' ',inform_id,' ',cus_title,' ', cus_firstname,' ', cus_lastname,' ',c.code,' ',car_number,' ',insure,' ',insure_net,' ',insure_tex,' ',insure_duty,' ',insure_total2) LIKE '%$search%'";
	}
	if (empty($dateRange) && empty($search)) {
		$limit = ' LIMIT 0 ';
	}
	

	$sql_report = "SELECT p.stock_id,p.total_amount,p.count,p.discount AS p_discount,p.tax_deductions AS p_tax_deductions,p.balance AS p_balance,p.cus_pay_date AS p_payment_date,insure_payment.no, insure_payment.index_id, insure_payment.stock_id, stock_type, inform_id, CONCAT(cus_title, cus_firstname,' ', cus_lastname) AS cus_name, cus_type, cus_card_id,
	CASE cus_type2 
        WHEN 'ตัวแทน' THEN CONCAT('ตัวแทน - ',cus_detail)
        WHEN 'vip' THEN CONCAT('VIP - ',cus_detail)
        WHEN 'ทั่วไป' THEN '-'
    END AS cus_type2,
	cus_detail, cus_status, cus_status_stock, c.code AS car, car_number, car_province, stock_date, insure, insure_net, insure_duty, insure_tex, insure_total2, p.cus_pay_date 
					FROM insure_payment
					LEFT JOIN car_code c
					ON insure_payment.car_id = c.id
					LEFT JOIN payment p
					ON insure_payment.stock_id = p.stock_id"
					.$where.$where_date.$and.$where_search.$limit;
    $query_report = mysqli_query($conn,$sql_report);
    $res_report = mysqli_fetch_all($query_report,MYSQLI_ASSOC);

    foreach ($res_report as $key => $value) {
    	$res_report[$key]['num'] = $key+1;
		$getMsg = "คุณต้องการลบข้อมูลการชำระเงินเลขที่เอกสาร ".$value['index_id']." ใช่หรือไม่?";
		$res_report[$key]['action'] = '<a href="?page=payment-edit1&search='.$res_report[$key]['stock_id'].'"><i class="far fa-edit fa-2x pr-2 text-warning" data-toggle="tooltip" data-placement="top" title="แก้ไขข้อมูล"></i></a>
		<a href="menu-payment/submitforms.php?forms=delete1&id='.$res_report[$key]['no'].'" onclick="return confirm(\''.$getMsg.'\')"><i class="fas fa-trash-alt fa-2x text-danger" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล"></i></a>';
			
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
		$where_date = " inform_date BETWEEN DATE('$dateRangeArry[0]') AND DATE('$dateRangeArry[1]') ";
	}
	if(!empty($search)){
		if(!empty($where_date)){ 
			$and = ' AND ';
		}
		$where = ' WHERE ';
		$where_search = " CONCAT(insure_payment2.stock_id,' ',cus_title,' ', cus_firstname,' ', cus_lastname,' ',c.code,' ',car_number,' ',insure,' ',insure_net,' ',insure_tex,' ',insure_duty,' ',insure_total2,' ',inform_id,' ', barcode,' ', inform_code) LIKE '%$search%' ";
	}
	if (empty($dateRange) && empty($search)) {
		$limit = ' LIMIT 0 ';
	}

	$sql_report = "SELECT no,p.stock_id,p.total_amount,p.count,p.discount AS p_discount,p.tax_deductions AS p_tax_deductions,p.balance AS p_balance,p.cus_pay_date AS p_payment_date,insure_payment2.index_type, insure_payment2.create_date, inform_date, selectagent, year_stock, insure_payment2.stock_id, stock_type, bill_no, inform_id, barcode, inform_code, CONCAT(cus_title, cus_firstname,' ', cus_lastname) AS cus_name, cus_tel,
	CASE cus_type2 
        WHEN 'ตัวแทน' THEN CONCAT('ตัวแทน - ',cus_detail)
        WHEN 'vip' THEN CONCAT('VIP - ',cus_detail)
        WHEN 'ทั่วไป' THEN '-'
    END AS cus_type2,
	cus_detail, cus_status, cus_status_stock, insure_payment2.insure_date, insure_payment2.insure_time, insure_payment2.insure_total1, insure_payment2.insure, insure_payment2.insure_net, insure_payment2.insure_duty, insure_payment2.insure_tex, insure_payment2.insure_total2, insure_payment2.tax_deductions, c.code AS car, car_number, car_province, car_brand, car_modal, car_year, insurance, car_chassis, car_body, status, detail, vehicle, type_insure
					FROM insure_payment2
					LEFT JOIN car_code2 c
					ON insure_payment2.car_id = c.id
					LEFT JOIN payment p
					ON insure_payment2.no = p.stock_id AND p.form_type = '2'"
					.$where.$where_date.$and.$where_search.
					" GROUP BY no,p.count ".$limit;
    $query_report = mysqli_query($conn,$sql_report);
    $res_report = mysqli_fetch_all($query_report,MYSQLI_ASSOC);
    foreach ($res_report as $key => $value) {
    	$res_report[$key]['num'] = $key+1;
    	$getMsg = "คุณต้องการลบข้อมูลการชำระเงินเลขที่กรมธรรม์ ".$res_report[$key]['stock_id']." ใช่หรือไม่?";
		$res_report[$key]['action'] = '<a href="?page=payment-edit2&search='.$res_report[$key]['no'].'"><i class="far fa-edit fa-2x pr-2 text-warning" data-toggle="tooltip" data-placement="top" title="แก้ไขข้อมูล"></i></a>
		<a href="menu-payment/submitforms.php?forms=delete2&id='.$res_report[$key]['no'].'" onclick="return confirm(\''.$getMsg.'\')"><i class="fas fa-trash-alt fa-2x text-danger" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล"></i></a>';
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
			$where_search = " AND CONCAT(p.bill_no,' ',i.year_stock,' ',i.stock_id,' ',cus_title,' ', cus_firstname,' ', cus_lastname,' ', i.car_number,' ', p.arrears,' ', i.inform_id) LIKE '%$search%' ";
		}
		if (empty($dateRange) && empty($search)) {
			$limit = ' LIMIT 0 ';
		}

		$sql = "SELECT i.stock_date,p.bill_no, p.account_date, p.clear_date, CONCAT(i.year_stock,'-',i.stock_id) AS stock_id, CONCAT(cus_title, cus_firstname,' ', cus_lastname) AS cus_name, i.car_number, p.arrears, i.inform_id
			FROM insure_payment i
			LEFT JOIN payment p
			ON i.stock_id = p.stock_id
			WHERE (p.arrears<>'' OR p.count IS NULL) "
			.$where_date.$and.$where_search." ORDER BY stock_id ASC ".$limit;
		$query = mysqli_query($conn,$sql);
		$res_report = mysqli_fetch_all($query,MYSQLI_ASSOC);
		foreach ($res_report as $key => $value) {
	    	$res_report[$key]['num'] = $key+1;
	    }
	}else{
		if(!empty($dateRange)){
			$where_date = " AND inform_date BETWEEN DATE('$dateRangeArry[0]') AND DATE('$dateRangeArry[1]') ";
		}
		if(!empty($search)){
			$where_search = " AND CONCAT(p.bill_no,' ',i.stock_id,' ',cus_title,' ', cus_firstname,' ', cus_lastname,' ', i.car_number,' ', p.arrears,' ', i.inform_id) LIKE '%$search%' ";
		}
		if (empty($dateRange) && empty($search)) {
			$limit = ' LIMIT 0 ';
		}

		$sql = "SELECT p.bill_no, p.account_date, p.clear_date, i.inform_date,i.insure_date, i.stock_id, CONCAT(i.cus_title, i.cus_firstname,' ', i.cus_lastname) AS cus_name, i.car_number, p.arrears, i.inform_id, i.selectagent, CONCAT(u.name,' ',u.surname) AS agent 
			FROM insure_payment2 i 
			LEFT JOIN payment p 
			ON i.no = p.stock_id 
			LEFT JOIN user_code u 
			ON i.selectagent = u.code 
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




