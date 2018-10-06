<div style="display: none;">
<?php

include '../connect_db.php';
ob_start();
session_start();

    $form_type = $_GET['form_type'];
    $url = '';

    if($form_type == 3){ 
        $url = 'miscellany-report1';
        $sql_form = "DELETE FROM miscellany WHERE id = '".$_GET['id']."'";
    }else{
        $url = 'miscellany-report2';
        $sql_form = "DELETE FROM miscellany2 WHERE id = '".$_GET['id']."'";
    }
    $query_form = mysqli_query($conn,$sql_form);
    $errMsg = mysqli_error($conn);
    $sql_form1 = "DELETE FROM payment WHERE stock_id = '".$_GET['id']."'";
    $query_form1 = mysqli_query($conn,$sql_form1);
    $errMsg = mysqli_error($conn);
    echo "delete";

    if($query_form){
        echo "<meta http-equiv='refresh' content='0;url=../main.php?status=success&page=".$url."'>";
    }else{
        echo "<meta http-equiv='refresh' content='0;url=../main.php?page=".$url."&status=fail&msg=".$errMsg."'>";
    }


?>


</div>