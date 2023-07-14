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
    <form class="boxchat" method="POST" action="modules/quanlysinhvien/xuly1.php">
            <h1>Edit Student Grades</h1>

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

                <input type="submit" name="submit_1" value="Cập Nhật Điểm">
                <p id="success"></p>
            </div>
            
    </form>
</div>
</body>
</html>
