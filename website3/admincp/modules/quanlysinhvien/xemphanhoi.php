<?php
// Kết nối database
$mysqli = new mysqli("localhost","root","","dbtest1");

// Xử lý khi giảng viên đánh dấu phản hồi đã hoàn thành
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["mark_completed"])) {
    $feedback_id = $_POST["feedback_id"];

    // Thực hiện truy vấn UPDATE để đánh dấu phản hồi đã hoàn thành
    $sql = "UPDATE feedbacks SET completed = 1 WHERE id = $feedback_id";
    if (mysqli_query($mysqli, $sql)) {
        echo "Phản hồi đã được đánh dấu hoàn thành.";
    } else {
        echo "Lỗi: " . mysqli_error($mysqli);
    }
}

// Truy vấn để lấy danh sách feedbacks
$sql = "SELECT * FROM feedbacks";
$result = mysqli_query($mysqli, $sql);

// Kiểm tra kết quả truy vấn

?>
<!DOCTYPE html>
<html>
<head>
    <title>trang giang vien</title>
</head>

<style>
    .wrapper{
        border: 1px solid #0000;
        height: 100%;
        width: 100%;
        color: black;
        background-color: rgb(255 255 255 / 24%);
        overflow: scroll;
        overflow-x: hidden;
        overflow-y: hidden;
        border-radius: 7px;
    }

    .wrapper #thongtin {
        margin-left: 12px;
        margin-top: 8px;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 90%;
        margin-top: 12px;
        margin-bottom: 4px;
        max-width: 150px;
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
        white-space: nowrap;
    }

</style>


<body>
    <div class="wrapper">
        <div>
            <?php
                if (mysqli_num_rows($result) <= 0){
                    echo "<p>Không có phản hồi từ sinh viên.</p>";
                }  else{
                ?>
                    <?php
                        $i=0;
                        while($row = mysqli_fetch_array($result)){
                            $i++;
                        ?>
                            <div id="thongtin">
                                <p>Student ID: <?php echo  $row["student_id"] ?></p>
                                <p>Feedback_id: <?php echo  $row["id"] ?></p>
                                <p>Content: <?php echo  $row["content"] ?></p>
                            <?php
                                if ($row["completed"] == 1) {
                                    echo "<p>Trạng thái: Hoàn thành</p>";
                                } else {
                                ?>
                                    <p>Trạng thái: Chưa phản hồi</p>

                                    <div class="container">
                                        <a href="index.php?quanly=tinnhan">Trả lời sinh viên</a>
                                    </div>
                                <?php
                                }
                            ?>
                            </div>
                            <hr>
                        <?php
                        }
                        ?>

                <?php
                }
                ?>
        </div>

    </div>
</body>
</html>
