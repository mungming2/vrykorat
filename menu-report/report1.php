<div class="row">
	<div class="col-12">
		<?php if(isset($_GET['status']) && $_GET['status'] == 'success'){ ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
			  	<strong>ลบแบบฟอร์มสำเร็จ !</strong> 
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    	<span aria-hidden="true">&times;</span>
			  	</button>
			</div>
		<?php }else if(isset($_GET['status']) && $_GET['status'] == 'fail'){ ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  	<strong>ลบแบบฟอร์มไม่สำเร็จ !</strong> กรุณาลองอีกครั้ง <?='Cause : ' . $_GET['msg']?>
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    	<span aria-hidden="true">&times;</span>
			  	</button>
			</div>
		<?php } ?>
		<div class="card">
			<div class="card-body">
				<form class="form-horizontal" method="post" id="form_report" >
					<div class="form-group row">
                        <label for="name" class="col-lg-4 text-lg-right control-label col-form-label">เลือกวันที่สิ้นสุดความคุ้มครอง</label>
                        <div class="col-lg-6">
                            <div class="input-group">
				                <div class="input-group-prepend">
							        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
						        </div>
						        <input type="text" name="select_date" class="form-control rangedate-clear" value="" autocomplete="off">
						    </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 text-lg-right control-label col-form-label">ประเภทรายงาน</label>
                        <div class="col-lg-6 mt-2">
			  				<div class="form-check form-check-inline">
							  	<input class="form-check-input" type="radio" name="type" id="report_type1" value="1" checked>
							  	<label class="form-check-label" for="report_type1">พรบ.</label>
							</div>
							<div class="form-check form-check-inline">
							  	<input class="form-check-input" type="radio" name="type" id="report_type2" value="2">
							  	<label class="form-check-label" for="report_type2">สมัครใจ</label>
							</div>
                            <div class="form-check form-check-inline">
							  	<input class="form-check-input" type="radio" name="type" id="report_type3" value="3">
							  	<label class="form-check-label" for="report_type3">เบ็ดเตล็ดอุบัติเหตุ/สุขภาพ/อื่นๆ</label>
							</div>
                            <div class="form-check form-check-inline">
							  	<input class="form-check-input" type="radio" name="type" id="report_type4" value="4">
							  	<label class="form-check-label" for="report_type4">เกี่ยวกับรถ</label>
							</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 text-lg-right control-label col-form-label">ประเภทลูกค้า</label>
                        <div class="col-lg-6 mt-2">
			  				<div class="form-check form-check-inline">
							  	<input class="form-check-input" type="radio" name="cus_type" id="cus_type1" value="1" checked>
							  	<label class="form-check-label" for="cus_type1">ทั้งหมด</label>
							</div>
							<div class="form-check form-check-inline">
							  	<input class="form-check-input" type="radio" name="cus_type" id="cus_type2" value="2">
							  	<label class="form-check-label" for="cus_type2">ตัวแทน</label>
							</div>
                            <div class="form-check form-check-inline">
							  	<input class="form-check-input" type="radio" name="cus_type" id="cus_type3" value="3">
							  	<label class="form-check-label" for="cus_type3">VIP</label>
							</div>
                            <div class="form-check form-check-inline">
							  	<input class="form-check-input" type="radio" name="cus_type" id="cus_type4" value="4">
							  	<label class="form-check-label" for="cus_type4">ทั่วไป</label>
							</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 text-lg-right control-label col-form-label">ค้นหา</label>
                        <div class="col-lg-6">
                           	<input type="text" name="search" class="form-control" placeholder="ค้นหาสำหรับตัวแทน / VIP">
                        </div>
                    </div>
                    <div class="row border-top justify-content-center">
                    	<div class="col-lg-3 mt-3">
                    		<button type="button" name="submit_report_other1" id="submit_report_other1" class="btn btn-info btn-block">ออกรายงาน</button>
                    	</div>
                        
                    </div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-12" style="display: none;" id="showTable1">
		<div class="card">
            <div class="card-body">
				<table id="report_other1" class="table table-striped table-bordered nowrap" style="width:100%">
				</table>
			</div>
		</div>
	</div>
	<div class="col-12" style="display: none;" id="showTable2">
		<div class="card">
            <div class="card-body">
				<table id="report_other2" class="table table-striped table-bordered nowrap" style="width:100%">
				</table>
			</div>
		</div>
	</div>
	<div class="col-12" style="display: none;" id="showTable3">
		<div class="card">
            <div class="card-body">
				<table id="report_other3" class="table table-striped table-bordered nowrap" style="width:100%">
				</table>
			</div>
		</div>
	</div>
	<div class="col-12" style="display: none;" id="showTable4">
		<div class="card">
            <div class="card-body">
				<table id="report_other4" class="table table-striped table-bordered nowrap" style="width:100%">
				</table>
			</div>
		</div>
	</div>
</div>