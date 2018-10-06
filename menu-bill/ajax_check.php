<?php

include '../connect_db.php';
function delimeterNumber($str) { 
    $number = floatval(str_replace(',','',$str)); 
    return number_format ( $number , 2 , "." , "," ); 
}
function floatvalNum($str) {
    return floatval(str_replace(',','',$str)); 
}
function convert($number){ 
    $txtnum1 = array('ศูนย์','หนึ่ง','สอง','สาม','สี่','ห้า','หก','เจ็ด','แปด','เก้า','สิบ'); 
    $txtnum2 = array('','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน'); 
    $number = str_replace(",","",$number); 
    $number = str_replace(" ","",$number); 
    $number = str_replace("บาท","",$number); 
    $number = explode(".",$number); 
    if(sizeof($number)>2){ 
    return 'ทศนิยมหลายตัวนะจ๊ะ'; 
    exit; 
    } 
    $strlen = strlen($number[0]); 
    $convert = ''; 
    for($i=0;$i<$strlen;$i++){ 
        $n = substr($number[0], $i,1); 
        if($n!=0){ 
            if($i==($strlen-1) AND $n==1){ $convert .= 'เอ็ด'; } 
            elseif($i==($strlen-2) AND $n==2){  $convert .= 'ยี่'; } 
            elseif($i==($strlen-2) AND $n==1){ $convert .= ''; } 
            else{ $convert .= $txtnum1[$n]; } 
            $convert .= $txtnum2[$strlen-$i-1]; 
        } 
    } 
    
    $convert .= 'บาท'; 
    if($number[1]=='0' OR $number[1]=='00' OR 
    $number[1]==''){ 
    $convert .= 'ถ้วน'; 
    }else{ 
    $strlen = strlen($number[1]); 
    for($i=0;$i<$strlen;$i++){ 
    $n = substr($number[1], $i,1); 
        if($n!=0){ 
        if($i==($strlen-1) AND $n==1){$convert 
        .= 'เอ็ด';} 
        elseif($i==($strlen-2) AND 
        $n==2){$convert .= 'ยี่';} 
        elseif($i==($strlen-2) AND 
        $n==1){$convert .= '';} 
        else{ $convert .= $txtnum1[$n];} 
        $convert .= $txtnum2[$strlen-$i-1]; 
        } 
    } 
    $convert .= 'สตางค์'; 
    } 
    return $convert; 
    } 

$check_id = $_GET['id'];
$type = $_GET['type'];
$sum = $_GET['sum'];
$table = ' FROM insure_payment i LEFT JOIN payment p ON i.stock_id = p.stock_id';
if($type == 2){ 
    $table = " FROM insure_payment2 i LEFT JOIN payment p ON i.no = p.stock_id AND p.form_type = '2'"; 
}
$table2 = " FROM insure_payment2 i LEFT JOIN payment p ON i.no = p.stock_id AND p.form_type = '2'";
if($type == 2){ 
    $table2 = " FROM insure_payment i LEFT JOIN payment p ON i.stock_id = p.stock_id"; 
}
if($_GET['forms'] == 1){
	$sql_check = "SELECT p.stock_id,p.total_amount,p.count,p.discount AS p_discount,p.tax_deductions AS p_tax_deductions,p.balance AS p_balance,p.cus_pay_date AS p_payment_date,i.no, i.stock_id, stock_type, inform_id, CONCAT(cus_title, cus_firstname,' ', cus_lastname) AS cus_name, cus_type, cus_card_id, i.insure_date, cus_status, cus_status_stock, car_number, car_brand, car_province, car_chassis, insure, insure_net, insure_duty, insure_tex, insure_total2, p.cus_pay_date, 
    CASE cus_type2 WHEN 'ตัวแทน' THEN (SELECT name FROM agent WHERE agent_id = i.cus_detail)
        ELSE ''
    END AS cus_type2, p.bill_no 
					".$table."
                    WHERE i.stock_id = '$check_id' OR car_number = '$check_id' OR car_chassis = '$check_id'";
    $query_check = mysqli_query($conn,$sql_check);
    $row_check = mysqli_num_rows($query_check);
    $res_check = mysqli_fetch_array($query_check,MYSQLI_ASSOC);

    $arr_stock = [];
    $_total_amount = 0;
    if($row_check == 1){
        $arr_check['stock_id'] = $res_check['stock_id'];
        $arr_check['bill_no'] = $res_check['bill_no'];
        $arr_check['cus_name'] = $res_check['cus_name'];
        $arr_check['cus_type2'] = $res_check['cus_type2'];
        $arr_check['car_brand'] = $res_check['car_brand'];
        $arr_check['car_number'] = $res_check['car_number'];
        $insure_date1 = explode(' ถึง ',$res_check['insure_date']);
        $insure_date2 = date_format(date_create($insure_date1[0]),"d/m/Y")." - ".date_format(date_create($insure_date1[1]),"d/m/Y");
        $arr_check['insure_date'] = $insure_date2;
        if($res_check['cus_status'] == 'yes' && $sum == 1){
            $arr_check['cus_status_stock'] = $res_check['cus_status_stock'];
            $arr_check['stock_amount'] = '2';
            $cus_status = '';
            if($type == 1){
                $cus_status = explode('-',$res_check['cus_status_stock']);
                $arr_check['cus_status'] = $cus_status[0];
            }else{
                $cus_status = explode('-',$res_check['cus_status_stock']);
                $arr_check['cus_status'] = $cus_status[1];
            }

            $sql2 = "SELECT i.no, MAX(p.count) AS count, i.stock_id, p.discount, p.balance, p.tax_deductions, i.insure_net, i.insure_duty, i.insure_tex, i.insure_total2, p.total_amount 
                    ".$table2."
                    WHERE i.stock_id = '".$arr_check['cus_status']."'";
            $quer2 = mysqli_query($conn,$sql2);
            $res2 = mysqli_fetch_array($quer2,MYSQLI_ASSOC);
            

            $arr_check['_insure_net'] = empty($res2['insure_net']) ? '-' : delimeterNumber($res2['insure_net']);
            $arr_check['_insure_duty'] = empty($res2['insure_duty']) ? '-' : delimeterNumber($res2['insure_duty']);
            $arr_check['_insure_tex'] = empty($res2['insure_tex']) ? '-' : delimeterNumber($res2['insure_tex']);
            $arr_check['_insure_total2'] = empty($res2['insure_total2']) ? '-' : delimeterNumber($res2['insure_total2']);
            $arr_check['_p_discount'] = empty($res2['discount']) ? '-' : delimeterNumber($res2['discount']);
            // $arr_check['_p_balance'] = empty($res2['p_balance']) ? '-' : delimeterNumber($res2['p_balance']);
            $arr_check['_p_balance'] = floatvalNum($res2['insure_total2']) - floatvalNum($res2['discount']);
            $arr_check['_p_tax_deductions'] = empty($res2['tax_deductions']) ? '-' : delimeterNumber($res2['tax_deductions']);
            // $arr_check['_total_amount'] = empty($res2['total_amount']) ? '-' : delimeterNumber($res2['total_amount']);
            $arr_check['_total_amount'] = delimeterNumber(floatvalNum($res2['insure_total2'])-floatvalNum($res2['discount'])-floatvalNum($res2['tax_deductions']));
            $_total_amount = $arr_check['_total_amount'];
        }else{
            $arr_check['cus_status'] = '-';
            $arr_check['stock_amount'] = '1';
        }
        $arr_check['insure_net'] = empty($res_check['insure_net']) ? '-' : delimeterNumber($res_check['insure_net']);
        $arr_check['insure_duty'] = empty($res_check['insure_duty']) ? '-' : delimeterNumber($res_check['insure_duty']);
        $arr_check['insure_tex'] = empty($res_check['insure_tex']) ? '-' : delimeterNumber($res_check['insure_tex']);
        $arr_check['insure_total2'] = empty($res_check['insure_total2']) ? '-' : delimeterNumber($res_check['insure_total2']);
        $arr_check['p_discount'] = empty($res_check['p_discount']) ? '-' : delimeterNumber($res_check['p_discount']);
        // $arr_check['p_balance'] = empty($res_check['p_balance']) ? '-' : delimeterNumber($res_check['p_balance']);
        $arr_check['p_balance'] = delimeterNumber(floatvalNum($res_check['insure_total2'])-floatvalNum($res_check['p_discount']));
        $arr_check['p_tax_deductions'] = empty($res_check['p_tax_deductions']) ? '-' : delimeterNumber($res_check['p_tax_deductions']);
        // $arr_check['total_amount'] = empty($res_check['total_amount']) ? '-' : delimeterNumber($res_check['total_amount']);
        $arr_check['total_amount'] = delimeterNumber(floatvalNum($res_check['insure_total2'])-floatvalNum($res_check['p_discount'])-floatvalNum($res_check['p_tax_deductions']));
        // echo "<br>";
        $getTotal = str_replace(',', '', $arr_check['total_amount']) + str_replace(',', '', $_total_amount);
        $arr_check['total'] = delimeterNumber($getTotal);
        $arr_check['total_convert'] = convert($arr_check['total']);
        $getJson = $arr_check;
        
        print_r(json_encode( $getJson));

    }elseif($row_check == 0){
        echo '0';
    }else{
        echo '2';
    }

}elseif ($_GET['forms'] == 2) {
	
}


?>