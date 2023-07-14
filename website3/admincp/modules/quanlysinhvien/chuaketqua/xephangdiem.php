<?php
//  Tạo biến chứa câu truy vấn 
    $sql_danhsach_diemthi = "SELECT a.student_id,a.student_name,results.result_score,exam_name
    FROM students as a 
    JOIN results ON a.student_id= results.result_student_id
    JOIN exams ON exam_id = results.result_exam_id
    WHERE results.result_exam_id = '$examid'
    ORDER BY results.result_score DESC";

//  Tạo 1 biến chứa kết quả trả về 
    $query_danhsach_diemthi = mysqli_query($mysqli,$sql_danhsach_diemthi);
?>

<style>
    body {
        background: url('../../../img/anh2.jpg');
    }
    h1 {
        margin: 0;
        padding-bottom: 2px;
        text-align: center;
        color: rgb(13 116 116 / 95%);
    }
    .content-hr {
        width: 450;
        border: 1px solid black;
        margin: 0 auto;
        margin-bottom: 18px;
        color: rgb(13 116 116 / 95%);
    }
    .content-table{
        padding-top: 20px;
        border-collapse: collapse;
        margin: auto;
        font-size: 0.9em;
        width: 43%;
        min-width: 300px;
        border-radius: 5px 5px 0 0;
        overflow: hidden;
        box-shadow: 0 0  20px rbag(0, 0, 0, 0.15);
    }

    .content-table thead tr {
        background-color: rgb(13 116 116 / 95%);
        color: #ffffff;
        text-align: left;
        font-weight: bold;
    }

    .content-table th,
    .content-table td {
        padding: 12px 15px;
    }
    .content-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .content-table tbody tr:nth-of-type(even){
        background-color: #f3f3f3;
    }

    .content-table tbody tr:last-of-type {
        border-bottom: 2px solid rgb(13 116 116 / 95%);
    }

    .content-table tbody tr.active-row {
        font-weight: bold;
        color: rgb(13 116 116 / 95%);
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 30px;
        width: 90%;
        height: 20px;
        max-width: 86px;
        border: 1px solid #ccc;
        background: linear-gradient(to right, rgba(0, 242, 242, 0.755), rgb(70 5 43 / 76%));
        color: white;
        font-size: 17px;
        cursor: pointer;
        border-radius: 3px;
    }
    .container a{
        color: white;
        font-size: 12px;
    }

</style>

<body>
<h1>Danh sách điểm thi:</h1>
<hr class="content-hr">
    <table class="content-table" >
        <thead>
            <tr>
                <th>Rank</th>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Grades</th>
            </tr>
        </thead>
            <?php
            $i=0;
            while($row = mysqli_fetch_array($query_danhsach_diemthi)){
                $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['student_id'] ?></td>
                <td><?php echo $row['student_name'] ?></td>
                <td><?php echo $row['result_score'] ?></td>
            </tr>
            <?php
            }
            ?>
    </table>
    <div class="container">
        <a href="../../index.php?quanly=xemthongtinsv">Quay trở lại</a>
    </div>
</body>