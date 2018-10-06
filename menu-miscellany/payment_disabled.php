<?php 

	foreach ($result_payment as $key_payment => $value_payment) { 
		$sql_payment2 = "SELECT id, count, form_type, total_amount, discount, tax_deductions, balance, payment_type, type, bank, bank_branch, total, payment_number, payment_date, cheque_date, card_type1, card_type2, exp_date, name, relation_name, tel, arrears, bill_no, refer_no, due_date, pay_amount, deadline_amount, period, remark, create_date, account_date, cus_pay_date, clear_date
	    FROM payment WHERE stock_id = '".$result_get_stock['id']."' AND count = '".$value_payment['count']."' AND form_type = '$form_type'";
	    $query_payment2 = mysqli_query($conn,$sql_payment2);
	    $query_payment3 = mysqli_query($conn,$sql_payment2);
	    $result_payment2 = mysqli_fetch_array($query_payment2,MYSQLI_ASSOC);
	    $result_payment3 = mysqli_fetch_all($query_payment3,MYSQLI_ASSOC);

	    $type1 = '';
	    $type2 = '';

	    if($result_payment2['type'] == 1){
	    	$type1 = 'checked';
	    }elseif($result_payment2['type'] == 2){
	    	$type2 = 'checked';
        }
        
        $check_arrears = '';
		$arrears = '';
        $bill_no = $result_payment2['bill_no'];
        
	    if(!empty($result_payment2['arrears'])){
			$check_arrears = 'checked';
			$arrears = $result_payment2['arrears'];
			
		}

	    $payment_type1 = '';
	    $payment_type2 = '';
	    $payment_type3 = '';
	    $payment_type4 = '';

	    $total1 = '';
	    $total2 = '';
	    $total3 = '';
	    $total4 = '';

	    $bank2 = '';
	    $bank3 = '';
	    $bank4 = '';

	    $bank_branch = '';

	    $payment_number2 = '';
	    $payment_number4 = '';

	    $cheque_date = '';

	    $exp_date = '';
		$name = '';
		$relation_name = '';
		$tel = '';

		$platinum = '';
		$titanium = '';

		$visa = '';
		$mastercard = '';
		$jcb = '';
		$americanexpress = '';
		$dinersclub = '';
		$get_id = array();

		$check_account_date = '';
		$check_cus_pay_date = '';
		$check_clear_date = '';
		$check_installments_deadline_date = '';
		$check_pay_date = '';

		if($result_payment2['account_date'] !== '0000-00-00' && !empty($result_payment2['account_date'])){
			$check_account_date = 'checked';
			$account_date = $result_payment2['account_date'];
			$account_date = 'class="form-control singledate-getvalue" value="'.$result_payment2['account_date'].'"';
		}else{
			$account_date = 'class="form-control singledate"';
		}
		if($result_payment2['cus_pay_date'] !== '0000-00-00' && !empty($result_payment2['cus_pay_date'])){
			$check_cus_pay_date = 'checked';
			$cus_pay_date = 'class="form-control singledate-getvalue" value="'.$result_payment2['cus_pay_date'].'"';
		}else{
			$cus_pay_date = 'class="form-control singledate"';
		}
		if($result_payment2['clear_date'] !== '0000-00-00' && !empty($result_payment2['clear_date'])){
			$check_clear_date = 'checked';
			$clear_date = 'class="form-control singledate-getvalue" value="'.$result_payment2['clear_date'].'"';
		}else{
			$clear_date = 'class="form-control singledate"';
		}
		if($result_payment2['due_date'] !== '0000-00-00'){
			$check_installments_deadline_date = 'checked';
			$installments_deadline_date = 'class="form-control singledate-getvalue" value="'.$result_payment2['due_date'].'"';
		}else{
			$installments_deadline_date = 'class="form-control singledate"';
		}
		if($result_payment2['payment_date'] !== '0000-00-00'){
			$check_pay_date = 'checked';
			$installments_pay_date = 'class="form-control singledate-getvalue" value="'.$result_payment2['payment_date'].'"';
		}else{
			$installments_pay_date = 'class="form-control singledate"';
		}

		

	    foreach ($result_payment3 as $key => $value_payment3) {
	    	$get_id[$key] = $value_payment3['id'];
	    	if($value_payment3['payment_type'] == 1){
	    		$payment_type1 = 'checked';
	    		$total1 = $value_payment3['total'];
	    	}elseif($value_payment3['payment_type'] == 2){
	    		$payment_type2 = 'checked';
	    		$bank2 = $value_payment3['bank'];
	    		$bank_branch = $value_payment3['bank_branch'];
	    		$payment_number2 = $value_payment3['payment_number'];
	    		$total2 = $value_payment3['total'];
	    		$cheque_date = $value_payment3['cheque_date'];
	    	}elseif($value_payment3['payment_type'] == 3){
	    		$payment_type3 = 'checked';
	    		$bank3 = $value_payment3['bank'];
	    		$total3 = $value_payment3['total'];
	    	}elseif($value_payment3['payment_type'] == 4){
	    		$payment_type4 = 'checked';
	    		$bank4 = $value_payment3['bank'];
	    		$payment_number4 = $value_payment3['payment_number'];
	    		$total4 = $value_payment3['total'];
	    		$exp_date = $value_payment3['exp_date'];
	    		$name = $value_payment3['name'];
	    		$relation_name = $value_payment3['relation_name'];
	    		$tel = $value_payment3['tel'];
	    		if($value_payment3['card_type1'] == 'Platinum'){
	    			$platinum = "checked";
	    		}elseif($value_payment3['card_type1'] == 'Titanium'){
	    			$titanium = "checked";
	    		}
	    		if($value_payment3['card_type2'] == 'visa'){
	    			$visa = "checked";
	    		}elseif($value_payment3['card_type2'] == 'mastercard'){
	    			$mastercard = "checked";
	    		}elseif($value_payment3['card_type2'] == 'jcb'){
	    			$jcb = "checked";
	    		}elseif($value_payment3['card_type2'] == 'americanexpress'){
	    			$americanexpress = "checked";
	    		}elseif($value_payment3['card_type2'] == 'dinersclub'){
	    			$dinersclub = "checked";
	    		}
	    	}
	    }
	    $show_id = implode(',', $get_id);
	    $getMsg = "คุณต้องการลบข้อมูลการชำระเงินเลขที่เอกสาร ".$result_get_stock['stock_id']." การชำระเงินครั้งที่  ".$value_payment['count']." ใช่หรือไม่?";
?>

<div class="card">
  	<div class="card-header text-white bg-primary d-flex justify-content-between">
	  	<div class="d-flex align-items-center">รับชำระเงิน ( ข้อมูลการชำระเงินครั้งที่  <?=$value_payment['count']?> )</div>
	  	<div>
	  		<button class="btn btn-warning shadow px-4" data-toggle="modal" data-target="#editModal<?=$key_payment?>"><i class="far fa-edit px-2"></i> แก้ไขการรับชำระเงินนี้</button>
	  		<a href="menu-miscellany/submitdeletepayment.php?stock_id=<?=$result_get_stock['id']?>&count=<?=$value_payment['count'] ?>&form=<?=$form_type ?>" class="btn btn-danger shadow px-4" onclick="return confirm('<?=$getMsg?>')"><i class="fas fa-trash-alt px-2"></i> ลบ</a>
	  		<input type="hidden" id="check_stock_id" value="<?=$result_get_stock['stock_id'] ?>">
	  		<input type="hidden" id="check_count" value="<?=$value_payment['count'] ?>">
	  	</div>
	 </div>

  	<div class="card-body">
  		<div class="form-row">
  			<div class="form-group col-md-4">
		      	<label>วันที่ลงบันทึกสมุดบัญชี</label>
		      	<div class="input-group">
				  	<div class="input-group-prepend">
						<div class="input-group-text">
							<input type="checkbox" name="check_account_date" value="check_account_date" disabled <?=$check_account_date ?>>
						</div>
					</div>
	                <div class="input-group-prepend">
				        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
			        </div>
			        <input type="text" name="account_date" <?=$account_date?> disabled>
			    </div>
		    </div>
		    <div class="form-group col-md-4">
		      	<label>วันที่ลูกค้าชำระเบี้ย</label>
		      	<div class="input-group">
				  	<div class="input-group-prepend">
						<div class="input-group-text">
							<input type="checkbox" name="check_cus_pay_date" value="check_cus_pay_date" disabled <?=$check_cus_pay_date ?>>
						</div>
					</div>
	                <div class="input-group-prepend">
				        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
			        </div>
			        <input type="text" name="cus_pay_date" <?=$cus_pay_date?> disabled>
			    </div>
		    </div>
		    <div class="form-group col-md-4">
		      	<label>วันที่เคลียร์เบี้ย</label>
		      	<div class="input-group">
				  	<div class="input-group-prepend">
						<div class="input-group-text">
							<input type="checkbox" name="check_clear_date" value="check_clear_date" disabled <?=$check_clear_date ?>>
						</div>
					</div>
	                <div class="input-group-prepend">
				        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
			        </div>
			        <input type="text" name="clear_date" <?=$clear_date?> disabled>
			    </div>
		    </div>
  		</div>
  		<div class="form-row">
  			<div class="form-group col-md-4">
		      	<label>ยอดชำระ</label>
		      	<div class="input-group">
			        <input type="text" class="form-control" name="total_amount"  placeholder="จำนวนเงิน" value="<?=$result_payment2['total_amount']?>" disabled>
			        <div class="input-group-prepend">
				        <div class="input-group-text">บาท</i></div>
			        </div>
			    </div>
		    </div>
		    <div class="form-group col-md-4">
		      	<label>ส่วนลด</label>
			    <div class="input-group">
			        <input type="text" class="form-control" name="discount"  placeholder="จำนวนเงิน" value="<?=$result_payment2['discount']?>" disabled>
			        <div class="input-group-prepend">
				        <div class="input-group-text">บาท</i></div>
			        </div>
			    </div>
		    </div>
		    <div class="form-group col-md-4">
		      	<label>หักภาษี 1%</label>
		      	<div class="input-group">
			        <input type="text" class="form-control" name="tax_deductions"  placeholder="จำนวนเงิน" value="<?=$result_payment2['tax_deductions']?>" disabled>
			        <div class="input-group-prepend">
				        <div class="input-group-text">บาท</i></div>
			        </div>
			    </div>
		    </div>
		    <div class="form-group col-md-4">
		      	<label>คงเหลือชำระ</label>
		      	<div class="input-group">
			        <input type="text" class="form-control" name="balance"  placeholder="จำนวนเงิน" value="<?=$result_payment2['balance']?>" disabled>
			        <div class="input-group-prepend">
				        <div class="input-group-text">บาท</i></div>
			        </div>
			    </div>
		    </div>
  		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
		      	<label>เลขที่บิล</label>
			    <input type="text" class="form-control" name="bill_no"  placeholder="เลขที่บิล" value="<?=$bill_no?>" disabled>
		    </div>
		</div>
  		<div class="form-row">
  			<div class="form-group col-md-6">
		      	<label>ประเภทการชำระเงิน</label>
		      	<div class="w-100"></div>
				<div class="form-check form-check-inline">
				  	<input class="form-check-input" type="radio" name="type_payment" value="1" disabled <?=$type1?>>
				  	<label class="form-check-label">หน้าร้าน</label>
				</div>
				<div class="form-check form-check-inline">
				  	<input class="form-check-input" type="radio" name="type_payment" value="2" disabled <?=$type2?>>
				  	<label class="form-check-label">เงินเชื่อ</label>
				</div>
		    </div>
  		</div>
  		<div class="form-row">
  			<div class="form-group col-md-12">
		      	<label>สถานะชำระเงิน</label>
		      	<div class="form-check mb-3 ">
				  	<input class="form-check-input" type="checkbox" name="status_payment[]" value="1" <?=$payment_type1?> disabled>
				  	<label class="form-check-label" for="status_payment1">
				    	เงินสด
				  	</label>
				  	<div class="row ">
				  		<div class="col-4 my-2">
				  			<div class="input-group">
						        <input type="text" class="form-control" name="payment_total1"  placeholder="จำนวนเงิน" data-validation="required" data-validation-error-msg=" " value="<?=$total1?>" disabled>
						        <div class="input-group-prepend">
							        <div class="input-group-text">บาท</i></div>
						        </div>
						    </div>
				  		</div>
				  	</div>
				</div>
				<div class="form-check mb-3 ">
				  	<input class="form-check-input" type="checkbox" name="status_payment[]" value="2"  <?=$payment_type2?> disabled>
				  	<label class="form-check-label" for="status_payment2">
				    	เช็ค
				  	</label>
				  	<div class="row p-3 border">
				  		<div class="col-4 my-2">
				  			<input type="text" class="form-control" name="bank2" placeholder="เช็คธนาคาร" value="<?=$bank2 ?>" disabled>
				  		</div>
				  		<div class="col-4 my-2">
				  			<input type="text" class="form-control" name="bank_branch" placeholder="สาขา" value="<?=$bank_branch ?>" disabled>
				  		</div>
				  		<div class="col-4 my-2">
				  			<input type="text" class="form-control" name="check_number" placeholder="เลขที่" value="<?=$payment_number2 ?>" disabled>
				  		</div>
				  		<div class="col-4 my-2">
				  			<div class="input-group">
				                <div class="input-group-prepend">
							        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
						        </div>
						        <input type="text" name="check_date" class="form-control singledate-getvalue" value="<?=$cheque_date?>" disabled >
						    </div>
				  		</div>
				  		<div class="col-4 my-2">
				  			<div class="input-group">
						        <input type="text" class="form-control" name="payment_total2" id="total2" placeholder="จำนวนเงิน" data-validation="required" data-validation-error-msg=" " value="<?=$total2?>" disabled>
						        <div class="input-group-prepend">
							        <div class="input-group-text">บาท</i></div>
						        </div>
						    </div>
				  		</div>
				  	</div>
				</div>
				<div class="form-check mb-3 ">
				  	<input class="form-check-input" type="checkbox" name="status_payment[]" value="3"  <?=$payment_type3?> disabled>
				  	<label class="form-check-label" for="status_payment3">
				    	โอน
				  	</label>
				  	<div class="row" >
				  		<div class="col-4 my-2">
				  			<input type="text" class="form-control" name="bank3" placeholder="ธนาคาร" disabled value="<?=$bank3?>">
				  		</div>
				  		<div class="col-4 my-2">
				  			<div class="input-group">
						        <input type="text" class="form-control" name="payment_total3" id="total3" placeholder="จำนวนเงิน" data-validation="required" data-validation-error-msg=" " value="<?=$total3?>" disabled>
						        <div class="input-group-prepend">
							        <div class="input-group-text">บาท</i></div>
						        </div>
						    </div>
				  		</div>
				  	</div>
				</div>
				<div class="form-check mb-3 ">
				  	<input class="form-check-input" type="checkbox" name="status_payment[]" value="4"  <?=$payment_type4?> disabled>
				  	<label class="form-check-label" for="status_payment4">
				    	บัตรเครดิต/สาขา
				  	</label>
				  	<div class="row p-3 border" >
				  		<div class="col-4 my-2">
				  			<input type="text" class="form-control" name="bank4" placeholder="ธนาคาร" value="<?=$bank4?>" disabled>
				  		</div>
				  		<div class="w-100"></div>
				  		<div class="col-8 my-2">
				  			<div class="form-check form-check-inline">
							  	<input class="form-check-input" type="radio" name="card_type2" id="visa" value="visa" <?=$visa?> disabled>
							  	<label class="form-check-label" for="visa"><img src="matrix-admin/assets/images/payment/visa1.png"></label>
							</div>
							<div class="form-check form-check-inline">
							  	<input class="form-check-input" type="radio" name="card_type2" id="mastercard" value="mastercard" <?=$mastercard?> disabled>
							  	<label class="form-check-label" for="mastercard"><img src="matrix-admin/assets/images/payment/mastercard.png"></label>
							</div>
							<div class="form-check form-check-inline">
							  	<input class="form-check-input" type="radio" name="card_type2" id="jcb" value="jcb" <?=$jcb?> disabled>
							  	<label class="form-check-label" for="jcb"><img src="matrix-admin/assets/images/payment/jcb.png"></label>
							</div>
							<div class="form-check form-check-inline">
							  	<input class="form-check-input" type="radio" name="card_type2" id="american-express" value="american-express" <?=$americanexpress?> disabled>
							  	<label class="form-check-label" for="american-express"><img src="matrix-admin/assets/images/payment/american-express.png"></label>
							</div>
							<div class="form-check form-check-inline">
							  	<input class="form-check-input" type="radio" name="card_type2" id="diners-club" value="diners-club" <?=$dinersclub ?> disabled>
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
				  			<input type="text" class="form-control" name="card_number" placeholder="เลขที่" value="<?=$payment_number4?>" disabled>
				  		</div>
				  		<div class="col-4 my-2">
				  			<label>วันหมดอายุของบัตร</label>
				  			<input type="text" class="form-control" name="card_expired_date" value="<?=$exp_date?>" disabled>
				  		</div>
				  		<div class="w-100"></div>
				  		<div class="col-6 my-2">
				  			<label>ชื่อ-นามสกุล (ตามบัตร)</label>
				  			<input type="text" class="form-control" name="card_name" value="<?=$name?>" disabled>
				  		</div>
				  		<div class="col-4 my-2">
				  			<label>โปรดเรียกเก็บเงินทั้งหมดจำนวน</label>
				  			<div class="input-group">
						        <input type="text" class="form-control" name="payment_total4" placeholder="จำนวนเงิน" data-validation="required" data-validation-error-msg=" " value="<?=$total4?>" disabled>
						        <div class="input-group-prepend">
							        <div class="input-group-text">บาท</i></div>
						        </div>
						    </div>
				  		</div>
				  		<div class="w-100"></div>
				  		<div class="col-6 my-2">
				  			<label>ความสัมพันธ์กับผู้เอาประกันภัย</label>
				  			<input type="text" class="form-control" name="card_ralationship_name" value="<?=$relation_name?>" disabled>
				  		</div>
				  		<div class="col-4 my-2">
				  			<label>เบอร์ติดต่อเจ้าของบัตร</label>
				  			<input type="text" class="form-control" name="card_tel" value="<?=$tel?>" disabled>
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
				    		<input type="checkbox" name="check_arrears" value="check_arrears" <?=$check_arrears?> disabled>
				    	</div>
				  	</div>
			        <input type="text" class="form-control" name="arrears"  placeholder="จำนวนเงิน" value="<?=$arrears?>" disabled>
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
		      			<input type="text" class="form-control" name="installments_number" placeholder="เลขที่ใบเสร็จ" value="<?=$result_payment2['refer_no']?>" disabled>
		      		</div>
		      		<div class="col-4 my-2">
		      			<label>งวดที่</label>
		      			<input type="text" class="form-control" name="installments" placeholder="งวดที่"  value="<?=$result_payment2['period']?>" disabled>
		      		</div>
		      		<div class="w-100"></div>
		      		<div class="col-4 my-2">
		      			<label>วันที่ครบกำหนด</label>
		      			<div class="input-group">
						  	<div class="input-group-prepend">
								<div class="input-group-text">
									<input type="checkbox" name="check_installments_deadline_date" value="check_installments_deadline_date" disabled <?=$check_installments_deadline_date ?>>
								</div>
							</div>
			                <div class="input-group-prepend">
						        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
					        </div>
					        <input type="text" name="installments_deadline_date" <?=$installments_deadline_date?> disabled>
					    </div>
		      		</div>
		      		<div class="col-4 my-2">
		      			<label>จำนวนเงิน</label>
		      			<div class="input-group">
					        <input type="text" class="form-control" name="installments_deadline_amount" placeholder="จำนวนเงิน"  value="<?=$result_payment2['deadline_amount']?>" disabled>
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
									<input type="checkbox" name="check_pay_date" value="check_pay_date" disabled <?=$check_pay_date?>>
								</div>
							</div>
			                <div class="input-group-prepend">
						        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
					        </div>
					        <input type="text" name="installments_pay_date" <?=$installments_pay_date?> disabled>
					    </div>
		      		</div>
		      		<div class="col-4 my-2">
		      			<label>จำนวนเงิน</label>
		      			<div class="input-group">
					        <input type="text" class="form-control" name="installments_pay_amount" id="total1" placeholder="จำนวนเงิน" value="<?=$result_payment2['pay_amount']?>" disabled>
					        <div class="input-group-prepend">
						        <div class="input-group-text">บาท</i></div>
					        </div>
					    </div>
		      		</div>
		      		<div class="w-100"></div>
		      		<div class="col-12 my-2">
		      			<label>หมายเหตุ</label>
		      			<textarea rows="3" class="form-control" name="remark" disabled><?=$result_payment2['remark']?></textarea>
		      		</div>
		      	</div>
		    </div>
		</div>
  	</div>
</div>
<?php 
        include 'modal_edit_payment.php';
    }
?>