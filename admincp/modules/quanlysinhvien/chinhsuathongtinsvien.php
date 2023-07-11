<?php
// Kết nối database
$db_server= "localhost";
$db_user="root";    
$db_pass="";
$db_name="dbtest1";
$conn="";
$conn = mysqli_connect($db_server,$db_user,$db_pass,$db_name);

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Xử lý khi giảng viên gửi yêu cầu sửa đổi
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $student_id = $_POST["student_id"];
    $student_name = $_POST["student_name"];
    $student_email = $_POST["student_email"];
    $student_date_of_birth = $_POST["student_date_of_birth"];
    $student_address = $_POST["student_address"];

    // Kiểm tra nếu có dữ liệu nhập vào
    if (!empty($student_name) || !empty($student_email) || !empty($student_date_of_birth) || !empty($student_address)) {
        // Xây dựng câu truy vấn UPDATE
        $sql = "UPDATE Students SET ";

        // Kiểm tra và thêm vào câu truy vấn các thông tin được cập nhật
        if (!empty($student_name)) {
            $sql .= "student_name = '$student_name', ";
        }

        if (!empty($student_email)) {
            $sql .= "student_email = '$student_email', ";
        }

        if (!empty($student_date_of_birth)) {
            $sql .= "student_date_of_birth = '$student_date_of_birth', ";
        }

        if (!empty($student_address)) {
            $sql .= "student_address = '$student_address', ";
        }

        // Loại bỏ dấu phẩy cuối cùng
        $sql = rtrim($sql, ", ");

        // Thêm điều kiện WHERE để chỉnh sửa sinh viên dựa trên student_id
        $sql .= "WHERE student_id = '$student_id'";

        // Thực thi truy vấn UPDATE để cập nhật thông tin sinh viên
        if (mysqli_query($conn, $sql)) {
            echo "Thông tin sinh viên đã được cập nhật thành công.";
        } else {
            echo "Lỗi: " . mysqli_error($conn);
        }
    } else {
        echo "Vui lòng nhập ít nhất một thông tin để cập nhật.";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sửa Đổi Thông Tin Sinh Viên</title>
</head>
<body>
<style>
    *{
        font-family: Arial;
    }
    body{
        margin: 0;
    }
    #overlay{
        width: 100%;
        height: 100%;
    }
    .boxchat {
        max-width: 500px;
        width: 90%;
        background: white;
        margin: 0 auto 0 auto;
        padding: 31px;
        border-radius: 3px;
        box-sizing: border-box;
        background-color: rgb(16 46 46 / 76%);
    }
    .boxchat p {
        font-size: 1.5rem;
    }
    h1{
        margin: 0;
        text-align: center;
    }
    label{
        display: block;
        margin: 6px 0;
    }

    input,textarea{

        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        outline: none;
        resize: none;
        border: none;
        border-bottom: 1px solid #D3D3D3;
        border-radius: 3px;
    }

    input[type="text"]:focus, textarea:focus {
        border-bottom: 1px solid red;
    }
    textarea::-webkit-scrollbar {
        width: 6px;
    }
    textarea::-webkit-scrollbar-thumb{
        background-color: rgb(15 55 55 / 76%);
    }
    input[type="submit"]{
        margin-top: 30px;
        width: 90%;
        max-width: 200px;
        background: linear-gradient(to right,rgba(0, 242, 242, 0.755),rgb(70 5 43 / 76%));
        color: white;
        font-size: 17px;
        cursor: pointer;
        border-radius: 3px;
    }
    .error {
        color: red;
    }
    .error-border {
        border-bottom: 1px solid red;
    }
    #success {
        color: red;
    }

</style>

    <div id="overlay">
        <form class="boxchat" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <p>Chỉnh sửa thông tin của sinh viên</p>

            <label for="student_id">Student ID:</label>
            <input type="text" name="student_id" required placeholder="Student ID">
            <small class="error"></small>

            <label for="student_name">Name:</label>
            <input type="text" name="student_name" required placeholder="Studnet Name">
            <small class="error"></small>

            <label for="student_email">Email:</label>
            <input type="email" name="student_email" required placeholder="@gmail.com">
            <small class="error"></small>

            <label for="student_date_of_birth">Date Birth:</label>
            <input type="date" name="student_date_of_birth">
            <small class="error"></small>

            <label for="student_address">Address:</label>
            <input type="text" name="student_address" required placeholder="Address">
            <small class="error"></small>

            <div class="center">
                <input type="submit" name="submit" value="Save">
                <p id="success"></p>
            </div>
            
        </form>
    </div>

<!--
    <h2>Modify Student Information</h2>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

        <label for="student_id">Mã sinh viên:</label>
        <input type="text" name="student_id" required><br>

        <label for="student_name">Tên sinh viên:</label>
        <input type="text" name="student_name"><br>

        <label for="student_email">Email sinh viên:</label>
        <input type="email" name="student_email"><br>

        <label for="student_date_of_birth">Ngày sinh:</label>
        <input type="date" name="student_date_of_birth"><br>

        <label for="student_address">Địa chỉ:</label>
        <input type="text" name="student_address"><br>

        <input type="submit" name="submit" value="Lưu Thay Đổi">
    </form>
-->
</body>
</html>