<?php
    include('../../config/conffig.php');

    $examid = $_POST['exam_id']; 
    
    //nếu click vào submit thì thực hiện setup điểm
    if(isset($_POST['submit_6'])){
        include('chuaketqua/xephangdiem.php');
    }
?>
