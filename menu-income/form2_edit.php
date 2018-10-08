<?php if(isset($_GET['status']) && $_GET['status'] == 'success'){ $getStockId = $_GET['search']; ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>ทำรายการสำเร็จ !</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php }else if(isset($_GET['status']) && $_GET['status'] == 'fail'){ $getStockId = $_GET['search']; ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>ทำรายการไม่สำเร็จ !</strong> กรุณาลองอีกครั้ง
    <?='Cause : ' . $_GET['msg']?>
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
    
    $sql_get_stock = "SELECT id, receive_cheque_date, bank, bank_branch, cheque_date, payment_total, owner_payment, stock_id, list, list_detail, owner_cheque, cheque_status, cheque_status_detail FROM cheque WHERE id = '$getStockId' ";
	$query_get_stock = mysqli_query($conn,$sql_get_stock);
    $result_get_stock = mysqli_fetch_array($query_get_stock,MYSQLI_ASSOC);

	$owner_payment1 = '';
	$owner_payment2= '';
	$owner_payment3 = '';
    if($result_get_stock['owner_payment'] == 1){
        $owner_payment1 = 'checked';
    }elseif($result_get_stock['owner_payment'] == 2){
		$owner_payment2 = 'checked';
	}else{
		$owner_payment3 = 'checked';
	}
	$list1 = '';
	$list2= '';
	$list_detail1 = '';
	$list_detail2 = '';
	if($result_get_stock['list'] == 1){
		$list1 = 'checked';
		$list_detail1 = $result_get_stock['list_detail'];
    }elseif($result_get_stock['list'] == 2){
		$list2 = 'checked';
		$list_detail2 = $result_get_stock['list_detail'];
	}

	$cheque_status1 = '';
	$cheque_status2= '';
	$cheque_status3 = '';
	$cheque_status_detail1 = '';
	$cheque_status_detail2= '';
	$cheque_status_detail3 = '';
	
    if($result_get_stock['cheque_status'] == 1){
		$cheque_status1 = 'checked';
		$cheque_status_detail1 = $result_get_stock['cheque_status_detail'];
    }elseif($result_get_stock['cheque_status'] == 2){
		$cheque_status2 = 'checked';
		$cheque_status_detail2 = $result_get_stock['cheque_status_detail'];
	}else{
		$cheque_status3 = 'checked';
		$cheque_status_detail3 = $result_get_stock['cheque_status_detail'];
	}
    
?>
<div class="card">
    <form method="post" action="menu-income/submitedit2.php">
		<input type="hidden" name="id" value="<?=$result_get_stock['id']?>">
	  	<div class="card-body">
  			<div class="form-row">
  				<div class="form-group col-md-4">
			      	<label>วันที่รับเช็ค</label>
			      	<div class="input-group">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="receive_cheque_date" class="form-control singledate-getvalue" value="<?=$result_get_stock['receive_cheque_date']?>">
				    </div>
			    </div>
			</div>
			<div class="form-row">
                <div class="form-group col-md-6">
			      	<label>เช็คธนาคาร</label>
				    <input type="text" name="bank" class="form-control" placeholder="เช็คธนาคาร" value="<?=$result_get_stock['bank']?>">
			    </div>
                <div class="form-group col-md-4">
			      	<label>สาขา</label>
				    <input type="text" name="bank_branch" class="form-control" placeholder="สาขา" value="<?=$result_get_stock['bank_branch']?>">
			    </div>
			</div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label>เช็คลงวันที่</label>
			      	<div class="input-group">
		                <div class="input-group-prepend">
					        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" name="cheque_date" class="form-control singledate-getvalue" value="<?=$result_get_stock['cheque_date']?>">
				    </div>
			    </div>
                <div class="form-group col-md-4">
			      	<label>จำนวนเงิน</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="payment_total" placeholder="จำนวนเงิน"  value="<?=$result_get_stock['payment_total']?>">
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
                        <input class="form-check-input" type="radio" name="owner_payment" value="1" id="owner_payment1" <?=$owner_payment1?>>
                        <label class="form-check-label" for="owner_payment1">
                            เงินสด
                        </label>
                    </div>
                    <div class="form-check mb-3 ">
                        <input class="form-check-input" type="radio" name="owner_payment" value="2" id="owner_payment2" <?=$owner_payment2?>>
                        <label class="form-check-label" for="owner_payment2">
                            คุณสมเกียรติ อินทรานุปกรณ์
                        </label>
                    </div>
                    <div class="form-check mb-3 ">
                        <input class="form-check-input" type="radio" name="owner_payment" value="3" id="owner_payment3" <?=$owner_payment3?>>
                        <label class="form-check-label" for="owner_payment3">
                            บริษัท วิริยะประกันภัย จำกัด (มหาชน)
                        </label>
                    </div>
                </div>
			</div>	
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>รายการสั่งจ่ายเช็ค เลขที่กรมธรรม์</label>
				    <input type="text" name="stock_id" class="form-control" placeholder="เลขที่กรมธรรม์" value="<?=$result_get_stock['stock_id']?>">
			    </div>
			</div>
            <div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>รายการควบ (ถ้ามี)</label>
			      	<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="list" value="1" id="list1" <?=$list1?>>
					  	<label class="form-check-label" for="list1">
					    	พรบ.เลขที่
					  	</label>
					  	<div class="row">
					  		<div class="col-12 my-2">
					  			<input type="text" class="form-control" name="list_detail1" value="<?=$list_detail1?>">
					  		</div>
					  	</div>
					</div>
					<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="list" value="2" id="list2" <?=$list2?> >
					  	<label class="form-check-label" for="list2">
					    	ประกันภัยประเภทอื่นๆ ระบุ
					  	</label>
                        <div class="row">
					  		<div class="col-12 my-2">
                              <textarea rows="2" class="form-control" name="list_detail2"><?=$list_detail2?></textarea>
					  		</div>
					  	</div>
					</div>
			    </div>
			</div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>เจ้าของเช็ค</label>
				    <input type="text" name="owner_cheque" class="form-control" placeholder="เจ้าของเช็ค" value="<?=$result_get_stock['owner_cheque']?>">
			    </div>
			</div>
            <div class="form-row">
  				<div class="form-group col-md-6">
			      	<label>สถานะเช็ค</label>
			      	<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="cheque_status" value="1" id="cheque_status1" <?=$cheque_status1?>>
					  	<label class="form-check-label" for="cheque_status1">
					    	เข้าบัญชี วันที่
					  	</label>
					  	<div class="row">
					  		<div class="col-12 my-2">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
									</div>
									<input type="text" name="cheque_status_detail1" class="form-control singledate-getvalue" value="<?=$cheque_status_detail1?>">
								</div>
					  		</div>
					  	</div>
					</div>
                    <div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="cheque_status" value="2" id="cheque_status2" <?=$cheque_status2?>>
					  	<label class="form-check-label" for="cheque_status2">
					    	นำเช็คเคลียร์เบี้ย วันที่เคลียร์
					  	</label>
					  	<div class="row">
					  		<div class="col-12 my-2">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
									</div>
									<input type="text" name="cheque_status_detail2" class="form-control singledate-getvalue" value="<?=$cheque_status_detail2?>">
								</div>
					  		</div>
					  	</div>
					</div>
					<div class="form-check mb-3 ">
					  	<input class="form-check-input" type="radio" name="cheque_status" value="3" id="cheque_status3" <?=$cheque_status3?> >
					  	<label class="form-check-label" for="cheque_status3">
					    	อื่นๆ ระบุ
					  	</label>
                        <div class="row">
					  		<div class="col-12 my-2">
                              <textarea rows="2" class="form-control" name="cheque_status_detail3"><?=$cheque_status_detail3?></textarea>
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