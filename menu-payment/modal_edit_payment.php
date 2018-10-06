
    <div class="modal fade" id="editModal<?=$key_payment?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="width: 130%;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขการรับชำระเงิน <?=$key_payment+1?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="menu-payment/submitedit.php?forms=editPayment">
                    <input type="hidden" name="edit_count" value="<?=$value_payment['count']?>">
                    <input type="hidden" name="edit_form" value="<?=$result_payment2['form_type']?>">
                    <input type="hidden" name="edit_id" value="<?=$show_id?>">
                    <input type="hidden" name="edit_stock_id" value="<?=$result_get_stock['no'] ?>">
                    <input type="hidden" name="edit_index_id" value="<?=$edit_index_id ?>">
                    <input type="hidden" name="getStockId" value="<?=$getStockId?>">
                    <div class="modal-body m-2 " style="overflow-y: scroll; height: 600px;">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>วันที่ลงบันทึกสมุดบัญชี</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="check_account_date" id="check_account_date" value="check_account_date" <?=$check_account_date ?>>
                                        </div>
                                    </div>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                    </div>
                                    <input type="text" name="account_date" id="account_date" <?=$account_date?> >
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>วันที่ลูกค้าชำระเบี้ย</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="check_cus_pay_date" id="check_cus_pay_date" value="check_cus_pay_date" <?=$check_cus_pay_date ?>>
                                        </div>
                                    </div>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                    </div>
                                    <input type="text" name="cus_pay_date" id="cus_pay_date" <?=$cus_pay_date?> >
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>วันที่เคลียร์เบี้ย</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="check_clear_date" id="check_clear_date" value="check_clear_date" <?=$check_clear_date ?>>
                                        </div>
                                    </div>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                    </div>
                                    <input type="text" name="clear_date" id="clear_date" <?=$clear_date?> >
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>ยอดชำระ</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="total_amount"  placeholder="จำนวนเงิน" value="<?=$result_payment2['total_amount']?>" >
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">บาท</i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>ส่วนลด</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="discount"  placeholder="จำนวนเงิน" value="<?=$result_payment2['discount']?>" >
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">บาท</i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>หักภาษี 1%</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="tax_deductions"  placeholder="จำนวนเงิน" value="<?=$result_payment2['tax_deductions']?>" >
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">บาท</i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>คงเหลือชำระ</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="balance"  placeholder="จำนวนเงิน" value="<?=$result_payment2['balance']?>" >
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">บาท</i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>เลขที่บิล</label>
                                <input type="text" class="form-control" name="bill_no"  placeholder="เลขที่บิล" value="<?=$bill_no?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>ประเภทการชำระเงิน</label>
                                <div class="w-100"></div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type_payment" id="type_payment1" value="1" <?=$type1?> >
                                    <label class="form-check-label" for="type_payment1">หน้าร้าน</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type_payment" id="type_payment2" value="2" <?=$type2?> >
                                    <label class="form-check-label" for="type_payment2">เงินเชื่อ</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>สถานะชำระเงิน</label>
                                <div class="form-check mb-3 ">
                                    <input class="form-check-input " type="checkbox" name="status_payment[]" value="1" <?=$payment_type1?> >
                                    <label class="form-check-label" for="status_payment1">
                                        เงินสด
                                    </label>
                                    <div class="row ">
                                        <div class="col-4 my-2">
                                            <div class="input-group">
                                                <input type="text" class="form-control " name="payment_total1" placeholder="จำนวนเงิน"  value="<?=$total1?>" >
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">บาท</i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check mb-3 ">
                                    <input class="form-check-input " type="checkbox" name="status_payment[]" value="2" <?=$payment_type2?> >
                                    <label class="form-check-label" for="status_payment2">
                                        เช็ค
                                    </label>
                                    <div class="row p-3 border ">
                                        <div class="col-4 my-2">
                                            <input type="text" class="form-control" name="bank2" placeholder="เช็คธนาคาร" value="<?=$bank2 ?>" >
                                        </div>
                                        <div class="col-4 my-2">
                                            <input type="text" class="form-control" name="bank_branch" placeholder="สาขา" value="<?=$bank_branch ?>" >
                                        </div>
                                        <div class="col-4 my-2">
                                            <input type="text" class="form-control" name="check_number" placeholder="เลขที่" value="<?=$payment_number2 ?>" >
                                        </div>
                                        <div class="col-4 my-2">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                                </div>
                                                <input type="text" name="check_date" class="form-control singledate-getvalue" value="<?=$cheque_date?>"  >
                                            </div>
                                        </div>
                                        <div class="col-4 my-2">
                                            <div class="input-group">
                                                <input type="text" class="form-control " name="payment_total2"  placeholder="จำนวนเงิน"  value="<?=$total2?>" >
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">บาท</i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check mb-3 ">
                                    <input class="form-check-input " type="checkbox" name="status_payment[]" value="3" <?=$payment_type3?> >
                                    <label class="form-check-label" for="status_payment3">
                                        โอน
                                    </label>
                                    <div class="row ">
                                        <div class="col-4 my-2">
                                            <input type="text" class="form-control" name="bank3" placeholder="ธนาคาร" value="<?=$bank3?>">
                                        </div>
                                        <div class="col-4 my-2">
                                            <div class="input-group">
                                                <input type="text" class="form-control " name="payment_total3" id="total3" placeholder="จำนวนเงิน"  value="<?=$total3?>" >
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">บาท</i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check mb-3 ">
                                    <input class="form-check-input " type="checkbox" name="status_payment[]" value="4" <?=$payment_type4?> >
                                    <label class="form-check-label" for="status_payment4">
                                        บัตรเครดิต/สาขา
                                    </label>
                                    <div class="row p-3 border ">
                                        <div class="col-4 my-2">
                                            <input type="text" class="form-control" name="bank4" placeholder="ธนาคาร" value="<?=$bank4?>" >
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col-8 my-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="card_type2" id="visa" value="visa" <?=$visa?> >
                                                <label class="form-check-label" for="visa"><img src="matrix-admin/assets/images/payment/visa1.png"></label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="card_type2" id="mastercard" value="mastercard" <?=$mastercard?> >
                                                <label class="form-check-label" for="mastercard"><img src="matrix-admin/assets/images/payment/mastercard.png"></label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="card_type2" id="jcb" value="jcb" <?=$jcb?> >
                                                <label class="form-check-label" for="jcb"><img src="matrix-admin/assets/images/payment/jcb.png"></label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="card_type2" id="american-express" value="american-express" <?=$americanexpress?> >
                                                <label class="form-check-label" for="american-express"><img src="matrix-admin/assets/images/payment/american-express.png"></label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="card_type2" id="diners-club" value="diners-club" <?=$dinersclub ?> >
                                                <label class="form-check-label" for="diners-club"><img src="matrix-admin/assets/images/payment/diners-club.png"></label>
                                            </div>
                                            
                                        </div>
                                        <div class="col-8 my-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="card_type1" id="Platinum" value="Platinum" >
                                                <label class="form-check-label" for="Platinum">Platinum Card</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="card_type1" id="Titanium" value="Titanium" >
                                                <label class="form-check-label" for="Titanium">Titanium Card</label>
                                            </div>
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col-4 my-2">
                                            <label>เลขที่บัตรเครดิต</label>
                                            <input type="text" class="form-control" name="card_number" placeholder="เลขที่" value="<?=$payment_number4?>" >
                                        </div>
                                        <div class="col-4 my-2">
                                            <label>วันหมดอายุของบัตร</label>
                                            <input type="text" class="form-control" name="card_expired_date" value="<?=$exp_date?>" >
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col-6 my-2">
                                            <label>ชื่อ-นามสกุล (ตามบัตร)</label>
                                            <input type="text" class="form-control" name="card_name" value="<?=$name?>" >
                                        </div>
                                        <div class="col-4 my-2">
                                            <label>โปรดเรียกเก็บเงินทั้งหมดจำนวน</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="payment_total4" placeholder="จำนวนเงิน"  value="<?=$total4?>" >
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">บาท</i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col-6 my-2">
                                            <label>ความสัมพันธ์กับผู้เอาประกันภัย</label>
                                            <input type="text" class="form-control" name="card_ralationship_name" value="<?=$relation_name?>" >
                                        </div>
                                        <div class="col-4 my-2">
                                            <label>เบอร์ติดต่อเจ้าของบัตร</label>
                                            <input type="text" class="form-control" name="card_tel" value="<?=$tel?>" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>ค้างชำระ</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="check_arrears"  class=" check_arrears" value="check_arrears" <?=$check_arrears?> >
                                        </div>
                                    </div>
                                    <input type="text" class="form-control arrears" name="arrears"   placeholder="จำนวนเงิน" value="<?=$arrears?>" disabled>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">บาท</i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 ">
                                <label>ผ่อนชำระ</label>
                                <div class="row p-3 border">
                                    <div class="col-6 my-2">
                                        <label>เลขที่ใบเสร็จ</label>
                                        <input type="text" class="form-control" name="installments_number" placeholder="เลขที่ใบเสร็จ" value="<?=$result_payment2['refer_no']?>" >
                                    </div>
                                    <div class="col-4 my-2">
                                        <label>งวดที่</label>
                                        <input type="text" class="form-control" name="installments" placeholder="งวดที่"  value="<?=$result_payment2['period']?>" >
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-4 my-2">
                                        <label>วันที่ครบกำหนด</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="checkbox" name="check_installments_deadline_date" id="check_installments_deadline_date" value="check_installments_deadline_date" <?=$check_installments_deadline_date ?>>
                                                </div>
                                            </div>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                            </div>
                                            <input type="text" name="installments_deadline_date" id="installments_deadline_date" <?=$installments_deadline_date?> >
                                        </div>
                                    </div>
                                    <div class="col-4 my-2">
                                        <label>จำนวนเงิน</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="installments_deadline_amount" placeholder="จำนวนเงิน"  value="<?=$result_payment2['deadline_amount']?>" >
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">บาท</i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-4 my-2">
                                        <label>วันชำระเงิน</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="checkbox" name="check_pay_date" id="check_pay_date" value="check_pay_date" <?=$check_pay_date?>>
                                                </div>
                                            </div>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                            </div>
                                            <input type="text" name="installments_pay_date" id="installments_pay_date" <?=$installments_pay_date?> >
                                        </div>
                                    </div>
                                    <div class="col-4 my-2">
                                        <label>จำนวนเงิน</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="installments_pay_amount" id="total1" placeholder="จำนวนเงิน" value="<?=$result_payment2['pay_amount']?>" >
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">บาท</i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-12 my-2">
                                        <label>หมายเหตุ</label>
                                        <textarea rows="3" class="form-control" name="remark" ><?=$result_payment2['remark']?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer shadow">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-success">บันทึกการแก้ไข</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>