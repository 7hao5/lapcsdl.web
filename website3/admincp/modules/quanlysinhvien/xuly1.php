<?php
    // file conffig dùng để kết nói với myadmin
    include('../../config/conffig.php');

    $studentid = $_POST['student_id5'];     
    $examid = $_POST['exam_id5'];
    $newGrades = $_POST['new_score5'];
    //nếu click vào submit thì thực hiện setup điểm
    if(isset($_POST['submit_1'])){
    
        $sql_suadiem = "UPDATE results
                        SET result_score = '$newGrades'
                        WHERE result_student_id = '$studentid' AND result_exam_id = '$examid'";

        // kết nối với cơ sở dữ liệu (mysql là tên của cơ sở dữ liệu)
        mysqli_query($mysqli,$sql_suadiem); 

        //quay trở lại trang edit grades
        header('Location:../../index.php?quanly=suadiem');
    }
?>