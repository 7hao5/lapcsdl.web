<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" type="text/css"  href="css/reset.css">
    <link rel="stylesheet" type="text/css"  href="css/app.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title>Form login unitop.vn</title>

</head>

<body>
    <div id="wrapper">
        <form action="dangnhap.php" method="post">
        <div id="form-login">
            <h1 class="form-heading">Sign in</h1>
            <div class="form-group">
                <i class="far fa-user" ></i>
                <input type="text" class="form-input" name="username" placeholder="User name">
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" class="form-input" name="password" placeholder="Password">
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            <input type="submit" name="Đăng nhập" value="Đăng nhập" class="form-submit">
        </div>
        </form>
    </div>
    
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="js/js.js"></script>
</html>

<?php
    $db_server= "localhost";
    $db_user="root";    
    $db_pass="";
    $db_name="dbtest1";
    $conn="";
    $conn = mysqli_connect($db_server,$db_user,$db_pass,$db_name);
           $username=$_POST["username"];
           $password=$_POST["password"];
           $sql = "SELECT * FROM Students WHERE student_id = '$username' AND student_password = '$password'";
           $result = mysqli_query($conn, $sql);
           // Kiểm tra kết quả
           if (mysqli_num_rows($result) > 0) {
            session_start();
            $_SESSION['user_id'] = $username;
            header('Location: index.php');
           }
           if ($username=="admin"&&$password=="1") {
            header('Location: index.php');
            exit();
           } 
           else {
               echo "sai ten dang nhap hoac mat khau";
           }         
?>