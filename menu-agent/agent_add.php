<div class="row">
	<div class="col-12">
        <?php if(isset($_GET['errMsg'])){ ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>เพิ่มข้อมูลไม่สำเร็จ !</strong>  <?=$_GET['errMsg']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>
		<div class="card">
			<form class="form-horizontal" method="post" action="menu-agent/submitaddagent.php?action=add">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-lg-3 text-lg-right control-label col-form-label">รหัสตัวแทน</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="id" id="id" placeholder="รหัสตัวแทน" data-validation="required" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-lg-3 text-lg-right control-label col-form-label">ชื่อ-สกุล</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="name" id="name" placeholder="ชื่อ-สกุล" data-validation="required" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="card_id" class="col-lg-3 text-lg-right control-label col-form-label">บัตรประชาชน</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="card_id" id="card_id" placeholder="บัตรประชาชน" data-validation="number" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="license_id" class="col-lg-3 text-lg-right control-label col-form-label">เลขที่ใบอนุญาติตัวแทน</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="license_id" id="license_id" placeholder="เลขที่ใบอนุญาติตัวแทน" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-lg-3 text-lg-right control-label col-form-label">อีเมล</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="email" id="email" placeholder="อีเมล" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-lg-3 text-lg-right control-label col-form-label">ที่อยู่</label>
                        <div class="col-lg-6">
                            <textarea class="form-control" name="address" rows="3" placeholder="ที่อยู่"></textarea>                        
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tel" class="col-lg-3 text-lg-right control-label col-form-label">เบอร์โทรศัพท์</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="tel" id="tel" placeholder="เบอร์โทรศัพท์">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fax" class="col-lg-3 text-lg-right control-label col-form-label">โทรสาร</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="fax" id="fax" placeholder="โทรสาร">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-lg-3 text-lg-right control-label col-form-label">เงินค้ำประกัน</label>
                        <div class="col-lg-6">
                            <div class="input-group ">
                                <input type="text" class="form-control" placeholder="จำนวนเงิน" aria-label="จำนวนเงิน" aria-describedby="basic-addon1" name="price">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon1">บาท</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 text-lg-right control-label col-form-label"></label>
                        <div class="col-lg-6">
                            <div class="form-check py-2">
                                <input class="form-check-input" type="radio" name="selectPayment" id="rate1" value="เงินสด" checked>
                                <label class="form-check-label" for="rate1">
                                    เงินสด
                                </label>
                            </div>
                            <div class="form-check py-2">
                                <div class="row">
                                    <div class="col-1 pt-1">
                                       <input class="form-check-input" type="radio" name="selectPayment" id="rate2" value="เช็ค">

                                        <label class="form-check-label" for="rate2">
                                            เช็ค
                                        </label> 
                                    </div>                                    
                                    <div class="col-5">
                                        <input type="text" class="form-control" name="cheque_bank" placeholder="เช็คธนาคาร">
                                    </div>
                                    <div class="col-5">
                                        <input type="text" class="form-control" name="cheque_branch" placeholder="สาขา">
                                    </div>
                                    <div class="offset-1 col-5 mt-2">
                                        <input type="text" class="form-control" name="cheque_no" placeholder="เลขที่">
                                    </div>
                                    <div class="col-5 mt-2">
                                       <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                            </div>
                                            <input type="text" name="cheque_date" class="form-control singledate">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check py-2">
                                <input class="form-check-input" type="radio" name="selectPayment" id="rate5" value="999">
                                <div class="input-group ">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">อื่นๆ</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="โปรดระบุ"  name="payment_other" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 text-lg-right control-label col-form-label">คอมมิชชั่นที่ได้รับ</label>
                        <div class="col-lg-6">
                            <div class="form-check py-2">
                                <input class="form-check-input" type="radio" name="selectRate" id="rate1" value="5" checked>
                                <label class="form-check-label" for="rate1">
                                    หักค่าใช้จ่าย 5%
                                </label>
                            </div>
                            <div class="form-check py-2">
                                <input class="form-check-input" type="radio" name="selectRate" id="rate2" value="12">
                                <label class="form-check-label" for="rate2">
                                    หักค่าใช้จ่าย 12%
                                </label>
                            </div>
                            <div class="form-check py-2">
                                <input class="form-check-input" type="radio" name="selectRate" id="rate3" value="15">
                                <label class="form-check-label" for="rate3">
                                    หักค่าใช้จ่าย 15%
                                </label>
                            </div>
                            <div class="form-check py-2">
                                <input class="form-check-input" type="radio" name="selectRate" id="rate4" value="20">
                                <label class="form-check-label" for="rate4">
                                    หักค่าใช้จ่าย 20%
                                </label>
                            </div>
                            <div class="form-check py-2">
                                <input class="form-check-input" type="radio" name="selectRate" id="rate5" value="999">
                                <div class="input-group ">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">อื่นๆ</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="โปรดระบุ" aria-label="โปรดระบุ" aria-describedby="basic-addon2" name="rate_other" >
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" class="form-control" placeholder="จำนวนเงิน"  name="commision">
                    <div class="form-group row">
                        <label class="col-lg-3 text-lg-right control-label col-form-label">การคิดคอมมิชชั่น</label>
                        <div class="col-lg-6">
                            <div class="form-check py-2">
                                <input class="form-check-input" type="radio" name="selectdecimal" id="decimal1" value="no" checked>
                                <label class="form-check-label" for="decimal1">
                                    แบบตัดจุดทศนิยม
                                </label>
                            </div>
                            <div class="form-check py-2">
                                <input class="form-check-input" type="radio" name="selectdecimal" id="decimal2" value="yes">
                                <label class="form-check-label" for="decimal2">
                                    แบบไม่ตัดจุดทศนิยม
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-lg-3 text-lg-right control-label col-form-label">หมายเหตุ</label>
                        <div class="col-lg-6">
                            <textarea rows="3" class="form-control" name="remark"></textarea>                 
                        </div>
                    </div>
                    <div class="row border-top justify-content-center">
                        <div class="col-lg-3 mt-3">
                            <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">เพิ่มตัวแทน</button>
                        </div>
                        
                    </div>
                </div>
            </form>
		</div>
	</div>
</div>