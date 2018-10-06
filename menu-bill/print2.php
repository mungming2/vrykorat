<?php
 include '../connect_db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
    <!-- Custom CSS -->
    <link href="../matrix-admin/dist/css/style.min.css" rel="stylesheet">
    <link href="../matrix-admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
	
	<style type="text/css" media="print">
	  	@page { 
	   		margin: 0mm;  /* this affects the margin in the printer settings */
        }
	</style>
</head>
<body >
	<div class="container-fluid mt-5">
        <div class="card" id="show_card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 text-center">
                        <h4 class="pb-3">บริษัท วิริยะประกันภัย จำกัด (มหาชน)</h4>
                        <h4 class="pb-3">สำนักงานตัวแทน นายสมเกียรติ อินทรานุปกรณ์</h4>
                        <p>51/25 ถนนโยธา(เต็กฮะ) ตำบลในเมือง อำเภอเมือง จังหวัดนครราชสีมา 30000 โทร.( 044 )275745-51</p>
                        <p>โทร.( 044 )275745-51 Fax.( 044 )255989</p>
                        <hr>
                        <h4 class="py-3">ใบเสร็จรับเงิน</h4>
                    </div>
                    <div class="col-md-12 d-flex justify-content-between">
                        <p class="lead">เล่มที่ <span id="print_form1_2"></span></p>
                        <p class="lead">ใบเสร็จรับเงินเลขที่ <span id="print_form2_2"></span></p>
                    </div>
                    <div class="col-md-12">
                        <p class="lead text-right">วันที่ <span id="print_date1_2"></span></p>
                    </div>
                    <div class="col-12">
                        <p class="lead">ชื่อผู้เอาประกัน <span id="get_value_cus_name2"></span></p>
                        <p class="lead" id="get_value_agent2"></p>
                    </div>
                    <div class="col-12 text-center my-2">
                        <p class="lead"><u>รายการชำระต่อไปนี้</u></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>กรมธรรม์เลขที่</label>
                            <input type="text" name="stock_id" id="get_value_stock_id2" class="form-control-plaintext" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>ยี่ห้อ</label>
                            <input type="text" name="car_brand" id="get_value_car_brand2" class="form-control-plaintext" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>ทะเบียน</label>
                            <input type="text" name="car_number" id="get_value_car_number2" class="form-control-plaintext" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>ระยะคุ้มครอง</label>
                            <input type="text" name="insure_date" id="get_value_insure_date2" class="form-control-plaintext" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>พรบ. หรือ สมัครใจ (ถ้ามี)</label>
                            <input type="text" name="stock_status" id="get_value_stock_status2" class="form-control-plaintext" readonly>
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
                                <tbody id="get_stock_table2">
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="7" class="text-right">ยอดรวมชำระ</td>
                                        <td id="get_value_total2"></td>
                                    </tr>
                                </tfoot>
                        </table>
                    </div>
                    <div class="col-12">
                        <p class="lead text-right" id="get_value_total_convert2"></p>
                    </div>
                    <div class="col-12 my-4">
                        <p class="lead py-2">ชำระโดย เงินสด<span style="border-bottom-style: dotted;border-bottom-width: thin; padding-right:250px;position: relative;"> <span id="get_value_total22" style="right: 50%;position: absolute;"> </span></span>บาท</p>
                        <p class="lead pb-3">
                            <span id="print_form3_2"></span> 
                            <span id="print_form4_2"></span>
                        </p>
                        <p class="lead pb-2">
                            เช็คธนาคาร<small style="border-bottom-style: dotted;border-bottom-width: thin; padding-right:250px;"> </small>
                            สาขา<small style="border-bottom-style: dotted;border-bottom-width: thin; padding-right:250px;"> </small>
                            ลงวันที่<small style="border-bottom-style: dotted;border-bottom-width: thin; padding-right:250px;"> </small>
                        </p>
                        <p class="lead pb-4">
                            เลขที่เช็ค<small style="border-bottom-style: dotted;border-bottom-width: thin; padding-right:250px;"> </small>
                            จำนวนเงิน<small style="border-bottom-style: dotted;border-bottom-width: thin; padding-right:250px;"> </small>บาท
                        </p>
                        <p class="lead pb-4">
                            โอน<small style="border-bottom-style: dotted;border-bottom-width: thin; padding-right:250px;"> </small>บาท
                        </p>
                        <p class="lead pb-2">
                            บัตรเครดิต<small style="border-bottom-style: dotted;border-bottom-width: thin; padding-right:250px;"> </small>
                            VISA / <small style="border-bottom-style: dotted;border-bottom-width: thin; padding-right:250px;"> </small>
                            เลขที่บัตร<small style="border-bottom-style: dotted;border-bottom-width: thin; padding-right:250px;"> </small>
                        </p>
                        <p class="lead pb-4">
                            จำนวนเงิน<small style="border-bottom-style: dotted;border-bottom-width: thin; padding-right:250px;"> </small>บาท
                        </p>
                    </div>
                    <div class="col-md-12 d-flex justify-content-between">
                        <p class="lead py-2">ลงชื่อ<small style="border-bottom-style: dotted;border-bottom-width: thin; padding-right:280px;"> </small>ผู้จ่ายเงิน</p>
                        <p class="lead py-2">ลงชื่อ<small style="border-bottom-style: dotted;border-bottom-width: thin; padding-right:280px;"> </small>ผู้รับเงิน</p>
                    </div>
                    <div class="col-md-12 d-flex justify-content-between">
                        <p class="lead py-2">(<small style="border-bottom-style: none;border-bottom-width: thin; padding-right:350px;"> </small>)</p>
                        <p class="lead py-2">(<small style="border-bottom-style: none;border-bottom-width: thin; padding-right:350px;"> </small>)</p>
                    </div>
                    <div class="col-md-12 d-flex justify-content-around">
                        <p class="lead py-2">วันที่ <span id="print_date2_2"></span></p>
                        <p class="lead py-2 ">&nbsp;</p>
                        <p class="lead py-2">วันที่ <span id="print_date3_2"></span></p>
                    </div>
                </div>
            </div>
        </div>
	</div>



	<script src="../matrix-admin/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../matrix-admin/assets/libs/jquery/dist/jquery.highlight.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../matrix-admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../matrix-admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!--Custom JavaScript -->
    <script src="../matrix-admin/dist/js/custom.min.js"></script>


</body>
</html>