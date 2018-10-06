<?php

include '../connect_db.php';


if($_GET['reports'] == 1){
	$dateRange = $_GET['select_date'];
	$dateRangeArry = explode(" ถึง ",$dateRange);
	$type = $_GET['type'];
	if($type == 'all'){
		$sql_report = "SELECT @rank:=@rank+1 AS no,sm.id, DATE(datetime) AS datetime, 
					CASE type WHEN 0 THEN 'พรบ.'
							  WHEN 1 THEN CONCAT('สมัครใจ ประเภท 1-3<br>', uc.code,'-',uc.name,' ',uc.surname)
							  WHEN 2 THEN CONCAT('สมัครใจ ประเภท 4<br>', uc.code,'-',uc.name,' ',uc.surname)
							  WHEN 3 THEN CONCAT('สมัครใจ ประเภท 5<br>', uc.code,'-',uc.name,' ',uc.surname)
					END AS type, CONCAT('<b>เริ่ม </b>',stock_start,' <br><b>สิ้นสุด </b>', stock_end) AS stock_all, CONCAT('<b>เริ่ม </b>',index_start,' <br><b>สิ้นสุด </b>', index_end) AS index_all, index_start, index_end, stock_total, sm.code, login_id, update_date 
					FROM stock_main sm left join user_code uc on sm.code=uc.code, (SELECT @rank := 0) r
					WHERE datetime BETWEEN DATE('$dateRangeArry[0]') AND DATE('$dateRangeArry[1]')";
	}else{
		$whr = "AND type = '$type'";
		if($type!="0"){
			$whr = "AND type <> 0";
		}
		$sql_report = "SELECT @rank:=@rank+1 AS no,sm.id, DATE(datetime) AS datetime, 
					CASE type WHEN 0 THEN 'พรบ.'
							  WHEN 1 THEN CONCAT('สมัครใจ ประเภท 1-3<br>', uc.code,'-',uc.name,' ',uc.surname)
							  WHEN 2 THEN CONCAT('สมัครใจ ประเภท 4<br>', uc.code,'-',uc.name,' ',uc.surname)
							  WHEN 3 THEN CONCAT('สมัครใจ ประเภท 5<br>', uc.code,'-',uc.name,' ',uc.surname)
					END AS type, CONCAT(stock_start,' <br><b>สิ้นสุด</b>', stock_end) AS stock_all, CONCAT('<b>เริ่ม </b>',index_start,' <br><b>สิ้นสุด </b>', index_end) AS index_all, index_start, index_end, stock_total, sm.code, login_id, update_date 
					FROM stock_main sm left join user_code uc on sm.code=uc.code, (SELECT @rank := 0) r
					WHERE datetime BETWEEN DATE('$dateRangeArry[0]') AND DATE('$dateRangeArry[1]') " . $whr;
	}
	
	$query_report = mysqli_query($conn,$sql_report);
	$res_report = mysqli_fetch_all($query_report,MYSQLI_ASSOC);
	foreach ($res_report as $key => $value) {
		$getMsg = "คุณต้องการลบข้อมูล เลขที่เอกสาร ".$value['index_start']." ถึง ".$value['index_end']." ใช่หรือไม่?";
		$res_report[$key]['action'] = '<a href="?page=forms_edit&action=edit1&data='.$res_report[$key]['id'].'"><i class="far fa-edit fa-2x pr-2 text-warning" data-toggle="tooltip" data-placement="top" title="แก้ไขข้อมูล"></i></a>
			<a href="menu-stock/submitforms.php?forms=delete1&id='.$res_report[$key]['id'].'" onclick="return confirm(\''.$getMsg.'\')"><i class="fas fa-trash-alt fa-2x text-danger" data-toggle="tooltip" data-placement="top" title="ลบข้อมูลตัวแทน"></i></a>';
	}
	$getJson['data'] = $res_report;
	//echo '<pre>';
	
	print_r(json_encode( $getJson));
	//echo '</pre>';


}elseif ($_GET['reports'] == 2) {
	$dateRange = $_GET['select_date'];
	$dateRangeArry = explode(" ถึง ",$dateRange);
	$type = $_GET['type'];

	if ($_GET['selectagent'] == 'all') {
		$select_agent = '';
	}else{
		$select_agent = 'AND agent_id = '.$_GET['selectagent'];
	}
	if($type == 'all'){
		$sql_report = "SELECT @rank:=@rank+1 AS no, id, DATE(datetime) AS datetime, agent_id, agent_name, 
					CASE type WHEN 0 THEN 'พรบ.'
							  WHEN 1 THEN 'สมัครใจ'
					END AS type, CONCAT('<b>เริ่ม </b>',stock_start,' <br><b>สิ้นสุด </b>', stock_end) AS stock_all, stock_total, login_id, update_date 
					FROM stock_request, (SELECT @rank := 0) r
					WHERE datetime BETWEEN DATE('$dateRangeArry[0]') AND DATE('$dateRangeArry[1]') ".$select_agent;
	}else{
		$sql_report = "SELECT @rank:=@rank+1 AS no, id, DATE(datetime) AS datetime, agent_id, agent_name, 
					CASE type WHEN 0 THEN 'พรบ.'
							  WHEN 1 THEN 'สมัครใจ'
					END AS type, CONCAT('<b>เริ่ม </b>',stock_start,' <br><b>สิ้นสุด </b>', stock_end) AS stock_all, stock_total, login_id, update_date 
					FROM stock_request, (SELECT @rank := 0) r
					WHERE datetime BETWEEN DATE('$dateRangeArry[0]') AND DATE('$dateRangeArry[1]') AND type = '$type' ".$select_agent;
	}
	
	$query_report = mysqli_query($conn,$sql_report);
	$res_report = mysqli_fetch_all($query_report,MYSQLI_ASSOC);
	foreach ($res_report as $key => $value) {
		$getMsg = "คุณต้องการลบข้อมูลการเบิกของตัวแทน ".$value['agent_id']." - ".$value['agent_name']." ใช่หรือไม่?";
		$res_report[$key]['action'] = '<a href="?page=forms_edit&action=edit2&data='.$res_report[$key]['id'].'"><i class="far fa-edit fa-2x pr-2 text-warning" data-toggle="tooltip" data-placement="top" title="แก้ไขข้อมูล"></i></a>
			<a href="menu-stock/submitforms.php?forms=delete2&id='.$res_report[$key]['id'].'" onclick="return confirm(\''.$getMsg.'\')"><i class="fas fa-trash-alt fa-2x text-danger" data-toggle="tooltip" data-placement="top" title="ลบข้อมูลตัวแทน"></i></a>';
	}
	$getJson['data'] = $res_report;

	//echo '<pre>';
	print_r(json_encode( $getJson));
	//echo '</pre>';

}elseif ($_GET['reports'] == 3) {
	$dateRange = $_GET['select_date'];
	$dateRangeArry = explode(" ถึง ",$dateRange);
	$status = $_GET['status'];

	if ($_GET['selectagent'] == 'all') {
		$select_agent = '';
	}else{
		$select_agent = 'AND agent_id = '.$_GET['selectagent'];
	}
	if($status == 'all'){
		$sql_report = "SELECT @rank:=@rank+1 AS no, id, DATE(datetime) AS datetime, agent_id, agent_name,
					CASE status WHEN 0 THEN 'ใช้งาน'
							  	WHEN 1 THEN 'ส่งคืน'
							  	WHEN 2 THEN 'ชำรุด'
							  	WHEN 3 THEN 'สูญหาย'
					END AS status, CONCAT('<b>เริ่ม </b>',stock_start,' <br><b>สิ้นสุด </b>', stock_end) AS stock_all, stock_total, login_id, update_date 
					FROM stock_use, (SELECT @rank := 0) r
					WHERE datetime BETWEEN DATE('$dateRangeArry[0]') AND DATE('$dateRangeArry[1]') ".$select_agent;
	}else{
		$sql_report = "SELECT @rank:=@rank+1 AS no, id, DATE(datetime) AS datetime, agent_id, agent_name, 
					CASE status WHEN 0 THEN 'ใช้งาน'
							  	WHEN 1 THEN 'ส่งคืน'
							  	WHEN 2 THEN 'ชำรุด'
							  	WHEN 3 THEN 'สูญหาย'
					END AS status, CONCAT('<b>เริ่ม </b>',stock_start,' <br><b>สิ้นสุด </b>', stock_end) AS stock_all, stock_total, login_id, update_date 
					FROM stock_use, (SELECT @rank := 0) r
					WHERE datetime BETWEEN DATE('$dateRangeArry[0]') AND DATE('$dateRangeArry[1]') AND status = '$status' ".$select_agent;
	}
	
	$query_report = mysqli_query($conn,$sql_report);
	$res_report = mysqli_fetch_all($query_report,MYSQLI_ASSOC);
	foreach ($res_report as $key => $value) {
		$getMsg = "คุณต้องการลบข้อมูลสต๊อกรายวันของตัวแทน ".$value['agent_id']." - ".$value['agent_name']." ใช่หรือไม่?";
		$res_report[$key]['action'] = '<a href="?page=forms_edit&action=edit3&data='.$res_report[$key]['id'].'"><i class="far fa-edit fa-2x pr-2 text-warning" data-toggle="tooltip" data-placement="top" title="แก้ไขข้อมูล"></i></a>
			<a href="menu-stock/submitforms.php?forms=delete3&id='.$res_report[$key]['id'].'" onclick="return confirm(\''.$getMsg.'\')"><i class="fas fa-trash-alt fa-2x text-danger" data-toggle="tooltip" data-placement="top" title="ลบข้อมูลตัวแทน"></i></a>';
	}
	$getJson['data'] = $res_report;
	//echo '<pre>';
	print_r(json_encode( $getJson));
	//echo '</pre>';
}elseif ($_GET['reports'] == 4) {
	$year = $_GET['select_year'];
	$selectagent = $_GET['selectagent'];
	$type = $_GET['type'];

	$sql_report = "SELECT *, stock_total - (stock_use + stock_cancel + stock_return) as stock_remain FROM ( 
		SELECT datetime, stock_start, stock_end, index_start,CONCAT(index_start,' - ',index_end) AS index_start_end, index_end, stock_total 
		, (SELECT mem_name FROM member where mem_id = login_id) as user  
		, (SELECT count(DISTINCT barcode) FROM insure_payment2 where barcode between sm.index_start AND sm.index_end and barcode not in (select stock_start from stock_use)) stock_use 
		, ifnull((SELECT sum(stock_total) FROM stock_use su where (su.stock_start between sm.index_start AND sm.index_end) AND (su.stock_end between sm.index_start AND sm.index_end) AND status > 1),0) stock_cancel 
		, ifnull((SELECT sum(stock_total) FROM stock_use su where (su.stock_start between sm.index_start AND sm.index_end) AND (su.stock_end between sm.index_start AND sm.index_end) AND status = 1),0) stock_return 
		FROM stock_main sm where year(datetime) = '$year' AND type <> '$type' AND login_id = '$selectagent' 
		) tblTemp";
	$query_report = mysqli_query($conn,$sql_report);
	$res_report = mysqli_fetch_all($query_report,MYSQLI_ASSOC);
	foreach ($res_report as $key => $value) { 
		$res_report[$key]['num'] = $key+1;
	}
	$getJson['data'] = $res_report;

	//echo '<pre>';
	print_r(json_encode( $getJson));
	//echo '</pre>';

}elseif ($_GET['reports'] == 5) {
	$dateRange = $_GET['select_date'];
	$dateRangeArry = explode(" ถึง ",$dateRange);
	$selectagent = $_GET['selectagent'];

	$sql_report = "SELECT *, stock_total - (stock_use + stock_cancel + stock_return) AS stock_remain , ( 
			SELECT min(a.stock_id) + 1 AS sstart 
			FROM insure_payment AS a, insure_payment AS b 
			WHERE a.stock_id < b.stock_id 
			GROUP BY a.stock_id 
			HAVING sstart < MIN(b.stock_id) AND a.stock_id between tblTemp.stock_start AND tblTemp.stock_end 
			LIMIT 1 ) as remain_start , 
			if(stock_use_end is not null, if(stock_end = stock_use_end, null, stock_end), null) as remain_end,
			CONCAT(( SELECT min(a.stock_id) + 1 AS sstart 
			FROM insure_payment AS a, insure_payment AS b 
			WHERE a.stock_id < b.stock_id 
			GROUP BY a.stock_id 
			HAVING sstart < MIN(b.stock_id) AND a.stock_id between tblTemp.stock_start AND tblTemp.stock_end 
			LIMIT 1 ) , ' - ',
			if(stock_use_end is not null, if(stock_end = stock_use_end, null, stock_end), null)) AS remain_start_end FROM 
			( SELECT agent_name, datetime, stock_start, stock_end, CONCAT(stock_start,' - ', stock_end) AS stock_start_end ,stock_total , 
			(SELECT min(stock_id) FROM insure_payment WHERE stock_id between sr.stock_start AND sr.stock_end) stock_use_start , 
			(SELECT max(stock_id) FROM insure_payment WHERE stock_id between sr.stock_start AND sr.stock_end) stock_use_end , 
			CONCAT((SELECT min(stock_id) FROM insure_payment WHERE stock_id between sr.stock_start AND sr.stock_end) ,' - ', 
			(SELECT max(stock_id) FROM insure_payment WHERE stock_id between sr.stock_start AND sr.stock_end)) AS stock_use_start_end ,
			(SELECT count(distinct stock_id) FROM insure_payment WHERE stock_id between sr.stock_start AND sr.stock_end and stock_id not in (select stock_start from stock_use)) stock_use , 
			ifnull((SELECT sum(stock_total) FROM stock_use su WHERE (su.stock_start between sr.stock_start AND sr.stock_end) AND (su.stock_end between sr.stock_start AND sr.stock_end) AND status > 1),0) stock_cancel , 
			ifnull((SELECT sum(stock_total) FROM stock_use su WHERE (su.stock_start between sr.stock_start AND sr.stock_end) AND (su.stock_end between sr.stock_start AND sr.stock_end) AND status = 1),0) stock_return FROM stock_request sr WHERE datetime BETWEEN DATE('$dateRangeArry[0]') AND DATE('$dateRangeArry[1]') AND type = 0 AND agent_id = '$selectagent' ) tblTemp";
	$query_report = mysqli_query($conn,$sql_report);
	$res_report = mysqli_fetch_all($query_report,MYSQLI_ASSOC);
	foreach ($res_report as $key => $value) { 
		$res_report[$key]['num'] = $key+1;
	}
	$getJson['data'] = $res_report;

	//echo '<pre>';
	print_r(json_encode( $getJson));
	//echo '</pre>';

}elseif ($_GET['reports'] == 6) {
	
}elseif ($_GET['reports'] == 7) {
	$dateRange = $_GET['select_date'];
	$dateRangeArry = explode(" ถึง ",$dateRange);
	$selectagent = $_GET['selectagent'];
	$type = $_GET['selecttype'];
	$sql_code = '';
	if($selectagent != 'all'){
		$sql_code = " AND code = '$selectagent' ";
	}
	$sql_type = '';
	if($type == 'all'){
		$sql_type = ' AND type <> 0 ';
	}else{
		$sql_type = " AND type = '$type' " ;
	}

	$sql_report = "select datetime, code , type, stock_total, index_start, index_end, CONCAT(index_start,' - ', index_end) AS index_start_end, stock_use, stock_use_start, stock_use_end, CONCAT(stock_use_start,' - ', stock_use_end) AS stock_use_start_end, stock_cancel, stock_return, stock_remain,
if(remain_end <> '',concat(remain_start , ' - ', remain_end),'') as remain_start_end
 from (
select *, stock_total - (stock_use + stock_cancel + stock_return) as stock_remain

, COALESCE((
SELECT concat(left(min(a.barcode),12) + 1,'0') AS sstart
FROM insure_payment2 AS a, insure_payment2 AS b
WHERE a.barcode < b.barcode
GROUP BY a.barcode
HAVING sstart < MIN(b.barcode) and a.barcode between tblTemp.index_start and tblTemp.index_end
order by sstart desc
LIMIT 1
),index_start) remain_start
    
, COALESCE(if(stock_use_end is not null, if(index_end = stock_use_end, null, index_end), tblTemp.index_end),'') remain_end

 from (
SELECT datetime, (SELECT CONCAT(uc.code, ' - ', name) AS code FROM user_code uc WHERE uc.code = sm.code) AS `code`, CASE `type` WHEN 1 THEN '1-3'
							 WHEN 2 THEN '4'
							 WHEN 3 THEN '5' END as `type`
	, stock_total, index_start, index_end ,CONCAT(index_start,' - ', index_end ) AS index_start_end
	, (SELECT count(distinct barcode) FROM insure_payment2 WHERE barcode between sm.index_start AND sm.index_end and barcode not in (select stock_start from stock_use)) stock_use                 
	, (SELECT min(barcode) FROM insure_payment2 WHERE barcode between sm.index_start AND sm.index_end) stock_use_start 
	, (SELECT max(barcode) FROM insure_payment2 WHERE barcode between sm.index_start AND sm.index_end) stock_use_end 
	,CONCAT((select min(barcode) from insure_payment2 where barcode between sm.index_start and sm.index_end) 
	,' - ', (select max(barcode) from insure_payment2 where barcode between sm.index_start and sm.index_end)  ) 	AS stock_use_start_end
	, ifnull((SELECT sum(stock_total) FROM stock_use su WHERE (su.stock_start between sm.stock_start AND sm.stock_end) AND (su.stock_end between sm.stock_start AND sm.stock_end) AND status > 1),0) stock_cancel 
	, ifnull((SELECT sum(stock_total) FROM stock_use su WHERE (su.stock_start between sm.stock_start AND sm.stock_end) AND (su.stock_end between sm.stock_start AND sm.stock_end) AND status = 1),0) stock_return 
	FROM stock_main sm WHERE datetime BETWEEN DATE('$dateRangeArry[0]') AND DATE('$dateRangeArry[1]')".$sql_type.$sql_code."  
	) tblTemp) tblAll ORDER BY code, type, datetime";
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