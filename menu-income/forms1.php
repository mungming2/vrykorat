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
	<form method="post" action="menu-income/submitforms1.php">
	  	<div class="card-body">
  			<div class="form-row">
                <div class="form-group col-md-6">
			      	<label>เลขที่บิล</label>
				    <input type="text" name="bill_no" class="form-control" placeholder="เลขที่บิล">
			    </div>
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
			      	<label>ประเภท</label>
                    <select class="form-control" name="type1">
                        <option value = "รายรับ">รายรับ</option>
                        <option value = "รายจ่าย">รายจ่าย</option>
                    </select>
			    </div>
                <div class="form-group col-md-4">
			      	<label>ผู้บันทึกข้อมูล</label>
				    <input type="text" name="inform_id" class="form-control" placeholder="ผู้บันทึกข้อมูล">
			    </div>
			</div>
			<div class="form-row">
			    <div class="form-group col-md-6">
			      	<label>รายการรายรับ รายจ่าย</label>
			      	<input type="text" name="list_income" class="form-control" placeholder="รายการรายรับ รายจ่าย">
			    </div>
			</div>
            <div class="form-row">
			    <div class="form-group col-md-12">
                    <label>สถานะการรับ จ่ายเงิน</label>
                    <div class="form-check mb-3 ">
                        <input class="form-check-input" type="radio" name="status_payment" value="1" id="status_payment1" checked>
                        <label class="form-check-label" for="status_payment1">
                            เงินสด
                        </label>
                        <div class="row ">
                            <div class="col-4 my-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="payment_total1" id="total11" placeholder="จำนวนเงิน" >
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">บาท</i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-check mb-3 ">
                        <input class="form-check-input" type="radio" name="status_payment" value="2" id="status_payment2">
                        <label class="form-check-label" for="status_payment2">
                            โอน
                        </label>
                        <div class="row p-3 border" >
                            <div class="col-5 my-2">
                                <input type="text" class="form-control" name="bank2" placeholder="ธนาคาร" >
                            </div>
                            <div class="col-5 my-2">
                                <input type="text" class="form-control" name="bank_branch2" placeholder="สาขา" >
                            </div>
                            <div class="col-5 my-2">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                    </div>
                                    <input type="text" name="payment_date2" class="form-control singledate" >
                                </div>
                            </div>
                            <div class="col-5 my-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="payment_total2" id="total2" placeholder="จำนวนเงิน">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">บาท</i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-check mb-3 ">
                        <input class="form-check-input" type="radio" name="status_payment" value="3" id="status_payment3">
                        <label class="form-check-label" for="status_payment3">
                            เช็ค
                        </label>
                        <div class="row p-3 border" >
                            <div class="col-5 my-2">
                                <input type="text" class="form-control" name="bank3" placeholder="เช็คธนาคาร" >
                            </div>
                            <div class="col-5 my-2">
                                <input type="text" class="form-control" name="bank_branch3" placeholder="สาขา" >
                            </div>
                            <div class="col-5 my-2">
                                <input type="text" class="form-control" name="cheque_number" placeholder="เลขที่">
                            </div>
                            <div class="col-5 my-2">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                    </div>
                                    <input type="text" name="payment_date3" class="form-control singledate" >
                                </div>
                            </div>
                            <div class="col-5 my-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="payment_total3" id="total3" placeholder="จำนวนเงิน">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">บาท</i></div>
                                    </div>
                                </div>
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