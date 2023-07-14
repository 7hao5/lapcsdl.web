<?php
        // Thực hiện truy vấn SELECT để lấy thông tin sinh viên
        $sql_student = "SELECT * FROM students WHERE student_id = '$student_id'";
        $result_student = mysqli_query($mysqli, $sql_student);

                // Kiểm tra kết quả
                if (mysqli_num_rows($result_student) > 0) {
                    // Gán kết quả truy vấn vào trong row_students
                    $row_student = mysqli_fetch_array($result_student);

                    // Thực hiện truy vấn SELECT để lấy tên các môn học của sinh viên
                    $sql_results_tenMH = "SELECT exams.exam_name
                                    FROM exams
                                    INNER JOIN results ON exams.exam_id = results.result_exam_id
                                    WHERE results.result_student_id = '$student_id'";
                    // Thực hiện truy vấn lấy diểm tương ứng của các môn học 
                    $sql_results_diem = "SELECT results.result_score
                                    FROM exams
                                    INNER JOIN results ON exams.exam_id = results.result_exam_id
                                    WHERE results.result_student_id = '$student_id'";

                    $result_results_tenMH = mysqli_query($mysqli, $sql_results_tenMH);
                    $result_results_diem = mysqli_query($mysqli, $sql_results_diem);

                    // Kiểm tra kết quả
                    if (mysqli_num_rows($result_results_tenMH) > 0) {

                        // Gán kết quả truy vấn vào trong row_results
                        //$row_results_tenMH = mysqli_fetch_array($result_results_tenMH);
                        //$row_results_diem = mysqli_fetch_array($result_results_diem);

                    } else {

                        // Nếu không tìm thấy kết quả truy vấn gán giá trị NULL cho row_results
                        $row_results_tenMH = '';
                        $row_results_diem = '';
                    }
                } else {

                    // Nếu không tìm thấy sinh viên tự động quay trở lại trang tìm kiếm 
                    header('Location:../../index.php?quanly=xemthongtinsv');
                }
?>

<style>
    a {
        margin: 0;
        text-align: center;
        color: rgb(13 116 116 / 95%);
    }
    .content-table{
        border-collapse: collapse;
        margin: auto;
        font-size: 0.9em;
        width: 83%;
        min-width: 300px;
        border-radius: 5px 5px 0 0;
        overflow: hidden;
        box-shadow: 0 0  20px black;
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
        white-space: nowrap;
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
        max-width: 83px;
        height: 20px;
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
    <table class="content-table">
        <thead>
            <tr>
                <th>StudentID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date</th>
                <th>Gender</th>
                <th>Address</th>
                <?php
                    $i=0;
                    while($row_results_tenMH = mysqli_fetch_array($result_results_tenMH)){
                        $i++;
                    ?>
                        <th><?php echo $row_results_tenMH['exam_name'] ?></th>
                    <?php
                    }
                    ?>
            </tr>
        </thead>
        <tr>
                    <td><?php echo $row_student['student_id'] ?></td>
                    <td><?php echo $row_student['student_name'] ?></td>
                    <td><?php echo $row_student['student_email'] ?></td>
                    <td><?php echo $row_student['student_date_of_birth'] ?></td>
                    <td><?php echo $row_student['student_gender'] ?></td>
                    <td><?php echo $row_student['student_address'] ?></td>
            <?php
                $i=0;
                while($row_results_diem = mysqli_fetch_array($result_results_diem)){
                    $i++;
                ?>
                    <td><?php echo $row_results_diem['result_score'] ?></td>
                <?php
                }
            ?> 
        </tr>
    </table> 
    <div class="container">
        <a href="../../index.php?quanly=xemthongtinsv">Quay trở lại</a>
    </div>
</body>