<?php
    $sql_user = "SELECT code, CONCAT(name,' ',surname) AS name FROM user_code";
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
						        <input type="text" name="select_date" class="form-control singledate">
						    </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 text-lg-right control-label col-form-label">ตัวแทน</label>
                        <div class="col-lg-6">
                            <select class="custom-select selectOptions" name="selectagent" id="selectagent">
                                <option value="all">ทั้งหมด</option>
                            	<?php foreach ($result_user as $key => $value) { 
                            		echo "<option value='".$value['code']."'>".$value['code']." - ".$value['name']."</option>";
                            	} ?>
                            </select>
                        </div>
                    </div>
                    <div class="row border-top justify-content-center">
                    	<div class="col-lg-3 mt-3">
                    		<button type="button" name="submit_report" id="submit_report6" class="btn btn-info btn-block">ออกรายงาน</button>
                    	</div>
                        
                    </div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-12" style="display: none;" id="showTable">
		<div class="card">
			<div class="card-body">
				<table id="table_report6" class="table table-striped table-bordered nowrap" style="width:100%;">
					<thead>
						<tr>
							<th>ลำดับ</th>
							<th>วันที่เบิก</th>
                            <th>กรมธรรม์ที่ยกมา</th>
							<th>จำนวน</th>
							<th>รายการตัวแทน</th>
                            <th>กรมธรรม์ขาย</th>
                            <th>จำนวนขาย</th>
                            <th>ยกเลิก</th>
                            <th>จำนวนคงเหลือ</th>
                            <th>เลขกรมธรรม์คงเหลือ</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>