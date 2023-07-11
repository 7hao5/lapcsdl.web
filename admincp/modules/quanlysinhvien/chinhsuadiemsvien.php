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

// Xử lý khi giảng viên thực hiện chỉnh sửa điểm
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $student_id = $_POST["student_id5"];
    $exam_id = $_POST["exam_id5"];
    $new_score = $_POST["new_score5"];

    // Thực hiện truy vấn UPDATE để cập nhật điểm của sinh viên
    $sql = "UPDATE results
            SET result_score = '$new_score'
            WHERE result_student_id = '$student_id' AND result_exam_id = '$exam_id'";

    if (mysqli_query($conn, $sql)) {
        echo "Điểm của sinh viên đã được cập nhật thành công.";
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh Sửa Điểm Sinh Viên</title>
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
        padding: 55px;
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
        margin: 10px 0;
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
            <p>Editing Student Grades</p>

            <label for="student_id">Student ID:</label>
            <input type="text" name="student_id5" required placeholder="Student ID">
            <small class="error"></small>

            <label for="exam_id">Exam ID:</label>
            <input type="text" name="exam_id5" required placeholder="Exam_id">
            <small class="error"></small>

            <label for="new_score">New Grades</label>
            <input type="text" name="new_score5" required placeholder="Grades">
            <small class="error"></small>

            <div class="center">

                <input type="submit" name="submit" value="Cập Nhật Điểm">
                <p id="success"></p>
            </div>
            
    </form>
</div>

<!--
    <h2>Chỉnh Sửa Điểm Sinh Viên</h2>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="student_id">Mã sinh viên:</label>
        <input type="text" name="student_id5" required><br>

        <label for="exam_id">Mã bài thi:</label>
        <input type="text" name="exam_id5" required><br>

        <label for="new_score">Điểm mới:</label>
        <input type="text" name="new_score5" required><br>

        <input type="submit" name="submit" value="Cập Nhật Điểm">
    </form>
-->
</body>
</html>
