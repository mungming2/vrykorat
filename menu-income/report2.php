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
                        <label class="col-lg-3 text-lg-right control-label col-form-label">ค้นหา</label>
                        <div class="col-lg-6">
                           	<input type="text" name="search" id="search" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-lg-3 text-lg-right control-label col-form-label">เลือกวันที่</label>
                        <div class="col-lg-6">
                            <div class="input-group">
				                <div class="input-group-prepend">
							        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
						        </div>
						        <input type="text" name="select_date" class="form-control rangedate-clear" value="" autocomplete="off"> 
						    </div>
                        </div>
                    </div>
                    <div class="row border-top justify-content-center">
                    	<div class="col-lg-3 mt-3">
                    		<button type="button" name="submit_report_income2" id="submit_report_income2" class="btn btn-info btn-block">ออกรายงาน</button>
                    	</div>
                        
                    </div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-12" style="display: none;" id="showTable">
		<div class="card">
            <div class="card-body">
				<table id="report_income2" class="table table-striped table-bordered nowrap" style="width:100%;">
					<tfoot >
			            <tr>
			            	<th colspan="5"></th>
			                <th  style="text-align:right"><b>รวมเงิน:</b></th>
			                <th ></th>
							<th ></th>
			            </tr>
			        </tfoot>
				</table>
			</div>
		</div>
	</div>
</div>