
<!DOCTYPE html>
<html>
<head>
    <title>Tra Cứu Sinh Viên</title>
</head>
<body>
                                        <!--bắt đầu css -->
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

</style>                               <!-- kết thúc css -->

<div id="overlay">
    <form class="boxchat" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <p>Seach student</p>

            <label for="student_id">Studen ID:</label>
            <input type="text" name="student_id" required placeholder="Student_id">
            <small class="error"></small>

            <div class="center">

                <input type="submit" name="submit" value="Seach">
                <p id="success"></p>
            </div>
            
    </form>
</div>


<!--
    <h2>Tra Cứu Sinh Viên</h2>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="student_id">Mã sinh viên:</label>
        <input type="text" name="student_id" required><br>

        <input type="submit" name="submit" value="Tra Cứu">
    </form>
-->
</body>
</html>

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

// Xử lý khi giảng viên tra cứu
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $student_id = $_POST["student_id"];

    // Thực hiện truy vấn SELECT để lấy thông tin sinh viên
    $sql_student = "SELECT * FROM students WHERE student_id = '$student_id'";
    $result_student = mysqli_query($conn, $sql_student);

    // Kiểm tra kết quả
    if (mysqli_num_rows($result_student) > 0) {
        // Hiển thị thông tin sinh viên
        $row_student = mysqli_fetch_assoc($result_student);
        echo "Mã sinh viên: " . $row_student['student_id'] . "<br>";
        echo "Họ tên: " . $row_student['student_name'] . "<br>";
        echo "Email: " . $row_student['student_email'] . "<br>";
        echo "Ngày sinh: " . $row_student['student_date_of_birth'] . "<br>";
        echo "Giới tính: " . $row_student['student_gender'] . "<br>";
        echo "Địa chỉ: " . $row_student['student_address'] . "<br>";

        // Thực hiện truy vấn SELECT để lấy điểm số môn học của sinh viên
        $sql_results = "SELECT exams.exam_name, results.result_score
                        FROM exams
                        INNER JOIN results ON exams.exam_id = results.result_exam_id
                        WHERE results.result_student_id = '$student_id'";
        $result_results = mysqli_query($conn, $sql_results);

        // Kiểm tra kết quả
        if (mysqli_num_rows($result_results) > 0) {
            // Hiển thị tên môn kèm điểm số
            while ($row_results = mysqli_fetch_assoc($result_results)) {
                echo "Môn học: " . $row_results['exam_name'] . ", Điểm số: " . $row_results['result_score'] . "<br>";
            }
        } else {
            echo "Không có thông tin điểm số môn học của sinh viên này.";
        }
    } else {
        echo "Không tìm thấy sinh viên với mã số: $student_id";
    }
}

mysqli_close($conn);
?>
