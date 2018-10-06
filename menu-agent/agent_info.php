<?php

	$get_agent = $_GET['agent_id'];
    $sql_user = "SELECT agent_id, name, card_id, license_id, email, address, tel, fax, insure, commision, payment, cheque_bank, cheque_branch, cheque_no, cheque_date, rate, decimal_point, remark,login_id, update_date FROM agent WHERE no = '$get_agent'";
    $query_user = mysqli_query($conn,$sql_user);
    $result_user = mysqli_fetch_array($query_user,MYSQLI_ASSOC);

    $decimal_point = '';

    if($result_user['decimal_point'] == 'yes'){
        $decimal_point = 'แบบไม่ตัดจุดทศนิยม';
    }else{
        $decimal_point = 'แบบตัดจุดทศนิยม';
    }

?>

<div class="row">
	<div class="col-12">
		<div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-lg-3 text-lg-right control-label col-form-label">รหัสตัวแทน</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control-plaintext" value="<?=$result_user['agent_id']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-lg-3 text-lg-right control-label col-form-label">ชื่อ-สกุล</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control-plaintext" name="name" id="name"  value="<?=$result_user['name']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="card_id" class="col-lg-3 text-lg-right control-label col-form-label">บัตรประชาชน</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control-plaintext" name="card_id" id="card_id" value="<?=$result_user['card_id']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="license_id" class="col-lg-3 text-lg-right control-label col-form-label">เลขที่ใบอนุญาติตัวแทน</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control-plaintext" name="license_id" id="license_id" value="<?=$result_user['license_id']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-lg-3 text-lg-right control-label col-form-label">อีเมล</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control-plaintext" name="email" id="email" value="<?=$result_user['email']?>" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-lg-3 text-lg-right control-label col-form-label">ที่อยู่</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control-plaintext" name="address" value="<?=$result_user['address']?>"> 
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tel" class="col-lg-3 text-lg-right control-label col-form-label">เบอร์โทรศัพท์</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control-plaintext" name="tel" id="tel"  value="<?=$result_user['tel']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fax" class="col-lg-3 text-lg-right control-label col-form-label">โทรสาร</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control-plaintext" name="fax" id="fax" value="<?=$result_user['fax']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-lg-3 text-lg-right control-label col-form-label">เงินค้ำประกัน</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control-plaintext" value="<?=$result_user['insure']?> บาท">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 text-lg-right control-label col-form-label"></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control-plaintext"  value="<?=$result_user['payment']?>">
                    </div>
                <?php if($result_user['payment'] == 'เช็ค'){ ?>
                    <div class="w-100"></div>
                    <label class="offset-3 col-lg-2 control-label col-form-label">เช็คธนาคาร : <?=$result_user['cheque_bank']?></label>
                    <div class="w-100"></div>
                    <label class="offset-3 col-lg-2 control-label col-form-label">สาขา : <?=$result_user['cheque_branch']?></label>
                    <div class="w-100"></div>
                    <label class="offset-3 col-lg-2 control-label col-form-label">เลขที่ : <?=$result_user['cheque_no']?></label>
                    <div class="w-100"></div>
                    <label class="offset-3 col-lg-2 control-label col-form-label">เช็คลงวันที่ : <?=$result_user['cheque_date']?></label>
                <?php } ?>
                     
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 text-lg-right control-label col-form-label">คอมมิชชั่นที่ได้รับ</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control-plaintext" value="<?=$result_user['rate']?> %">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 text-lg-right control-label col-form-label">การคิดคอมมิชชั่น</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control-plaintext" value="<?=$decimal_point?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 text-lg-right control-label col-form-label">หมายเหตุ</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control-plaintext" value="<?=$result_user['remark']?>">                 
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 text-lg-right control-label col-form-label">เจ้าหน้าที่ผู้บันทึก</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control-plaintext" value="<?=$result_user['login_id']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 text-lg-right control-label col-form-label">วันที่บันทึก</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control-plaintext" value="<?=$result_user['update_date']?>">
                    </div>
                </div>
                
                <div class="row border-top justify-content-center">
                    <div class="col-lg-3 mt-3">
                        <button type="button" name="back" onclick="window.history.go(-1); return false;" class="btn btn-secondary btn-lg btn-block">กลับ</button>
                    </div>
                    
                </div>
            </div>
		</div>
	</div>
</div>