<?php if(isset($_GET['status']) && $_GET['status'] == 'success'){ $getStockId = $_GET['search']; ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
	  	<strong>บันทึกแบบฟอร์มสำเร็จ !</strong> 
	  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    	<span aria-hidden="true">&times;</span>
	  	</button>
	</div>
<?php }else if(isset($_GET['status']) && $_GET['status'] == 'fail'){ $getStockId = $_GET['search']; ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
	  	<strong>บันทึกแบบฟอร์มไม่สำเร็จ !</strong> กรุณาลองอีกครั้ง <?='Cause : ' . $_GET['msg']?>
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

	$sql_get_stock = "SELECT id, bill_no, deposit_date, renew, status_register, stock_id, name, tel, address, car_number, tax_date, pay_insurance, pay_tax, pay_fine, pay_change, pay_service, total, appointment_date, sign_depositor, sign_receiver, receiver, return_date FROM registration_renewal  WHERE bill_no = '$getStockId'";
	$query_get_stock = mysqli_query($conn,$sql_get_stock);
	$result_get_row = mysqli_num_rows($query_get_stock);
    $result_get_stock = mysqli_fetch_array($query_get_stock,MYSQLI_ASSOC);

    $check_renew1 = '';
	$check_renew2 = '';
	$check_renew3 = '';

    if(count($result_get_stock['renew']) > 0){
    	foreach(explode(',', $result_get_stock['renew']) as $renew){
	    	if($renew == 1){
				$check_renew1 = 'checked';
			}elseif($renew == 2){
				$check_renew2 = 'checked';
			}elseif($renew == 3){
				$check_renew3 = 'checked';
			}
		}
    }

    $status_register_999 = '';
    $status_register1 = '';
    $status_register2 = '';
    $status_register3 = '';

    if($result_get_stock['status_register'] == 1){
    	$status_register1 = 'checked';
    }elseif($result_get_stock['status_register'] == 2){
    	$status_register2 = 'checked';
    }else{
    	$status_register3 = 'checked';
    	$status_register_999 = $result_get_stock['status_register'];
    }
	
?>

<?php if($result_get_row == 0){  ?>
	<div class="card">
		<div class="card-body">
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  	<strong>ไม่พบเลขที่บิลนี้ในระบบ กรุณาตรวจสอบข้อมูลอีกครั้ง !</strong> 
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    	<span aria-hidden="true">&times;</span>
			  	</button>
			</div>
			<form method="post" action="main.php?page=renewal-edit1">

	  			<div class="form-row ">
	  				<div class="form-group col-md-6">
				      	<label>ค้นหาเลขที่บิล เพื่อทำการดึงข้อมูล</label>
				      	<div class="input-group">
				      		<input type="text" name="search" class="form-control" id="search" placeholder="ค้นหาเลขที่บิล " value="<?=$getStockId?>" autofocus>
				      		<div class="input-group-append">
						    	<button class="btn btn-outline-info" type="submit" id="button-addon2"><i class="fas fa-search"></i> ค้นหา</button>
						  	</div>
						</div>
				    </div>
				    <div class="col-md-4 pt-2" align="right">
				    	<label> </label>
				      	<a href="?page=renewal-forms1" class="btn btn-block btn-secondary" type="button" > กลับไปหน้าเพิ่มฟอร์มรับบริการต่อทะเบียน <i class="fas fa-arrow-right"></i></a>
				    </div>
				</div>
			</form>
			
		</div>
	</div>
<?php }else{ ?>
<div class="card">
	<div class="card-body">
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		  	<strong>พบเลขที่บิลนี้ในระบบ!</strong> 
		  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    	<span aria-hidden="true">&times;</span>
		  	</button>
		</div>
		<form method="post" action="main.php?page=renewal-edit1">
  			<div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>ค้นหาเลขที่บิล เพื่อทำการดึงข้อมูล</label>
			      	<div class="input-group">
			      		<input type="text" name="search" class="form-control" id="search" placeholder="ค้นหาเลขที่บิล " value="<?=$getStockId?>" autofocus>
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
				<button type="button" class="btn btn-success btn-lg" id="btn_print1" onclick="frames['frame1'].print()"><i class="fas fa-print"></i> พิมพ์เอกสารนี้</button>
			</div>
			<div>
				<a href="?page=renewal-forms1" class="btn btn-block btn-secondary" type="button" > กลับไปหน้าเพิ่มฟอร์มรับบริการต่อทะเบียน <i class="fas fa-arrow-right"></i></a>			
			</div>
		</div>
	</div>
</div>
<div class="card">
	<form method="post" action="menu-renewal/submitforms.php?forms=edit1">
	  	<div class="card-body">
	  		<input type="hidden" name="id" value="<?=$result_get_stock['id']?>">
	  		<div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>เลขที่บิล<span class="text-danger">*</span></label>
			      	<input type="text" name="bill_no" class="form-control" id="edit_bill_no" placeholder="เลขที่บิล" data-validation="required" data-validation-error-msg=" " autocomplete="off" value="<?=$getStockId?>">
			      	<div id="check_bill"></div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>วันที่รับฝาก<span class="text-danger">*</span></label>
			      	<div class="input-group">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="deposit_date" class="form-control singledate-getvalue" value="<?=$result_get_stock['deposit_date']?>">
				    </div>
			    </div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label>บริการต่อทะเบียน<span class="text-danger">*</span></label>
					<div class="w-100"></div>
	  				<div class="form-check form-check-inline">
					  	<input class="form-check-input" type="checkbox" name="renew[]" id="type1" value="1" <?=$check_renew1?>>
					  	<label class="form-check-label" for="type1">ควบพรบ.</label>
					</div>
					<div class="form-check form-check-inline">
					  	<input class="form-check-input" type="checkbox" name="renew[]" id="type2" value="2" <?=$check_renew2?>>
					  	<label class="form-check-label" for="type2">ต่อภาษีรถยนต์</label>
					</div>
					<div class="form-check form-check-inline">
					  	<input class="form-check-input" type="checkbox" name="renew[]" id="type3" value="3" <?=$check_renew3?>>
					  	<label class="form-check-label" for="type3">ต่อภาษีรถจักรยานยนต์</label>
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12" id="radio_status">
					<label>เอกสารที่ฝากมาด้วย<span class="text-danger">*</span></label>
					<div class="w-100"></div>
	  				<div class="form-check mb-3">
					  	<input class="form-check-input" type="radio" name="status_register" id="status_register1" value="1"  <?=$status_register1?>>
					  	<label class="form-check-label" for="status_register1">สำเนาทะเบียนรถ</label>
					</div>
					<div class="form-check mb-3">
					  	<input class="form-check-input" type="radio" name="status_register" id="status_register2" value="2" <?=$status_register2?>>
					  	<label class="form-check-label" for="status_register2">สมุดทะเบียนรถ</label>
					</div>
					<div class="form-check mb-3">
					  	<input class="form-check-input" type="radio" name="status_register" id="status_register3" value="999" <?=$status_register3?>>
					  	<label class="form-check-label pr-3" for="status_register3">อื่นๆ </label>
					  	<div class="row">
					  		<div class="col-md-6 my-2">
					  			<input type="text" name="status_register_999" id="status_register_999" class="form-control" disabled value="<?=$status_register_999?>">
					  		</div>
					  	</div>
					</div>
				</div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>เลขที่กรมธรรม์พรบ.<span class="text-danger">*</span></label>
			      	<input type="text" name="stock_id" class="form-control" id="renew_stock_id" placeholder="เลขที่กรมธรรม์พรบ." data-validation="required" data-validation-error-msg=" " autocomplete="off" value="<?=$result_get_stock['stock_id']?>">
			      	<div id="check_stock"></div>
			    </div>
			</div>
			<div class="border p-3 mb-3">
				<div class="form-row">
	  				<div class="form-group col-md-6">
				      	<label>ชื่อผู้เอาประกัน<span class="text-danger">*</span></label>
				      	<input type="text" name="name" class="form-control" id="renew_name" placeholder="ชื่อผู้เอาประกัน" data-validation="required" data-validation-error-msg=" " autocomplete="off" value="<?=$result_get_stock['name']?>">
				    </div>
				    <div class="form-group col-md-6">
				      	<label>เบอร์โทรศัพท์<span class="text-danger">*</span></label>
				      	<input type="text" name="tel" class="form-control" id="renew_tel" placeholder="เบอร์โทรศัพท์" data-validation="required" data-validation-error-msg=" " autocomplete="off" value="<?=$result_get_stock['tel']?>">
				    </div>
				</div>
				<div class="form-row ">
	  				<div class="form-group col-md-12">
				      	<label>ที่อยู่</label>
				      	<input type="text" name="address" class="form-control" id="renew_address" placeholder="ที่อยู่"  autocomplete="off" value="<?=$result_get_stock['address']?>">
				    </div>
				</div>
				<div class="form-row ">
	  				<div class="form-group col-md-4">
				      	<label>ทะเบียนรถ</label>
				      	<input type="text" name="car_number" class="form-control" id="renew_car_number" placeholder="ทะเบียนรถ"  autocomplete="off" value="<?=$result_get_stock['car_number']?>">
				    </div>
				</div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>วันครบกำหนดชำระภาษี</label>
			      	<div class="input-group">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="tax_date" class="form-control singledate-getvalue" value="<?=$result_get_stock['tax_date']?>">
				    </div>
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-4">
			      	<label>ค่าเบี้ยประกัน พรบ.</label>
			      	<div class="input-group">
				        <input type="text" class="form-control" name="pay_insurance" id="pay_insurance" placeholder="จำนวนเงิน" value="<?=$result_get_stock['pay_insurance']?>">
				        <div class="input-group-prepend">
					        <div class="input-group-text">บาท</i></div>
				        </div>
				    </div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ค่าภาษีรถ</label>
			      	<div class="input-group">
				        <input type="text" class="form-control" name="pay_tax" id="pay_tax" placeholder="จำนวนเงิน" value="<?=$result_get_stock['pay_tax']?>">
				        <div class="input-group-prepend">
					        <div class="input-group-text">บาท</i></div>
				        </div>
				    </div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ค่าปรับ</label>
			      	<div class="input-group">
				        <input type="text" class="form-control" name="pay_fine" id="pay_fine" placeholder="จำนวนเงิน" value="<?=$result_get_stock['pay_fine']?>">
				        <div class="input-group-prepend">
					        <div class="input-group-text">บาท</i></div>
				        </div>
				    </div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ค่าเปลี่ยนเล่ม</label>
			      	<div class="input-group">
				        <input type="text" class="form-control" name="pay_change" id="pay_change" placeholder="จำนวนเงิน" value="<?=$result_get_stock['pay_change']?>">
				        <div class="input-group-prepend">
					        <div class="input-group-text">บาท</i></div>
				        </div>
				    </div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>ค่าบริการ (อื่น)</label>
			      	<div class="input-group">
				        <input type="text" class="form-control" name="pay_service" id="pay_service" placeholder="จำนวนเงิน">
				        <div class="input-group-prepend">
					        <div class="input-group-text">บาท</i></div>
				        </div>
				    </div>
			    </div>
			    <div class="form-group col-md-4">
			      	<label>รวมเงิน</label>
			      	<div class="input-group">
				        <input type="text" class="form-control" name="total" id="total" placeholder="จำนวนเงิน" value="<?=$result_get_stock['total']?>">
				        <div class="input-group-prepend">
					        <div class="input-group-text">บาท</i></div>
				        </div>
				    </div>
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-12 mb-1">
			      	<label>หมายเหตุ: (โปรดนำใบรับนี้มายื่นเพื่อขอรับคืนสมุดคู่มือต่อภาษีรถ )</label>
			    </div>
			    <div class="form-group col-md-6">
			    	<label>นัดรับวันที่</label>
			      	<div class="input-group">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="appointment_date" class="form-control singledate-getvalue" value="<?=$result_get_stock['appointment_date']?>">
				    </div>
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>ลงชื่อ</label>
			      	<div class="input-group">
				        <input type="text" class="form-control" name="sign_depositor" id="sign_depositor" placeholder="ชื่อผู้ฝาก" value="<?=$result_get_stock['sign_depositor']?>">
				        <div class="input-group-prepend">
					        <div class="input-group-text">ผู้ฝาก</i></div>
				        </div>
				    </div>
			    </div>
			    <div class="form-group col-md-6">
			      	<label>ลงชื่อ</label>
			      	<div class="input-group">
				        <input type="text" class="form-control" name="sign_receiver" id="sign_receiver" placeholder="ชื่อผู้รับฝาก" value="<?=$result_get_stock['sign_receiver']?>">
				        <div class="input-group-prepend">
					        <div class="input-group-text">ผู้รับฝาก</i></div>
				        </div>
				    </div>
			    </div>
			</div>
			<div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>ผู้รับเอกสาร</label>
			      	<input type="text" name="receiver" class="form-control" id="receiver" placeholder="ผู้รับเอกสาร" value="<?=$result_get_stock['receiver']?>">
			    </div>
			    <div class="form-group col-md-4">
			      	<label>วันที่คืนเอกสาร</label>
			      	<div class="input-group">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="return_date" class="form-control singledate-getvalue" value="<?=$result_get_stock['return_date']?>">
				    </div>
			    </div>
			</div>
	  		<div align="center">
				<button type="submit" id="btn_submit" class="btn btn-success btn-lg px-4">บันทึก</button>
			</div>
	  	</div>

	</form>
</div>
<iframe src="menu-renewal/print_forms1.php?search=<?=$getStockId?>" name="frame1" style="width:0; height:0; border:0; border:none"></iframe>

<?php } ?>