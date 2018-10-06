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
<?php } 

	$sql_user = "SELECT agent_id, name FROM agent ORDER BY agent_id ASC";
	$query_user = mysqli_query($conn,$sql_user);
	$result_user = mysqli_fetch_all($query_user,MYSQLI_ASSOC);

	$sql_province = "SELECT PROVINCE_ID, PROVINCE_NAME FROM province";
    $query_province = mysqli_query($conn,$sql_province);
	$result_province = mysqli_fetch_all($query_province,MYSQLI_ASSOC);
	
?>
<div class="card">
	<div class="card-body">
		<form method="post" action="main.php?page=miscellany-edit2">
  			<div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>ค้นหาเลขกรมธรรม์ / ทะเบียนรถ / เลขรับแจ้ง / ชื่อผู้เอาประกัน เพื่อทำการดึงข้อมูล</label>
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
	<form method="post" action="menu-miscellany/submitforms2.php">
		<div class="card-header text-white bg-info">ข้อมูลกรมธรรม์ </div>
	  	<div class="card-body">
  			<div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>วันที่แจ้งประกันภัย</label>
			      	<div class="input-group">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="insure_date" class="form-control singledate">
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
				        <input type="text" name="inform_id" class="form-control" placeholder="ผู้รับแจ้ง">
				    </div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ประเภทประกัน</label>
				    <input type="text" name="insure_type" class="form-control" placeholder="ประเภทประกัน">
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-4">
			      	<label>เลขรับแจ้ง</label>
				    <input type="text" name="inform_code" class="form-control" placeholder="เลขรับแจ้ง">
			    </div>
			    <div class="form-group col-md-2">
			      	<label>ระบุปี</label>
			      	<input type="text" name="year_stock" class="form-control" placeholder="ระบุปี">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>เลขที่กรมธรรม์</label>
			      	<input type="text" name="stock_id" id="stock_id" class="form-control" placeholder="เลขที่กรมธรรม์">
			    </div>
			</div>
		</div>
		<div class="card-header text-white bg-info">ข้อมูลผู้เอาประกัน</div>
	  	<div class="card-body">
			<div class="form-row">
  				<div class="form-group col-md-5">
			      	<label>ผู้เอาประกัน</label>
				    <input type="text" name="cus_name" class="form-control" placeholder="ผู้เอาประกัน">
			    </div>
			    <div class="form-group col-md-5">
			      	<label>เลขที่บัตรประชาชน/เลขที่ประจำตัวผู้เสียภาษีอากร</label>
			      	<input type="text" name="cus_card_id" class="form-control">
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-5">
			      	<label>อาชีพ</label>
				    <input type="text" name="cus_occupation" class="form-control" placeholder="อาชีพ">
			    </div>
			    <div class="form-group col-md-3">
			      	<label>อายุ</label>
			      	<div class="input-group">
				        <input type="text" name="cus_age" class="form-control">
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
				        <input type="text" name="birth_date" class="form-control">
				    </div>
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>ที่อยู่ผู้เอาประกัน</label>
				    <textarea rows="3" placeholder="ระบุที่อยู่" name="cus_address1" class="form-control"></textarea>
			    </div>
			    <div class="form-group col-md-6">
			      	<label>สถานที่ตั้งหรือเก็บทรัพย์สินผู้เอาประกัน (ถ้ามี)</label>
				    <textarea rows="3" placeholder="ระบุที่อยู่" name="cus_address2" class="form-control"></textarea>
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>เบอร์โทร</label>
				    <input type="text" name="cus_tel" class="form-control" placeholder="เบอร์โทร">
			    </div>
			</div>
		</div>
		<div class="card-header text-white bg-info">ข้อมูลรถ</div>
	  	<div class="card-body">
			<div class="form-row">
				<div class="form-group col-md-8">
  					<label>ทะเบียนรถ</label>
  					<div class="row">
  						<div class="col-md-4">
  							<input type="text" name="car_number" class="form-control" placeholder="เลขทะเบียน">
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
			    <div class="form-group col-md-5">
			      	<label>ยี่ห้อรถ</label>
			      	<input type="text" name="car_brand" class="form-control" placeholder="ยี่ห้อรถ">
			    </div>
			    <div class="form-group col-md-5">
			      	<label>รุ่นรถ</label>
			      	<input type="text" name="car_modal" class="form-control" placeholder="รุ่นรถ">
			    </div>
			</div>
			<div class="form-row">
			    <div class="form-group col-md-3">
			      	<label>ปีรุ่น</label>
			      	<input type="text" class="form-control" name="car_year" placeholder="ปีรุ่น">
			    </div>
			    <div class="form-group col-md-3">
			      	<label>สีรถ</label>
			      	<input type="text" class="form-control" name="car_color" placeholder="สีรถ">
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
  				<div class="form-group col-md-5">
			      	<label>ตัวถังรถ</label>
			      	<input type="text" class="form-control" name="car_chassis" placeholder="ตัวถังรถ">
			    </div>
			    <div class="form-group col-md-5">
			      	<label>เลขเครื่องยนต์</label>
			      	<input type="text" class="form-control" name="car_body" placeholder="เลขเครื่องยนต์">
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-5">
			      	<label>ราคารถ</label>
			      	<div class="input-group">
				        <input type="text" class="form-control" name="car_price" placeholder="จำนวนเงิน" >
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
				        <input type="text" name="save_date[]" class="form-control singledate">
				    </div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>สิ้นสุด</label>
			      	<div class="input-group">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="save_date[]" class="form-control single-end-1year">
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
			      	<label>ระยะเวลาประกันภัย</label>
			      	<div class="input-group">
				        <input type="text" class="form-control" name="insure_duration" >
				        <div class="input-group-prepend">
					        <div class="input-group-text">ปี</i></div>
				        </div>
				    </div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ทุนประกันภัย</label>
			      	<div class="input-group">
				        <input type="text" class="form-control" name="insure_total" placeholder="จำนวนเงิน" >
				        <div class="input-group-prepend">
					        <div class="input-group-text">บาท</i></div>
				        </div>
				    </div>
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-4">
			      	<label>รหัสภัย (ถ้ามี)</label>
			      	<input type="text" class="form-control" name="insure_code" placeholder="รหัสภัย (ถ้ามี)">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>เบี้ยสุทธิ</label>
			      	<input type="text" class="form-control" name="insure_net" placeholder="เบี้ยสุทธิ">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ภาษี</label>
			      	<input type="text" class="form-control" name="insure_tax" placeholder="ภาษี">
			    </div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
			      	<label>อากร</label>
			      	<input type="text" class="form-control" name="insure_duty" placeholder="อากร">
			    </div>
  				<div class="form-group col-md-4">
			      	<label>เบี้ยรวม</label>
			      	<input type="text" class="form-control" name="insure_total2" placeholder="เบี้ยรวม">
			    </div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-5">
			      	<label>ผู้รับผลประโยชน์</label>
			      	<input type="text" class="form-control" name="insure_beneficiary" placeholder="ผู้รับผลประโยชน์">
			    </div>
  				<div class="form-group col-md-5">
			      	<label>ความสัมพันธ์ผู้เอาประกัน</label>
			      	<input type="text" class="form-control" name="insure_ralationship_name" placeholder="ความสัมพันธ์ผู้เอาประกัน">
			    </div>
			</div>
			<div class="form-row">
	  			<div class="form-group col-md-12">
			      	<label>สถานะ</label>
			      	<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="insure_status" value="1" id="status1" checked>
					  	<label class="form-check-label" for="status1">
					    	ต่ออายุ
					  	</label>
					  	<div class="row">
					  		<div class="col-5 my-2">
					  			<input type="text" class="form-control" name="insure_status_stock" placeholder="เลขที่กรมธรรม์">
					  		</div>
					  	</div>
					</div>
					<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="insure_status" value="2" id="status2" >
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
					  	<input class="form-check-input" type="radio" name="insure_status2" value="1" id="status1" checked>
					  	<label class="form-check-label" for="status1">
					    	ควบ พรบ.
					  	</label>
					  	<div class="row">
					  		<div class="col-5 my-2">
					  			<input type="text" class="form-control" name="insure_status2_stock1" placeholder="เลขที่กรมธรรม์">
					  		</div>
					  	</div>
					</div>
					<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="insure_status2" value="2" id="status2" >
					  	<label class="form-check-label" for="status1">
					    	ควบ สมัครใจ
					  	</label>
					  	<div class="row">
					  		<div class="col-5 my-2">
					  			<input type="text" class="form-control" name="insure_status2_stock2" placeholder="เลขที่กรมธรรม์">
					  		</div>
					  	</div>
					</div>
					<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="insure_status2" value="3" id="status3" >
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
					  	<input class="form-check-input" type="radio" name="cus_type" value="vip" id="cus_type1" checked>
					  	<label class="form-check-label" for="cus_type1">
					    	VIP
					  	</label>
					  	<div class="row">
					  		<div class="col-6 my-2">
					  			<input type="text" class="form-control" name="cus_type_detail1" placeholder="บริษัท / ห้างร้าน">
					  		</div>
					  	</div>
					</div>
					<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="cus_type" value="ตัวแทน" id="cus_type2" >
					  	<label class="form-check-label" for="cus_type2">
					    	ตัวแทน
					  	</label>
					  	<div class="row">
					  		<div class="col-6 my-2">
								<select class="form-control selectOptions" name="cus_type_detail2">
									<option value='no'>โปรดเลือกตัวแทน</option>
									<?php foreach ($result_user as $key => $value) { 
										echo "<option value='".$value['agent_id']."'>".$value['agent_id']." - ".$value['name']."</option>";
									} ?>
								</select>
					  		</div>
					  	</div>
					</div>
					<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="cus_type" value="2" id="status2" >
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
				        <input type="text" name="stock_date" class="form-control singledate">
				    </div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>วันที่ออกกรมธรรม์</label>
			      	<div class="input-group">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="create_stock_date" class="form-control singledate">
				    </div>
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
	  	<?php include 'payment_info.php'; ?>
	</form>
</div>