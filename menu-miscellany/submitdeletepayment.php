<div style="display: none;">

<?php 

include '../connect_db.php';
ob_start();
session_start();

    echo "<br>stock_id = ".$stock_id = $_GET['stock_id'];
	echo "<br>count = ".$count = $_GET['count'];
    echo "<br>form = ".$form = $_GET['form'];
    
    if($form == 3){
        $getAction = 1;
    }else{
        $getAction = 2;
    }

	$sql_del = "DELETE FROM payment WHERE count = '$count' AND stock_id = '$stock_id'";
	$query_del = mysqli_query($conn,$sql_del);
	echo $errMsg = mysqli_error($conn);

	if($query_del){	
		echo "pass";
		echo "<meta http-equiv='refresh' content='0;url=../main.php?status=success&page=miscellany-edit".$getAction."&search=".$stock_id."'>";
	}else{	
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=miscellany-edit".$getAction."&status=fail&msg=".$errMsg."&search=".$stock_id."'>";
	}

?>
</div>