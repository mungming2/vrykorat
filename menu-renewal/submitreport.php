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
		$where_date = " deposit_date BETWEEN DATE('$dateRangeArry[0]') AND DATE('$dateRangeArry[1]')";
	}
	if(!empty($search)){
		if(!empty($where_date)){ 
			$and = ' AND ';
		}
		$where = ' WHERE ';
		$where_search = " CONCAT(bill_no,' ',name,' ', car_number) LIKE '%$search%'";
	}
	if (empty($dateRange) && empty($search)) {
		$limit = ' LIMIT 0 ';
	}
	

	$sql_report = "SELECT @rank:=@rank+1 AS no, bill_no, deposit_date, renew, 
					CASE status_register WHEN 1 THEN 'สำเนาทะเบียนรถ'
										 WHEN 2 THEN 'สมุดทะเบียนรถ'
										 ELSE status_register
					END AS status_register, stock_id, name, car_number, tax_date, pay_insurance, pay_tax, pay_fine, pay_change, pay_service, total, appointment_date, sign_depositor, sign_receiver, receiver, return_date
					FROM registration_renewal , (SELECT @rank := 0) r"
					.$where.$where_date.$and.$where_search.$limit;
    $query_report = mysqli_query($conn,$sql_report);
    $res_report = mysqli_fetch_all($query_report,MYSQLI_ASSOC);

    

    foreach ($res_report as $key => $value) {
    	$arr_renew = array();
    	foreach(explode(',', $res_report[$key]['renew']) as $value_arr){
    		if($value_arr == 1){
    			$arr_renew[] = 'ควบพรบ.';
    		}elseif($value_arr == 2){
    			$arr_renew[] = 'ต่อภาษีรถยนต์';
    		}elseif($value_arr == 3){
    			$arr_renew[] = 'ต่อภาษีรถจักรยานยนต์';
    		}
    	}
    	$res_report[$key]['renew2'] = implode(' , ', $arr_renew);

    	$res_report[$key]['num'] = $key+1;
		$getMsg = "คุณต้องการลบข้อมูลการชำระเงินเลขที่เอกสาร ".$value['bill_no']." ใช่หรือไม่?";
		$res_report[$key]['action'] = '<a href="?page=renewal-edit1&search='.$res_report[$key]['bill_no'].'"><i class="far fa-edit fa-2x pr-2 text-warning" data-toggle="tooltip" data-placement="top" title="แก้ไขข้อมูล"></i></a>
			<a href="#"><i class="fas fa-print fa-2x pr-2 text-info"></i></a>';
			//<a href="menu-payment/submitforms.php?forms=delete1&id='.$res_report[$key]['no'].'" onclick="return confirm(\''.$getMsg.'\')"><i class="fas fa-trash-alt fa-2x text-danger" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล"></i></a>
	}
	$getJson['data'] = $res_report;
	//echo '<pre>';
	
	print_r(json_encode( $getJson));
	//echo '</pre>';


}



?>