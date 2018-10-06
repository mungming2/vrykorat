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
	<form method="post" action="menu-income/submitforms2.php">
	  	<div class="card-body">
  			<div class="form-row">
  				<div class="form-group col-md-4">
			      	<label>วันที่รับเช็ค</label>
			      	<div class="input-group">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="receive_cheque_date" class="form-control singledate">
				    </div>
			    </div>
			</div>
			<div class="form-row">
                <div class="form-group col-md-6">
			      	<label>เช็คธนาคาร</label>
				    <input type="text" name="bank" class="form-control" placeholder="เช็คธนาคาร">
			    </div>
                <div class="form-group col-md-4">
			      	<label>สาขา</label>
				    <input type="text" name="bank_branch" class="form-control" placeholder="สาขา">
			    </div>
			</div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label>เช็คลงวันที่</label>
			      	<div class="input-group">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="cheque_date" class="form-control singledate">
				    </div>
			    </div>
                <div class="form-group col-md-4">
			      	<label>จำนวนเงิน</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="payment_total" placeholder="จำนวนเงิน" >
                        <div class="input-group-prepend">
                            <div class="input-group-text">บาท</i></div>
                        </div>
                    </div>
			    </div>
			</div>
            <div class="form-row">
			    <div class="form-group col-md-12">
                    <label>เช็คสั่งจ่าย</label>
                    <div class="form-check mb-3 ">
                        <input class="form-check-input" type="radio" name="owner_payment" value="1" id="owner_payment1" checked>
                        <label class="form-check-label" for="owner_payment1">
                            เงินสด
                        </label>
                    </div>
                    <div class="form-check mb-3 ">
                        <input class="form-check-input" type="radio" name="owner_payment" value="2" id="owner_payment2">
                        <label class="form-check-label" for="owner_payment2">
                            คุณสมเกียรติ อินทรานุปกรณ์
                        </label>
                    </div>
                    <div class="form-check mb-3 ">
                        <input class="form-check-input" type="radio" name="owner_payment" value="3" id="owner_payment3">
                        <label class="form-check-label" for="owner_payment3">
                            บริษัท วิริยะประกันภัย จำกัด (มหาชน)
                        </label>
                    </div>
                </div>
			</div>	
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>รายการสั่งจ่ายเช็ค เลขที่กรมธรรม์</label>
				    <input type="text" name="stock_id" class="form-control" placeholder="เลขที่กรมธรรม์">
			    </div>
			</div>
            <div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>รายการควบ (ถ้ามี)</label>
			      	<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="list" value="1" id="list1" checked>
					  	<label class="form-check-label" for="list1">
					    	พรบ.เลขที่
					  	</label>
					  	<div class="row">
					  		<div class="col-12 my-2">
					  			<input type="text" class="form-control" name="list_detail1">
					  		</div>
					  	</div>
					</div>
					<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="list" value="2" id="list2" >
					  	<label class="form-check-label" for="list2">
					    	ประกันภัยประเภทอื่นๆ ระบุ
					  	</label>
                        <div class="row">
					  		<div class="col-12 my-2">
                              <textarea rows="2" class="form-control" name="list_detail2"></textarea>
					  		</div>
					  	</div>
					</div>
			    </div>
			</div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>เจ้าของเช็ค</label>
				    <input type="text" name="owner_cheque" class="form-control" placeholder="เจ้าของเช็ค">
			    </div>
			</div>
            <div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>สถานะเช็ค</label>
			      	<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="cheque_status" value="1" id="cheque_status1" checked>
					  	<label class="form-check-label" for="cheque_status1">
					    	เข้าบัญชี วันที่
					  	</label>
					  	<div class="row">
					  		<div class="col-12 my-2">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
									</div>
									<input type="text" name="cheque_status_detail1" class="form-control singledate">
								</div>
					  		</div>
					  	</div>
					</div>
                    <div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="cheque_status" value="2" id="cheque_status2">
					  	<label class="form-check-label" for="cheque_status2">
					    	นำเช็คเคลียร์เบี้ย วันที่เคลียร์
					  	</label>
					  	<div class="row">
					  		<div class="col-12 my-2">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
									</div>
									<input type="text" name="cheque_status_detail2" class="form-control singledate">
								</div>
					  		</div>
					  	</div>
					</div>
					<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="cheque_status" value="3" id="cheque_status3" >
					  	<label class="form-check-label" for="cheque_status3">
					    	อื่นๆ ระบุ
					  	</label>
                        <div class="row">
					  		<div class="col-12 my-2">
                              <textarea rows="2" class="form-control" name="cheque_status_detail3"></textarea>
					  		</div>
					  	</div>
					</div>
			    </div>
			</div>
            <div align="center">
                <button type="submit" id="btn_submit" class="btn btn-success btn-lg px-4">บันทึก</button>
            </div>
	  	</div>
	</form>
</div>