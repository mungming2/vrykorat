<style>
    .getPayment {
        border-bottom-style: dotted;
        border-bottom-width: thin; 
        padding-right:250px;
        position: relative;
    }
    .getPayment2 {
        border-bottom-style: dotted;
        border-bottom-width: thin; 
        padding-right:350px;
        position: relative;
    }
</style>
<div class="card">
	<div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-12">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type_payment" id="type_payment1" value="1" checked>
                    <label class="form-check-label" for="type_payment1">พรบ.</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type_payment" id="type_payment2" value="2">
                    <label class="form-check-label" for="type_payment2">สมัครใจ</label>
                </div>
            </div>
            <div class="form-group col-md-8">
                    <input type="text" name="search" id="search_stock_id_print" class="form-control" placeholder="ค้นหาเลขกรมธรรม์ / ทะเบียนรถ / เลขตัวถังรถ เพื่อทำการดึงข้อมูล">
                <div id="check_stock_id"></div>
            </div>
            <div class="form-group col-md-12">
                <input type="checkbox" name="sum_type" id="sum_type" checked> 
                <label class="form-check-label" for="sum_type">ควบพรบ. หรือ สมัครใจ</label>
            </div>
            <div class="form-group col-md-12">
                <button class="btn btn-info px-5" name="search_stock" type="submit" id="stock_id_print"><i class="fas fa-search"></i> ค้นหา</button>
            </div>
        </div>
	</div>
</div>
<div class="card" id="load_card" style="display:none;">
    <div class="card-body d-flex justify-content-center">
        <i class="fas fa-spinner fa-pulse fa-5x"></i>
    </div>
</div>
<div class="card" id="show_card" style="display:none;">
    <div class="card-body">
        <div class="row">
            <div class="col-12 text-center">
                <h4 class="pb-3">บริษัท วิริยะประกันภัย จำกัด (มหาชน)</h4>
                <h4 class="pb-3">สำนักงานตัวแทน นายสมเกียรติ อินทรานุปกรณ์</h4>
                <p>51/25 ถนนโยธา(เต็กฮะ) ตำบลในเมือง อำเภอเมือง จังหวัดนครราชสีมา 30000</p>
                <p>โทร.( 044 )275745-51 Fax.( 044 )255989</p>
                <hr>
                <h4 class="py-3">ใบเสร็จรับเงิน</h4>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">เล่มที่</span>
                    </div>
                    <input type="text" name="print_form1" id="print_form1" class="form-control">
                </div>
            </div>
            <div class="col-md-4 ml-auto">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">ใบเสร็จรับเงินเลขที่</span>
                    </div>
                    <input type="text" name="print_form2" id="print_form2" class="form-control">
                </div>
            </div>
            <div class="w-100"></div>
            <div class="col-md-4 ml-auto">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">วันที่</span>
                    </div>
                    <input type="text" name="print_date1" id="print_date1" class="form-control singledate_print">
                </div>
            </div>         
            <div class="w-100"></div>
            <div class="col-12">
                <p class="lead">ชื่อผู้เอาประกัน <span id="get_value_cus_name"></span></p>
                <p class="lead" id="get_value_agent"></p>
            </div>
            <div class="col-12 text-center my-3">
                <p class="lead">รายการชำระต่อไปนี้</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>กรมธรรม์เลขที่</label>
                    <input type="text" name="stock_id" id="get_value_stock_id" class="form-control-plaintext" readonly>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>ยี่ห้อ</label>
                    <input type="text" name="car_brand" id="get_value_car_brand" class="form-control-plaintext" readonly>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>ทะเบียน</label>
                    <input type="text" name="car_number" id="get_value_car_number" class="form-control-plaintext" readonly>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>ระยะคุ้มครอง</label>
                    <input type="text" name="insure_date" id="get_value_insure_date" class="form-control-plaintext" readonly>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>ควบพรบ. หรือ สมัครใจ (ถ้ามี)</label>
                    <input type="text" name="stock_status" id="get_value_stock_status" class="form-control-plaintext" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>เบี้ยสุทธิ</th>
                            <th>อากร</th>
                            <th>ภาษี</th>
                            <th>เบี้ยรวม</th>
                            <th>หักส่วนลด/ค่าใช้จ่าย (ถ้ามี)</th>
                            <th>คงเหลือ</th>
                            <th>หัก ณ ที่จ่าย 1% (ถ้ามี)</th>
                            <th>ยอดรวมชำระ</th>
                        </tr>
                        </thead>
                        <tbody id="get_stock_table">
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7" class="text-right">ยอดรวมชำระ</td>
                                <td id="get_value_total"></td>
                            </tr>
                        </tfoot>
                </table>
            </div>
            <div class="col-12">
                <p class="lead text-right" id="get_value_total_convert"></p>
            </div>
            <div class="col-12 my-4">
                <p class="lead py-4">ชำระโดย เงินสด<span class="getPayment">
                        <span id="get_value_total2" style="left: 20%;position: absolute;"> </span></span>บาท</p>
                <p class="lead pb-3">
                    เบี้ยจ่ายเกิน (ถ้ามี) <input type="text" class="form-control-static" name="print_form3" id="print_form3" placeholder="ระบุ"> บาท 
                    ค้างชำระ (ถ้ามี) <input type="text" class="form-control-static" name="print_form4" id="print_form4" placeholder="ระบุ"> บาท
                </p>
                <p class="lead pb-2">
                    เช็คธนาคาร<span class="getPayment">
                        <span id="get_value_bank2" style="left: 20%;position: absolute;"> </span></span>
                    สาขา<span class="getPayment">
                        <span id="get_value_branch2" style="left: 20%;position: absolute;"> </span></span>
                    ลงวันที่<span class="getPayment">
                        <span id="get_value_date2" style="left: 20%;position: absolute;"> </span></span>
                </p>
                <p class="lead pb-4">
                    เลขที่เช็ค<span class="getPayment2">
                        <span id="get_value_cheque2" style="left: 20%;position: absolute;"> </span></span>
                    จำนวนเงิน<span class="getPayment">
                        <span id="get_value_total2_2" style="left: 20%;position: absolute;"> </span></span>บาท
                </p>
                <p class="lead pb-4">
                    โอน<span class="getPayment">
                        <span id="get_value_total2_3" style="left: 20%;position: absolute;"> </span></span>บาท
                </p>
                <p class="lead pb-2">
                    บัตรเครดิต<span class="getPayment">
                        <span id="get_value_bank4" style="left: 20%;position: absolute;"> </span></span>
                    ประเภทบัตร <span class="getPayment2">
                        <span id="get_value_type4" style="left: 20%;position: absolute;"> </span></span>
                    
                </p>
                <p class="lead pb-4">
                    เลขที่บัตร<span class="getPayment2">
                        <span id="get_value_num4" style="left: 20%;position: absolute;"> </span></span>
                    จำนวนเงิน<span class="getPayment">
                        <span id="get_value_total2_4" style="left: 20%;position: absolute;"> </span></span>บาท
                </p>
            </div>
            <div class="col-md-5 text-center">
                <p class="lead py-2">ลงชื่อ<small style="border-bottom-style: dotted;border-bottom-width: thin; padding-right:280px;"> </small>ผู้จ่ายเงิน</p>
                <p class="lead py-2">(<small style="border-bottom-style: none;border-bottom-width: thin; padding-right:280px;"> </small>)</p>
            </div>
            <div class="col-md-5 ml-auto text-center">
                <p class="lead py-2">ลงชื่อ<small style="border-bottom-style: dotted;border-bottom-width: thin; padding-right:280px;"> </small>ผู้รับเงิน</p>
                <p class="lead py-2">(<small style="border-bottom-style: none;border-bottom-width: thin; padding-right:280px;"> </small>)</p>
            </div>
            <div class="col-md-5">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">วันที่</span>
                    </div>
                    <input type="text" name="print_date2" id="print_date2" class="form-control singledate_print">
                </div>
            </div>
            <div class="col-md-5 ml-auto">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">วันที่</span>
                    </div>
                    <input type="text" name="print_date3" id="print_date3" class="form-control singledate_print">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <button  id="btn_submit_print2" class="btn btn-success btn-lg px-5">สั่งพิมพ์</button>
            </div>
        </div>
    </div>
</div>

<iframe src="menu-bill/print2.php" name="frame1" id="frame1" style="width:0; height:0; border:none;"></iframe>
