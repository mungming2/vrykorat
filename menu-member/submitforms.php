
<div style="display: none;">
<?php

include '../connect_db.php';
ob_start();
session_start();

if($_GET['forms'] == 'add'){

    echo "<br>mem_username = ".$mem_username = $_POST['mem_username'];
    echo "<br>mem_password = ".$mem_password = md5($_POST['mem_password']);
    echo "<br>mem_name = ".$mem_name = $_POST['mem_name'];
    echo "<br>mem_policy = ".$mem_policy = implode(',',$_POST['select_menu']);
    echo $sql_form = "INSERT INTO member(mem_username, mem_password, mem_name, mem_policy) VALUES ('$mem_username', '$mem_password', '$mem_name', '$mem_policy')";

    $query_form = mysqli_query($conn,$sql_form);
    echo $errMsg = mysqli_errno ($conn);
    
    if($errMsg == 1062){
        echo $errMsg = 'ชื่อผู้ใช้ซ้ำ';
    }else{
        echo $errMsg = mysqli_error($conn);
    }
    echo "<br>";

	if($query_form){	
		echo "<meta http-equiv='refresh' content='0;url=../main.php?status=success&page=member_add'>";
	}else{	
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=member_add&status=fail&msg=".$errMsg."'>";
	}

}elseif($_GET['forms'] == 'edit'){
    echo "<br>mem_username = ".$mem_username = $_POST['mem_username'];
    echo "<br>mem_name = ".$mem_name = $_POST['mem_name'];
    echo "<br>mem_policy = ".$mem_policy = implode(',',$_POST['select_menu']);
    echo $sql_form = "UPDATE member SET mem_name='$mem_name',mem_policy='$mem_policy' WHERE mem_username = '$mem_username'";

    $query_form = mysqli_query($conn,$sql_form);
    echo $errMsg = mysqli_errno ($conn);
    echo $errMsg = mysqli_error($conn);
    echo "<br>";

	if($query_form){	
		echo "<meta http-equiv='refresh' content='0;url=../main.php?status=success&page=member_list'>";
	}else{	
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=member_list&status=fail&msg=".$errMsg."'>";
	}

}elseif($_GET['forms'] == 'delete'){
    echo "<br>mem_username = ".$mem_username = $_GET['mem_username'];
    echo $sql_form = "DELETE FROM member WHERE mem_username = '$mem_username'";

    $query_form = mysqli_query($conn,$sql_form);
    echo $errMsg = mysqli_errno ($conn);
    echo $errMsg = mysqli_error($conn);
    echo "<br>";

	if($query_form){	
		echo "<meta http-equiv='refresh' content='0;url=../main.php?status=success&page=member_list'>";
	}else{	
		echo "<meta http-equiv='refresh' content='0;url=../main.php?page=member_list&status=fail&msg=".$errMsg."'>";
	}
}


?>

</div>