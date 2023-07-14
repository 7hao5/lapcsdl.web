<?php
    // file conffig dùng để kết nói với myadmin
    include('../../config/conffig.php');

    $student_id = $_POST["student_id"];
    //nếu click vào thif chuyển đến thongtíninhvien.php để hiển thị kết quả 
    if(isset($_POST['submit_4'])){
        include('chuaketqua/thongtinsinhvien.php');
    }
?>


