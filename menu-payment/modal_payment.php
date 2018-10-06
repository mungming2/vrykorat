<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="width: 130%;">
            <div class="modal-header bg-info shadow-sm">
                <h5 class="modal-title text-white" id="paymentModalLabel">เพิ่มการรับชำระเงิน</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="menu-payment/submitedit.php?forms=addPayment">
                <div class="modal-body m-2 " style="overflow-y: scroll; height: 600px;">
                    <input type="hidden" name="form_type" id="form_type">
                    <input type="hidden" name="index_id" id="add_index_id">
                    <input type="hidden" name="stock_id" id="add_stock_id">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>วันที่ลงบันทึกสมุดบัญชี</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                </div>
                                <input type="text" name="account_date" class="form-control singledate">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>วันที่ลูกค้าชำระเบี้ย</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                </div>
                                <input type="text" name="cus_pay_date" class="form-control singledate">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>วันที่เคลียร์เบี้ย</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                </div>
                                <input type="text" name="clear_date" class="form-control singledate">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>ยอดชำระ</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="total_amount"  placeholder="จำนวนเงิน" >
                                <div class="input-group-prepend">
                                    <div class="input-group-text">บาท</i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>ส่วนลด</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="discount"  placeholder="จำนวนเงิน" >
                                <div class="input-group-prepend">
                                    <div class="input-group-text">บาท</i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>หักภาษี 1%</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="tax_deductions"  placeholder="จำนวนเงิน" >
                                <div class="input-group-prepend">
                                    <div class="input-group-text">บาท</i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>คงเหลือชำระ</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="balance"  placeholder="จำนวนเงิน" >
                                <div class="input-group-prepend">
                                    <div class="input-group-text">บาท</i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>ประเภทการชำระเงิน</label>
                            <div class="w-100"></div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type_payment" id="type_payment1" value="1" checked>
                                <label class="form-check-label" for="type_payment1">หน้าร้าน</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type_payment" id="type_payment2" value="2">
                                <label class="form-check-label" for="type_payment2">เงินเชื่อ</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>สถานะชำระเงิน</label>
                            <div class="form-check mb-3 ">
                                <input class="form-check-input" type="checkbox" name="status_payment[]" value="1" id="status_payment1">
                                <label class="form-check-label" for="status_payment1">
                                    เงินสด
                                </label>
                                <div class="row ">
                                    <div class="col-4 my-2">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="payment_total1" id="total11" placeholder="จำนวนเงิน" data-validation="required" data-validation-error-msg=" " disabled>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">บาท</i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check mb-3 ">
                                <input class="form-check-input" type="checkbox" name="status_payment[]" value="2" id="status_payment2">
                                <label class="form-check-label" for="status_payment2">
                                    เช็ค
                                </label>
                                <div class="row p-3 border" id="distext2">
                                    <div class="col-4 my-2">
                                        <input type="text" class="form-control" name="bank2" placeholder="เช็คธนาคาร" disabled>
                                    </div>
                                    <div class="col-4 my-2">
                                        <input type="text" class="form-control" name="bank_branch" placeholder="สาขา" disabled>
                                    </div>
                                    <div class="col-4 my-2">
                                        <input type="text" class="form-control" name="check_number" placeholder="เลขที่" disabled>
                                    </div>
                                    <div class="col-4 my-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                            </div>
                                            <input type="text" name="check_date" class="form-control singledate" disabled>
                                        </div>
                                    </div>
                                    <div class="col-4 my-2">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="payment_total2" id="total2" placeholder="จำนวนเงิน" data-validation="required" data-validation-error-msg=" " disabled>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">บาท</i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check mb-3 ">
                                <input class="form-check-input" type="checkbox" name="status_payment[]" value="3" id="status_payment3">
                                <label class="form-check-label" for="status_payment3">
                                    โอน
                                </label>
                                <div class="row" id="distext3">
                                    <div class="col-4 my-2">
                                        <input type="text" class="form-control" name="bank3" placeholder="ธนาคาร" disabled>
                                    </div>
                                    <div class="col-4 my-2">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="payment_total3" id="total3" placeholder="จำนวนเงิน" data-validation="required" data-validation-error-msg=" " disabled>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">บาท</i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check mb-3 ">
                                <input class="form-check-input" type="checkbox" name="status_payment[]" value="4" id="status_payment4">
                                <label class="form-check-label" for="status_payment4">
                                    บัตรเครดิต/สาขา
                                </label>
                                <div class="row p-3 border" id="distext4">
                                    <div class="col-4 my-2">
                                        <input type="text" class="form-control" name="bank4" placeholder="ธนาคาร" disabled>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-8 my-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="card_type2" id="visa" value="visa" disabled>
                                            <label class="form-check-label" for="visa"><img src="matrix-admin/assets/images/payment/visa1.png"></label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="card_type2" id="mastercard" value="mastercard" disabled>
                                            <label class="form-check-label" for="mastercard"><img src="matrix-admin/assets/images/payment/mastercard.png"></label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="card_type2" id="jcb" value="jcb" disabled>
                                            <label class="form-check-label" for="jcb"><img src="matrix-admin/assets/images/payment/jcb.png"></label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="card_type2" id="american-express" value="american-express" disabled>
                                            <label class="form-check-label" for="american-express"><img src="matrix-admin/assets/images/payment/american-express.png"></label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="card_type2" id="diners-club" value="diners-club" disabled>
                                            <label class="form-check-label" for="diners-club"><img src="matrix-admin/assets/images/payment/diners-club.png"></label>
                                        </div>
                                        
                                    </div>
                                    <div class="col-8 my-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="card_type1" id="Platinum" value="Platinum" disabled>
                                            <label class="form-check-label" for="Platinum">Platinum Card</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="card_type1" id="Titanium" value="Titanium" disabled>
                                            <label class="form-check-label" for="Titanium">Titanium Card</label>
                                        </div>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-4 my-2">
                                        <label>เลขที่บัตรเครดิต</label>
                                        <input type="text" class="form-control" name="card_number" placeholder="เลขที่" disabled>
                                    </div>
                                    <div class="col-4 my-2">
                                        <label>วันหมดอายุของบัตร</label>
                                        <input type="text" class="form-control" name="card_expired_date" disabled>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-6 my-2">
                                        <label>ชื่อ-นามสกุล (ตามบัตร)</label>
                                        <input type="text" class="form-control" name="card_name" disabled>
                                    </div>
                                    <div class="col-4 my-2">
                                        <label>โปรดเรียกเก็บเงินทั้งหมดจำนวน</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="payment_total4" placeholder="จำนวนเงิน" data-validation="required" data-validation-error-msg=" " disabled>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">บาท</i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-6 my-2">
                                        <label>ความสัมพันธ์กับผู้เอาประกันภัย</label>
                                        <input type="text" class="form-control" name="card_ralationship_name" disabled>
                                    </div>
                                    <div class="col-4 my-2">
                                        <label>เบอร์ติดต่อเจ้าของบัตร</label>
                                        <input type="text" class="form-control" name="card_tel" disabled>
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
                                        <input type="checkbox" name="check_arrears" id="check_arrears" value="check_arrears">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="arrears" id="arrears"  placeholder="จำนวนเงิน" disabled>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">บาท</i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>เลขที่บิล</label>
                            <input type="text" class="form-control" name="bill_no" id="bill_no" placeholder="เลขที่บิล" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 ">
                            <label>ผ่อนชำระ</label>
                            <div class="row p-3 border">
                                <div class="col-6 my-2">
                                    <label>เลขที่ใบเสร็จ</label>
                                    <input type="text" class="form-control" name="installments_number" placeholder="เลขที่ใบเสร็จ">
                                </div>
                                <div class="col-4 my-2">
                                    <label>งวดที่</label>
                                    <input type="text" class="form-control" name="installments" placeholder="งวดที่" >
                                </div>
                                <div class="w-100"></div>
                                <div class="col-4 my-2">
                                    <label>วันที่ครบกำหนด</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                        </div>
                                        <input type="text" name="installments_deadline_date" class="form-control singledate">
                                    </div>
                                </div>
                                <div class="col-4 my-2">
                                    <label>จำนวนเงิน</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="installments_deadline_amount" placeholder="จำนวนเงิน" >
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
                                            <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                        </div>
                                        <input type="text" name="installments_pay_date" class="form-control singledate">
                                    </div>
                                </div>
                                <div class="col-4 my-2">
                                    <label>จำนวนเงิน</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="installments_pay_amount" id="total1" placeholder="จำนวนเงิน" >
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">บาท</i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-12 my-2">
                                    <label>หมายเหตุ</label>
                                    <textarea rows="3" class="form-control" name="remark"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer shadow">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-success">เพิ่มการรับชำระเงิน</button>
                </div>
            </form>
        </div>
    </div>
</div>