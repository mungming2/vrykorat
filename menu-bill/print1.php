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
</head>
<body >
	<div class="container-fluid mt-4">
    <div class="card" id="show_card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 text-center">
                    <h4 class="pb-3">บริษัท วิริยะประกันภัย จำกัด (มหาชน)</h4>
                    <h4 class="pb-3">สำนักงานตัวแทน นายสมเกียรติ อินทรานุปกรณ์</h4>
                    <p>51/25 ถนนโยธา(เต็กฮะ) ตำบลในเมือง อำเภอเมือง จังหวัดนครราชสีมา 30000</p>
                    <p>โทร.( 044 )275745-51 Fax.( 044 )255989</p>
                    <hr>
                </div>
                <div class="col-md-12">
                    <p class="lead text-center">วันที่ <span id="print_date1_2"></span></p>
                </div>
                <div class="col-6">
                    <p class="lead" id="get_value_bill_no2"></p>
                </div>
                <div class="col-12">
                    <p class="lead">เรื่อง ส่งมอบกรมธรรม์เพื่อเรียกเก็บเงิน</p>
                    <p class="lead">เรียน <span id="get_value_cus_name2"></span></p>
                </div>
                <div class="col-8">
                        <p class="lead">สิ่งที่ส่งมาด้วย กรมธรรม์ &nbsp;<span id="total_stock2"> 0 </span>&nbsp; ฉบับ / <span id="print_form2_2"></span></p>
                </div>
                <div class="col-12 text-center my-1">
                    <p class="lead"><u>ดังรายการชำระต่อไปนี้</u></p>
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
                    <p class="lead">จึงเรียนมาเพื่อทราบ</p>
                    <p class="lead text-center pb-5">ขอแสดงความนับถือ</p>
                    <p class="lead text-center">นายสมเกียรติ อินทรานุปกรณ์</p>
                    <p class="lead text-center">ผู้จัดการ</p>
                </div>
                <div class="col-12 my-4">
                    <p class="lead py-2">ลงชื่อ<small style="border-bottom-style: dotted;border-bottom-width: thin; padding-right:350px;"> </small>ผู้รับเอกสาร</p>
                    <p class="lead py-4">ชำระโดย เงินสด<span class="getPayment">
                        <span id="get_value_total2" style="left: 20%;position: absolute;"> </span></span>บาท
                    </p>
                    <p class="lead pb-3">
                        <span id="print_form3_2"></span> 
                        <span id="print_form4_2"></span>
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
                <div class="col-8">
                    <p class="lead py-1">ลงชื่อ<small style="border-bottom-style: dotted;border-bottom-width: thin; padding-right:300px;"> </small>ผู้รับเงินสด / เช็ค / บัตรเครดิต </p>
                </div>
                <div class="col-4 ">
                    <p class="lead py-1">วันที่ <span id="print_date2_2"></span></p>
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