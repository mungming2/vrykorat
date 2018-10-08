<?php if(isset($_GET['status']) && $_GET['status'] == 'success'){ $getStockId = $_GET['search']; ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
	  	<strong>ทำรายการสำเร็จ !</strong> 
	  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    	<span aria-hidden="true">&times;</span>
	  	</button>
	</div>
<?php }else if(isset($_GET['status']) && $_GET['status'] == 'fail'){ $getStockId = $_GET['search']; ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
	  	<strong>ทำรายการไม่สำเร็จ !</strong> กรุณาลองอีกครั้ง <?='Cause : ' . $_GET['msg']?>
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
    
    $sql_get_stock = "SELECT id, insure_date, inform_id, insure_type, inform_code, year_stock, stock_id, cus_name, cus_card_id, cus_occupation, cus_age, birth_date, cus_address1, cus_address2, cus_tel, save_date, insure_time, insure_duration, insure_total, insure_code, insure_net, insure_tax, insure_duty, insure_total2, insure_beneficiary, insure_ralationship_name, insure_status, insure_status_stock, cus_type, cus_type_detail, stock_date, create_stock_date, alert_type, alert_detail, cancel_date, cancel_detail FROM miscellany WHERE stock_id = '$getStockId' OR cus_name = '$getStockId' OR inform_code = '$getStockId' OR id = '$getStockId' ";
	$query_get_stock = mysqli_query($conn,$sql_get_stock);
	$result_get_row = mysqli_num_rows($query_get_stock);
    $result_get_stock = mysqli_fetch_array($query_get_stock,MYSQLI_ASSOC);
	
    $form_type = 3;

    $sql_payment = "SELECT DISTINCT(count) AS count FROM payment WHERE stock_id = '".$result_get_stock['id']."' AND form_type = '$form_type' ORDER BY count ASC";
    $query_payment = mysqli_query($conn,$sql_payment);
    $result_payment = mysqli_fetch_all($query_payment,MYSQLI_ASSOC);

    $save_date = explode(' ถึง ', $result_get_stock['save_date']);

    $insure_status1 = '';
    $insure_status2 = '';
    $insure_status_stock = '';

    if($result_get_stock['insure_status'] == 1){
        $insure_status1 = 'checked';
        $insure_status_stock = $result_get_stock['insure_status_stock'];
    }else{
        $insure_status2 = 'checked';
    }

    $cus_type1 = '';
    $cus_type2 = '';
    $cus_type_detail = '';

    if($result_get_stock['cus_type'] == 1){
        $cus_type1 = 'checked';
        $cus_type_detail = $result_get_stock['cus_type_detail'];
    }else{
        $cus_type2 = 'checked';
    }

    $alert_1 = '';
   	$alert_2 = '';
   	$alert_detail_1 = '';
   	$alert_detail_2 = '';
   	$alert_detail_3 = '';
   	$alert_3 = '';

   	if($result_get_stock['alert_type'] == 'โทรแจ้ง'){
   		$alert_1 = 'checked';
   		$alert_detail_1 = $result_get_stock['alert_detail'];
   	}elseif($result_get_stock['alert_type'] == 'ส่งไปรษณีย์'){
   		$alert_2 = 'checked';
   		$alert_detail_2 = $result_get_stock['alert_detail'];
   	}else{
   		$alert_3 = 'checked';
   		$alert_detail_3 = $result_get_stock['alert_detail'];
    }

    $check_cancel_date = '';
    $cancel_date = '';
    if($result_get_stock['cancel_date'] !== '0000-00-00'){
        $check_cancel_date = 'checked';
        $cancel_date = 'class="form-control singledate-getvalue" value="'.$result_get_stock['cancel_date'].'"';
    }else{
        $cancel_date = 'class="form-control singledate"';
    }
       
?>
<?php if($result_get_row == 0 || $result_get_row > 1){  ?>
    <div class="card">
        <div class="card-body">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php 
                if($result_get_row > 1){
                    echo "<strong>พบเลขกรมธรรม์ / ทะเบียนรถ / เลขรับแจ้ง / ชื่อผู้เอาประกัน  นี้ มีข้อมูลซ้ำกันมากกว่า 1 รายการ กรุณาตรวจสอบข้อมูลซ้ำได้ที่รายงาน !</strong> ";
                }else{
                    echo "<strong>ไม่พบเลขกรมธรรม์ / ทะเบียนรถ / เลขรับแจ้ง / ชื่อผู้เอาประกัน  นี้ในระบบ กรุณาตรวจสอบข้อมูลอีกครั้ง !</strong> ";
                }
                ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form method="post" action="main.php?page=miscellany-edit1">
                    <div class="form-row ">
                        <div class="form-group col-md-8">
                            <label>ค้นหาเลขที่บิล เพื่อทำการดึงข้อมูล</label>
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" id="search" placeholder="ค้นหา... " value="<?=$getStockId?>" autofocus>
                                <div class="input-group-append">
                                <button class="btn btn-outline-info" type="submit" id="button-addon2"><i class="fas fa-search"></i> ค้นหา</button>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-4 pt-2" align="right">
                        <label> </label>
                            <a href="?page=miscellany-forms1" class="btn btn-block btn-secondary" role="button" > กลับไปหน้าเพิ่มฟอร์มอุบัติเหตุ / สุขภาพ และอื่นๆ <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php }else{ ?>
<div class="card">
    <div class="card-body">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>พบเลขที่บิล  นี้ในระบบ!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
        </div>
        <form method="post" action="main.php?page=miscellany-edit1">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>ค้นหาเลขที่บิล เพื่อทำการดึงข้อมูล</label>
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" id="search" placeholder="ค้นหา..." autofocus>
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
                <button type="button" class="btn btn-success btn-lg" id="btn_addPayment3"><i class="fas fa-plus-square"></i> เพิ่มการรับชำระเงิน</button>

            </div>
            <div>
                <a href="?page=miscellany-forms1" class="btn btn-lg btn-secondary" role="button" > กลับไปหน้าเพิ่มฟอร์มอุบัติเหตุ / สุขภาพ และอื่นๆ <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>


<?php } ?>
	
    
