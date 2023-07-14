<!DOCTYPE html>
<html>
<head>
    <title>Phản hồi sinh viên</title>
    <link rel="stylesheet" href="jss/nhansv.css">
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
        padding-top: 35px;
        padding-left: 55px;
        padding-right: 55px;
        padding-bottom: 10px;
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
        color: green;
    }

</style>

    <div id="overlay">
    <form class="boxchat" method="POST" action="modules/quanlysinhvien/xuly3.php">
            <h1>Reply to a student</h1>

            <label for="student_id">Student ID:</label>
            <input type="text" name="student_id" required placeholder="Student ID">
            <small class="error"></small>

            <label for="feedback_id">Feedback_id:</label>
            <input type="text" name="feedback_id" required placeholder="feedback_id"><br>
            <small class="error"></small>
            
            <label for="message">Message:</label>
            <textarea name="message"require placeholder="Your message" rows="6"></textarea>
            <small class="error"></small>

            <div class="center">

                <input type="submit" name="submit_3" value="Send Mesage">
                <p id="success"></p>
            </div>
            
    </form>
    </div>
</body>
</html>


