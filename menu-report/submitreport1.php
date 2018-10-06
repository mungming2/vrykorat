<?php

include '../connect_db.php';

$dateRange = $_GET['select_date'];
$dateRangeArry = explode(" ถึง ",$dateRange);
$cus_type = $_GET['cus_type'];  
$search = $_GET['search'];
if($_GET['type'] == 1){
    if($cus_type == 2){
        $cus_type = " AND cus_type2 = 'ตัวแทน' AND cus_detail LIKE '%".$search."%' ";
    }elseif($cus_type == 3){
        $cus_type = " AND cus_type2 = 'vip' AND cus_detail LIKE '%".$search."%' ";
    }elseif($cus_type == 4){
        $cus_type = " AND cus_type2 = 'ทั่วไป' ";
    }else{
        $cus_type = "";
    }

    $sql_report = "SELECT @rank:=@rank+1 AS num, no, index_id, year_stock, stock_id, stock_type, inform_id, CONCAT(cus_title, cus_firstname,' ', cus_lastname) AS cus_name, cus_type, cus_card_id, cus_address, cus_tel,
    CASE cus_type2 
        WHEN 'ตัวแทน' THEN CONCAT('ตัวแทน - ',cus_detail)
        WHEN 'vip' THEN CONCAT('VIP - ',cus_detail)
        WHEN 'ทั่วไป' THEN 'ทั่วไป'
    END AS cus_type2, cus_detail, 
    CASE cus_status 
        WHEN 'yes' THEN cus_status_stock
        WHEN 'no' THEN ''
    END AS cus_status, cus_status_stock, car_id, car_number, car_province, car_cc_weight_seat, car_brand, car_color, car_chassis, car_body, insure_type, RIGHT(insure_date,10) AS insure_date, insure_time, insure_total1, insure, insure_net, insure_duty, insure_tex, insure_total2, stock_date, tex_date, receive_date, payment_date, cancel_date, create_date, account_date, cus_pay_date, clear_date
					FROM insure_payment, (SELECT @rank := 0) r
                    WHERE RIGHT(insure_date,10) BETWEEN DATE('$dateRangeArry[0]') AND DATE('$dateRangeArry[1]') ".$cus_type;
    $query_report = mysqli_query($conn,$sql_report);
    $res_report = mysqli_fetch_all($query_report,MYSQLI_ASSOC);
    foreach ($res_report as $key => $value) {
        $address = explode('//', $value['cus_address']);

        if(count($address) <= 1){
            $address = explode(' ', $value['cus_address']);
        }
        $sql_province = "SELECT PROVINCE_ID, PROVINCE_NAME FROM province WHERE PROVINCE_ID = '$address[8]'";
        $query_province = mysqli_query($conn,$sql_province);
        $result_province = mysqli_fetch_array($query_province,MYSQLI_ASSOC);
        $address[8] = $result_province['PROVINCE_NAME'];
    
        $res_report[$key]['cus_address'] = implode(' ', $address);
    }
    

    $getJson['data'] = $res_report;
	//echo '<pre>';
	
	print_r(json_encode( $getJson));
	//echo '</pre>';

}
elseif($_GET['type'] == 2){
    if($cus_type == 2){
        $cus_type = " AND cus_type2 = 'ตัวแทน' AND cus_detail LIKE '%".$search."%' ";
    }elseif($cus_type == 3){
        $cus_type = " AND cus_type2 = 'vip' AND cus_detail LIKE '%".$search."%' ";
    }elseif($cus_type == 4){
        $cus_type = " AND cus_type2 = 'ทั่วไป' ";
    }else{
        $cus_type = "";
    }

    $sql_report = "SELECT @rank:=@rank+1 AS num, index_type, create_date, inform_date, selectagent, year_stock, stock_id, stock_type, inform_id, barcode, inform_code, CONCAT(cus_title, cus_firstname,' ', cus_lastname) AS cus_name, cus_type, cus_card_id, REPLACE(cus_address, '//', ' ') AS cus_address, cus_tel,
    CASE cus_type2 
        WHEN 'ตัวแทน' THEN CONCAT('ตัวแทน - ',cus_detail)
        WHEN 'vip' THEN CONCAT('VIP - ',cus_detail)
        WHEN 'ทั่วไป' THEN 'ทั่วไป'
    END AS cus_type2, cus_detail, 
    CASE cus_status 
        WHEN 'yes' THEN cus_status_stock
        WHEN 'no' THEN ''
    END AS cus_status, cus_status_stock, RIGHT(insure_date,10) AS insure_date, insure_time, insure_total1, insure, insure_net, insure_duty, insure_tex, insure_total2, tax_deductions, car_id, car_number, car_province, car_cc_weight_seat, car_brand, car_modal, car_year, insurance, car_chassis, car_body, status, detail, vehicle, type_insure, driver1, driver2, birth_date1, birth_date2, occupation1, occupation2, card_number1, card_number2, beneficiary, alert_type, alert_detail, cancel_date, cancel_detail
					FROM insure_payment2, (SELECT @rank := 0) r
                    WHERE RIGHT(insure_date,10) BETWEEN DATE('$dateRangeArry[0]') AND DATE('$dateRangeArry[1]') ".$cus_type;
    $query_report = mysqli_query($conn,$sql_report);
    $res_report = mysqli_fetch_all($query_report,MYSQLI_ASSOC);

    $getJson['data'] = $res_report;
	//echo '<pre>';
	
	print_r(json_encode( $getJson));
	//echo '</pre>';

}
elseif($_GET['type'] == 3){
    if($cus_type == 2 || $cus_type == 3){
        $cus_type = " AND cus_type = '1' AND cus_type_detail LIKE '%".$search."%' ";
    }elseif($cus_type == 4){
        $cus_type = " AND cus_type = '2' ";
    }else{
        $cus_type = "";
    }

    $sql_report = "SELECT @rank:=@rank+1 AS num, insure_date, inform_id, insure_type, inform_code, year_stock, stock_id, cus_name, cus_card_id, cus_occupation, cus_age, birth_date, cus_address1 AS cus_address, cus_address2, cus_tel, RIGHT(save_date,10) AS insure_date , insure_time, insure_duration, insure_total, insure_code, insure_net, insure_tax, insure_duty, insure_total2, insure_beneficiary, insure_ralationship_name, insure_status, insure_status_stock, 
    CASE cus_type 
        WHEN '1' THEN cus_type_detail
        WHEN '2' THEN 'ทั่วไป'
    END AS cus_type, cus_type_detail, stock_date, create_stock_date, alert_type, alert_detail, cancel_date, cancel_detail FROM miscellany, (SELECT @rank := 0) r
    WHERE RIGHT(save_date,10) BETWEEN DATE('$dateRangeArry[0]') AND DATE('$dateRangeArry[1]') ".$cus_type;
    $query_report = mysqli_query($conn,$sql_report);
    $res_report = mysqli_fetch_all($query_report,MYSQLI_ASSOC);

    $getJson['data'] = $res_report;
	//echo '<pre>';
	
	print_r(json_encode( $getJson));
	//echo '</pre>';

}
elseif($_GET['type'] == 4){
    if($cus_type == 2 || $cus_type == 3){
        $cus_type = " AND cus_type = '1' AND cus_type_detail LIKE '%".$search."%' ";
    }elseif($cus_type == 4){
        $cus_type = " AND cus_type = '2' ";
    }else{
        $cus_type = "";
    }

    $sql_report = "SELECT @rank:=@rank+1 AS num, id, insure_date, inform_id, insure_type, inform_code, year_stock, stock_id, cus_name, cus_card_id, cus_occupation, cus_age, birth_date, cus_address1 AS cus_address, cus_address2, cus_tel, car_number, car_brand, car_modal, car_year, car_color, car_cc_weight_seat, car_chassis, car_body, car_price, RIGHT(save_date,10) AS insure_date , insure_time, insure_duration, insure_total AS insurance, insure_code, insure_net, insure_tax, insure_duty, insure_total2, insure_beneficiary, insure_ralationship_name, insure_status, insure_status_stock, insure_status2, insure_status2_stock, 
    CASE cus_type 
        WHEN '1' THEN cus_type_detail
        WHEN '2' THEN 'ทั่วไป'
    END AS cus_type, cus_type_detail, stock_date, create_stock_date, alert_type, alert_detail, cancel_date, cancel_detail FROM miscellany2, (SELECT @rank := 0) r
    WHERE RIGHT(save_date,10) BETWEEN DATE('$dateRangeArry[0]') AND DATE('$dateRangeArry[1]') ".$cus_type;
    $query_report = mysqli_query($conn,$sql_report);
    $res_report = mysqli_fetch_all($query_report,MYSQLI_ASSOC);

    $getJson['data'] = $res_report;
	//echo '<pre>';
	
	print_r(json_encode( $getJson));
	//echo '</pre>';

}

?>