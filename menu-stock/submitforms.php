<?php

include '../connect_db.php';
ob_start();
session_start();

if($_GET['forms'] == 1){

	$select_date = $_POST['select_date'];
	$select_type = $_POST['select_type']; //0 พรบ , else 1 สมัครใจ
	$selecttype = $_POST['selecttype']; //สมัครใจ - 1 ประเภท 1-3, 2 ประเภท 4, 3 ประเภท 5
	$stock_start = $_POST['stock_start'];
	$stock_end = $_POST['stock_end'];
	$index_start = $_POST['index_start'];
	$index_end = $_POST['index_end'];
	$selectcode = $_POST['selectcode'];
	$total = $_POST['total'];
	
	$sql_check = "SELECT count(*) cnt FROM stock_main where ($stock_start BETWEEN stock_start AND stock_end) OR ($stock_end BETWEEN stock_start AND stock_end)";
		$query_check = mysqli_query($conn,$sql_check);
		$res_check = mysqli_fetch_array($query_check,MYSQLI_ASSOC);
		$cnt_check = $res_check['cnt'];

	if($cnt_check==0)
	{
		if($select_type==0){
			$sql_form = "INSERT INTO stock_main(datetime, type, stock_start, stock_end, index_start, index_end, stock_total, code, login_id) 
					VALUES ('$select_date','$select_type','$stock_start', '$stock_end', '$index_start', '$index_end', '$total',null,'".$_SESSION['mem_id']."')";
		}else{
			$sql_form = "INSERT INTO stock_main(datetime, type, stock_start, stock_end, index_start, index_end, stock_total, code, login_id) 
					VALUES ('$select_date','$selecttype',null, null, '$index_start', '$index_end', '$total','$selectcode','".$_SESSION['mem_id']."')";
		}
		$query_form = mysqli_query($conn,$sql_form);
		$errMsg = mysqli_error($conn);
	}else{
		$query_form = false;
		$errMsg = "เลขที่กรมธรรม์ " . $stock_start . " ถึง " . $stock_end . " มีเลขที่ได้ทำการเบิกมาแล้ว";
	}

	if($query_form){
		echo "<meta http-equiv='refresh' content='0;url=../main.php?status=success&page=forms'>";
	}else{
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=forms&status=fail&msg=".$errMsg."'>";
	}


}elseif($_GET['forms'] == 'edit1'){

	$select_date = $_POST['select_date'];
	$select_type = $_POST['select_type']; //0 พรบ , else 1 สมัครใจ
	$selecttype = $_POST['selecttype']; //สมัครใจ - 1 ประเภท 1-3, 2 ประเภท 4, 3 ประเภท 5
	$stock_start = $_POST['stock_start'];
	$stock_end = $_POST['stock_end'];
	$index_start = $_POST['index_start'];
	$index_end = $_POST['index_end'];
	
	$total = $_POST['total'];
	

	if($select_type == '0'){
		$cnt_check = 0;
		if($stock_start != '' && $stock_end != ''){
			if($stock_start > $stock_end){
				$errMsg = "เลขที่กรมธรรม์เริ่มต้นต้องมีค่าน้อยกว่าเลขกรมธรรม์สิ้นสุด ";
				echo "<meta http-equiv='refresh' content='0;url=../main.php?page=forms_edit&action=edit1&data=".$_GET['id']."&status=fail&msg=".$errMsg."'>";
				exit();
			}
			$sql_check = "SELECT id FROM stock_main WHERE ($stock_start BETWEEN stock_start AND stock_end) OR ($stock_end BETWEEN stock_start AND stock_end)";
			$query_check = mysqli_query($conn,$sql_check);
			$numrow = mysqli_num_rows($query_check);
			$res_check = mysqli_fetch_array($query_check,MYSQLI_ASSOC);
		}elseif($stock_start == '' && $stock_end != ''){
			$sql_check = "SELECT id FROM stock_main WHERE $stock_end BETWEEN stock_start AND stock_end";
			$query_check = mysqli_query($conn,$sql_check);
			$numrow = mysqli_num_rows($query_check);
			$res_check = mysqli_fetch_array($query_check,MYSQLI_ASSOC);
		}elseif($stock_start != '' && $stock_end == ''){
			$sql_check = "SELECT id FROM stock_main WHERE $stock_start BETWEEN stock_start AND stock_end";
			$query_check = mysqli_query($conn,$sql_check);
			$numrow = mysqli_num_rows($query_check);
			$res_check = mysqli_fetch_array($query_check,MYSQLI_ASSOC);
		}
		echo '<br>';

		if($numrow == 0 || $res_check['id'] == $_GET['id'])
		{
			$sql_form = "UPDATE stock_main 
					SET datetime='$select_date', type=0, stock_start='$stock_start', stock_end='$stock_end', index_start='$index_start', index_end='$index_end', stock_total='$total', code= null, login_id='".$_SESSION['mem_id']."' 
					WHERE id = '".$_GET['id']."'";
			$query_form = mysqli_query($conn,$sql_form);
			$errMsg = mysqli_error($conn);
		}else{
			$query_form = false;
			$errMsg = "เลขที่กรมธรรม์ " . $stock_start . " ถึง " . $stock_end . " มีเลขที่ได้ทำการเบิกมาแล้ว";
		}
		
	}else{
		$selectcode = $_POST['selectcode'];
		$sql_form = "UPDATE stock_main 
					SET datetime='$select_date', type='$selecttype', stock_start=NULL, stock_end= NULL, index_start='$index_start', index_end='$index_end', stock_total='$total', code='$selectcode', login_id='".$_SESSION['mem_id']."' 
					WHERE id = '".$_GET['id']."'";
		$query_form = mysqli_query($conn,$sql_form);
		$errMsg = mysqli_error($conn);
	}
	

	
	if($query_form){
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=forms_edit&action=edit1&data=".$_GET['id']."&status=success'>";
	}else{
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=forms_edit&action=edit1&data=".$_GET['id']."&status=fail&msg=".$errMsg."'>";
	}

}elseif($_GET['forms'] == 'delete1'){
	$sql_form = "DELETE FROM stock_main WHERE id = '".$_GET['id']."'";
	$query_form = mysqli_query($conn,$sql_form);
	$errMsg = mysqli_error($conn);
	echo "delete";
	if($query_form){
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=stock-report1&status=success'>";
	}else{
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=stock-report1&status=fail&msg=".$errMsg."'>";
	}

}
elseif ($_GET['forms'] == 2) {
	$select_date = $_POST['select_date'];
	$select_type = $_POST['select_type'];

	if($_POST['radio_agent'] == 'select'){
		$select_agent = $_POST['selectagent'];

		$sql_agent = "SELECT agent_id,name FROM agent WHERE agent_id = '$select_agent'";
		$query_agent = mysqli_query($conn,$sql_agent);
		$res_agent = mysqli_fetch_array($query_agent,MYSQLI_ASSOC);

		$agent_id = $res_agent['agent_id'];
		$agent_name = $res_agent['name'];

	}else{
		$agent_id = 'ไม่มี';
		$agent_name = $_POST['agent_name'];
	}

	$stock_start = $_POST['stock_start'];
	$stock_end = $_POST['stock_end'];
	$total = $_POST['total'];

	$sql_form = "INSERT INTO stock_request(datetime,agent_id, agent_name, stock_start, stock_end, stock_total, type, login_id) 
				VALUES ('$select_date','$agent_id','$agent_name','$stock_start', '$stock_end', '$total','$select_type','".$_SESSION['mem_id']."')";
	$query_form = mysqli_query($conn,$sql_form);
	$errMsg = mysqli_error($conn);

	if($query_form){
		echo "<meta http-equiv='refresh' content='0;url=../main.php?status=success&page=forms'>";
	}else{
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=forms&status=fail&msg=".$errMsg."'>";
	}


}elseif($_GET['forms'] == 'edit2'){

	$select_date = $_POST['select_date'];
	$select_type = $_POST['select_type'];

	if($_POST['radio_agent'] == 'select'){
		$select_agent = $_POST['selectagent'];

		$sql_agent = "SELECT agent_id,name FROM agent WHERE agent_id = '$select_agent'";
		$query_agent = mysqli_query($conn,$sql_agent);
		$res_agent = mysqli_fetch_array($query_agent,MYSQLI_ASSOC);

		$agent_id = $res_agent['agent_id'];
		$agent_name = $res_agent['name'];

	}else{
		$agent_id = 'ไม่มี';
		$agent_name = $_POST['agent_name'];
	}

	$stock_start = $_POST['stock_start'];
	$stock_end = $_POST['stock_end'];
	$total = $_POST['total'];

	$sql_form = "UPDATE stock_request SET datetime='$select_date',agent_id='$agent_id',agent_name='$agent_name',stock_start='$stock_start',stock_end='$stock_end',stock_total='$total',type='$select_type',login_id='".$_SESSION['mem_id']."' WHERE id = '".$_GET['id']."'";
	$query_form = mysqli_query($conn,$sql_form);
	$errMsg = mysqli_error($conn);
	if($query_form){
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=forms_edit&action=edit2&data=".$_GET['id']."&status=success'>";
	}else{
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=forms_edit&action=edit2&data=".$_GET['id']."&status=fail&msg=".$errMsg."'>";
	}

}elseif($_GET['forms'] == 'delete2'){
	$sql_form = "DELETE FROM stock_request WHERE id = '".$_GET['id']."'";
	$query_form = mysqli_query($conn,$sql_form);
	$errMsg = mysqli_error($conn);
	echo "delete";
	if($query_form){
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=stock-report2&status=success'>";
	}else{
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=stock-report2&status=fail&msg=".$errMsg."'>";
	}

}elseif ($_GET['forms'] == 3) {
	$select_date = $_POST['select_date'];
	$select_status = $_POST['select_status'];

	if($_POST['radio_agent'] == 'select'){
		$select_agent = $_POST['selectagent'];

		$sql_agent = "SELECT agent_id,name FROM agent WHERE agent_id = '$select_agent'";
		$query_agent = mysqli_query($conn,$sql_agent);
		$res_agent = mysqli_fetch_array($query_agent,MYSQLI_ASSOC);

		$agent_id = $res_agent['agent_id'];
		$agent_name = $res_agent['name'];

	}else{
		$agent_id = 'ไม่มี';
		$agent_name = $_POST['agent_name'];
	}
	$stock_start = $_POST['stock_start'];
	$stock_end = $_POST['stock_end'];
	$total = $_POST['total'];

	$sql_form = "INSERT INTO stock_use(datetime, agent_id, agent_name, stock_start, stock_end, stock_total, status, login_id)
				VALUES ('$select_date','$agent_id', '$agent_name','$stock_start', '$stock_end', '$total','$select_status','".$_SESSION['mem_id']."')";
	$query_form = mysqli_query($conn,$sql_form);
	$errMsg = mysqli_error($conn);

	if($query_form){
		echo "<meta http-equiv='refresh' content='0;url=../main.php?status=success&page=forms'>";
	}else{
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=forms&status=fail&msg=".$errMsg."'>";
	}
}elseif($_GET['forms'] == 'edit3'){
	$select_date = $_POST['select_date'];
	$select_status = $_POST['select_status'];

	if($_POST['radio_agent'] == 'select'){
		$select_agent = $_POST['selectagent'];

		$sql_agent = "SELECT agent_id,name FROM agent WHERE agent_id = '$select_agent'";
		$query_agent = mysqli_query($conn,$sql_agent);
		$res_agent = mysqli_fetch_array($query_agent,MYSQLI_ASSOC);

		$agent_id = $res_agent['agent_id'];
		$agent_name = $res_agent['name'];

	}else{
		$agent_id = 'ไม่มี';
		$agent_name = $_POST['agent_name'];
	}
	$stock_start = $_POST['stock_start'];
	$stock_end = $_POST['stock_end'];
	$total = $_POST['total'];

	$sql_form = "UPDATE stock_use SET datetime ='$select_date', agent_id ='$agent_id', agent_name ='$agent_name', stock_start ='$stock_start', stock_end ='$stock_end', stock_total ='$total', status ='$select_status', login_id ='".$_SESSION['mem_id']."' WHERE id = '".$_GET['id']."'";
	$query_form = mysqli_query($conn,$sql_form);
	$errMsg = mysqli_error($conn);

	if($query_form){
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=forms_edit&action=edit3&data=".$_GET['id']."&status=success'>";
	}else{
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=forms_edit&action=edit3&data=".$_GET['id']."&status=fail&msg=".$errMsg."'>";
	}

}elseif($_GET['forms'] == 'delete3'){
	$sql_form = "DELETE FROM stock_use WHERE id = '".$_GET['id']."'";
	$query_form = mysqli_query($conn,$sql_form);
	$errMsg = mysqli_error($conn);
	echo "delete";
	if($query_form){
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=stock-report3&status=success'>";
	}else{
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=stock-report3&status=fail&msg=".$errMsg."'>";
	}
}



?>