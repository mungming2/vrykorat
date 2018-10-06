<?php
    $sql_user = "SELECT mem_id, mem_name FROM member ORDER BY mem_id ASC";
    $query_user = mysqli_query($conn,$sql_user);
    $result_user = mysqli_fetch_all($query_user,MYSQLI_ASSOC);

?>
<div class="row">
	<div class="col-12">
		<?php if(isset($_GET['status']) && $_GET['status'] == 'success'){ ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
			  	<strong>ลบแบบฟอร์มสำเร็จ !</strong> 
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    	<span aria-hidden="true">&times;</span>
			  	</button>
			</div>
		<?php }else if(isset($_GET['status']) && $_GET['status'] == 'fail'){ ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  	<strong>ลบแบบฟอร์มไม่สำเร็จ !</strong> กรุณาลองอีกครั้ง <?='Cause : ' . $_GET['msg']?>
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    	<span aria-hidden="true">&times;</span>
			  	</button>
			</div>
		<?php } ?>
		<div class="card">
			<div class="card-body">
				<form class="form-horizontal" method="post" id="form_report" >
					<div class="form-group row">
                        <label for="name" class="col-lg-3 text-lg-right control-label col-form-label">ระบุปี</label>
                        <div class="col-lg-6">
						        <input type="text" name="select_year" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 text-lg-right control-label col-form-label">ประเภทที่เบิก</label>
                        <div class="col-lg-4">
                            <select class="form-control" name="type">
                            	<option value="0">พรบ.</option>
                            	<option value="1">สมัครใจ</option>
                            </select>
                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-lg-3 text-lg-right control-label col-form-label">ผู้รับเข้าระบบ</label>
                        <div class="col-lg-6">
                            <select class="custom-select selectOptions" name="selectagent" id="selectagent">
                            	<?php foreach ($result_user as $key => $value) { 
                            		echo "<option value='".$value['mem_id']."'>".$value['mem_name']."</option>";
                            	} ?>
                            </select>
                        </div>
                    </div>
                    <div class="row border-top justify-content-center">
                    	<div class="col-lg-3 mt-3">
                    		<button type="button" name="submit_report4" id="submit_report4" class="btn btn-info btn-block">ออกรายงาน</button>
                    	</div>
                        
                    </div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-12" style="display: none;" id="showTable">
		<div class="card">
			<div class="card-body">
				<table id="table_report4" class="table table-striped table-bordered no-wrap" style="width:100%;">
					<thead>
						<tr>
							<th>ลำดับ</th>
							<th>วันที่เบิก</th>
							<th>เลขกรมธรรม์เริ่มต้น</th>
							<th>เลขกรมธรรม์สิ้นสุด</th>
							<th>เลขที่เอกสาร</th>
							<th>จำนวนเบิก</th>
							<th>ผู้เบิก</th>
							<th>ใช้ไป</th>
							<th>ยกเลิก</th>
							<th>ส่งคืน</th>
							<th>คงเหลือ</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>