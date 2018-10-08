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
    
    $sql_get_stock = "SELECT id, bill_no, receive_cheque_date, type1, inform_id, list_income, status_payment, payment_total, bank, bank_branch, payment_date, cheque_number FROM income WHERE bill_no = '$getStockId' OR id = '$getStockId' ";
	$query_get_stock = mysqli_query($conn,$sql_get_stock);
    $result_get_stock = mysqli_fetch_array($query_get_stock,MYSQLI_ASSOC);

    $type1_1 = '';
    $type1_2 = 'selected';
    if($result_get_stock['type1'] == 'รายรับ'){
        $type1_1 = 'selected';
        $type1_2 = '';
    }
    $status_payment1 = '';
    $status_payment2 = '';
    $status_payment3 = '';
    $payment_total1 = '';
    $payment_total2 = '';
    $payment_total3 = '';
    $bank2 = '';
    $bank_branch2 = ''; 
    $payment_date2 = ''; 
    $bank3 = '';
    $bank_branch3 = ''; 
    $payment_date3 = ''; 
    $cheque_number = '';
    if($result_get_stock['status_payment'] == 1){
        $status_payment1 = 'checked';
        $payment_total1 = $result_get_stock['payment_total'];
    }elseif($result_get_stock['status_payment'] == 2){
        $status_payment2 = 'checked';
        $payment_total2 = $result_get_stock['payment_total'];
        $bank2 = $result_get_stock['bank'];
        $bank_branch2 = $result_get_stock['bank_branch'];
        $payment_date2 = $result_get_stock['payment_date'];
    }else{
        $status_payment3 = 'checked';
        $payment_total3 = $result_get_stock['payment_total'];
        $bank3 = $result_get_stock['bank'];
        $bank_branch3 = $result_get_stock['bank_branch'];
        $payment_date3 = $result_get_stock['payment_date'];
        $cheque_number = $result_get_stock['cheque_number'];
    }
	
       
?>
<?php //if($result_get_row == 0 || $result_get_row > 1){  ?>
<!-- <div class="card">
    <div class="card-body">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php 
                if($result_get_row > 1){
                    echo "<strong>พบเลขที่บิล  นี้ มีข้อมูลซ้ำกันมากกว่า 1 รายการ กรุณาตรวจสอบข้อมูลซ้ำได้ที่รายงาน !</strong> ";
                }else{
                    echo "<strong>ไม่พบเลขที่บิล  นี้ในระบบ กรุณาตรวจสอบข้อมูลอีกครั้ง !</strong> ";
                }
                ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="post" action="main.php?page=income-edit1">
            <div class="form-row ">
                <div class="form-group col-md-8">
                    <label>ค้นหาเลขที่บิล เพื่อทำการดึงข้อมูล</label>
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" id="search" placeholder="ค้นหา... " value="<?=$getStockId?>"
                            autofocus>
                        <div class="input-group-append">
                            <button class="btn btn-outline-info" type="submit" id="button-addon2"><i class="fas fa-search"></i>
                                ค้นหา</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pt-2" align="right">
                    <label> </label>
                    <a href="?page=income-forms1" class="btn btn-block btn-secondary" role="button">
                        กลับไปหน้าเพิ่มฟอร์มอุบัติเหตุ / สุขภาพ และอื่นๆ <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </form>
    </div>
</div> -->
<?php //}else{ ?>
<!-- <div class="card">
    <div class="card-body">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>พบเลขที่บิล นี้ในระบบ!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="post" action="main.php?page=income-edit1">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>ค้นหาเลขที่บิล เพื่อทำการดึงข้อมูล</label>
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" id="search" placeholder="ค้นหา..."
                            autofocus>
                        <div class="input-group-append">
                            <button class="btn btn-outline-info" type="submit" id="button-addon2"><i class="fas fa-search"></i>
                                ค้นหา</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div> -->
<div class="card">
    <form method="post" action="menu-income/submitedit1.php">
        <div class="card-body">
            <input type="hidden" name="id" value="<?=$result_get_stock['id']?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>เลขที่บิล</label>
                    <input type="text" name="bill_no" class="form-control" placeholder="เลขที่บิล" value="<?=$result_get_stock['bill_no']?>">
                </div>
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
                    <label>ประเภท</label>
                    <select class="form-control" name="type1">
                        <option value="รายรับ" <?=$type1_1?>>รายรับ</option>
                        <option value="รายจ่าย" <?=$type1_2?>>รายจ่าย</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>ผู้บันทึกข้อมูล</label>
                    <input type="text" name="inform_id" class="form-control" placeholder="ผู้บันทึกข้อมูล" value="<?=$result_get_stock['inform_id']?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>รายการรายรับ รายจ่าย</label>
                    <input type="text" name="list_income" class="form-control" placeholder="รายการรายรับ รายจ่าย" value="<?=$result_get_stock['list_income']?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>สถานะการรับ จ่ายเงิน</label>
                    <div class="form-check mb-3 ">
                        <input class="form-check-input" type="radio" name="status_payment" value="1" id="status_payment1" <?=$status_payment1?>>
                        <label class="form-check-label" for="status_payment1">
                            เงินสด
                        </label>
                        <div class="row ">
                            <div class="col-4 my-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="payment_total1" id="total11" placeholder="จำนวนเงิน" value="<?=$payment_total1?>">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">บาท</i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-check mb-3 ">
                        <input class="form-check-input" type="radio" name="status_payment" value="2" id="status_payment2" <?=$status_payment2?>>
                        <label class="form-check-label" for="status_payment2">
                            โอน
                        </label>
                        <div class="row p-3 border">
                            <div class="col-5 my-2">
                                <input type="text" class="form-control" name="bank2" placeholder="ธนาคาร" value="<?=$bank2?>">
                            </div>
                            <div class="col-5 my-2">
                                <input type="text" class="form-control" name="bank_branch2" placeholder="สาขา" value="<?=$bank_branch2?>">
                            </div>
                            <div class="col-5 my-2">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                    </div>
                                    <input type="text" name="payment_date2" class="form-control singledate-getvalue" value="<?=$payment_date2?>">
                                </div>
                            </div>
                            <div class="col-5 my-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="payment_total2" id="total2"
                                        placeholder="จำนวนเงิน" value="<?=$payment_total2?>">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">บาท</i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-check mb-3 ">
                        <input class="form-check-input" type="radio" name="status_payment" value="3" id="status_payment3" <?=$status_payment3?>>
                        <label class="form-check-label" for="status_payment3">
                            เช็ค
                        </label>
                        <div class="row p-3 border">
                            <div class="col-5 my-2">
                                <input type="text" class="form-control" name="bank3" placeholder="เช็คธนาคาร" value="<?=$bank3?>">
                            </div>
                            <div class="col-5 my-2">
                                <input type="text" class="form-control" name="bank_branch3" placeholder="สาขา" value="<?=$bank_branch3?>">
                            </div>
                            <div class="col-5 my-2">
                                <input type="text" class="form-control" name="cheque_number" placeholder="เลขที่" value="<?=$cheque_number?>">
                            </div>
                            <div class="col-5 my-2">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                    </div>
                                    <input type="text" name="payment_date3" class="form-control singledate-getvalue" value="<?=$payment_date3?>">
                                </div>
                            </div>
                            <div class="col-5 my-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="payment_total3" id="total3"
                                        placeholder="จำนวนเงิน" value="<?=$payment_total3?>">
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
                <button type="submit" id="btn_submit" class="btn btn-success btn-lg px-4">บันทึกการแก้ไข</button>
            </div>
        </div>
    </form>
</div>

<?php //} ?>