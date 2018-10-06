<?php

include '../connect_db.php';
date_default_timezone_set("Asia/Bangkok");

$getStockId = $_GET['search'];

$sql_get_stock = "SELECT id, bill_no, deposit_date, renew, status_register, stock_id, name, tel, address, car_number, tax_date, pay_insurance, pay_tax,  pay_fine, pay_change, pay_service, total, appointment_date, sign_depositor, sign_receiver, receiver, return_date FROM registration_renewal  WHERE bill_no = '$getStockId'";
$query_get_stock = mysqli_query($conn,$sql_get_stock);
$result_get_row = mysqli_num_rows($query_get_stock);
$result_get_stock = mysqli_fetch_array($query_get_stock,MYSQLI_ASSOC);

$this_uncheck = '<img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjMycHgiIGhlaWdodD0iMzJweCIgdmlld0JveD0iMCAwIDI3OC43OTkgMjc4Ljc5OSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMjc4Ljc5OSAyNzguNzk5OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPHBhdGggZD0iTTI2NS41NCwwSDEzLjI1OUM1LjkzOSwwLDAuMDAzLDUuOTM2LDAuMDAzLDEzLjI1NnYyNTIuMjg3YzAsNy4zMiw1LjkzNiwxMy4yNTYsMTMuMjU2LDEzLjI1NkgyNjUuNTQgICBjNy4zMTgsMCwxMy4yNTYtNS45MzYsMTMuMjU2LTEzLjI1NlYxMy4yNTVDMjc4Ljc5Niw1LjkzNSwyNzIuODYsMCwyNjUuNTQsMHogTTI1Mi4yODQsMjUyLjI4N0gyNi41MTVWMjYuNTExaDIyNS43NjlWMjUyLjI4N3oiIGZpbGw9IiMwMDAwMDAiLz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" />';

$this_check = '<img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTguMS4xLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDE3NC4yMzkgMTc0LjIzOSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMTc0LjIzOSAxNzQuMjM5OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjMycHgiIGhlaWdodD0iMzJweCI+CjxnPgoJPHBhdGggZD0iTTAsMHYxNzQuMjM5aDE3NC4yMzlWMEgweiBNMTU5LjMwNSwxNTkuMzA1SDE0LjkzNVYxNC45MzVoMTQ0LjM3VjE1OS4zMDV6IiBmaWxsPSIjMDAwMDAwIi8+Cgk8cG9seWdvbiBwb2ludHM9IjEzNS4wMTYsNjEuNDcgMTIzLjQ5NCw1MS45NyA3OC4wNDEsMTA3LjA5MSA0OS42NTEsODQuMzE5IDQwLjMwNyw5NS45NjggODAuMTg5LDEyNy45NTcgICIgZmlsbD0iIzAwMDAwMCIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" />';

$check_renew1 = $this_uncheck;
$check_renew2 = $this_uncheck;
$check_renew3 = $this_uncheck;

if(count($result_get_stock['renew']) > 0){
	foreach(explode(',', $result_get_stock['renew']) as $renew){
    	if($renew == 1){
			$check_renew1 = $this_check;
		}elseif($renew == 2){
			$check_renew2 = $this_check;
		}elseif($renew == 3){
			$check_renew3 = $this_check;
		}
	}
}

function DateThai($strDate){
	$year = explode('-',$strDate);
	$strYear = $year[0];
	$strMonth= $year[1];
	$strDay= "วันที่  ".$year[2];
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

$status_register1 = '';

if($result_get_stock['status_register'] == 1){
	$status_register1 = 'สำเนาทะเบียนรถ';
}elseif($result_get_stock['status_register'] == 2){
	$status_register1 = 'สมุดทะเบียนรถ';
}else{
	$status_register1 = $result_get_stock['status_register'];
}



?>
<!DOCTYPE html>
<html lang="th">
<head>
	<title></title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../matrix-admin/dist/css/style.min.css" rel="stylesheet">
    <style type="text/css" media="print">
        @page {
            margin: 0mm;  /* this affects the margin in the printer settings */
        }

        body{
            margin: 1.6cm;  /* the margin on the content before printing */
       	}
       	
    </style>
    <style type="text/css">
    	.font1{
       		font-size: 20px;
       	}
    </style>
</head>
<body style="color: #000;">
	<div class="container-fluid">
		<div align="center" class="border-bottom border-dark mb-4">
			<h3 class="pb-3">ใบเสร็จฝากบริการต่อภาษี</h3>
			<h3 class="pb-3">บริษัท วิริยะประกันภัย จำกัด (มหาชน)</h3>
			<h3 class="pb-3" style="font-weight: lighter;">สำนักงานตัวแทน นายสมเกียรติ อินทรานุปกรณ์</h3>
			<p class="font1">51/25 ถนนมิตรภาพ ตำบลในเมือง อำเภอเมือง จังหวัดนครราชสีมา 30000 โทร.( 044 )275745-51</p>
		</div>
		<div class="d-flex justify-content-between mb-5">
			<div><h4><?=$check_renew1?> ควบพรบ.</h4></div>
			<div><h4><?=$check_renew2?> ต่อภาษีรถยนต์</h4></div>
			<div><h4><?=$check_renew3?> ต่อภาษีรถจักรยานยนต์</h4></div>
		</div>
		<div align="right">
			<p class="font1"><b>เลขที่บิล</b> <?=$getStockId?></p>
			<p class="font1"><?=DateThai($result_get_stock['deposit_date'])?></p>
		</div>
		<div class="row mt-5">
			<div class="col-6">
				<p class="font1"><b class="mr-4">ชื่อผู้เอาประกัน</b> <?=$result_get_stock['name']?></p>
			</div>
			<div class="col-6">
				<p class="font1"><b class="mr-4">โทร </b><?=$result_get_stock['tel']?></p>
			</div>
			<div class="col-12">
				<p class="font1"><b class="mr-4">ที่อยู่ </b><?=$result_get_stock['address']?></p>
			</div>
			<div class="col-4">
				<p class="font1"><b class="mr-4">ทะเบียน </b><?=$result_get_stock['car_number']?></p>
			</div>
			<div class="col-8">
				<p class="font1"><b class="mr-4">วันครบกำหนดชำระภาษี </b><?=DateThai($result_get_stock['tax_date'])?></p>
			</div>
			<div class="col-12">
				<p class="font1"><b class="mr-4">เอกสารที่ฝากมาด้วย </b><?=$status_register1 ?></p>
			</div>
			
		</div>
		<div class="row mt-3">
			<div class="offset-2 col-3">
				<p class="font1"><b>ค่าเบี้ยประกัน พรบ.</b> </p>
			</div>
			<div class="col-4" align="center">
				<p class="font1"><?= $result_get_stock['pay_insurance']?></p>
			</div>
			<div class="col-3">
				<p class="font1"><b class="mr-4">บาท</b></p>
			</div>
			
			<div class="offset-2 col-3">
				<p class="font1"><b>ค่าภาษีรถ</b> </p>
			</div>
			<div class="col-4" align="center">
				<p class="font1"><?= $result_get_stock['pay_tax']?></p>
			</div>
			<div class="col-3">
				<p class="font1"><b class="mr-4">บาท</b></p>
			</div>

			<div class="offset-2 col-3">
				<p class="font1"><b>ค่าปรับ</b> </p>
			</div>
			<div class="col-4" align="center">
				<p class="font1"><?= $result_get_stock['pay_fine']?></p>
			</div>
			<div class="col-3">
				<p class="font1"><b class="mr-4">บาท</b></p>
			</div>

			<div class="offset-2 col-3">
				<p class="font1"><b>ค่าเปลี่ยนเล่ม</b> </p>
			</div>
			<div class="col-4" align="center">
				<p class="font1"><?= $result_get_stock['pay_change']?></p>
			</div>
			<div class="col-3">
				<p class="font1"><b class="mr-4">บาท</b></p>
			</div>

			<div class="offset-2 col-3">
				<p class="font1"><b>ค่าบริการ ( อื่นๆ )</b> </p>
			</div>
			<div class="col-4" align="center">
				<p class="font1"><?= $result_get_stock['pay_service']?></p>
			</div>
			<div class="col-3">
				<p class="font1"><b class="mr-4">บาท</b></p>
			</div>

			<div class="offset-2 col-3" align="right">
				<p class="font1"><b>รวมเงิน</b> </p>
			</div>
			<div class="col-4" align="center">
				<p class="font1"><?= $result_get_stock['total']?></p>
			</div>
			<div class="col-3">
				<p class="font1"><b class="mr-4">บาท</b></p>
			</div>
			
		</div>
		<div class="row mt-5" align="center">
			<div class="col-6">
				<p class="font1"><b class="mr-2">ลงชื่อ</b>...............................................................<b> ผู้ฝาก</b></p>
			</div>
			<div class="col-6">
				<p class="font1"><b class="mr-2">ลงชื่อ</b>...............................................................<b> ผู้รับฝาก</b></p>
			</div>
			
		</div>
		<div class="row " align="center">
			<div class="col-6">
				<p class="font1">( <?=$result_get_stock['sign_depositor']?> )</p>
			</div>
			<div class="col-6">
				<p class="font1">( <?=$result_get_stock['sign_receiver']?> )</p>
			</div>
			
		</div>
		<div align="center" class="border-bottom border-secondary  my-5 pb-3">
			<p class="font1">หมายเหตุ: (โปรดนำใบรับนี้มายื่นเพื่อขอรับคืนสมุดคู่มือต่อภาษีรถ ) <b class="mr-2">นัดรับวันที่</b> <?=DateThai($result_get_stock['appointment_date'])?></p>
		</div>

		<div class="row mt-5" >
			<div class="col-6">
				<p class="font1"><b class="mr-2">ผู้รับเอกสาร</b> <?=$result_get_stock['receiver']?></p>
			</div>
			<div class="col-6" align="right">
				<p class="font1"><b class="mr-2">วันที่คืนเอกสาร</b><?=DateThai($result_get_stock['return_date'])?></p>
			</div>
			
		</div>

	</div>



	<script src="../matrix-admin/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../matrix-admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../matrix-admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>