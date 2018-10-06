<?php
 include '../connect_db.php';

 $date = $_GET['select_date'];
 $search = $_GET['search'];
 $type = $_GET['type'];
 $where_search = "";

 $show_stock1 = '';
 $show_stock2 = '';
 $show_stock3 = '';
 $show_stock4 = '';

 $getKey2 = array();
 $getKey3 = array();

 if(!empty($search)){
	 $where_search = " AND CONCAT(stock_id,' ',cus_title,' ', cus_firstname,' ', cus_lastname,' ',car_number,' ',insure_net,' ',insure_tex,' ',insure_duty,' ',insure_total2,' ',inform_id) LIKE '%$search%'";
 }

 if($type == 1){
	 //แสดงกรมธรรม์จากวันที่หรือคำค้นหา
	$sql = "SELECT @rank:=@rank+1 AS no, stock_id, CONCAT(cus_title, cus_firstname,' ', cus_lastname) AS cus_name, insure_date, car_number, stock_date, insure_net, insure_total2, insure_duty, insure_tex,
		CASE
			WHEN cus_type2 = 'ตัวแทน' THEN (SELECT name FROM agent WHERE agent_id = cus_detail) 
			WHEN cus_type2 = 'vip' THEN CONCAT('VIP - ',cus_detail)
			ELSE '-'
		END AS agent
		FROM insure_payment, (SELECT @rank := 0) r WHERE stock_date = '$date'".$where_search." ORDER BY stock_id ASC";
	$query = mysqli_query($conn,$sql);
	$res_report = mysqli_fetch_all($query,MYSQLI_ASSOC);

	 //ผลรวมจำนวนกรมธรรม์ จำนวนเงิน และผลรวมหน้า เงินเชื่อ
	 $sql_total = "SELECT COUNT(i.stock_id) AS sum_stock_id,
						 SUM(CONVERT(REPLACE(i.insure_net, ',', ''),UNSIGNED INTEGER)) AS sum_insure_net,
						 SUM(CONVERT(REPLACE(i.insure_total2, ',', ''),UNSIGNED INTEGER)) AS sum_insure_total2,
						 SUM(CASE WHEN type = 1 THEN 1 ELSE 0 END) AS type1,
						 SUM(CASE WHEN type = 2 THEN 1 ELSE 0 END) AS type2
					 FROM insure_payment i
					 LEFT JOIN payment p
					 ON i.stock_id = p.stock_id
					 WHERE stock_date = '$date'".$where_search;
	 $query_total = mysqli_query($conn,$sql_total);
	 $res_total = mysqli_fetch_array($query_total,MYSQLI_ASSOC);

	 //ผลรวมจำนวนกรมธรรม์ จำนวนเงิน และผลรวมหน้า เงินเชื่อ
	 $sql_insure = "SELECT i.insure_net,i.insure_total2
					 FROM insure_payment i
					 WHERE stock_date = '$date'".$where_search;
	 $query_insure = mysqli_query($conn,$sql_insure);
	 $res_insure = mysqli_fetch_all($query_insure,MYSQLI_ASSOC);

	 $sum_insure_net = 0;
	 $sum_insure_total2 = 0;

	 foreach ($res_insure as $key_insure => $value_insure) {
		 $sum_insure_net += $value_insure['insure_net'];
		 $sum_insure_total2 += $value_insure['insure_total2'];
	 }

	 // แสดงรายการกรมธรรม์ หน้าร้าน 
	 $sql_total2 = "SELECT i.stock_id 
					 FROM insure_payment i
					 LEFT JOIN payment p
					 ON i.stock_id = p.stock_id
					 WHERE p.form_type = 1 AND type = 1 AND stock_date = '$date'".$where_search;
	 $query_total2 = mysqli_query($conn,$sql_total2);
	 $res_total2 = mysqli_fetch_all($query_total2,MYSQLI_ASSOC);

	 foreach ($res_total2 as $key2 => $value2) {
		 $getKey2[$key2] = $value2['stock_id'];
		 
	 }
	 $show_stock1 = implode(', ', $getKey2);

	 //แสดงรายการกรมธรรม์ เงินเชื่อ
	 $sql_total3 = "SELECT i.stock_id 
					 FROM insure_payment i
					 LEFT JOIN payment p
					 ON i.stock_id = p.stock_id
					 WHERE p.form_type = 1 AND type = 2 AND stock_date = '$date'".$where_search;
	 $query_total3 = mysqli_query($conn,$sql_total3);
	 $res_total3 = mysqli_fetch_all($query_total3,MYSQLI_ASSOC);

	 foreach ($res_total3 as $key3 => $value3) {
		 $getKey3[$key3] = $value3['stock_id'];
		 
	 }
	 $show_stock2 = implode(', ', $getKey3);


	 foreach ($res_report as $key => $value) {
		$res_report[$key]['arrears'] = '';
		$res_report[$key]['balance'] = '';
		$res_report[$key]['discount'] = '';
		$res_report[$key]['tax_deductions'] = '';
		$res_report[$key]['balance'] = '';
		
		$sql_pay = "SELECT stock_id, balance ,arrears ,payment_type, discount, tax_deductions, balance, cus_pay_date FROM payment WHERE stock_id = '".$value['stock_id']."' ORDER BY count ASC";
		$query_pay = mysqli_query($conn,$sql_pay);
		$res_pay = mysqli_fetch_all($query_pay,MYSQLI_ASSOC);

		 $sql_pay3 = "SELECT MAX(count) count, stock_id, balance ,arrears ,payment_type FROM payment WHERE stock_id = '".$value['stock_id']."'";
		 $query_pay3 = mysqli_query($conn,$sql_pay3);
		 $res_pay3 = mysqli_fetch_array($query_pay3,MYSQLI_ASSOC);

		 $sql_pay2 = "SELECT stock_id, balance ,arrears ,payment_type FROM payment WHERE stock_id = '".$value['stock_id']."' AND count = '".$res_pay3['count']."'";
		 $query_pay2 = mysqli_query($conn,$sql_pay2);
		 $res_pay2 = mysqli_fetch_all($query_pay2,MYSQLI_ASSOC);

		 $payment_type = array();

		 foreach ($res_pay as $key_pay => $value_pay) {
			//  if($value_pay['payment_type'] == 1){ $payment_type[$key_pay] = 'เงินสด'; }
			//  elseif($value_pay['payment_type'] == 2){ $payment_type[$key_pay] = 'เช็ค'; }
			//  elseif($value_pay['payment_type'] == 3){ $payment_type[$key_pay] = 'โอน'; }
			//  elseif($value_pay['payment_type'] == 4){ $payment_type[$key_pay] = 'บัตร'; }

			$payment_type[$key_pay] = $value_pay['cus_pay_date'];
			$res_report[$key]['discount'] = $value_pay['discount'];
			$res_report[$key]['tax_deductions'] = $value_pay['tax_deductions'];
			$res_report[$key]['balance'] = $value_pay['balance'];
		}
		foreach ($res_pay2 as $key_pay2 => $value_pay2) {
			$res_report[$key]['balance'] =  $value_pay2['balance'];
			if(!empty($value_pay2['arrears']) || $value_pay2['arrears'] != 0){
				$payment_type = array();
				$payment_type[$key_pay2] = 'ค้างชำระ';
				$res_report[$key]['arrears'] = $value_pay2['arrears'];
			}
		}

		$res_report[$key]['payment_type'] = implode('/', $payment_type);

	 }
 }
 elseif($type == 2){
	 //แสดงกรมธรรม์จากวันที่หรือคำค้นหา
	 $sql = "SELECT @rank:=@rank+1 AS no, no AS as_no, stock_id, selectagent, CONCAT(cus_title, cus_firstname,' ', cus_lastname) AS cus_name, insure_date, car_number, inform_code, inform_date, insure_net, insure_total2, insure_duty, insure_tex, 
	 CASE
	 	WHEN cus_type2 = 'ตัวแทน' THEN (SELECT name FROM agent WHERE agent_id = cus_detail) 
		WHEN cus_type2 = 'vip' THEN CONCAT('VIP - ',cus_detail)
		 ELSE '-'
	 END AS agent
	 FROM insure_payment2, (SELECT @rank := 0) r 
	 WHERE inform_date = '$date'".$where_search." ORDER BY stock_id ASC";
	 $query = mysqli_query($conn,$sql);
	 $res_report = mysqli_fetch_all($query,MYSQLI_ASSOC);

	 //ผลรวมจำนวนกรมธรรม์ จำนวนเงิน และผลรวมหน้า เงินเชื่อ
	 $sql_total = "SELECT COUNT(i.stock_id) AS sum_stock_id,
						 SUM(CONVERT(REPLACE(i.insure_net, ',', ''),UNSIGNED INTEGER)) AS sum_insure_net,
						 SUM(CONVERT(REPLACE(i.insure_total2, ',', ''),UNSIGNED INTEGER)) AS sum_insure_total2,
						 SUM(CASE WHEN type = 1 THEN 1 ELSE 0 END) AS type1,
						 SUM(CASE WHEN type = 2 THEN 1 ELSE 0 END) AS type2
					 FROM insure_payment2 i
					 LEFT JOIN payment p
					 ON i.no = p.stock_id
					 WHERE inform_date = '$date'".$where_search;
	 $query_total = mysqli_query($conn,$sql_total);
	 $res_total = mysqli_fetch_array($query_total,MYSQLI_ASSOC);

	 //ผลรวมจำนวนกรมธรรม์ จำนวนเงิน และผลรวมหน้า เงินเชื่อ
	 $sql_insure = "SELECT i.insure_net,i.insure_total2
					 FROM insure_payment2 i
					 WHERE inform_date = '$date'".$where_search;
	 $query_insure = mysqli_query($conn,$sql_insure);
	 $res_insure = mysqli_fetch_all($query_insure,MYSQLI_ASSOC);

	 $sum_insure_net = 0;
	 $sum_insure_total2 = 0;

	 foreach ($res_insure as $key_insure => $value_insure) {
		 $sum_insure_net += str_replace(',', '',$value_insure['insure_net']);
		 $sum_insure_total2 += str_replace(',', '',$value_insure['insure_total2']);
	 }

	 // แสดงรายการกรมธรรม์ หน้าร้าน 
	 $sql_total2 = "SELECT i.inform_code 
					 FROM insure_payment2 i
					 LEFT JOIN payment p
					 ON i.no = p.stock_id
					 WHERE p.form_type = 2 AND type = 1 AND inform_date = '$date'".$where_search;
	 $query_total2 = mysqli_query($conn,$sql_total2);
	 $res_total2 = mysqli_fetch_all($query_total2,MYSQLI_ASSOC);

	 foreach ($res_total2 as $key2 => $value2) {
		 $getKey2[$key2] = $value2['inform_code'];
		 
	 }
	 $show_stock1 = implode(', ', $getKey2);

	 //แสดงรายการกรมธรรม์ เงินเชื่อ
	 $sql_total3 = "SELECT i.inform_code 
					 FROM insure_payment2 i
					 LEFT JOIN payment p
					 ON i.no = p.stock_id
					 WHERE p.form_type = 2 AND type = 2 AND inform_date = '$date'".$where_search;
	 $query_total3 = mysqli_query($conn,$sql_total3);
	 $res_total3 = mysqli_fetch_all($query_total3,MYSQLI_ASSOC);

	 foreach ($res_total3 as $key3 => $value3) {
		 $getKey3[$key3] = $value3['inform_code'];
		 
	 }
	 $show_stock2 = implode(', ', $getKey3);


	 foreach ($res_report as $key => $value) {
		$res_report[$key]['arrears'] = '';
		$res_report[$key]['balance'] = '';
		$res_report[$key]['discount'] = '';
		$res_report[$key]['tax_deductions'] = '';
		$res_report[$key]['balance'] = '';
		// $res_report[$key]['agent'] = '';

		// $sql_agent = "SELECT name FROM user_code WHERE code = '".$value['selectagent']."'";
		// $query_agent = mysqli_query($conn,$sql_agent);
		// $res_agent = mysqli_fetch_array($query_agent,MYSQLI_ASSOC);

		// $res_report[$key]['agent'] = $res_agent['name'];

		$sql_pay = "SELECT stock_id, balance ,arrears ,payment_type, discount, tax_deductions, balance, cus_pay_date FROM payment WHERE stock_id = '".$value['as_no']."' ORDER BY count ASC";
		$query_pay = mysqli_query($conn,$sql_pay);
		$res_pay = mysqli_fetch_all($query_pay,MYSQLI_ASSOC);

		$sql_pay3 = "SELECT MAX(count) count, stock_id, balance ,arrears ,payment_type FROM payment WHERE stock_id = '".$value['as_no']."'";
		$query_pay3 = mysqli_query($conn,$sql_pay3);
		$res_pay3 = mysqli_fetch_array($query_pay3,MYSQLI_ASSOC);

		$sql_pay2 = "SELECT stock_id, balance ,arrears ,payment_type FROM payment WHERE stock_id = '".$value['as_no']."' AND count = '".$res_pay3['count']."'";
		$query_pay2 = mysqli_query($conn,$sql_pay2);
		$res_pay2 = mysqli_fetch_all($query_pay2,MYSQLI_ASSOC);

		$payment_type = array();

		foreach ($res_pay as $key_pay => $value_pay) {
			/*if($value_pay['payment_type'] == 1){ $payment_type[$key_pay] = 'เงินสด'; }
			elseif($value_pay['payment_type'] == 2){ $payment_type[$key_pay] = 'เช็ค'; }
			elseif($value_pay['payment_type'] == 3){ $payment_type[$key_pay] = 'โอน'; }
			elseif($value_pay['payment_type'] == 4){ $payment_type[$key_pay] = 'บัตร'; }*/
			$payment_type[$key_pay] = $value_pay['cus_pay_date'];
			$res_report[$key]['discount'] = $value_pay['discount'];
			$res_report[$key]['tax_deductions'] = $value_pay['tax_deductions'];
			$res_report[$key]['balance'] = $value_pay['balance'];
		}
		foreach ($res_pay2 as $key_pay2 => $value_pay2) {
			$res_report[$key]['balance'] =  $value_pay2['balance'];
			if(!empty($value_pay2['arrears']) || $value_pay2['arrears'] != 0){
				$payment_type = array();
				$payment_type[$key_pay2] = 'ค้างชำระ';
				$res_report[$key]['arrears'] = $value_pay2['arrears'];
			}
		}

		$res_report[$key]['payment_type'] = implode('/', $payment_type);

	}
 }
	function DateThai($strDate){
		$year = explode('-',$strDate);
		$strYear = $year[0];
		$strMonth= $year[1];
		$strDay= "วันที่  ".(int)$year[2];
		$strMonthCut=array(
		    "00"=>"",
		    "01"=>"มกราคม",
		    "02"=>"กุมภาพันธ์",
		    "03"=>"มีนาคม",
		    "04"=>"เมษายน",
		    "05"=>"พฤษภาคม",
		    "06"=>"มิถุนายน", 
		    "07"=>"กรกฎาคม",
		    "08"=>"สิงหาคม",
		    "09"=>"กันยายน",
		    "10"=>"ตุลาคม",
		    "11"=>"พฤศจิกายน",
		    "12"=>"ธันวาคม"                 
		);
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
	}

	//$getJson['data'] = $res_report;


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="matrix-admin/assets/libs/daterangepicker/daterangepicker.css" />
    <!-- Custom CSS -->
    <link href="../matrix-admin/dist/css/style.min.css" rel="stylesheet">
    <link href="../matrix-admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="../matrix-admin/assets/libs/datatables/media/css/dataTables.searchHighlight.css" rel="stylesheet">
	<link href="../matrix-admin/assets/libs/datatables/media/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <link href="../matrix-admin/assets/libs/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="../matrix-admin/assets/libs/select2/dist/css/select2-bootstrap.min.css" rel="stylesheet">
    <link href="../matrix-admin/assets/libs/timepicker/bootstrap-timepicker.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="../matrix-admin/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker3.standalone.min.css" />
	<style type="text/css" media="print">
	  	@page { 
	  		size: landscape;
	   		margin: 0mm;  /* this affects the margin in the printer settings */
        }
        footer {page-break-after: ;}


        

	</style>
</head>
<body >
	<div class="container-fluid">
		<div class="my-5" align="center">
		<?php 
			if($type == 1){ 
				echo "<h4>รายงานยอดขายประจำวัน พรบ.</h4>";
			}elseif($type == 2){ 
				echo "<h4>รายงานยอดขายประจำวัน สมัครใจ</h4>";
			}		
		?>

			<h4><?=DateThai($date)?></h4>
		</div>
		<table id="report_payment3" class="table table-bordered table-sm " style="width:100%">
		<?php if($type == 1){ ?>
			<thead>
				<tr>
					<th>ลำดับ</th>
					<th>เลขที่กรมธรรม์</th>
					<th>ผู้เอาประกัน</th>
					<th>วันที่คุ้มครอง</th>
					<th>ทะเบียนรถ</th>
					<th>วันที่ทำกรมธรรม์</th>
					<th>เบี้ยสุทธิ</th>
					<th>เบี้ยรวม</th>
					<th>ส่วนลด</th>
					<th>หักภาษี 1%</th>
					<th>เหลือชำระ</th>
					<th>ตัวแทน</th>
					<th>สถานะชำระ</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($res_report as $key_ => $value_) { ?>
				
			<tr>
				<td><?=$value_['no']?></td>
                <td><?=$value_['stock_id']?></td>
                <td><?=$value_['cus_name']?></td>
                <td><?=$value_['insure_date']?></td>
                <td><?=$value_['car_number']?></td>
                <td><?=$value_['stock_date']?></td>
                <td><?=$value_['insure_net']?></td>
                <td><?=$value_['insure_total2']?></td>
                <td><?=$value_['discount']?></td>
				<td><?=$value_['tax_deductions']?></td>
				<td><?=$value_['balance']?></td>
				<td><?=$value_['agent']?></td>
				<td><?=$value_['payment_type']?></td>
			</tr>
			<?php } ?>
		</tbody>
		<?php }elseif($type == 2){ ?>
			<thead>
				<tr>
					<th>ลำดับ</th>
					<th>เลขที่รับแจ้ง</th>
					<th>เลขที่กรมธรรม์</th>
					<th>ผู้เอาประกัน</th>
					<th>ทะเบียนรถ</th>
					<th>วันแจ้งต่อประกันภัย</th>
					<th>วันคุ้มครอง</th>
					<th>เบี้ยสุทธิ</th>
					<th>เบี้ยรวม</th>
					<th>ส่วนลด</th>
					<th>หักภาษี 1%</th>
					<th>เหลือชำระ</th>
					<th>ตัวแทน</th>
					<th>สถานะชำระ</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($res_report as $key_ => $value_) { ?>
					
				<tr>
					<td><?=$value_['no']?></td>
					<td><?=$value_['inform_code']?></td>
					<td><?=$value_['stock_id']?></td>
					<td><?=$value_['cus_name']?></td>
					<td><?=$value_['car_number']?></td>
					<td><?=$value_['inform_date']?></td>
					<td><?=$value_['insure_date']?></td>
					<td><?=$value_['insure_net']?></td>
					<td><?=$value_['insure_total2']?></td>
					<td><?=$value_['discount']?></td>
					<td><?=$value_['tax_deductions']?></td>
					<td><?=$value_['balance']?></td>
					<td><?=$value_['agent']?></td>
					<td><?=$value_['payment_type']?></td>
				</tr>
				<?php } ?>
			</tbody>
		<?php } ?>
		</table>
		<div style="page-break-inside:avoid;page-break-after: auto;"></div>
		<div class="mt-5 h4 font-weight-light row">
		<div class="col-4">
			<p>รวมยอดขายทั้งหมด <b class="mx-4"><?=$res_total['sum_stock_id']?></b>กรมธรรม์</p>
		</div>
		<div class="col-8">
			<p>รวมเบี้ยสุทธิ <b class="mx-4"><?=number_format($sum_insure_net,2)?> บาท </b>รวมเบี้ยรวม<b class="mx-4"><?=number_format($sum_insure_total2,2)?> บาท </b></p>
		</div>	
		<?php if($type == 1){ ?>
		<div class="col-4">
			<p>รวมยอดขายหน้าร้าน <b class="mx-4"><?=$res_total['type1']?></b>กรมธรรม์</p>
		</div>
		<div class="col-8">
			<p>ได้แก่เลขกรมธรรม์<b class="mx-4"><?=$show_stock1?></b></p>
		</div>
		<div class="col-4">
			<p>รวมยอดขายเงินเชื่อ <b class="mx-4"><?=$res_total['type2']?></b>กรมธรรม์</p>
		</div>
		<div class="col-8">
			<p>ได้แก่เลขกรมธรรม์ <b class="mx-4"><?=$show_stock2?></b></p>
		</div>
		<?php }elseif($type == 2){ ?>
		<div class="col-4">
			<p>รวมยอดขายหน้าร้าน <b class="mx-4"><?=$res_total['type1']?></b>คัน</p>
		</div>
		<div class="col-8">
			<p>ได้แก่เลขรับแจ้ง <b class="mx-4"><?=$show_stock1?></b></p>
		</div>
		<div class="col-4">
			<p>รวมยอดขายเงินเชื่อ <b class="mx-4"><?=$res_total['type2']?></b>กรมธรรม์</p>
		</div>
		<div class="col-8">
			<p>ได้แก่เลขรับแจ้ง <b class="mx-4"><?=$show_stock2?></b></p>
		</div>
		<?php } ?>
		
	</div>
	</div>



	<script src="../matrix-admin/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../matrix-admin/assets/libs/jquery/dist/jquery.highlight.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../matrix-admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../matrix-admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../matrix-admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../matrix-admin/assets/libs/timepicker/bootstrap-timepicker.js"></script>
    <script src="../matrix-admin/assets/libs/jquery.form-validator.min.js"></script>
    <script type="text/javascript" src="../matrix-admin/assets/libs/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="../matrix-admin/assets/libs/daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="../matrix-admin/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker-custom.js"></script>
	<script type="text/javascript" src="../matrix-admin/assets/libs/bootstrap-datepicker/dist/locales/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>
    <!--Wave Effects -->
    <script src="../matrix-admin/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../matrix-admin/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../matrix-admin/dist/js/custom.min.js"></script>
    <script src="../matrix-admin/assets/libs/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../matrix-admin/assets/libs/datatables/media/js/dataTables.searchHighlight.min.js"></script>
    <script src="../matrix-admin/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
	<script src="../matrix-admin/assets/libs/datatables/media/js/dataTables.buttons.min.js"></script>
	<script src="../matrix-admin/assets/libs/datatables/media/js/buttons.bootstrap4.min.js"></script>
	<script src="../matrix-admin/assets/libs/datatables/media/js/jszip.min.js"></script>
	<script src="../matrix-admin/assets/libs/datatables/media/js/buttons.html5.min.js"></script>
	<script src="../matrix-admin/assets/libs/datatables/media/js/buttons.print.min.js"></script>
    <script src="../matrix-admin/assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="../matrix-admin/assets/libs/select2/dist/js/i18n/th.js"></script>


</body>
</html>