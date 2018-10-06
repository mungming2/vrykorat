<?php

error_reporting(0);
ob_start();
session_start();

?>
<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="matrix-admin/assets/images/favicon.png">
    <title>LOGIN</title>
    <!-- Custom CSS -->
    <link href="matrix-admin/dist/css/style.min.css" rel="stylesheet">

    <style type="text/css">
        body{
            background-image: linear-gradient(0deg, #231853, #375082, #438bb4, #45cbe9);
            /* Full height */
            height: 100%; 

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

        }


    </style>

</head>

<body>

    <div class="main-wrapper" style="z-index: 9;">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center ">
            <div class="auth-box shadow-lg rounded" style="background-color: #bbbec19e;">
                <div id="loginform" align="center">
                    <img src="matrix-admin/assets/images/users/1.jpg" alt="user" width="100" class="rounded-circle">
                    <!--<div class="text-dark p-t-20 p-b-20">
                        <h2>ยินดีต้อนรับ</h2>
                    </div>
                     Form -->
                    <form class="form-horizontal m-t-10 p-l-30 p-r-30" method="post">
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" placeholder="ชื่อผู้ใช้" aria-label="Username" name="username" aria-describedby="basic-addon1" required="" autofocus="true">
                            </div>
                            <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" placeholder="รหัสผ่าน" aria-label="Password" name="password" aria-describedby="basic-addon1" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="p-t-10">
                                        <button class="btn btn-info btn-lg btn-block" type="submit" name="submit">เข้าสู่ระบบ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="matrix-admin/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="matrix-admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="matrix-admin/assets/libs/bootstrap-notify.js"></script>
    <script src="matrix-admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>

    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();

    function user_error() {
        $.notify({
            title: '<h4><strong>การเข้าสู่ระบบล้มเหลว</strong></h4>',
            message: 'กรุณาตรวจสอบชื่อผู้ใช้ หรือรหัสผ่านของท่านอีกครั้ง'
        },{
            type: 'danger',
            placement: {
                from: "top",
                align: "center"
            }
        });
    }

    </script>

</body>

</html>

<?php

include 'connect_db.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT mem_id,mem_username,mem_policy FROM member WHERE mem_username = '$username' AND mem_password = '$password'";
    $query = mysqli_query($conn,$sql);
    $check_user = mysqli_num_rows($query);
    $result = mysqli_fetch_array($query,MYSQLI_ASSOC);

    $get_menu = explode(',',$result['mem_policy']); 

    if($check_user == 1){
        $_SESSION['username'] = $username;
        $_SESSION['mem_id'] = $result['mem_id'];
        $_SESSION['get_menu'] = $get_menu;
        header("Location:main.php?page=stock-forms");

    }else{
        echo "<script>user_error();</script>";
    }

}


?>
