<div style="display: none;">
<?php

include '../connect_db.php';
ob_start();
session_start();

    $form_type = $_GET['type'];
    $url = '';

    if($form_type == 1){ 
        $url = 'income-report1';
        $sql_form = "DELETE FROM income WHERE id = '".$_GET['id']."'";
    }elseif($form_type == 2){ 
        $url = 'income-report2';
        $sql_form = "DELETE FROM income WHERE id = '".$_GET['id']."'";
    }else{
        $url = 'income-report3';
        $sql_form = "DELETE FROM cheque WHERE id = '".$_GET['id']."'";
    }
    $query_form = mysqli_query($conn,$sql_form);
    $errMsg = mysqli_error($conn);
    echo "delete";

    if($query_form){
        echo "<meta http-equiv='refresh' content='0;url=../main.php?status=success&page=".$url."'>";
    }else{
        echo "<meta http-equiv='refresh' content='0;url=../main.php?page=".$url."&status=fail&msg=".$errMsg."'>";
    }


?>


</div>