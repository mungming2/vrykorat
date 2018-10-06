<?php

include '../connect_db.php';

function delimeterNumber($str) { 
    $number = floatval(str_replace(',','',$str)); 
    return number_format ( $number , 2 , "." , "," ); 
}

$dateRange = $_GET['select_date'];
$dateRangeArry = explode(" ถึง ",$dateRange);
if($_GET['type'] == 1){

    $sql_report = "SELECT no, i.stock_id, stock_type, CONCAT(cus_title, cus_firstname,' ', cus_lastname) AS cus_name,
    CASE cus_type2 
        WHEN 'ตัวแทน' THEN (SELECT name FROM agent WHERE agent_id = i.cus_detail) 
        ELSE ' '
    END AS cus_type2, i.cus_detail, REPLACE(REPLACE(i.insure_date, '-', '/'), 'ถึง', ' - ') AS insure_date, insure_total1, i.insure, i.insure_net, i.insure_total2, REPLACE(i.stock_date, '-', '/') AS stock_date, p.cus_pay_date, p.clear_date
        FROM insure_payment i
        LEFT JOIN payment p
        ON i.stock_id = p.stock_id
        WHERE p.clear_date BETWEEN DATE('$dateRangeArry[0]') AND DATE('$dateRangeArry[1]') ";
    $query_report = mysqli_query($conn,$sql_report);
    $res_report = mysqli_fetch_all($query_report,MYSQLI_ASSOC);
    foreach ($res_report as $key => $value) {
        $res_report[$key]['num'] = $key+1;
        $res_report[$key]['insure_total3'] = delimeterNumber($res_report[$key]['insure_total2']);
    }
    

    $getJson['data'] = $res_report;
	//echo '<pre>';
	
	print_r(json_encode( $getJson));
	//echo '</pre>';

}
elseif($_GET['type'] == 2){
    $sql_report = "SELECT no, i.stock_id, stock_type, CONCAT(cus_title, cus_firstname,' ', cus_lastname) AS cus_name,
    CASE cus_type2 
        WHEN 'ตัวแทน' THEN (SELECT name FROM agent WHERE agent_id = i.cus_detail) 
        ELSE ' '
    END AS cus_type2, i.cus_detail, REPLACE(REPLACE(i.insure_date, '-', '/'), 'ถึง', ' - ') AS insure_date, insure_total1, i.insure, i.insure_net, i.insure_total2, REPLACE(i.inform_date, '-', '/') AS stock_date, p.cus_pay_date, p.clear_date
        FROM insure_payment2 i
        LEFT JOIN payment p
        ON i.no = p.stock_id AND p.form_type = '2'
        WHERE p.clear_date BETWEEN DATE('$dateRangeArry[0]') AND DATE('$dateRangeArry[1]') ";
    $query_report = mysqli_query($conn,$sql_report);
    $res_report = mysqli_fetch_all($query_report,MYSQLI_ASSOC);
    foreach ($res_report as $key => $value) {
        $res_report[$key]['num'] = $key+1;
        $res_report[$key]['insure_total3'] = delimeterNumber($res_report[$key]['insure_total2']);
    }

    $getJson['data'] = $res_report;
	//echo '<pre>';
	
	print_r(json_encode( $getJson));
	//echo '</pre>';

}
elseif($_GET['type'] == 3 ){
    $sql_report = "SELECT i.id, i.stock_id, cus_name,
    CASE cus_type
        WHEN '0' THEN (SELECT name FROM agent WHERE agent_id = i.cus_type_detail) 
        ELSE ' '
    END AS cus_type, i.cus_type_detail, REPLACE(REPLACE(i.save_date, '-', '/'), 'ถึง', ' - ') AS insure_date, insure_type, i.insure_net, i.insure_total2, REPLACE(i.insure_date, '-', '/') AS stock_date, p.cus_pay_date, p.clear_date
        FROM miscellany i
        LEFT JOIN payment p
        ON i.id = p.stock_id AND p.form_type = '3'
        WHERE p.clear_date BETWEEN DATE('$dateRangeArry[0]') AND DATE('$dateRangeArry[1]') ";
    $query_report = mysqli_query($conn,$sql_report);
    $res_report = mysqli_fetch_all($query_report,MYSQLI_ASSOC);
    foreach ($res_report as $key => $value) {
        $res_report[$key]['num'] = $key+1;
        
    }

    $getJson['data'] = $res_report;
	//echo '<pre>';
	
	print_r(json_encode( $getJson));
	//echo '</pre>';
}
elseif($_GET['type'] == 4){
    $sql_report = "SELECT i.id, i.stock_id, cus_name,
    CASE cus_type
        WHEN '0' THEN (SELECT name FROM agent WHERE agent_id = i.cus_type_detail) 
        ELSE ' '
    END AS cus_type, i.cus_type_detail, REPLACE(REPLACE(i.save_date, '-', '/'), 'ถึง', ' - ') AS insure_date, insure_type, i.insure_net, i.insure_total2, REPLACE(i.insure_date, '-', '/') AS stock_date, p.cus_pay_date, p.clear_date
        FROM miscellany2 i
        LEFT JOIN payment p
        ON i.id = p.stock_id AND p.form_type = '3'
        WHERE p.clear_date BETWEEN DATE('$dateRangeArry[0]') AND DATE('$dateRangeArry[1]') ";
    $query_report = mysqli_query($conn,$sql_report);
    $res_report = mysqli_fetch_all($query_report,MYSQLI_ASSOC);
    foreach ($res_report as $key => $value) {
        $res_report[$key]['num'] = $key+1;
    }

    $getJson['data'] = $res_report;
	//echo '<pre>';
	
	print_r(json_encode( $getJson));
	//echo '</pre>';

}

?>