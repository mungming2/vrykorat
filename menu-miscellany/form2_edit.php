<?php if(isset($_GET['status']) && $_GET['status'] == 'success'){ $getStockId = $_GET['search']; ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
	  	<strong>ทำรายการสำเร็จ !</strong> 
	  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    	<span aria-hidden="true">&times;</span>
	  	</button>
	</div>
<?php }else if(isset($_GET['status']) && $_GET['status'] == 'fail'){ $getStockId = $_GET['search']; ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
	  	<strong>ทำรายการไม่สำเร็จ !</strong> กรุณาลองอีกครั้ง <?='Cause : ' . $_GET['msg']?>
	  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    	<span aria-hidden="true">&times;</span>
	  	</button>
	</div>
<?php
    }else if(isset($_GET['search'])){ 
		$getStockId = $_GET['search'];
	}else{ 
		$getStockId = $_POST['search'];
    } 
    
    $sql_get_stock = "SELECT id, insure_date, inform_id, insure_type, inform_code, year_stock, stock_id, cus_name, cus_card_id, cus_occupation, cus_age, birth_date, cus_address1, cus_address2, cus_tel, car_number, car_province, car_brand, car_modal, car_year, car_color, car_cc_weight_seat, car_chassis, car_body, car_price, save_date, insure_time, insure_duration, insure_total, insure_code, insure_net, insure_tax, insure_duty, insure_total2, insure_beneficiary, insure_ralationship_name, insure_status, insure_status_stock, insure_status2, insure_status2_stock, cus_type, cus_type_detail, stock_date, create_stock_date, alert_type, alert_detail, cancel_date, cancel_detail FROM miscellany2 WHERE stock_id = '$getStockId' OR cus_name = '$getStockId' OR inform_code = '$getStockId' OR id = '$getStockId' OR car_number = '$getStockId' ";
	$query_get_stock = mysqli_query($conn,$sql_get_stock);
	$result_get_row = mysqli_num_rows($query_get_stock);
    $result_get_stock = mysqli_fetch_array($query_get_stock,MYSQLI_ASSOC);
    
    $form_type = 4;

    $sql_payment = "SELECT DISTINCT(count) AS count FROM payment WHERE stock_id = '".$result_get_stock['id']."' AND form_type = '$form_type' ORDER BY count ASC";
    $query_payment = mysqli_query($conn,$sql_payment);
	$result_payment = mysqli_fetch_all($query_payment,MYSQLI_ASSOC);
	
	$sql_user = "SELECT agent_id, name FROM agent ORDER BY agent_id ASC";
    $query_user = mysqli_query($conn,$sql_user);
	$result_user = mysqli_fetch_all($query_user,MYSQLI_ASSOC);
	
	$sql_province = "SELECT PROVINCE_ID, PROVINCE_NAME FROM province";
    $query_province = mysqli_query($conn,$sql_province);
    $result_province = mysqli_fetch_all($query_province,MYSQLI_ASSOC);

	$save_date = explode(' ถึง ', $result_get_stock['save_date']);
	
	$car_cc_weight_seat = explode('/', $result_get_stock['car_cc_weight_seat']);

    $insure_status1 = '';
    $insure_status2 = '';
    $insure_status_stock = '';

    if($result_get_stock['insure_status'] == 1){
        $insure_status1 = 'checked';
        $insure_status_stock = $result_get_stock['insure_status_stock'];
    }else{
        $insure_status2 = 'checked';
    }

    $insure_status2_1 = '';
    $insure_status2_2 = '';
    $insure_status2_3 = '';
    $insure_status2_stock1 = '';
    $insure_status2_stock2 = '';

    if($result_get_stock['insure_status2'] == 1){
        $insure_status2_1 = 'checked';
        $insure_status2_stock1 = $result_get_stock['insure_status2_stock'];
    }elseif($result_get_stock['insure_status2'] == 2){
        $insure_status2_2 = 'checked';
        $insure_status2_stock2 = $result_get_stock['insure_status2_stock'];
    }else{
        $insure_status2_3 = 'checked';
    }

    $cus_type1 = '';
	$cus_type2 = '';
	$cus_type0 = '';
	$cus_type_detail1 = '';
	$cus_type_detail2 = '';

    if($result_get_stock['cus_type'] == 1){
        $cus_type1 = 'checked';
        $cus_type_detail1 = $result_get_stock['cus_type_detail'];
    }elseif($result_get_stock['cus_type'] == 0){
        $cus_type0 = 'checked';
        $cus_type_detail2 = $result_get_stock['cus_type_detail'];
    }else{
        $cus_type2 = 'checked';
    }

    $alert_1 = '';
   	$alert_2 = '';
   	$alert_detail_1 = '';
   	$alert_detail_2 = '';
   	$alert_detail_3 = '';
   	$alert_3 = '';

   	if($result_get_stock['alert_type'] == 'โทรแจ้ง'){
   		$alert_1 = 'checked';
   		$alert_detail_1 = $result_get_stock['alert_detail'];
   	}elseif($result_get_stock['alert_type'] == 'ส่งไปรษณีย์'){
   		$alert_2 = 'checked';
   		$alert_detail_2 = $result_get_stock['alert_detail'];
   	}else{
   		$alert_3 = 'checked';
   		$alert_detail_3 = $result_get_stock['alert_detail'];
    }

    $check_cancel_date = '';
    $cancel_date = '';
    if($result_get_stock['cancel_date'] !== '0000-00-00'){
        $check_cancel_date = 'checked';
        $cancel_date = 'class="form-control singledate-getvalue" value="'.$result_get_stock['cancel_date'].'"';
    }else{
        $cancel_date = 'class="form-control singledate"';
    }
       
?>
<?php if($result_get_row == 0 || $result_get_row > 1){  ?>
    <div class="card">
        <div class="card-body">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php 
                if($result_get_row > 1){
                    echo "<strong>พบเลขกรมธรรม์ / ทะเบียนรถ / เลขรับแจ้ง / ชื่อผู้เอาประกัน  นี้ มีข้อมูลซ้ำกันมากกว่า 1 รายการ กรุณาตรวจสอบข้อมูลซ้ำได้ที่รายงาน !</strong> ";
                }else{
                    echo "<strong>ไม่พบเลขกรมธรรม์ / ทะเบียนรถ / เลขรับแจ้ง / ชื่อผู้เอาประกัน  นี้ในระบบ กรุณาตรวจสอบข้อมูลอีกครั้ง !</strong> ";
                }
                ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form method="post" action="main.php?page=miscellany-edit2">
                    <div class="form-row ">
                        <div class="form-group col-md-8">
                            <label>ค้นหาเลขกรมธรรม์ / ทะเบียนรถ / เลขรับแจ้ง / ชื่อผู้เอาประกัน เพื่อทำการดึงข้อมูล</label>
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" id="search" placeholder="ค้นหา... " value="<?=$getStockId?>" autofocus>
                                <div class="input-group-append">
                                <button class="btn btn-outline-info" type="submit" id="button-addon2"><i class="fas fa-search"></i> ค้นหา</button>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-4 pt-2" align="right">
                        <label> </label>
                            <a href="?page=miscellany-forms2" class="btn btn-block btn-secondary" role="button" > กลับไปหน้าเพิ่มฟอร์มเกี่ยวกับรถ <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php }else{ ?>
<div class="card">
    <div class="card-body">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>พบเลขกรมธรรม์ / ทะเบียนรถ / เลขรับแจ้ง / ชื่อผู้เอาประกัน  นี้ในระบบ!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
        </div>
        <form method="post" action="main.php?page=miscellany-edit2">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>ค้นหาเลขกรมธรรม์ / ทะเบียนรถ / เลขรับแจ้ง / ชื่อผู้เอาประกัน เพื่อทำการดึงข้อมูล</label>
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" id="search" placeholder="ค้นหา..." autofocus>
                            <div class="input-group-append">
                            <button class="btn btn-outline-info" type="submit" id="button-addon2"><i class="fas fa-search"></i> ค้นหา</button>
                            </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div>
                <button type="button" class="btn btn-success btn-lg" id="btn_addPayment4"><i class="fas fa-plus-square"></i> เพิ่มการรับชำระเงิน</button>

            </div>
            <div>
                <a href="?page=miscellany-forms2" class="btn btn-lg btn-secondary" role="button" > กลับไปหน้าเพิ่มฟอร์มเกี่ยวกับรถ <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>

<form method="post" action="menu-miscellany/submitedit2.php">
    <div class="card">
    <input type="hidden" name="getNo" id="getNo" value="<?=$result_get_stock['id']?>">
		<div class="card-header text-white bg-info">ข้อมูลกรมธรรม์ </div>
	  	<div class="card-body">
  			<div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>วันที่แจ้งประกันภัย</label>
			      	<div class="input-group">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="insure_date" class="form-control singledate-getvalue" value="<?=$result_get_stock['insure_date'] ?>">
				    </div>
			    </div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
			      	<label>ผู้รับแจ้ง</label>
			      	<div class="input-group">
		                <div class="input-group-prepend">
					        <div class="input-group-text">01999/</div>
				        </div>
				        <input type="text" name="inform_id" class="form-control" placeholder="ผู้รับแจ้ง" value="<?=substr($result_get_stock['inform_id'],6) ?>">
				    </div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ประเภทประกัน</label>
				    <input type="text" name="insure_type" class="form-control" placeholder="ประเภทประกัน" value="<?=$result_get_stock['insure_type'] ?>">
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-4">
			      	<label>เลขรับแจ้ง</label>
				    <input type="text" name="inform_code" class="form-control" placeholder="เลขรับแจ้ง" value="<?=$result_get_stock['inform_code'] ?>">
			    </div>
			    <div class="form-group col-md-2">
			      	<label>ระบุปี</label>
			      	<input type="text" name="year_stock" class="form-control" placeholder="ระบุปี" value="<?=$result_get_stock['year_stock'] ?>">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>เลขที่กรมธรรม์</label>
			      	<input type="text" name="stock_id" id="stock_id" class="form-control" placeholder="เลขที่กรมธรรม์" value="<?=$result_get_stock['stock_id'] ?>">
			    </div>
			</div>
		</div>
		<div class="card-header text-white bg-info">ข้อมูลผู้เอาประกัน</div>
	  	<div class="card-body">
			<div class="form-row">
  				<div class="form-group col-md-5">
			      	<label>ผู้เอาประกัน</label>
				    <input type="text" name="cus_name" class="form-control" placeholder="ผู้เอาประกัน" value="<?=$result_get_stock['cus_name'] ?>">
			    </div>
			    <div class="form-group col-md-5">
			      	<label>เลขที่บัตรประชาชน/เลขที่ประจำตัวผู้เสียภาษีอากร</label>
			      	<input type="text" name="cus_card_id" class="form-control" value="<?=$result_get_stock['cus_card_id'] ?>">
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-5">
			      	<label>อาชีพ</label>
				    <input type="text" name="cus_occupation" class="form-control" placeholder="อาชีพ" value="<?=$result_get_stock['cus_occupation'] ?>">
			    </div>
			    <div class="form-group col-md-3">
			      	<label>อายุ</label>
			      	<div class="input-group">
				        <input type="text" name="cus_age" class="form-control" value="<?=$result_get_stock['cus_age'] ?>">
				        <div class="input-group-prepend">
					        <div class="input-group-text">ปี</div>
				        </div>
				    </div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>วัน / เดือน / ปี  เกิด</label>
			      	<div class="input-group">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="birth_date" class="form-control" value="<?=$result_get_stock['birth_date'] ?>">
				    </div>
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>ที่อยู่ผู้เอาประกัน</label>
				    <textarea rows="3" placeholder="ระบุที่อยู่" name="cus_address1" class="form-control"><?=$result_get_stock['cus_address1'] ?></textarea>
			    </div>
			    <div class="form-group col-md-6">
			      	<label>สถานที่ตั้งหรือเก็บทรัพย์สินผู้เอาประกัน (ถ้ามี)</label>
				    <textarea rows="3" placeholder="ระบุที่อยู่" name="cus_address2" class="form-control"><?=$result_get_stock['cus_address2'] ?></textarea>
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>เบอร์โทร</label>
				    <input type="text" name="cus_tel" class="form-control" placeholder="เบอร์โทร" value="<?=$result_get_stock['cus_tel'] ?>">
			    </div>
			</div>
		</div>
		<div class="card-header text-white bg-info">ข้อมูลรถ</div>
	  	<div class="card-body">
			<div class="form-row">
				<div class="form-group col-md-6">
  					<label>ทะเบียนรถ</label>
  					<div class="row">
  						<div class="col-md-4">
  							<input type="text" name="car_number" class="form-control" placeholder="เลขทะเบียน" value="<?=$result_get_stock['car_number'] ?>">
  						</div>
  						<div class=" col-md-6">
					      	<select class="form-control selectOptions" name="car_province">
								<?php foreach ($result_province as $key => $value) { 
									if($result_get_stock['car_province'] == $value['PROVINCE_ID']){
										echo "<option value='".$value['PROVINCE_ID']."' selected='selected'>".$value['PROVINCE_NAME']."</option>";
									}
									echo "<option value='".$value['PROVINCE_ID']."'>".$value['PROVINCE_NAME']."</option>";
								} ?>
					      	</select>
					    </div>
  					</div>
			    </div>
			    <div class="form-group col-md-5">
			      	<label>ยี่ห้อรถ</label>
			      	<input type="text" name="car_brand" class="form-control" placeholder="ยี่ห้อรถ" value="<?=$result_get_stock['car_brand'] ?>">
			    </div>
			    <div class="form-group col-md-5">
			      	<label>รุ่นรถ</label>
			      	<input type="text" name="car_modal" class="form-control" placeholder="รุ่นรถ" value="<?=$result_get_stock['car_modal'] ?>">
			    </div>
			</div>
			<div class="form-row">
			    <div class="form-group col-md-3">
			      	<label>ปีรุ่น</label>
			      	<input type="text" class="form-control" name="car_year" placeholder="ปีรุ่น" value="<?=$result_get_stock['car_year'] ?>">
			    </div>
			    <div class="form-group col-md-3">
			      	<label>สีรถ</label>
			      	<input type="text" class="form-control" name="car_color" placeholder="สีรถ" value="<?=$result_get_stock['car_color'] ?>">
			    </div>
			    <div class="form-group col-md-6">
  					<label>ซีซี/นน.(ตัน)/ที่นั่ง</label>
  					<div class="row">
  						<div class="col-md-3">
  							<input type="text" name="car_cc_weight_seat[]" class="form-control" value="<?=$car_cc_weight_seat[0]?>">
  						</div>
  						<div class="col-md-3">
  							<input type="text" name="car_cc_weight_seat[]" class="form-control" value="<?=$car_cc_weight_seat[1]?>">
  						</div>
  						<div class="col-md-3">
  							<input type="text" name="car_cc_weight_seat[]" class="form-control" value="<?=$car_cc_weight_seat[2]?>">
  						</div>
  					</div>
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-5">
			      	<label>ตัวถังรถ</label>
			      	<input type="text" class="form-control" name="car_chassis" placeholder="ตัวถังรถ" value="<?=$result_get_stock['car_chassis'] ?>">
			    </div>
			    <div class="form-group col-md-5">
			      	<label>เลขเครื่องยนต์</label>
			      	<input type="text" class="form-control" name="car_body" placeholder="เลขเครื่องยนต์" value="<?=$result_get_stock['car_body'] ?>">
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-5">
			      	<label>ราคารถ</label>
			      	<div class="input-group">
				        <input type="text" class="form-control" name="car_price" placeholder="จำนวนเงิน" value="<?=$result_get_stock['car_price'] ?>">
				        <div class="input-group-prepend">
					        <div class="input-group-text">บาท</i></div>
				        </div>
				    </div>
			    </div>
			</div>
	  	</div>
		<div class="card-header text-white bg-info">เบี้ยประกัน</div>
	  	<div class="card-body">
            <div class="form-row">
			    <div class="form-group col-md-4">
			      	<label>วันเริ่มคุ้มครอง</label>
			      	<div class="input-group">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="save_date[]" class="form-control singledate-getvalue" value="<?=$save_date[0] ?>">
				    </div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>สิ้นสุด</label>
			      	<div class="input-group">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="save_date[]" class="form-control singledate-getvalue" value="<?=$save_date[1] ?>">
				    </div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>เวลา</label>
			      	<div class="input-group bootstrap-timepicker timepicker">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-clock"></i></div>
				        </div>
				        <input type="text" name="insure_time" class="form-control selecttimepicker" value="<?=$result_get_stock['insure_time'] ?>">
				    </div>
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-4">
			      	<label>ระยะเวลาประกันภัย</label>
			      	<div class="input-group">
				        <input type="text" class="form-control" name="insure_duration" value="<?=$result_get_stock['insure_duration'] ?>">
				        <div class="input-group-prepend">
					        <div class="input-group-text">ปี</i></div>
				        </div>
				    </div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ทุนประกันภัย</label>
			      	<div class="input-group">
				        <input type="text" class="form-control" name="insure_total" placeholder="จำนวนเงิน" value="<?=$result_get_stock['insure_total'] ?>">
				        <div class="input-group-prepend">
					        <div class="input-group-text">บาท</i></div>
				        </div>
				    </div>
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-4">
			      	<label>รหัสภัย (ถ้ามี)</label>
			      	<input type="text" class="form-control" name="insure_code" placeholder="รหัสภัย (ถ้ามี)" value="<?=$result_get_stock['insure_code'] ?>">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>เบี้ยสุทธิ</label>
			      	<input type="text" class="form-control" name="insure_net" placeholder="เบี้ยสุทธิ" value="<?=$result_get_stock['insure_net'] ?>">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ภาษี</label>
			      	<input type="text" class="form-control" name="insure_tax" placeholder="ภาษี" value="<?=$result_get_stock['insure_tax'] ?>">
			    </div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
			      	<label>อากร</label>
			      	<input type="text" class="form-control" name="insure_duty" placeholder="อากร" value="<?=$result_get_stock['insure_duty'] ?>">
			    </div>
  				<div class="form-group col-md-4">
			      	<label>เบี้ยรวม</label>
			      	<input type="text" class="form-control" name="insure_total2" placeholder="เบี้ยรวม" value="<?=$result_get_stock['insure_total2'] ?>">
			    </div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-5">
			      	<label>ผู้รับผลประโยชน์</label>
			      	<input type="text" class="form-control" name="insure_beneficiary" placeholder="ผู้รับผลประโยชน์" value="<?=$result_get_stock['insure_beneficiary'] ?>">
			    </div>
  				<div class="form-group col-md-5">
			      	<label>ความสัมพันธ์ผู้เอาประกัน</label>
			      	<input type="text" class="form-control" name="insure_ralationship_name" placeholder="ความสัมพันธ์ผู้เอาประกัน" value="<?=$result_get_stock['insure_ralationship_name'] ?>">
			    </div>
			</div>
			<div class="form-row">
	  			<div class="form-group col-md-12">
			      	<label>สถานะ</label>
			      	<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="insure_status" value="1" id="status1" <?=$insure_status1?>>
					  	<label class="form-check-label" for="status1">
					    	ต่ออายุ
					  	</label>
					  	<div class="row">
					  		<div class="col-5 my-2">
					  			<input type="text" class="form-control" name="insure_status_stock" placeholder="เลขที่กรมธรรม์" value="<?=$insure_status_stock?>">
					  		</div>
					  	</div>
					</div>
					<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="insure_status" value="2" id="status2" <?=$insure_status2?>>
					  	<label class="form-check-label" for="status2">
					    	ประกันใหม่
					  	</label>
					</div>
			    </div>
	  		</div>
	  		<div class="form-row">
	  			<div class="form-group col-md-12">
			      	<label>สถานะควบประกันภัย</label>
			      	<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="insure_status2" value="1" id="status1" <?=$insure_status2_1?>>
					  	<label class="form-check-label" for="status1">
					    	ควบ พรบ.
					  	</label>
					  	<div class="row">
					  		<div class="col-5 my-2">
					  			<input type="text" class="form-control" name="insure_status2_stock1" placeholder="เลขที่กรมธรรม์" value="<?=$insure_status2_stock1 ?>">
					  		</div>
					  	</div>
					</div>
					<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="insure_status2" value="2" id="status2" <?=$insure_status2_2?>>
					  	<label class="form-check-label" for="status2">
					    	ควบ สมัครใจ
					  	</label>
					  	<div class="row">
					  		<div class="col-5 my-2">
					  			<input type="text" class="form-control" name="insure_status2_stock2" placeholder="เลขที่กรมธรรม์" value="<?=$insure_status2_stock2 ?>">
					  		</div>
					  	</div>
					</div>
					<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="insure_status2" value="3" id="status3" <?=$insure_status2_3?>>
					  	<label class="form-check-label" for="status3">
					    	อื่นๆ
					  	</label>
					</div>
			    </div>
	  		</div>
	  		<div class="form-row">
	  			<div class="form-group col-md-12">
			      	<label>ประเภทลูกค้า</label>
			      	<div class="form-check mb-3 ">
					  	<input class="form-check-input " type="radio" name="cus_type" value="1" id="status1" <?=$cus_type1?>>
						<label class="form-check-label" for="cus_type1">
					    	VIP
					  	</label>
					  	<div class="row">
					  		<div class="col-5 my-2">
					  			<input type="text" class="form-control" name="cus_type_detail1" placeholder="ระบุชื่อ VIP / ห้างร้าน" value="<?=$cus_type_detail1?>">
					  		</div>
					  	</div>
					</div>
					<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="cus_type" value="0" id="cus_type2" <?=$cus_type0?>>
					  	<label class="form-check-label" for="cus_type2">
					    	ตัวแทน
					  	</label>
					  	<div class="row">
					  		<div class="col-5 my-2">
								<select class="form-control selectOptions" name="cus_type_detail2">
									<?php if($cus_type_detail2 == 'no'){
										echo "<option value='no' selected>โปรดเลือกตัวแทน</option>";
									}else{
										echo "<option value='no'>โปรดเลือกตัวแทน</option>";
									}
									foreach ($result_user as $key => $value) { 
										if($value['agent_id'] == $cus_type_detail2){
											echo "<option value='".$value['agent_id']."' selected>".$value['agent_id']." - ".$value['name']."</option>";
										}else{
											echo "<option value='".$value['agent_id']."'>".$value['agent_id']." - ".$value['name']."</option>";
										}
									} ?>
								</select>
					  		</div>
					  	</div>
					</div>
					<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="cus_type" value="2" id="status2" <?=$cus_type2?>>
					  	<label class="form-check-label" for="status2">
					    	ลูกค้าทั่วไป
					  	</label>
					</div>
			    </div>
	  		</div>
	  	</div>
	  	<div class="card-header text-white bg-info">วันที่กรมธรรม์</div>
	  	<div class="card-body">
	  		<div class="form-row">
	  			<div class="form-group col-md-4">
			      	<label>วันที่ทำกรมธรรม์</label>
			      	<div class="input-group">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="stock_date" class="form-control singledate-getvalue" value="<?=$result_get_stock['stock_date'] ?>">
				    </div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>วันที่ออกกรมธรรม์</label>
			      	<div class="input-group">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="create_stock_date" class="form-control singledate-getvalue" value="<?=$result_get_stock['create_stock_date'] ?>">
				    </div>
			    </div>
	  		</div>
	  		<div class="form-row">
	  			<div class="form-group col-md-12">
			      	<label>แจ้งเตือนลูกค้าเมื่อกรมธรรม์ออก</label>
			      	<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="alert_type" value="โทรแจ้ง" id="alert1" <?=$alert_1?>>
					  	<label class="form-check-label" for="alert1">
					    	โทรแจ้ง
					  	</label>
					  	<div class="row">
					  		<div class="col-6 my-2">
					  			<textarea rows="2" placeholder="หมายเหตุ" class="form-control" name="alert_detail1"><?=$alert_detail_1?></textarea>
					  		</div>
					  	</div>
					</div>
					<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="alert_type" value="ส่งไปรษณีย์" id="alert2" <?=$alert_2?>>
					  	<label class="form-check-label" for="alert2">
					    	ส่งไปรษณีย์
					  	</label>
					  	<div class="row">
					  		<div class="col-6 my-2">
					  			<textarea rows="2" placeholder="หมายเหตุ" class="form-control" name="alert_detail2"><?=$alert_detail_2?></textarea>
					  		</div>
					  	</div>
					</div>
					<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="alert_type" value="อื่นๆ" id="alert3" <?=$alert_3?>>
					  	<label class="form-check-label" for="alert3">
					    	อื่นๆ
					  	</label>
					  	<div class="row">
					  		<div class="col-6 my-2">
					  			<textarea rows="2" placeholder="หมายเหตุ" class="form-control" name="alert_detail3"><?=$alert_detail_3?></textarea>
					  		</div>
					  	</div>
					</div>
			    </div>
	  		</div>
			<div class="form-row">
	  			<div class="form-group col-md-6">
			      	<label>วันที่แจ้งยกเลิก</label>
			      	<div class="input-group">
					  	<div class="input-group-prepend">
					    	<div class="input-group-text">
					    		<input type="checkbox" name="check_cancel_date" id="check_cancel_date" value="check_cancel_date" <?=$check_cancel_date?> >
					    	</div>
					  	</div>
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="cancel_date" id="cancel_date" <?=$cancel_date?> disabled>
				    </div>
			    </div>
				<div class="form-group col-md-8">
			      	<label>สาเหตุการยกเลิก</label>
			      	<textarea rows="2" placeholder="สาเหตุการยกเลิก" class="form-control" name="cancel_detail"><?=$result_get_stock['cancel_detail'] ?></textarea>
			    </div>
			</div>
	  	</div>
        <div class="card-body" align="center">
			<button type="submit" id="btn_submit" class="btn btn-success btn-lg px-4">บันทึกการแก้ไข</button>
		</div>
    </div>
</form>

<?php 

include 'payment_disabled.php'; 
include 'modal_add_payment.php';
?>
<?php } ?>