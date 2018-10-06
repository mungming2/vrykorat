<?php
	//echo $_GET['action'];

	$sql_code = "SELECT code, name, surname FROM user_code";
    $query_code = mysqli_query($conn,$sql_code);
    $result_code = mysqli_fetch_all($query_code,MYSQLI_ASSOC);

    $sql_user = "SELECT agent_id, name FROM agent ORDER BY agent_id ASC";
    $query_user = mysqli_query($conn,$sql_user);
    $result_user = mysqli_fetch_all($query_user,MYSQLI_ASSOC);

    if($_GET['action'] == 'edit1'){

	    $sql_form1 = "SELECT datetime, type, stock_start, stock_end, index_start, index_end, stock_total, code FROM stock_main WHERE id = '".$_GET['data']."'";
	    $query_form1 = mysqli_query($conn,$sql_form1);
		$res_form1 = mysqli_fetch_array($query_form1,MYSQLI_ASSOC);

		$type1 = '';
		$type2 = '';
		$type1_style = 'style="display:none;"';
		$type2_style = 'style="display:none;"';
		$code = '';
		$checkType1 = '';
		$checkType2 = '';
		$checkType3 = '';
		if($res_form1['type'] == 0){
			$type1 = 'checked';
			$type1_style = '';
		}else{
			$type2 = 'checked';
			$type2_style = '';
			$code = 'selected';
			if($res_form1['type'] == 1){
				$checkType1 = 'selected';
			}elseif($res_form1['type'] == 2){
				$checkType2 = 'selected';
			}else{
				$checkType3 = 'selected';
			}

		}
	}elseif($_GET['action'] == 'edit2'){ 
		$sql_form2 = "SELECT datetime, agent_id, agent_name, stock_start, stock_end, stock_total, type FROM stock_request WHERE id = '".$_GET['data']."'";
	    $query_form2 = mysqli_query($conn,$sql_form2);
		$res_form2 = mysqli_fetch_array($query_form2,MYSQLI_ASSOC);

		$checkagent1 = '';
		$checkagent2 = '';
		$dis1 = 'disabled="true"';
		$dis2 = 'disabled="true"';
		$getAgent = '';


		if($res_form2['agent_id'] == 'ไม่มี'){
			$checkagent2 = 'checked';
			$dis2 = '';
			$getAgent = $res_form2['agent_name'];
		}else{
			$checkagent1 = 'checked';
			$dis1 = '';
		}

	}elseif($_GET['action'] == 'edit3'){ 
		$sql_form3 = "SELECT datetime, agent_id, agent_name, stock_start, stock_end, stock_total, status FROM stock_use WHERE id = '".$_GET['data']."'";
	    $query_form3 = mysqli_query($conn,$sql_form3);
		$res_form3 = mysqli_fetch_array($query_form3,MYSQLI_ASSOC);

		$checkagent1 = '';
		$checkagent2 = '';
		$dis1 = 'disabled="true"';
		$dis2 = 'disabled="true"';
		$getAgent = '';
		$status0 = '';
		$status1 = '';
		$status2 = '';
		$status3 = '';

		if($res_form3['status'] == 0){
			$status0 = 'checked';
		}elseif($res_form3['status'] == 1){
			$status1 = 'checked';
		}elseif($res_form3['status'] == 2){
			$status2 = 'checked';
		}elseif($res_form3['status'] == 3){
			$status3 = 'checked';
		}
		if($res_form3['agent_id'] == 'ไม่มี'){
			$checkagent2 = 'checked';
			$dis2 = '';
			$getAgent = $res_form3['agent_name'];
		}else{
			$checkagent1 = 'checked';
			$dis1 = '';
		}
	}

?>


<div class="row">
	<div class="col-12">
		<?php if(isset($_GET['status']) && $_GET['status'] == 'success'){ ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
			  	<strong>เพิ่มแบบฟอร์มสำเร็จ !</strong> 
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    	<span aria-hidden="true">&times;</span>
			  	</button>
			</div>
		<?php }else if(isset($_GET['status']) && $_GET['status'] == 'fail'){ ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  	<strong>เพิ่มแบบฟอร์มไม่สำเร็จ !</strong> กรุณาลองอีกครั้ง <?='Cause : ' . $_GET['msg']?>
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    	<span aria-hidden="true">&times;</span>
			  	</button>
			</div>
		<?php }  ?>
<!-- ////////////////// EDIT FORM 1 /////////////////// -->
		<?php if($_GET['action'] == 'edit1'){ ?>
	
			<div class="card">
				<a class="card-header link text-white bg-info" >
		            <i class="seticon fa fa-arrow-right" aria-hidden="true"></i>
		            <span> แก้ไขฟอร์มขอเบิกของจากสำนักงานใหญ่</span>
		        </a>
		        <div id="forms-1">
		            <div class="card-body widget-content">
		            	<form class="form-horizontal" method="post" action="menu-stock/submitforms.php?forms=edit1&id=<?=$_GET['data']?>">
			                <div class="card-body">
			                    <div class="form-group row">
			                        <label for="name" class="col-lg-3 text-lg-right control-label col-form-label">เลือกวันที่เบิก</label>
			                        <div class="col-lg-6">
			                            <div class="input-group">
							                <div class="input-group-prepend">
										        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
									        </div>
									        <input type="text" name="select_date" class="form-control singledate-getvalue" value="<?=$res_form1['datetime']?>">
									    </div>
			                        </div>
			                    </div>
			                    <div class="form-group row">
	                                <label class="col-lg-3 text-lg-right control-label col-form-label">ประเภทที่เบิก</label>
	                                <div class="col-lg-6">
										<div class="custom-control custom-radio">
	                                        <input type="radio" class="custom-control-input" id="type1" name="select_type" value="0" <?=$type1?>>
	                                        <label class="custom-control-label" for="type1">พรบ.</label>
	                                    </div>
									    <div class="custom-control custom-radio">
	                                        <input type="radio" class="custom-control-input" id="type2" name="select_type" value="1" <?=$type2?>>
	                                        <label class="custom-control-label" for="type2">สมัครใจ</label>
	                                    </div>                                    
	                                </div>
	                            </div>
	                            <div class="form-group row">
			                        <label class="col-lg-3 text-lg-right control-label col-form-label">เลขที่เอกสาร</label>
			                        <div class="col-md-4 col-lg-3">
			                            <input type="text" class="form-control sumstock" name="index_start" id="index_start" placeholder="เริ่มต้น" value="<?=$res_form1['index_start']?>">
			                        </div>
			                        <label class="col-md-1 text-center control-label col-form-label">ถึง</label>
			                        <div class="col-md-4 col-lg-3">
			                            <input type="text" class="form-control sumstock" name="index_end" id="index_end" placeholder="สิ้นสุด" value="<?=$res_form1['index_end']?>">
			                        </div>
			                    </div>
								<div id="selectType1" <?=$type1_style?>>
									<div class="form-group row">
										<label class="col-lg-3 text-lg-right control-label col-form-label">เลขที่กรมธรรม์</label>
										<div class="col-md-4 col-lg-3">
											<input type="text" class="form-control" name="stock_start" id="stock_start1" placeholder="เริ่มต้น" value="<?=$res_form1['stock_start']?>">
										</div>
										<label class="col-md-1 text-center control-label col-form-label">ถึง</label>
										<div class="col-md-4 col-lg-3">
											<input type="text" class="form-control" name="stock_end" id="stock_end1" placeholder="สิ้นสุด" value="<?=$res_form1['stock_end']?>">
										</div>
									</div>
								</div>
								<div id="selectType2" <?=$type2_style?>>
									<div class="form-group row">
										<label class="col-lg-3 text-lg-right control-label col-form-label">CODE : </label>
										<div class="col-md-4 col-lg-6">
										<select class="custom-select selectOptions" name="selectcode" id="selectcode">
											<?php foreach ($result_code as $key => $value) { 
												if($res_form1['code'] == $value['code']){
													echo "<option value='".$value['code']."' selected>".$value['code']." - ".$value['name']." ". $value['surname'] ."</option>";
												}else{
													echo "<option value='".$value['code']."'>".$value['code']." - ".$value['name']." ". $value['surname'] ."</option>";
												}
											} ?>
										</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 text-lg-right control-label col-form-label">ประเภท : </label>
										<div class="col-md-4 col-lg-6">
										<select class="custom-select selectOptions" name="selecttype" id="selecttype">
											<option value='1' <?=$checkType1?>>ประเภท 1- 3</option>
											<option value='2' <?=$checkType2?>>ประเภท 4</option>
											<option value='3' <?=$checkType3?>>ประเภท 5</option>
										</select>
										</div>
									</div>
								</div>
			                    
			                    <div class="form-group row">
			                        <label for="name" class="col-lg-3 text-lg-right control-label col-form-label">จำนวน</label>
			                        <div class="col-lg-4">
			                            <div class="input-group">
									        <input type="number" class="form-control" name="total" id="total1" value="<?=$res_form1['stock_total']?>">
									        <div class="input-group-prepend">
										        <div class="input-group-text">ชุด</i></div>
									        </div>
									    </div>
			                        </div>
			                    </div>
			                    <div class="row border-top justify-content-around">
			                        <div class="col-lg-3 mt-3">
			                            <button type="button" name="back" onclick="window.location.href='main.php?page=stock-report1';" class="btn btn-secondary btn-lg btn-block">กลับ</button>
			                        </div>
			                        <div class="col-lg-3 mt-3">
			                            <button type="submit" name="submit_forms1" class="btn btn-success btn-lg btn-block">บันทึก</button>
			                        </div>
			                        
			                    </div>
			                </div>
			            </form>
		                
		            </div>
		        </div>
			</div>
<!-- ////////////////// EDIT FORM 2 /////////////////// -->
		<?php }elseif($_GET['action'] == 'edit2'){ ?>
			<div class="card">
				<a class="card-header link text-white bg-info">
		            <i class="seticon fa fa-arrow-right" aria-hidden="true"></i>
		            <span>ฟอร์มเบิกให้ตัวแทน</span>
		        </a>
		        <div id="forms-2">
		            <div class="card-body widget-content">
		                <form class="form-horizontal" method="post" action="menu-stock/submitforms.php?forms=edit2&id=<?=$_GET['data']?>">
			                <div class="card-body">
			                    <div class="form-group row">
			                        <label for="name" class="col-lg-3 text-lg-right control-label col-form-label">เลือกวันที่เบิก</label>
			                        <div class="col-lg-6">
			                            <div class="input-group">
							                <div class="input-group-prepend">
										        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
									        </div>
									        <input type="text" name="select_date" class="form-control singledate-getvalue" value="<?=$res_form2['datetime']?>">
									    </div>
			                        </div>
			                    </div>
			                    <div class="form-group row">
	                                <label class="col-lg-3 text-lg-right control-label col-form-label">ประเภทที่เบิก</label>
	                                <div class="col-lg-6">
	                                    <div class="custom-control custom-radio">
	                                        <input type="radio" class="custom-control-input" id="type2-1" name="select_type" value="0" checked="true" required>
	                                        <label class="custom-control-label" for="type2-1">พรบ.</label>
	                                    </div>
										<div class="custom-control custom-radio">
											<input type="radio" class="custom-control-input" id="type2-2" name="select_type" value="1" required>
                                        <label class="custom-control-label" for="type2-2">สมัครใจ</label>
                                    </div>
	                                </div>
	                            </div>
			                    <div class="form-group row">
	                                <label class="col-lg-3 text-lg-right control-label col-form-label">ตัวแทน</label>
	                                
	                                <div class="col-lg-6">
		                                <div class="input-group">
										  	<div class="col-lg-1 input-group-prepend">
										    	<div class="input-group-text">
										    		<input type="radio" name="radio_agent" id="agent1" checked="true" value="select" <?=$checkagent1?>>
										    	</div>
										  	</div>
											<div class="col-lg-8">
												<select class="custom-select selectOptions" name="selectagent" id="selectagent" <?=$dis1?>>
													<?php foreach ($result_user as $key => $value) { 
														if($res_form2['agent_id'] == $value['agent_id']){
															echo "<option value='".$value['agent_id']."' selected>".$value['agent_id']." - ".$value['name']."</option>";
														}
														echo "<option value='".$value['agent_id']."'>".$value['agent_id']." - ".$value['name']."</option>";
													} ?>
												</select>
											</div>
										</div>
		                            </div>
		                            <div class="w-100"></div>
		                            <div class="col-lg-6 offset-lg-3">
		                            	<div class="input-group">
										  	<div class="col-lg-1 input-group-prepend">
										    	<div class="input-group-text">
										    		<input type="radio" name="radio_agent" id="agent2" value="input" <?=$checkagent2?>>
										    	</div>
										  	</div>
											<div class="col-lg-8">
												<input type="text" id="agent_name" name="agent_name" class="form-control" placeholder="โปรดระบุ" value="<?=$getAgent?>" <?=$dis2?> >
											</div>
										</div>
	                                    <input type="hidden" name="agent_id" class="form-control" value="999">
	                                </div>
	                            </div>
			                    <div class="form-group row">
			                        <label class="col-lg-3 text-lg-right control-label col-form-label">เลขที่กรมธรรม์</label>
			                        <div class="col-md-4 col-lg-3">
			                            <input type="text" class="form-control sumstock2" name="stock_start" id="stock_start2" placeholder="เริ่มต้น" value="<?=$res_form2['stock_start'] ?>">
			                        </div>
			                        <label class="col-md-1 text-center control-label col-form-label">ถึง</label>
			                        <div class="col-md-4 col-lg-3">
			                            <input type="text" class="form-control sumstock2" name="stock_end" id="stock_end2" placeholder="สิ้นสุด" value="<?=$res_form2['stock_end'] ?>">
			                        </div>
			                    </div>
			                    <div class="form-group row">
			                        <label for="name" class="col-lg-3 text-lg-right control-label col-form-label">จำนวน</label>
			                        <div class="col-lg-4">
			                            <div class="input-group">
									        <input type="number" name="total" id="total2" class="form-control" value="<?=$res_form2['stock_total'] ?>">
									        <div class="input-group-prepend">
										        <div class="input-group-text">ชุด</i></div>
									        </div>
									    </div>
			                        </div>
			                    </div>
			                    <div class="row border-top justify-content-around">
			                        <div class="col-lg-3 mt-3">
			                            <button type="button" name="back" onclick="window.location.href='main.php?page=stock-report2';" class="btn btn-secondary btn-lg btn-block">กลับ</button>
			                        </div>
			                        <div class="col-lg-3 mt-3">
			                            <button type="submit" name="submit_forms1" class="btn btn-success btn-lg btn-block">บันทึก</button>
			                        </div>
			                        
			                    </div>
			                </div>
			            </form>
		            </div>
		        </div>
			</div>
<!-- ////////////////// EDIT FORM 3 /////////////////// -->
		<?php }elseif($_GET['action'] == 'edit3'){ ?>
			<div class="card">
				<a class="card-header link text-white bg-info">
		            <i class="seticon fa fa-arrow-right" aria-hidden="true"></i>
		            <span>ฟอร์มสต๊อกรายวัน</span>
		        </a>
		        <div>
		            <div class="card-body widget-content">
		                <form class="form-horizontal" method="post" action="menu-stock/submitforms.php?forms=edit3&id=<?=$_GET['data']?>">
			                <div class="card-body">
			                    <div class="form-group row">
			                        <label for="name" class="col-lg-3 text-lg-right control-label col-form-label">เลือกวันที่ออกกรมธรรม์</label>
			                        <div class="col-lg-6">
			                            <div class="input-group">
							                <div class="input-group-prepend">
										        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
									        </div>
									        <input type="text" name="select_date" class="form-control singledate-getvalue" value="<?=$res_form3['datetime']?>">
									    </div>
			                        </div>
			                    </div>
			                    <div class="form-group row">
	                                <label class="col-lg-3 text-lg-right control-label col-form-label">ตัวแทน</label>
	                                
	                                <div class="col-lg-6">
		                                <div class="input-group">
										  	<div class="col-lg-1 input-group-prepend">
										    	<div class="input-group-text">
										    		<input type="radio" name="radio_agent" id="agent11" checked="true" value="select" <?=$checkagent1?>>
										    	</div>
										  	</div>
											<div class="col-lg-8">
										  	<select class="custom-select selectOptions" name="selectagent" id="selectagent2" <?=$dis1?>>
			                                	<option selected>โปรดเลือกตัวแทน</option>
			                                	<?php foreach ($result_user as $key => $value) { 
			                                		if($res_form3['agent_id'] == $value['agent_id']){
														echo "<option value='".$value['agent_id']."' selected>".$value['agent_id']." - ".$value['name']."</option>";
													}
			                                		echo "<option value='".$value['agent_id']."'>".$value['agent_id']." - ".$value['name']."</option>";
			                                	} ?>
			                                </select>
											</div>
										</div>
		                            </div>
		                            <div class="w-100"></div>
		                            <div class="col-lg-6 offset-lg-3">
		                            	<div class="input-group">
										  	<div class="col-lg-1 input-group-prepend">
										    	<div class="input-group-text">
										    		<input type="radio" name="radio_agent" id="agent22" value="input" <?=$checkagent2?>>
										    	</div>
										  	</div>
											<div class="col-lg-8">
												<input type="text" id="agent_name2" name="agent_name" class="form-control" placeholder="โปรดระบุ" value="<?=$getAgent?>" <?=$dis2?>>
											</div>
										</div>
	                                    <input type="hidden" name="agent_id" class="form-control" value="999">
	                                </div>
	                            </div>
	                            <div class="form-group row">
	                                <label class="col-lg-3 text-lg-right control-label col-form-label">สถานะเบิก</label>
	                                <div class="col-lg-6">
	                                    <!--
										<div class="custom-control custom-radio">
	                                        <input type="radio" class="custom-control-input" id="status1" name="select_status" value="0" <?=$status0?>>
	                                        <label class="custom-control-label" for="status1">ใช้งาน</label>
	                                    </div>
										//-->
	                                    <div class="custom-control custom-radio">
	                                        <input type="radio" class="custom-control-input" id="status2" name="select_status" value="1" <?=$status1?>>
	                                        <label class="custom-control-label" for="status2">ส่งคืน</label>
	                                    </div>
	                                    <div class="custom-control custom-radio">
	                                        <input type="radio" class="custom-control-input" id="status3" name="select_status" value="2" <?=$status2?>>
	                                        <label class="custom-control-label" for="status3">ชำรุด</label>
	                                    </div>
	                                    <div class="custom-control custom-radio">
	                                        <input type="radio" class="custom-control-input" id="status4" name="select_status" value="3" <?=$status3?>>
	                                        <label class="custom-control-label" for="status4">สูญหาย</label>
	                                    </div>
	                                </div>
	                            </div>
			                    <div class="form-group row">
			                        <label class="col-lg-3 text-lg-right control-label col-form-label">เลขที่กรมธรรม์</label>
			                        <div class="col-md-4 col-lg-3">
			                            <input type="text" class="form-control sumstock3" id="stock_start3" name="stock_start" placeholder="เริ่มต้น" value="<?=$res_form3['stock_start'] ?>">
			                        </div>
			                        <label class="col-md-1 text-center control-label col-form-label">ถึง</label>
			                        <div class="col-md-4 col-lg-3">
			                            <input type="text" class="form-control sumstock3" id="stock_end3" name="stock_end" placeholder="สิ้นสุด" value="<?=$res_form3['stock_end'] ?>">
			                        </div>
			                    </div>
			                    <div class="form-group row">
			                        <label class="col-lg-3 text-lg-right control-label col-form-label">จำนวน</label>
			                        <div class="col-lg-4">
			                            <div class="input-group">
									        <input type="number" name="total" id="total3" class="form-control" value="<?=$res_form3['stock_total'] ?>">
									        <div class="input-group-prepend">
										        <div class="input-group-text">ชุด</i></div>
									        </div>
									    </div>
			                        </div>
			                    </div>
			                    <div class="row border-top justify-content-around">
			                        <div class="col-lg-3 mt-3">
			                            <button type="button" name="back" onclick="window.location.href='main.php?page=stock-report3';" class="btn btn-secondary btn-lg btn-block">กลับ</button>
			                        </div>
			                        <div class="col-lg-3 mt-3">
			                            <button type="submit" name="submit_forms1" class="btn btn-success btn-lg btn-block">บันทึก</button>
			                        </div>
			                        
			                    </div>
			                </div>
			            </form>
		            </div>
		        </div>
			</div>
		<?php } ?>
	</div>
</div>