<?php if(isset($_GET['status']) && $_GET['status'] == 'success'){ ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
	  	<strong>บันทึกแบบฟอร์มสำเร็จ !</strong> 
	  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    	<span aria-hidden="true">&times;</span>
	  	</button>
	</div>
<?php }else if(isset($_GET['status']) && $_GET['status'] == 'fail'){ ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
	  	<strong>บันทึกแบบฟอร์มไม่สำเร็จ !</strong> กรุณาลองอีกครั้ง <?='สาเหตุ : ' . $_GET['msg']?>
	  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    	<span aria-hidden="true">&times;</span>
	  	</button>
	</div>
<?php } ?>

<div class="row">
	<div class="col-12">
		<div class="card">
			<form class="form-horizontal" method="post" action="menu-member/submitforms.php?forms=add">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-lg-3 text-lg-right control-label col-form-label">ชื่อ-สกุล</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="mem_name" placeholder="ชื่อ-สกุล" data-validation="required" data-validation-error-msg="กรุณากรอกข้อมูล">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-lg-3 text-lg-right control-label col-form-label">ชื่อผู้ใช้</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="mem_username" placeholder="ชื่อผู้ใช้ " data-validation="required" data-validation-error-msg="กรุณากรอกข้อมูล">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-lg-3 text-lg-right control-label col-form-label">รหัสผ่าน</label>
                        <div class="col-lg-6">
                            <input type="password" class="form-control" name="mem_password" placeholder="รหัสผ่าน" data-validation="length" data-validation-length="min4" data-validation-error-msg="กรุณากรอกรหัสผ่านไม่น้อยกว่า 4 ตัว">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 text-lg-right control-label col-form-label">สิทธิ์การเข้าเมนู</label>
                        <div class="col-lg-9">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="menu1" name="select_menu[]" value="1" checked>
                                <label class="custom-control-label" for="menu1">ข้อมูลสต็อก</label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="menu2" name="select_menu[]" value="2" checked>
                                <label class="custom-control-label" for="menu2">งานรับประกัน</label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="menu3" name="select_menu[]" value="3" checked>
                                <label class="custom-control-label" for="menu3">เบ็ดเตล็ด</label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="menu4" name="select_menu[]" value="4" checked>
                                <label class="custom-control-label" for="menu4">รับบริการต่อทะเบียน</label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="menu5" name="select_menu[]" value="5" checked>
                                <label class="custom-control-label" for="menu5">รายงานอื่นๆ</label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="menu6" name="select_menu[]" value="6" checked>
                                <label class="custom-control-label" for="menu6">พิมพ์เอกสาร</label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="menu7" name="select_menu[]" value="7" checked>
                                <label class="custom-control-label" for="menu7">สำนักงาน</label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="menu8" name="select_menu[]" value="8" checked>
                                <label class="custom-control-label" for="menu8">ตัวแทน</label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="menu9" name="select_menu[]" value="9" checked>
                                <label class="custom-control-label" for="menu9">การจัดการสมาชิก</label>
                            </div>
                        </div>
                    </div>
                    <div class="row border-top justify-content-center">
                        <div class="col-lg-3 mt-3">
                            <button type="submit" class="btn btn-success btn-lg btn-block">เพิ่มสมาชิก</button>
                        </div>
                        
                    </div>
                </div>
            </form>
		</div>
	</div>
</div>