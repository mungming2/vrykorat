<?php
    $sql_user = "SELECT agent_id, name FROM agent ORDER BY agent_id ASC";
    $query_user = mysqli_query($conn,$sql_user);
    $result_user = mysqli_fetch_all($query_user,MYSQLI_ASSOC);

?>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form class="form-horizontal" method="post" id="form_report" >
					<div class="form-group row">
                        <label for="name" class="col-lg-3 text-lg-right control-label col-form-label">เลือกวันที่</label>
                        <div class="col-lg-6">
                            <div class="input-group">
				                <div class="input-group-prepend">
							        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
						        </div>
						        <input type="text" name="select_date" class="form-control rangedate">
						    </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 text-lg-right control-label col-form-label">ตัวแทน</label>
                        <div class="col-lg-6">
                            <select class="custom-select selectOptions" name="selectagent" id="selectagent">
                            	<option value="all" selected >ไม่ระบุ</option>
                            	<?php foreach ($result_user as $key => $value) { 
                            		echo "<option value='".$value['agent_id']."'>".$value['agent_id']." - ".$value['name']."</option>";
                            	} ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 text-lg-right control-label col-form-label">สถานะเบิก</label>
                        <div class="col-lg-4">
                            <select class="form-control" name="status">
                            	<option value="all">ทั้งหมด</option>
                            	<option value="0">ใช้งาน</option>
                            	<option value="1">ส่งคืน</option>
                            	<option value="2">ชำรุด</option>
                            	<option value="3">สูญหาย</option>
                            </select>
                        </div>
                    </div>
                    <div class="row border-top justify-content-center">
                    	<div class="col-lg-3 mt-3">
                    		<button type="button" name="submit_report1" id="submit_report3" class="btn btn-info btn-block">ออกรายงาน</button>
                    	</div>
                        
                    </div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-12" style="display: none;" id="showTable">
		<div class="card">
			<div class="card-body">
				<table id="table_report3" class="table table-striped table-bordered" style="width:100%;">
					<thead>
						<tr>
							<th>ลำดับ</th>
							<th>วันที่บันทึก</th>
							<th>วันที่เบิก</th>
							<th>รหัสตัวแทน</th>
                            <th>ชื่อตัวแทน</th>
							<th>สถานะเบิก</th>
							<th>เลขที่กรมธรรม์</th>
							<th>จำนวน</th>
                            <th>แก้ไข / ลบ</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>