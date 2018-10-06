<?php
    $sql_user = "SELECT no, agent_id, name, address, tel, insure, commision, rate, login_id, update_date FROM agent ORDER BY agent_id ASC";
    $query_user = mysqli_query($conn,$sql_user);
    $result_user = mysqli_fetch_all($query_user,MYSQLI_ASSOC);

?>

<div class="row">
	<div class="col-12">
		<div class="card">
            <div class="card-body">
				<table id="table_member" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>ลำดับ</th>
							<th>รหัสตัวแทน</th>
							<th>ชื่อ</th>
							<th>เงินค้ำประกัน</th>
							<th>คอมมิสชั่น</th>
							<th>หักค่าใช้จ่าย</th>
							<th>เพิ่มเติม</th>
						</tr>
					</thead>
					<tbody>
						 <?php foreach ($result_user as $key => $value) { ?>
		                    <tr>
		                        <td><?=$key+1?></td>
		                        <td><?=$value['agent_id']?></td>
		                        <td><?=$value['name']?></td>
		                        <td><?=$value['insure']?></td>
								<td><?=$value['commision']?></td>
								<td><?=$value['rate']?>%</td>
		                        <td class="d-flex justify-content-around">
		                        	<a href="?page=agent_info&agent_id=<?=$value['no']?>"><i class="fas fa-info-circle fa-2x text-info" data-toggle="tooltip" data-placement="top" title="ดูข้อมูลเพิ่มเติม"></i></a>
		                        	<a href="?page=agent_edit&agent_id=<?=$value['no']?>"><i class="far fa-edit fa-2x text-warning" data-toggle="tooltip" data-placement="top" title="แก้ไขข้อมูล"></i></a>
		                        	<a href="menu-agent/submitaddagent.php?action=delete&agent_id=<?=$value['no']?>" onclick="return confirm('คุณต้องการลบข้อมูลตัวแทน <?=$value['agent_id'].' '.$value['name']?> ใช่หรือไม่? ')"><i class="fas fa-trash-alt fa-2x text-danger" data-toggle="tooltip" data-placement="top" title="ลบข้อมูลตัวแทน"></i></a>
		                        </td>
		                    </tr>
		                <?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>