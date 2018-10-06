<?php
    $sql_user = "SELECT agent_id, name FROM agent ORDER BY agent_id ASC";
    $query_user = mysqli_query($conn,$sql_user);
    $result_user = mysqli_fetch_all($query_user,MYSQLI_ASSOC);
	
    $sql_code = "SELECT code, name, surname FROM user_code";
    $query_code = mysqli_query($conn,$sql_code);
    $result_code = mysqli_fetch_all($query_code,MYSQLI_ASSOC);

    $sql_car = "SELECT id, code, type, name FROM car_code2 ORDER BY code ASC";
    $query_car = mysqli_query($conn,$sql_car);
    $result_car = mysqli_fetch_all($query_car,MYSQLI_ASSOC);

    $sql_province = "SELECT PROVINCE_ID, PROVINCE_NAME FROM province";
    $query_province = mysqli_query($conn,$sql_province);
    $result_province = mysqli_fetch_all($query_province,MYSQLI_ASSOC);	
?>

<?php if(isset($_GET['status']) && $_GET['status'] == 'success'){ ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
	  	<strong>บันทึกแบบฟอร์มสำเร็จ !</strong> 
	  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    	<span aria-hidden="true">&times;</span>
	  	</button>
	</div>
<?php }else if(isset($_GET['status']) && $_GET['status'] == 'fail'){ ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
	  	<strong>บันทึกแบบฟอร์มไม่สำเร็จ !</strong> กรุณาลองอีกครั้ง <?='Cause : ' . $_GET['msg']?>
	  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    	<span aria-hidden="true">&times;</span>
	  	</button>
	</div>
<?php } ?>
<div class="card">
	<div class="card-body">
		<form method="post" action="main.php?page=payment-edit2">
  			<div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>ค้นหาเลขกรมธรรม์ / เลขบาร์โค้ด / เลขรับแจ้ง / ทะเบียนรถ เพื่อทำการดึงข้อมูล</label>
			      	<div class="input-group">
			      		<input type="text" name="search" class="form-control" id="search" placeholder="ค้นหา..." >
			      		<div class="input-group-append">
					    	<button class="btn btn-outline-info" name="search_stock" type="submit" id="button-addon2"><i class="fas fa-search"></i> ค้นหา</button>
					  	</div>
					  </div>
			    </div>
			    
			</div>
		</form>
	</div>
</div>
<div class="card">
	<form method="post" action="menu-payment/submitforms.php?forms=2">
		<div class="card-header text-white bg-info">ข้อมูลกรมธรรม์ </div>
	  	<div class="card-body">
  			<div class="form-row">
  				<div class="form-group col-md-4">
  					<label>ออกเอกสาร</label>
  					<div class="w-100"></div>
	  				<div class="form-check form-check-inline">
					  	<input class="form-check-input" type="radio" name="index_type" id="type1" value="สาขา" checked>
					  	<label class="form-check-label" for="type1">สาขา</label>
					</div>
					<div class="form-check form-check-inline">
					  	<input class="form-check-input" type="radio" name="index_type" id="type2" value="ออกกรมธรรม์เอง">
					  	<label class="form-check-label" for="type2">ออกกรมธรรม์เอง</label>
					</div>
				</div>
				<div class="form-group col-md-4">
			      	<label>วันที่บันทึก</label>
			      	<div class="input-group">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="create_date" class="form-control singledate">
				    </div>
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-4">
			      	<label>วันที่รับแจ้ง</label>
			      	<div class="input-group">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="inform_date" class="form-control singledate">
				    </div>
			    </div>
			    <div class="form-group col-md-6">
			      	<label>รหัสตัวแทน<span class="text-danger">*</span></label>
			      	<select class="form-control selectOptions" name="selectagent" id="selectagent">
                    	<?php foreach ($result_code as $key => $value) { 
                    		echo "<option value='".$value['code']."'>".$value['code']." - ".$value['name']."  ".$value['surname']."</option>";
                    	} ?>
                    </select>
			    </div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
			      	<label>ระบุปี<span class="text-danger">*</span></label>
			      	<input type="text" name="year_stock" class="form-control" placeholder="ระบุปี" data-validation="required" data-validation-error-msg=" ">
			    </div>
				<div class="form-group col-md-6">
			      	<label>เลขที่กรมธรรม์<span class="text-danger">*</span></label>
			      	<input type="text" name="stock_id" id="check_stock_id" class="form-control" placeholder="เลขที่กรมธรรม์" data-validation="required" data-validation-error-msg=" ">
					<div id="check_id"></div>
				</div>
				
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
			      	<label>เลขบาร์โค้ด<span class="text-danger">*</span></label>
			      	<input type="text" name="barcode" class="form-control" placeholder="เลขบาร์โค้ด" data-validation="required" data-validation-error-msg=" ">
			    </div>
				<div class="form-group col-md-6">
			      	<label>เลขรับแจ้ง<span class="text-danger">*</span></label>
			      	<input type="text" name="inform_code" class="form-control" placeholder="เลขรับแจ้ง" data-validation="required" data-validation-error-msg=" ">
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-4">
			      	<label>ประเภทกรมธรรม์</label>
			      	<select class="form-control" name="stock_type">
			      		<option value="ป.1">ป.1</option>
			      		<option value="ป.2">ป.2</option>
			      		<option value="ป.3">ป.3</option>
			      		<option value="ป.3 (โครงการ)">ป.3 (โครงการ)</option>
			      		<option value="ป.1,ป.2,ป.3 ฯลฯ (งานสลักหลังเพิ่มเบี้ย)">ป.1,ป.2,ป.3 ฯลฯ (งานสลักหลังเพิ่มเบี้ย)</option>
			      		<option value="ป.4">ป.4</option>
			      		<option value="ป.2+">ป.2+</option>
			      		<option value="ป.2+(แคมเปญ)">ป.2+(แคมเปญ)</option>
			      		<option value="ป.3+">ป.3+</option>
			      		<option value="ป.3+(แคมเปญ)">ป.3+(แคมเปญ)</option>
			      		<option value="BUS">BUS</option>
			      	</select>
			    </div>
			    <div class="form-group col-md-6">
			      	<label>รับแจ้งโดย<span class="text-danger">*</span></label>
			      	<input type="text" name="inform_id" class="form-control" placeholder="รับแจ้งโดย" data-validation="required" data-validation-error-msg=" ">
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
  								<?php include 'select_title.php'; ?>
  							</select>

  						</div>
  						<div class=" col-md-4">
					      	<input type="text" name="cus_firstname" class="form-control" placeholder="ชื่อ" data-validation="required" data-validation-error-msg=" ">
					    </div>
					    <div class="col-md-4">
					      	<input type="text" name="cus_lastname" class="form-control" placeholder="นามสกุล" data-validation="required" data-validation-error-msg=" ">
					    </div>
  					</div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ประเภท</label>
			      	<select class="form-control" name="cus_type">
			      		<option value="บุคคลทั่วไป">บุคคลทั่วไป</option>
			      		<option value="นิติบุคคล">นิติบุคคล</option>
			      	</select>
			    </div>
			    <div class="form-group col-md-6">
			      	<label>เลขที่บัตรประชาชน/เลขที่ประจำตัวผู้เสียภาษีอากร<span class="text-danger">*</span></label>
			      	<input type="text" name="cus_card_id" class="form-control" data-validation="required" data-validation-error-msg=" ">
			    </div>
			    <div class="w-100"></div>
			    <div class="form-group col-md-4">
			      	<label>บ้านเลขที่<span class="text-danger">*</span></label>
			      	<input type="text" name="cus_address[]" class="form-control" placeholder="บ้านเลขที่" data-validation="required" data-validation-error-msg=" ">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ตึก/หมู่บ้าน</label>
			      	<input type="text" name="cus_address[]" class="form-control" placeholder="ตึก/หมู่บ้าน">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>หมู่ที่</label>
			      	<input type="text" name="cus_address[]" class="form-control" placeholder="หมู่ที่">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ตรอก</label>
			      	<input type="text" name="cus_address[]" class="form-control" placeholder="ตรอก">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ซอย</label>
			      	<input type="text" name="cus_address[]" class="form-control" placeholder="ซอย">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ถนน<span class="text-danger">*</span></label>
			      	<input type="text" name="cus_address[]" class="form-control" placeholder="ถนน" data-validation="required" data-validation-error-msg=" ">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ตำบล<span class="text-danger">*</span></label>
			      	<input type="text" name="cus_address[]" class="form-control" placeholder="ตำบล" data-validation="required" data-validation-error-msg=" ">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>อำเภอ<span class="text-danger">*</span></label>
			      	<input type="text" name="cus_address[]" class="form-control" placeholder="อำเภอ" data-validation="required" data-validation-error-msg=" ">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>จังหวัด<span class="text-danger">*</span></label>
			      	<select class="form-control selectOptions" name="cus_address[]">
						<?php foreach ($result_province as $key => $value) { 
							echo "<option value='".$value['PROVINCE_ID']."'>".$value['PROVINCE_NAME']."</option>";
						} ?>
			      	</select>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>รหัสไปรษณีย์</label>
			      	<input type="text" name="cus_address[]" class="form-control" placeholder="รหัสไปรษณีย์">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>เบอร์โทรศัพท์</label>
			      	<input type="text" name="cus_tel" class="form-control" placeholder="เบอร์โทรศัพท์">
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>ประเภทลูกค้า<span class="text-danger">*</span></label>
			      	<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="cus_type2" value="vip" id="cus_type21" checked>
					  	<label class="form-check-label" for="cus_type21">
					    	VIP
					  	</label>
					  	<div class="row">
					  		<div class="col-12 my-2">
					  			<input type="text" class="form-control" name="cus_detail1" placeholder="บริษัท / ห้างร้าน">
					  		</div>
					  	</div>
					</div>
					<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="cus_type2" value="ตัวแทน" id="cus_type22" >
					  	<label class="form-check-label" for="cus_type22">
					    	ตัวแทน
					  	</label>
					  	<div class="row">
					  		<div class="col-12 my-2">
								<select class="form-control selectOptions" name="cus_detail2">
									<option value='no'>โปรดเลือกตัวแทน</option>
									<?php foreach ($result_user as $key => $value) { 
										echo "<option value='".$value['agent_id']."'>".$value['agent_id']." - ".$value['name']."</option>";
									} ?>
								</select>
					  		</div>
					  	</div>
					</div>
					<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="cus_type2" value="ทั่วไป" id="cus_type23" >
					  	<label class="form-check-label" for="cus_type23">
					    	ทั่วไป
					  	</label>
					</div>
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>สถานะควบภาคพรบ.<span class="text-danger">*</span></label>
			      	<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="cus_status" value="yes" id="cus_status1" checked>
					  	<label class="form-check-label" for="cus_status1">
					    	ควบพรบ.
					  	</label>
					  	<div class="row">
					  		<div class="col-12 my-2">
					  			<input type="text" class="form-control" name="cus_status_stock" placeholder="ระบุเลขกรมธรรม์ / เลขรับแจ้ง">
					  		</div>
					  	</div>
					</div>
					<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="cus_status" value="no" id="cus_status3" >
					  	<label class="form-check-label" for="cus_status3">
					    	ไม่ควบพรบ.
					  	</label>
					</div>
			    </div>
			</div>
	  	</div>
	  	
	  	<div class="card-header text-white bg-info">เบี้ยประกัน</div>
	  	<div class="card-body">
	  		<div class="form-row">
			    <div class="form-group col-md-4">
			      	<label>ตั้งแต่</label>
			      	<div class="input-group">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="insure_date[]" class="form-control singledate">
				    </div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ถึง</label>
			      	<div class="input-group">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="insure_date[]" class="form-control single-end-1year">
				    </div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>เวลา</label>
			      	<div class="input-group bootstrap-timepicker timepicker">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-clock"></i></div>
				        </div>
				        <input type="text" name="insure_time" class="form-control selecttimepicker">
				    </div>
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-4">
			      	<label>รวมจำนวนวัน</label>
			      	<div class="input-group">
				        <input type="text" class="form-control" name="insure_total1" placeholder="รวมจำนวนวัน" value="365">
				        <div class="input-group-prepend">
					        <div class="input-group-text">วัน</i></div>
				        </div>
				    </div>
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-4">
			      	<label>เบี้ยประกัน</label>
			      	<input type="text" class="form-control" name="insure" placeholder="เบี้ยประกัน">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ส่วนลด</label>
			      	<input type="text" class="form-control" name="insure_discount" placeholder="ส่วนลด">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>เบี้ยสุทธิ</label>
			      	<input type="text" class="form-control" name="insure_net" placeholder="เบี้ยสุทธิ">
			    </div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
			      	<label>อากร</label>
			      	<input type="text" class="form-control" name="insure_duty" placeholder="อากร">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ภาษี</label>
			      	<input type="text" class="form-control" name="insure_tex" placeholder="ภาษี">
			    </div>
  				<div class="form-group col-md-4">
			      	<label>เบี้ยรวม</label>
			      	<input type="text" class="form-control" name="insure_total2" placeholder="เบี้ยรวม">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>หักภาษี 1%</label>
				    <input type="text" class="form-control" name="tax_deductions"  placeholder="หักภาษี 1%" >
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
							echo "<option value='".$value['id']."'>".$value['code']." - ".$value['name']." ".$value['type']."</option>";
						} ?>
			      	</select>
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-6">
  					<label>ทะเบียนรถ<span class="text-danger">*</span></label>
  					<div class="row">
  						<div class="col-md-4">
  							<input type="text" name="car_number" class="form-control" placeholder="เลขทะเบียน" data-validation="required" data-validation-error-msg=" ">
  						</div>
  						<div class=" col-md-6">
					      	<select class="form-control selectOptions" name="car_province">
								<?php foreach ($result_province as $key => $value) { 
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
  							<input type="text" name="car_cc_weight_seat[]" class="form-control">
  						</div>
  						<div class="col-md-3">
  							<input type="text" name="car_cc_weight_seat[]" class="form-control">
  						</div>
  						<div class="col-md-3">
  							<input type="text" name="car_cc_weight_seat[]" class="form-control">
  						</div>
  					</div>
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-4">
			      	<label>ยี่ห้อรถ<span class="text-danger">*</span></label>
			      	<input type="text" name="car_brand" class="form-control" data-validation="required" data-validation-error-msg=" " placeholder="ยี่ห้อรถ">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>รุ่นรถ</label>
			      	<input type="text" name="car_modal" class="form-control" placeholder="รุ่นรถ">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ปีรุ่น</label>
			      	<input type="text" class="form-control" name="car_year" placeholder="ปีรุ่น">
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>ทุนประกัน</label>
			      	<div class="input-group">
				        <input type="text" class="form-control" name="insurance" id="total1" placeholder="จำนวนเงิน">
				        <div class="input-group-prepend">
					        <div class="input-group-text">บาท</i></div>
				        </div>
				    </div>
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>ตัวถังรถ<span class="text-danger">*</span></label>
			      	<input type="text" class="form-control" name="car_chassis" placeholder="ตัวถังรถ" data-validation="required" data-validation-error-msg=" ">
			    </div>
			    <div class="form-group col-md-6">
			      	<label>เลขเครื่องยนต์</label>
			      	<input type="text" class="form-control" name="car_body" placeholder="เลขเครื่องยนต์">
			    </div>
			</div>
			<div class="form-row">
	  			<div class="form-group col-md-12">
			      	<label>สถานะ</label>
			      	<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="status" value="1" id="status1" checked>
					  	<label class="form-check-label" for="status1">
					    	ใหม่
					  	</label>
					  	<div class="row">
					  		<div class="col-4 my-2">
					  			<input type="text" class="form-control" name="detail1" placeholder="ประวัติดี">
					  		</div>
					  	</div>
					</div>
					<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="status" value="2" id="status2" >
					  	<label class="form-check-label" for="status2">
					    	ต่ออายุ
					  	</label>
					  	<div class="row">
					  		<div class="col-4 my-2">
					  			<input type="text" class="form-control" name="detail2" placeholder="เลขกรมธรรม์เดิม">
					  		</div>
					  	</div>
					</div>
					<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="status" value="3" id="status3" >
					  	<label class="form-check-label" for="status3">
					    	โอนย้าย
					  	</label>
					</div>
			    </div>
	  		</div>
	  		<div class="form-row">
	  			<div class="form-group col-md-12">
			      	<label>การใช้รถยนต์</label>
			      	<div class="w-100"></div>
					<div class="form-check form-check-inline">
					  	<input class="form-check-input" type="radio" name="vehicle" id="vehicle1" value="vehicle1" checked>
					  	<label class="form-check-label" for="vehicle1">ใช้ส่วนบุคคลไม่ใช้รับจ้าง / หรือให้เช่า</label>
					</div>
					<div class="form-check form-check-inline">
					  	<input class="form-check-input" type="radio" name="vehicle" id="vehicle2" value="vehicle2">
					  	<label class="form-check-label" for="vehicle2">ใช้เพื่อการพาณิชย์</label>
					</div>
			    </div>
	  		</div>
	  		<div class="form-row">
	  			<div class="form-group col-md-12">
			      	<label>ประเภทการประกันภัยที่ต้องการ</label>
			      	<div class="w-100"></div>
					<div class="form-check form-check-inline">
					  	<input class="form-check-input" type="radio" name="type_insure" id="type_insure1" value="type_insure1" checked>
					  	<label class="form-check-label" for="type_insure1">ไม่ระบุชื่อผู้ขับขี่</label>
					</div>
					<div class="form-check form-check-inline">
					  	<input class="form-check-input" type="radio" name="type_insure" id="type_insure2" value="type_insure2">
					  	<label class="form-check-label" for="type_insure2">ระบุชื่อผู้ขับขี่</label>
					</div>
			    </div>
	  		</div>
	  		<div class="form-row border p-2 m-2">
  				<div class="form-group col-md-6">
			      	<label>ชื่อผู้ขับขี่1</label>
			      	<input type="text" name="driver1" class="form-control" placeholder="ชื่อผู้ขับขี่1">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>วัน/ เดือน/ ปี เกิด</label>
			      	<div class="input-group">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="birth_date1" class="form-control singledate">
				    </div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>อาชีพ</label>
			      	<input type="text" class="form-control" name="occupation1" placeholder="อาชีพ" >
			    </div>
			    <div class="form-group col-md-4">
			      	<label>เลขที่ใบอนุญาตขับขี่</label>
			      	<input type="text" class="form-control" name="card_number1" placeholder="เลขที่ใบอนุญาตขับขี่" >
			    </div>
			</div>
			<div class="form-row border p-2 m-2">
  				<div class="form-group col-md-6">
			      	<label>ชื่อผู้ขับขี่2</label>
			      	<input type="text" name="driver2" class="form-control" placeholder="ชื่อผู้ขับขี่2">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>วัน/ เดือน/ ปี เกิด</label>
			      	<div class="input-group">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="birth_date2" class="form-control singledate">
				    </div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>อาชีพ</label>
			      	<input type="text" class="form-control" name="occupation2" placeholder="อาชีพ" >
			    </div>
			    <div class="form-group col-md-4">
			      	<label>เลขที่ใบอนุญาตขับขี่</label>
			      	<input type="text" class="form-control" name="card_number2" placeholder="เลขที่ใบอนุญาตขับขี่" >
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>ผู้รับผลประโยชน์</label>
			      	<input type="text" class="form-control" name="beneficiary" placeholder="ผู้รับผลประโยชน์" >
			    </div>
			</div>
			<div class="form-row">
	  			<div class="form-group col-md-12">
			      	<label>แจ้งเตือนลูกค้าเมื่อกรมธรรม์ออก</label>
			      	<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="alert_type" value="โทรแจ้ง" id="alert1" checked>
					  	<label class="form-check-label" for="alert1">
					    	โทรแจ้ง
					  	</label>
					  	<div class="row">
					  		<div class="col-6 my-2">
					  			<textarea rows="2" placeholder="หมายเหตุ" class="form-control" name="alert_detail1"></textarea>
					  		</div>
					  	</div>
					</div>
					<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="alert_type" value="ส่งไปรษณีย์" id="alert2" >
					  	<label class="form-check-label" for="alert2">
					    	ส่งไปรษณีย์
					  	</label>
					  	<div class="row">
					  		<div class="col-6 my-2">
					  			<textarea rows="2" placeholder="หมายเหตุ" class="form-control" name="alert_detail2"></textarea>
					  		</div>
					  	</div>
					</div>
					<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="alert_type" value="อื่นๆ" id="alert3" >
					  	<label class="form-check-label" for="alert3">
					    	อื่นๆ
					  	</label>
					  	<div class="row">
					  		<div class="col-6 my-2">
					  			<textarea rows="2" placeholder="หมายเหตุ" class="form-control" name="alert_detail3"></textarea>
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
					    		<input type="checkbox" name="check_cancel_date" id="check_cancel_date" value="check_cancel_date">
					    	</div>
					  	</div>
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="cancel_date" id="cancel_date" class="form-control singledate" disabled>
				    </div>
			    </div>
				<div class="form-group col-md-8">
			      	<label>สาเหตุการยกเลิก</label>
			      	<textarea rows="2" placeholder="สาเหตุการยกเลิก" class="form-control" name="cancel_detail"></textarea>
			    </div>
			</div>
	  	</div>
	  	<div class="card-header text-white bg-info">รับชำระเงิน</div>
	  	<div class="card-body">
		  	<div class="form-row">
	  			<div class="form-group col-md-4">
			      	<label>วันที่ลงบันทึกสมุดบัญชี</label>
			      	<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<input type="checkbox" name="check_account_date" id="check_account_date" value="check_account_date">
							</div>
						</div>
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="account_date" id="account_date" class="form-control singledate" disabled>
				    </div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>วันที่ลูกค้าชำระเบี้ย</label>
			      	<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<input type="checkbox" name="check_cus_pay_date" id="check_cus_pay_date" value="check_cus_pay_date">
							</div>
						</div>
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="cus_pay_date" id="cus_pay_date" class="form-control singledate" disabled>
				    </div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>วันที่เคลียร์เบี้ย</label>
			      	<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<input type="checkbox" name="check_clear_date" id="check_clear_date" value="check_clear_date">
							</div>
						</div>
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="clear_date" id="clear_date" class="form-control singledate" disabled>
				    </div>
			    </div>
	  		</div>
	  		<div class="form-row">
	  			<div class="form-group col-md-4">
			      	<label>ยอดชำระ</label>
			      	<div class="input-group">
				        <input type="text" class="form-control" name="total_amount"  placeholder="จำนวนเงิน" >
				        <div class="input-group-prepend">
					        <div class="input-group-text">บาท</i></div>
				        </div>
				    </div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ส่วนลด</label>
				    <div class="input-group">
				        <input type="text" class="form-control" name="discount"  placeholder="จำนวนเงิน" >
				        <div class="input-group-prepend">
					        <div class="input-group-text">บาท</i></div>
				        </div>
				    </div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>หักภาษี 1%</label>
			      	<div class="input-group">
				        <input type="text" class="form-control" name="tax_deductions"  placeholder="จำนวนเงิน" >
				        <div class="input-group-prepend">
					        <div class="input-group-text">บาท</i></div>
				        </div>
				    </div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>คงเหลือชำระ</label>
			      	<div class="input-group">
				        <input type="text" class="form-control" name="balance"  placeholder="จำนวนเงิน" >
				        <div class="input-group-prepend">
					        <div class="input-group-text">บาท</i></div>
				        </div>
				    </div>
			    </div>
	  		</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label>เลขที่บิล</label>
					<input type="text" class="form-control" name="bill_no" placeholder="เลขที่บิล" >
				</div>
			</div>
	  		<div class="form-row">
	  			<div class="form-group col-md-6">
			      	<label>ประเภทการชำระเงิน</label>
			      	<div class="w-100"></div>
					<div class="form-check form-check-inline">
					  	<input class="form-check-input" type="radio" name="type_payment" id="type_payment1" value="1">
					  	<label class="form-check-label" for="type_payment1">หน้าร้าน</label>
					</div>
					<div class="form-check form-check-inline">
					  	<input class="form-check-input" type="radio" name="type_payment" id="type_payment2" value="2" checked>
					  	<label class="form-check-label" for="type_payment2">เงินเชื่อ</label>
					</div>
			    </div>
	  		</div>
	  		<div class="form-row">
	  			<div class="form-group col-md-12">
			      	<label>สถานะชำระเงิน</label>
			      	<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="checkbox" name="status_payment[]" value="1" id="status_payment1">
					  	<label class="form-check-label" for="status_payment1">
					    	เงินสด
					  	</label>
					  	<div class="row ">
					  		<div class="col-4 my-2">
					  			<div class="input-group">
							        <input type="text" class="form-control" name="payment_total1" id="total11" placeholder="จำนวนเงิน" data-validation="required" data-validation-error-msg=" " disabled>
							        <div class="input-group-prepend">
								        <div class="input-group-text">บาท</i></div>
							        </div>
							    </div>
					  		</div>
					  	</div>
					</div>
					<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="checkbox" name="status_payment[]" value="2" id="status_payment2">
					  	<label class="form-check-label" for="status_payment2">
					    	เช็ค
					  	</label>
					  	<div class="row p-3 border" id="distext2">
					  		<div class="col-4 my-2">
					  			<input type="text" class="form-control" name="bank2" placeholder="เช็คธนาคาร" disabled>
					  		</div>
					  		<div class="col-4 my-2">
					  			<input type="text" class="form-control" name="bank_branch" placeholder="สาขา" disabled>
					  		</div>
					  		<div class="col-4 my-2">
					  			<input type="text" class="form-control" name="check_number" placeholder="เลขที่" disabled>
					  		</div>
					  		<div class="col-4 my-2">
					  			<div class="input-group">
					                <div class="input-group-prepend">
								        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
							        </div>
							        <input type="text" name="check_date" class="form-control singledate" disabled>
							    </div>
					  		</div>
					  		<div class="col-4 my-2">
					  			<div class="input-group">
							        <input type="text" class="form-control" name="payment_total2" id="total2" placeholder="จำนวนเงิน" data-validation="required" data-validation-error-msg=" " disabled>
							        <div class="input-group-prepend">
								        <div class="input-group-text">บาท</i></div>
							        </div>
							    </div>
					  		</div>
					  	</div>
					</div>
					<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="checkbox" name="status_payment[]" value="3" id="status_payment3">
					  	<label class="form-check-label" for="status_payment3">
					    	โอน
					  	</label>
					  	<div class="row" id="distext3">
					  		<div class="col-4 my-2">
					  			<input type="text" class="form-control" name="bank3" placeholder="ธนาคาร" disabled>
					  		</div>
					  		<div class="col-4 my-2">
					  			<div class="input-group">
							        <input type="text" class="form-control" name="payment_total3" id="total3" placeholder="จำนวนเงิน" data-validation="required" data-validation-error-msg=" " disabled>
							        <div class="input-group-prepend">
								        <div class="input-group-text">บาท</i></div>
							        </div>
							    </div>
					  		</div>
					  	</div>
					</div>
					<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="checkbox" name="status_payment[]" value="4" id="status_payment4">
					  	<label class="form-check-label" for="status_payment4">
					    	บัตรเครดิต/สาขา
					  	</label>
					  	<div class="row p-3 border" id="distext4">
					  		<div class="col-4 my-2">
					  			<input type="text" class="form-control" name="bank4" placeholder="ธนาคาร" disabled>
					  		</div>
					  		<div class="w-100"></div>
					  		<div class="col-8 my-2">
					  			<div class="form-check form-check-inline">
								  	<input class="form-check-input" type="radio" name="card_type2" id="visa" value="visa" disabled>
								  	<label class="form-check-label" for="visa"><img src="matrix-admin/assets/images/payment/visa1.png"></label>
								</div>
								<div class="form-check form-check-inline">
								  	<input class="form-check-input" type="radio" name="card_type2" id="mastercard" value="mastercard" disabled>
								  	<label class="form-check-label" for="mastercard"><img src="matrix-admin/assets/images/payment/mastercard.png"></label>
								</div>
								<div class="form-check form-check-inline">
								  	<input class="form-check-input" type="radio" name="card_type2" id="jcb" value="jcb" disabled>
								  	<label class="form-check-label" for="jcb"><img src="matrix-admin/assets/images/payment/jcb.png"></label>
								</div>
								<div class="form-check form-check-inline">
								  	<input class="form-check-input" type="radio" name="card_type2" id="american-express" value="american-express" disabled>
								  	<label class="form-check-label" for="american-express"><img src="matrix-admin/assets/images/payment/american-express.png"></label>
								</div>
								<div class="form-check form-check-inline">
								  	<input class="form-check-input" type="radio" name="card_type2" id="diners-club" value="diners-club" disabled>
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
					  			<input type="text" class="form-control" name="card_number" placeholder="เลขที่" disabled>
					  		</div>
					  		<div class="col-4 my-2">
					  			<label>วันหมดอายุของบัตร</label>
					  			<input type="text" class="form-control" name="card_expired_date" disabled>
					  		</div>
					  		<div class="w-100"></div>
					  		<div class="col-6 my-2">
					  			<label>ชื่อ-นามสกุล (ตามบัตร)</label>
					  			<input type="text" class="form-control" name="card_name" disabled>
					  		</div>
					  		<div class="col-4 my-2">
					  			<label>โปรดเรียกเก็บเงินทั้งหมดจำนวน</label>
					  			<div class="input-group">
							        <input type="text" class="form-control" name="payment_total4" placeholder="จำนวนเงิน" data-validation="required" data-validation-error-msg=" " disabled>
							        <div class="input-group-prepend">
								        <div class="input-group-text">บาท</i></div>
							        </div>
							    </div>
					  		</div>
					  		<div class="w-100"></div>
					  		<div class="col-6 my-2">
					  			<label>ความสัมพันธ์กับผู้เอาประกันภัย</label>
					  			<input type="text" class="form-control" name="card_ralationship_name" disabled>
					  		</div>
					  		<div class="col-4 my-2">
					  			<label>เบอร์ติดต่อเจ้าของบัตร</label>
					  			<input type="text" class="form-control" name="card_tel" disabled>
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
					    		<input type="checkbox" name="check_arrears" id="check_arrears" value="check_arrears">
					    	</div>
					  	</div>
				        <input type="text" class="form-control" name="arrears" id="arrears"  placeholder="จำนวนเงิน" disabled>
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
			      			<input type="text" class="form-control" name="installments_number" placeholder="เลขที่ใบเสร็จ">
			      		</div>
			      		<div class="col-4 my-2">
			      			<label>งวดที่</label>
			      			<input type="text" class="form-control" name="installments" placeholder="งวดที่" >
			      		</div>
			      		<div class="w-100"></div>
			      		<div class="col-4 my-2">
			      			<label>วันที่ครบกำหนด</label>
			      			<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<input type="checkbox" name="check_installments_deadline_date" id="check_installments_deadline_date" value="check_installments_deadline_date">
									</div>
								</div>
				                <div class="input-group-prepend">
							        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
						        </div>
						        <input type="text" name="installments_deadline_date" id="installments_deadline_date" class="form-control singledate" value="" autocomplete="off" disabled>
						    </div>
			      		</div>
			      		<div class="col-4 my-2">
			      			<label>จำนวนเงิน</label>
			      			<div class="input-group">
						        <input type="text" class="form-control" name="installments_deadline_amount" placeholder="จำนวนเงิน" >
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
										<input type="checkbox" name="check_pay_date" id="check_pay_date" value="check_pay_date">
									</div>
								</div>
				                <div class="input-group-prepend">
							        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
						        </div>
						        <input type="text" name="installments_pay_date" id="installments_pay_date" class="form-control singledate" value="" autocomplete="off" disabled>
						    </div>
			      		</div>
			      		<div class="col-4 my-2">
			      			<label>จำนวนเงิน</label>
			      			<div class="input-group">
						        <input type="text" class="form-control" name="installments_pay_amount" placeholder="จำนวนเงิน" >
						        <div class="input-group-prepend">
							        <div class="input-group-text">บาท</i></div>
						        </div>
						    </div>
			      		</div>
			      		<div class="w-100"></div>
			      		<div class="col-12 my-2">
			      			<label>หมายเหตุ</label>
			      			<textarea rows="3" class="form-control" name="remark"></textarea>
			      		</div>
			      	</div>
			    </div>
			</div>

			<div align="center">
				<button type="submit" class="btn btn-success btn-lg px-4" id="btn_submit">บันทึก</button>
			</div>
	  	</div>
  	</form>
</div>