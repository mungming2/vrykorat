var tableReport;
var count = 0;

function numberWithCommas(n) {
	var parts=n.toString().split(".");
	return parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",") + (parts[1] ? "." + parts[1] : "");
}

$('#table_member').DataTable({
    "scrollX": true,
    "language": {
        "url": "matrix-admin/assets/libs/datatables.net-bs4/Thai.json"
    },
});
$("#submit_report1").click(function () {
    $('#showTable').show();
    var serializedData = $("#form_report").serialize();
    if (count > 0) { tableReport.destroy(); }
    count++;

    console.log("menu-stock/submitreport.php?reports=1&" + serializedData);
    tableReport = $('#table_report').DataTable({
        "scrollX": true,
        "language": {
            "url": "matrix-admin/assets/libs/datatables.net-bs4/Thai.json"
        },
        "ajax": {
            "url": "menu-stock/submitreport.php?reports=1&" + serializedData
        },
        "columns": [
            { "data": "no" },
            { "data": "update_date" },
            { "data": "datetime" },
            { "data": "type" },
            { "data": "stock_all" },
            { "data": "index_all" },
            { "data": "stock_total" },
            { "data": "action" }
        ]
    });
});

$("#submit_report2").click(function () {
    $('#showTable').show();
    var serializedData = $("#form_report").serialize();
    if (count > 0) { tableReport.destroy(); }
    count++;

    console.log("menu-stock/submitreport.php?reports=2&" + serializedData);
    tableReport = $('#table_report2').DataTable({
        "scrollX": true,
        "language": {
            "url": "matrix-admin/assets/libs/datatables.net-bs4/Thai.json"
        },
        "ajax": {
            "url": "menu-stock/submitreport.php?reports=2&" + serializedData
        },
        "columns": [
            { "data": "no" },
            { "data": "update_date" },
            { "data": "datetime" },
            { "data": "agent_id" },
            { "data": "agent_name" },
            { "data": "type" },
            { "data": "stock_all" },
            { "data": "stock_total" },
            { "data": "action" }
        ]
    });
});

$("#submit_report3").click(function () {
    $('#showTable').show();
    var serializedData = $("#form_report").serialize();
    if (count > 0) { tableReport.destroy(); }
    count++;

    console.log("menu-stock/submitreport.php?reports=3&" + serializedData);
    tableReport = $('#table_report3').DataTable({
        "scrollX": true,
        "language": {
            "url": "matrix-admin/assets/libs/datatables.net-bs4/Thai.json"
        },
        "ajax": {
            "url": "menu-stock/submitreport.php?reports=3&" + serializedData
        },
        "columns": [
            { "data": "no" },
            { "data": "update_date" },
            { "data": "datetime" },
            { "data": "agent_id" },
            { "data": "agent_name" },
            { "data": "status" },
            { "data": "stock_all" },
            { "data": "stock_total" },
            { "data": "action" }
        ]
    });
});

$("#submit_report4").click(function () {
    $('#showTable').show();
    var serializedData = $("#form_report").serialize();
    if (count > 0) { tableReport.destroy(); }
    count++;

    console.log("menu-stock/submitreport.php?reports=4&" + serializedData);
    tableReport = $('#table_report4').DataTable({
        "scrollX": true,
        "language": {
            "url": "matrix-admin/assets/libs/datatables.net-bs4/Thai.json"
        },
        "ajax": {
            "url": "menu-stock/submitreport.php?reports=4&" + serializedData
        },
        "columns": [
            { "data": "num" },
            { "data": "datetime" },
            { "data": "stock_start" },
            { "data": "stock_end" },
            { "data": "index_start_end" },
            { "data": "stock_total" },
            { "data": "user" },
            { "data": "stock_use" },
            { "data": "stock_cancel" },
            { "data": "stock_return" },
            { "data": "stock_remain" }
        ],
        dom: 'Bfrtip',
        "buttons": [
            {
                "extend": 'print',
                "className": 'btn btn-info',
                "orientation": 'landscape',
                "text": 'สั่งพิมพ์',
                "title": '',
                "messageTop": '<h4 align="center"> รายงานทะเบียนสต็อก</h4>',
                "footer": true,
                autoPrint: true,
                customize: function (win) {

                    var last = null;
                    var current = null;
                    var bod = [];

                    var css = '@page { size: landscape;}',
                        head = win.document.head || win.document.getElementsByTagName('head')[0],
                        style = win.document.createElement('style');

                    style.type = 'text/css';
                    style.media = 'print';

                    if (style.styleSheet) {
                        style.styleSheet.cssText = css;
                    }
                    else {
                        style.appendChild(win.document.createTextNode(css));
                    }

                    head.appendChild(style);
                    $(win.document.body).css('font-size', '8pt');

                    $(win.document.body).find('table')
                        .removeClass('dataTable')
                        .css('font-size', 'inherit');

                }
            }
        ]
    });
});

$("#submit_report5").click(function () {
    $('#showTable').show();
    var serializedData = $("#form_report").serialize();
    if (count > 0) { tableReport.destroy(); }
    count++;

    console.log("menu-stock/submitreport.php?reports=5&" + serializedData);
    tableReport = $('#table_report5').DataTable({
        "scrollX": true,
        "language": {
            "url": "matrix-admin/assets/libs/datatables.net-bs4/Thai.json"
        },
        "ajax": {
            "url": "menu-stock/submitreport.php?reports=5&" + serializedData
        },
        "columns": [
            { "data": "num" },
            { "data": "datetime" },
            { "data": "stock_start_end" },
            { "data": "stock_total" },
            { "data": "stock_use_start_end" },
            { "data": "stock_use" },
            { "data": "stock_cancel" },
            { "data": "stock_return" },
            { "data": "stock_remain" },
            { "data": "remain_start_end" },
        ],
        dom: 'Bfrtip',
        "buttons": [
            {
                "extend": 'print',
                "className": 'btn btn-info',
                "orientation": 'landscape',
                "text": 'สั่งพิมพ์',
                "title": '',
                "messageTop": '<h4 align="center">รายงานสต็อกตัวแทน</h4>',
                "footer": true,
                autoPrint: true,
                customize: function (win) {

                    var last = null;
                    var current = null;
                    var bod = [];

                    var css = '@page { size: landscape;}',
                        head = win.document.head || win.document.getElementsByTagName('head')[0],
                        style = win.document.createElement('style');

                    style.type = 'text/css';
                    style.media = 'print';

                    if (style.styleSheet) {
                        style.styleSheet.cssText = css;
                    }
                    else {
                        style.appendChild(win.document.createTextNode(css));
                    }

                    head.appendChild(style);
                    $(win.document.body).css('font-size', '8pt');

                    $(win.document.body).find('table')
                        .removeClass('dataTable')
                        .css('font-size', 'inherit');

                }
            }
        ]
    });
});

$("#submit_report6").click(function () {
    $('#showTable').show();
    var serializedData = $("#form_report").serialize();
    if (count > 0) { tableReport.destroy(); }
    count++;

    console.log("menu-stock/submitreport.php?reports=6&" + serializedData);
    tableReport = $('#table_report6').DataTable({
        "scrollX": true,
        "language": {
            "url": "matrix-admin/assets/libs/datatables.net-bs4/Thai.json"
        },
        "ajax": {
            "url": "menu-stock/submitreport.php?reports=6&" + serializedData
        }//,
        // "columns": [
        //     { "data": "no" },
        //     { "data": "update_date" },
        //     { "data": "datetime" },
        //     { "data": "agent_id" },
        //     { "data": "agent_name" },
        //     { "data": "status" },
        //     { "data": "stock_all" },
        //     { "data": "stock_total" },
        //     { "data": "action" }
        // ]
    });
});

$("#submit_report7").click(function () {
    $('#showTable').show();
    var serializedData = $("#form_report").serialize();
    if (count > 0) { tableReport.destroy(); }
    count++;

    console.log("menu-stock/submitreport.php?reports=7&" + serializedData);
    tableReport = $('#table_report7').DataTable({
        "scrollX": true,
        "language": {
            "url": "matrix-admin/assets/libs/datatables.net-bs4/Thai.json"
        },
        "ajax": {
            "url": "menu-stock/submitreport.php?reports=7&" + serializedData
        },
        "columns": [
            { "data": "num" },
            { "data": "datetime" },
            { "data": "code" },
            { "data": "type" },
            { "data": "stock_total" },
            { "data": "index_start_end" },
            { "data": "stock_use" },
            { "data": "stock_use_start_end" },
            { "data": "stock_remain" },
            { "data": "remain_start_end" }
        ],
        dom: 'Bfrtip',
        "buttons": [
            {
                "extend": 'print',
                "className": 'btn btn-info',
                "orientation": 'landscape',
                "text": 'สั่งพิมพ์',
                "title": '',
                "messageTop": '<h4 align="center">รายงานสต็อกกรมธรรม์ภาคสมัครใจ</h4>',
                "footer": true,
                autoPrint: true,
                customize: function (win) {

                    var last = null;
                    var current = null;
                    var bod = [];

                    var css = '@page { size: landscape;}',
                        head = win.document.head || win.document.getElementsByTagName('head')[0],
                        style = win.document.createElement('style');

                    style.type = 'text/css';
                    style.media = 'print';

                    if (style.styleSheet) {
                        style.styleSheet.cssText = css;
                    }
                    else {
                        style.appendChild(win.document.createTextNode(css));
                    }

                    head.appendChild(style);
                    $(win.document.body).css('font-size', '8pt');

                    $(win.document.body).find('table')
                        .removeClass('dataTable')
                        .css('font-size', 'inherit');

                }
            }
        ]
    });
});

$("#submit_report_payment1").click(function () {
    $('#showTable').show();
    var serializedData = $("#form_report").serialize();
    if (count > 0) { tableReport.destroy(); }
    count++;

    console.log("menu-payment/submitreport.php?reports=1&" + serializedData);
    tableReport = $('#report_payment1').DataTable({
        "scrollX": true,
        "searchHighlight": true,
        "language": {
            "url": "matrix-admin/assets/libs/datatables.net-bs4/Thai.json"
        },
        "ajax": {
            "url": "menu-payment/submitreport.php?reports=1&" + serializedData
        },
        "columns": [
            { "data": "num" },
            { "data": "stock_date" },
            { "data": "stock_id" },
            { "data": "cus_name" },
            { "data": "car" },
            { "data": "car_number" },
            { "data": "insure_net" },
            { "data": "insure_total2" },
            { "data": "p_tax_deductions" },
            { "data": "p_discount" },
            { "data": "p_balance" },
            { "data": "p_payment_date" },
            { "data": "cus_type2" },
            { "data": "action" }
        ],
        dom: 'Bfrtip',
        "buttons": [
            {
                "extend": 'print',
                "className": 'btn btn-info',
                "orientation": 'landscape',
                "text": 'สั่งพิมพ์',
                "title": '',
                "messageTop": '<h4 align="center">รายงาน พรบ.</h4>',
                "footer": true,
                autoPrint: true,
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
                },
                customize: function (win) {

                    var last = null;
                    var current = null;
                    var bod = [];

                    var css = '@page { size: landscape;}',
                        head = win.document.head || win.document.getElementsByTagName('head')[0],
                        style = win.document.createElement('style');

                    style.type = 'text/css';
                    style.media = 'print';

                    if (style.styleSheet) {
                        style.styleSheet.cssText = css;
                    }
                    else {
                        style.appendChild(win.document.createTextNode(css));
                    }

                    head.appendChild(style);
                    $(win.document.body).css('font-size', '8pt');

                    $(win.document.body).find('table')
                        .removeClass('dataTable')
                        .css('font-size', 'inherit');

                }
            }
        ]
    });

});

$("#submit_report_payment2").click(function () {
    $('#showTable').show();
    var serializedData = $("#form_report").serialize();
    if (count > 0) { tableReport.destroy(); }
    count++;

    console.log("menu-payment/submitreport.php?reports=2&" + serializedData);
    tableReport = $('#report_payment2').DataTable({
        "scrollX": true,
        "language": {
            "url": "matrix-admin/assets/libs/datatables.net-bs4/Thai.json"
        },
        "ajax": {
            "url": "menu-payment/submitreport.php?reports=2&" + serializedData
        },
        "columns": [
            { "data": "num" },
			{ "data": "bill_no" },
            { "data": "inform_date" },
            { "data": "stock_id" },
			{ "data": "stock_type" },
            { "data": "cus_name" },
            { "data": "car" },
            { "data": "car_number" },
            { "data": "insure_net" },
            { "data": "insure_total2" },
            { "data": "p_tax_deductions" },
            { "data": "p_discount" },
            { "data": "p_balance" },
            { "data": "p_payment_date" },
            { "data": "cus_type2" },
            { "data": "action" }
        ],
        dom: 'Bfrtip',
        "buttons": [
            {
                "extend": 'print',
                "className": 'btn btn-info',
                "orientation": 'landscape',
                "text": 'สั่งพิมพ์',
                "title": '',
                "messageTop": '<h4 align="center">รายงานสมัครใจ</h4>',
                "footer": true,
                autoPrint: true,
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]
                },
                customize: function (win) {

                    var last = null;
                    var current = null;
                    var bod = [];

                    var css = '@page { size: landscape;}',
                        head = win.document.head || win.document.getElementsByTagName('head')[0],
                        style = win.document.createElement('style');

                    style.type = 'text/css';
                    style.media = 'print';

                    if (style.styleSheet) {
                        style.styleSheet.cssText = css;
                    }
                    else {
                        style.appendChild(win.document.createTextNode(css));
                    }

                    head.appendChild(style);
                    $(win.document.body).css('font-size', '8pt');

                    $(win.document.body).find('table')
                        .removeClass('dataTable')
                        .css('font-size', 'inherit');

                }
            }
        ]
    });
});

$("#submit_report_payment3").click(function () {
    $('#showTable').show();
    var serializedData = $("#form_report").serialize();
    var url = 'menu-payment/ifr_form3.php?' + serializedData;
    $('#payment_ifr3').attr('src', url);

});

$("#submit_report_payment4").click(function () {
    var serializedData = $("#form_report").serialize();
    if (count > 0) { tableReport.destroy(); }
    count++;
	console.log(count);
    console.log("menu-payment/submitreport.php?reports=4&" + serializedData);
    if ($('#type1').is(':checked')) {
		$('#showTable1').show();
        $('#showTable2').hide();
        tableReport = $('#report_payment41').DataTable({
            "scrollX": true,
            "language": {
                "url": "matrix-admin/assets/libs/datatables.net-bs4/Thai.json"
            },
            "ajax": {
                "url": "menu-payment/submitreport.php?reports=4&" + serializedData
            },
            "columns": [
                { "title": "ลำดับ", "data": "num" },
                { "title": "เลขที่วางบิล", "data": "bill_no" },
                { "title": "วันที่ทำกรมธรรม์", "data": "stock_date" },
                { "title": "วันที่ลงบัญชี", "data": "account_date" },
                { "title": "วันที่เคลียร์เบี้ย", "data": "clear_date" },
                { "title": "เลขที่กรมธรรม์", "data": "stock_id" },
                { "title": "ผู้เอาประกัน", "data": "cus_name" },
                { "title": "ทะเบียน", "data": "car_number" },
                { "title": "จำนวนเงินค้าง", "data": "arrears" },
                { "title": "รับแจ้งโดย", "data": "inform_id" }
            ],
            dom: 'Bfrtip',
            "buttons": [
                {
                    "extend": 'print',
                    "className": 'btn btn-info',
                    "orientation": 'landscape',
                    "text": 'สั่งพิมพ์',
                    "title": '',
                    "messageTop": '<h3>รายงานลูกหนี้ค้างชำระ ( พรบ. )</h3>',
                    "footer": true,
                    autoPrint: true,
                    customize: function (win) {

                        var last = null;
                        var current = null;
                        var bod = [];

                        var css = '@page { size: landscape;}',
                            head = win.document.head || win.document.getElementsByTagName('head')[0],
                            style = win.document.createElement('style');

                        style.type = 'text/css';
                        style.media = 'print';

                        if (style.styleSheet) {
                            style.styleSheet.cssText = css;
                        }
                        else {
                            style.appendChild(win.document.createTextNode(css));
                        }

                        head.appendChild(style);
                        $(win.document.body).css('font-size', '8pt');

                        $(win.document.body).find('table')
                            .removeClass('dataTable')
                            .css('font-size', 'inherit');

                    }
                }
            ]
        });
    } else {
		$('#showTable1').hide();
        $('#showTable2').show();
        tableReport = $('#report_payment42').DataTable({
            "scrollX": true,
            "language": {
                "url": "matrix-admin/assets/libs/datatables.net-bs4/Thai.json"
            },
            "ajax": {
                "url": "menu-payment/submitreport.php?reports=4&" + serializedData
            },
            "columns": [
                { "title": "ลำดับ", "data": "num" },
                { "title": "เลขที่วางบิล", "data": "bill_no" },
				{ "title": "วันที่รับแจ้ง", "data": "inform_date" },
                { "title": "เลขที่กรมธรรม์", "data": "stock_id" },
                { "title": "วันที่ลงบัญชี", "data": "account_date" },
                { "title": "วันที่เคลียร์เบี้ย", "data": "clear_date" },
                { "title": "วันที่คุ้มครอง", "data": "insure_date" },
                { "title": "ผู้เอาประกัน", "data": "cus_name" },
                { "title": "ทะเบียน", "data": "car_number" },
                { "title": "จำนวนเงินค้าง", "data": "arrears" },
                { "title": "ตัวแทน", "data": "agent" }
            ],
            dom: 'Bfrtip',
            "buttons": [
                {
                    "extend": 'print',
                    "className": 'btn btn-info',
                    "orientation": 'landscape',
                    "text": 'สั่งพิมพ์',
                    "title": '',
                    "messageTop": '<h3>รายงานลูกหนี้ค้างชำระ ( สมัครใจ )</h3>',
                    "footer": true,
                    autoPrint: true,
                    customize: function (win) {

                        var last = null;
                        var current = null;
                        var bod = [];

                        var css = '@page { size: landscape;}',
                            head = win.document.head || win.document.getElementsByTagName('head')[0],
                            style = win.document.createElement('style');

                        style.type = 'text/css';
                        style.media = 'print';

                        if (style.styleSheet) {
                            style.styleSheet.cssText = css;
                        }
                        else {
                            style.appendChild(win.document.createTextNode(css));
                        }

                        head.appendChild(style);
                        $(win.document.body).css('font-size', '8pt');

                        $(win.document.body).find('table')
                            .removeClass('dataTable')
                            .css('font-size', 'inherit');

                    }
                }
            ]
        });
    }



});

$("#submit_report_payment5").click(function () {
    $('#showTable').show();
    var serializedData = $("#form_report").serialize();
    var url = 'menu-payment/ifr_form5.php?' + serializedData;
    $('#payment_ifr5').attr('src', url);

});

$("#submit_report_miscellany1").click(function () {
    $('#showTable').show();
    var serializedData = $("#form_report").serialize();
    if (count > 0) { tableReport.destroy(); }
    count++;

    console.log("menu-miscellany/submitreport.php?reports=1&" + serializedData);
    tableReport = $('#report_miscellany1').DataTable({
        "scrollX": true,
        "language": {
            "url": "matrix-admin/assets/libs/datatables.net-bs4/Thai.json"
        },
        "ajax": {
            "url": "menu-miscellany/submitreport.php?reports=1&" + serializedData
        },
        "columns": [
            { "data": "num" },
            { "data": "stock_date" },
            { "data": "stock_id" },
            { "data": "insure_type" },
            { "data": "cus_name" },
            { "data": "insure_net" },
            { "data": "insure_total2" },
            { "data": "p_tax_deductions" },
            { "data": "p_discount" },
            { "data": "p_balance" },
            { "data": "p_payment_date" },
            { "data": "inform_id" },
            { "data": "action" }
        ],
        dom: 'Bfrtip',
        "buttons": [
            {
                "extend": 'print',
                "className": 'btn btn-info',
                "orientation": 'landscape',
                "text": 'สั่งพิมพ์',
                "title": '',
                "messageTop": '<h4 align="center">รายงานเบ็ดเตล็ดอุบัติเหตุและสุขภาพ /อื่น</h4>',
                "footer": true,
                autoPrint: true,
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                },
                customize: function (win) {

                    var last = null;
                    var current = null;
                    var bod = [];

                    var css = '@page { size: landscape;}',
                        head = win.document.head || win.document.getElementsByTagName('head')[0],
                        style = win.document.createElement('style');

                    style.type = 'text/css';
                    style.media = 'print';

                    if (style.styleSheet) {
                        style.styleSheet.cssText = css;
                    }
                    else {
                        style.appendChild(win.document.createTextNode(css));
                    }

                    head.appendChild(style);
                    $(win.document.body).css('font-size', '8pt');

                    $(win.document.body).find('table')
                        .removeClass('dataTable')
                        .css('font-size', 'inherit');

                }
            }
        ]
    });
});

$("#submit_report_miscellany2").click(function () {
    $('#showTable').show();
    var serializedData = $("#form_report").serialize();
    if (count > 0) { tableReport.destroy(); }
    count++;

    console.log("menu-miscellany/submitreport.php?reports=2&" + serializedData);
    tableReport = $('#report_miscellany2').DataTable({
        "scrollX": true,
        "language": {
            "url": "matrix-admin/assets/libs/datatables.net-bs4/Thai.json"
        },
        "ajax": {
            "url": "menu-miscellany/submitreport.php?reports=2&" + serializedData
        },
        "columns": [
            { "data": "num" },
            { "data": "stock_date" },
            { "data": "stock_id" },
            { "data": "insure_type" },
            { "data": "cus_name" },
            { "data": "insure_net" },
            { "data": "insure_total2" },
            { "data": "p_tax_deductions" },
            { "data": "p_discount" },
            { "data": "p_balance" },
            { "data": "p_payment_date" },
            { "data": "inform_id" },
            { "data": "action" }
        ],
        dom: 'Bfrtip',
        "buttons": [
            {
                "extend": 'print',
                "className": 'btn btn-info',
                "orientation": 'landscape',
                "text": 'สั่งพิมพ์',
                "title": '',
                "messageTop": '<h3 align="center">รายงานเบ็ดเตล็ดเกี่ยวกับรถ</h3>',
                "footer": true,
                autoPrint: true,
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                },
                customize: function (win) {

                    var last = null;
                    var current = null;
                    var bod = [];

                    var css = '@page { size: landscape;}',
                        head = win.document.head || win.document.getElementsByTagName('head')[0],
                        style = win.document.createElement('style');

                    style.type = 'text/css';
                    style.media = 'print';

                    if (style.styleSheet) {
                        style.styleSheet.cssText = css;
                    }
                    else {
                        style.appendChild(win.document.createTextNode(css));
                    }

                    head.appendChild(style);
                    $(win.document.body).css('font-size', '8pt');

                    $(win.document.body).find('table')
                        .removeClass('dataTable')
                        .css('font-size', 'inherit');

                }
            }
        ]
    });
});

$("#submit_report_miscellany4").click(function () {
    var serializedData = $("#form_report").serialize();
    if (count > 0) { tableReport.destroy(); }
    count++;
	console.log(count);
    console.log("menu-miscellany/submitreport.php?reports=4&" + serializedData);
    if ($('#type1').is(':checked')) {
		$('#showTable1').show();
        $('#showTable2').hide();
        tableReport = $('#report_miscellany41').DataTable({
            "scrollX": true,
            "language": {
                "url": "matrix-admin/assets/libs/datatables.net-bs4/Thai.json"
            },
            "ajax": {
                "url": "menu-miscellany/submitreport.php?reports=4&" + serializedData
            },
            "columns": [
                { "title": "ลำดับ", "data": "num" },
                { "title": "เลขที่วางบิล", "data": "bill_no" },
                { "title": "วันที่ทำกรมธรรม์", "data": "stock_date" },
                { "title": "วันที่ลงบัญชี", "data": "account_date" },
                { "title": "วันที่เคลียร์เบี้ย", "data": "clear_date" },
                { "title": "เลขที่กรมธรรม์", "data": "stock_id" },
                { "title": "ผู้เอาประกัน", "data": "cus_name" },
                { "title": "จำนวนเงินค้าง", "data": "arrears" },
                { "title": "รับแจ้งโดย", "data": "inform_id" }
            ],
            dom: 'Bfrtip',
            "buttons": [
                {
                    "extend": 'print',
                    "className": 'btn btn-info',
                    "orientation": 'landscape',
                    "text": 'สั่งพิมพ์',
                    "title": '',
                    "messageTop": '<h3>รายงานลูกหนี้ค้างชำระ ( อุบัติเหตุและสุขภาพ /อื่น )</h3>',
                    "footer": true,
                    autoPrint: true,
                    customize: function (win) {

                        var last = null;
                        var current = null;
                        var bod = [];

                        var css = '@page { size: landscape;}',
                            head = win.document.head || win.document.getElementsByTagName('head')[0],
                            style = win.document.createElement('style');

                        style.type = 'text/css';
                        style.media = 'print';

                        if (style.styleSheet) {
                            style.styleSheet.cssText = css;
                        }
                        else {
                            style.appendChild(win.document.createTextNode(css));
                        }

                        head.appendChild(style);
                        $(win.document.body).css('font-size', '8pt');

                        $(win.document.body).find('table')
                            .removeClass('dataTable')
                            .css('font-size', 'inherit');

                    }
                }
            ]
        });
    } else {
		$('#showTable1').hide();
        $('#showTable2').show();
        tableReport = $('#report_miscellany42').DataTable({
            "scrollX": true,
            "language": {
                "url": "matrix-admin/assets/libs/datatables.net-bs4/Thai.json"
            },
            "ajax": {
                "url": "menu-miscellany/submitreport.php?reports=4&" + serializedData
            },
            "columns": [
                { "title": "ลำดับ", "data": "num" },
                { "title": "เลขที่วางบิล", "data": "bill_no" },
                { "title": "วันที่ทำกรมธรรม์", "data": "stock_date" },
                { "title": "วันที่ลงบัญชี", "data": "account_date" },
                { "title": "วันที่เคลียร์เบี้ย", "data": "clear_date" },
                { "title": "เลขที่กรมธรรม์", "data": "stock_id" },
                { "title": "ผู้เอาประกัน", "data": "cus_name" },
                { "title": "ทะเบียน", "data": "car_number" },
                { "title": "จำนวนเงินค้าง", "data": "arrears" },
                { "title": "รับแจ้งโดย", "data": "inform_id" }
            ],
            dom: 'Bfrtip',
            "buttons": [
                {
                    "extend": 'print',
                    "className": 'btn btn-info',
                    "orientation": 'landscape',
                    "text": 'สั่งพิมพ์',
                    "title": '',
                    "messageTop": '<h3>รายงานลูกหนี้ค้างชำระ ( เกี่ยวกับรถ )</h3>',
                    "footer": true,
                    autoPrint: true,
                    customize: function (win) {

                        var last = null;
                        var current = null;
                        var bod = [];

                        var css = '@page { size: landscape;}',
                            head = win.document.head || win.document.getElementsByTagName('head')[0],
                            style = win.document.createElement('style');

                        style.type = 'text/css';
                        style.media = 'print';

                        if (style.styleSheet) {
                            style.styleSheet.cssText = css;
                        }
                        else {
                            style.appendChild(win.document.createTextNode(css));
                        }

                        head.appendChild(style);
                        $(win.document.body).css('font-size', '8pt');

                        $(win.document.body).find('table')
                            .removeClass('dataTable')
                            .css('font-size', 'inherit');

                    }
                }
            ]
        });
    }



});

var getTotal;

$("#submit_report_renewal1").click(function () {
    $('#showTable').show();
    var serializedData = $("#form_report").serialize();
    if (count > 0) { tableReport.destroy(); }
    count++;

    console.log("menu-renewal/submitreport.php?reports=1&" + serializedData);
    console.log($('#showTfoot').html());
    tableReport = $('#report_renewal1').DataTable({
        "scrollX": true,
        "language": {
            "url": "matrix-admin/assets/libs/datatables.net-bs4/Thai.json"
        },
        "ajax": {
            "url": "menu-renewal/submitreport.php?reports=1&" + serializedData
        },
        "columns": [
            { "data": "no" },
            { "data": "bill_no" },
            { "data": "deposit_date" },
            { "data": "name" },
            { "data": "car_number" },
            { "data": "renew2" },
            { "data": "total" },
            { "data": "return_date" },
            { "data": "status_register" },
            { "data": "sign_receiver" },
            { "data": "action" }
        ],
        "footerCallback": function (row, data, start, end, display) {
            var api = this.api(), data;
            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ?
                        i : 0;
            };
            // Total over all pages
            total = api
                .column(6)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer
            $(api.column(6).footer()).html(
                numberWithCommas(total.toFixed(2)) + ' บาท'
            );
            getTotal = '<b>รวมเงิน: </b>' + numberWithCommas(total.toFixed(2)) + ' บาท';
        },
        dom: 'Bfrtip',
        "buttons": [
            {
                "extend": 'print',
                "className": 'btn btn-info',
                "orientation": 'landscape',
                "text": 'สั่งพิมพ์',
                "title": '',
                "messageTop": '<h3>รายงานใบแจ้งบริการต่อภาษีประจำวัน</h3>',
                "footer": true,
                autoPrint: true,
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                },
                customize: function (win) {

                    var css = '@page { size: landscape;}',
                        head = win.document.head || win.document.getElementsByTagName('head')[0],
                        style = win.document.createElement('style');

                    style.type = 'text/css';
                    style.media = 'print';

                    if (style.styleSheet) {
                        style.styleSheet.cssText = css;
                    }
                    else {
                        style.appendChild(win.document.createTextNode(css));
                    }

                    head.appendChild(style);
                    $(win.document.body).css('font-size', '8pt');

                    $(win.document.body).find('table')
                        .removeClass('dataTable')
                        .css('font-size', 'inherit');

                }
            }
        ]

    });
});

$("#submit_report_other1").click(function () {
    var serializedData = $("#form_report").serialize();
    if (count > 0) { tableReport.destroy(); }
    count++;

    console.log("menu-report/submitreport1.php?" + serializedData);
    if ($('#report_type1').is(':checked')) {
        $('#showTable1').show();
        $('#showTable2').hide();
        $('#showTable3').hide();
        $('#showTable4').hide();
        tableReport = $('#report_other1').DataTable({
            "scrollX": true,
            "language": {
                "url": "matrix-admin/assets/libs/datatables.net-bs4/Thai.json"
            },
            "ajax": {
                "url": "menu-report/submitreport1.php?reports=1&" + serializedData
            },
            "columns": [
                { "title": "ลำดับ", "data": "num" },
                { "title": "เลขที่กรมธรรม์", "data": "stock_id" },
                { "title": "ผู้เอาประกัน", "data": "cus_name" },
                { "title": "ที่อยู่", "data": "cus_address" },
                { "title": "ทะเบียน", "data": "car_number" },
                { "title": "วันสิ้นสุดคุ้มครอง", "data": "insure_date" },
                { "title": "เบี้ยรวม", "data": "insure_total2" },
                { "title": "ประเภทลูกค้า", "data": "cus_type2" },
                { "title": "เบอร์โทร", "data": "cus_tel" },
                { "title": "สถานะควบประกันอื่นๆ", "data": "cus_status" }
            ],
            dom: 'Bfrtip',
            "buttons": [
                {
                    "extend": 'print',
                    "className": 'btn btn-info',
                    "orientation": 'landscape',
                    "text": 'สั่งพิมพ์',
                    "title": '',
                    "messageTop": '<h3>รายงานใบเตือนต่ออายุ ( พรบ. )</h3>',
                    "footer": true,
                    autoPrint: true,
                    customize: function (win) {

                        var last = null;
                        var current = null;
                        var bod = [];

                        var css = '@page { size: landscape;}',
                            head = win.document.head || win.document.getElementsByTagName('head')[0],
                            style = win.document.createElement('style');

                        style.type = 'text/css';
                        style.media = 'print';

                        if (style.styleSheet) {
                            style.styleSheet.cssText = css;
                        }
                        else {
                            style.appendChild(win.document.createTextNode(css));
                        }

                        head.appendChild(style);
                        $(win.document.body).css('font-size', '8pt');

                        $(win.document.body).find('table')
                            .removeClass('dataTable')
                            .css('font-size', 'inherit');

                    }
                }
            ]
        });
    } else if($('#report_type2').is(':checked')) {
        $('#showTable1').hide();
        $('#showTable2').show();
        $('#showTable3').hide();
        $('#showTable4').hide();
        tableReport = $('#report_other2').DataTable({
            "scrollX": true,
            "language": {
                "url": "matrix-admin/assets/libs/datatables.net-bs4/Thai.json"
            },
            "ajax": {
                "url": "menu-report/submitreport1.php?reports=2&" + serializedData
            },
            "columns": [
                { "title": "ลำดับ", "data": "num" },
                { "title": "เลขที่กรมธรรม์", "data": "stock_id" },
                { "title": "ผู้เอาประกัน", "data": "cus_name" },
                { "title": "ที่อยู่", "data": "cus_address" },
                { "title": "ทะเบียน", "data": "car_number" },
                { "title": "ยี่ห้อ", "data": "car_brand" },
                { "title": "รุ่นรถ", "data": "car_modal" },
                { "title": "วันสิ้นสุดคุ้มครอง", "data": "insure_date" },
                { "title": "ประเภทกรมธรรม์", "data": "stock_type" },
                { "title": "ทุนประกัน", "data": "insurance" },
                { "title": "เบี้ยสุทธิ", "data": "insure_net" },
                { "title": "เบี้ยรวม", "data": "insure_total2" },
                { "title": "ประเภทลูกค้า", "data": "cus_type2" },
                { "title": "เบอร์โทร", "data": "cus_tel" },
                { "title": "สถานะควบประกันอื่นๆ", "data": "cus_status" }
            ],
            dom: 'Bfrtip',
            "buttons": [
                {
                    "extend": 'print',
                    "className": 'btn btn-info',
                    "orientation": 'landscape',
                    "text": 'สั่งพิมพ์',
                    "title": '',
                    "messageTop": '<h3>รายงานใบเตือนต่ออายุ ( สมัตรใจ )</h3>',
                    "footer": true,
                    autoPrint: true,
                    customize: function (win) {

                        var last = null;
                        var current = null;
                        var bod = [];

                        var css = '@page { size: landscape;}',
                            head = win.document.head || win.document.getElementsByTagName('head')[0],
                            style = win.document.createElement('style');

                        style.type = 'text/css';
                        style.media = 'print';

                        if (style.styleSheet) {
                            style.styleSheet.cssText = css;
                        }
                        else {
                            style.appendChild(win.document.createTextNode(css));
                        }

                        head.appendChild(style);
                        $(win.document.body).css('font-size', '8pt');

                        $(win.document.body).find('table')
                            .removeClass('dataTable')
                            .css('font-size', 'inherit');

                    }
                }
            ]
        });
    } else if($('#report_type3').is(':checked')) {
        $('#showTable1').hide();
        $('#showTable2').hide();
        $('#showTable3').show();
        $('#showTable4').hide();
        tableReport = $('#report_other3').DataTable({
            "scrollX": true,
            "language": {
                "url": "matrix-admin/assets/libs/datatables.net-bs4/Thai.json"
            },
            "ajax": {
                "url": "menu-report/submitreport1.php?reports=3&" + serializedData
            },
            "columns": [
                { "title": "ลำดับ", "data": "num" },
                { "title": "เลขที่กรมธรรม์", "data": "stock_id" },
                { "title": "ผู้เอาประกัน", "data": "cus_name" },
                { "title": "ที่อยู่", "data": "cus_address" },
                { "title": "วันสิ้นสุดคุ้มครอง", "data": "insure_date" },
                { "title": "เบี้ยรวม", "data": "insure_total2" },
                { "title": "ประเภทลูกค้า", "data": "cus_type" },
                { "title": "เบอร์โทร", "data": "cus_tel" },
                { "title": "สถานะควบประกันอื่นๆ", "defaultContent": "" }
            ],
            dom: 'Bfrtip',
            "buttons": [
                {
                    "extend": 'print',
                    "className": 'btn btn-info',
                    "orientation": 'landscape',
                    "text": 'สั่งพิมพ์',
                    "title": '',
                    "messageTop": '<h3>รายงานใบเตือนต่ออายุ ( เบ็ดเตล็ดอุบัติเหตุ/สุขภาพ/อื่นๆ )</h3>',
                    "footer": true,
                    autoPrint: true,
                    customize: function (win) {

                        var last = null;
                        var current = null;
                        var bod = [];

                        var css = '@page { size: landscape;}',
                            head = win.document.head || win.document.getElementsByTagName('head')[0],
                            style = win.document.createElement('style');

                        style.type = 'text/css';
                        style.media = 'print';

                        if (style.styleSheet) {
                            style.styleSheet.cssText = css;
                        }
                        else {
                            style.appendChild(win.document.createTextNode(css));
                        }

                        head.appendChild(style);
                        $(win.document.body).css('font-size', '8pt');

                        $(win.document.body).find('table')
                            .removeClass('dataTable')
                            .css('font-size', 'inherit');

                    }
                }
            ]
        });
    } else if($('#report_type4').is(':checked')) {
        $('#showTable1').hide();
        $('#showTable2').hide();
        $('#showTable3').hide();
        $('#showTable4').show();
        tableReport = $('#report_other4').DataTable({
            "scrollX": true,
            "language": {
                "url": "matrix-admin/assets/libs/datatables.net-bs4/Thai.json"
            },
            "ajax": {
                "url": "menu-report/submitreport1.php?reports=4&" + serializedData
            },
            "columns": [
                { "title": "ลำดับ", "data": "num" },
                { "title": "เลขที่กรมธรรม์", "data": "stock_id" },
                { "title": "ผู้เอาประกัน", "data": "cus_name" },
                { "title": "ทะเบียน", "data": "car_number" },
                { "title": "ยี่ห้อ", "data": "car_brand" },
                { "title": "วันสิ้นสุดคุ้มครอง", "data": "insure_date" },
                { "title": "ทุนประกัน", "data": "insurance" },
                { "title": "เบี้ยสุทธิ", "data": "insure_net" },
                { "title": "เบี้ยรวม", "data": "insure_total2" },
                { "title": "ประเภทลูกค้า", "data": "cus_type" },
                { "title": "เบอร์โทร", "data": "cus_tel" },
                { "title": "สถานะควบประกันอื่นๆ", "defaultContent": "" }
            ],
            dom: 'Bfrtip',
            "buttons": [
                {
                    "extend": 'print',
                    "className": 'btn btn-info',
                    "orientation": 'landscape',
                    "text": 'สั่งพิมพ์',
                    "title": '',
                    "messageTop": '<h3>รายงานใบเตือนต่ออายุ ( เกี่ยวกับรถ )</h3>',
                    "footer": true,
                    autoPrint: true,
                    customize: function (win) {

                        var last = null;
                        var current = null;
                        var bod = [];

                        var css = '@page { size: landscape;}',
                            head = win.document.head || win.document.getElementsByTagName('head')[0],
                            style = win.document.createElement('style');

                        style.type = 'text/css';
                        style.media = 'print';

                        if (style.styleSheet) {
                            style.styleSheet.cssText = css;
                        }
                        else {
                            style.appendChild(win.document.createTextNode(css));
                        }

                        head.appendChild(style);
                        $(win.document.body).css('font-size', '8pt');

                        $(win.document.body).find('table')
                            .removeClass('dataTable')
                            .css('font-size', 'inherit');

                    }
                }
            ]
        });
    }
});

$("#submit_report_other2").click(function () {
    var serializedData = $("#form_report").serialize();
    if (count > 0) { tableReport.destroy(); }
    count++;

    console.log("menu-report/submitreport2.php?" + serializedData);
    if ($('#report_type1').is(':checked')) {
        $('#showTable1').show();
        $('#showTable2').hide();
        $('#showTable3').hide();
        tableReport = $('#report_other1').DataTable({
            "scrollX": true,
            "language": {
                "url": "matrix-admin/assets/libs/datatables.net-bs4/Thai.json"
            },
            "ajax": {
                "url": "menu-report/submitreport2.php?" + serializedData
            },
            "columns": [
                { "title": "ลำดับ", "data": "num" },
                { "title": "เลขที่กรมธรรม์", "data": "stock_id" },
                { "title": "วันคุ้มครอง", "data": "insure_date" },
                { "title": "วันที่ทำกรมธรรม์", "data": "stock_date" },
                { "title": "ผู้เอาประกัน", "data": "cus_name" },
                { "title": "เบี้ยสุทธิ์", "data": "insure_net" },
                { "title": "เบี้ยรวม", "data": "insure_total3" },
                { "title": "ตัวแทน", "data": "cus_type2" },
                { "title": "วันชำระเงิน", "data": "cus_pay_date" }
            ],
            "footerCallback": function (row, data, start, end, display) {
                var api = this.api(), data;
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '') * 1 :
                        typeof i === 'number' ?
                            i : 0;
                };
                // Total over all pages
                total = api
                    .column(6)
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
    
                // Update footer
                $(api.column(6).footer()).html(
                    numberWithCommas(total.toFixed(2)) + ' บาท'
                );
                getTotal = '<b>รวมเงิน: </b>' + numberWithCommas(total.toFixed(2)) + ' บาท';
            },
            dom: 'Bfrtip',
            "buttons": [
                {
                    "extend": 'print',
                    "className": 'btn btn-info',
                    "orientation": 'landscape',
                    "text": 'สั่งพิมพ์',
                    "title": '',
                    "messageTop": '<h3>รายงานใบเตือนต่ออายุ ( พรบ. )</h3>',
                    "footer": true,
                    autoPrint: true,
                    customize: function (win) {

                        var last = null;
                        var current = null;
                        var bod = [];

                        var css = '@page { size: landscape;}',
                            head = win.document.head || win.document.getElementsByTagName('head')[0],
                            style = win.document.createElement('style');

                        style.type = 'text/css';
                        style.media = 'print';

                        if (style.styleSheet) {
                            style.styleSheet.cssText = css;
                        }
                        else {
                            style.appendChild(win.document.createTextNode(css));
                        }

                        head.appendChild(style);
                        $(win.document.body).css('font-size', '8pt');

                        $(win.document.body).find('table')
                            .removeClass('dataTable')
                            .css('font-size', 'inherit');

                    }
                }
            ]
        });
    }else if ($('#report_type2').is(':checked')) {
        $('#showTable1').hide();
        $('#showTable2').show();
        $('#showTable3').hide();
        tableReport = $('#report_other2').DataTable({
            "scrollX": true,
            "language": {
                "url": "matrix-admin/assets/libs/datatables.net-bs4/Thai.json"
            },
            "ajax": {
                "url": "menu-report/submitreport2.php?" + serializedData
            },
            "columns": [
                { "title": "ลำดับ", "data": "num" },
                { "title": "ประเภทรถ", "data": "stock_type" },
                { "title": "เลขที่กรมธรรม์", "data": "stock_id" },
                { "title": "วันคุ้มครอง", "data": "insure_date" },
                { "title": "วันที่รับแจ้ง", "data": "stock_date" },
                { "title": "ผู้เอาประกัน", "data": "cus_name" },
                { "title": "เบี้ยสุทธิ์", "data": "insure_net" },
                { "title": "เบี้ยรวม", "data": "insure_total3" },
                { "title": "ตัวแทน", "data": "cus_type2" },
                { "title": "วันชำระเงิน", "data": "cus_pay_date" }
            ],
            "footerCallback": function (row, data, start, end, display) {
                var api = this.api(), data;
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '') * 1 :
                        typeof i === 'number' ?
                            i : 0;
                };
                // Total over all pages
                total = api
                    .column(7)
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
    
                // Update footer
                $(api.column(7).footer()).html(
                    numberWithCommas(total.toFixed(2)) + ' บาท'
                );
                getTotal = '<b>รวมเงิน: </b>' + numberWithCommas(total.toFixed(2)) + ' บาท';
            },
            dom: 'Bfrtip',
            "buttons": [
                {
                    "extend": 'print',
                    "className": 'btn btn-info',
                    "orientation": 'landscape',
                    "text": 'สั่งพิมพ์',
                    "title": '',
                    "messageTop": '<h3>รายงานใบเตือนต่ออายุ ( พรบ. )</h3>',
                    "footer": true,
                    autoPrint: true,
                    customize: function (win) {

                        var last = null;
                        var current = null;
                        var bod = [];

                        var css = '@page { size: landscape;}',
                            head = win.document.head || win.document.getElementsByTagName('head')[0],
                            style = win.document.createElement('style');

                        style.type = 'text/css';
                        style.media = 'print';

                        if (style.styleSheet) {
                            style.styleSheet.cssText = css;
                        }
                        else {
                            style.appendChild(win.document.createTextNode(css));
                        }

                        head.appendChild(style);
                        $(win.document.body).css('font-size', '8pt');

                        $(win.document.body).find('table')
                            .removeClass('dataTable')
                            .css('font-size', 'inherit');

                    }
                }
            ]
        });
    }else {
        $('#showTable1').hide();
        $('#showTable2').hide();
        $('#showTable3').show();
        tableReport = $('#report_other3').DataTable({
            "scrollX": true,
            "language": {
                "url": "matrix-admin/assets/libs/datatables.net-bs4/Thai.json"
            },
            "ajax": {
                "url": "menu-report/submitreport2.php?" + serializedData
            },
            "columns": [
                { "title": "ลำดับ", "data": "num" },
                { "title": "ประเภทประกัน", "data": "insure_type" },
                { "title": "เลขที่กรมธรรม์", "data": "stock_id" },
                { "title": "วันคุ้มครอง", "data": "insure_date" },
                { "title": "วันที่รับแจ้ง", "data": "stock_date" },
                { "title": "ผู้เอาประกัน", "data": "cus_name" },
                { "title": "เบี้ยสุทธิ์", "data": "insure_net" },
                { "title": "เบี้ยรวม", "data": "insure_total2" },
                { "title": "ตัวแทน", "data": "cus_type" },
                { "title": "วันชำระเงิน", "data": "cus_pay_date" }
            ],
            "footerCallback": function (row, data, start, end, display) {
                var api = this.api(), data;
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '') * 1 :
                        typeof i === 'number' ?
                            i : 0;
                };
                // Total over all pages
                total = api
                    .column(7)
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
    
                // Update footer
                $(api.column(7).footer()).html(
                    numberWithCommas(total.toFixed(2)) + ' บาท'
                );
                getTotal = '<b>รวมเงิน: </b>' + numberWithCommas(total.toFixed(2)) + ' บาท';
            },
            dom: 'Bfrtip',
            "buttons": [
                {
                    "extend": 'print',
                    "className": 'btn btn-info',
                    "orientation": 'landscape',
                    "text": 'สั่งพิมพ์',
                    "title": '',
                    "messageTop": '<h3>รายงานใบเตือนต่ออายุ ( พรบ. )</h3>',
                    "footer": true,
                    autoPrint: true,
                    customize: function (win) {

                        var last = null;
                        var current = null;
                        var bod = [];

                        var css = '@page { size: landscape;}',
                            head = win.document.head || win.document.getElementsByTagName('head')[0],
                            style = win.document.createElement('style');

                        style.type = 'text/css';
                        style.media = 'print';

                        if (style.styleSheet) {
                            style.styleSheet.cssText = css;
                        }
                        else {
                            style.appendChild(win.document.createTextNode(css));
                        }

                        head.appendChild(style);
                        $(win.document.body).css('font-size', '8pt');

                        $(win.document.body).find('table')
                            .removeClass('dataTable')
                            .css('font-size', 'inherit');

                    }
                }
            ]
        });
    }
});

$("#submit_report_income1").click(function () {
    var serializedData = $("#form_report").serialize();
    if (count > 0) { tableReport.destroy(); }
    count++;

    console.log("menu-income/submitreport.php?reports=1&" + serializedData);
    $('#showTable').show();
    tableReport = $('#report_income1').DataTable({
        "scrollX": true,
        "language": {
            "url": "matrix-admin/assets/libs/datatables.net-bs4/Thai.json"
        },
        "ajax": {
            "url": "menu-income/submitreport.php?reports=1&" + serializedData
        },
        "columns": [
            { "title": "ลำดับ", "data": "num" },
            { "title": "วันที่", "data": "receive_cheque_date" },
            { "title": "เลขที่บิล", "data": "bill_no" },
            { "title": "รายการรับ", "data": "type1" },
            { "title": "เงินสด/เช็ค/โอน", "data": "status_payment" },
            { "title": "คำอธิบายรายการ", "data": "list_income" },
            { "title": "จำนวนเงิน", "data": "payment_total" }
        ],
        "footerCallback": function (row, data, start, end, display) {
            var api = this.api(), data;
            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ?
                        i : 0;
            };
            // Total over all pages
            total = api
                .column(6)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer
            $(api.column(6).footer()).html(
                numberWithCommas(total.toFixed(2)) + ' บาท'
            );
            getTotal = '<b>รวมเงิน: </b>' + numberWithCommas(total.toFixed(2)) + ' บาท';
        },
        dom: 'Bfrtip',
        "buttons": [
            {
                "extend": 'print',
                "className": 'btn btn-info',
                "orientation": 'landscape',
                "text": 'สั่งพิมพ์',
                "title": '',
                "messageTop": '<h3 align="center">รายงานรายรับ</h3>',
                "footer": true,
                autoPrint: true,
                customize: function (win) {

                    var last = null;
                    var current = null;
                    var bod = [];

                    var css = '@page { size: landscape;}',
                        head = win.document.head || win.document.getElementsByTagName('head')[0],
                        style = win.document.createElement('style');

                    style.type = 'text/css';
                    style.media = 'print';

                    if (style.styleSheet) {
                        style.styleSheet.cssText = css;
                    }
                    else {
                        style.appendChild(win.document.createTextNode(css));
                    }

                    head.appendChild(style);
                    $(win.document.body).css('font-size', '8pt');

                    $(win.document.body).find('table')
                        .removeClass('dataTable')
                        .css('font-size', 'inherit');

                }
            }
        ]
    });
});

$("#submit_report_income2").click(function () {
    var serializedData = $("#form_report").serialize();
    if (count > 0) { tableReport.destroy(); }
    count++;

    console.log("menu-income/submitreport.php?reports=2&" + serializedData);
    $('#showTable').show();
    tableReport = $('#report_income2').DataTable({
        "scrollX": true,
        "language": {
            "url": "matrix-admin/assets/libs/datatables.net-bs4/Thai.json"
        },
        "ajax": {
            "url": "menu-income/submitreport.php?reports=2&" + serializedData
        },
        "columns": [
            { "title": "ลำดับ", "data": "num" },
            { "title": "วันที่", "data": "receive_cheque_date" },
            { "title": "เลขที่บิล", "data": "bill_no" },
            { "title": "รายการจ่าย", "data": "type1" },
            { "title": "เงินสด/เช็ค/โอน", "data": "status_payment" },
            { "title": "คำอธิบายรายการ", "data": "list_income" },
            { "title": "จำนวนเงิน", "data": "payment_total" }
        ],
        "footerCallback": function (row, data, start, end, display) {
            var api = this.api(), data;
            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ?
                        i : 0;
            };
            // Total over all pages
            total = api
                .column(6)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer
            $(api.column(6).footer()).html(
                numberWithCommas(total.toFixed(2)) + ' บาท'
            );
            getTotal = '<b>รวมเงิน: </b>' + numberWithCommas(total.toFixed(2)) + ' บาท';
        },
        dom: 'Bfrtip',
        "buttons": [
            {
                "extend": 'print',
                "className": 'btn btn-info',
                "orientation": 'landscape',
                "text": 'สั่งพิมพ์',
                "title": '',
                "messageTop": '<h3 align="center">รายงานรายจ่าย</h3>',
                "footer": true,
                autoPrint: true,
                customize: function (win) {

                    var last = null;
                    var current = null;
                    var bod = [];

                    var css = '@page { size: landscape;}',
                        head = win.document.head || win.document.getElementsByTagName('head')[0],
                        style = win.document.createElement('style');

                    style.type = 'text/css';
                    style.media = 'print';

                    if (style.styleSheet) {
                        style.styleSheet.cssText = css;
                    }
                    else {
                        style.appendChild(win.document.createTextNode(css));
                    }

                    head.appendChild(style);
                    $(win.document.body).css('font-size', '8pt');

                    $(win.document.body).find('table')
                        .removeClass('dataTable')
                        .css('font-size', 'inherit');

                }
            }
        ]
    });
});

$("#submit_report_income3").click(function () {
    var serializedData = $("#form_report").serialize();
    if (count > 0) { tableReport.destroy(); }
    count++;

    console.log("menu-income/submitreport.php?reports=3&" + serializedData);
    $('#showTable').show();
    tableReport = $('#report_income3').DataTable({
        "scrollX": true,
        "language": {
            "url": "matrix-admin/assets/libs/datatables.net-bs4/Thai.json"
        },
        "ajax": {
            "url": "menu-income/submitreport.php?reports=3&" + serializedData
        },
        "columns": [
            { "title": "ลำดับ", "data": "num" },
            { "title": "เช็คธนาคาร/สาขา", "data": "bank" },
            { "title": "เช็คลงวันที่", "data": "cheque_date" },
            { "title": "เลขที่กรมธรรม์", "data": "stock_id" },
            { "title": "เจ้าของเช็ค", "data": "owner_cheque" },
            { "title": "จำนวนเงิน", "data": "payment_total" },
            { "title": "สถานะเช็ค", "data": "cheque_status" },
            { "title": "วันที่เข้าบัญชี/เคลียร์เบี้ย", "data": "cheque_status_detail" },
        ],
        dom: 'Bfrtip',
        "buttons": [
            {
                "extend": 'print',
                "className": 'btn btn-info',
                "orientation": 'landscape',
                "text": 'สั่งพิมพ์',
                "title": '',
                "messageTop": '<h3 align="center">รายงานการรับเช็ค</h3>',
                "footer": true,
                autoPrint: true,
                customize: function (win) {

                    var last = null;
                    var current = null;
                    var bod = [];

                    var css = '@page { size: landscape;}',
                        head = win.document.head || win.document.getElementsByTagName('head')[0],
                        style = win.document.createElement('style');

                    style.type = 'text/css';
                    style.media = 'print';

                    if (style.styleSheet) {
                        style.styleSheet.cssText = css;
                    }
                    else {
                        style.appendChild(win.document.createTextNode(css));
                    }

                    head.appendChild(style);
                    $(win.document.body).css('font-size', '8pt');

                    $(win.document.body).find('table')
                        .removeClass('dataTable')
                        .css('font-size', 'inherit');

                }
            }
        ]
    });
});