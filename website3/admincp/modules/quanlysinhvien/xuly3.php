<?php

// Kết nối database
include('../../config/conffig.php');

// Xử lý khi giảng viên gửi lại lời nhắn
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_3"])) {
    $student_id = $_POST["student_id"];
    $feedback_id = $_POST["feedback_id"];
    $message = $_POST["message"];

    // Kiểm tra nếu có dữ liệu lời nhắn
    if (!empty($message)) {
        // Thực hiện truy vấn UPDATE để cập nhật lời nhắn cho sinh viên tương ứng
        $sql = "UPDATE feedbacks SET message = '$message', completed = '1' WHERE student_id = '$student_id' AND id = '$feedback_id'";

        if (mysqli_query($mysqli, $sql)) {
            header('Location:../../index.php?quanly=tinnhan');
        } else {
            echo "Lỗi: ";
        }
    }else {
        echo "Vui lòng nhập nội dung lời nhắn.";
    }
}
?>