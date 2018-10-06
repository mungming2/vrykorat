<?php

//error_reporting(0);
set_time_limit(-1);
error_reporting(E_ALL & ~E_NOTICE);
ob_start();
session_start();
if(empty($_SESSION['username'])){
    header("Location:index.php");
}
include 'connect_db.php';

?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <title>Admin Report</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="matrix-admin/assets/libs/daterangepicker/daterangepicker.css" />
    <!-- Custom CSS -->
    <link href="matrix-admin/dist/css/style.min.css" rel="stylesheet">
    <link href="matrix-admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="matrix-admin/assets/libs/datatables/media/css/dataTables.searchHighlight.css" rel="stylesheet">
    <link href="matrix-admin/assets/libs/datatables/media/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <link href="matrix-admin/assets/libs/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="matrix-admin/assets/libs/select2/dist/css/select2-bootstrap.min.css" rel="stylesheet">
    <link href="matrix-admin/assets/libs/timepicker/bootstrap-timepicker.css" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="matrix-admin/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker3.standalone.min.css" />
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" class="h-100">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5" >
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <a class="navbar-brand" href="?page=dashboard">
                        <span class="logo-text ">
                             <!-- dark Logo text -->
                             <h3>Admin Report</h3>
                            
                        </span>
                    </a>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                    </ul>

                    <ul class="navbar-nav float-right ml-auto">

                        <li class="nav-item ">
                            <a href="logout.php" class="text-white h-100"><i class="fa fa-power-off m-r-5 m-l-5"></i> ออกจากระบบ</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>

        <?php include 'menu.php'; ?>
        <?php 
            function delimeterNumber($str) 
            { 
             $number = floatval(str_replace(',','',$str)); 
             return number_format ( $number , 2 , "." , "," ); 
            }
        ?>

        <div class="page-wrapper">
            <div class="page-breadcrumb" style="margin-top: 60px;">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title" id="header_name"></h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <?php include 'switch_menu.php'; ?>
            </div>

            <!--<footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>-->
            <br><br><br><br>

        </div>


    
    </div>



    <script src="matrix-admin/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="matrix-admin/assets/libs/jquery/dist/jquery.highlight.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="matrix-admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="matrix-admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="matrix-admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="matrix-admin/assets/libs/timepicker/bootstrap-timepicker.js"></script>
    <script src="matrix-admin/assets/libs/jquery.form-validator.min.js"></script>
    <script type="text/javascript" src="matrix-admin/assets/libs/daterangepicker/moment.min.js"></script>
    <script type="text/javascript" src="matrix-admin/assets/libs/daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="matrix-admin/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker-custom.js"></script>
    <script type="text/javascript" src="matrix-admin/assets/libs/bootstrap-datepicker/dist/locales/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>
    <!--Wave Effects -->
    <script src="matrix-admin/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="matrix-admin/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="matrix-admin/dist/js/custom.min.js"></script>
    <script src="matrix-admin/assets/libs/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="matrix-admin/assets/libs/datatables/media/js/dataTables.searchHighlight.min.js"></script>
    <script src="matrix-admin/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="matrix-admin/assets/libs/datatables/media/js/dataTables.buttons.min.js"></script>
    <script src="matrix-admin/assets/libs/datatables/media/js/buttons.bootstrap4.min.js"></script>
    <script src="matrix-admin/assets/libs/datatables/media/js/jszip.min.js"></script>
    <script src="matrix-admin/assets/libs/datatables/media/js/buttons.html5.min.js"></script>
    <script src="matrix-admin/assets/libs/datatables/media/js/buttons.print.min.js"></script>
    <script src="matrix-admin/assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="matrix-admin/assets/libs/select2/dist/js/i18n/th.js"></script>
    <script src="style_input.js"></script>
    <script src="style_report.js"></script>
    

    <script type="text/javascript">

    function reformatdaterange(dateval){
        redate = dateval.split(' ถึง ');
        returnDate1 = redate[0].split("/");
        returnDate2 = redate[1].split("/");
        return returnDate1[2] + "-" + returnDate1[1] + "-" + returnDate1[0] + ' ถึง ' + returnDate2[2] + "-" + returnDate2[1] + "-" + returnDate2[0];
    }

    function reformatdate(dateval){
        returnDate = dateval.split("/");
        return returnDate[2] + "-" + returnDate[1] + "-" + returnDate[0];
    }
	
	function reformStockData(objOriginal, objTarget){
		$("#" + objTarget).val(objOriginal.val().substring(5 , 12));
	}
    
        $(document).ready(function() {
            $.validate();
            
            $('.selecttimepicker').timepicker({
                minuteStep: 1,
                showMeridian: false,
                defaultTime: false,
                defaultTime: 'current',
                maxHours: 24
            });
            $('.selectOptions').select2({
                language: "th",
                theme: "bootstrap",
                placeholder: "Select a ..."
            });

            $('.input-daterange').datepicker({
                format: 'dd-mm-yyyy',
                todayBtn: true,
                language: 'th',
                thaiyear: true
            });
            
            $('.rangedate').daterangepicker({
                "autoApply": true,
                "opens": "right",
                "showDropdowns": true,
                "showCustomRangeLabel": false,
                "minYear": 2556,
                "lang":'th',
                "startDate": moment().add(543,'y'),
                "endDate"  : moment().add(543,'y'),
                "locale": {
                    format: 'YYYY-MM-DD',//'DD/MM/YYYY',
                    separator: ' ถึง ',
                }
            });
            /*
            $('.rangedate').on('change', function() {
                if( $('input[id="' + $(this).attr('name') + '_id"]').length > 0 ){
                    $('input[id="' + $(this).attr('name') + '_id"]').val(reformatdaterange($(this).val()));
                }else{
                    $('.rangedate').after().html('<input type="hidden" name="' + $(this).attr('name') + '" id="' + $(this).attr('name') + '_id" value="' + reformatdaterange($(this).val()) + '">');
                }
            });
			*/
            $('.rangedate-clear').daterangepicker({
                "autoUpdateInput": false,
                "processing": true,
                "opens": "right",
                "showDropdowns": true,
                "minYear": 2556,
                "lang":'th',
                "startDate": moment().add(543,'y'),
                "endDate"  : moment().add(543,'y'),
                "locale": {
                    "format": 'YYYY-MM-DD',
                    "separator": ' ถึง ',
                    "applyLabel": "นำไปใช้",
                    "cancelLabel": "ล้าง",
                }
            }); 

            $('input.rangedate-clear').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD',) + ' ถึง ' + picker.endDate.format('YYYY-MM-DD',));
                /*
                if( $('input[id="' + $(this).attr('name') + '_id"]').length > 0 ){
                    $('input[id="' + $(this).attr('name') + '_id"]').val(reformatdaterange($(this).val()));
                }else{
                    $('input.rangedate-clear').after().html('<input type="hidden" name="' + $(this).attr('name') + '" id="' + $(this).attr('name') + '_id" value="' + reformatdaterange($(this).val()) + '">');
                }
				*/
            });

            $('input.rangedate-clear').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });

            $('.singledate').daterangepicker({
                "singleDatePicker": true,
                "autoApply": true,
                "opens": "right",
                "startDate": moment().add(543,'y'),
                "locale": {
                    format: 'YYYY-MM-DD',
                }
            });

            $('.singledate_print').daterangepicker({
                "singleDatePicker": true,
                "autoApply": true,
                "opens": "right",
                "startDate": moment().add(543,'y'),
                "locale": {
                    format: 'DD/MM/YYYY',
                }
            });
			
			 $('.singledate-drop').daterangepicker({
                "singleDatePicker": true,
				"showDropdowns": true,
                "opens": "right",
                "minYear": 2480,
                "startDate": moment().add(543,'y'),
                "locale": {
                    format: 'YYYY-MM-DD'
                }
            });
			
            /*
            $('.singledate').on('change', function() {
                if( $('input[id="' + $(this).attr('name') + '_id"]').length > 0 ){
                    $('input[id="' + $(this).attr('name') + '_id"]').val(reformatdate($(this).val()));
                }else{
                    $('.singledate').after().html('<input type="hidden" name="' + $(this).attr('name') + '" id="' + $(this).attr('name') + '_id" value="' + reformatdate($(this).val()) + '">');
                }
            });
            */
            $('.single-end-1year').daterangepicker({
                "singleDatePicker": true,
                "autoApply": true,
                "opens": "right",
                "startDate": moment().add(544,'y'),
                "locale": {
                    format: 'YYYY-MM-DD',
                }
            });
            /*
            $('.single-end-1year').on('change', function() {
                if( $('input[id="' + $(this).attr('name') + '_id"]').length > 0 ){
                    $('input[id="' + $(this).attr('name') + '_id"]').val(reformatdate($(this).val()));
                }else{
                    $('.single-end-1year').after().html('<input type="hidden" name="' + $(this).attr('name') + '" id="' + $(this).attr('name') + '_id" value="' + reformatdate($(this).val()) + '">');
                }
            });
            */
            $('.singledate-getvalue').daterangepicker({
                "singleDatePicker": true,
                "autoApply": true,
                "opens": "right",
                "locale": {
                    format: 'YYYY-MM-DD',
                }
            });
            /*
            $('.singledate-getvalue').on('change', function() {
                if( $('input[id="' + $(this).attr('name') + '_id"]').length > 0 ){
                    $('input[id="' + $(this).attr('name') + '_id"]').val(reformatdate($(this).val()));
                }else{
                    $('.singledate-getvalue').after().html('<input type="hidden" name="' + $(this).attr('name') + '" id="' + $(this).attr('name') + '_id" value="' + reformatdate($(this).val()) + '">');
                }
            });         
			*/
        } );

        $(document).on("keyup", ".sumstock", function() {
            var sum = 0;
                sum = Number($("#index_end").val().slice(0, -1)) - Number($("#index_start").val().slice(0, -1)) + 1;
            $("#total1").val(sum);
        });
		$(document).on("change", ".sumstock", function() {			
			reformStockData($("#index_start"), 'stock_start1');
			reformStockData($("#index_end"), 'stock_end1');
        });
        $(document).on("keyup", ".sumstock2", function() {
            var sum = 0;
                sum = Number($("#stock_end2").val()) - Number($("#stock_start2").val()) + 1;
            $("#total2").val(sum);
        });
        $(document).on("keyup", ".sumstock3", function() {
            var sum = 0;
                sum = Number($("#stock_end3").val()) - Number($("#stock_start3").val()) + 1;
            $("#total3").val(sum);
        });

    </script>

</body>

</html>