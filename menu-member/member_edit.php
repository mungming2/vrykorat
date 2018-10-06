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
<?php
    $sql_user = "SELECT mem_name,mem_username,mem_policy FROM member WHERE mem_username = '".$_GET['mem_username']."' ";
    $query_user = mysqli_query($conn,$sql_user);
    $result_user = mysqli_fetch_array($query_user,MYSQLI_ASSOC);	
    $menu1 = '';
    $menu2 = '';
    $menu3 = '';
    $menu4 = '';
    $menu5 = '';
    $menu6 = '';
    $menu7 = '';
    $menu8 = '';
    $menu9 = '';
    $mem_policy = explode(',',$result_user['mem_policy']);
    foreach ($mem_policy as $key => $value) {
        if($value == 1){
            $menu1 = 'checked';
        }elseif($value == 2){
            $menu2 = 'checked';
        }elseif($value == 3){
            $menu3 = 'checked';
        }elseif($value == 4){
            $menu4 = 'checked';
        }elseif($value == 5){
            $menu5 = 'checked';
        }elseif($value == 6){
            $menu6 = 'checked';
        }elseif($value == 7){
            $menu7 = 'checked';
        }elseif($value == 8){
            $menu8 = 'checked';
        }elseif($value == 9){
            $menu8 = 'checked';
        }
    }
?>

<div class="row">
	<div class="col-12">
		<div class="card">
			<form class="form-horizontal" method="post" action="menu-member/submitforms.php?forms=edit">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-lg-3 text-lg-right control-label col-form-label">ชื่อ-สกุล</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="mem_name" placeholder="ชื่อ-สกุล" data-validation="required" data-validation-error-msg="กรุณากรอกข้อมูล" value="<?=$result_user['mem_name']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-lg-3 text-lg-right control-label col-form-label">ชื่อผู้ใช้</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="mem_username" placeholder="ชื่อผู้ใช้ " value="<?=$result_user['mem_username']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 text-lg-right control-label col-form-label">สิทธิ์การเข้าเมนู</label>
                        <div class="col-lg-9">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="menu1" name="select_menu[]" value="1" <?=$menu1?>>
                                <label class="custom-control-label" for="menu1">ข้อมูลสต็อก</label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="menu2" name="select_menu[]" value="2" <?=$menu2?>>
                                <label class="custom-control-label" for="menu2">งานรับประกัน</label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="menu3" name="select_menu[]" value="3" <?=$menu3?>>
                                <label class="custom-control-label" for="menu3">เบ็ดเตล็ด</label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="menu4" name="select_menu[]" value="4" <?=$menu4?>>
                                <label class="custom-control-label" for="menu4">รับบริการต่อทะเบียน</label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="menu5" name="select_menu[]" value="5" <?=$menu5?>>
                                <label class="custom-control-label" for="menu5">รายงานอื่นๆ</label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="menu6" name="select_menu[]" value="6" <?=$menu6?>>
                                <label class="custom-control-label" for="menu6">พิมพ์เอกสาร</label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="menu7" name="select_menu[]" value="7" <?=$menu7?>>
                                <label class="custom-control-label" for="menu7">สำนักงาน</label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="menu8" name="select_menu[]" value="8" <?=$menu8?>>
                                <label class="custom-control-label" for="menu8">ตัวแทน</label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="menu9" name="select_menu[]" value="9" <?=$menu9?>>
                                <label class="custom-control-label" for="menu9">การจัดการสมาชิก</label>
                            </div>
                        </div>
                    </div>
                    <div class="row border-top justify-content-center">
                        <div class="col-lg-3 mt-3">
                            <button type="submit" class="btn btn-success btn-lg btn-block">บันทึก</button>
                        </div>
                        
                    </div>
                </div>
            </form>
		</div>
	</div>
</div>