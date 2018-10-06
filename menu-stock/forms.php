<?php
    $sql_user = "SELECT agent_id, name FROM agent ORDER BY agent_id ASC";
    $query_user = mysqli_query($conn,$sql_user);
    $result_user = mysqli_fetch_all($query_user,MYSQLI_ASSOC);
	
    $sql_code = "SELECT code, name, surname FROM user_code";
    $query_code = mysqli_query($conn,$sql_code);
    $result_code = mysqli_fetch_all($query_code,MYSQLI_ASSOC);	
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
		<?php } ?>
		<div class="card">
			<a class="card-header link text-white bg-info" data-toggle="collapse" data-parent="#accordian-4" href="#forms-1" aria-expanded="false" aria-controls="forms-1">
	            <i class="seticon fa fa-arrow-right" aria-hidden="true"></i>
	            <span> ฟอร์มขอเบิกของจากสำนักงานใหญ่</span>
	        </a>
	        <div id="forms-1" class="collapse multi-collapse">
	            <div class="card-body widget-content">
	            	<form class="form-horizontal" method="post" action="menu-stock/submitforms.php?forms=1">
		                <div class="card-body">
		                    <div class="form-group row">
		                        <label for="name" class="col-lg-3 text-lg-right control-label col-form-label">เลือกวันที่เบิก</label>
		                        <div class="col-lg-6">
		                            <div class="input-group">
						                <div class="input-group-prepend">
									        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
								        </div>
								        <input type="text" name="select_date" class="form-control singledate">
								    </div>
		                        </div>
		                    </div>
		                    <div class="form-group row">
                                <label class="col-lg-3 text-lg-right control-label col-form-label">ประเภทที่เบิก</label>
                                <div class="col-lg-6">
									<div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="type1" name="select_type" checked="checked" value="0">
                                        <label class="custom-control-label" for="type1">พรบ.</label>
                                    </div>
								    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="type2" name="select_type" value="1">
                                        <label class="custom-control-label" for="type2">สมัครใจ</label>
                                    </div>                                    
                                </div>
                            </div>
                            <div id="selectType2" style="display:none;">
								<div class="form-group row">
									<label class="col-lg-3 text-lg-right control-label col-form-label">CODE : </label>
									<div class="col-md-4 col-lg-6">
									<select class="custom-select selectOptions" name="selectcode" id="selectcode">
										<?php foreach ($result_code as $key => $value) { 
											echo "<option value='".$value['code']."'>".$value['code']." - ".$value['name']." ". $value['surname'] ."</option>";
										} ?>
									</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-lg-3 text-lg-right control-label col-form-label">ประเภท : </label>
									<div class="col-md-4 col-lg-6">
									<select class="custom-select selectOptions" name="selecttype" id="selecttype">
										<option value='1'>ประเภท 1- 3</option>
										<option value='2'>ประเภท 4</option>
										<option value='3'>ประเภท 5</option>
									</select>
									</div>
								</div>
							</div>
                            <div class="form-group row">
		                        <label class="col-lg-3 text-lg-right control-label col-form-label">เลขที่เอกสาร</label>
		                        <div class="col-md-4 col-lg-3">
		                            <input type="text" class="form-control sumstock" name="index_start" id="index_start" placeholder="เริ่มต้น">
		                        </div>
		                        <label class="col-md-1 text-center control-label col-form-label">ถึง</label>
		                        <div class="col-md-4 col-lg-3">
		                            <input type="text" class="form-control sumstock" name="index_end" id="index_end" placeholder="สิ้นสุด">
		                        </div>
		                    </div>
							<div id="selectType1">
								<div class="form-group row">
									<label class="col-lg-3 text-lg-right control-label col-form-label">เลขที่กรมธรรม์</label>
									<div class="col-md-4 col-lg-3">
										<input type="text" class="form-control" name="stock_start" id="stock_start1" placeholder="เริ่มต้น">
									</div>
									<label class="col-md-1 text-center control-label col-form-label">ถึง</label>
									<div class="col-md-4 col-lg-3">
										<input type="text" class="form-control" name="stock_end" id="stock_end1" placeholder="สิ้นสุด">
									</div>
								</div>
							</div>
							
		                    
		                    <div class="form-group row">
		                        <label for="name" class="col-lg-3 text-lg-right control-label col-form-label">จำนวน</label>
		                        <div class="col-lg-4">
		                            <div class="input-group">
								        <input type="number" class="form-control" name="total" id="total1">
								        <div class="input-group-prepend">
									        <div class="input-group-text">ชุด</i></div>
								        </div>
								    </div>
		                        </div>
		                    </div>
		                    <div class="row border-top justify-content-center">
		                    	<div class="col-lg-3 mt-3">
		                    		<button type="submit" name="submit_forms1" class="btn btn-success btn-lg btn-block">บันทึก</button>
		                    	</div>
		                        
		                    </div>
		                </div>
		            </form>
	                
	            </div>
	        </div>
		</div>

		<div class="card">
			<a class="card-header link text-white bg-info" data-toggle="collapse" data-parent="#accordian-4" href="#forms-2" aria-expanded="false" aria-controls="forms-2">
	            <i class="seticon fa fa-arrow-right" aria-hidden="true"></i>
	            <span>ฟอร์มเบิกให้ตัวแทน</span>
	        </a>
	        <div id="forms-2" class="collapse multi-collapse">
	            <div class="card-body widget-content">
	                <form class="form-horizontal" method="post" action="menu-stock/submitforms.php?forms=2">
		                <div class="card-body">
		                    <div class="form-group row">
		                        <label for="name" class="col-lg-3 text-lg-right control-label col-form-label">เลือกวันที่เบิก</label>
		                        <div class="col-lg-6">
		                            <div class="input-group">
						                <div class="input-group-prepend">
									        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
								        </div>
								        <input type="text" name="select_date" class="form-control singledate">
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
		                    <div id="selectType3" class="form-group row">
                                <label class="col-lg-3 text-lg-right control-label col-form-label">ตัวแทน</label>
                                
                                <div class="col-lg-6">
	                                <div class="input-group">
									  	<div class="col-lg-1 input-group-prepend">
									    	<div class="input-group-text">
									    		<input type="radio" name="radio_agent" id="agent1" checked="true" value="select">
									    	</div>
									  	</div>
										<div class="col-lg-6">
											<select class="custom-select selectOptions" name="selectagent" id="selectagent">
												<option selected>โปรดเลือกตัวแทน</option>
												<?php foreach ($result_user as $key => $value) { 
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
									    		<input type="radio" name="radio_agent" id="agent2" value="input">
									    	</div>
									  	</div>
										<div class="col-lg-6">
											<input type="text" id="agent_name" name="agent_name" class="form-control" placeholder="โปรดระบุ" disabled="true">
										</div>
									</div>
                                    <input type="hidden" name="agent_id" class="form-control" value="999">
                                </div>
                            </div>
		                    <div class="form-group row">
		                        <label class="col-lg-3 text-lg-right control-label col-form-label">เลขที่กรมธรรม์</label>
		                        <div class="col-md-4 col-lg-3">
		                            <input type="text" class="form-control sumstock2" name="stock_start" id="stock_start2" placeholder="เริ่มต้น">
		                        </div>
		                        <label class="col-md-1 text-center control-label col-form-label">ถึง</label>
		                        <div class="col-md-4 col-lg-3">
		                            <input type="text" class="form-control sumstock2" name="stock_end" id="stock_end2" placeholder="สิ้นสุด">
		                        </div>
		                    </div>
		                    <div class="form-group row">
		                        <label for="name" class="col-lg-3 text-lg-right control-label col-form-label">จำนวน</label>
		                        <div class="col-lg-4">
		                            <div class="input-group">
								        <input type="number" name="total" id="total2" class="form-control">
								        <div class="input-group-prepend">
									        <div class="input-group-text">ชุด</i></div>
								        </div>
								    </div>
		                        </div>
		                    </div>
		                    <div class="row border-top justify-content-center">
		                    	<div class="col-lg-3 mt-3">
		                    		<button type="submit" name="submit_forms2" class="btn btn-success btn-lg btn-block">บันทึก</button>
		                    	</div>
		                        
		                    </div>
		                </div>
		            </form>
	            </div>
	        </div>
		</div>

		<div class="card">
			<a class="card-header link text-white bg-info" data-toggle="collapse" data-parent="#accordian-4" href="#forms-3" aria-expanded="false" aria-controls="forms-3">
	            <i class="seticon fa fa-arrow-right" aria-hidden="true"></i>
	            <span>ฟอร์มสต็อกรายวัน(ตัวแทนใช้)</span>
	        </a>
	        <div id="forms-3" class="collapse multi-collapse">
	            <div class="card-body widget-content">
	                <form class="form-horizontal" method="post" action="menu-stock/submitforms.php?forms=3">
		                <div class="card-body">
		                    <div class="form-group row">
		                        <label for="name" class="col-lg-3 text-lg-right control-label col-form-label">เลือกวันที่ออกกรมธรรม์</label>
		                        <div class="col-lg-6">
		                            <div class="input-group">
						                <div class="input-group-prepend">
									        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
								        </div>
								        <input type="text" name="select_date" class="form-control singledate">
								    </div>
		                        </div>
		                    </div>
							<div class="form-group row">
                                <label class="col-lg-3 text-lg-right control-label col-form-label">ประเภทที่เบิก</label>
                                <div class="col-lg-6">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="type2-3" name="select_type2" value="0" checked="true" required>
                                        <label class="custom-control-label" for="type2-3">พรบ.</label>
                                    </div>
                                     <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="type2-4" name="select_type2" value="1" required>
                                        <label class="custom-control-label" for="type2-4">สมัครใจ</label>
                                    </div>
                                </div>
                            </div>
		                    <div id="selectType4" class="form-group row">
                                <label class="col-lg-3 text-lg-right control-label col-form-label">ตัวแทน</label>                                
                                <div class="col-lg-6">
	                                <div class="input-group">
									  	<div class="col-lg-1 input-group-prepend">
									    	<div class="input-group-text">
									    		<input type="radio" name="radio_agent" id="agent11" checked="true" value="select">
									    	</div>
									  	</div>
										<div class="col-lg-6">
									  	<select class="custom-select selectOptions" name="selectagent" id="selectagent2">
		                                	<option selected>โปรดเลือกตัวแทน</option>
		                                	<?php foreach ($result_user as $key => $value) { 
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
									    		<input type="radio" name="radio_agent" id="agent22" value="input">
									    	</div>
									  	</div>
										<div class="col-lg-6">
											<input type="text" id="agent_name2" name="agent_name" class="form-control" placeholder="โปรดระบุ" disabled="true">
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
                                        <input type="radio" class="custom-control-input" id="status1" name="select_status" value="0" checked="true">
                                        <label class="custom-control-label" for="status1">ใช้งาน</label>
                                    </div>
								//-->
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="status2" name="select_status" value="1" >
                                        <label class="custom-control-label" for="status2">ส่งคืน</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="status3" name="select_status" value="2" >
                                        <label class="custom-control-label" for="status3">ชำรุด</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="status4" name="select_status" value="3" >
                                        <label class="custom-control-label" for="status4">สูญหาย</label>
                                    </div>
                                </div>
                            </div>
		                    <div class="form-group row">
		                        <label class="col-lg-3 text-lg-right control-label col-form-label">เลขที่กรมธรรม์</label>
		                        <div class="col-md-4 col-lg-3">
		                            <input type="text" class="form-control sumstock3" id="stock_start3" name="stock_start" placeholder="เริ่มต้น">
		                        </div>
		                        <label class="col-md-1 text-center control-label col-form-label">ถึง</label>
		                        <div class="col-md-4 col-lg-3">
		                            <input type="text" class="form-control sumstock3" id="stock_end3" name="stock_end" placeholder="สิ้นสุด">
		                        </div>
		                    </div>
		                    <div class="form-group row">
		                        <label class="col-lg-3 text-lg-right control-label col-form-label">จำนวน</label>
		                        <div class="col-lg-4">
		                            <div class="input-group">
								        <input type="number" name="total" id="total3" class="form-control">
								        <div class="input-group-prepend">
									        <div class="input-group-text">ชุด</i></div>
								        </div>
								    </div>
		                        </div>
		                    </div>
		                    <div class="row border-top justify-content-center">
		                    	<div class="col-lg-3 mt-3">
		                    		<button type="submit" name="submit_forms3" class="btn btn-success btn-lg btn-block">บันทึก</button>
		                    	</div>
		                        
		                    </div>
		                </div>
		            </form>
	            </div>
	        </div>
		</div>
		
	</div>
</div>