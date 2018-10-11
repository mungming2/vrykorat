$('#type1').click(function () {
    $('#selectType2').attr("style", "display:none");
    $('#selectType1').removeAttr("style");
});

$('#type2').click(function () {
    $('#selectType1').attr("style", "display:none");
    $('#selectType2').removeAttr("style");
});

$('#type2-1').click(function () {
    $('#selectType3').removeAttr("style");
});

$('#type2-2').click(function () {
    $('#selectType3').attr("style", "display:none");
});

$('#type2-3').click(function () {
    $('#selectType4').removeAttr("style");
});

$('#type2-4').click(function () {
    $('#selectType4').attr("style", "display:none");
});

$('#agent1').click(function () {
    $('#agent_name').attr("disabled", "disabled");
    $('#selectagent').removeAttr("disabled");
});

$('#agent2').click(function () {
    $('#agent_name').removeAttr("disabled");
    $('#selectagent').attr("disabled", "disabled");
});

$('#agent11').click(function () {
    $('#agent_name2').attr("disabled", "disabled");
    $('#selectagent2').removeAttr("disabled");
});

$('#agent22').click(function () {
    $('#agent_name2').removeAttr("disabled");
    $('#selectagent2').attr("disabled", "disabled");
});

$('#status_payment1').change(function () {
    $("#total11").prop("disabled", !$(this).is(':checked'));
});
if ($('#status_payment1').is(':checked')) {
    $("#total11").removeAttr("disabled");
}

$('#status_payment2').change(function () {
    $("#distext2 :input").prop("disabled", !$(this).is(':checked'));
});
if ($('#status_payment2').is(':checked')) {
    $("#distext2 :input").removeAttr("disabled");
}

$('#status_payment3').change(function () {
    $("#distext3 :input").prop("disabled", !$(this).is(':checked'));
});
if ($('#status_payment3').is(':checked')) {
    $("#distext3 :input").removeAttr("disabled");
}

$('#status_payment4').change(function () {
    $("#distext4 :input").prop("disabled", !$(this).is(':checked'));
});
if ($('#status_payment4').is(':checked')) {
    $("#distext4 :input").removeAttr("disabled");
}

$('#defaultCheck1').change(function () {
    $("#receive_date").prop("disabled", !$(this).is(':checked'));
});
if ($('#defaultCheck1').is(':checked')) {
    $("#receive_date").removeAttr("disabled");
}

$('#check_payment_date').change(function () {
    $("#payment_date").prop("disabled", !$(this).is(':checked'));
});
if ($('#check_payment_date').is(':checked')) {
    $("#payment_date").removeAttr("disabled");
}

$('#check_cancel_date').change(function () {
    $("#cancel_date").prop("disabled", !$(this).is(':checked'));
});
if ($('#check_cancel_date').is(':checked')) {
    $("#cancel_date").removeAttr("disabled");
}

$('#check_create_date').change(function () {
    $("#create_date").prop("disabled", !$(this).is(':checked'));
});
if ($('#check_create_date').is(':checked')) {
    $("#create_date").removeAttr("disabled");
}

$('#check_installments_deadline_date').change(function () {
    $("#installments_deadline_date").prop("disabled", !$(this).is(':checked'));
});
if ($('#check_installments_deadline_date').is(':checked')) {
    $("#installments_deadline_date").removeAttr("disabled");
}

$('#check_pay_date').change(function () {
    $("#installments_pay_date").prop("disabled", !$(this).is(':checked'));
});
if ($('#check_pay_date').is(':checked')) {
    $("#installments_pay_date").removeAttr("disabled");
}

$('.check_installments_deadline_date').change(function () {
    $(".installments_deadline_date").prop("disabled", !$(this).is(':checked'));
});
if ($('.check_installments_deadline_date').is(':checked')) {
    $(".installments_deadline_date").removeAttr("disabled");
}

$('.check_pay_date').change(function () {
    $(".installments_pay_date").prop("disabled", !$(this).is(':checked'));
});
if ($('.check_pay_date').is(':checked')) {
    $(".installments_pay_date").removeAttr("disabled");
}

$('#check_account_date').change(function () {
    $("#account_date").prop("disabled", !$(this).is(':checked'));
});
if ($('#check_account_date').is(':checked')) {
    $("#account_date").removeAttr("disabled");
}

$('.check_account_date').change(function () {
    $(".account_date").prop("disabled", !$(this).is(':checked'));
});
if ($('.check_account_date').is(':checked')) {
    $(".account_date").removeAttr("disabled");
}

$('#check_cus_pay_date').change(function () {
    $("#cus_pay_date").prop("disabled", !$(this).is(':checked'));
});
if ($('#check_cus_pay_date').is(':checked')) {
    $("#cus_pay_date").removeAttr("disabled");
}

$('.check_cus_pay_date').change(function () {
    $(".cus_pay_date").prop("disabled", !$(this).is(':checked'));
});
if ($('.check_cus_pay_date').is(':checked')) {
    $(".cus_pay_date").removeAttr("disabled");
}

$('#check_clear_date').change(function () {
    $("#clear_date").prop("disabled", !$(this).is(':checked'));
});
if ($('#check_clear_date').is(':checked')) {
    $("#clear_date").removeAttr("disabled");
}

$('.check_clear_date').change(function () {
    $(".clear_date").prop("disabled", !$(this).is(':checked'));
});
if ($('.check_clear_date').is(':checked')) {
    $(".clear_date").removeAttr("disabled");
}

$('#check_arrears').change(function () {
    $("#arrears").prop("disabled", !$(this).is(':checked'));
    $("#bill_no").prop("disabled", !$(this).is(':checked'));
});
if ($('#check_arrears').is(':checked')) {
    $("#arrears").removeAttr("disabled");
    $("#bill_no").removeAttr("disabled");
}

$('.status_payment1').change(function () {
    $(".total11").prop("disabled", !$(this).is(':checked'));
});
if ($('.status_payment1').is(':checked')) {
    $(".total11").removeAttr("disabled");
}

$('.status_payment2').change(function () {
    $(".distext2 :input").prop("disabled", !$(this).is(':checked'));
});
if ($('.status_payment2').is(':checked')) {
    $(".distext2 :input").removeAttr("disabled");
}

$('.status_payment3').change(function () {
    $(".distext3 :input").prop("disabled", !$(this).is(':checked'));
});
if ($('.status_payment3').is(':checked')) {
    $(".distext3 :input").removeAttr("disabled");
}

$('.status_payment4').change(function () {
    $(".distext4 :input").prop("disabled", !$(this).is(':checked'));
});
if ($('.status_payment4').is(':checked')) {
    $(".distext4 :input").removeAttr("disabled");
}

$('.defaultCheck1').change(function () {
    $(".distext5").prop("disabled", !$(this).is(':checked'));
    $(".distext6 :input").prop("disabled", !$(this).is(':checked'));
});
if ($('.defaultCheck1').is(':checked')) {
    $(".distext5").removeAttr("disabled");
    $(".distext6 :input").removeAttr("disabled");
}

$('.check_arrears').change(function () {
    $(".arrears").prop("disabled", !$(this).is(':checked'));
    $(".bill_no").prop("disabled", !$(this).is(':checked'));
});
if ($('.check_arrears').is(':checked')) {
    $(".arrears").removeAttr("disabled");
    $(".bill_no").removeAttr("disabled");
}

$('#radio_status input[type=radio]').click(function () {
    if ($('#status_register3').is(':checked')) {
        $("#status_register_999").removeAttr("disabled");
    } else {
        $("#status_register_999").attr("disabled", "disabled");
    }
});
if ($('#status_register3').is(':checked')) {
    $("#status_register_999").removeAttr("disabled");
} else {
    $("#status_register_999").attr("disabled", "disabled");
}

$("#index_id").keyup(function (event) {
    if ($(this).val().length > 5) {
        $("#stock_id").val($(this).val().substr(5, 7));
    }
    $.ajax({
        url: "menu-payment/check_index.php?forms=1",
        method: "POST",
        data: {
            id: $(this).val()
        }
    }).done(function (result) {
        console.log(result);
        if (result == 0) {
            $('#check_id').html('<div class="text-success">เลขที่เอกสารนี้ใช้ได้</div>');
            $('#btn_submit').prop('disabled', false);
        } else {
            $('#check_id').html('<div class="text-danger">เลขที่เอกสารนี้ซ้ำ</div>');
            $('#btn_submit').prop('disabled', true);
        }
    });
});

$("#check_stock_id").keyup(function (event) {
    $.ajax({
        url: "menu-payment/check_index.php?forms=2",
        method: "POST",
        data: {
            id: $(this).val()
        }
    }).done(function (result) {
        console.log(result);
        if (result == 0) {
            $('#check_id').html('<div class="text-success">เลขที่เอกสารนี้ใช้ได้</div>');
            $('#btn_submit').prop('disabled', false);
        } else {
            $('#check_id').html('<div class="text-danger">เลขที่เอกสารนี้ซ้ำ</div>');
            $('#btn_submit').prop('disabled', true);
        }
    });
});

$("#bill_no").keyup(function (event) {
    $.ajax({
        url: "menu-renewal/ajax_check.php?check=bill_no",
        method: "POST",
        data: {
            id: $(this).val()
        }
    }).done(function (result) {
        console.log(result);
        if (result == 0) {
            $('#check_bill').html('<div class="text-success">เลขที่บิลนี้ใช้ได้</div>');
            $('#btn_submit').prop('disabled', false);
        } else {
            $('#check_bill').html('<div class="text-danger">เลขที่บิลนี้ซ้ำ</div>');
            $('#btn_submit').prop('disabled', true);
        }
    });
});
$("#edit_bill_no").keyup(function (event) {
    $.ajax({
        url: "menu-renewal/ajax_check.php?check=edit_bill_no",
        method: "POST",
        data: {
            id: $(this).val(),
            search: $('#search').val()
        }
    }).done(function (result) {
        console.log(result);
        if (result == 0) {
            $('#check_bill').html('<div class="text-success">เลขที่บิลนี้ใช้ได้</div>');
            $('#btn_submit').prop('disabled', false);
        } else if (result == 99) {
            $('#check_bill').html('<div class="text-success">เลขที่บิลปัจุบัน</div>');
            $('#btn_submit').prop('disabled', false);
        } else {
            $('#check_bill').html('<div class="text-danger">เลขที่บิลนี้ซ้ำ</div>');
            $('#btn_submit').prop('disabled', true);
        }
    });
});
$("#renew_stock_id").keyup(function (event) {
    $.ajax({
        url: "menu-renewal/ajax_check.php?check=stock_id",
        method: "POST",
        dataType: 'json',
        data: {
            id: $(this).val()
        }
    }).done(function (result) {
        console.log(result);
        console.log(result.status);
        if (result.status == 0) {
            $('#check_stock').html('<div class="text-danger">ไม่สามารถดึงข้อมูลได้ เนื่องจากไม่มีเลขกรมธรรม์นี้ในระบบ</div>');
            $('#renew_name').val('');
            $('#renew_tel').val('');
            $('#renew_address').val('');
            $('#renew_car_number').val('');
        } else {
            $('#check_stock').html('<div class="text-success">พบเลขกรมธรรม์ในระบบ</div>');
            $('#renew_name').val(result.name);
            $('#renew_tel').val(result.tel);
            $('#renew_address').val(result.address);
            $('#renew_car_number').val(result.car);
        }
    });
});

$("#stock_id_print").on('click', function (event) {
    $('#show_card').hide();
    var sumCheck = 0;
    if ($('#sum_type').is(':checked')) {
        sumCheck = 1;
    }
    $.ajax({
        url: "menu-bill/ajax_check.php?forms=1",
        type: "GET",
        data: {
            "id": $('#search_stock_id_print').val(),
            "type": $('input[name=type_payment]:checked').val(),
            "sum": sumCheck,
        },
        dataType: 'JSON',
        beforeSend: function () {
            $("#load_card").show();
        },
        complete: function () {
            $("#load_card").hide();
        },
    }).done(function (result) {
        //console.log(result);
        $('#check_stock_id').html('');
        if (result == 0) {
            $('#check_stock_id').html('<div class="text-danger">ไม่พบเลขกรมธรรม์ / ทะเบียนรถ / เลขตัวถังรถ</div>');
        } else if (result == 2) {
            $('#check_stock_id').html('<div class="text-danger">พบเลขกรมธรรม์ / ทะเบียนรถ / เลขตัวถังรถ มากกว่า 1 รายการ</div>');
        } else {
                $('#show_card').show();
                var frame1 = $("#frame1").contents();
                var getValue1 = '<tr>' +
                    '<td>' + result.insure_net + '</td>' +
                    '<td>' + result.insure_duty + '</td>' +
                    '<td>' + result.insure_tex + '</td>' +
                    '<td>' + result.insure_total2 + '</td>' +
                    '<td>' + result.p_discount + '</td>' +
                    '<td>' + result.p_balance + '</td>' +
                    '<td>' + result.p_tax_deductions + '</td>' +
                    '<td>' + result.total_amount + '</td>' +
                    '</tr>';
                var getValue2;
                if (result.stock_amount == 2) {
                    getValue2 = '<tr class="text-danger">' +
                        '<td>' + result._insure_net + '</td>' +
                        '<td>' + result._insure_duty + '</td>' +
                        '<td>' + result._insure_tex + '</td>' +
                        '<td>' + result._insure_total2 + '</td>' +
                        '<td>' + result._p_discount + '</td>' +
                        '<td>' + result._p_balance + '</td>' +
                        '<td>' + result._p_tax_deductions + '</td>' +
                        '<td>' + result._total_amount + '</td>' +
                        '</tr>';
                }
                $('#total_stock').html(' ' + result.stock_amount + ' ');
                $('#get_value_stock_id').val(result.stock_id);
                $('#get_value_car_brand').val(result.car_brand);
                $('#get_value_car_number').val(result.car_number);
                $('#get_value_insure_date').val(result.insure_date);
                $('#get_value_stock_status').val(result.cus_status);
                $('#get_value_cus_name').html(result.cus_name);
                if(!jQuery.isEmptyObject(result.cus_type2)){
                    $('#get_value_agent').html('ชื่อตัวแทน (ถ้ามี) '+result.cus_type2);
                }
                $('#get_value_total').html(result.total);
                // if(result.total != '0.00'){
                //     $('#get_value_total2').html(result.total);
                // }
                console.log(result.payment.length);
                $('#get_value_total2').html('');
                $('#get_value_total2_2').html('');
                $('#get_value_bank2').html('');
                $('#get_value_branch2').html('');
                $('#get_value_date2').html('');
                $('#get_value_cheque2').html('');
                $('#get_value_total2_3').html('');
                $('#get_value_total2_4').html('');
                $('#get_value_bank4').html('');
                $('#get_value_type4').html('');
                $('#get_value_num4').html('');

                frame1.find('#get_value_total2').html('');
                frame1.find('#get_value_total2_2').html('');
                frame1.find('#get_value_bank2').html('');
                frame1.find('#get_value_branch2').html('');
                frame1.find('#get_value_date2').html('');
                frame1.find('#get_value_cheque2').html('');
                frame1.find('#get_value_total2_3').html('');
                frame1.find('#get_value_total2_4').html('');
                frame1.find('#get_value_bank4').html('');
                frame1.find('#get_value_type4').html('');
                frame1.find('#get_value_num4').html('');
                for (var index = 0; index < result.payment.length; index++) {
                    console.log(result.payment[0].total);
                    if(result.payment[index].payment_type == '1') {
                        $('#get_value_total2').html(result.payment[index].total );

                        frame1.find('#get_value_total2').html(result.payment[index].total );
                    }
                    if(result.payment[index].payment_type == '2') {
                        $('#get_value_total2_2').html(result.payment[index].total );
                        $('#get_value_bank2').html(result.payment[index].bank );
                        $('#get_value_branch2').html(result.payment[index].bank_branch );
                        $('#get_value_date2').html(result.payment[index].cheque_date );
                        $('#get_value_cheque2').html(result.payment[index].payment_number );

                        frame1.find('#get_value_total2_2').html(result.payment[index].total );
                        frame1.find('#get_value_bank2').html(result.payment[index].bank );
                        frame1.find('#get_value_branch2').html(result.payment[index].bank_branch );
                        frame1.find('#get_value_date2').html(result.payment[index].cheque_date );
                        frame1.find('#get_value_cheque2').html(result.payment[index].payment_number );
                    }
                    if(result.payment[index].payment_type == '3') {
                        $('#get_value_total2_3').html(result.payment[index].total );

                        frame1.find('#get_value_total2_3').html(result.payment[index].total );
                    }
                    if(result.payment[index].payment_type == '4') {
                        $('#get_value_total2_4').html(result.payment[index].total );
                        $('#get_value_bank4').html(result.payment[index].bank );
                        $('#get_value_type4').html(result.payment[index].card_type1+' / '+ result.payment[index].card_type2);
                        $('#get_value_num4').html(result.payment[index].payment_number );

                        frame1.find('#get_value_total2_4').html(result.payment[index].total );
                        frame1.find('#get_value_bank4').html(result.payment[index].bank );
                        frame1.find('#get_value_type4').html(result.payment[index].card_type1+' / '+ result.payment[index].card_type2);
                        frame1.find('#get_value_num4').html(result.payment[index].payment_number );
                    }
                    
                }
                
                $('#get_value_total_convert').html('( ' + result.total_convert + ' )');
                $('#get_stock_table').html(getValue1 + getValue2);
                if(!jQuery.isEmptyObject(result.bill_no)){
                    $('#get_value_bill_no').html('เลขที่บิล '+result.bill_no);
                }


    //////////// for iframe //////////////
                frame1.find('#total_stock2').html(' ' + result.stock_amount + ' ');
                frame1.find('#get_value_stock_id2').val(result.stock_id);
                frame1.find('#get_value_car_brand2').val(result.car_brand);
                frame1.find('#get_value_car_number2').val(result.car_number);
                frame1.find('#get_value_insure_date2').val(result.insure_date);
                frame1.find('#get_value_stock_status2').val(result.cus_status);
                frame1.find('#get_value_cus_name2').html(result.cus_name);
                if(!jQuery.isEmptyObject(result.cus_type2)){
                    frame1.find('#get_value_agent2').html(result.cus_name);
                }
                frame1.find('#get_value_total2').html(result.total);
                if(result.total != '0.00'){
                    frame1.find('#get_value_total22').html(result.total);
                }
                frame1.find('#get_value_total_convert2').html('( ' + result.total_convert + ' )');
                frame1.find('#get_stock_table2').html(getValue1 + getValue2);
                if(!jQuery.isEmptyObject(result.bill_no)){
                    frame1.find('#get_value_bill_no2').html('เลขที่บิล '+result.bill_no);
                }
        }
    });

});

$("#btn_submit_print1").on('click', function (event) {
    var frame1 = $("#frame1").contents();
    frame1.find('#print_date1_2').html($('#print_date1').val());

    //frame1.find('#print_form1_2').html($('#print_form1').val());

    frame1.find('#print_form2_2').html($('#print_form2').val());

    frame1.find('#print_date2_2').html($('#print_date2').val());

    if($('#print_form3').val().length !== 0 ){
        frame1.find('#print_form3_2').html('เบี้ยจ่ายเกิน (ถ้ามี) '+$('#print_form3').val()+' บาท');
    }
    if($('#print_form4').val().length !== 0 ){
        frame1.find('#print_form4_2').html('ค้างชำระ (ถ้ามี) '+$('#print_form4').val()+' บาท');
    }

    frames['frame1'].print();
});

$("#btn_submit_print2").on('click', function (event) {
    var frame1 = $("#frame1").contents();
    frame1.find('#print_form1_2').html($('#print_form1').val());

    frame1.find('#print_form2_2').html($('#print_form2').val());

    frame1.find('#print_date1_2').html($('#print_date1').val());
    if($('#print_form3').val().length !== 0 ){
        frame1.find('#print_form3_2').html('เบี้ยจ่ายเกิน (ถ้ามี) '+$('#print_form3').val()+' บาท');
    }
    if($('#print_form4').val().length !== 0 ){
        frame1.find('#print_form4_2').html('ค้างชำระ (ถ้ามี) '+$('#print_form4').val()+' บาท');
    }
    frame1.find('#print_date2_2').html($('#print_date2').val());

    frame1.find('#print_date3_2').html($('#print_date3').val());

    frames['frame1'].print();
});

$("#btn_addPayment1").click(function () {
    $('#paymentModal').modal('show');
    $('#form_type').val('1');
    $('#add_index_id').val($('#index_id').val());
    $('#add_stock_id').val($('#stock_id').val());

});

$("#btn_addPayment2").click(function () {
    $('#paymentModal').modal('show');
    $('#form_type').val('2');
    $('#add_stock_id').val($('#getNo').val());

});

$("#btn_addPayment3").click(function () {
    $('#paymentModal').modal('show');
    $('#form_type').val('3');
    $('#add_stock_id').val($('#getNo').val());

});

$("#btn_addPayment4").click(function () {
    $('#paymentModal').modal('show');
    $('#form_type').val('4');
    $('#add_stock_id').val($('#getNo').val());

});