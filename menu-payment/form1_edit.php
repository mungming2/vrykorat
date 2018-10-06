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
	

	$sql_get_stock = "SELECT  no, index_id, year_stock, stock_id, stock_type, inform_id, cus_title, cus_firstname, cus_lastname, cus_type, cus_card_id, cus_address, cus_tel, cus_type2, cus_detail, cus_status, cus_status_stock, car_id, car_number, car_province, car_cc_weight_seat, car_brand, car_color, car_chassis, car_body, insure_type, insure_date, DATE_FORMAT(insure_time,'%H:%i') AS insure_time, insure_total1, insure, insure_net, insure_duty, insure_tex, insure_total2, stock_date, tex_date, receive_date, payment_date, cancel_date, create_date, account_date, cus_pay_date, clear_date , cancel_detail
	FROM insure_payment WHERE stock_id = '$getStockId' or car_number = '$getStockId'";
	$query_get_stock = mysqli_query($conn,$sql_get_stock);
	$result_get_row = mysqli_num_rows($query_get_stock);
    $result_get_stock = mysqli_fetch_array($query_get_stock,MYSQLI_ASSOC);

    $sql_payment = "SELECT DISTINCT(count) AS count FROM payment WHERE stock_id = '".$result_get_stock['stock_id']."' AND form_type = '1' ORDER BY count ASC";
    $query_payment = mysqli_query($conn,$sql_payment);
    $result_payment = mysqli_fetch_all($query_payment,MYSQLI_ASSOC);

    $edit_index_id = $result_get_stock['index_id'];

    $car_cc_weight_seat = explode('/', $result_get_stock['car_cc_weight_seat']);

   	$address = explode('//', $result_get_stock['cus_address']);

   	if(count($address) <= 1){
   		$address = explode(' ', $result_get_stock['cus_address']);
   	}

   	$insure_date = explode('ถึง', $result_get_stock['insure_date']);

   	$check_receive_payment = '';
   	$check_payment_date = '';
   	$check_cancel_date = '';
   	$check_create_date = '';
   	

   	if($result_get_stock['receive_date'] !== '0000-00-00'){
   		$check_receive_payment = 'checked';
   	}else{
		$result_get_stock['receive_date'] = '';
   	}
   	if($result_get_stock['payment_date'] !== '0000-00-00'){
   		$check_payment_date = 'checked';
   	}else{
		$result_get_stock['payment_date'] = '';
   	}
   	if($result_get_stock['cancel_date'] !== '0000-00-00'){
   		$check_cancel_date = 'checked';
   	}else{
		$result_get_stock['cancel_date'] = '';
   	}
   	if($result_get_stock['create_date'] !== '0000-00-00'){
   		$check_create_date = 'checked';
   	}else{
		$result_get_stock['create_date'] = '';
   	}

   	$insure_type1 = '';
   	$insure_type2 = '';

   	if($result_get_stock['insure_type'] == 0){
   		$insure_type1 = 'checked';
   	}else{
   		$insure_type2 = 'checked';
   	}

   	$cus_type_1 = '';
   	$cus_type_2 = '';

   	if($result_get_stock['cus_type'] == 'บุคคลทั่วไป'){
   		$cus_type_1 = "selected='selected'";
   	}else{
   		$cus_type_2 = "selected='selected'";
   	}

   	$stock_type_1 = '';
   	$stock_type_2 = '';

   	if($result_get_stock['stock_type'] == 'ใหม่'){
   		$stock_type_1 = "selected='selected'";
   	}else{
   		$stock_type_2 = "selected='selected'";
   	}

   	$cus_type2_1 = '';
   	$cus_type2_2 = '';
   	$cus_detail_1 = '';
   	$cus_detail_2 = '';
   	$cus_type2_3 = '';

   	if($result_get_stock['cus_type2'] == 'vip'){
   		$cus_type2_1 = 'checked';
   		$cus_detail_1 = $result_get_stock['cus_detail'];
   	}elseif($result_get_stock['cus_type2'] == 'ตัวแทน'){
   		$cus_type2_2 = 'checked';
   		$cus_detail_2 = $result_get_stock['cus_detail'];
   	}else{
   		$cus_type2_3 = 'checked';
   	}

   	$cus_status_yes = '';
   	$cus_status_no = '';

   	if($result_get_stock['cus_status'] == 'yes'){
   		$cus_status_yes = 'checked';
   	}else{
   		$cus_status_no = 'checked';
   	}




    $sql_user = "SELECT agent_id, name FROM agent ORDER BY agent_id ASC";
    $query_user = mysqli_query($conn,$sql_user);
    $result_user = mysqli_fetch_all($query_user,MYSQLI_ASSOC);
	
    $sql_code = "SELECT code, name, surname FROM user_code";
    $query_code = mysqli_query($conn,$sql_code);
    $result_code = mysqli_fetch_all($query_code,MYSQLI_ASSOC);

    $sql_car = "SELECT id, code, type, name FROM car_code ORDER BY code ASC";
    $query_car = mysqli_query($conn,$sql_car);
    $result_car = mysqli_fetch_all($query_car,MYSQLI_ASSOC);

    $sql_province = "SELECT PROVINCE_ID, PROVINCE_NAME FROM province";
    $query_province = mysqli_query($conn,$sql_province);
    $result_province = mysqli_fetch_all($query_province,MYSQLI_ASSOC);	
?>

<?php if($result_get_row == 0){  ?>
	<div class="card">
		<div class="card-body">
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<?php 
				if($result_get_row > 1){
					echo "<strong>พบเลขกรมธรรม์ / ทะเบียนรถ นี้ มีข้อมูลซ้ำกันมากกว่า 1 รายการ กรุณาตรวจสอบข้อมูลซ้ำได้ที่รายงาน !</strong> ";
				}else{
					echo "<strong>ไม่พบเลขกรมธรรม์ / ทะเบียนรถ นี้ในระบบ กรุณาตรวจสอบข้อมูลอีกครั้ง !</strong>  ";
				}
			?>
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    	<span aria-hidden="true">&times;</span>
			  	</button>
			</div>
			<form method="post" action="main.php?page=payment-edit1">
	  			<div class="form-row ">
	  				<div class="form-group col-md-8">
				      	<label>ค้นหาเลขกรมธรรม์ / ทะเบียนรถ เพื่อทำการดึงข้อมูล</label>
				      	<div class="input-group">
				      		<input type="text" name="search" class="form-control" id="search" placeholder="ค้นหา..." value="<?=$getStockId?>" autofocus>
				      		<div class="input-group-append">
						    	<button class="btn btn-outline-info" type="submit" id="button-addon2"><i class="fas fa-search"></i> ค้นหา</button>
						  	</div>
						</div>
				    </div>
				    <div class="col-md-4 pt-2" align="right">
				    	<label> </label>
				      	<a href="?page=payment-forms1" class="btn btn-block btn-secondary" role="button" > กลับไปหน้าเพิ่มฟอร์ม พรบ. <i class="fas fa-arrow-right"></i></a>
				    </div>
				</div>
			</form>
			
		</div>
	</div>
<?php }else{ ?>

<div class="card">
	<div class="card-body">
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		  	<strong>พบเลขกรมธรรม์ / ทะเบียนรถ นี้ในระบบ!</strong> 
		  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    	<span aria-hidden="true">&times;</span>
		  	</button>
		</div>
		<form method="post" action="main.php?page=payment-edit1">
  			<div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>ค้นหาเลขกรมธรรม์ / ทะเบียนรถ เพื่อทำการดึงข้อมูล</label>
			      	<div class="input-group">
			      		<input type="text" name="search" class="form-control" id="search" placeholder="ค้นหา... " value="<?=$getStockId?>" autofocus>
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
				<button type="button" class="btn btn-success btn-lg" id="btn_addPayment1"><i class="fas fa-plus-square"></i> เพิ่มการรับชำระเงิน</button>
			</div>
			<div>
				<a href="?page=payment-forms1" class="btn btn-lg btn-secondary" role="button" > กลับไปหน้าเพิ่มฟอร์ม พรบ. <i class="fas fa-arrow-right"></i></a>
			</div>
		</div>
	</div>
</div>

<form method="post" action="menu-payment/submitedit.php?forms=update1&no=<?=$result_get_stock['no']?>">
	<div class="card">
		<div class="card-header text-white bg-info">ข้อมูลกรมธรรม์ </div>
	  	<div class="card-body">
  			<div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>เลขที่เอกสาร<span class="text-danger">*</span></label>
			      	<input type="text" name="index_id" class="form-control" id="index_id" placeholder="เลขที่เอกสาร" data-validation="required" data-validation-error-msg=" " value="<?=$result_get_stock['index_id'] ?>">
			      	<div id="check_id"></div>
			    </div>
			    <div class="form-group col-md-6">
			      	<label>รับแจ้งโดย<span class="text-danger">*</span></label>
			      	<input type="text" name="inform_id" class="form-control" placeholder="รับแจ้งโดย" data-validation="required" data-validation-error-msg=" " value="<?=$result_get_stock['inform_id'] ?>">
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-4">
			      	<label>ประเภทกรมธรรม์</label>
			      	<select class="form-control" name="stock_type">
			      		<option value="ใหม่"  <?=$stock_type_1?>>ใหม่</option>
			      		<option value="ต่ออายุ" <?=$stock_type_2?>>ต่ออายุ</option>
			      	</select>
			    </div>
			    <div class="form-group col-md-2">
			      	<label>ระบุปี<span class="text-danger">*</span></label>
			      	<input type="text" name="year_stock" class="form-control" placeholder="ระบุปี" data-validation="required" data-validation-error-msg=" " value="<?=$result_get_stock['year_stock'] ?>">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>เลขที่กรมธรรม์<span class="text-danger">*</span></label>
			      	<input type="text" name="stock_id" id="stock_id" class="form-control" placeholder="เลขที่กรมธรรม์" data-validation="required" data-validation-error-msg=" " value="<?=$result_get_stock['stock_id'] ?>">
			    </div>
			</div>
	  	</div>
	  	<div class="card-header text-white bg-info">ข้อมูลผู้เอาประกัน</div>
	  	<div class="card-body">
  			<div class="form-row">
  				<div class="form-group col-md-12">
  					<label>ผู้เอาประกัน<span class="text-danger">*</span></label>
  					<div class="row">
  						<div class="col-md-3">
  							<select name="cus_title" class="form-control selectOptions">
  								<option value="<?=$result_get_stock['cus_title'] ?>" selected="selected"><?=$result_get_stock['cus_title'] ?></option>
  								<?php include 'select_title.php'; ?>
  							</select>
  						</div>
  						<div class=" col-md-4">
					      	<input type="text" name="cus_firstname" class="form-control" placeholder="ชื่อ" data-validation="required" data-validation-error-msg=" " value="<?=$result_get_stock['cus_firstname'] ?>">
					    </div>
					    <div class="col-md-4">
					      	<input type="text" name="cus_lastname" class="form-control" placeholder="นามสกุล" data-validation="required" data-validation-error-msg=" " value="<?=$result_get_stock['cus_lastname'] ?>">
					    </div>
  					</div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ประเภท</label>
			      	<select class="form-control" name="cus_type">
			      		<option value="บุคคลทั่วไป" <?=$cus_type_1?>>บุคคลทั่วไป</option>
			      		<option value="นิติบุคคล" <?=$cus_type_2?>>นิติบุคคล</option>
			      	</select>
			    </div>
			    <div class="form-group col-md-6">
			      	<label>เลขที่บัตรประชาชน/เลขที่ประจำตัวผู้เสียภาษีอากร<span class="text-danger">*</span></label>
			      	<input type="text" name="cus_card_id" class="form-control" data-validation="required" data-validation-error-msg=" " value="<?=$result_get_stock['cus_card_id'] ?>">
			    </div>
			    <div class="w-100"></div>
			    <div class="form-group col-md-4">
			      	<label>บ้านเลขที่<span class="text-danger">*</span></label>
			      	<input type="text" name="cus_address[]" class="form-control" placeholder="บ้านเลขที่" data-validation="required" data-validation-error-msg=" " value="<?=$address[0] ?>">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ตึก/หมู่บ้าน</label>
			      	<input type="text" name="cus_address[]" class="form-control" placeholder="ตึก/หมู่บ้าน" value="<?=$address[1] ?>">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>หมู่ที่</label>
			      	<input type="text" name="cus_address[]" class="form-control" placeholder="หมู่ที่" value="<?=$address[2] ?>">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ตรอก</label>
			      	<input type="text" name="cus_address[]" class="form-control" placeholder="ตรอก" value="<?=$address[3] ?>">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ซอย</label>
			      	<input type="text" name="cus_address[]" class="form-control" placeholder="ซอย" value="<?=$address[4] ?>">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ถนน<span class="text-danger">*</span></label>
			      	<input type="text" name="cus_address[]" class="form-control" placeholder="ถนน" data-validation="required" data-validation-error-msg=" " value="<?=$address[5] ?>">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ตำบล<span class="text-danger">*</span></label>
			      	<input type="text" name="cus_address[]" class="form-control" placeholder="ตำบล" data-validation="required" data-validation-error-msg=" " value="<?=$address[6] ?>">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>อำเภอ<span class="text-danger">*</span></label>
			      	<input type="text" name="cus_address[]" class="form-control" placeholder="อำเภอ" data-validation="required" data-validation-error-msg=" " value="<?=$address[7] ?>">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>จังหวัด<span class="text-danger">*</span></label>
			      	<select class="form-control selectOptions" name="cus_address[]">
						<?php foreach ($result_province as $key => $value) { 
							if($address[8] == $value['PROVINCE_ID']){
								echo "<option value='".$value['PROVINCE_ID']."' selected='selected'>".$value['PROVINCE_NAME']."</option>";
							}
							echo "<option value='".$value['PROVINCE_ID']."'>".$value['PROVINCE_NAME']."</option>";
						} ?>
			      	</select>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>รหัสไปรษณีย์</label>
			      	<input type="text" name="cus_address[]" class="form-control" placeholder="รหัสไปรษณีย์" value="<?=$address[9] ?>">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>เบอร์โทรศัพท์</label>
			      	<input type="text" name="cus_tel" class="form-control" placeholder="เบอร์โทรศัพท์" value="<?=$result_get_stock['cus_tel'] ?>">
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>ประเภทลูกค้า<span class="text-danger">*</span></label>
			      	<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="cus_type2" value="vip" id="cus_type21" <?=$cus_type2_1?>>
					  	<label class="form-check-label" for="cus_type21">
					    	VIP
					  	</label>
					  	<div class="row">
					  		<div class="col-12 my-2">
					  			<input type="text" class="form-control" name="cus_detail1" placeholder="บริษัท / ห้างร้าน / ตัวแทน" value="<?=$cus_detail_1?>">
					  		</div>
					  	</div>
					</div>
					<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="cus_type2" value="ตัวแทน" id="cus_type22" <?=$cus_type2_2?>>
					  	<label class="form-check-label" for="cus_type22">
					    	ตัวแทน
					  	</label>
					  	<div class="row">
					  		<div class="col-12 my-2">
								<select class="form-control selectOptions" name="cus_detail2">
									<?php if($cus_detail_2 == 'no'){
										echo "<option value='no' selected>โปรดเลือกตัวแทน</option>";
									}else{
										echo "<option value='no'>โปรดเลือกตัวแทน</option>";
									}
									foreach ($result_user as $key => $value) { 
										if($value['agent_id'] == $cus_detail_2){
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
					  	<input class="form-check-input" type="radio" name="cus_type2" value="ทั่วไป" id="cus_type23" <?=$cus_type2_3?>>
					  	<label class="form-check-label" for="cus_type23">
					    	ทั่วไป
					  	</label>
					</div>
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>สถานะควบภาคสมัครใจ<span class="text-danger">*</span></label>
			      	<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="cus_status" value="yes" id="cus_status1" <?=$cus_status_yes?>>
					  	<label class="form-check-label" for="cus_status1">
					    	ควบสมัครใจ
					  	</label>
					  	<div class="row">
					  		<div class="col-12 my-2">
					  			<input type="text" class="form-control" name="cus_status_stock" placeholder="ระบุเลขกรมธรรม์ / เลขรับแจ้ง" value="<?=$result_get_stock['cus_status_stock']?>">
					  		</div>
					  	</div>
					</div>
					<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="cus_status" value="no" id="cus_status3" <?=$cus_status_no?>>
					  	<label class="form-check-label" for="cus_status3">
					    	ไม่ควบสมัครใจ
					  	</label>
					</div>
			    </div>
			</div>
	  	</div>
	  	<div class="card-header text-white bg-info">ข้อมูลรถ</div>
	  	<div class="card-body">
	  		<div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>รหัสรถ<span class="text-danger">*</span></label>
			      	<select class="form-control selectOptions" name="car_id">
						<?php foreach ($result_car as $key => $value) { 
							if($result_get_stock['car_id'] == $value['id']){
								echo "<option value='".$value['id']."' selected='selected'>".$value['code']." - ".$value['type'].$value['name']."</option>";
							}
							echo "<option value='".$value['id']."'>".$value['code']." - ".$value['type'].$value['name']."</option>";
						} ?>
			      	</select>
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-6">
  					<label>ทะเบียนรถ<span class="text-danger">*</span></label>
  					<div class="row">
  						<div class="col-md-4">
  							<input type="text" name="car_number" class="form-control" placeholder="เลขทะเบียน" data-validation="required" data-validation-error-msg=" " value="<?=$result_get_stock['car_number'] ?>">
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
			    <div class="form-group col-md-6">
  					<label>ซีซี/นน.(ตัน)/ที่นั่ง</label>
  					<div class="row">
  						<div class="col-md-3">
  							<input type="text" name="car_cc_weight_seat[]" class="form-control" placeholder="ซีซี" value="<?=$car_cc_weight_seat[0]?>">
  						</div>
  						<div class="col-md-3">
  							<input type="text" name="car_cc_weight_seat[]" class="form-control" placeholder="นน.(ตัน)" value="<?=$car_cc_weight_seat[1]?>">
  						</div>
  						<div class="col-md-3">
  							<input type="text" name="car_cc_weight_seat[]" class="form-control" placeholder="ที่นั่ง" value="<?=$car_cc_weight_seat[2]?>">
  						</div>
  					</div>
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>ยี่ห้อรถ<span class="text-danger">*</span></label>
			      	<input type="text" name="car_brand" class="form-control" data-validation="required" data-validation-error-msg=" " value="<?=$result_get_stock['car_brand'] ?>">
			    </div>
			    <div class="form-group col-md-6">
			      	<label>สีรถ<span class="text-danger">*</span></label>
			      	<input type="text" class="form-control" name="car_color" placeholder="สีรถ" data-validation="required" data-validation-error-msg=" " value="<?=$result_get_stock['car_color'] ?>">
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>ตัวถังรถ<span class="text-danger">*</span></label>
			      	<input type="text" class="form-control" name="car_chassis" placeholder="ตัวถังรถ" data-validation="required" data-validation-error-msg=" " value="<?=$result_get_stock['car_chassis'] ?>">
			    </div>
			    <div class="form-group col-md-6">
			      	<label>เลขเครื่องยนต์</label>
			      	<input type="text" class="form-control" name="car_body" placeholder="เลขเครื่องยนต์" value="<?=$result_get_stock['car_body'] ?>">
			    </div>
			</div>
	  	</div>
	  	<div class="card-header text-white bg-info">เบี้ยประกัน</div>
	  	<div class="card-body">
	  		<div class="form-row">
  				<div class="form-group col-md-4">
			      	<label>ระยะเวลาประกันภัย</label>
			      	<div class="w-100"></div>
			      	<div class="form-check form-check-inline">
					  	<input type="radio" id="insure1" name="insure_type" value="1" class="form-check-input" <?=$insure_type1 ?>>
					  	<label class="form-check-label" for="insure1">1 ปี</label>
					</div>
					<div class="form-check form-check-inline">
					  	<input type="radio" id="insure2" name="insure_type" value="0" class="form-check-input" <?=$insure_type2 ?>>
					  	<label class="form-check-label" for="insure2">น้อยกว่าหรือมากกว่า 1 ปี</label>
					</div>
			    </div>
			    <div class="form-group col-md-6">
			      	<label></label>
			      	<div class="w-100"></div>
			      	<button class="btn btn-success px-4">คำนวณ</button>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ตั้งแต่</label>
			      	<div class="input-group">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="insure_date[]" class="form-control singledate-getvalue" value="<?=$insure_date[0]?>">
				    </div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ถึง</label>
			      	<div class="input-group">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="insure_date[]" class="form-control singledate-getvalue" value="<?=$insure_date[1]?>">
				    </div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>เวลา</label>
			      	<div class="input-group bootstrap-timepicker timepicker">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-clock"></i></div>
				        </div>
				        <input type="text" name="insure_time" class="form-control selecttimepicker" value="<?=$result_get_stock['insure_time']?>">
				    </div>
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-4">
			      	<label>รวมจำนวนวัน</label>
			      	<div class="input-group">
				        <input type="text" class="form-control" name="insure_total1" placeholder="รวมจำนวนวัน" value="<?=$result_get_stock['insure_total1'] ?>">
				        <div class="input-group-prepend">
					        <div class="input-group-text">วัน</i></div>
				        </div>
				    </div>
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-4">
			      	<label>เบี้ยประกัน</label>
			      	<input type="text" class="form-control" name="insure" placeholder="เบี้ยประกัน" value="<?=$result_get_stock['insure'] ?>">
			    </div>
			    <!-- <div class="form-group col-md-4">
			      	<label>ส่วนลด</label>
			      	<input type="text" class="form-control" name="insure_discount" placeholder="ส่วนลด" value="<?=$result_get_stock['insure_discount'] ?>">
			    </div> -->
			    <div class="form-group col-md-4">
			      	<label>เบี้ยสุทธิ</label>
			      	<input type="text" class="form-control" name="insure_net" placeholder="เบี้ยสุทธิ" value="<?=$result_get_stock['insure_net'] ?>">
			    </div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
			      	<label>อากร</label>
			      	<input type="text" class="form-control" name="insure_duty" placeholder="อากร" value="<?=$result_get_stock['insure_duty'] ?>">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ภาษี</label>
			      	<input type="text" class="form-control" name="insure_tex" placeholder="ภาษี" value="<?=$result_get_stock['insure_tex'] ?>">
			    </div>
  				<div class="form-group col-md-4">
			      	<label>เบี้ยรวม</label>
			      	<input type="text" class="form-control" name="insure_total2" placeholder="เบี้ยรวม" value="<?=$result_get_stock['insure_total2'] ?>">
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
			      	<label>วันที่เสียภาษี</label>
			      	<div class="input-group">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="tex_date" class="form-control singledate-getvalue" value="<?=$result_get_stock['tex_date'] ?>">
				    </div>
			    </div>
	  		</div>
	  		<div class="form-row">
			    <div class="form-group col-md-4">
  					<label>วันที่รับเงิน</label>
  					<div class="row">
  						<div class="col-md-12">
  							<div class="input-group">
  								<div class="input-group-prepend">
							    	<div class="input-group-text">
							    		<input type="checkbox" name="defaultCheck1" id="defaultCheck1" value="defaultCheck1" <?=$check_receive_payment?>>
							    	</div>
							  	</div>
				                <div class="input-group-prepend">
							        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
						        </div>
						        <input type="text" name="receive_date" id="receive_date" class="form-control singledate-getvalue" value="<?=$result_get_stock['receive_date'] ?>" disabled>
						    </div>
  						</div>
  					</div>
			    </div>
	  		</div>
	  		<div class="form-row" id="distext6">
	  			<div class="form-group col-md-4">
			      	<label>วันที่ตัดชำระ</label>
			      	<div class="input-group">
			      		<div class="input-group-prepend">
					    	<div class="input-group-text">
					    		<input type="checkbox" name="check_payment_date" id="check_payment_date" value="check_payment_date" <?=$check_payment_date?>>
					    	</div>
					  	</div>
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="payment_date" id="payment_date" class="form-control singledate-getvalue" value="<?=$result_get_stock['payment_date'] ?>" disabled>
				    </div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>วันที่ยกเลิก</label>
			      	<div class="input-group">
			      		<div class="input-group-prepend">
					    	<div class="input-group-text">
					    		<input type="checkbox" name="check_cancel_date" id="check_cancel_date" value="check_cancel_date" <?=$check_cancel_date?>>
					    	</div>
					  	</div>
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="cancel_date" id="cancel_date" class="form-control singledate-getvalue" value="<?=$result_get_stock['cancel_date'] ?>" disabled>
				    </div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>วันที่บันทึกข้อมูล</label>
			      	<div class="input-group">
			      		<div class="input-group-prepend">
					    	<div class="input-group-text">
					    		<input type="checkbox" name="check_create_date" id="check_create_date" value="check_create_date" <?=$check_create_date?>>
					    	</div>
					  	</div>
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="create_date" id="create_date" class="form-control singledate-getvalue" value="<?=$result_get_stock['create_date'] ?>" disabled>
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

	foreach ($result_payment as $key_payment => $value_payment) { 
		$sql_payment2 = "SELECT id, count, form_type, total_amount, discount, tax_deductions, balance, payment_type, type, bank, bank_branch, total, payment_number, payment_date, cheque_date, card_type1, card_type2, exp_date, name, relation_name, tel, arrears, bill_no, refer_no, due_date, pay_amount, deadline_amount, period, remark, create_date, account_date, cus_pay_date, clear_date
	    FROM payment WHERE stock_id = '".$result_get_stock['stock_id']."' AND count = '".$value_payment['count']."' AND form_type = '1'";
	    $query_payment2 = mysqli_query($conn,$sql_payment2);
	    $query_payment3 = mysqli_query($conn,$sql_payment2);
	    $result_payment2 = mysqli_fetch_array($query_payment2,MYSQLI_ASSOC);
	    $result_payment3 = mysqli_fetch_all($query_payment3,MYSQLI_ASSOC);

	    $type1 = "";
	    $type2 = "";

	    $check_arrears = '';
		$arrears = '';
		$bill_no = $result_payment2['bill_no'];


	    if($result_payment2['type'] == 1){
	    	$type1 = "checked";
	    }elseif($result_payment2['type'] == 2){
	    	$type2 = "checked";
	    }
	    if(!empty($result_payment2['arrears'])){
			$check_arrears = 'checked';
			$arrears = $result_payment2['arrears'];
			
		}

	    $payment_type1 = '';
	    $payment_type2 = '';
	    $payment_type3 = '';
	    $payment_type4 = '';

	    $total1 = '';
	    $total2 = '';
	    $total3 = '';
	    $total4 = '';

	    $bank2 = '';
	    $bank3 = '';
	    $bank4 = '';

	    $bank_branch = '';

	    $payment_number2 = '';
	    $payment_number4 = '';

	    $cheque_date = '';

	    $exp_date = '';
		$name = '';
		$relation_name = '';
		$tel = '';

		$platinum = '';
		$titanium = '';

		$visa = '';
		$mastercard = '';
		$jcb = '';
		$americanexpress = '';
		$dinersclub = '';
		$get_id = array();

		$check_account_date = '';
		$check_cus_pay_date = '';
		$check_clear_date = '';
		$check_installments_deadline_date = '';
		$check_pay_date = '';

		if($result_payment2['account_date'] !== '0000-00-00' && !empty($result_payment2['account_date'])){
			$check_account_date = 'checked';
			$account_date = $result_payment2['account_date'];
			$account_date = 'class="form-control singledate-getvalue" value="'.$result_payment2['account_date'].'"';
		}else{
			$account_date = 'class="form-control singledate"';
		}
		if($result_payment2['cus_pay_date'] !== '0000-00-00' && !empty($result_payment2['cus_pay_date'])){
			$check_cus_pay_date = 'checked';
			$cus_pay_date = 'class="form-control singledate-getvalue" value="'.$result_payment2['cus_pay_date'].'"';
		}else{
			$cus_pay_date = 'class="form-control singledate"';
		}
		if($result_payment2['clear_date'] !== '0000-00-00' && !empty($result_payment2['clear_date'])){
			$check_clear_date = 'checked';
			$clear_date = 'class="form-control singledate-getvalue" value="'.$result_payment2['clear_date'].'"';
		}else{
			$clear_date = 'class="form-control singledate"';
		}
		if($result_payment2['due_date'] !== '0000-00-00'){
			$check_installments_deadline_date = 'checked';
			$installments_deadline_date = 'class="form-control singledate-getvalue" value="'.$result_payment2['due_date'].'"';
		}else{
			$installments_deadline_date = 'class="form-control singledate"';
		}
		if($result_payment2['payment_date'] !== '0000-00-00'){
			$check_pay_date = 'checked';
			$installments_pay_date = 'class="form-control singledate-getvalue" value="'.$result_payment2['payment_date'].'"';
		}else{
			$installments_pay_date = 'class="form-control singledate"';
		}

		

	    foreach ($result_payment3 as $key => $value_payment3) {
	    	$get_id[$key] = $value_payment3['id'];
	    	if($value_payment3['payment_type'] == 1){
	    		$payment_type1 = 'checked';
	    		$total1 = $value_payment3['total'];
	    	}elseif($value_payment3['payment_type'] == 2){
	    		$payment_type2 = 'checked';
	    		$bank2 = $value_payment3['bank'];
	    		$bank_branch = $value_payment3['bank_branch'];
	    		$payment_number2 = $value_payment3['payment_number'];
	    		$total2 = $value_payment3['total'];
	    		$cheque_date = $value_payment3['cheque_date'];
	    	}elseif($value_payment3['payment_type'] == 3){
	    		$payment_type3 = 'checked';
	    		$bank3 = $value_payment3['bank'];
	    		$total3 = $value_payment3['total'];
	    	}elseif($value_payment3['payment_type'] == 4){
	    		$payment_type4 = 'checked';
	    		$bank4 = $value_payment3['bank'];
	    		$payment_number4 = $value_payment3['payment_number'];
	    		$total4 = $value_payment3['total'];
	    		$exp_date = $value_payment3['exp_date'];
	    		$name = $value_payment3['name'];
	    		$relation_name = $value_payment3['relation_name'];
	    		$tel = $value_payment3['tel'];
	    		if($value_payment3['card_type1'] == 'Platinum'){
	    			$platinum = "checked";
	    		}elseif($value_payment3['card_type1'] == 'Titanium'){
	    			$titanium = "checked";
	    		}
	    		if($value_payment3['card_type2'] == 'visa'){
	    			$visa = "checked";
	    		}elseif($value_payment3['card_type2'] == 'mastercard'){
	    			$mastercard = "checked";
	    		}elseif($value_payment3['card_type2'] == 'jcb'){
	    			$jcb = "checked";
	    		}elseif($value_payment3['card_type2'] == 'americanexpress'){
	    			$americanexpress = "checked";
	    		}elseif($value_payment3['card_type2'] == 'dinersclub'){
	    			$dinersclub = "checked";
	    		}
	    	}
	    }
	    $show_id = implode(',', $get_id);
	    $getMsg = "คุณต้องการลบข้อมูลการชำระเงินเลขที่เอกสาร ".$result_get_stock['stock_id']." การชำระเงินครั้งที่  ".$value_payment['count']." ใช่หรือไม่?";
?>

<div class="card">
  	<div class="card-header text-white bg-primary d-flex justify-content-between">
	  	<div class="d-flex align-items-center">รับชำระเงิน ( ข้อมูลการชำระเงินครั้งที่  <?=$value_payment['count']?> )</div>
	  	<div>
	  		<button class="btn btn-warning shadow px-4" data-toggle="modal" data-target="#editModal<?=$key_payment?>"><i class="far fa-edit px-2"></i> แก้ไขการรับชำระเงินนี้</button>
	  		<a href="menu-payment/submitedit.php?forms=deletePayment&stock_id=<?=$result_get_stock['stock_id']?>&count=<?=$value_payment['count'] ?>&form=1" class="btn btn-danger shadow px-4" onclick="return confirm('<?=$getMsg?>')"><i class="fas fa-trash-alt px-2"></i> ลบ</a>
	  		<input type="hidden" id="check_stock_id" value="<?=$result_get_stock['stock_id'] ?>">
	  		<input type="hidden" id="check_count" value="<?=$value_payment['count'] ?>">
	  	</div>
	 </div>

  	<div class="card-body">
  		<div class="form-row">
  			<div class="form-group col-md-4">
		      	<label>วันที่ลงบันทึกสมุดบัญชี</label>
		      	<div class="input-group">
				  	<div class="input-group-prepend">
						<div class="input-group-text">
							<input type="checkbox" name="check_account_date" value="check_account_date" disabled <?=$check_account_date ?>>
						</div>
					</div>
	                <div class="input-group-prepend">
				        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
			        </div>
			        <input type="text" name="account_date" <?=$account_date?> disabled>
			    </div>
		    </div>
		    <div class="form-group col-md-4">
		      	<label>วันที่ลูกค้าชำระเบี้ย</label>
		      	<div class="input-group">
				  	<div class="input-group-prepend">
						<div class="input-group-text">
							<input type="checkbox" name="check_cus_pay_date" value="check_cus_pay_date" disabled <?=$check_cus_pay_date ?>>
						</div>
					</div>
	                <div class="input-group-prepend">
				        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
			        </div>
			        <input type="text" name="cus_pay_date" <?=$cus_pay_date?> disabled>
			    </div>
		    </div>
		    <div class="form-group col-md-4">
		      	<label>วันที่เคลียร์เบี้ย</label>
		      	<div class="input-group">
				  	<div class="input-group-prepend">
						<div class="input-group-text">
							<input type="checkbox" name="check_clear_date" value="check_clear_date" disabled <?=$check_clear_date ?>>
						</div>
					</div>
	                <div class="input-group-prepend">
				        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
			        </div>
			        <input type="text" name="clear_date" <?=$clear_date?> disabled>
			    </div>
		    </div>
  		</div>
  		<div class="form-row">
  			<div class="form-group col-md-4">
		      	<label>ยอดชำระ</label>
		      	<div class="input-group">
			        <input type="text" class="form-control" name="total_amount"  placeholder="จำนวนเงิน" value="<?=$result_payment2['total_amount']?>" disabled>
			        <div class="input-group-prepend">
				        <div class="input-group-text">บาท</i></div>
			        </div>
			    </div>
		    </div>
		    <div class="form-group col-md-4">
		      	<label>ส่วนลด</label>
			    <div class="input-group">
			        <input type="text" class="form-control" name="discount"  placeholder="จำนวนเงิน" value="<?=$result_payment2['discount']?>" disabled>
			        <div class="input-group-prepend">
				        <div class="input-group-text">บาท</i></div>
			        </div>
			    </div>
		    </div>
		    <div class="form-group col-md-4">
		      	<label>หักภาษี 1%</label>
		      	<div class="input-group">
			        <input type="text" class="form-control" name="tax_deductions"  placeholder="จำนวนเงิน" value="<?=$result_payment2['tax_deductions']?>" disabled>
			        <div class="input-group-prepend">
				        <div class="input-group-text">บาท</i></div>
			        </div>
			    </div>
		    </div>
		    <div class="form-group col-md-4">
		      	<label>คงเหลือชำระ</label>
		      	<div class="input-group">
			        <input type="text" class="form-control" name="balance"  placeholder="จำนวนเงิน" value="<?=$result_payment2['balance']?>" disabled>
			        <div class="input-group-prepend">
				        <div class="input-group-text">บาท</i></div>
			        </div>
			    </div>
		    </div>
  		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
		      	<label>เลขที่บิล</label>
			    <input type="text" class="form-control" name="bill_no"  placeholder="เลขที่บิล" value="<?=$bill_no?>" disabled>
		    </div>
		</div>
  		<div class="form-row">
  			<div class="form-group col-md-6">
		      	<label>ประเภทการชำระเงิน</label>
		      	<div class="w-100"></div>
				<div class="form-check form-check-inline">
				  	<input class="form-check-input" type="radio" name="type_payment" id="type_payment1" value="1" <?=$type1?> disabled>
				  	<label class="form-check-label" for="type_payment1">หน้าร้าน</label>
				</div>
				<div class="form-check form-check-inline">
				  	<input class="form-check-input" type="radio" name="type_payment" id="type_payment2" value="2" <?=$type2?> disabled>
				  	<label class="form-check-label" for="type_payment2">เงินเชื่อ</label>
				</div>
		    </div>
  		</div>
  		<div class="form-row">
  			<div class="form-group col-md-12">
		      	<label>สถานะชำระเงิน</label>
		      	<div class="form-check mb-3 ">
				  	<input class="form-check-input" type="checkbox" name="status_payment[]" value="1" <?=$payment_type1?> disabled>
				  	<label class="form-check-label" for="status_payment1">
				    	เงินสด
				  	</label>
				  	<div class="row ">
				  		<div class="col-4 my-2">
				  			<div class="input-group">
						        <input type="text" class="form-control" name="payment_total1"  placeholder="จำนวนเงิน" data-validation="required" data-validation-error-msg=" " value="<?=$total1?>" disabled>
						        <div class="input-group-prepend">
							        <div class="input-group-text">บาท</i></div>
						        </div>
						    </div>
				  		</div>
				  	</div>
				</div>
				<div class="form-check mb-3 ">
				  	<input class="form-check-input" type="checkbox" name="status_payment[]" value="2"  <?=$payment_type2?> disabled>
				  	<label class="form-check-label" for="status_payment2">
				    	เช็ค
				  	</label>
				  	<div class="row p-3 border">
				  		<div class="col-4 my-2">
				  			<input type="text" class="form-control" name="bank2" placeholder="เช็คธนาคาร" value="<?=$bank2 ?>" disabled>
				  		</div>
				  		<div class="col-4 my-2">
				  			<input type="text" class="form-control" name="bank_branch" placeholder="สาขา" value="<?=$bank_branch ?>" disabled>
				  		</div>
				  		<div class="col-4 my-2">
				  			<input type="text" class="form-control" name="check_number" placeholder="เลขที่" value="<?=$payment_number2 ?>" disabled>
				  		</div>
				  		<div class="col-4 my-2">
				  			<div class="input-group">
				                <div class="input-group-prepend">
							        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
						        </div>
						        <input type="text" name="check_date" class="form-control singledate-getvalue" value="<?=$cheque_date?>" disabled >
						    </div>
				  		</div>
				  		<div class="col-4 my-2">
				  			<div class="input-group">
						        <input type="text" class="form-control" name="payment_total2" id="total2" placeholder="จำนวนเงิน" data-validation="required" data-validation-error-msg=" " value="<?=$total2?>" disabled>
						        <div class="input-group-prepend">
							        <div class="input-group-text">บาท</i></div>
						        </div>
						    </div>
				  		</div>
				  	</div>
				</div>
				<div class="form-check mb-3 ">
				  	<input class="form-check-input" type="checkbox" name="status_payment[]" value="3"  <?=$payment_type3?> disabled>
				  	<label class="form-check-label" for="status_payment3">
				    	โอน
				  	</label>
				  	<div class="row" >
				  		<div class="col-4 my-2">
				  			<input type="text" class="form-control" name="bank3" placeholder="ธนาคาร" disabled value="<?=$bank3?>">
				  		</div>
				  		<div class="col-4 my-2">
				  			<div class="input-group">
						        <input type="text" class="form-control" name="payment_total3" id="total3" placeholder="จำนวนเงิน" data-validation="required" data-validation-error-msg=" " value="<?=$total3?>" disabled>
						        <div class="input-group-prepend">
							        <div class="input-group-text">บาท</i></div>
						        </div>
						    </div>
				  		</div>
				  	</div>
				</div>
				<div class="form-check mb-3 ">
				  	<input class="form-check-input" type="checkbox" name="status_payment[]" value="4"  <?=$payment_type4?> disabled>
				  	<label class="form-check-label" for="status_payment4">
				    	บัตรเครดิต/สาขา
				  	</label>
				  	<div class="row p-3 border" >
				  		<div class="col-4 my-2">
				  			<input type="text" class="form-control" name="bank4" placeholder="ธนาคาร" value="<?=$bank4?>" disabled>
				  		</div>
				  		<div class="w-100"></div>
				  		<div class="col-8 my-2">
				  			<div class="form-check form-check-inline">
							  	<input class="form-check-input" type="radio" name="card_type2" id="visa" value="visa" <?=$visa?> disabled>
							  	<label class="form-check-label" for="visa"><img src="matrix-admin/assets/images/payment/visa1.png"></label>
							</div>
							<div class="form-check form-check-inline">
							  	<input class="form-check-input" type="radio" name="card_type2" id="mastercard" value="mastercard" <?=$mastercard?> disabled>
							  	<label class="form-check-label" for="mastercard"><img src="matrix-admin/assets/images/payment/mastercard.png"></label>
							</div>
							<div class="form-check form-check-inline">
							  	<input class="form-check-input" type="radio" name="card_type2" id="jcb" value="jcb" <?=$jcb?> disabled>
							  	<label class="form-check-label" for="jcb"><img src="matrix-admin/assets/images/payment/jcb.png"></label>
							</div>
							<div class="form-check form-check-inline">
							  	<input class="form-check-input" type="radio" name="card_type2" id="american-express" value="american-express" <?=$americanexpress?> disabled>
							  	<label class="form-check-label" for="american-express"><img src="matrix-admin/assets/images/payment/american-express.png"></label>
							</div>
							<div class="form-check form-check-inline">
							  	<input class="form-check-input" type="radio" name="card_type2" id="diners-club" value="diners-club" <?=$dinersclub ?> disabled>
							  	<label class="form-check-label" for="diners-club"><img src="matrix-admin/assets/images/payment/diners-club.png"></label>
							</div>
							
				  		</div>
				  		<div class="col-8 my-2">
				  			<div class="form-check form-check-inline">
							  	<input class="form-check-input" type="radio" name="card_type1" id="Platinum" value="Platinum" disabled>
							  	<label class="form-check-label" for="Platinum">Platinum Card</label>
							</div>
							<div class="form-check form-check-inline">
							  	<input class="form-check-input" type="radio" name="card_type1" id="Titanium" value="Titanium" disabled>
							  	<label class="form-check-label" for="Titanium">Titanium Card</label>
							</div>
				  		</div>
				  		<div class="w-100"></div>
				  		<div class="col-4 my-2">
				  			<label>เลขที่บัตรเครดิต</label>
				  			<input type="text" class="form-control" name="card_number" placeholder="เลขที่" value="<?=$payment_number4?>" disabled>
				  		</div>
				  		<div class="col-4 my-2">
				  			<label>วันหมดอายุของบัตร</label>
				  			<input type="text" class="form-control" name="card_expired_date" value="<?=$exp_date?>" disabled>
				  		</div>
				  		<div class="w-100"></div>
				  		<div class="col-6 my-2">
				  			<label>ชื่อ-นามสกุล (ตามบัตร)</label>
				  			<input type="text" class="form-control" name="card_name" value="<?=$name?>" disabled>
				  		</div>
				  		<div class="col-4 my-2">
				  			<label>โปรดเรียกเก็บเงินทั้งหมดจำนวน</label>
				  			<div class="input-group">
						        <input type="text" class="form-control" name="payment_total4" placeholder="จำนวนเงิน" data-validation="required" data-validation-error-msg=" " value="<?=$total4?>" disabled>
						        <div class="input-group-prepend">
							        <div class="input-group-text">บาท</i></div>
						        </div>
						    </div>
				  		</div>
				  		<div class="w-100"></div>
				  		<div class="col-6 my-2">
				  			<label>ความสัมพันธ์กับผู้เอาประกันภัย</label>
				  			<input type="text" class="form-control" name="card_ralationship_name" value="<?=$relation_name?>" disabled>
				  		</div>
				  		<div class="col-4 my-2">
				  			<label>เบอร์ติดต่อเจ้าของบัตร</label>
				  			<input type="text" class="form-control" name="card_tel" value="<?=$tel?>" disabled>
				  		</div>
				  	</div>
				</div>
		    </div>
  		</div>
  		<div class="form-row">
  			<div class="form-group col-md-4">
		      	<label>ค้างชำระ</label>

		      	<div class="input-group">
		      		<div class="input-group-prepend">
				    	<div class="input-group-text">
				    		<input type="checkbox" name="check_arrears" value="check_arrears" <?=$check_arrears?> disabled>
				    	</div>
				  	</div>
			        <input type="text" class="form-control" name="arrears"  placeholder="จำนวนเงิน" value="<?=$arrears?>" disabled>
			        <div class="input-group-prepend">
				        <div class="input-group-text">บาท</i></div>
			        </div>
			    </div>
		    </div>
		</div>
		<div class="form-row">
  			<div class="form-group col-md-12 ">
		      	<label>ผ่อนชำระ</label>
		      	<div class="row p-3 border">
		      		<div class="col-6 my-2">
		      			<label>เลขที่ใบเสร็จ</label>
		      			<input type="text" class="form-control" name="installments_number" placeholder="เลขที่ใบเสร็จ" value="<?=$result_payment2['refer_no']?>" disabled>
		      		</div>
		      		<div class="col-4 my-2">
		      			<label>งวดที่</label>
		      			<input type="text" class="form-control" name="installments" placeholder="งวดที่"  value="<?=$result_payment2['period']?>" disabled>
		      		</div>
		      		<div class="w-100"></div>
		      		<div class="col-4 my-2">
		      			<label>วันที่ครบกำหนด</label>
		      			<div class="input-group">
						  	<div class="input-group-prepend">
								<div class="input-group-text">
									<input type="checkbox" name="check_installments_deadline_date" value="check_installments_deadline_date" disabled <?=$check_installments_deadline_date ?>>
								</div>
							</div>
			                <div class="input-group-prepend">
						        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
					        </div>
					        <input type="text" name="installments_deadline_date" <?=$installments_deadline_date?> disabled>
					    </div>
		      		</div>
		      		<div class="col-4 my-2">
		      			<label>จำนวนเงิน</label>
		      			<div class="input-group">
					        <input type="text" class="form-control" name="installments_deadline_amount" placeholder="จำนวนเงิน"  value="<?=$result_payment2['deadline_amount']?>" disabled>
					        <div class="input-group-prepend">
						        <div class="input-group-text">บาท</i></div>
					        </div>
					    </div>
		      		</div>
		      		<div class="w-100"></div>
		      		<div class="col-4 my-2">
		      			<label>วันชำระเงิน</label>
		      			<div class="input-group">
						  	<div class="input-group-prepend">
								<div class="input-group-text">
									<input type="checkbox" name="check_pay_date" value="check_pay_date" disabled <?=$check_pay_date?>>
								</div>
							</div>
			                <div class="input-group-prepend">
						        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
					        </div>
					        <input type="text" name="installments_pay_date" <?=$installments_pay_date?> disabled>
					    </div>
		      		</div>
		      		<div class="col-4 my-2">
		      			<label>จำนวนเงิน</label>
		      			<div class="input-group">
					        <input type="text" class="form-control" name="installments_pay_amount" id="total1" placeholder="จำนวนเงิน" value="<?=$result_payment2['pay_amount']?>" disabled>
					        <div class="input-group-prepend">
						        <div class="input-group-text">บาท</i></div>
					        </div>
					    </div>
		      		</div>
		      		<div class="w-100"></div>
		      		<div class="col-12 my-2">
		      			<label>หมายเหตุ</label>
		      			<textarea rows="3" class="form-control" name="remark" disabled><?=$result_payment2['remark']?></textarea>
		      		</div>
		      	</div>
		    </div>
		</div>
  	</div>
</div>
<?php 
		include 'modal_edit_payment.php';
		
	 	} 
	 	include 'modal_add_payment.php';
	} 
?>
