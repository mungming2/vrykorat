<?php if(isset($_GET['status']) && $_GET['status'] == 'success'){ ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
	  	<strong>บันทึกแบบฟอร์มสำเร็จ !</strong> 
	  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    	<span aria-hidden="true">&times;</span>
	  	</button>
	</div>
<?php }else if(isset($_GET['status']) && $_GET['status'] == 'fail'){ ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
	  	<strong>บันทึกแบบฟอร์มไม่สำเร็จ !</strong> กรุณาลองอีกครั้ง <?='สาเหตุ : ' . $_GET['msg']?>
	  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    	<span aria-hidden="true">&times;</span>
	  	</button>
	</div>
<?php } ?>
<?php
    $sql_user = "SELECT mem_name,mem_username,mem_policy FROM member";
    $query_user = mysqli_query($conn,$sql_user);
	$result_user = mysqli_fetch_all($query_user,MYSQLI_ASSOC);
	$mem_policy = '';
	
?>

<div class="row">
	<div class="col-12">
		<div class="card">
            <div class="card-body">
				<table id="table_member" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>ลำดับ</th>
							<th>ชื่อ</th>
							<th>ชื่อผู้ใช้</th>
							<th style="max-width:40%;">สิทธิ์การเข้าถึง</th>
							<th>เพิ่มเติม</th>
						</tr>
					</thead>
					<tbody>
						 <?php foreach ($result_user as $key => $value) { 
							 $mem_policy = $value['mem_policy'];
							 $mem_policy = str_replace("1","ข้อมูลสต็อก",$mem_policy);
							 $mem_policy = str_replace("2","งานรับประกัน",$mem_policy);
							 $mem_policy = str_replace("3","เบ็ดเตล็ด",$mem_policy);
							 $mem_policy = str_replace("4","รับบริการต่อทะเบียน",$mem_policy);
							 $mem_policy = str_replace("5","รายงานอื่นๆ",$mem_policy);
							 $mem_policy = str_replace("6","พิมพ์เอกสาร",$mem_policy);
							 $mem_policy = str_replace("7","สำนักงาน",$mem_policy);
							 $mem_policy = str_replace("8","ตัวแทน",$mem_policy);
							 $mem_policy = str_replace("9","การจัดการสมาชิก",$mem_policy);
							 ?>
						 
		                    <tr>
		                        <td><?=$key+1?></td>
		                        <td><?=$value['mem_name']?></td>
		                        <td><?=$value['mem_username']?></td>
		                        <td><?=$mem_policy?></td>
		                        <td>
								<a href="?page=member-edit&mem_username=<?=$value['mem_username']?>"><i class="far fa-edit fa-2x pr-2 text-warning" data-toggle="tooltip" data-placement="top" title="แก้ไขข้อมูล"></i></a>
								<a href="menu-member/submitforms.php?forms=delete&mem_username=<?=$value['mem_username']?>" onclick="return confirm('คุณต้องการลบข้อมูลผู้ใช้ชื่อ <?=$value['mem_username']?> ใช่หรือไม่')"><i class="fas fa-trash-alt fa-2x text-danger" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล"></i></a>
								</td>
		                    </tr>
		                <?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>