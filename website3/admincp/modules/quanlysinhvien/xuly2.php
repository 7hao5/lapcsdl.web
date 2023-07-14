<?php
    // file conffig dùng để kết nói với myadmin
    include('../../config/conffig.php');

    //nếu click vào submit thì thực hiện setup điểm
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_2"])) {
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
            mysqli_query($mysqli, $sql);
            header('Location:../../index.php?quanly=suatt');
    }
}
?>