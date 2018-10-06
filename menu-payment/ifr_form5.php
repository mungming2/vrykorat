<?php
 include '../connect_db.php';

 $dateRange = $_GET['select_date'];
 $agent = $_GET['agent'];
 $dateRangeArry = explode(" ถึง ",$dateRange);
 $where_date = '';

 if(!empty($dateRange)){
    $where_date = " AND stock_date BETWEEN DATE('$dateRangeArry[0]') AND DATE('$dateRangeArry[1]')";
}

 $sql_report = "SELECT i.index_id, year_stock, i.stock_id, stock_type, inform_id, CONCAT(cus_title, cus_firstname,' ', cus_lastname) AS cus_name, cus_type2, cus_detail, cus_status, cus_status_stock, i.car_id, c.code,  car_number, car_province, insure_type, insure_date, insure_time, insure_total1, i.insure, insure_net, insure_duty, insure_tex, insure_total2, DATE_FORMAT(stock_date, '%d/%m/%Y') AS stock_date ,p.balance, a.rate, a.decimal_point
            FROM insure_payment i
            LEFT JOIN agent a
            ON i.cus_detail = a.agent_id
            LEFT JOIN payment p
            ON i.stock_id = p.stock_id
            LEFT JOIN car_code c
            ON i.car_id = c.id
            WHERE i.cus_detail = '$agent' ".$where_date;
$query_report = mysqli_query($conn,$sql_report);
$res_report = mysqli_fetch_all($query_report,MYSQLI_ASSOC);

$sql_car = "SELECT i.car_id, c.code, COUNT(i.car_id) AS count_car
FROM insure_payment i
LEFT JOIN agent a
ON i.cus_detail = a.agent_id
LEFT JOIN car_code c
ON i.car_id = c.id
WHERE i.cus_detail = '$agent' ".$where_date." GROUP BY car_id";
$query_car = mysqli_query($conn,$sql_car);
$res_car = mysqli_fetch_all($query_car,MYSQLI_ASSOC);

$rate= '';
$sum_rate = 0;
$sum_insure_net = 0;
$sum_insure_total2 = 0;
$sum_commission = 0;
$sum_balance = 0;
$arr_sum = [];
foreach ($res_report as $key => $value) {
    // คำนวน เบี้ยสุทธิ x ค่าคอมมิชชั่น
    $sum_rate = $value['insure_net']*($value['rate']/100);

    // เช็ค ตัดจุดทศนิยม
    if($value['decimal_point'] == 'yes'){
        $res_report[$key]['sum_rate'] = number_format((float)$sum_rate, 0, '.', '');
    }else{
        $res_report[$key]['sum_rate'] = number_format((float)$sum_rate, 2, '.', '');
    }

    // คำนวน เบี้ยรวม - ค่าคอมมิชชั่นที่คำนวนแล้ว
    $res_report[$key]['balance'] = $value['insure_total2']-$res_report[$key]['sum_rate'];
    $rate = $value['rate'];

    foreach ($res_car as $key_car1 => $value_car1) {
        if($value_car1['car_id'] == $value['car_id']){
            if(empty($arr_sum[$key_car1]['sum_insure_net'])){
                $arr_sum[$key_car1]['sum_insure_net']  = 0;
            }if(empty($arr_sum[$key_car1]['sum_insure_total2'] )){
                $arr_sum[$key_car1]['sum_insure_total2']  = 0;
            }if(empty($arr_sum[$key_car1]['sum_commission'])){
                $arr_sum[$key_car1]['sum_commission'] = 0;
            }if(empty($arr_sum[$key_car1]['sum_balance'])){
               $arr_sum[$key_car1]['sum_balance'] = 0;
            }

            $arr_sum[$key_car1]['sum_insure_net'] += $value['insure_net'];
            $arr_sum[$key_car1]['sum_insure_total2'] += $value['insure_total2'];
            $arr_sum[$key_car1]['sum_commission'] += $res_report[$key]['sum_rate'];
            $arr_sum[$key_car1]['sum_balance'] += $res_report[$key]['balance'];
            
        }
        
    }
    
}


?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="matrix-admin/assets/libs/daterangepicker/daterangepicker.css" />
        <!-- Custom CSS -->
        <link href="../matrix-admin/dist/css/style.min.css" rel="stylesheet">
        <link href="../matrix-admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
        <link href="../matrix-admin/assets/libs/datatables/media/css/dataTables.searchHighlight.css" rel="stylesheet">
        <link href="../matrix-admin/assets/libs/datatables/media/css/buttons.bootstrap4.min.css" rel="stylesheet">
        <link href="../matrix-admin/assets/libs/select2/dist/css/select2.min.css" rel="stylesheet">
        <link href="../matrix-admin/assets/libs/select2/dist/css/select2-bootstrap.min.css" rel="stylesheet">
        <link href="../matrix-admin/assets/libs/timepicker/bootstrap-timepicker.css" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="../matrix-admin/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker3.standalone.min.css" />
    </head>
    <body>
        <button onclick="print();" class="btn btn-info px-5">สั่งพิมพ์</button>
        <table id="report_payment3" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>เลขที่กรมธรรม์</th>
                    <th>ผู้เอาประกัน</th>
                    <th>รหัสรถ</th>
                    <th>วันที่ทำกรมธรรม์</th>
                    <th>เบี้ยสุทธิ</th>
                    <th>เบี้ยรวม</th>
                    <th>อากร</th>
                    <th>คอมมิชชั่น (<?=$rate?>%)</th>
                    <th>เงินส่งเบี้ย</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($res_report as $key_ => $value_) { ?>
                    <tr>
                        <td><?=$key_+1?></td>
                        <td><?=$value_['stock_id']?></td>
                        <td><?=$value_['cus_name']?></td>
                        <td><?=$value_['code']?></td>
                        <td><?=$value_['stock_date']?></td>
                        <td><?=$value_['insure_net']?></td>
                        <td><?=$value_['insure_total2']?></td>
                        <td><?=$value_['insure_duty']?></td>
                        <td><?=$value_['sum_rate']?></td>
                        <td><?=$value_['balance']?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="mt-5 h4 font-weight-light row">
            <?php foreach ($res_car as $key_car => $value_car) { ?>
                <div class="col-4">
                    <p>รวมรหัสรถ<?=$value_car['code']?> <b class="mx-4"><?=$value_car['count_car']?></b>กรมธรรม์</p>
                </div>
                <div class="col-8">
                    <p>รวมเบี้ยสุทธิ <b class="mx-4"><?=number_format($arr_sum[$key_car]['sum_insure_net'],2)?> บาท </b>
                    รวมเบี้ยรวม<b class="mx-4"><?=number_format($arr_sum[$key_car]['sum_insure_total2'],2)?> บาท </b></p>
                    <p>รวมคอมมิชชั่น<b class="mx-4"><?=number_format($arr_sum[$key_car]['sum_commission'],2)?> บาท </b>
                    รวมเงินส่งเบี้ย<b class="mx-4"><?=number_format($arr_sum[$key_car]['sum_balance'],2)?> บาท </b></p>
                </div>	
            <?php } ?>
            
        </div>
        <iframe src="print_form5.php?agent=<?=$agent?>&select_date=<?=$dateRange?>" name="frame5" style="width:0; height:0; border:0; border:none"></iframe>

        <script src="../matrix-admin/assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="../matrix-admin/assets/libs/jquery/dist/jquery.highlight.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="../matrix-admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
        <script src="../matrix-admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../matrix-admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
        <script src="../matrix-admin/assets/libs/timepicker/bootstrap-timepicker.js"></script>
        <script src="../matrix-admin/assets/libs/jquery.form-validator.min.js"></script>
        <script type="text/javascript" src="../matrix-admin/assets/libs/daterangepicker/moment.min.js"></script>
        <script type="text/javascript" src="../matrix-admin/assets/libs/daterangepicker/daterangepicker.js"></script>
        <script type="text/javascript" src="../matrix-admin/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker-custom.js"></script>
        <script type="text/javascript" src="../matrix-admin/assets/libs/bootstrap-datepicker/dist/locales/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>
        <!--Wave Effects -->
        <script src="../matrix-admin/dist/js/waves.js"></script>
        <!--Menu sidebar -->
        <script src="../matrix-admin/dist/js/sidebarmenu.js"></script>
        <!--Custom JavaScript -->
        <script src="../matrix-admin/dist/js/custom.min.js"></script>
        <script src="../matrix-admin/assets/libs/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="../matrix-admin/assets/libs/datatables/media/js/dataTables.searchHighlight.min.js"></script>
        <script src="../matrix-admin/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
        <script src="../matrix-admin/assets/libs/datatables/media/js/dataTables.buttons.min.js"></script>
        <script src="../matrix-admin/assets/libs/datatables/media/js/buttons.bootstrap4.min.js"></script>
        <script src="../matrix-admin/assets/libs/datatables/media/js/jszip.min.js"></script>
        <script src="../matrix-admin/assets/libs/datatables/media/js/buttons.html5.min.js"></script>
        <script src="../matrix-admin/assets/libs/datatables/media/js/buttons.print.min.js"></script>
        <script src="../matrix-admin/assets/libs/select2/dist/js/select2.full.min.js"></script>
        <script src="../matrix-admin/assets/libs/select2/dist/js/i18n/th.js"></script>


        <script type="text/javascript">
            $('#report_payment3').DataTable( {
                "scrollX": true,
                "paging":   false,
                "language": {
                    "url": "matrix-admin/assets/libs/datatables.net-bs4/Thai.json"
                }
            } );


            function print(){
                frames['frame1'].print();
            }
        </script>
    </body>
</html>